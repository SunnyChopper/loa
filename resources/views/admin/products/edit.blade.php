@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<div class="well">
					<form>
						{{ csrf_field() }}
						<input type="hidden" name="product_id" value="{{ $product->id }}">
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
									<textarea class="form-control" rows="4" required>{{ $product->product_description }}</textarea>
								</div>
							</div>
						</div>

						<h3>Images</h3>
						<hr />
						<div class="row mb-32">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Main Image:</h5>
									<img src="{{ $product->featured_image_url }}" class="regular-image mt-8 mb-8">
									<input type="file" name="featured_image_url" required>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Extra Image #1:</h5>
									<input type="file" name="extra_image_1">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Extra Image #2:</h5>
									<input type="file" name="extra_image_2">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Extra Image #3:</h5>
									<input type="file" name="extra_image_3">
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
										<input id="digital_product" type="checkbox" style="display: inline-block;">
										<p style="display: inline-block; margin-left: 4px;" class="mb-0 black">Yes, it is a digital product.</p>
									</div>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Digital Product Download Link:</h5>
									<input type="text" name="digital_product_link" class="form-control" required>
								</div>
							</div>
						</div>

						<h3>Selectors</h3>
						<hr />
						@foreach(json_decode($product->selectors) as $selector=>$options)
							@foreach($options as $option)
							<div class="row mb-8">
								<div class="col-lg-5 col-md-5 col-sm-5 col-6">
									<input type="text" placeholder="Size" value="{{ $selector }}" class="form-control">
								</div>

								<div class="col-lg-5 col-md-5 col-sm-5 col-6">
									<input type="text" placeholder="Small" value={{ $option }} class="form-control">
								</div>

								<div class="col-lg-2 col-md-2 col-sm-2 col-2">
									<button class="genric-btn medium danger mt-2">Delete</button>
								</div>
							</div>
							@endforeach
						@endforeach

						<button class="genric-btn success small rounded">New Custom Selector</button>
						<hr />

						<div class="row mt-32">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<a href="" class="genric-btn  primary large rounded center-button" style="font-size: 20px;">Update Product</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection