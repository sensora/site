<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Home') :: Sensora</title>

    <link rel="stylesheet" href="{{ asset('assets/css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/foundation.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pipe.css') }}">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>

    @if ( Request::is('dashboard/sensors*'))
    <script src="http://maps.googleapis.com/maps/api/js?key={{ getenv('GOOGLE_MAPS_APIKEY') }}&sensor=true"></script>
    @endif
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-55145581-1', 'auto');
    ga('send', 'pageview');

    </script>
</head>
<body>
    @include('partials.topnav')

    <div class="row">
        @include('partials.messages')
    </div>

    @yield('content')

    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/foundation.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @if ( Request::is('dashboard/sensors*'))
    <script src="{{ asset('assets/js/map.js') }}"></script>
    @endif
    @if ( Request::is('/') )
    <script src="{{ asset('assets/js/jquery.videoBG.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('.video01').videoBG({
            mp4:'{{ asset('assets/videos/tomasMexicoFin.mp4') }}',
            webm:'{{ asset('assets/videos/tomasMexicoFin.webm') }}',
            poster: '{{ asset('assets/videos/tomasMexicoFin.jpg') }}',
            scale:true,
            loop: true,
            zIndex: 1
        });
    });
    </script>
    @endif
</body>
</html>