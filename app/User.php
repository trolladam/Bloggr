<?php

namespace App;

use App\Models\Post;
use App\Models\Comment;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function posts() {
        return $this->hasMany(Post::class);
    }

    function published_comments() {
        return $this->hasMany(Comment::class);
    }

    function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->orderBy('created_at', 'desc');
    }

    function getFullnameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    function getAvatarAttribute()
    {
        $avatar_id = md5($this->email);
        return "https://www.gravatar.com/avatar/{$avatar_id}";
    }
}
