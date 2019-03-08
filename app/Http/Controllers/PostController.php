<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Topic;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller {

    public function create() {
        $topics = Topic::all();
        
        return view('post.create')->with(compact('topics'));
    }

    public function store(PostRequest $request) {
        $post = Auth::user()
            ->posts()
            ->create($request->post);

        return redirect()
            ->route('post.edit', ['post' => $post])
            ->with('success', __('Post created successfully'));
    }

    public function edit(Post $post)
    {
        $topics = Topic::all();

        return view('post.edit')->with(compact('post', 'topics'));
    }

}