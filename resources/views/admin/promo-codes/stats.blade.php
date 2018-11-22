@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	@include('admin.promo-codes.modals.delete-promo-code-modal')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				@if(count($promo_codes) > 0)
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Code</th>
								<th>Code Type</th>
								<th>Guest Adds</th>
								<th>Guest Removals</th>
								<th>Guest Usage</th>
								<th>Guest Revenue Lost</th>
								<th>Member Adds</th>
								<th>Member Removals</th>
								<th>Member Usage</th>
								<th>Member Revenue Lost</th>
								<th>Total Adds</th>
								<th>Total Removals</th>
								<th>Total Usage</th>
								<th>Total Revenue Lost</th>
							</thead>
							<tbody>
								@foreach($promo_codes as $code)
									<tr>
										<td>{{ $code->code }}</td>
										@if($code->code_type == 1)
											<td>Percent Off</td>
										@else
											<td>Dollars Off</td>
										@endif
										<td>{{ $site_stats_helper->promo_code_get_guest_addition($code->id) }}</td>
										<td>{{ $site_stats_helper->promo_code_get_guest_removal($code->id) }}</td>
										<td>{{ $site_stats_helper->promo_code_get_guest_usage($code->id) }}</td>
										<td>${{ sprintf("%.2f", $site_stats_helper->promo_code_get_guest_revenue_lost($code->id)) }}</td>
										<td>{{ $site_stats_helper->promo_code_get_member_addition($code->id) }}</td>
										<td>{{ $site_stats_helper->promo_code_get_member_removal($code->id) }}</td>
										<td>{{ $site_stats_helper->promo_code_get_member_usage($code->id) }}</td>
										<td>${{ sprintf("%.2f", $site_stats_helper->promo_code_get_member_revenue_lost($code->id)) }}</td>
										<td>{{ $site_stats_helper->promo_code_get_guest_addition($code->id) + $site_stats_helper->promo_code_get_member_addition($code->id) }}</td>
										<td>{{ $site_stats_helper->promo_code_get_guest_removal($code->id) + $site_stats_helper->promo_code_get_member_removal($code->id) }}</td>
										<td>{{ $site_stats_helper->promo_code_get_total_usage($code->id) }}</td>
										<td>${{ sprintf("%.2f", $site_stats_helper->promo_code_get_total_revenue_lost($code->id)) }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					<div class="well">
						<div class="row">
							<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
								<h3 class="text-center">No Promo Codes on Site</h3>
								<p class="text-center">Click below to get started on creating the first promo code.</p>
								<div class="row">
									<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
										<a href="/admin/promo/new" class="genric-btn primary rounded center-button" style="font-size: 14px;">Create New Promo Code</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection