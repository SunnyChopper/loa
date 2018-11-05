@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	
	<div style="padding: 24px; background-color: #EEEEEE;">
		<div class="container p-32">
			@if(count($products) > 0)
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="text-center">Recently Added</h2>
					</div>
				</div>
			@endif

			<div class="row">
				@if(count($products) > 0)
					@foreach($products as $product)
						<div class="col-lg-3 col-md-3 col-sm-6 col-6">
							<a href="/product/{{ $product->id }}" class="black-link">
								<div class="image-box">
									<div class="image">
										<img src="{{ $product->featured_image_url }}" class="regular-image">
									</div>
									<div class="info">
										<h5 class="text-center">{{ $product->product_name }}</h5>
										<h4 class='text-center green mt-8 mb-16'>${{ $product->product_price }}</h4>
										<a href="/product/{{ $product->id }}" class="genric-btn primary round medium center-button" style="font-size: 14px;">View Product <span class="lnr lnr-arrow-right"></span></a>
									</div>
								</div>
							</a>
						</div>
					@endforeach
				@else
					<div class="col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="well">
							<h5 class="text-center mb-0">Whoops! Looks like our shop is currently empty...we're restocking as quickly as we can!</h5>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection