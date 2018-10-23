<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/linearicons.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/nice-select.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/hexagons.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" type="text/css" />

    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
        @include('layouts.navbar')
        @yield('content')
        @include('layouts.footer')

        <script src="{{ URL::asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ URL::asset('js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/easing.min.js') }}"></script>
        <script src="{{ URL::asset('js/hoverIntent.js') }}"></script>
        <script src="{{ URL::asset('js/superfish.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ URL::asset('js/hexagons.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ URL::asset('js/jquery.counterup.min.js') }}"></script>
        <script src="{{ URL::asset('js/waypoints.min.js') }}"></script>
        <script src="{{ URL::asset('js/mail-script.js') }}"></script>
        <script src="{{ URL::asset('js/main.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>          
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> 
    </body>
</html>
