<div class="custombox authorbox clearfix">
    <h4 class="small-title">Sobre o Autor</h4>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <img src="{{Voyager::image($author->avatar)}}" alt="" class="img-fluid rounded-circle">
        </div><!-- end col -->

        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <h4><a href="#">{{$author->name}}</a></h4>
            <p>{!!$author->bio !!}</p>

            <div class="topsocial">
                @if (!empty($author->facebook))
                <a href="{{$author->facebook}}" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                        class="fa fa-facebook"></i></a>
                @endif

                @if (!empty($author->twitter))
                <a href="{{$author->twitter}}" data-toggle="tooltip" data-placement="bottom" title="twitter"><i
                        class="fa fa-twitter"></i></a>
                @endif

                @if (!empty($author->linkedin))
                <a href="{{$author->linkedin}}" data-toggle="tooltip" data-placement="bottom" title="linkedin"><i
                        class="fa fa-linkedin"></i></a>
                @endif




            </div><!-- end social -->

        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end author-box -->

<hr class="invis1">
