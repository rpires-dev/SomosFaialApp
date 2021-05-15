<header class="tech-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="" alt="">
                <img src="/images/faial_logo1.png" alt="" style="width: 64px;">
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="tech-index.html">Home</a> -->
                    </li>
                    <li class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Noticias</a>
                        <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                            <li>
                                <div class="container">
                                    <div class="mega-menu-content clearfix">
                                        <div class="tab">
                                            <?php $counter= 1; ?>
                                            @foreach ($headerItems as $item)
                                            <button class="tablinks {{$counter ==1 ? 'active' : '' }}"
                                                onclick="openCategory(event, 'cat0{{$counter}}')">{{$item->name}}</button>

                                            <?php $counter++; ?>
                                            @endforeach
                                        </div>

                                        <div class="tab-details clearfix">
                                            <?php $counter= 1; ?>
                                            @foreach ($headerItems as $item)
                                            <div id="cat0{{$counter}}"
                                                class="tabcontent {{$counter ==1 ? 'active' : '' }}">
                                                <div class="row">

                                                    @foreach ($item->posts as $post)
                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                        <div class="blog-box">
                                                            <div class="post-media">
                                                                <a href="/p/{{$post->slug}}" title="">
                                                                    <img src="{{Voyager::image($post->image)}}" alt=""
                                                                        class="img-fluid"
                                                                        style="width:188px;height:108px;object-fit: contain;">
                                                                    <div class="hovereffect">
                                                                    </div><!-- end hover -->
                                                                    <span
                                                                        class="menucat">{{$post->category->name}}</span>
                                                                </a>
                                                            </div><!-- end media -->
                                                            <div class="blog-meta">
                                                                <h4><a href="/p/{{$post->slug}}"
                                                                        title="">{{$post->title}}</a></h4>
                                                            </div><!-- end meta -->
                                                        </div><!-- end blog-box -->
                                                    </div>
                                                    @endforeach

                                                </div><!-- end row -->
                                            </div>
                                            <?php $counter++; ?>
                                            @endforeach


                                        </div><!-- end tab-details -->
                                    </div><!-- end mega-menu-content -->
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sobre">Sobre Nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Projetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Calendário de Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Sondagens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contacto</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-book"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->
