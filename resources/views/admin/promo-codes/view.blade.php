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
								<th>Percent Off</th>
								<th>Dollars Off</th>
								<th>Minimum Amount</th>
								<th>Created</th>
								<th></th>
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

										@if($code->code_type == 1)
											<td>{{ $code->percent_off * 100 }}%</td>
										@else
											<td>N/A</td>
										@endif

										@if($code->code_type == 1)
											<td>N/A</td> 
										@else
											<td>${{ $code->dollars_off }}</td>
										@endif

										@if($code->code_type == 1)
											<td>N/A</td> 
										@else
											<td>${{ $code->minimum_amount }}</td>
										@endif

										<td style="min-width: 150px;">{{ $code->created_at->format('M d, Y') }}</td>
										<td style="min-width: 250px;"> 
											<a href="/admin/promo/edit/{{ $code->id }}" class="genric-btn info small">Edit</a>
											<button id="{{ $code->id }}" type="button" class="genric-btn danger small delete_promo_code_button">Delete</button>
										</td>
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

@section('page_js')
	<script type="text/javascript">
		$(".delete_promo_code_button").on('click', function() {
			// Get post ID
			var promo_id = $(this).attr('id');

			// Set ID for modal
			$("#promo_code_id_delete_modal").val(promo_id);

			// Show modal
			$("#delete_promo_code_modal").modal();
		});
	</script>
@endsection