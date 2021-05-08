@extends('layouts.index')
@section('title', $post->title ." - SOMOS FAIAL")
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
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active">{{$post->title}}
                            </li>
                        </ol>

                        <span class="color-orange"><a href="/c/{{$post->category->slug}}" title="">
                                {{$post->category->name  }}
                            </a></span>

                        <h3>{{$post->title}}</h3>

                        <div class="blog-meta big-meta">
                            <small><a href="tech-single.html"
                                    title="">{{Date::parse($post->created_at)->diffForHumans()}}</a></small>
                            <small><a href="tech-author.html" title="">Por {{$post->authorId->name}}</a></small>
                            <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                        </div><!-- end meta -->

                        @include('partials.socialMediaSharing')
                    </div><!-- end title -->

                    <div class="single-post-media">
                        <img src="{{Voyager::image($post->image)}}" alt="" class="img-fluid">
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

                        <small><a href="#" title="">lifestyle</a></small>

                    </div><!-- end meta -->

                    @include('partials.socialMediaSharing')

                </div><!-- end title -->

                @include('banners.horizontalSinglePost')

                @include('posts.nextPrevious')

                @include('posts.author.aboutAuthor')

                @include('posts.relatedPosts')

                @include('comments.index')

            </div><!-- end page-wrapper -->
            @include('partials.sideBarSinglePost')
        </div><!-- end col -->

    </div><!-- end container -->
</section>
@endsection
