<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliatedetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','status','city','country','region','phonenumber','instantmessageid', 'referral_id','referred_by',
    ];

    public function place()
    {
        return $this->hasOne(Country::class, 'id','country');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
