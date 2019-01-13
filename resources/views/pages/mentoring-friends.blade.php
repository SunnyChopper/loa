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
					<p class="white text-center">Gain access to Law of Ambition's exclusive close friends list where he shares the following:</p>
					<ul class="white text-center">
						<li>Strategic business advice</li>
						<li>Social media marketing tips</li>
						<li>Mindset advice</li>
						<li>Leadership advice</li>
						<li>Specific book recommendations</li>
						<li>...much more</li>
					</ul>
					<h4 class="text-center white mt-16">Price: <span class="green" style="font-family: 'Oxygen';">$1K/<small>year</small></span></h4>
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
				<div class="col-lg-8 col-md-8 col-sm-10 col-12 mt-16-mobile" style="display: flex;">
					<div class="well center-button" style="">
						<form action="/mentoring/checkout" method="post" id="checkout-form">
							{{ csrf_field() }}
							<input type="hidden" value="loa-a" name="fid">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>First Name:</label>
										<input type="text" class="form-control" name="first_name" required>
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-12">
									<div class="form-group">
										<label>Last Name:</label>
										<input type="text" class="form-control" name="last_name" required>
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label>Email:</label>
										<input type="email" class="form-control" name="email" required>
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<label>Card Number:</label>
										<input type="text" name="cc_number" maxlength="16" class="form-control" required>
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="form-group">
										<label>Card Expiry Month:</label>
										<select form="checkout-form" class="form-control" name="ccExpiryMonth">
											<option value="01">January - 01</option>
											<option value="02">February - 02</option>
											<option value="03">March - 03</option>
											<option value="04">April - 04</option>
											<option value="05">May - 05</option>
											<option value="06">June - 06</option>
											<option value="07">July - 07</option>
											<option value="08">August - 08</option>
											<option value="09">September - 09</option>
											<option value="10">October - 10</option>
											<option value="11">November - 11</option>
											<option value="12">December - 12</option>
										</select>
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="form-group">
										<label>Card Expiry Year:</label>
										<select form="checkout-form" class="form-control" name="ccExpiryYear">
											<option value="2019">2019</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
											<option value="2026">2026</option>
											<option value="2027">2027</option>
											<option value="2028">2028</option>
											<option value="2029">2029</option>
											<option value="2030">2030</option>
											<option value="2031">2031</option>
											<option value="2032">2032</option>
											<option value="2033">2033</option>
											<option value="2034">2034</option>
											<option value="2035">2035</option>
											<option value="2036">2036</option>
											<option value="2037">2037</option>
											<option value="2038">2038</option>
											<option value="2039">2039</option>
											<option value="2040">2040</option>
										</select>
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="form-group">
										<label>Card CVV:</label>
										<input type="text" maxlength="3" name="cvvNumber" class="form-control" required>
									</div>
								</div>

								<div class="col-12 mt-16">
									<button type="submit" form="checkout-form" class="btn btn-success center-button" style="width: 100%;">Checkout <i class="fa fa-arrow-circle-right"></i></button>
								</div>

								<div class="col-12 mt-16">
									<img src="https://www.4x4tabs.com/graphics/logos_creditcards.png" class="regular-image-40 centered mb-8">
									<img src="https://summit-hydraulics.com/wp-content/uploads/2017/05/ssl-badge-new.png" class="regular-image-20 regular-image-40-mobile centered">
								</div>
							</div> 
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection