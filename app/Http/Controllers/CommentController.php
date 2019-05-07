<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function reply(Comment $comment, Request $request)
    {
        if (!$comment->is_reply) {
            $comment->comments()->create([
                'user_id' => Auth::user()->id,
                'body' => $request->reply
            ]);
        }
        if ($request->redirect_url) {
            return redirect($request->redirect_url)
                ->with(['success' => __("Reply saved successfully")]);
        }
        return back()
            ->with(['success' => __("Reply saved successfully")]);
    }
}
