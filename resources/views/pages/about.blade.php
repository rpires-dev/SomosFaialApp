@extends('layouts.index')
@section('title', 'Sobre Nós - '.setting('site.title'))
@section('description', "" )
@section('keywords', "")
@section('container')


<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-users" aria-hidden="true"></i> SOBRE NÓS <small
                        class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small>
                </h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Página Principal</a></li>
                    <li class="breadcrumb-item active">Sobre Nós</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->

<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="/images/faial_logo_horizontal.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            {!!setting('site.about')!!}
                        </div>
                    </div>
                </div>

            </div><!-- end page-wrapper -->
        </div><!-- end col -->
    </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection
