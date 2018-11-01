@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div style="overflow: auto;">
					<table class="table table-striped" style="text-align: center;">
						<thead>
							<th>Product ID</th>
							<th>Main Image</th>
							<th>Name</th>
							<th>Views</th>
							<th>Adds to Cart</th>
							<th>Purchases</th>
							<th>Guest Purchases</th>
							<th>Member Purchases</th>
						</thead>
						<tbody>
							@foreach($products as $product)
								<tr>
									<td>{{ $product->id }}</td>
									<td><img src="{{ $product->featured_image_url }}" style="max-width: 125px;" class="regular-image"></td>
									<td>{{ $product->product_name }}</td>
									<td>{{ $site_stats_helper->get_product_views($product->id) }}</td>
									<td>{{ $site_stats_helper->get_product_adds_to_cart($product->id) }}</td>
									<td>{{ $site_stats_helper->get_product_purchases($product->id) }}</td>
									<td>{{ $site_stats_helper->get_product_guest_purchases($product->id) }}</td>
									<td>{{ $site_stats_helper->get_product_member_purchases($product->id) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection