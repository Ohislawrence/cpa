<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agencydetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','active',	'companyname',	'brandurl',	'brandaddress',	'city',	'country','region','phonenumber','brandname','branddesc','brandproductlandingurl','category_id','brandtargetgeos','brandpreferredpayouttype','brandpaymenyterm','brandinstantmessager','brandinstantmessageid','brandinterestedtraffic','brandmonthlybudget','brandtracking','note','client_id', 'secret','paypal_email'
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

