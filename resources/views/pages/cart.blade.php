@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	
	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
				@if(count($products) > 0)
					<div style="overflow: auto;">
						<table class="table table-striped">
							<thead>
								<th>Product</th>
								<th></th>
								<th style='text-align: center;'>Quantity</th>
								<th style='text-align: center;'>Amount</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($products as $product)
									<?php
										$product_helper->set_product_id($product["product_id"]);
										$product_info = $product_helper->get_product_by_id();
									?>
									<form action="/cart/delete/product" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="product_id" value="{{ $product["product_id"] }}">
										<input type="hidden" name="num_items" value="{{ $product["quantity"] }}">
										<input type="hidden" name="selectors" value="{{ $product["selectors"] }}">
										<tr>
											<td align="center" style="vertical-align:middle; min-width: 80px; max-width: 80px;">
												<img src="{{ $product_info["featured_image_url"] }}" class="regular-image">
											</td>

											<td style="vertical-align:middle;">
												<h4>{{ $product_info["product_name"] }}</h4>
												<?php $selected = json_decode($product["selectors"]); ?>
												<p class="mb-0">
													<?php $option_index = 0; $options = count($selected); ?>
													@foreach($selected as $option)
														@if($option_index == ($options - 1))
															<small>{{ $option }}</small>
														@else
															<small>{{ $option }}, </small>
														@endif
													@endforeach
												</p>
											</td>

											<td align="center" style="vertical-align:middle;"><p>{{ $product["quantity"] }}</p></td>
											<td align="center" style="vertical-align:middle;"><p class="text-center">${{ $product["subtotal"] }}</p></td>
											<td align="center" style="vertical-align:middle;"><input type="submit" value="Delete" class="genric-btn small rounded primary"></td>
										</tr>
									</form>
								@endforeach

								<tr>
									<td></td>
									<td></td>
									<td align="center" style="vertical-align:middle;"><p class="mb-0"><b>Total</b></p></td>
									<td align="center" style="vertical-align:middle;"><p class="mb-0"><b>${{ $cart_helper->get_total() }}</b></p></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				@else
					<div class="well">
						<h5 class="text-center">Empty Cart...</h5>
						<p class="text-center">Let's add some awesome Wolf Squad products</p>
						<div class="row">
							<a href="/shop" class="genric-btn primary small center-button rounded">View Ambition Shop</a>
						</div>
					</div>
				@endif
			</div>


			<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
				<div class="well">
					<h3 class="text-center">Checkout</h3>
					<hr />
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<h5 style="float: left;"><b>Today's Total: </b></h5>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<h5 style="float: right;">${{ $cart_helper->get_total() }}</h5>
						</div>
					</div>

					@if(count($products) > 0)
						<a href="/checkout" class="genric-btn primary circle large center-button mt-32 mb-16" style="font-size: 16px;">Continue to Checkout <span class="lnr lnr-arrow-right"></span></a>
						<div class="row">
							<a href="/cart/delete/all" class="genric-btn danger circle center-button small">Delete All from Cart</a>
						</div>
					@else
						<button class="genric-btn disabled circle large center-button mt-32 mb-16" style="font-size: 16px;" disabled="">Add Items to Cart </a>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection