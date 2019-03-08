<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'title',
    ];

    function posts() {
        return $this->hasMany(Post::class);
    }
}
