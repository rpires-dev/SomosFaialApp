@extends('layouts.index')
@section('title', setting('site.title'))
@section('description', "")
@section('keywords', "")
@section('container')
<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-pie-chart" aria-hidden="true"></i> Projetos <small
                        class="hidden-xs-down hidden-sm-down">Nulla
                        felis
                        eros, varius sit amet volutpat non. </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Página Principal</a></li>
                    <li class="breadcrumb-item active">Projetos</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->
<section class="section">
    <div class="container">
        <div class="row">

            @include('partials.sideBarProjects')

            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-grid-system">
                        <div class="row">

                            @foreach ($posts as $post)

                            <div class="col-md-6">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="/proj/{{$post->slug}}" title="">
                                            @if (!empty($post->image))

                                            <img src="{{Voyager::image($post->image)}}" alt="" class="img-fluid">
                                            @else
                                            <img src="/upload/tech_menu_01.jpg" alt="" class="img-fluid">
                                            @endif
                                            <div class="hovereffect">
                                                <span></span>
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta big-meta">
                                        <span class="color-orange"><a href="tech-category-01.html"
                                                title="">Projetos</a></span>
                                        <h4><a href="/proj/{{$post->slug}}" title="">{{$post->name}}</a></h4>
                                        <p>{{$post->excerpt}}</p>
                                        <small><a href="/proj/{{$post->slug}}" title="">14 July, 2017</a></small>
                                        <small><a href="tech-author.html" title="">by Jack</a></small>
                                        <small><a href="/proj/{{$post->slug}}" title=""><i class="fa fa-eye"></i>
                                                2887</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                            </div><!-- end col -->

                            @endforeach
                        </div><!-- end row -->
                    </div><!-- end blog-grid-system -->
                </div><!-- end page-wrapper -->

                <hr class="invis3">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">

                                {{-- xx --}}
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
