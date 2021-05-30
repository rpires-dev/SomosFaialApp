@extends('layouts.index')
@section('title', setting('site.title'))
@section('description', "")
@section('keywords', "")
@section('container')

<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="/">Página Principal</a></li>
                            <li class="breadcrumb-item"><a href="#">Projetos</a></li>
                            <li class="breadcrumb-item active">{{$post->name}}
                            </li>
                        </ol>

                        {{-- CONTENT HERE --}}




                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
