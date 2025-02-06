<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $connection = 'mysql';
    protected $table = 'subscriptions';

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
        'webhook_id',
        'flw_ref',
        'flw_trans_id',
        'webhook_status',
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
