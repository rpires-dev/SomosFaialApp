<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }
    public function termos()
    {
        return view('pages.termos');
    }
    public function privacidade()
    {
        return view('pages.privacidade');
    }
    public function regulamento()
    {
        return view('pages.regulamento');
    }
    public function documentos()
    {
        return view('pages.documentos');
    }
}
