<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];


    public function integration()
    {
        return $this->hasMany(Integration::class);
    }
}
