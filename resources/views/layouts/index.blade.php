<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>

    <div id="wrapper">
        @include('partials.header')
        @yield('container')
        @include('partials.footer')


        <div class="dmtop"></div>

    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    @yield('extra_js')
</body>

</html>
