@extends('layouts.index')
@section('title', 'SOMOS FAIAL')
@section('description', "" )
@section('keywords', "")
@section('container')
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">

            {{-- MAIN POST --}}
            @foreach ($featuredPost1 as $post)
            <div class="first-slot">
                <div class="masonry-box post-media">
                    <img src="{{Voyager::image($post->image)}}" alt="" class="img-fluid"
                        style="object-fit: contain;height: 350px;">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="/c/{{$post->category->slug}}"
                                        title="">{{$post->category->name}}</a></span>
                                <h4><a href="/p/{{$post->slug}}" title=""> {{$post->title}}</a></h4>
                                <small><a href="/p/{{$post->slug}}"
                                        title="">{{Date::parse($post->created_at)->diffForHumans()}}</a></small>
                                <small><a href="tech-author.html" title="">Por {{$post->authorId->name}} </a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->
            @endforeach
            @foreach ($featuredPost2 as $post)
            {{-- SECOND MAIN --}}
            <div class="second-slot">
                <div class="masonry-box post-media">
                    <img src="{{Voyager::image($post->image)}}" alt="" class="img-fluid"
                        style="height: 280px;object-fit: contain;">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="/c/{{$post->category->slug}}"
                                        title="">{{$post->category->name}}</a></span>
                                <h4><a href="/p/{{$post->slug}}" title=""> {{$post->title}}</a></h4>
                                <small><a href="/p/{{$post->slug}}"
                                        title="">{{Date::parse($post->created_at)->diffForHumans()}}</a></small>
                                <small><a href="tech-author.html" title="">Por {{$post->authorId->name}}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->
            @endforeach
            @foreach ($featuredPost3 as $post)
            {{-- THIRD MAIN --}}
            <div class="last-slot">
                <div class="masonry-box post-media">
                    <img src="{{Voyager::image($post->image)}}" alt="" class="img-fluid"
                        style="height: 280px;object-fit: contain;">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="/c/{{$post->category->slug}}"
                                        title="">{{$post->category->name}}</a></span>
                                <h4><a href="/p/{{$post->slug}}" title=""> {{$post->title}}</a></h4>
                                <small><a href="/p/{{$post->slug}}"
                                        title="">{{Date::parse($post->created_at)->diffForHumans()}}</a></small>
                                <small><a href="tech-author.html" title="">Por {{$post->authorId->name}}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->
            @endforeach
        </div><!-- end masonry -->
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Noticias Recentes <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->
                    <div class="blog-list clearfix">
                        <?php $counter = 1 ?>
                        @foreach ($recentNews as $post)
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
                                        1114</a></small>
                            </div>
                        </div>

                        @if ($counter == 5)
                        {{-- BANNER --}}
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="upload/banner_02.jpg" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end col -->
                        </div>
                        @endif
                        <hr class="invis">
                        <?php $counter++; ?>
                        @endforeach


                    </div>
                </div>
                <hr class="invis">


                {{-- PAGINATE --}}
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                                {{-- Pagination --}}
                                {{ $recentNews->links('pagination.custom') }}
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            @include('partials.sideBar')
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
