<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Tier;
use App\Models\Agencydetails;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EvaluateAffiliateTiersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $merchants = Agencydetails::with(['user', 'user.click'])
            ->whereHas('user')
            ->get();
    }

    protected function shouldEvaluateNow($merchant): bool
    {
        $frequency = settings()->get('tier_evaluation_frequency') ?? 'monthly';
        $lastEval = $merchant->last_tier_evaluation_at ?? now()->subYear();

        return match ($frequency) {
            'daily' => $lastEval->diffInDays(now()) >= 1,
            'weekly' => $lastEval->diffInWeeks(now()) >= 1,
            'monthly' => $lastEval->diffInMonths(now()) >= 1,
            default => false,
        };
    }
}
