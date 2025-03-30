<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\PaymentRequest;
use App\Models\Requestpayment;
use App\Services\PayPalService;
use Illuminate\Http\Request;
use App\Jobs\ProcessMassPayoutJob;
use App\Models\Affiliatepayout;
use App\Models\Agencydetails;
use App\Models\Click;
use App\Models\Payoutbatch;
use App\Models\Payoutoption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PayPal\Api\WebhookEvent;
use PayPal\Api\VerifyWebhookSignature;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class MassPaymentController extends Controller
{
    public function processMassPayout(Request $request)
    {
        // Step 1: Validate the merchant's password and date range
        $request->validate([
            'password' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['password' => 'Invalid password.']);
        }

        // Step 2: Ensure minimum payout amount is configured
        $minimumPayoutAmount = settings()->get('minimum_payout_amount');
        if (empty($minimumPayoutAmount) || $minimumPayoutAmount <= 0) {
            return redirect()->back()->withErrors(['payout' => 'No action was done. Please set up the minimum payout in the configuration tab.']);
        }

        // Step 3: Get total earnings per affiliate (grouped by user_id)
        $earningsPerAffiliate = Click::where('status', 'Approved')
            ->whereBetween('created_at', [$request->start_date, $request->end_date])
            ->groupBy('user_id')
            ->selectRaw('user_id, SUM(earned) as total_earned')
            ->get();

        // Step 4: Filter eligible affiliates
        $affiliatesEligible = $earningsPerAffiliate
            ->where('total_earned', '>=', $minimumPayoutAmount)
            ->pluck('user_id')
            ->toArray();

        $errors = [];
        foreach ($earningsPerAffiliate as $affiliate) {
            if ($affiliate->total_earned < $minimumPayoutAmount) {
                $errors[] = "Affiliate ID {$affiliate->user_id} has not met the minimum payout amount ({$affiliate->total_earned} < $minimumPayoutAmount).";
            }
        }

        // Step 5: Handle cases where no affiliates qualify
        if (empty($affiliatesEligible)) {
            return redirect()->back()->withErrors(['payout' => 'No affiliates meet the minimum payout requirement.']);
        }

        // Step 6: Dispatch the mass payout job
        ProcessMassPayoutJob::dispatch(Auth::id(), $request->start_date, $request->end_date, $affiliatesEligible);

        // Step 7: Store errors for display
        if (!empty($errors)) {
            session()->flash('payout_errors', $errors);
        }

        return back()->with('message', 'Mass payout has been queued for processing.');
    }

    public function batchPaypalWebhook(Request $request)
    {
        Log::info('PayPal Webhook Received', ['data' => $request->all()]);

        // Verify webhook
        if (!$this->verifyWebhook($request)) {
            Log::error("PayPal Webhook Verification Failed");
            return response()->json(['message' => 'Invalid Webhook'], 400);
        }

        // Extract event data
        $event = $request->input('event_type');
        $resource = $request->input('resource');

        if (!$event || !$resource) {
            return response()->json(['message' => 'Invalid webhook payload'], 400);
        }

        try {
            if ($event === 'PAYMENT.PAYOUTS-ITEM.SUCCEEDED') {
                return $this->handlePayoutSuccess($resource);
            } elseif ($event === 'PAYMENT.PAYOUTS-ITEM.DENIED' || $event === 'PAYMENT.PAYOUTS-ITEM.FAILED') {
                return $this->handlePayoutFailure($resource);
            }
        } catch (\Exception $e) {
            Log::error('PayPal Webhook Processing Error: ' . $e->getMessage());
            return response()->json(['message' => 'Error processing webhook'], 500);
        }

        return response()->json(['message' => 'Webhook received'], 200);
    }

    private function verifyWebhook(Request $request)
    {
        $paypalEndpoint = "https://api-m.sandbox.paypal.com/v1/notifications/verify-webhook-signature";
        $agencyDetails = Agencydetails::where('user_id', 1)->firstOrFail();

        // Get PayPal credentials from your database (modify this based on your app)
        $paypalClientId = $agencyDetails->client_id;
        $paypalSecret = $agencyDetails->secret;

        if (!$paypalClientId || !$paypalSecret) {
            Log::error("Missing PayPal credentials");
            return false;
        }

        // Get an access token
        $authResponse = Http::asForm()->withBasicAuth($paypalClientId, $paypalSecret)
            ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);

        if (!$authResponse->successful()) {
            Log::error("Failed to get PayPal Access Token");
            return false;
        }

        $accessToken = $authResponse->json('access_token');

        // Prepare verification payload
        $verificationData = [
            'auth_algo'         => $request->header('PAYPAL-AUTH-ALGO'),
            'cert_url'          => $request->header('PAYPAL-CERT-URL'),
            'transmission_id'   => $request->header('PAYPAL-TRANSMISSION-ID'),
            'transmission_sig'  => $request->header('PAYPAL-TRANSMISSION-SIG'),
            'transmission_time' => $request->header('PAYPAL-TRANSMISSION-TIME'),
            'webhook_id'        => $agencyDetails->paypal_webhook_id, // Set this 
            'webhook_event'     => $request->all(),
        ];

        // Verify webhook signature
        $verificationResponse = Http::withToken($accessToken)
            ->post($paypalEndpoint, $verificationData);

        if (!$verificationResponse->successful()) {
            Log::error("PayPal Webhook Signature Verification Failed", [
                'response' => $verificationResponse->json(),
            ]);
            return false;
        }

        $verificationStatus = $verificationResponse->json('verification_status');

        if ($verificationStatus === 'SUCCESS') {
            return true;
        }

        Log::error("Invalid PayPal Webhook Signature", ['verification_status' => $verificationStatus]);
        return false;
    }

    private function handlePayoutSuccess($resource)
    {
        $batchId = $resource['payout_batch_id'] ?? null;

        if (!$batchId) {
            Log::error("Missing batch ID in PayPal payout success webhook.");
            return response()->json(['message' => 'Missing batch ID'], 400);
        }

        // Find the payout batch
        $payoutBatch = Payoutbatch::where('batch_id', $batchId)->first();
        if (!$payoutBatch) {
            Log::error("No matching payout batch found for batch ID: $batchId");
            return response()->json(['message' => 'Payout batch not found'], 404);
        }

        // Process each payout item
        foreach ($resource['items'] as $item) {
            $receiverEmail = $item['payout_item']['receiver'] ?? null;
            $transactionId = $item['transaction_id'] ?? null;
            
            if (!$receiverEmail || !$transactionId) {
                Log::error("Missing email or transaction ID for an affiliate payout in batch: $batchId");
                continue;
            }

            // Find the affiliate payout record
            $payout = Affiliatepayout::where('batch_id', $batchId)
                ->whereHas('affiliateDetails', function ($query) use ($receiverEmail) {
                    $query->where('paypal_email', $receiverEmail);
                })
                ->first();

            if ($payout) {
                // Update affiliate payout status
                $payout->update([
                    'status' => 'Completed',
                    'transaction_id' => $transactionId,
                    'processed_at' => now(),
                ]);

                // ✅ **Update clicks table from 'Approved' to 'Paid'**
                Click::where('user_id', $payout->user_id)
                    ->where('status', 'Approved')
                    ->whereBetween('created_at', [$payoutBatch->start_date, $payoutBatch->end_date])
                    ->update(['status' => 'Paid']);

                Log::info("Payout successful for email: $receiverEmail, batch: $batchId, transaction: $transactionId");
            } else {
                Log::error("No matching payout found for email: $receiverEmail in batch: $batchId");
            }
        }

        return response()->json(['message' => 'Payout success processed'], 200);
    }

    private function handlePayoutFailure($resource)
    {
        $batchId = $resource['payout_batch_id'] ?? null;
        $receiverEmail = $resource['payout_item']['receiver'] ?? null;
        $errorMessage = $resource['errors']['message'] ?? 'Unknown error';

        if (!$batchId || !$receiverEmail) {
            Log::error("Missing batch ID or receiver email in PayPal payout failure webhook.");
            return response()->json(['message' => 'Missing data'], 400);
        }

        // Find and update the specific affiliate payout record
        $payout = Affiliatepayout::where('batch_id', $batchId)
            ->whereHas('affiliateDetails', function ($query) use ($receiverEmail) {
                $query->where('paypal_email', $receiverEmail);
            })
            ->first();

        if ($payout) {
            $payout->update([
                'status' => 'Failed',
                'error_message' => $errorMessage,
                'processed_at' => now(),
            ]);

            Log::error("Payout failed for email: $receiverEmail, batch: $batchId, error: $errorMessage");
        } else {
            Log::error("No matching payout found for email: $receiverEmail in batch: $batchId");
        }

        return response()->json(['message' => 'Payout failure processed'], 200);
    }

    public function batchPayoneerWebhook(Request $request)
    {
        $payload = $request->all();

    if ($payload['event_type'] === 'payout_completed' && isset($payload['batch_id'])) {
        RequestPayment::where('batch_id', $payload['batch_id'])
            ->update(['status' => 'Paid']);

        Log::info("Payoneer batch payout {$payload['batch_id']} marked as Paid.");
    }

    return response()->json(['status' => 'success']);
    }

    /** 
    protected $paypalService;

    public function __construct(PayPalService $paypalService)
    {
        $this->paypalService = $paypalService;
    }

    public function processMassPayment(Request $request)
    {
        $merchant = auth()->user();  // Authenticated user can be accessed here

        if (!$merchant->paypal_email) {
            return back()->withErrors('Please set up your PayPal email first.');
        }

        // Fetch pending payment requests
        $paymentRequests = Requestpayment::with('affiliate')
            ->where('status', 'pending')
            ->get();

        // Prepare payment data
        $payments = $paymentRequests->map(function ($request) {
            return [
                'affiliate_paypal_email' => $request->affiliate->paypal_email,
                'amount' => $request->amount,
            ];
        })->toArray();

        try {
            // Pass the merchant to the service method
            $response = $this->paypalService->makeMassPayment($merchant, $payments);

            // Update payment request status
            Requestpayment::whereIn('id', $paymentRequests->pluck('id'))->update(['status' => 'paid']);

            return back()->with('success', 'Mass payment processed successfully.');
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }
    */
}
