@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	
	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
				<table class="table table-striped">
					<thead>
						<th>Product</th>
						<th></th>
						<th style='text-align: center;'>Quantity</th>
						<th style='text-align: center;'>Amount</th>
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
							<td align="center" style="vertical-align:middle;"><p class="text-center">$49.99</p></td>
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
							<td align="center" style="vertical-align:middle;"><p class="text-center">$49.99</p></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td align="center" style="vertical-align:middle;"><p class="mb-0">Total</p></td>
							<td align="center" style="vertical-align:middle;"><p class="mb-0">$99.98</p></td>
						</tr>
					</tbody>
				</table>
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
							<h5 style="float: right;">$99.98</h5>
						</div>
					</div>

					<a href="/checkout" class="genric-btn primary circle large center-button mt-32 mb-0" style="font-size: 16px;">Continue to Checkout <span class="lnr lnr-arrow-right"></span></a>
				</div>
			</div>
		</div>
	</div>
@endsection