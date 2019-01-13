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
			min-height: 75vh;
			display: flex;
		}

		#overlay {
			position: absolute;
			width: inherit;
			height: inherit;
			left: 0;
			right: 0;
			top: 0;
			background-color: rgba(0,0,0,0.5);/
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
	</style>

	<div class="banner">
		<div id="overlay"></div>
		<div class="container" style="margin: auto;">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-12">
					<p class="white text-center text-uppercase">Get 1-on-1 Mentoring with Luis</p>
					<h3 class="white text-center text-uppercase title mb-8">Over $1M Sold Over The Internet</h3>
					<p class="white text-center d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
					<div class="videoWrapper">
						<!-- Copy & Pasted from YouTube -->
						<iframe width="560" height="349" src="https://www.youtube.com/embed/CBHvh6HShzk?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-16-mobile" style="display: flex;">
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

						<div class="form-group">
							<button type="button" class="btn btn-success center-button">Continue to Next Step <i class="fa fa-arrow-circle-right"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div style="background-color: rgba(4,9,30,1);">
		<div class="container pt-32 pb-32">
			<div class="row">
				<div class="col-12">
					<p class="white text-uppercase text-center"><small>Featured In</small></p>
				</div>
			</div>

			<div class="row" style="display: flex;">
				<div class="col-lg-3 col-md-3 col-sm-6 col-6 featured-logo">
					<img src="https://www.mrhospitality.com/wp-content/uploads/2017/09/Forbes-Black-Logo.png" class="regular-image-70 regular-image-100-mobile">
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-6 featured-logo">
					<img src="https://www.worldforumdisrupt.com/strategy-innovation-newyork-2018/files/2017/10/BuzzFeed.png" class="regular-image-70 centered regular-image-100-mobile">
				</div>

				<div class="col-lg-3 col-md-3 col-sm-6 col-6 featured-logo">
					<img src="http://iamfirebrand.com//wp-content/uploads/2017/06/huffington-post-white.png" class="regular-image-70 centered regular-image-100-mobile">
				</div>

				<div class="col-lg-3 col-md-3 col-sm-6 col-6 featured-logo">
					<img src="https://www.logolynx.com/images/logolynx/ce/ce45fddc92f136ebb5da9fb42c0aa893.png" class="regular-image-70 centered regular-image-100-mobile">
				</div>
			</div>
		</div>
	</div>

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center text-uppercase" style="font-weight: 400;">What You Will Get</h3>
			</div>
		</div>

		<div class="row mt-64">
			<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-8-mobile mb-8-mobile">
				<div class="icon-box">
					<i class="fa fa-phone"></i>
					<h4 class="text-center mt-16" style="font-weight: 400;">Weekly Mentoring Calls</h4>
					<p class="text-center mt-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-8-mobile mb-8-mobile">
				<div class="icon-box">
					<i class="fa fa-phone"></i>
					<h4 class="text-center mt-16" style="font-weight: 400;">Weekly Mentoring Calls</h4>
					<p class="text-center mt-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-8-mobile mb-8-mobile">
				<div class="icon-box">
					<i class="fa fa-phone"></i>
					<h4 class="text-center mt-16" style="font-weight: 400;">Weekly Mentoring Calls</h4>
					<p class="text-center mt-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua.</p>
				</div>
			</div>
		</div>
	</div>

	<div style="background-color: hsl(0, 0%, 95%);">
		<div class="container pt-64 pb-64">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-12">
					<img src="https://i.imgur.com/5WeItCp.jpg" class="regular-image-80 regular-image-100-mobile centered">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-16-mobile" style="display: flex;">
					<div style="width: 100%; margin: auto;">
						<h2 class="mb-2">How mentors have helped me.</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<a href="#first_name_input" class="btn btn-success">Get started <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection