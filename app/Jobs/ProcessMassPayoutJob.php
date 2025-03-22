<?php

namespace App\Jobs;

use App\Mail\MassPayoutCompletedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\RequestPayment;
use App\Models\AgencyDetails;
use App\Models\Currency;
use App\Models\Payoutoption;
use Illuminate\Support\Facades\Mail;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payout;
use PayPal\Api\PayoutSenderBatchHeader;
use PayPal\Api\PayoutItem;
use PayPal\Api\Currency as PayPalCurrency;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ProcessMassPayoutJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $merchantId;
    protected $startDate;
    protected $endDate;

    public function __construct($merchantId, $startDate, $endDate)
    {
        $this->merchantId = $merchantId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function handle()
    {
        // Step 1: Fetch the merchant's payout account details
        $agencyDetails = AgencyDetails::where('user_id', $this->merchantId)->firstOrFail();
        $payoutMethodId = settings()->get('payout_methods');
        $payoutType = Payoutoption::where('id', $payoutMethodId)->value('slug') ?? '';
        $currency = Currency::where('id', settings()->get('default_currency'))->first()->code;

        // Step 2: Fetch pending affiliate payment requests within the selected date range
        $pendingPayments = RequestPayment::whereIn('status', ['Failed', 'Request'])
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->get();

        // Step 3: Calculate the total payout amount
        $totalAmount = $pendingPayments->sum('amount');

        // Step 4: Process payments using the selected payout method
        switch ($payoutType) {
            case 'paypal':
                $this->processPayPalBatchPayout($agencyDetails, $pendingPayments, $currency);
                break;
            case 'wise':
                $this->processWisePayment($agencyDetails, $pendingPayments, $currency);
                break;
            case 'payoneer':
                $this->processPayoneerPayment($agencyDetails, $pendingPayments, $currency);
                break;
            default:
                Log::error('Unsupported payout method.');
                return;
        }

        // Step 5: Send an email to the merchant when the job is complete
        Mail::to($agencyDetails->user->email)->send(new MassPayoutCompletedMail($totalAmount));
    }

    private function processPayPalBatchPayout($agencyDetails, $pendingPayments, $currency)
    {
        // Validate PayPal credentials
        if (empty($agencyDetails->client_id) || empty($agencyDetails->secret)) {
            Log::error("Missing PayPal credentials for merchant ID {$this->merchantId}");
            return;
        }

        try {
            // Step 1: Generate Access Token
            $auth = base64_encode("{$agencyDetails->client_id}:{$agencyDetails->secret}");
            $ch = curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");

            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Authorization: Basic $auth",
                "Content-Type: application/x-www-form-urlencoded"
            ]);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = json_decode(curl_exec($ch), true);
            curl_close($ch);

            if (!isset($response['access_token'])) {
                throw new \Exception("Failed to retrieve PayPal access token.");
            }

            $accessToken = $response['access_token'];

            // Step 2: Prepare the Payout Request (Asynchronous Mode)
            $payoutData = [
                "sender_batch_header" => [
                    "sender_batch_id" => uniqid(),
                    "email_subject" => "You have received a payout!"
                ],
                "items" => []
            ];

            foreach ($pendingPayments as $payment) {
                $affiliateDetails = $payment->affiliateDetails;

                if (empty($affiliateDetails->paypal_email)) {
                    Log::error("PayPal email missing for affiliate ID {$payment->user_id}");
                    $payment->update(['status' => 'Failed']);
                    continue;
                }

                $payoutData["items"][] = [
                    "recipient_type" => "EMAIL",
                    "receiver" => $affiliateDetails->paypal_email,
                    "note" => "Thank you for your service!",
                    "sender_item_id" => uniqid(),
                    "amount" => [
                        "value" => number_format($payment->amount, 2, '.', ''),
                        "currency" => $currency
                    ]
                ];
            }

            // Step 3: Make PayPal Payout API Request (Async Mode)
            $ch = curl_init("https://api-m.sandbox.paypal.com/v1/payments/payouts"); // Removed `sync_mode=true`
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Authorization: Bearer $accessToken",
                "Content-Type: application/json"
            ]);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payoutData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $payoutResponse = json_decode(curl_exec($ch), true);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode === 201) {
                // Store batch payout ID for tracking
                $batchPayoutId = $payoutResponse['batch_header']['payout_batch_id'] ?? null;

                if ($batchPayoutId) {
                    // Mark payments as "Processing" until we confirm success via webhook or status check
                    foreach ($pendingPayments as $payment) {
                        $payment->update(['status' => 'Processing', 'batch_id' => $batchPayoutId]);
                    }
                    Log::info('PayPal Payout Batch Submitted Successfully.', ['batch_id' => $batchPayoutId]);
                } else {
                    throw new \Exception("Failed to retrieve batch payout ID.");
                }
            } else {
                throw new \Exception("PayPal Payout API Error: " . json_encode($payoutResponse));
            }

        } catch (\Exception $ex) {
            Log::error('PayPal Payout Error: ' . $ex->getMessage());

            // Update payment statuses to 'Failed'
            foreach ($pendingPayments as $payment) {
                $payment->update(['status' => 'Failed']);
            }
        }
    }




    private function processWisePayment($agencyDetails, $pendingPayments, $currency)
    {
        // Simulate Wise API call here
        // Example: Use Wise API to transfer funds to $affiliateDetails->wise_account_number

        // Update the payment status
        foreach ($pendingPayments as $payment) {
            $payment->update(['status' => 'Paid']);
        }
    }

    private function processPayoneerPayment($agencyDetails, $pendingPayments, $currency)
    {
        try {
            if ($pendingPayments->isEmpty()) {
                Log::info('No pending payments for Payoneer batch payout.');
                return;
            }

            // Prepare batch payout request
            $payoutData = $this->formatPayoneerPayoutData($pendingPayments, $agencyDetails, $currency);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $agencyDetails->payoneer_api_token,
                'Content-Type'  => 'application/json',
            ])->post('https://api.payoneer.com/v4/payouts', $payoutData);

            $responseBody = $response->json();

            if ($response->successful() && isset($responseBody['batch_id'])) {
                $batchId = $responseBody['batch_id'];

                // Update all payments in the batch
                RequestPayment::whereIn('id', $pendingPayments->pluck('id'))
                    ->update(['batch_id' => $batchId, 'status' => 'Processing']);

                Log::info("Payoneer batch payout initiated successfully. Batch ID: $batchId");
            } else {
                Log::error('Payoneer batch payout failed.', ['response' => $responseBody]);
            }
        } catch (\Exception $e) {
            Log::error('Payoneer batch payout error: ' . $e->getMessage());
        }
    }

    /**
     * Format the payout data for Payoneer API.
     */
    private function formatPayoneerPayoutData($pendingPayments, $agencyDetails, $currency): array
    {
        $payouts = [];
        

        foreach ($pendingPayments as $payment) {
            $affiliateDetails = $payment->affiliateDetails;
            $payouts[] = [
                'payee_id' => $affiliateDetails->payoneer_ID, // Ensure payee ID is stored for Payoneer users
                'amount'   => $payment->amount,
                'currency' => $currency,
                'description' => "Payout for transaction #{$payment->user->name}",
                'external_id' => $payment->id,
            ];
        }

        return [
            'merchant_id' => $agencyDetails->payoneer_merchant_id,
            'payouts'     => $payouts,
            'callback_url' => route('merchant.batchPayoneerWebhook'),
        ];
    }
}