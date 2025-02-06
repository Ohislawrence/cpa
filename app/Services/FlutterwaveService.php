<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FlutterwaveService
{
    protected $baseUrl;
    protected $secretKey;

    public function __construct()
    {
        $this->baseUrl = env('FLW_BASE_URL', 'https://api.flutterwave.com/v3');
        $this->secretKey = env('FLW_SECRET_KEY');
    }

    /**
     * Create a subscription plan on Flutterwave
     */
    public function createPlan($name, $amount, $interval = 'monthly')
    {
        $response = Http::withToken($this->secretKey)
            ->post("{$this->baseUrl}/payment-plans", [
                'name' => $name,
                'amount' => $amount,
                'interval' => $interval,
                'currency' => 'USD',
                'duration' => 0, // 0 means indefinite
            ]);
            

        return $response->json();
    }

    /**
     * Subscribe a user to a plan
     */
    public function subscribeUser($email, $amount, $planId)
    {
        $txRef = uniqid('trx_');

        $data = Http::withToken($this->secretKey)
            ->post("{$this->baseUrl}/transactions/initialize", [
                'tx_ref' => $txRef,
                'amount' => $amount,
                'currency' => 'USD',
                'payment_plan' => $planId,
                'redirect_url' => route('merchant.subscription.callback'),
                'customer' => [
                    'email' => $email,
                ],
            ]);

            
        return $data->json();
    }

    /**
     * Verify a transaction
     */
    public function verifyTransaction($transactionId)
    {
        $response = Http::withToken($this->secretKey)
            ->get("{$this->baseUrl}/transactions/{$transactionId}/verify");

        return $response->json();
    }
}
