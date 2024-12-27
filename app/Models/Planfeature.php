<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planfeature extends Model
{
    protected $connection = 'mysql';
    protected $table = 'planfeatures';

    protected $fillable = [
        'plan_id',
        'feature_id',
        'option',
        'is_included',
    ];

    public function plans(){
        return $this->belongsTo(Plan::class);
    }

    public function feature(){
        return $this->belongsTo(Feature::class);
    }
}
