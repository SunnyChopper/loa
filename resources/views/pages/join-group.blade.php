<html>
	<head>
		<!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Law of Ambition - Join Group</title>

		<!-- Favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon-16x16.png') }}">
        <link rel="manifest" href="{{ URL::asset('site.webmanifest') }}">
        <link rel="mask-icon" href="{{ URL::asset('safari-pinned-tab.svg') }}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffc40d">
        <meta name="theme-color" content="#ffffff">

        <!-- Author Meta -->
        <meta name="author" content="Law of Ambition">

        <!-- Meta Description -->
        @if(isset($page_description))
            <meta name="description" content="{{ $page_description }}">
        @else
            <meta name="description" content="No sympathy for the lazy.">
        @endif

        <!-- meta character set -->
        <meta charset="UTF-8">

        <!-- Social Media -->
        @if(isset($seo_data["og_title"]))
            <meta property="og:title" content="{{ $seo_data["og_title"] }}">
        @else
            <meta property="og:title" content="Law of Ambition">
        @endif

        @if(isset($seo_data["og_description"]))
            <meta property="og:description" content="{{ $seo_data["og_description"] }}">
        @else
            <meta property="og:description" content="No sympathy for the lazy.">
        @endif
        
        @if(isset($seo_data["og_image"]))
            <meta property="og:image" content="{{ $seo_data["og_image"] }}">
        @else
            <meta property="og:image" content="{{ URL::asset('img/Front-Image.jpg') }}">
        @endif

        @if(isset($seo_data["og_url"]))
            <meta property="og:url" content="{{ $seo_data["og_url"] }}">
        @else
            <meta property="og:url" content="{{ url('/') }}">
        @endif

        @if(isset($page_title))
            <title>{{ $page_title }} - Law of Ambition</title>
        @else
            <title>Law of Ambition</title>
        @endif

        <meta name="twitter:site" content="@lawofambition">
        <meta name="twitter:card" content="summary_large_image">

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

        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,400,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Oxygen:100,400,600" rel="stylesheet" type="text/css">

        <style type="text/css">
			#facebook_link:hover {
				background-color: white !important;
				color: rgb(46, 204, 113);
				border: 1px solid rgb(46, 204, 113);
			}
		</style>
	</head>
	<body style="display: flex;">
		<div style="display: block; margin: auto;">
			<div class="container">
				<img src="{{ URL::asset('img/logo.png') }}" class="regular-image center-button" style="filter: brightness(0%); width: 60%;">
				<h1 class="text-center mt-16" style="font-family: 'Raleway', sans-serif;">Join the Private Facebook Group</h1>
				<p class="text-center" style="font-family: 'Oxygen', sans-serif;">Simply enter your email below and unlock the link</p>
				<form id="submission_form">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12">
							<input type="text" id="email" class="form-control" placeholder="Email" style="text-align: center;" required>
							<p id="error" style="text-align: center; margin-top: 8px; margin-bottom: -8px; color: #cf000f;"></p>
						</div>
						<div class="col-lg-8 offset-lg-2 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12 mt-16">
							<a href="" id="facebook_link" class="genric-btn success rounded center-button" style="font-size: 18px; width: fit-content; background-color: rgb(46, 204, 113);">Click Here to Join</a>
							<input type="submit" id="submit_button" value="Get Invite Link" class="genric-btn primary rounded center-button" style="font-size: 18px;" required>
						</div>
					</div>
				</form>
			</div>
		</div>



		<script src="{{ URL::asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#facebook_link").hide();
				$("#error").hide();
				$("#submission_form").on('submit', function(e) {
					e.preventDefault();
					$("#error").hide();
					if (validateEmail() != true) {
						$("#error").html('Please enter a valid email.');
						$("#error").show();	
					} else {
						$("#submit_button").attr('disabled', true);
						$("#submit_button").val('Processing...');
						setTimeout(function() {
							$("#email").hide();
	    					$("#submit_button").hide();
							$("#facebook_link").show();
						}, 1500);
					}
				});
			});

			function validateEmail(mail) {
				if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($("#email").val())) {
					return (true);
				} else {
				    return (false);
				}
			}

		</script>
	</body>
</html>