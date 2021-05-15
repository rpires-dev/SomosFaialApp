<?php

namespace App\Http\Controllers;

use App\Models\PostView;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Request;
use Jenssegers\Date\Date;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class BlogController extends Controller
{
    public function singlePost($slug)
    {

        Date::setLocale('pt');
        $view = [];
        $post = Post::where('slug', $slug)->firstOrFail();
        $prevPost = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $nextPost = Post::where('id', '>', $post->id)->orderBy('id')->first();
        $relatedPosts = Post::where([['id', '<>', $post->id], ['category_id', '=', $post->category_id]])->take(2)->get();
        $author = User::where('id', $post->author_id)->first();

        $view = ['author' => $author, 'post' => $post, 'relatedPosts' => $relatedPosts, 'prevPost' => $prevPost, 'nextPost' => $nextPost];

        // If post was seen by user show post else add log
        if ($post->showPost()) {
            return view('posts.show')->with($view);
        } else {

            PostView::createViewLog($post);
            $post->increment('views', 1);
            return view('posts.show')->with($view);
        }
    }

    public function ByUser($authorId, $authorName)
    {
        Date::setLocale('pt');

        $posts = Post::where('author_id', $authorId)->orderBy('id', 'DESC')->paginate(2);


        return view('posts.author.index')->with(
            [
                'posts' => $posts,
                'authorName' => ucwords($authorName),
            ]
        );
    }

    public function ByCategory($slug)
    {
        Date::setLocale('pt');

        $category_id = Category::where('slug', $slug)->pluck('id');
        $category_name = Category::where('slug', $slug)->pluck('name')->first();
        $posts = Post::where('category_id', $category_id)->orderBy('id', 'DESC')->paginate(2);


        return view('posts.category.index')->with(
            [
                'posts' => $posts,
                'category_name' => $category_name,

            ]
        );
    }
}
