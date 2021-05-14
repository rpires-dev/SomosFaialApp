<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use TCG\Voyager\Models\Post;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(CommentRequest $request)
    {


        $post = Post::findOrFail($request->post_id);

        Comment::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'post_id' => $post->id
        ]);
        return back()->with('message', 'A sua mensagem foi enviada, voltaremos a entrar em contato consigo em breve');
    }
}
