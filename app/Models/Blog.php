<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'banner',
        'desc',
        'user_id',
        'category',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function cat()
    {
        return $this->belongsTo('App\Models\Blogcategory', 'category', 'id');
    }
}
