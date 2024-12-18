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
}
