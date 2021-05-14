<hr class="invis1">
<div class="custombox prevnextpost clearfix">
    <div class="row">

        @if (isset($prevPost))
        <div class="col-lg-6">
            <div class="blog-list-widget">
                <div class="list-group">
                    <a href="/p/{{$prevPost->slug}}"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between text-right">
                            <img src="{{Voyager::image($prevPost->image)}}" alt="" class="img-fluid float-right">
                            <h5 class="mb-1">{{$prevPost->title}}</h5>
                            <small>Artigo Anterior</small>
                        </div>
                    </a>
                </div>
            </div>
        </div><!-- end col -->
        @else
        <div class="col-lg-6">
            <div class="blog-list-widget">
                <div class="list-group">
                    <a href="javascript:void(0);"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between text-right">
                            <img src="" alt="" class="img-fluid float-right">
                            <h5 class="mb-1"></h5>
                            <small>Sem Artigos Anteriores</small>
                        </div>
                    </a>
                </div>
            </div>
        </div><!-- end col -->
        @endif

        @if (isset($nextPost))
        <div class="col-lg-6">
            <div class="blog-list-widget">
                <div class="list-group">
                    <a href="/p/{{$nextPost->slug}}"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="{{Voyager::image($nextPost->image)}}" alt="" class="img-fluid float-left">
                            <h5 class="mb-1">{{$nextPost->title}}</h5>
                            <small>Próximo Artigo</small>
                        </div>
                    </a>
                </div>
            </div>
        </div><!-- end col -->
        @else
        <div class="col-lg-6">
            <div class="blog-list-widget">
                <div class="list-group">
                    <a href="javascript:void(0);"
                        class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="" alt="" class="img-fluid float-left">
                            <h5 class="mb-1"></h5>
                            <small></small>
                        </div>
                    </a>
                </div>
            </div>
        </div><!-- end col -->
        @endif

    </div><!-- end row -->
</div><!-- end author-box -->

<hr class="invis1">
