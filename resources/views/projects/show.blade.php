@extends('layouts.index')
@section('title', $post->name ." - SOMOS FAIAL")
@section('description', $post->excerpt )
@section('keywords', $post->slug)
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

                        <span class="color-orange">
                            {{-- #TODO MAKE AN EVENT TYPE LIST --}}
                            {{-- <a href="/t/{{$post->type->slug}}" title=""> --}}
                            {{-- {{$post->type->name}  }} --}}
                            </a></span>

                        <h3>{{$post->title}}</h3>

                        <div class="blog-meta big-meta">
                            <small><a href="tech-single.html"
                                    title="">{{Date::parse($post->created_at)->diffForHumans()}}</a></small>
                            <small>

                                {{-- MAKE EVENT VIEWS COUNT? --}}
                                {{-- <small><a href="#" title=""><i class="fa fa-eye"></i> {{$post->views}}</a></small>
                            --}}
                        </div><!-- end meta -->

                        {{-- @include('partials.socialMediaSharing') --}}
                    </div><!-- end title -->

                    <div class="single-post-media">
                        @if (!empty(Voyager::image($post->image)))

                        <img src="{{Voyager::image($post->image)}}" alt="" class="img-fluid">
                        @endif
                    </div><!-- end media -->

                    <div class="blog-content">
                        <div class="pp">
                            <p>{{$post->excerpt}}</p>
                            <p>{!! $post->body!!}</p>

                        </div><!-- end pp -->

                    </div><!-- end pp -->
                </div><!-- end content -->

                <div class="blog-title-area">
                    <div class="tag-cloud-single">

                        {{-- <small><a href="#" title="">lifestyle</a></small> --}}

                    </div><!-- end meta -->

                    {{-- @include('partials.socialMediaSharing') --}}

                </div><!-- end title -->

                @include('banners.horizontalSinglePost')

                @include('posts.nextPrevious', ['nextPost' => $nextPost,'prevPost' => $prevPost])


                {{-- @include('comments.index') --}}

            </div><!-- end page-wrapper -->
            @include('partials.sideBarCalendar')
        </div><!-- end col -->

    </div><!-- end container -->
</section>

@endsection
