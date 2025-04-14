<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tier extends Model
{
    protected $fillable = [
        'level',
        'commission_rate',
        'min_sales',
    ];
}
