<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'status',
        'offerid',
        'name',
        'category_id',
        'payout_id',
        'actionurl',
        'desc',
        'secretkey',
        'expiry',
        'start'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function targets()
    {
        return $this->hasMany(Target::class);
    }

    public function geos()
    {
        return $this->hasMany(Geo::class);
    }

    public function payouttype()
    {
        return $this->belongsTo(Payout::class,'payout_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function click()
    {
        return $this->belongsTo(Click::class, 'offerid', 'offer_id');
    }
}
