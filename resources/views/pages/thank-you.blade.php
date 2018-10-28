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
						<th>
						<th style="text-align: center;">Quantity</th>
						<th style="text-align: center;">Expected Arrival Date</th>
					</thead>
					<tbody>
						<tr>
							<td align="center" style="vertical-align:middle; min-width: 80px; max-width: 80px;">
								<img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/4104ee33454859.56ab829293136.png" class="regular-image">
							</td>

							<td style="vertical-align:middle;">
								<h4>Ambition Premium Shirt</h4>
								<p class="mb-0"><small>Large</small></p>
							</td>

							<td align="center" style="vertical-align:middle;"><p>1</p></td>
							<td align="center" style="vertical-align:middle;"><p class="text-center">October 29th, 2018</p></td>
						</tr>
						<tr>
							<td align="center" style="vertical-align:middle; min-width: 80px; max-width: 80px;">
								<img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/4104ee33454859.56ab829293136.png" class="regular-image">
							</td>

							<td style="vertical-align:middle;">
								<h4>Ambition Premium Shirt</h4>
								<p class="mb-0"><small>Medium</small></p>
							</td>

							<td align="center" style="vertical-align:middle;"><p>1</p></td>
							<td align="center" style="vertical-align:middle;"><p class="text-center">October 29th, 2018</p></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection