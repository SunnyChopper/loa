@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<form action="/admin/promo/update" method="POST" id="update_promo_code_form">
					{{ csrf_field() }}
					<input type="hidden" name="promo_code_id" value="{{ $code->id }}">
					<div class="well">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Code:</label>
									<input type="text" name="code" value="{{ $code->code }}" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Code Type:</label>
									<select id="code_type" name="code_type" class="form-control" required>
										<option <?php if($code->code_type == 1) { echo "selected"; } ?> value="1">Percent Off</option>
										<option <?php if($code->code_type == 2) { echo "selected"; } ?> value="2">Dollars Off</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row" id="percent_off_row" <?php if($code->code_type != 1) { echo 'style="display:none;"'; } ?>>
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Percent Off</label>
									<input type="number" min="1" max="100" step="1" value="{{ $code->percent_off * 100 }}" name="percent_off" class="form-control" required="true">
								</div>
							</div>
						</div>

						<div class="row" id="dollars_off_row" <?php if($code->code_type != 2) { echo 'style="display:none;"'; } ?>>
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Dollars Off:</label> 
									<input type="number" min="1" step="1" name="dollars_off" value="{{ $code->dollars_off }}" class="form-control">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Minimum Amount:</label>
									<input type="number" min="1" step="1" name="minimum_amount" value="{{ $code->minimum_amount }}" class="form-control">
								</div>
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12 col-12">
								<input type="submit" value="Update Promo Code" class="genric-btn rounded primary center-button" style="font-size: 16px;">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$("#code_type").on('change', function() {
			var code_type = $(this).val();
			if (code_type == 1) {
				$("#percent_off_row").show();
				$("#dollars_off_row").hide();
				$("input[name=dollars_off]").prop('required', false);
				$("input[name=minimum_amount]").prop('required', false);
				$("input[name=percent_off]").prop('required', true);
			} else {
				$("#percent_off_row").hide();
				$("#dollars_off_row").show();
				$("input[name=dollars_off]").prop('required', true);
				$("input[name=minimum_amount]").prop('required', true);
				$("input[name=percent_off]").prop('required', false);
			}
		});
	</script>
@endsection