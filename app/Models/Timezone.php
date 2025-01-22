<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    protected $connection = 'mysql';
    protected $table = 'timezones';
    protected $fillable = [
        'zone_name',
        'country_code',
        'abbreviation',
        'time_start',
        'gmt_offset',
        'dst',
    ];
}
