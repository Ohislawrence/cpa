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
        'batch_id',
        'status',
        'payment_processor',
        'processed_at',
        'start_date',
        'end_date',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
