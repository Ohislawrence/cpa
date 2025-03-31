<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    protected $fillable = [
        'tenant_id',
        'business_email',
        'business_name',
        'contact_email',
        'contact_name',
        'business_phone',
        'contact_phone',
        'status',
        'current_plan',
        'country',
        'website',
        'about'
    ];

    public function plan()
    {
        return $this->hasOne(Plan::class,'id','current_plan');
    }

    public function tenant()
    {
        return $this->hasOne(Tenant::class);
    }
}
