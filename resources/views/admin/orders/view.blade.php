@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div style="overflow: auto;">
					<table class="table table-striped" style="text-align: center;">
						<thead>
							<th>Order ID</th>
							<th>Name</th>
							<th>Product</th>
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
										<a href="/admin/orders/full/{{ $order->id }}" class="genric-btn primary small">View Full Order</a>
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