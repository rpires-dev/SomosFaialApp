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
        height: 5rem;
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
        width: 0rem;
        height: 100%;
        background: rgba(0, 0, 0, 0.1);
    }

    .bar-chart[animated] .bar-chart--inner {
        transition: width 1.3s;
    }

    .bar-chart.secondary {
        border-bottom: 2px dotted rgba(118, 114, 114, 0.289);

    }

    .bar-chart.secondary .bar-chart--inner {

        background: #168de6;
    }
</style>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<section class="section single-wrapper">
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong></strong> {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="container">
        <div class="row" style="justify-content: center">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="/">P??gina Principal</a></li>
                            <li class="breadcrumb-item"><a href="#">Sondagens</a></li>
                            <li class="breadcrumb-item active">{{$poll->title}}
                            </li>
                        </ol>

                        <span class="color-orange"><a href="tech-category-01.html" title="">Technology</a></span>


                        <div class="blog-meta big-meta">
                            <small><a href="tech-single.html"
                                    title="">{{Date::parse($poll->created_at)->diffForHumans()}}</a></small>
                            <small><a href="#" title=""><i class="fas fa-vote-yea"></i>
                                    {{$totalVotes}}</a></small>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                            class="down-mobile">Partilhar no Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                            class="down-mobile">Partilhar no Twitter</span></a></li>

                            </ul>
                        </div><!-- end post-sharing -->
                        <h3>{{$poll->title}}</h3>
                    </div><!-- end title -->
                    <div class="single-post-media">
                        {{-- THE POLL GOES HERE --}}
                        <div id="graphShow" style="display:{{$alreadyVote ? '' : 'none'}}">
                            @foreach ($topics as $topic)

                            <div class="bar-chart secondary" data-total="{{($topic->nr_votes/$totalVotes)*100}}"
                                animated>
                                <span class="bar-chart--text">
                                    <strong> {{$topic->title}}</strong>({{($topic->nr_votes/$totalVotes)*100}}%)</span>
                                <span class="bar-chart--inner"
                                    style="width:{{($topic->nr_votes/$totalVotes)*100}}%;"></span>
                            </div>
                            @endforeach


                        </div>



                        {{-- <img src="/upload/tech_menu_08.jpg" alt="" class="img-fluid"> --}}
                    </div><!-- end media -->

                    <div class="blog-content" id="BallotForm" style="text-align: -webkit-center;">

                        <div class="col-lg-7">

                            <form class="form-wrapper" id="votingForm" action="{{route('poll.vote')}}" method="POST"
                                style="display:{{$alreadyVote ? 'none' : ''}}">
                                @csrf
                                <div style="margin: auto;width: fit-content;">
                                    @foreach ($topics as $topic)
                                    <label class="radio">
                                        <input type="radio" name="r" value="{{$topic->id}}">
                                        <span>{{$topic->title}}</span>
                                    </label>

                                    @endforeach
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
                            @if (isset($prevPoll))
                            <div class="col-lg-6">
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="/sondagens/{{$prevPoll->slug}}"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between text-right">
                                                <img src="/upload/tech_menu_19.jpg" alt=""
                                                    class="img-fluid float-right">
                                                <h5 class="mb-1">{{$prevPoll->title}}</h5>
                                                <small>Sondagem Anterior</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            @endif
                            @if (isset($nextPoll))
                            <div class="col-lg-6">
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                        <a href="/sondagens/{{$nextPoll->slug}}"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="/upload/tech_menu_20.jpg" alt="" class="img-fluid float-left">
                                                <h5 class="mb-1">{{$nextPoll->title}}</h5>
                                                <small>Pr??xima Sondagem</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div><!-- end col -->
                            @endif
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
