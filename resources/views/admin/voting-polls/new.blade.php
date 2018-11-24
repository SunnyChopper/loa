@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<div class="well">
					<form id="create_voting_poll_form" action="/poll/create" method="POST">
						{{ csrf_field() }}
						<div class="row form-group">
							<div class="col-lg-8 col-md-8 col-sm-10 col-10">
								<label>Option 1<span class="red">*</span>:</label>
								<input type="text" class="form-control" name="option_1" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<label>Option 1 Description:</label>
								<textarea name="option_1_description" class="form-control" rows="4"></textarea>
							</div>
						</div>

						<hr class="mt-32 mb-32" />

						<div class="row form-group">
							<div class="col-lg-8 col-md-8 col-sm-10 col-10">
								<label>Option 2<span class="red">*</span>:</label>
								<input type="text" class="form-control" name="option_2" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<label>Option 2 Description:</label>
								<textarea name="option_2_description" class="form-control" rows="4"></textarea>
							</div>
						</div>

						<hr class="mt-32 mb-32" />

						<div class="row form-group">
							<div class="col-lg-8 col-md-8 col-sm-10 col-10">
								<label>Option 3<span class="red">*</span>:</label>
								<input type="text" class="form-control" name="option_3" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<label>Option 3 Description:</label>
								<textarea name="option_3_description" class="form-control" rows="4"></textarea>
							</div>
						</div>

						<hr class="mt-32 mb-32" />

						<div class="row form-group">
							<div class="col-lg-8 col-md-8 col-sm-10 col-10">
								<label>Option 4<span class="red">*</span>:</label>
								<input type="text" class="form-control" name="option_4" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<label>Option 4 Description:</label>
								<textarea name="option_4_description" class="form-control" rows="4"></textarea>
							</div>
						</div>

						<hr class="mt-32 mb-32" />

						<div class="row form-group">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>Start Date:</label>
								<input type="date" name="start_date" class="form-control" required>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<label>End Date:</label>
								<input type="date" name="end_date" class="form-control" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<input type="submit" class="genric-btn primary rounded center-button mt-32 mb-0" value="Create Voting Poll" style="font-size: 16px;">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection