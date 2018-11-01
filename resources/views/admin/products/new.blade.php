@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<div class="well">
					<form action="/admin/products/create" method="POST">
						{{ csrf_field() }}
						<h3>Basic Information</h3>
						<hr />
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Product Name:</h5>
									<input type="text" name="product_name" class="form-control" autofocus required>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Product Price:</h5>
									<input type="number" min="0.00" step="0.01" name="product_price" class="form-control" required>
								</div>
								
							</div>
						</div>

						<div class="row mb-32">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Product Description:</h5>
									<textarea class="form-control" rows="4" required></textarea>
								</div>
							</div>
						</div>

						<h3>Images</h3>
						<hr />
						<div class="row mb-32">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Main Image:</h5>
									<img src="" id="main_image_img" class="regular-image mb-8 mt-8">
									<input type="file" name="featured_image_url" onchange="displayMainImage(this);" required>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Extra Image #1:</h5>
									<img src="" id="extra_image_1_img" class="regular-image mb-8 mt-8">
									<input type="file" name="extra_image_1" onchange="extraImage1(this);">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Extra Image #2:</h5>
									<img src="" id="extra_image_2_img" class="regular-image mb-8 mt-8">
									<input type="file" name="extra_image_2" onchange="extraImage2(this);">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Extra Image #3:</h5>
									<img src="" id="extra_image_3_img" class="regular-image mb-8 mt-8">
									<input type="file" name="extra_image_3" onchange="extraImage3(this);">
								</div>
							</div>
						</div>

						<h3>Details</h3>
						<hr />
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Number in Stock:</h5>
									<input type="number" min="0.00" step="0.01" name="stock" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">SKU:</h5>
									<input type="text" name="sku" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row mb-32">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Digital Product?:</h5>
									<div style="width: 100%;">
										<input id="digital_product" type="checkbox" onchange="toggleDownloadLink();" style="display: inline-block;">
										<p style="display: inline-block; margin-left: 4px;" class="mb-0 black">Yes, it is a digital product.</p>
									</div>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12" id="download_link" style="display: none;">
								<div class="form-group">
									<h5 class="mb-2">Digital Product Download Link:</h5>
									<input type="text" name="digital_product_link" class="form-control" required>
								</div>
							</div>
						</div>

						<h3>Selectors</h3>
						<hr />
						<div id="selectors_section">
						</div>

						<a onclick="addSelector();" class="genric-btn success small rounded">New Custom Selector</a>
						<hr />

						<div class="row mt-32">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<a href="" class="genric-btn  primary large rounded center-button" style="font-size: 20px;">Create Product</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var selectors_array = [];
		var selector_counter = 0;

		function displayMainImage(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$("#main_image_img").attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}

		function extraImage1(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$("#extra_image_1_img").attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}

		function extraImage2(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$("#extra_image_2_img").attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}

		function extraImage3(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$("#extra_image_3_img").attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}

		function addSelector() {
			// Get the selectors count
			var new_selector_index = selector_counter + 1;

			// Create HTML extension
			var appending_html = '<div class="row mb-8" id="selector_' + new_selector_index + '"><div class="col-lg-5 col-md-5 col-sm-5 col-6"><input type="text" placeholder="Size" class="form-control"></div><div class="col-lg-5 col-md-5 col-sm-5 col-6"><input type="text" placeholder="Small" class="form-control"></div><div class="col-lg-2 col-md-2 col-sm-2 col-2"><a onclick="deleteSelector(this.id);" id="' + new_selector_index + '" class="genric-btn medium danger" style="margin-top: 2px;">Delete</a></div></div>';
			$("#selectors_section").append(appending_html);

			// Update counter
			selector_counter++;
		}

		function deleteSelector(row_id) {
			// Remove the row
			$("#selector_" + row_id).remove();
		}

		function toggleDownloadLink() {
			// Get the status
			var checkbox_status = $("#digital_product").is(":checked");
			if (checkbox_status) {
				$("#download_link").css('display', 'block');
				$("input[name=stock]").prop('disabled', true);
			} else {
				$("#download_link").css('display', 'none');
				$("input[name=stock]").prop('disabled', false);
			}
		}
	</script>
@endsection