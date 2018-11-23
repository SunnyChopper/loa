@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<form action="/admin/discussions/create" method="POST" id="create_discussion_form" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="well">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<div class="form-group">
									<label>Book Title<span class="red">*</span>:</label>
									<input type="text" name="book_title" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="form-group">
									<label>Author<span class="red">*</span>:</label>
									<input type="text" name="author" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Amazon Referral Link:</label>
									<input type="text" name="amazon_referral_link" class="form-control">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Book Description:</label>
									<textarea name="book_description" form="create_discussion_form" class="form-control" rows="5"></textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Start Date:</label>
									<input type="date" name="start_date"  class="form-control" required>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>End Date:</label>
									<input type="date" name="end_date"  class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<img src="" id="book_image" class="regular-image">
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Book Image:</label>
									<input type="file" name="book_image" onchange="displayBookImage(this);" required>
								</div>
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12 col-12">
								<input type="submit" value="Create Book Discussion" class="genric-btn rounded primary center-button" style="font-size: 16px;">
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
		function displayBookImage(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$("#book_image").attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>
@endsection