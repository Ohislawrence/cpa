<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestpayment extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'amount',
        'status',
        'method',
        'number',
        'batch_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function affiliateDetails()
    {
        return $this->hasOne(Affiliatedetail::class, 'user_id', 'user_id');
    }
}
