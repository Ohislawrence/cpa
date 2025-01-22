<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'payouts';

    protected $fillable = [
        'name',
        'slug',
    ];


}
