@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<div class="well">
					<form action="/admin/products/create" method="POST" id="create_product_form" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="selector_array" value="[]">
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
									<textarea class="form-control" rows="4" name="product_description" form="create_product_form" required></textarea>
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
									<input type="file" name="featured_image" onchange="displayMainImage(this);" required>
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
									<input type="text" name="digital_product_link" class="form-control">
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
								<input type="submit" value="Create Product" class="genric-btn primary large rounded center-button create_product_button" style="font-size: 20px;">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
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
			var appending_html = '<div class="row mb-8" id="selector_' + new_selector_index + '"><div class="col-lg-5 col-md-5 col-sm-5 col-6"><input name="key_' + new_selector_index + '" type="text" placeholder="Size" class="form-control"></div><div class="col-lg-5 col-md-5 col-sm-5 col-6"><input type="text" placeholder="Small" name="value_' + new_selector_index + '" class="form-control"></div><div class="col-lg-2 col-md-2 col-sm-2 col-2"><a onclick="deleteSelector(this.id);" id="' + new_selector_index + '" class="genric-btn medium danger" style="margin-top: 2px;">Delete</a></div></div>';
			$("#selectors_section").append(appending_html);

			// Add to array of selectors
			selectors_array.push(new_selector_index);
			var selectors_json = JSON.parse($("input[name=selector_array]").val());
			selectors_json.push(new_selector_index);
			$("input[name=selector_array]").val(JSON.stringify(selectors_json));

			// Update counter
			selector_counter++;
		}

		function deleteSelector(row_id) {
			// Remove the HTML
			$("#selector_" + row_id).remove();

			// Remove from array of selectors
			selectors_array.filter(val => val !== parseInt(row_id));
			var selectors_json = JSON.parse($("input[name=selector_array]").val());
			selectors_json = selectors_json.filter(val => val !== parseInt(row_id));

			$("input[name=selector_array]").val(JSON.stringify(selectors_json));
		}

		function toggleDownloadLink() {
			// Get the status
			var checkbox_status = $("#digital_product").is(":checked");
			if (checkbox_status) {
				$("#download_link").css('display', 'block');
				$("#download_link").attr('required', true);
				$("input[name=stock]").prop('disabled', true);
			} else {
				$("#download_link").css('display', 'none');
				$("#download_link").attr('required', false);
				$("input[name=stock]").prop('disabled', false);
			}
		}

		$("#create_product_form").on('submit', function() {
			$("#create_product_button").attr('disabled', true);
		});
	</script>
@endsection