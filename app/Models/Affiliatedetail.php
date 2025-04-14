<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliatedetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','status','city','country','region','phonenumber','instantmessageid', 'referral_id','referred_by','paypal_email',
'wise_email',
'payoneer_ID','tier_id',
    ];

    public function place()
    {
        return $this->hasOne(Country::class, 'id','country');
    }

    public function tier()
    {
        return $this->hasOne(Tier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thiscountry()
    {
        return $this->belongsTo(Country::class, 'country', 'id' );
    }

    public function requestpayment()
    {
        return $this->hasMany(Requestpayment::class, 'user_id','user_id');
    }
}
