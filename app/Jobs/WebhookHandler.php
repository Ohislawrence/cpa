<?php

namespace App\Jobs;

use App\Models\Click;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;
use Spatie\WebhookClient\Models\WebhookCall;

class WebhookHandler extends SpatieProcessWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public WebhookCall $webhookCall;

    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger()->info($this->webhookCall->payload);

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


        $click->update([
            'status' => $this->webhookCall->payload['status'],
            'earned' => $earned,
        ]);

        //logger()->info($this->webhookCall->payload);
        //$click->offer->user->withdrawFloat(2.74);
        //$click->user->depositFloat(1.37);
        //\App\Models\User::where('id', '1')->first()->depositFloat(1.37);
        $fees = $earned * 0.3;


        $click->offer[0]->user->transferFloat($click->user, $earned);
        $click->offer[0]->user->transferFloat(\App\Models\User::find(1), $fees);


    }
}