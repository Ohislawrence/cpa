<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'target',
        'payout',
        'url',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    
}
