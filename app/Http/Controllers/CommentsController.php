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
        return back()->with('message', '');
    }

    public function update($id)
    {

        //validate as usual
        request()->validate([
            'body' => 'required|max:1000'

        ]);

        //Now instead of just creating a new one we are going to update the one we want
        Comment::find($id)->update([
            'body' => request('body'),
            'user_id' => Auth::id(),
            'post_id' => request('post_id')
        ]);

        //some fancy feedback message

        return back()->with('message', '');
    }



    public function delete($id)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
        }
        return back()->with('message', '');
    }
}
