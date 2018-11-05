@extends('layouts.app')

@section('content')
	@include('layouts.main-hero')
	@include('layouts.main-feature')

	<div class="light-gray-row p-64 mt-32 ">
		<div class="container">
			<div class="row mb-16">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<p class="text-center text-uppercase">Luis Has Been Featured In</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-6 col-12 mt-8 mb-8">
					<img src="{{ URL::asset('img/Inc-Logo.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-12 mt-8 mb-8">
					<img src="{{ URL::asset('img/Entrepreneur-Logo.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-12 mt-8 mb-8">
					<img src="{{ URL::asset('img/Verge.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-12 mt-8 mb-8">
					<img src="{{ URL::asset('img/Impact-Theory-Logo.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-12 mt-8 mb-8">
					<img src="{{ URL::asset('img/Forbes-Logo.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-12 mt-8 mb-8">
					<img src="{{ URL::asset('img/HuffPost-Logo.png') }}" class="regular-image">
				</div>
			</div>
		</div>
	</div>

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<img src="{{ URL::asset('img/Front-Image.jpg') }}" class="regular-image">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<h3>Helping Entrepreneurs Unlock Their Inner Ambition And Start Achieving</h3>
				<hr />
				<p>Every single day that you're not feeling ambitious about your goals and dreams, you're wasting your days. Without any ambition, any drive, you will not achieve at the levels that you want to start achieving at.</p>
				<p>My name is Luis Garcia and I believe that there's a natural law that determines how fast you will accomplish your goals: the law of ambition.</p>
				<p>Wolf Squad is the community of members who also believe in this mindset that it takes heart and ambition to accomplish your goals. It's a community of like-minded individuals who want to succeed just like you and I.</p>
				<p>I welcome you to the Wolf Squad. Click the button below to get started.</p>
				<a href="/members/register" class="genric-btn primary" style="font-size: 16px;">Join Wolf Squad</a>
			</div>
		</div>
	</div>

	<div class="dark-blue-row p-32" style="display: none;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<img src="https://mir-s3-cdn-cf.behance.net/project_modules/1400/4833c852711797.591a25b609ccb.png" class="regular-image">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<h3 class="text-center mt-32 mb-32 white">Learn How to Network and Close More Deals</h3>
					<p class="text-center white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					<div class="row">
						<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-xs-12">
							<a href=""><img src="https://cdn-images-1.medium.com/max/1600/1*V7RXLq9cs33bTsRZYMBpKg.png" class="regular-image center-button"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="light-gray-row p-64 mt-32 ">
		<div class="container">
			<div class="row mb-16">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<p class="text-center text-uppercase">Brands I Work With</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/Atlantic.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/BMW.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/Infusionsoft.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/KSwiss.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/LA-Weekly.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/Lionsgate.png') }}" class="regular-image">
				</div>
			</div>

			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/NBC.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/Penske.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/YR.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/Rolls-Royce.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/Taylor-Gang.png') }}" class="regular-image">
				</div>
				<div class="col-lg-2 col-md-2 col-sm-6 col-6">
					<img src="{{ URL::asset('img/Tonight-Show.png') }}" class="regular-image">
				</div>
			</div>
		</div>
	</div>

	<div class="container mt-32 mb-32 p-32" style="display: none;">
		<div class="row mt-8 mb-16">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<p class="text-center lead text-uppercase">All My Latest Advice</p>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="image-box-rounded">
					<div class="image">
						<img src="https://i.ytimg.com/vi/lJjILQu2xM8/maxresdefault.jpg" class="regular-image">
					</div>
					<div class="info">
						<h3>How to Be An Entrepreneur</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<hr />
						<p class="mb-0"><small>October 25th, 2018</small></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="image-box-rounded">
					<div class="image">
						<img src="https://i.ytimg.com/vi/lJjILQu2xM8/maxresdefault.jpg" class="regular-image">
					</div>
					<div class="info">
						<h3>How to Be An Entrepreneur</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<hr />
						<p class="mb-0"><small>October 25th, 2018</small></p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="image-box-rounded">
					<div class="image">
						<img src="https://i.ytimg.com/vi/lJjILQu2xM8/maxresdefault.jpg" class="regular-image">
					</div>
					<div class="info">
						<h3>How to Be An Entrepreneur</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<hr />
						<p class="mb-0"><small>October 25th, 2018</small></p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection