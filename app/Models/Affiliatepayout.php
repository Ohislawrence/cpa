<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliatepayout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'batch_id',
        'payoutbatch_id',
        'transaction_id',
        'amount',
        'status',
        'processed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payoutbatch()
    {
        return $this->belongsTo(Payoutbatch::class,'id','payoutbatche_id');
    }
}
