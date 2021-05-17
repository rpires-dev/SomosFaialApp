@extends('layouts.index')
@section('title', setting('site.title'))
@section('description', "")
@section('keywords', "")
@section('container')

<!-- FORM style-->
<style>
    .radio {
        text-align: left;
        margin: 25px 0;
        display: block;
        cursor: pointer;
    }

    .radio input {
        display: none;
    }

    .radio input+span {
        font-family: Roboto, Arial;
        color: #ADAFB6;
        font-size: x-large;
        line-height: 22px;
        height: 22px;
        padding-left: 22px;
        display: block;
        position: relative;
    }

    .radio input+span:not(:empty) {
        padding-left: 30px;
    }

    .radio input+span:before,
    .radio input+span:after {
        content: "";
        width: 22px;
        height: 22px;
        display: block;
        border-radius: 50%;
        left: 0;
        top: 0;
        position: absolute;
    }

    .radio input+span:before {
        background: #D1D7E3;
        transition: background 0.2s ease, transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 2);
    }

    .radio input+span:after {
        background: #fff;
        transform: scale(0.78);
        transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.4);
    }

    .radio input:checked+span:before {
        transform: scale(1.04);
        background: #5D9BFB;
    }

    .radio input:checked+span:after {
        transform: scale(0.4);
        transition: transform 0.3s ease;
    }

    .radio:hover input+span:before {
        transform: scale(0.92);
    }

    .radio:hover input+span:after {
        transform: scale(0.74);
    }

    .radio:hover input:checked+span:after {
        transform: scale(0.4);
    }
</style>

{{-- Chart style --}}
<style>
    .bar-chart {
        background: #fff;
        height: 4rem;
        margin-bottom: 4rem;
    }

    .bar-chart .bar-chart--inner {
        background: #333;
        height: 65%;
        display: block;
        margin-bottom: 0.3rem;
        position: relative;
        will-change: width;
    }

    .bar-chart .bar-chart--inner:after {
        position: absolute;
        top: 0;
        right: 0;
        content: " ";
        width: 1rem;
        height: 100%;
        background: rgba(0, 0, 0, 0.1);
    }

    .bar-chart[animated] .bar-chart--inner {
        transition: width 1.3s;
    }



    .bar-chart.secondary .bar-chart--inner {
        background: #168de6;
    }
</style>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<section class="section single-wrapper">
    <div class="container">
        <div class="row" style="justify-content: center">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="#">Página Principal</a></li>
                            <li class="breadcrumb-item"><a href="#">Sondagens</a></li>
                            <li class="breadcrumb-item active">Top 10 phone applications and 2017 mobile design awards
                            </li>
                        </ol>

                        <span class="color-orange"><a href="tech-category-01.html" title="">Technology</a></span>


                        <div class="blog-meta big-meta">
                            <small><a href="tech-single.html" title="">21 July, 2017</a></small>
                            <small><a href="#" title=""><i class="fas fa-vote-yea"></i>
                                    1114</a></small>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                            class="down-mobile">Partilhar no Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                            class="down-mobile">Partilhar no Twitter</span></a></li>

                            </ul>
                        </div><!-- end post-sharing -->
                        <h3>Top 10 phone applications and 2017 mobile design awards</h3>
                    </div><!-- end title -->
                    <div class="single-post-media">
                        {{-- THE POLL GOES HERE --}}
                        <div id="graphShow">
                            <div class="bar-chart secondary" data-total="25" animated>
                                <span class="bar-chart--text">42% Unique Title Here</span>
                                <span class="bar-chart--inner" style="width:25%;"></span>
                            </div>

                            <div class="bar-chart secondary" data-total="50" animated>
                                <span class="bar-chart--text">42% Unique Title Here</span>
                                <span class="bar-chart--inner" style="width:50%;"></span>
                            </div>
                        </div>



                        {{-- <img src="/upload/tech_menu_08.jpg" alt="" class="img-fluid"> --}}
                    </div><!-- end media -->

                    <div class="blog-content" id="BallotForm" style="text-align: -webkit-center;">

                        <div class="col-lg-7">
                            <form class="form-wrapper">
                                <div style="margin: auto;width: fit-content;">
                                    <label class="radio">
                                        <input type="radio" name="r" value="1" checked>
                                        <span>Radio #1</span>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="r" value="2">
                                        <span>Radio #2</span>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="r" value="3">
                                        <span>Radio #3</span>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary" style="margin-top: 2em;">Votar <i
                                        class="fas fa-vote-yea"></i></i></button>
                            </form>
                            <br>
                        </div>
                    </div><!-- end content -->
                    <hr class="invis1">
                    <div class="custombox prevnextpost clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="tech-single.html"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between text-right">
                                                <img src="/upload/tech_menu_19.jpg" alt=""
                                                    class="img-fluid float-right">
                                                <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                                <small>Prev Post</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="tech-single.html"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="/upload/tech_menu_20.jpg" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">Let's make an introduction to the glorious world of
                                                    history</h5>
                                                <small>Next Post</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end author-box -->
                    <hr class="invis1">

                </div><!-- end page-wrapper -->
            </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    var app = {
	init: function(){
		this.cacheDOM();
		this.handleCharts();
	},
	cacheDOM: function(){
		this.$chart = $(".bar-chart");
	},
	cssSelectors: {
		chartBar: "bar-chart--inner"
	},
	handleCharts: function(){
		/*
			iterate through charts and grab total value
			then apply that to the width of the inner bar
		*/
		$.each(this.$chart, function(){
			var $this = $(this),
					total = $this.data("total"),
					$targetBar = $this.find("."+app.cssSelectors.chartBar);
					$targetBar.css("width","0%"); // zero out for animation
					setTimeout(function(){
						$targetBar.css("width",total+"%");
					},400);
		});
	}
}

app.init();
</script>
@endsection
{{-- TODO HIDE BALLOT #BallotForm & SHOW GRAPH #graphShow ON FORM REQUEST  --}}
