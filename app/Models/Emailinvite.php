<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emailinvite extends Model
{
    protected $fillable = [
        'name',
        'code',
        'email',
        'status',
    ];
}
