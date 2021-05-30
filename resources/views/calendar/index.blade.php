@extends('layouts.index')
@section('title', setting('site.title'))
@section('description', "")
@section('keywords', "")
@section('container')
@section('extra_css')
<link href="/css/events.css" rel="stylesheet">
@endsection
<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-calendar" aria-hidden="true"></i> Calendário de Eventos <small
                        class="hidden-xs-down hidden-sm-down">Nulla
                        felis
                        eros, varius sit amet volutpat non. </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Página Principal</a></li>
                    <li class="breadcrumb-item active">Eventos</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->
<section id="cd-timeline" class="cd-container">

    {{-- Helpfull classes
   <div class="cd-timeline-img cd-picture">
   <div class="cd-timeline-img cd-movie">
   <div class="cd-timeline-img cd-location">

 --}}

    @foreach ($posts as $post)
    <div class="cd-timeline-block">
        <div class="cd-timeline-img cd-picture">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-picture.svg" alt="Picture">
        </div> <!-- cd-timeline-img -->

        <div class="cd-timeline-content">
            <h2>{{$post->title}}</h2>
            <p>{{$post->excerpt}}
            </p>
            <a href="/e/{{$post->slug}}" id="verMais" class="cd-read-more">Ver Evento</a>
            <span class="cd-date">{{Date::parse($post->created_at)->format('d M')}}</span>
        </div> <!-- cd-timeline-content -->
    </div> <!-- cd-timeline-block -->
    @endforeach



</section> <!-- cd-timeline -->

@endsection
