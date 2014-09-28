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

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('assets/js/modernizr.js') }}"></script>

    @if ( Request::is('dashboard/sensors*'))
    <script src="http://maps.googleapis.com/maps/api/js?key={{ getenv('GOOGLE_MAPS_APIKEY') }}&sensor=true"></script>
    @endif
</head>
<body>
    @include('partials.topnav')

    <div class="row">
        @include('partials.messages')
    </div>
    <div class="row">
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/foundation.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @if ( Request::is('dashboard/sensors*'))
    <script src="{{ asset('assets/js/map.js') }}"></script>
    @endif
</body>
</html>