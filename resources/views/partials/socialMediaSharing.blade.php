<div class="post-sharing">
    <ul class="list-inline">
        <li><a href="http://www.facebook.com/sharer.php?s=100&p[url]={{Request::url()}}/&p[images][0]={{Voyager::image($post->image)}}&p[title]={{$post->title}}[summary]={{$post->excerpt}}"
                class="fb-button btn btn-primary" target="_blank"><i class="fa fa-facebook"></i> <span
                    class="down-mobile">Partilhar no
                    Facebook</span></a></li>
        <li><a href="http://twitter.com/share?text={{$post->title}}&url={{Request::url()}}&hashtags={{$post->category->name}}"
                class="tw-button btn btn-primary" target="_blank"><i class="fa fa-twitter"></i> <span
                    class="down-mobile">Tweetar no
                    Twitter</span></a></li>

    </ul>
</div><!-- end post-sharing -->
