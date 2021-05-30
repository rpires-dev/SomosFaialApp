<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class CalendarController extends Controller
{
    public function index()
    {

        Date::setLocale('pt');
        $posts = Calendar::all();

        return view('calendar.index')->with(
            [
                'posts' => $posts,
            ]
        );
    }

    public function show($slug)
    {

        Date::setLocale('pt');
        $view = [];
        $post = Calendar::where('slug', $slug)->firstOrFail();
        $prevPost = Calendar::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $nextPost = Calendar::where('id', '>', $post->id)->orderBy('id')->first();


        $view = ['post' => $post, 'prevPost' => $prevPost, 'nextPost' => $nextPost];

        return view('calendar.show')->with($view);
    }
}
