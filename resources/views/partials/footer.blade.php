<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="widget">
                    <div class="footer-text text-left">
                        <a href="index.html"><img src="/images/faial_logo_horizontal.png" alt="" class="img-fluid"></a>
                        <p> SLOGAN</p>
                        <div class="social">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                    class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                    class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                    class="fa fa-pinterest"></i></a>
                        </div>

                        <hr class="invis">

                        <div class="newsletter-widget text-left">
                            <form class="form-inline">
                                <input type="text" class="form-control" placeholder="Enter your email address">
                                <button type="submit" class="btn btn-primary">ENVIAR</button>
                            </form>
                        </div><!-- end newsletter -->
                    </div><!-- end footer-text -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">SECÇÕES</h2>
                    <div class="link-widget">
                        <ul>
                            <li><a href="#">Sobre Nós</a></li>
                            <li><a href="#">Publicidade</a></li>
                            <li><a href="#">Escreva Para Nós</a></li>
                            <li><a href="#">Termos & Condições</a></li>
                            <li><a href="#">Regulamento Interno</a></li>
                            <li><a href="#">Politica de Privacidade</a></li>
                        </ul>

                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title"> CATEGORIAS</h2>
                    <div class="link-widget">
                        <ul>
                            @foreach ($headerItems as $item)

                            <li><a href="#">{{$item->name}} <span> ({{count($item->posts)}})</span></a></li>
                            @endforeach



                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <div class="copyright">&copy; SOMOS FAIAL. Desenvolvido por: <a href="">Ricardo Pires</a>.
                </div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->
