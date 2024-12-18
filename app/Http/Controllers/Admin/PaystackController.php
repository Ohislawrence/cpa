<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use PDO;

class PaystackController extends Controller
{

    public function createSubscription(Request $request)
    {
       //dd(url("/subscription/callback"));
        //dd(route('subscription.callback', ['tenant' => tenant()]));

        $user = auth()->user();
        $plan = $request->input('plan'); 
        $plan_info = Plan::where('name', $plan)->first(); 
        $amount = $plan_info->cost * 1700;
        $planCode = $plan_info->plan_code;

        
        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->post(env('PAYSTACK_PAYMENT_URL') . '/transaction/initialize', [
            'email' => $user->email,
            'amount' => $amount,
            'plan' => $planCode,
            'callback_url' => url("merchant/subscription/callback"),
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to initialize payment'], 500);
        }

        $data = $response->json();
        return redirect($data['data']['authorization_url']);
       
    }

    public function subscriptionCallback(Request $request)
    {
        $reference = $request->query('reference');

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))->get(env('PAYSTACK_PAYMENT_URL') . "/transaction/verify/{$reference}");
        
        if ($response->failed() || $response->json()['data']['status'] !== 'success') {
            return response()->json(['error' => 'Payment verification failed'], 400);
        }
        
        $data = $response->json()['data'];
        $sub_code = $data['customer']['customer_code'];
        //dd($sub_code);
        $user = User::on('mysql')->where('email', auth()->user()->email)->first(); 
        $plan = Plan::where('plan_code', $data['plan'])->first();

        if( auth()->user()->email == $data['customer']['email']){
            Subscription::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'plan_id' => $plan->id,
                    'paystack_subscription_code' => $sub_code,
                    'paystack_email_token' => $sub_code,
                    'start_date' => Carbon::now(),
                    'end_date' => Carbon::now()->addMonth(),
                    'next_billing_date' => Carbon::now()->addMonth(),
                    'status' => 'active',
                    'price'=> $data['amount'],
                    'currency' => $data['currency'],
                ]
            );
        }
        

        return redirect()->route('merchant.plan.active');
    }

    public function handleWebhook(Request $request)
    {
        // only a post with paystack signature header gets our attention
        //if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST' ) || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER) ) 
        //exit();

        $event = $request->input('event');
        $data = $request->input('data');
        $user = User::on('mysql')->where('email', $data['customer']['email'])->first();
        $subscription = Subscription::where('user_id', $user->id)->first();

        if ($event === 'subscription.disable') {
            if ($subscription) {
                $subscription->update([
                    'next_billing_date' => null,
                    'end_date' => null,
                    'canceled_at'=> Carbon::now(),
                    'status' => 'inactive',
                ]);
            }
        }
        if ($event === 'subscription.not_renew') {
            if ($subscription) {
                $subscription->update([
                    'next_billing_date' => null,
                    'end_date' => null,
                    'canceled_at'=> Carbon::now(),
                    'status' => 'past_due',
                ]);
            }
        }
        if($event === 'charge.success') {
            if ($subscription) {
                $subscription->update([
                    'next_billing_date' => Carbon::now()->addMonth(),
                    'start_date' => Carbon::now(),
                    'end_date' => Carbon::now()->addMonth(),
                ]);
            }
        }

        return response()->json(['message' => 'Webhook received'], 200);
    }

    private function getPlanAmount($plan)
    {
        return match ($plan) {
            'pro' => 6800000,
            'leader' => 13000000,
            'network' => 40000000,
            default => throw new \Exception('Invalid plan'),
        };
    }

    private function getPlanByAmount($amount)
    {
        return match ($amount) {
            6800000 => 1,
            17000000 => 2,
            61200000 => 3,
            default => throw new \Exception('Invalid amount'),
        };
    }
}
