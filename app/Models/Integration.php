<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
    protected $fillable = [
        'appname',
        'slug',
        'icon',
        'desc',
        'fImage',
        'shortDesc',
        'appcategory_id',
        'apptype_id',
        'support_id'
    ];

    public function appcategory()
    {
        return $this->belongsTo(Appcategory::class);
    }

    public function apptype()
    {
        return $this->belongsTo(Apptype::class);
    }

    public function support()
    {
        return $this->belongsTo(Support::class);
    }

    
}
