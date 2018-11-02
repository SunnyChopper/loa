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

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NMZMHDX');</script>
        <!-- End Google Tag Manager -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128180547-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-128180547-1');
        </script>

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bse9ckzqs2pox7zzzhudpdxcc0gtdem3jzvjp79w5dx7qc4w"></script>
        <script type="text/javascript">
            tinymce.init({
               selector: "#post_body",
               plugins: "a11ychecker, advcode, linkchecker, powerpaste, tinymcespellchecker",
               toolbar: "a11ycheck, code"
            });
        </script>


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
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMZMHDX"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        @include('layouts.navbar')
        @yield('content')
        @include('layouts.footer')
        @include('layouts.js')
    </body>
</html>
