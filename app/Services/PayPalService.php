<?php
namespace App\Services;

use App\Models\Agencydetails;
use PayPal\Api\Payout;
use PayPal\Api\PayoutSenderBatchHeader;
use PayPal\Api\PayoutItem;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Illuminate\Support\Facades\Auth;

class PayPalService
{
    private $apiContext;

    public function __construct()
    {
        // Leave constructor empty or setup general settings if needed
    }

    // Move the authentication logic to the method level
    public function makeMassPayment($merchant, $payments)
    {
        // Fetch PayPal credentials dynamically when needed
        $paypalCredentials = Agencydetails::where('user_id', $merchant->id)->first();

        if (!$paypalCredentials) {
            throw new \Exception('PayPal credentials are missing.');
        }

        // Use the credentials from the database
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalCredentials->client_id,
                $paypalCredentials->secret
            )
        );
        $this->apiContext->setConfig(config('paypal.settings'));

        $payouts = new Payout();

        $batchHeader = new PayoutSenderBatchHeader();
        $batchHeader->setSenderBatchId(uniqid())
                    ->setEmailSubject("You have a payment");

        $payouts->setSenderBatchHeader($batchHeader);

        foreach ($payments as $payment) {
            $payoutItem = new PayoutItem();
            $payoutItem->setRecipientType('Email')
                       ->setReceiver($payment['affiliate_paypal_email'])
                       ->setAmount(new \PayPal\Api\Currency('{
                            "value": "' . $payment['amount'] . '", "currency": "USD" }'))
                       ->setSenderItemId(uniqid());

            $payouts->addItem($payoutItem);
        }

        try {
            $output = $payouts->create([], $this->apiContext);
            return $output;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
}
