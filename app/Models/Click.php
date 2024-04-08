<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use HasFactory;

    protected $fillable = [
            'user_id',
            'country_id',
            'device',
            'platform',
            'browser',
            'status',
            'offer_id',
            'ip',
            'clickID',
            'referrerurl'
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
