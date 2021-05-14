@extends('layouts.index')
@section('title', 'Posts de ' . $authorName)
@section('description', "" )
@section('keywords', "")
@section('container')

<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-star bg-orange"></i> Autor: {{$authorName}}</h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Página Principal</a></li>
                    <li class="breadcrumb-item"><a href="#">Autores</a></li>
                    <li class="breadcrumb-item active">{{$authorName}}</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="custombox authorbox clearfix">
                        <h4 class="small-title">Mais sobre este Author</h4>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                <img src="/upload/author.jpg" alt="" class="img-fluid rounded-circle">
                            </div><!-- end col -->

                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <h4><a href="#">{{$authorName}}</a></h4>
                                <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur
                                    adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis
                                    tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!</p>

                                <div class="topsocial">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                            class="fa fa-facebook"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                            class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                            class="fa fa-instagram"></i></a>

                                </div><!-- end social -->

                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end author-box -->


                    <hr class="invis1">
                    @foreach ($posts as $post)
                    <div class="blog-list clearfix">
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="/p/{{$post->slug}}" title="">
                                        <img src="{{Voyager::image($post->image)}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="/p/{{$post->slug}}" title="">{{$post->title}}</a></h4>
                                <p>{{ \Illuminate\Support\Str::words($post->excerpt, 20, $end='...') }}</p>
                                <small class="firstsmall"><a class="bg-orange" href="/c/{{$post->category->slug}}"
                                        title="">
                                        @if (!empty($post->category->name))
                                        {{$post->category->name}}
                                        @endif</a></small>
                                <small><a href="/p/{{$post->slug}}"
                                        title="">{{Date::parse($post->created_at)->diffForHumans()}}</a></small>
                                <small><a href="/autores/{{$post->authorId->id}}/{{$post->authorId->name}}" title="">Por
                                        @if (!empty($post->authorId->name))
                                        {{$post->authorId->name}}
                                        @endif</a></small>
                                <small><a href="/p/{{$post->slug}}" title=""><i class="fa fa-eye"></i>
                                        {{$post->views}}</a></small>
                            </div>
                        </div>
                        <hr class="invis">


                    </div><!-- end blog-list -->
                    @endforeach

                </div><!-- end page-wrapper -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            {{-- Pagination --}}
                            {{ $posts->links('pagination.custom') }}
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
            @include('partials.sideBarSinglePost')
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection
