@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	
	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<h1 class="text-center">Thank You!</h1>
				<p class="text-center">Here's your order details:</p>
				<hr />
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<table class="table table-striped">
					<thead>
						<th>Product</th>
						<th></th>
						<th style="text-align: center;">Quantity</th>
						{{-- <th style="text-align: center;">Expected Arrival Date</th> --}}
					</thead>
					<tbody>
						@foreach(Session::get('purchased_products') as $product)
							<?php
								$product_helper->set_product_id($product["product_id"]);
								$product_info = $product_helper->get_product_by_id();
							?>
							<tr>
								<td align="center" style="vertical-align:middle; min-width: 80px; max-width: 80px;">
									<img src="{{ $product_info["featured_image_url"] }}" class="regular-image">
								</td>

								<td style="vertical-align:middle;">
									<h4>{{ $product_info["product_name"] }}</h4>
									<?php $selected = json_decode($product["selectors"], true); ?>
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
								{{-- <td align="center" style="vertical-align:middle;"><p class="text-center">{{ Carbon\Carbon::parse(session('expected_arrival_date'))->format('M d, Y') }}</p></td> --}}
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection