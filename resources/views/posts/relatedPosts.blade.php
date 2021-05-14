<div class="custombox clearfix">
    <h4 class="small-title">Artigos Relacionados</h4>
    <div class="row">

        @foreach ($relatedPosts as $post)
        <div class="col-lg-6">
            <div class="blog-box">
                <div class="post-media">
                    <a href="p/{{$post->slug}}" title="">
                        <img src="{{Voyager::image($post->image)}}" alt="" class="img-fluid">
                        <div class="hovereffect">
                            <span class=""></span>
                        </div><!-- end hover -->
                    </a>
                </div><!-- end media -->
                <div class="blog-meta">
                    <h4><a href="p/{{$post->slug}}" title="">{{$post->title}}</a>
                    </h4>
                    <small><a href="blog-category-01.html" title=""> {{$post->category->name}}</a></small>
                    <small><a href="blog-category-01.html"
                            title="">{{Date::parse($post->created_at)->diffForHumans()}}</a></small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->
        </div><!-- end col -->
        @endforeach



    </div><!-- end row -->
</div><!-- end custom-box -->
<hr class="invis1">
