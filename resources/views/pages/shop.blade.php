@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	
	<div style="padding: 24px; background-color: #EEEEEE;">
		<div class="container p-32">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h2 class="text-center">Recently Added</h2>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
					<a href="/product" class="black-link">
						<div class="image-box">
							<div class="image">
								<img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/4104ee33454859.56ab829293136.png" class="regular-image">
							</div>
							<div class="info">
								<h5 class="text-center">Ambition Premium Shirt</h5>
								<p class="text-center black mb-0">Show off your inner Wolf</p>
								<h4 class='text-center green mt-8 mb-16'>$49.99</h4>
								<a href="/product" class="genric-btn primary round medium center-button" style="font-size: 14px;">View Product <span class="lnr lnr-arrow-right"></span></a>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection