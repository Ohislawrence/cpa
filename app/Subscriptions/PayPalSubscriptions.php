<?php

namespace App\Subscriptions\PayPalSubscriptions;

use App\Subscriptions\Subscriptions;
use Exception;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalSubscriptions implements Subscriptions
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
    }

    // Implement the methods defined in the Subscriptions interface
    public function create(int $plan_id, int $coupon_user_id, string $method, float $amount = 0)
    {
        // Implementation goes here
    }

    public function cancel(string $subscription_id = null)
    {
        // Implementation goes here
    }

    public function pause()
    {
        // Implementation goes here
    }

    public function resume()
    {
        // Implementation goes here
    }
}