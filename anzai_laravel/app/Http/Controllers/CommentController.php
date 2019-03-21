<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|max:2000',
        ]);

        $post = Post::findOrFail($params['post_id']);
        $post->comments()->create($params);

        return redirect()->route('post.show', ['post' => $post]);
    }
}
