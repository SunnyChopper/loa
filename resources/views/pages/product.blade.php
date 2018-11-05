@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	
	<div class="container p-32 mt-32 mb-32">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-8 mb-8">
				<img src="{{ $product->featured_image_url }}" class="regular-image">
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-8 mb-8 p-32" style="border: 2px solid #EEEEEE;">
				<form id="add_to_cart_form" action="/cart/add" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="product_id" value="{{ $product->id }}">
					<h3>{{ $product->product_name }}</h3>
					<hr />
					<p>{{ $product->product_description }}</p>
					<h3 class="mb-16 green">${{ $product->product_price }}</h3>

					<?php 
						$selectors = json_decode($product->selectors);
						$loop_index = 0;
					?>

					@foreach($selectors as $selector=>$options)
						<div class="default-select mb-16" id="default-select">
							<select form="add_to_cart_form" name="{{ $selector }}" style="display: none;">
								@foreach($options as $option)
								<option value="{{ $option }}">{{ $option }}</option>
								@endforeach
							</select>
							<div class="nice-select" tabindex="0" style="border: 1px solid #EDEDED;">
								<span class="current">Small</span>
								<ul class="list">
									@foreach($options as $option)
										<li data-value="{{ $option }}" class="option">{{ $option }}</li>
									@endforeach
								</ul>
							</div>
						</div>
					@endforeach

					<p class="mb-0">Number of item:</p>
					<div class="default-select mb-16" id="default-select">
						<select form="add_to_cart_form" name="num_items" style="display: none;">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
						<div class="nice-select" tabindex="0" style="border: 1px solid #EDEDED;">
							<span class="current">1</span>
							<ul class="list">
								<li data-value="1" class="option selected">1</li>
								<li data-value="2" class="option">2</li>
								<li data-value="3" class="option">3</li>
							</ul>
						</div>
					</div>


					<button id="add_to_cart_button" class="genric-btn primary circle large mt-8" style="font-size: 16px;">Add to Cart <span class="lnr lnr-cart"></span></button>
				</form>

				<div class="row mt-32">
					<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
						<img src="https://www.veravalonline.com/wp-content/uploads/ssl-secure.png" class="regular-image">
					</div>
					<div class="col-lg-5 col-md-6 col-sm-7 col-xs-6">
						<img src="https://cdn.shopify.com/s/files/1/2581/7362/files/999999999.png?1496325821189209333" class="regular-image">
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection