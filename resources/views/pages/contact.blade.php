@extends('layouts.index')
@section('title', setting('site.title'))
@section('description', "")
@section('keywords', "")
@section('container')


<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-envelope-open-o bg-orange"></i> Contact us <small
                        class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small>
                </h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->

@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong></strong> {{ session()->get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="col-lg-5">
                            {!!setting('site.contacto')!!}
                        </div>
                        <div class="col-lg-7">
                            <form action="" method="post" action="{{ route('contact.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}"
                                        name="name" id="name">

                                    <!-- Error -->
                                    @if ($errors->has('name'))
                                    <div class="error">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}"
                                        name="email" id="email">

                                    @if ($errors->has('email'))
                                    <div class="error">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control {{ $errors->has('phone') ? 'error' : '' }}"
                                        name="phone" id="phone">

                                    @if ($errors->has('phone'))
                                    <div class="error">
                                        {{ $errors->first('phone') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}"
                                        name="subject" id="subject">

                                    @if ($errors->has('subject'))
                                    <div class="error">
                                        {{ $errors->first('subject') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}"
                                        name="message" id="message" rows="4"></textarea>

                                    @if ($errors->has('message'))
                                    <div class="error">
                                        {{ $errors->first('message') }}
                                    </div>
                                    @endif
                                </div>

                                <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
                            </form>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<script>
    $("#MyButton").click(function() {
    alert('Confirm to refresh alert messages.');
    $("#refreshDivID").load("#refreshDivID .reloaded-divs > *");
  });
</script>

@endsection
