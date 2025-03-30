<?php

namespace App\Jobs;

use App\Mail\MassPayoutCompletedMail;
use App\Models\Affiliatedetail;
use App\Models\Affiliatepayout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\RequestPayment;
use App\Models\AgencyDetails;
use App\Models\Click;
use App\Models\Currency;
use App\Models\Payoutbatch;
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
    protected $affiliatesEligible;

    public function __construct($merchantId, $startDate, $endDate, $affiliatesEligible)
    {
        $this->merchantId = $merchantId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->affiliatesEligible = $affiliatesEligible;
    }

    public function handle()
    {
        Log::info("Starting mass payout processing for merchant ID: {$this->merchantId}.");
        

        // Step 1: Fetch the merchant's payout account details
        $agencyDetails = AgencyDetails::where('user_id', $this->merchantId)->first();
        if (!$agencyDetails) {
            Log::error("Merchant payout details not found for merchant ID: {$this->merchantId}.");
            return;
        }

        

        $payoutMethodId = settings()->get('payout_methods');
        if (!$payoutMethodId) {
            Log::error("No payout method set for merchant ID: {$this->merchantId}.");
            return;
        }

        $payoutType = Payoutoption::where('id', $payoutMethodId)->value('slug') ?? '';
        if (!$payoutType) {
            Log::error("Invalid payout method set for merchant ID: {$this->merchantId}.");
            return;
        }

        $currency = Currency::where('id', settings()->get('default_currency'))->value('code');
        if (!$currency) {
            Log::error("Default currency not set for merchant ID: {$this->merchantId}.");
            return;
        }

        Log::info("Payout method: {$payoutType}, Currency: {$currency}");

        // Step 2: Fetch total earnings for each affiliate within the selected date range
        $affiliatePayments = Click::whereIn('user_id', $this->affiliatesEligible)
            ->where('status', 'Approved')
            ->whereBetween('created_at', [$this->startDate, $this->endDate])
            ->groupBy('user_id')
            ->selectRaw('user_id, SUM(earned) as total_earned')
            ->get();

        if ($affiliatePayments->isEmpty()) {
            Log::info("No valid payouts to process for merchant ID: {$this->merchantId}.");
            return;
        }

        // Step 3: Calculate the total payout amount
        $totalAmount = $affiliatePayments->sum('total_earned');
        Log::info("Total payout amount: {$totalAmount} {$currency} for merchant ID: {$this->merchantId}.");

       
        // Step 4: Process payments based on the selected payout method
        switch ($payoutType) {
            case 'paypal':
                $this->processPayPalBatchPayout($agencyDetails, $affiliatePayments, $currency, $this->startDate, $this->endDate);
                break;
            case 'wise':
                $this->processWisePayment($agencyDetails, $affiliatePayments, $currency);
                break;
            case 'payoneer':
                $this->processPayoneerPayment($agencyDetails, $affiliatePayments, $currency);
                break;
            default:
                Log::error("Unsupported payout method '{$payoutType}' for merchant ID: {$this->merchantId}.");
                return;
        }

        // Step 5: Send an email to the merchant when the job is complete
        Mail::to($agencyDetails->user->email)->send(new MassPayoutCompletedMail($totalAmount));

        Log::info("Mass payout of {$totalAmount} {$currency} processed successfully for merchant ID: {$this->merchantId}.");
    }

    private function processPayPalBatchPayout($agencyDetails, $affiliatePayments, $currency , $startDate, $endDate)
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
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

                $responseJson = curl_exec($ch);
                if ($responseJson === false) {
                    throw new \Exception("cURL Error: " . curl_error($ch));
                }

                $response = json_decode($responseJson, true);
                curl_close($ch);

                if (!isset($response['access_token'])) {
                    throw new \Exception("Failed to retrieve PayPal access token.");
                }

                $accessToken = $response['access_token'];

                // Step 2: Prepare the Payout Request
                $payoutData = [
                    "sender_batch_header" => [
                        "sender_batch_id" => uniqid(),
                        "email_subject" => "You have received a payout!"
                    ],
                    "items" => []
                ];

                $totalAmountPaid = 0; // Track total amount paid

                foreach ($affiliatePayments as $payment) {
                    // Retrieve affiliate details correctly
                    $affiliateDetails = Affiliatedetail::where('user_id', $payment->user_id)->first();

                    if (!$affiliateDetails || empty($affiliateDetails->paypal_email)) {
                        Log::error("PayPal email missing for affiliate ID {$payment->user_id}");
                        $payment->update(['status' => 'Failed']); // Mark payment as Failed
                        continue;
                    }

                    $amount = number_format($payment->total_earned, 2, '.', '');
                    $totalAmountPaid += $amount; // Accumulate total payout amount

                    $payoutData["items"][] = [
                        "recipient_type" => "EMAIL",
                        "receiver" => $affiliateDetails->paypal_email,
                        "note" => "Thank you for your service!",
                        "sender_item_id" => uniqid(),
                        "amount" => [
                            "value" => $amount,
                            "currency" => $currency
                        ]
                    ];
                }

                if (empty($payoutData["items"])) {
                    Log::warning("No valid affiliates for PayPal payout processing.");
                    return;
                }

                // Step 3: Make PayPal Payout API Request
                $ch = curl_init("https://api-m.sandbox.paypal.com/v1/payments/payouts");

                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Authorization: Bearer $accessToken",
                    "Content-Type: application/json"
                ]);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payoutData));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

                $payoutResponseJson = curl_exec($ch);
                if ($payoutResponseJson === false) {
                    throw new \Exception("cURL Error: " . curl_error($ch));
                }

                $payoutResponse = json_decode($payoutResponseJson, true);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                Log::info("Starting mass payout for date: {$this->startDate} - {$this->endDate}.");


                if ($httpCode === 201) {
                    // Store batch payout ID for tracking
                    $batchPayoutId = $payoutResponse['batch_header']['payout_batch_id'] ?? null;
                    //$batchStatus = $payoutResponse['batch_header']['batch_status'] ?? null;

                    if ($batchPayoutId) {
                            // Create payout batch record
                            $payoutBatch = Payoutbatch::create([
                                'user_id' => $this->merchantId,
                                'batch_id' => $batchPayoutId,
                                'total_amount' => $totalAmountPaid,
                                'status' => 'Started',
                                'start_date' => $startDate, // Use startDate from constructor
                                'end_date' => $endDate, // Use endDate from constructor
                                'payment_processor' => 'PayPal',
                                'processed_at' => now(),
                            ]);

                            // Create individual payout records and update payment status
                            foreach ($affiliatePayments as $payment) {
                                Affiliatepayout::create([
                                    'payoutbatch_id' => $payoutBatch->id, // Fixed incorrect foreign key
                                    'user_id' => $payment->user_id,
                                    'status' => 'Processing', //  Update status to Processing
                                    'amount' => $payment->total_earned, // Fixed missing amount
                                    'batch_id' => $batchPayoutId,
                                    'processed_at' => now(), // Fixed missing processed_at
                                ]);

                                //  Update original payment status
                                //$payment->update(['status' => 'Processing']);
                            }

                        Log::info("PayPal Payout Batch Submitted Successfully.", ['batch_id' => $batchPayoutId]);
                    } else {
                        throw new \Exception("Failed to retrieve batch payout ID.");
                    }
                } else {
                    throw new \Exception("PayPal Payout API Error: " . json_encode($payoutResponse));
                }

            } catch (\Exception $ex) {
                Log::error("PayPal Payout Error: " . $ex->getMessage());
            }
        }




    private function processWisePayment($agencyDetails, $affiliatePayments, $currency)
    {
        // Simulate Wise API call here
        // Example: Use Wise API to transfer funds to $affiliateDetails->wise_account_number

        // Update the payment status
        foreach ($affiliatePayments as $payment) {
            $payment->update(['status' => 'Paid']);
        }
    }

    private function processPayoneerPayment($agencyDetails, $affiliatePayments, $currency)
    {
        try {
            if ($affiliatePayments->isEmpty()) {
                Log::info('No pending payments for Payoneer batch payout.');
                return;
            }

            // Prepare batch payout request
            $payoutData = $this->formatPayoneerPayoutData($affiliatePayments, $agencyDetails, $currency);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $agencyDetails->payoneer_api_token,
                'Content-Type'  => 'application/json',
            ])->post('https://api.payoneer.com/v4/payouts', $payoutData);

            $responseBody = $response->json();

            if ($response->successful() && isset($responseBody['batch_id'])) {
                $batchId = $responseBody['batch_id'];

                // Update all payments in the batch
                RequestPayment::whereIn('id', $affiliatePayments->pluck('id'))
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
    private function formatPayoneerPayoutData($affiliatePayments, $agencyDetails, $currency): array
    {
        $payouts = [];
        

        foreach ($affiliatePayments as $payment) {
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