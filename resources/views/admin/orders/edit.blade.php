@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<div class="well">
					<form id="update_order_form" action="/admin/orders/update" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="order_id" value="{{ $order->id }}">
						<h3>Basic Information</h3>
						<hr />
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">First Name:</h5>
									<input type="text" value="{{ $order->order_first_name }}" class="form-control" disabled>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Last Name:</h5>
									<input type="text" value="{{ $order->order_last_name }}" class="form-control" disabled="">
								</div>
								
							</div>
						</div>

						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Address:</h5>
									<input type="text" value="{{ $order->order_address }}" class="form-control" disabled>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<h5 class="mb-2">Zipcode:</h5>
									<input type="text" value="{{ $order->order_zipcode }}" class="form-control" disabled>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<h5 class="mb-2">City:</h5>
									<input type="text" value="{{ $order->order_city }}" class="form-control" disabled>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<h5 class="mb-2">State:</h5>
									<input type="text" value="{{ $order->order_state }}" class="form-control" disabled>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<h5 class="mb-2">Country:</h5>
									<input type="text" value="{{ $order->order_country }}" class="form-control" disabled>
								</div>
							</div>
						</div>

						<div class="row mb-32">
							<div class="col-lg-4 col-md-4 col-sm-4 col-4">
								<h5>Guest purchase?</h5>
								@if($order->is_guest == 1)
									<p class="mb-0">Yes</p>
								@else
									<p class="mb-0">No</p>
								@endif
							</div>

							@if($order->is_guest == 0)
								<div class="col-lg-4 col-md-4 col-sm-4 col-4">
									<h5>User ID</h5>
									<p class="mb-0">{{ $order->user_id }}</p>
								</div>
							@endif

							<div class="col-lg-4 col-md-4 col-sm-4 col-4">
								<h5>Order IP</h5>
								<p class="mb-0">{{ $order->order_ip }}</p>
							</div>
						</div>

						<h3>Product Information</h3>
						<hr />

						<?php $product_helper->set_product_id($order->product_id); $product_info = $product_helper->get_product_by_id(); ?>

						<div class="row mb-32">
							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<img src="{{ $product_info->featured_image_url }}" class="regular-image">
							</div>

							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<h4>{{ $product_info->product_name }}</h4>
								<p>
									@foreach(json_decode($order->order_selectors) as $selector)
										{{ $selector }}<br>
									@endforeach
								</p>

								<h5>Quantity</h5>
								<p>{{ $order->quantity }}</p>

								<h5>Digital Product?</h5>
								@if($product_info->digital_product == 1)
									<p>Yes</p>
								@else
									<p>No</p>
								@endif
							</div>
						</div>

						<h3>Shipping Information</h3>
						<hr />

						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Order Status:</h5>
									<select class="form-control" form="update_order_form" name="order_status">
										<option value="1" <?php if($order->order_status == 1) { echo "selected"; } ?>>Need to Ship</option>
										<option value="2" <?php if($order->order_status == 2) { echo "selected"; } ?>>Shipped</option>
										<option value="3" <?php if($order->order_status == 3) { echo "selected"; } ?>>Refunded</option>
										<option value="4" <?php if($order->order_status == 4) { echo "selected"; } ?>>Buyer Returned</option>
									</select>
								</div>
							</div>

							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Tracking Number:</h5>
									<input type="text" name="order_tracking_num" placeholder="LH4S438HDSQX" value="{{ $order->order_tracking_num }}" class="form-control">
								</div>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<input type="submit" value="Update Order" class="genric-btn primary large rounded center-button" style="font-size: 20px;">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection