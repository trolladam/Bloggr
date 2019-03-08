<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'topic_id',
        'description', 'content',
    ];

    function topic() {
        return $this->belongsTo(Topic::class); 
    }

    function user() {
        return $this->belongsTo(User::class);
    }
}
