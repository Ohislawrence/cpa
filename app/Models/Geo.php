<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geo extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'country_id',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
