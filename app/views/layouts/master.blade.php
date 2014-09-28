<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Home') :: Sensora</title>

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,300,200,100">
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
    <script src="//maps.googleapis.com/maps/api/js?key={{ getenv('GOOGLE_MAPS_APIKEY') }}&sensor=true"></script>
    @endif
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-55145581-1', 'auto');
    ga('send', 'pageview');

    </script>

    <meta name="description" content="A sensor collects enviromental data, such as temperature, atmospheric pressure, humity, light and noise intensity, altitude, plus others. These sensors send the data to the Open API so other users be able to consult it." />
        <!-- Google Authorship and Publisher Markup -->
    <link rel="author" href="https://plus.google.com/+Sensora/posts"/>
    <link rel="publisher" href="https://plus.google.com/+Sensora"/>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Open data sensor grid network feeded by sensors scatered around the city.">
    <meta itemprop="description" content="A sensor collects enviromental data, such as temperature, atmospheric pressure, humity, light and noise intensity, altitude, plus others. These sensors send the data to the Open API so other users be able to consult it.">
    <meta itemprop="image" content="{{ asset('assets/img/sensora.jpg') }}">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="{{ asset('assets/img/sensora.jpg') }}">
    <meta name="twitter:site" content="@sensoranet">
    <meta name="twitter:title" content="Open data sensor grid network feeded by sensors scatered around the city.">
    <meta name="twitter:description" content="A sensor collects enviromental data, such as temperature, atmospheric pressure, humity, light and noise intensity, altitude, plus others. These sensors send the data to the Open API so other users be able to consult it.">
    <meta name="twitter:creator" content="@sensoranet">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image:src" content="{{ asset('assets/img/sensora.jpg') }}">
    <!-- Open Graph data -->
    <meta property="og:title" content="Open data sensor grid network feeded by sensors scatered around the city." />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ route('home') }}" />
    <meta property="og:image" content="{{ asset('assets/img/sensora.jpg') }}" />
    <meta property="og:description" content="A sensor collects enviromental data, such as temperature, atmospheric pressure, humity, light and noise intensity, altitude, plus others. These sensors send the data to the Open API so other users be able to consult it." />
    <meta property="og:site_name" content="Open data sensor grid network feeded by sensors scatered around the city." />
</head>
<body>
    @include('partials.topnav')

    @if ( ! Request::is('/') )
    <div class="row">
        @include('partials.messages')
    </div>
    @endif

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
        home=true;

        $(window).scroll(function(e) {
            var scroll_position     = $(window).scrollTop();
            var centroPantalla      = scroll_position + altoPagina;

            if(scroll_position >= (altoPagina/2)-150){ $(".top-bar").addClass('navegacionActiva'); }
            else { $(".top-bar").removeClass('navegacionActiva'); }
        });
    });
    </script>
    @endif
</body>
</html>