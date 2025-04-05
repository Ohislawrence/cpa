<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\FlutterwaveService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{
    protected $flutterwave;

    public function __construct(FlutterwaveService $flutterwave)
    {
        $this->flutterwave = $flutterwave;
    }

    public function checkout(Request $request)
    {
        $userEmail = $request->input('user');
        $merchant = User::where('email', $userEmail)->first();
        $selectedPlanID = $request->input('plan');
        $plan = Plan::findorfail($selectedPlanID);

        

        if (!$merchant) {
            return redirect()->route('error.page')->with('message', 'User not found.');
        }

        $redirectUrl = $request->input('redirect') ?? url('/dashboard'); // Default redirect if none provided

        // Ensure the user is billable (Laravel Cashier)
        if (!$merchant->subscribed('pro')) { // Check the correct plan
            $checkout = $merchant->subscribe($premium = $plan->plan_code, 'lower plan - pro')
                ->returnTo($redirectUrl);
            return view('admin.inlinePayment', compact('checkout','merchant','plan'));
        }

        return redirect($redirectUrl)->with('message', 'Already subscribed.');
    }

    /**
     * Subscribe a user to a selected plan
     
    public function subscribe(Request $request)
    {
        $user = auth()->user();
        $email = $user->email;
        $plan = $request->input('plan'); 
        $plan_info = Plan::where('name', $plan)->first(); 
        $amount = $plan_info->cost;
        $planId = $plan_info->plan_code;

        // Subscribe the user
        //$data = $this->flutterwave->subscribeUser($email, $amount , $planId);

        $txRef = uniqid('trx_');

        $data = Http::withToken(env('FLW_SECRET_KEY'))
            ->post("https://api.flutterwave.com/v3/payments", [
                'tx_ref' => $txRef,
                'amount' => $amount,
                'currency' => 'USD',
                'payment_plan' => $planId,
                'redirect_url' => route('merchant.subscription.callback'),
                'customer' => [
                    'email' => $email,
                ],
            ]);

        

        if (isset($data['data']['link'])) {
            return redirect($data['data']['link']);
        }

        return response()->json(['error' => 'Failed to initialize payment'], 400);
    }

    /**
     * Handle payment callback
      
    public function callback(Request $request)
    {
        $transactionId = $request->query('transaction_id');

        $response = $this->flutterwave->verifyTransaction($transactionId);

        if($request->status == 'cancelled')
        {
            return redirect()->route('merchant.plan.active')->with('message', 'Payment was cancelled');
        }

        if ($response['status'] === 'success') {
            // Activate subscription in database

            // Extract data
            $data = $response['data'];

            $amount = $data['amount']; // Amount paid
            $email = $data['customer']['email']; // User's email
            $txRef = $data['tx_ref']; // Transaction reference
            $paymentPlan = $data['plan'] ?? null; // Flutterwave plan ID

            //dd($data);

            $user = User::on('mysql')->where('email', auth()->user()->email)->first(); 
            $plan = Plan::where('plan_code', $paymentPlan)->first();

            if( auth()->user()->email == $email){
                Subscription::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'plan_id' => $plan->id,
                        'flw_trans_id' => $data['id'],
                        'flw_ref' => $data['flw_ref'],
                        'start_date' => Carbon::now(),
                        'end_date' => Carbon::now()->addDays(30),
                        'next_billing_date' => Carbon::now()->addDays(30),
                        'status' => 'active',
                        'price'=> $amount,
                        'currency' => $data['currency'],
                    ]
                );
            }

            return redirect()->route('merchant.plan.active')->with('message', 'Subscription successful!');
        }

        return redirect('/merchant/plans/active')->with('message', 'Subscription failed.');
    }


    public function webhook(Request $request)
    {
        $secretHash = env('FLW_WEBHOOK_HASH');
        $signature = $request->header('verif-hash');
        if (!$signature || ($signature !== $secretHash)) {
            // This request isn't from Flutterwave; discard
            abort(401);
        }

        $payload = request()->all();
        $user = User::on('mysql')->where('email', $payload['data']['customer']['email'])->first();
        $subscription = Subscription::where('user_id', $user->id)->first();
        $webhookID = $subscription->webhook_id;
        $webhookStatus = $subscription->webhook_status;
        
        if(Subscription::where('webhook_id', $webhookID)->exist() && $webhookStatus == $payload['data']['status'])
        {
            return response()->json(['message' => 'Webhook duplicate'], 200);
        }
        

        if ($payload['event'] == 'charge.completed') {
            // Update user's subscription status in DB
            if ($subscription) {
                $subscription->update([
                    'next_billing_date' => Carbon::now()->addDays(30),
                    'start_date' => Carbon::now(),
                    'end_date' => Carbon::now()->addDays(30),
                    'webhook_status' => $payload['data']['status'],
                    'webhook_id' => $payload['data']['id'],
                ]);
            }

        } elseif ($payload['event'] == 'subscription.cancelled') {
            // Handle subscription cancellation
            if ($subscription) {
                $subscription->update([
                    'next_billing_date' => null,
                    'end_date' => null,
                    'canceled_at'=> Carbon::now(),
                    'status' => 'inactive',
                    'webhook_status' => $payload['data']['status'],
                    'webhook_id' => $payload['data']['id'],
                ]);
            }
        }

        return response()->json(['message' => 'Webhook received'], 200);
    }
    */
}
