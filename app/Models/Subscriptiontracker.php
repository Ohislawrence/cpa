<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Paddle\Subscription;

class Subscriptiontracker extends Model
{
    protected $connection = 'mysql';
    protected $table = 'subscriptiontrackers';

    protected $fillable = [
        'user_id',
        'tenant_id',
        'plan_id',
        'status',
        'start_date',
        'end_date',
        'trial_ends_at',
        'next_billing_date',
        'cancel_at',
        'canceled_at',
        'renewal',
        'price',
        'currency',
        'subscriptions_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function canAccess($featureId): bool
    {
        return Planfeature:://\DB::table('planfeatures')
            where('plan_id', $this->plan_id)
            ->where('feature_id', $featureId)
            ->where('is_included', 1)
            ->exists();
    }
}
