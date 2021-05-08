<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class BlogController extends Controller
{
    public function singlePost($slug)
    {
        Date::setLocale('pt');

        $post = Post::where('slug', $slug)->first();


        return view('posts.show')->with(
            [
                'post' => $post
            ]
        );
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
