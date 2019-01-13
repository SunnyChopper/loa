@extends('layouts.app')

@section('content')
	<style type="text/css">
		#header {
			background-color: rgba(4,9,30,0.9);
		}

		.banner {
			background: url('https://d2v9y0dukr6mq2.cloudfront.net/video/thumbnail/SHRCTbJvgiy5agqxf/digital-hexagon-abstract-background-dark-black-tone_rv9jgr_de_thumbnail-full01.png');
			background-position: center;
			background-size: cover;
			width: 100%;
			padding-top: 118px;
			min-height: 25vh;
			padding-bottom: 32px;
		}

		#overlay {
			position: absolute;
			width: inherit;
			height: inherit;
			left: 0;
			right: 0;
			top: 0;
			background-color: rgba(0,0,0,0.5);
			padding-top: 64px;
		}

		.well {
			margin-top: auto; 
			margin-bottom: auto; 
			width: 80%;
		}

		.title {
			font-size: 26px;
			line-height: 1.1em !important;
		}

		.icon-box {
			padding: 16px;
			text-align: center;
		}

		.icon-box > i {
			font-size: 72px;
		}

		.featured-logo {
			margin: auto;
		}

		@media only screen and (max-width: 575px) {
			.banner {
				padding-top: calc(118px + 16px);
				padding-left: 16px;
				padding-right: 16px;
				padding-bottom: 16px;
			}

			.well {
				margin-top: auto; 
				margin-bottom: auto; 
				width: 100%;
				padding: 24px;
			}

			.featured-logo {
				padding-top: 16px;
				padding-bottom: 16px;
			}
		}

		@media only screen and (min-width: 575px) and (max-width: 992px) {
			.featured-logo {
				padding-top: 16px;
				padding-bottom: 16px;
			}
		}
	</style>

	<div class="banner">
		<div id="overlay"></div>
		<div class="container">
			<div class="row mt-32 mb-32">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<p class="white text-center text-uppercase">Close Friends List</p>
					<h3 class="white text-center text-uppercase title mb-8">Get exclusive daily access to Law of Ambition</h3>
					<p class="white text-center">Gain access to Law of Ambition's exclusive close friends list where he shares strategic business advice, social media marketing tips, mindset, leadership advice and more.</p>
					<h4 class="text-center white">Price: <span class="green" style="font-family: 'Oxygen';">$1K/<small>year</small></span></h4>
				</div>
			</div>
		</div>

		<div style="background-color: rgba(4,9,30,0.5);">
			<div class="container pt-16 pb-16">
				<div class="row">
					<div class="col-12">
						<p class="white text-uppercase text-center"><small>Featured In</small></p>
					</div>
				</div>

				<div class="row" style="display: flex;">
					<div class="col-lg-2 col-md-4 col-sm-6 col-6 featured-logo">
						<img src="https://www.mrhospitality.com/wp-content/uploads/2017/09/Forbes-Black-Logo.png" class="regular-image-80 regular-image-100-mobile">
					</div>
					<div class="col-lg-2 col-md-4 col-sm-6 col-6 featured-logo">
						<img src="https://www.worldforumdisrupt.com/strategy-innovation-newyork-2018/files/2017/10/BuzzFeed.png" class="regular-image-80 centered regular-image-100-mobile">
					</div>

					<div class="col-lg-2 col-md-4 col-sm-6 col-6 featured-logo">
						<img src="http://iamfirebrand.com//wp-content/uploads/2017/06/huffington-post-white.png" class="regular-image-80 centered regular-image-100-mobile">
					</div>

					<div class="col-lg-2 col-md-4 col-sm-6 col-6 featured-logo">
						<img src="https://www.logolynx.com/images/logolynx/ce/ce45fddc92f136ebb5da9fb42c0aa893.png" class="regular-image-80 centered regular-image-100-mobile">
					</div>

					<div class="col-lg-2 col-md-4 col-sm-6 col-6 featured-logo">
						<img src="http://features.laweekly.com/people-2018/images/LAW_logo.png" class="regular-image-80 centered regular-image-100-mobile">
					</div>

					<div class="col-lg-2 col-md-4 col-sm-6 col-6 featured-logo">
						<img src="https://scottmautz.com/wp-content/uploads/2018/09/inc-logo-white.png" class="regular-image-80 centered regular-image-100-mobile">
					</div>
				</div>
			</div>
		</div>

		<div class="container mt-32">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-6 col-sm-6 col-12 mt-16-mobile" style="display: flex;">
						<div class="well center-button" style="">
							<h5 class="text-center">Begin Registration</h5>
							<hr />
							<div class="form-group">
								<label>First Name:</label>
								<input type="text" id="first_name_input" class="form-control" name="first_name" required>
							</div>

							<div class="form-group">
								<label>Last Name:</label>
								<input type="text" class="form-control" name="first_name" required>
							</div>

							<div class="form-group">
								<label>Email:</label>
								<input type="email" class="form-control" name="email" required>
							</div>

							
							<button type="button" class="btn btn-success center-button">Continue to Next Step <i class="fa fa-arrow-circle-right"></i></button>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection