@extends('layouts.app')

@section('content')
	@include('sliders.home')

	<section class="section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h2 class="text-center mb-10">What You'll Learn</h2>
					<hr />
				</div>
			</div>
			<div class="row mt-20">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div style="padding: 32px; border: 1px solid #EFEFEF; border-radius: 5px;">
						<h4 class="mb-20 text-center">Mindset</h4>
						<p class="text-center mb-0">It all starts with getting your head on right. If you never train your mindset, you will never get as far as you would like to.</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div style="padding: 32px; border: 1px solid #EFEFEF; border-radius: 5px;">
						<h4 class="mb-20 text-center">Business</h4>
						<p class="text-center mb-0">This includes everything you need to know to get started. From filing for an LLC to how to create your business plan and processes.</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div style="padding: 32px; border: 1px solid #EFEFEF; border-radius: 5px;">
						<h4 class="mb-20 text-center">Marketing</h4>
						<p class="text-center mb-0">You can create an amazing product, but without good marketing, you're not going to get the results you desire with your business.</p>
					</div>
				</div>
			</div>				
		</div>	
	</section>

	<section class="section-gap" style="background-color: #FAFAFA;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<p class="text-center mb-40">Featured On</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
					<img class="full-img" src="https://yt3.ggpht.com/a-/ACSszfFdktbV5JOcDQi-PfdRBq7mzZgw4VQOKBZ11w=s900-mo-c-c0xffffffff-rj-k-no">
				</div>

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
					<img class="full-img" src="https://yt3.ggpht.com/a-/ACSszfFIy4G4YqsiMJ73pmJsC2mcHjEd_ViuzjNHNA=s900-mo-c-c0xffffffff-rj-k-no">
				</div>

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
					<img class="full-img" src="https://yt3.ggpht.com/a-/ACSszfGWpoUOYFvB2Oq-zqDhsOkZ88-5uSn-IMJrmg=s900-mo-c-c0xffffffff-rj-k-no">
				</div>

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
					<img class="full-img" src="https://s1.mzstatic.com/us/r1000/087/Purple/v4/d7/d0/37/d7d03777-dd47-d53e-a575-a7bde85e36b2/mzl.qkrkonyt.png">
				</div>
			</div>
		</div>
	</section>
	
@endsection
