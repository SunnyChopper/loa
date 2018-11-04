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
							<th>Order ID</th>
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
									<td>{{ $order->id }}</td>
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
					
					// Set data
					$("#full_order_order_id").html(order_id);
					$("#full_order_featured_image_url").attr('src', order_data["featured_image_url"]);
					$("#full_order_product_name").html(order_data["product_name"]);
					$("#full_order_selectors").html(order_data["order_selectors"]);

					// Show modal
					$("#view_full_order_modal").modal();	
				}
			});
		});
	</script>
@endsection