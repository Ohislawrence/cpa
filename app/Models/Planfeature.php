<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planfeature extends Model
{
    protected $fillable = [
        'plan_id',
        'feature_id',
        'option',
        'is_included',
    ];

    public function plans(){
        return $this->belongsTo(Plan::class);
    }
}
