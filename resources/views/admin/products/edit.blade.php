@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<?php 
		// Get selectors
		$selectors = $product->selectors;
		$selectors_array = json_decode($selectors, true);
		$selectors_count = 0;
		foreach($selectors_array as $selector) {
			$selectors_count += count($selector);
		}

		// Loop through to create array
		$selector_array = array();
		for ($i = 1; $i < $selectors_count + 1; $i++) {
			array_push($selector_array, $i);
		}
		$selector_json = json_encode($selector_array);
	?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<div class="well">
					<form id="edit_product_form" method="post" action="/admin/products/update" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="hidden" name="product_id" value="{{ $product->id }}">
						<input type="hidden" name="selector_array" value="{{ $selector_json }}">
						<h3>Basic Information</h3>
						<hr />
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Product Name:</h5>
									<input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" autofocus required>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Product Price:</h5>
									<input type="number" min="0.00" step="0.01" value="{{ $product->product_price }}" name="product_price" class="form-control" required>
								</div>
								
							</div>
						</div>

						<div class="row mb-32">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Product Description:</h5>
									<textarea class="form-control" rows="4" name="product_description" required>{{ $product->product_description }}</textarea>
								</div>
							</div>
						</div>

						<h3>Images</h3>
						<hr />
						<div class="row mb-32">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Main Image:</h5>
									<img id="main_image_img" src="{{ $product->featured_image_url }}" class="regular-image mt-8 mb-8">
									<input type="file" name="featured_image" onchange="displayMainImage(this);">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Extra Image #1:</h5>
									@if(count(json_decode($product->image_links)) > 0)
										<img id="extra_image_1_img" src="{{ json_decode($product->image_links, true)[0] }}" class="regular-image mt-8 mb-8">
									@else
										<img id="extra_image_1_img" src="" class="regular-image mt-8 mb-8">
									@endif
									<input type="file" name="extra_image_1" onchange="extraImage1(this);">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Extra Image #2:</h5>
									@if(count(json_decode($product->image_links)) > 1)
										<img id="extra_image_2_img" src="{{ json_decode($product->image_links, true)[1] }}" class="regular-image mt-8 mb-8">
									@else
										<img id="extra_image_2_img" src="" class="regular-image mt-8 mb-8">
									@endif
									<input type="file" name="extra_image_2" onchange="extraImage2(this);">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Extra Image #3:</h5>
									@if(count(json_decode($product->image_links)) > 2)
										<img id="extra_image_3_img" src="{{ json_decode($product->image_links, true)[2] }}" class="regular-image mt-8 mb-8">
									@else
										<img id="extra_image_3_img" src="" class="regular-image mt-8 mb-8">
									@endif
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
									<input type="number" value="{{ $product->stock }}" min="0" step="1" name="stock" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">SKU:</h5>
									<input type="text" value="{{ $product->sku }}" name="sku" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row mb-32">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Digital Product?:</h5>
									<div style="width: 100%;">
										<input id="digital_product" onchange="toggleDownloadLink();"  type="checkbox" <?php if($product->digital_product == 1) { echo 'checked'; } ?> style="display: inline-block;">
										<p style="display: inline-block; margin-left: 4px;" class="mb-0 black">Yes, it is a digital product.</p>
									</div>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12" id="download_link" style="<?php if($product->digital_product == 0) { echo 'display: none;'; } ?>">
								<div class="form-group">
									<h5 class="mb-2">Digital Product Download Link:</h5>
									<input type="text" name="digital_product_link" class="form-control">
								</div>
							</div>
						</div>

						<h3>Selectors</h3>
						<hr />
						<div id="selectors_section">
							<?php $selector_index = 1; ?>
							@foreach(json_decode($product->selectors) as $selector=>$options)
								@foreach($options as $option)
									<div class="row mb-8" id="selector_{{ $selector_index }}">
										<div class="col-lg-5 col-md-5 col-sm-5 col-6">
											<input type="text" name="key_{{ $selector_index }}" placeholder="Size" value="{{ $selector }}" class="form-control">
										</div>

										<div class="col-lg-5 col-md-5 col-sm-5 col-6">
											<input type="text" name="value_{{ $selector_index }}" placeholder="Small" value="{{ $option }}" class="form-control">
										</div>

										<div class="col-lg-2 col-md-2 col-sm-2 col-2">
											<a onclick="deleteSelector(this.id);" id="{{ $selector_index }}" class="genric-btn medium danger mt-2">Delete</a>
										</div>
									</div>
									<?php $selector_index++; ?>
								@endforeach
							@endforeach
						</div>

						<button type="button" onclick="addSelector();" class="genric-btn success small rounded">New Custom Selector</button>
						<hr />

						<div class="row mt-32">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<input type="submit" value="Update Product" class="genric-btn  primary large rounded center-button" style="font-size: 16px;">
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
		var selector_counter = {{ $selectors_count }};

		$(document).ready(function() {
			// Get selectors array
			selectors_array = JSON.parse($("input[name=selector_array]").val());
		});

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