<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class PostController extends Controller {

    public function create() {
        $topics = Topic::all();
        
        return view('post.create')->with(compact('topics'));
    }

    public function store() {
        
    }

}