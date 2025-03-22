<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    protected $connection = 'mysql';
    protected $table = 'payoutoptions';

    protected $fillable = [
        'info_type',
        'slug',
    ];
}
