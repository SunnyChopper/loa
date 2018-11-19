@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	@include('admin.orders.modals.view-order')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div style="overflow: auto;">
					<table class="table table-striped" style="text-align: center;">
						<thead>
							<th>Order Group</th>
							<th>Name</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Status</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($orders as $order)
								<?php 
									$product_helper->set_product_id($order->product_id);
									$product = $product_helper->get_product_by_id();
								?>
								<tr>
									<td>{{ $order->order_group }}</td>
									<td>{{ $order->order_first_name }} {{ $order->order_last_name }}</td>
									<td>{{ $product->product_name }}</td>
									<td>{{ $order->quantity }}</td>
									@if($order->order_status == 1)
										<td>Need to ship</td>
									@elseif($order->order_status == 2)
										<td>Shipped</td>
									@elseif($order->order_status == 3)
										<td>Order refunded</td>
									@else
										<td>Buyer returned</td>
									@endif
									<td>
										<button type="button" id="{{ $order->id }}" class="genric-btn primary small view_full_order_button">View Full Order</button>
										<a href="/admin/orders/edit/{{ $order->id }}" class="genric-btn info small">Update Order</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".view_full_order_button").on('click', function() {
			// Get the order ID
			var order_id = $(this).attr('id');

			// Create AJAX request
			$.ajax({
				url: '/admin/orders/full/' + order_id,
				success: function(data) {
					// Convert JSON into array
					var order_data = JSON.parse(data);

					// Conditional text
					var order_status = "";
					if (order_data["order_status"] == 1) {
						order_status = "Need to be Shipped";
					} else if (order_data["order_status"] == 2) {
						order_status = "Shipped";
					} else if (order_data["order_status"] == 3) {
						order_status = "Refunded";
					} else if (order_data["order_status"] == 4) {
						order_status = "Returned";
					} else {
						order_status = "Unknown";
					}

					var digital_product = "";
					if (order_data["digital_product"] == 1) {
						digital_product = "Yes";
					} else {
						digital_product = "No";
					}

					var is_guest = "";
					if (order_data["is_guest"] == 1) {
						is_guest = "Yes";
					} else {
						is_guest = "No";
					}

					var order_selectors = "";
					var json_data = JSON.parse(order_data["order_selectors"]);
					var keys = Object.keys(json_data);
					var length = keys.length;
					for (var i = 0; i < length; i++) {
						order_selectors += json_data[keys[i]];
						if (i != (length - 1)) {
							order_selectors += ", ";
						}
					}
					
					// Set data
					$("#full_order_order_id").html(order_id);
					$("#full_order_featured_image_url").attr('src', order_data["featured_image_url"]);
					$("#full_order_product_name").html(order_data["product_name"]);
					$("#full_order_selectors").html(order_selectors);
					$("#full_order_name").html(order_data["order_first_name"] + " " + order_data["order_last_name"]);
					$("#full_order_order_email").html(order_data["order_email"]);
					$("#full_order_order_address").html(order_data["order_address"] + ", " + order_data["order_city"] + " " + order_data["order_state"] + ", " + order_data["order_zipcode"]);
					$("#full_order_order_status").html(order_status);
					$("#full_order_order_tracking_num").html(order_data["order_tracking_num"]);
					$("#full_order_digital_product").html(digital_product);
					$("#full_order_order_ip").html(order_data["order_ip"]);
					$("#full_order_is_guest").html(is_guest);
					$("#full_order_user_id").html(order_data["user_id"]);
					$("#full_order_quantity").html(order_data["quantity"]);

					// Show modal
					$("#view_full_order_modal").modal();
				}
			});
		});
	</script>
@endsection