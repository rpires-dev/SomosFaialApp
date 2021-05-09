<?php

namespace App\Http\Controllers;

use Jenssegers\Date\Date;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class LandingPageController extends Controller
{
    public function index()
    {

        Date::setLocale('pt');
        $featuredPost1 = Post::where('featured', 1)->orderBy('id')->take(1)->get();
        $featuredPost2 = Post::where('featured', 1)->orderBy('id')->skip(1)->take(1)->get();
        $featuredPost3 = Post::where('featured', 1)->orderBy('id')->skip(2)->take(1)->get();

        $recentNews = Post::where('featured', 0)->orderBy('id', 'DESC')->paginate(10);



        return view('pages.landingPage')->with(
            [
                'featuredPost1' => $featuredPost1,
                'featuredPost2' => $featuredPost2,
                'featuredPost3' => $featuredPost3,
                'recentNews' => $recentNews,


            ]
        );
    }
}
