<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
    public $timestamps = false;

    public function subscriptiontracker()
    {
        return $this->hasOne(Subscriptiontracker::class, "tenant_id","id");
    }

    public function kyc()
    {
        return $this->hasOne(Kyc::class, "tenant_id","id");
    }
    
}