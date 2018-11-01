@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div style="overflow: auto;">
					<table class="table table-striped" style="text-align: center;">
						<thead>
							<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Stock</th>
							<th>SKU</th>
							<th>Average Rating</th>
							<th># of Reviews</th>
							<th></th>
						</thead>
						<tbody>
							@foreach($products as $product)
								<tr>
									<td>{{ $product->product_name }}</td>
									<td>{{ $product->product_description }}</td>
									<td>${{ $product->product_price }}</td>
									<td>{{ $product->stock }}</td>
									<td>{{ $product->sku }}</td>
									<td>{{ $product->avg_rating }}/5</td>
									<td>{{ $product->reviews }}</td>
									<td>
										<a href="/admin/products/edit/{{ $product->id }}" class="genric-btn info small">Edit</a>
										<button href="" class="genric-btn danger small">Delete</button>
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