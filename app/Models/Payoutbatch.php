<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payoutbatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'payment_processor',
        'processed_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
