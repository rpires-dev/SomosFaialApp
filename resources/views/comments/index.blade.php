<div class="custombox clearfix">
    <h4 class="small-title">Deixar um comentário</h4>
    <div class="row">
        <div class="col-lg-12">
            @if (Auth::check())
            <form class="form-wrapper" action="/comments" method="POST">
                @csrf
                <textarea class="form-control" name="body" placeholder="Your comment"></textarea>
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </form>
            @endif
        </div>
    </div>
</div>

<hr class="invis1">
<div class="custombox clearfix">
    <h4 class="small-title"><span>Comentários({{$post->comments->count()}})
        </span></h4>

    <div class="row">
        <div class="col-lg-12">
            <div class="comments-list">
                @forelse ($post->comments as $comment)
                <div id="myDiv"> </div>
                <div class="media">
                    <a class="media-left" href="#">
                        <img src="/upload/author.jpg" alt="" class="rounded-circle">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading user_name">{{ $comment->user->name }}
                            <small>{{Date::parse($comment->created_at)->diffForHumans()}}</small></h4>
                        <p>{{ $comment->body }}</p>
                        {{-- <a href="#" class="btn btn-primary btn-sm">Reply</a> --}}
                    </div>
                </div>
                @empty
                <p>Este post ainda não tem comentários</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src='http://code.jquery.com/jquery-1.11.0.min.js'></script>

@if(session()->has('message'))
<script type="text/javascript">
    $(document).ready(function (i) {
    $('html, body').animate({
        scrollTop: $("#myDiv"+i).offset().top
    }, 1000);
});
</script>
@endif
