<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    function rules() {
        return [
            'post.title' => 'required|max:190',
            'post.topic_id' => 'required|exists:topics,id',
            'post.description' => 'required|max:190',
            'post.content' => 'required',
        ];        
    }
}
