<?php

namespace App\Jobs;

use App\Models\Affiliatedetail;
use App\Models\Click;
use App\Models\Tier;
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
        logger()->info($array['payload']['cost']);

        $click = Click::where('clickID', $array['payload']['clickID'])->first();
        $cost = $array['payload']['cost'] ;
        $status = $array['payload']['status'] ;
        
        try {

            if(!$click){
                logger()->error("Click not found for ID: " . $this->webhookCall['payload']['clickID']);
            }else{

            if ($click->status === $status) {
                logger()->info("Status is the same. Skipping update for Click ID: " . $array['payload']['clickID']);
                
            }else{

                $payouttype = $click->offer[0]->payout_id;
                if( $payouttype == '4')
                {
                    if ($click->platform == 'Windows') {
                        $earned = $cost * ($click->offer[0]->targets->where('target','Windows')->first()->payout / 100);
                    }elseif($click->platform == 'Android'){
                        $earned = $cost * ($click->offer[0]->targets->where('target','Android')->first()->payout / 100);
                    }elseif($click->platform == 'iOS'){
                        $earned = $cost * ($click->offer[0]->targets->where('target','iOS')->first()->payout / 100);
                    }else{
                        $earned = $cost * ($click->offer[0]->targets->where('target','Windows')->first()->payout / 100);
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
        
                //prevent duplicates
                if($click->status != $status ){

                    if($status == 'Approved')
                    {
                        $conversion = 1;
                        // Credit affiliate
                        //$click->user->deposit($earned * 100);
                        //logic for referral
                        if(settings()->get('allow_affiliate_referral') == 1){
                                    
                            $period = $click->user->created_at->subMonths(settings()->get('allowed_affiliate_referral_duration_months')); //months in which the reffered has stayed on the platform
                            $referralget = Affiliatedetail::where('referral_id', $click->user->affiliatedetails->referral_id)->first();
                            $referral = $referralget->user;
                
                            if($click->user->created_at > $period )
                            {
                                $refCommision = $earned * (settings()->get('allowed_affiliate_referral_payout_percentage')/100);
                                $refstatus = 'Approved';
                            } else {
                                $refCommision  = 0;
                            }
                        }



                    }elseif ($status == 'Refunded' || $status == 'Chargeback') {
                        $conversion = 0;
                        //Reverse the affiliate's earnings
                        //$click->user->withdraw($earned * 100);
                        
                        // Handle referral commission reversal
                        if (settings()->get('allow_affiliate_referral') == 1) {
                            if ($click->user->affiliatedetails && $click->user->affiliatedetails->referral_id) {
                                $referralget = Affiliatedetail::where('referral_id', $click->user->affiliatedetails->referral_id)->first();
                                if ($referralget) {
                                    $referral = $referralget->user;
                                    $refCommision = $earned * (settings()->get('allowed_affiliate_referral_payout_percentage') / 100);
                                    $refstatus = 'Pending';
                                }
                            }
                        }
                    } else {
                        $conversion = 0;
                    }

                    if (settings()->get('allowed_affiliate_tier') == 1){
                        $affiliateTier = $click->user->affiliatedetails->tier_id;
                        if($affiliateTier != null){
                            $affiliatePercentage = Tier::find($affiliateTier)->commission_rate ;
                            $additionalEarning = ($earned * $affiliatePercentage) /100 ;
                        }else{
                            $additionalEarning = 0;
                        }
                    }

                    $click->update([
                        'conversion' => $conversion,
                        'cost' => $cost,
                        'status' => $status,
                        'earned' => ($status == 'Refunded' || $status == 'Chargeback') ? 0 : ($earned + $additionalEarning),
                        'referral' => $referral->id,
                        'refcommision' => $refCommision,
                        'refstatus' => $refstatus,
                        
                    ]);
                }
                
            }
                        
            }
                
        } catch (\Exception $e) {
            logger()->error("Webhook processing failed: " . $e->getMessage()); 
            
        }
    }
    
}



/**
     the payload will look like this
     header should have "secretKey"
    {
    "event": "action.done",//action.refund
    "timestamp": "2024-06-11T12:34:56Z",
    "payload": {
        "clickID": "18812070",
        "cost": "1500",
        "status": "Approved" or "Refunded" or "Chargeback"
    }
    
    webhook url = yoursite.com/verify-action-taken


    **/
