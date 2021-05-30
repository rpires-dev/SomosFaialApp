@extends('layouts.index')
@section('title', setting('site.title'))
@section('description', "")
@section('keywords', "")
@section('container')
<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-lock" aria-hidden="true"></i>Politica de Privacidade <small
                        class="hidden-xs-down hidden-sm-down">Nulla
                        felis
                        eros, varius sit amet volutpat non. </small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Página Principal</a></li>
                    <li class="breadcrumb-item active">Politica de Privacidade</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->
<section class="section">
    <div class="container">
        <div class="row">
            {!!setting('site.privacy')!!}


            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-grid-system">
                        <div class="row">


                        </div><!-- end row -->
                    </div><!-- end blog-grid-system -->
                </div><!-- end page-wrapper -->

                <hr class="invis3">


            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
