<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\CentralConnection;

class Plan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'plans';

    protected $fillable = [
        'name',
        'free_days',
        'duration',
        'cost',
        'about',
        'plan_code',
    ];

}
