<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\PaymentRequest;
use App\Models\Requestpayment;
use App\Services\PayPalService;
use Illuminate\Http\Request;
use App\Jobs\ProcessMassPayoutJob;
use App\Models\Agencydetails;
use App\Models\Payoutoption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PayPal\Api\WebhookEvent;
use PayPal\Api\VerifyWebhookSignature;
use Illuminate\Support\Facades\Log;

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

        // Step 2: Check if there are any pending requests within the specified date range
        $pendingPayments = RequestPayment::whereIn('status', ['Failed', 'Request'])
            ->whereBetween('created_at', [$request->start_date, $request->end_date])
            ->exists();

        if (!$pendingPayments) {
            return redirect()->back()->withErrors(['date_range' => 'No pending payment requests found within the specified date range.']);
        }

        // Step 3: Dispatch the mass payout job with the selected date range
        ProcessMassPayoutJob::dispatch(Auth::id(), $request->start_date, $request->end_date);

        return back()->with('message', 'Mass payout has been queued for processing.');
    }

    public function batchPaypalWebhook(Request $request)
    {
        $agencyDetails = Agencydetails::where('user_id', Auth::id())->firstOrFail();
        try {
            $payload = $request->all();
            $headers = getallheaders();
            
            // Validate PayPal signature
            $verification = new VerifyWebhookSignature();
            $verification->setAuthAlgo($headers['PAYPAL-AUTH-ALGO'] ?? '');
            $verification->setTransmissionId($headers['PAYPAL-TRANSMISSION-ID'] ?? '');
            $verification->setCertUrl($headers['PAYPAL-CERT-URL'] ?? '');
            $verification->setWebhookId($agencyDetails->paypal_webhook_id); // Store this in config
            $verification->setTransmissionSig($headers['PAYPAL-TRANSMISSION-SIG'] ?? '');
            $verification->setTransmissionTime($headers['PAYPAL-TRANSMISSION-TIME'] ?? '');
            $verification->setRequestBody(json_encode($payload));
    
            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(config($agencyDetails->client_id), config($agencyDetails->secret))
            );
            
            $verificationResult = $verification->post($apiContext);
    
            if ($verificationResult->getVerificationStatus() !== 'SUCCESS') {
                Log::error('Invalid PayPal webhook signature');
                return response()->json(['status' => 'error'], 403);
            }
    
            // Process webhook event
            if (isset($payload['event_type']) && $payload['event_type'] === 'PAYMENT.PAYOUTSBATCH.SUCCESS') {
                $batchId = $payload['resource']['batch_header']['payout_batch_id'] ?? null;
                
                if ($batchId) {
                    foreach ($payload['resource']['items'] as $payout) {
                        if ($payout['transaction_status'] === 'SUCCESS') {
                            RequestPayment::where('transaction_id', $payout['payout_item_id'])
                                ->update(['status' => 'Paid']);
                        }
                    }
                    Log::info("Payout batch $batchId processed. Individual transactions updated.");
                }
            }
    
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('PayPal Webhook Error: ' . $e->getMessage());
            return response()->json(['status' => 'error'], 500);
        }
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
