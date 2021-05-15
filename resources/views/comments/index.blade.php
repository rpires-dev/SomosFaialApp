<style>
    .dropdown-content {
        left: -150px;
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        overflow: auto;
        box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%);
        z-index: 1;
    }
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown a:hover {
        background-color: #ddd;
    }

    .optComments a,
    button {
        text-align: left;
        border-left: 0px solid lightgrey;
        border-right: 0px solid lightgrey;
        border-bottom: 0.4px solid lightgrey;
        border-top: 0.4px solid lightgrey;
        padding: 7px;
    }

    .optComments a:hover,
    a:focus,
    button:hover,
    button:focus {
        background-color: #ddd;
        color: #0f63a4 !important;
    }

    .dropbtn {
        cursor: pointer;
    }

    .show {
        display: block;
    }

    .dot {
        margin: 2px;
        width: 6px;
        height: 6px;
        background: rgb(97, 96, 96);
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
    }

    .cancelComment {
        background: rgba(0, 0, 0, 0) linear-gradient(to right, #e50000 0px, #de595f 100%) repeat scroll 0 0 !important;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>


<div class="custombox clearfix">
    <h4 class="small-title">Deixar um comentário</h4>
    <div class="row">
        <div class="col-lg-12">
            @if (Auth::check())
            <form class="form-wrapper" action="/comments" method="POST">
                @csrf
                <textarea class="form-control" name="body" placeholder="Your comment"></textarea>
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            @else
            Para comentar connecte-se <a href="">aqui</a>
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

                <?php $counter =1; ?>

                @forelse ($post->comments as $comment)
                <div class="media">
                    <div id="myDiv"></div>
                    <a class="media-left" href="#">
                        {{-- <img src="/upload/author.jpg" alt="" class="rounded-circle"> --}}
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading user_name">{{ $comment->user->name }}
                            <small>{{Date::parse($comment->created_at)->diffForHumans()}}</small></h4>
                        {{-- LER COMENTÁRIO --}}
                        <div class="readPost" id="readPost{{$counter}}">
                            <p>{{ $comment->body }}</p>
                        </div>
                        <div class="updatePost" id="updatePost{{$counter}}" style="display: none;">
                            {{-- FORM PARA ALTERAR COMENTÁRIO --}}
                            <form class="form-wrapper" id="EditComment"
                                action="{{url('/editComment')}}/{{$comment->id}}" method="POST">
                                {{  csrf_field() }}
                                {{ method_field('PATCH') }}
                                <textarea class="form-control" name="body"
                                    placeholder="Your comment">{{ $comment->body }}</textarea>
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <button type="submit" class="btn btn-primary">Alterar</button>
                                <button type="button" class="btn btn-primary cancelComment">Cancelar</button>
                            </form>
                        </div>
                        {{-- <a href="#" class="btn btn-primary btn-sm">Reply</a> --}}
                    </div>

                    @if (Auth::check())
                    <div class="dropdown" style="width: 20px;">
                        <div onclick="showCommentOptions({{$counter}})" class="dropbtn"
                            style="text-align: -webkit-center;">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>

                        @if (Auth::user()->role->name =='admin' || Auth::user()->id == $comment->user_id)

                        <div id="myDropdown{{$counter}}" class="dropdown-content">
                            <div class="optComments" style="display: grid;">
                                {{-- <a href="#home">Apagar</a> --}}
                                <button onclick="editComment({{$counter}})">Alterar</button>
                                <button id="myBtn">Apagar</button>
                                <a href="#contact">Relatar Abuso</a>
                            </div>
                        </div>
                        @endif

                        <div id="myDropdown{{$counter}}" class="dropdown-content">
                            <a href="#contact">Relatar Abuso</a>
                        </div>
                    </div>
                    @endif
                </div>
                <hr>
                <?php $counter ++; ?>
                <!-- The Modal -->
                <div id="myModal" class="modal">

                    <!-- Modal DELETE POST -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>Tem a certeza que quer apagar o comentário?</p>
                        <form method="post" action="{{url('/removeComment')}}/{{$comment->id}}">
                            @csrf
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-sm btn-fill btn-primary">Apagar</button>
                        </form>
                    </div>

                </div>
                @empty
                <p>Este post ainda não tem comentários</p>

                @endforelse
            </div>
        </div>
    </div>
</div>
<!-- Trigger/Open The Modal -->




{{-- MODAL--}}
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
</script>

{{-- COMMENT DROPDOWN & EDIT FUCNTIONS --}}
<script>
    function editComment(i) {
      var x = document.getElementById("updatePost"+i);
      var y = document.getElementById("readPost"+i);
      if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";

      } else {
        x.style.display = "none";
        y.style.display = "block";
      }
    }

    function showCommentOptions(i) {
      document.getElementById("myDropdown"+i).classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
</script>


{{-- IF MESSAGE IS POSTED SCROLL TO DIV--}}
@if(session()->has('message'))
<script type='text/javascript' src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
<script type="text/javascript">
    $(document).ready(function (i) {
    $('html, body').animate({
        scrollTop: $("#myDiv"+i).offset().top
    }, 1000);
    });
</script>
@endif
