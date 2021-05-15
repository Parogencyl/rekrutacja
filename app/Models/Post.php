<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'text'
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_post');
    }
}
