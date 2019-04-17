<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use LevooLabs\Imageable\Traits\SingleImageableTrait;

class Post extends Model
{
    use SingleImageableTrait;

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

    function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->orderBy('created_at', 'desc');
    }
}
