<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
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
}
