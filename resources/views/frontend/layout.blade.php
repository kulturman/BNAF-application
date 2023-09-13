<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>bnaf | Bâtir une solidatité</title>
        <link href="{{ url('frontend/css/custom.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/responsive.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/color.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/all.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ url('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="icon" href="images/bnaf1.png" type="image/png">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    </head>
    <body>
        <!--Wrapper Start-->
        <div class="wrapper">
            <!--Header Start-->
            @include('frontend.header')
            @yield('content')
            @include('frontend.footer')
            <div class="overlay"></div>
        </div>
        <!--Wrapper End-->
        <!-- JS -->
        <script src="{{ url('frontend/js/jquery.min.js') }}"></script>
        <script src="{{ url('frontend/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('frontend/js/owl.carousel.min.js') }}"></script>
        <script src="{{ url('frontend/js/jquery.prettyPhoto.js') }}"></script>
        <script src="{{ url('frontend/js/custom.js') }}"></script>
    </body>
</html>