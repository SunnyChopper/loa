<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon-->
        <link rel="shortcut icon" href="img/fav.png">

        <!-- Author Meta -->
        <meta name="author" content="Law of Ambition">

        <!-- Meta Description -->
        @if(isset($page_description))
            <meta name="description" content="{{ $page_description }}">
        @else
            <meta name="description" content="">
        @endif

        <!-- meta character set -->
        <meta charset="UTF-8">

        @if(isset($page_title))
            <title>{{ $page_title }} - Law of Ambition</title>
        @else
            <title>Law of Ambition</title>
        @endif

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,400,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Oxygen:100,400,600" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    </head>
    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
        @include('layouts.navbar')
        @yield('content')
        @include('layouts.footer')
        @include('layouts.js')
    </body>
</html>
