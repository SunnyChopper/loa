@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	
	<div class="container p-32 mt-32 mb-32">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-8 mb-8">
				<img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/4104ee33454859.56ab829293136.png" class="regular-image">
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-8 mb-8 p-32" style="border: 2px solid #EEEEEE;">
				<h3>Ambition Premium Shirt</h3>
				<hr />
				<p>Show off your inner wolf and ambition. It's more than just a shirt, it's a symbol. A symbol that shows that you're not like the rest. You have something that others don't and that's ambition.</p>
				<h3 class="mb-16 green">$49.99</h3>
				<p class="mb-0">Pick a Size:</p>
				<div class="default-select mb-16" id="default-select">
					<select style="display: none;">
						<option value="small">Small</option>
						<option value="medium">Medium</option>
						<option value="large">Large</option>
					</select>
					<div class="nice-select" tabindex="0" style="border: 1px solid #EDEDED;">
						<span class="current">Small</span>
						<ul class="list">
							<li data-value="small" class="option selected">Small</li>
							<li data-value="medium" class="option">Medium</li>
							<li data-value="large" class="option">Large</li>
						</ul>
					</div>
				</div>

				<p class="mb-0">Number of item:</p>
				<div class="default-select mb-16" id="default-select">
					<select style="display: none;">
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

				<a href="" id="add_to_cart_button" class="genric-btn primary circle large" style="font-size: 16px;">Add to Cart <span class="lnr lnr-cart"></span></a>

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