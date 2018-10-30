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
							<th>Reviews</th>
							<th></th>
						</thead>
						<tbody>
							<tr>
								<td>Ambition Premium Shirt</td>
								<td>Show off your inner Wolf</td>
								<td>$49.99</td>
								<td>43</td>
								<td>AMB-SHIRT</td>
								<td>4.7/5</td>
								<td>34</td>
								<td>
									<a href="/admin/products/edit" class="genric-btn info small">Edit</a>
									<a href="" class="genric-btn danger small">Delete</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection