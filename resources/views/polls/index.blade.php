@extends('layouts.index')
@section('title', setting('site.title'))
@section('description', "")
@section('keywords', "")
@section('container')

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-pie-chart" aria-hidden="true"></i> Sondagens <small
                        class="hidden-xs-down hidden-sm-down">Nulla
                        felis
                        eros, varius sit amet volutpat non. </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Página Principal</a></li>
                    <li class="breadcrumb-item active">Sondagens</li>
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
                    <div class="blog-custom-build">

                        @foreach ($polls as $poll)
                        <div class="blog-box">
                            <div class="post-media">
                                <a href="/sondagens/{{$poll->slug}}" title="">
                                    <img src="/upload/tech_menu_20.jpg" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span class="videohover"></span>
                                    </div>
                                    <!-- end hover -->
                                </a>
                            </div>
                            <!-- end media -->
                            <div class="blog-meta big-meta text-center">
                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                                <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                                <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i
                                                    class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                                <h4><a href="/sondagens/{{$poll->slug}}" title="">{{$poll->title}}</a></h4>
                                {{-- <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et
                                    pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enimcerat
                                    elicerat eli nibh, maximus ac felis nec, maximus tempor odio.</p> --}}
                                <small><a href="tech-category.html" title="">Videos</a></small>
                                <small><a href="/sondagens/{{$poll->slug}}" title="">18 July, 2017</a></small>
                                {{-- <small><a href="tech-author.html" title="">by Amanda</a></small> --}}
                                <small><a href="#" title=""><i class="fas fa-vote-yea"></i>
                                        1114</a></small>
                            </div><!-- end meta -->
                        </div> <!-- end blog-box -->

                        <hr class="invis">
                        @endforeach



                    </div><!-- end blog-custom-build -->
                </div><!-- end page-wrapper -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->


        </div>
    </div><!-- end container -->
</section>



@endsection
