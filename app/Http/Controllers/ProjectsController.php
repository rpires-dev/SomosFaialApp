<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class ProjectsController extends Controller
{
    public function index()
    {

        Date::setLocale('pt');
        $posts = Project::all();

        return view('projects.index')->with(
            [
                'posts' => $posts,
            ]
        );
    }

    public function show($slug)
    {

        Date::setLocale('pt');
        $view = [];
        $post = Project::where('slug', $slug)->firstOrFail();
        $prevPost = Project::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $nextPost = Project::where('id', '>', $post->id)->orderBy('id')->first();


        $view = ['post' => $post, 'prevPost' => $prevPost, 'nextPost' => $nextPost];

        return view('projects.show')->with($view);
    } //
}
