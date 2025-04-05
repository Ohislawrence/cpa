<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Paddle\Subscription as CashierSubscription;

class Subscription extends CashierSubscription
{
    protected $connection = 'mysql';
    protected $table = 'subscriptions';

    

    

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function canAccess($featureId): bool
    {
        // Get the value of the 'type' column for this subscription (assumed to be tenant owner row)
        $type = $this->type;

        if (!$type) {
            return false;
        }

        // Find the corresponding plan based on the 'type' field
        $plan = Plan::where('name', $type)->first();

        if (!$plan) {
            return false;
        }

        // Check if the feature is included in the plan
        return Planfeature::where('plan_id', $plan->id)
            ->where('feature_id', $featureId)
            ->where('is_included', 1)
            ->exists();
    }
}
