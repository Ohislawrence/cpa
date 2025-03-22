<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Models\Domain;

class Adddomain extends Model
{
    
    protected $fillable = [
        'domain_id',
        'domain_added',
    ];

    public function domain()
    {
        return $this->hasOne(Domain::class);
    }
}
