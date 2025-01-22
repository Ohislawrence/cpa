<?php

namespace App\Jobs;

use App\Models\Affiliatedetail;
use App\Models\Click;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;
use Spatie\WebhookClient\Models\WebhookCall;


//extends SpatieProcessWebhookJob
class WebhookHandler implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    //public WebhookCall $webhookCall;


    protected $webhookCall;

    public function __construct($webhookCall)
    {
        $this->webhookCall= $webhookCall;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $array = $this->webhookCall;
        //Log::info( $array['cost']);
        logger()->info($array['payload']['clickID']);

        $click = Click::where('clickID', $this->webhookCall['payload']['clickID'])->first();
        //dd($click->offer[0]->payout_id);
        $payouttype = $click->offer[0]->payout_id;
        if( $payouttype == '4')
        {
            if ($click->platform == 'Windows') {
                $earned = $this->webhookCall['payload']['cost'] * ($click->offer[0]->targets->where('target','Windows')->first()->payout / 100);
            }elseif($click->platform == 'Android'){
                $earned = $this->webhookCall['payload']['cost'] * ($click->offer[0]->targets->where('target','Android')->first()->payout / 100);
            }elseif($click->platform == 'iOS'){
                $earned = $this->webhookCall['payload']['cost'] * ($click->offer[0]->targets->where('target','iOS')->first()->payout / 100);
            }else{
                $earned = $this->webhookCall['payload']['cost'] * ($click->offer[0]->targets->where('target','Windows')->first()->payout / 100);
            }

        }else{
            if ($click->platform == 'Windows') {
                $earned = $click->offer[0]->targets->where('target','Windows')->first()->payout;
            }elseif($click->platform == 'Android'){
                $earned = $click->offer[0]->targets->where('target','Android')->first()->payout;
            }elseif($click->platform == 'iOS'){
                $earned = $click->offer[0]->targets->where('target','iOS')->first()->payout;
            }else{
                $earned = $click->offer[0]->targets->where('target','Windows')->first()->payout;
            }
        }

        $status = $this->webhookCall['payload']['status'] ;

        $cost = $this->webhookCall['payload']['cost'] ;


        if($status == 'Approved')
        {
            $conversion = 1;
        }else{
            $conversion = 0;
        }


        $click->update([
            'status' => $status,
            'earned' => $earned,
            'conversion' => $conversion,
            'cost' => $cost,
        ]);

        //credit affiliate
        $click->user->deposit($earned * 100); //credit main

        //logic for referral
        if(settings()->get('allow_affiliate_referral') == 1){
                    
            $period = $click->user->created_at->subMonths(settings()->get('allowed_affiliate_referral_duration_months')); //months in which the reffered has stayed on the platform
            $referralget = Affiliatedetail::where('referral_id', $click->user->affiliatedetails->referral_id)->first();
            $referral = $referralget->user;

            if($click->user->created_at > $period )
            {
                $refCommision = $earned * (settings()->get('allowed_affiliate_referral_payout_percentage')/100);
                $referral->deposit($refCommision); //credit commission
                
            }
        }


        
        

    }

    function merchantConfig($key)
    {
        return \App\Models\Setting::where('name', $key)->value('val');
    }

    /**
     the payload will look like this
     header should have "secretKey"
    {
    "event": "user.signup",
    "timestamp": "2024-06-11T12:34:56Z",
    "payload": {
        "clickID": "18812070",
        "cost": "1500",
        "status": "Approved"
    }
    }


    {
    "payload": {
        "clickID": "56925031",
        "cost": "1500",
        "status": "Approved"
    }
}
    **/
}
