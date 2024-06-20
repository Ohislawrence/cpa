<?php

namespace App\Services;

use GuzzleHttp\Client;

class PayoneerService
{
    protected $client;
    protected $baseUrl;
    protected $partnerId;
    protected $partnerSecret;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = config('services.payoneer.base_url');
        $this->partnerId = config('services.payoneer.partner_id');
        $this->partnerSecret = config('services.payoneer.partner_secret');
    }

    public function authenticate()
    {
        $response = $this->client->post($this->baseUrl . '/oauth/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $this->partnerId,
                'client_secret' => $this->partnerSecret,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function makePayment($payeeId, $amount, $currency)
    {
        $tokenData = $this->authenticate();
        $accessToken = $tokenData['access_token'];

        $response = $this->client->post($this->baseUrl . '/v4/programs/{program_id}/payouts', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'payee_id' => $payeeId,
                'amount' => $amount,
                'currency' => $currency,
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
