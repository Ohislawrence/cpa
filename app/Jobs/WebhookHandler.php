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
        $array = json_decode($this->webhookCall, true);
        //Log::info( $array['cost']);
        logger()->info($array['cost']);
/** 
        $click = Click::where('clickID', $this->webhookCall->payload['clickID'])->first();
        $payouttype = $click->offer[0]->payout_id;

        if( $payouttype == '4')
        {
            if ($click->platform == 'Windows') {
                $earned = $this->webhookCall->payload['cost'] * ($click->offer[0]->targets->where('target','Windows')->first()->payout / 100);
            }elseif($click->platform == 'Android'){
                $earned = $this->webhookCall->payload['cost'] * ($click->offer[0]->targets->where('target','Android')->first()->payout / 100);
            }elseif($click->platform == 'iOS'){
                $earned = $this->webhookCall->payload['cost'] * ($click->offer[0]->targets->where('target','iOS')->first()->payout / 100);
            }

        }else{
            if ($click->platform == 'Windows') {
                $earned = $click->offer[0]->targets->where('target','Windows')->first()->payout;
            }elseif($click->platform == 'Android'){
                $earned = $click->offer[0]->targets->where('target','Android')->first()->payout;
            }elseif($click->platform == 'iOS'){
                $earned = $click->offer[0]->targets->where('target','iOS')->first()->payout;
            }
        }

        $status = $this->webhookCall->payload['status'] ;
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
        ]);

        //logger()->info($this->webhookCall->payload);
        //$click->offer->user->withdrawFloat(2.74);
        //$click->user->depositFloat(1.37);
        //\App\Models\User::where('id', '1')->first()->depositFloat(1.37);

        $period = $click->user->created_at->subMonths(6);
        $referralget = Affiliatedetail::where('referral_id', $click->user->affiliatedetails->referral_id)->first();
        $referral = $referralget->user;

        if($click->user->created_at > $period )
        {
            $fees = $earned * 0.25;
            $refCommision = $earned * 0.05;

            $click->offer[0]->user->transferFloat($click->user, $earned);
            $click->offer[0]->user->transferFloat(\App\Models\User::find(1), $fees);
            $click->offer[0]->user->transferFloat($referral, $refCommision);
            
        }else{
            $fees = $earned * 0.3;

            $click->offer[0]->user->transferFloat($click->user, $earned);
            $click->offer[0]->user->transferFloat(\App\Models\User::find(1), $fees);
        }
        
**/
    }
}
