<?php

namespace App\Providers;

use App\User;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(190);

        Relation::morphMap([
            'posts' => Post::class,
            'users' => User::class,
            'comments' => Comment::class,
        ]);
    }
}
