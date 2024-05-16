<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trafficsource extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'source',
        'address',
        'rank',
        'followers',
        'monthlyvisit',
        'note',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
