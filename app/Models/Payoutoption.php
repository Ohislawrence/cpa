<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payoutoption extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'payoutoptions';

    protected $fillable = [
        'processor',
        'slug',
    ];
}
