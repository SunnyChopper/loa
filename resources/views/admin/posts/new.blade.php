@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	
	<div class="container mt-64 mb-64">
		<form id="new_blog_post_form" action="/admin/posts/create" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-12">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<h5 class="mb-2">Title:</h5>
								<input type="text" name="title" class="form-control" required>
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 mt-16">
							<div class="form-group">
								<h5 class="mb-2">Body:</h5>
								<textarea name="post_body" form="new_blog_post_form" id="post_body" class="form-control" rows="16"></textarea>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="well">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">URL Slug:</h5>
									<input type="text" name="slug" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-12">
								<hr style="border: 0.5px solid #AAAAAA" />
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Main Image:</h5>
									<img id="main_image_img" src="" class="regular-image mb-8 mt-8">
									<input type="file" onchange="displayMainImage(this);" name="featured_image" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-12">
								<hr style="border: 0.5px solid #AAAAAA" />
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<input type="submit" value="Publish Post" class="genric-btn primary medium center-button">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<button class="genric-btn info medium center-button">Save Draft</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

	
@endsection

@section('page_js')
	<script type="text/javascript">
		function slugify(text) {
			return text.toString().toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, '').replace(/\-\-+/g, '-').replace(/^-+/, '').replace(/-+$/, '');
		}

		$("input[name=title]").on('input', function() {
			var title_text = $(this).val();
			title_text = title_text.removeStopWords();
			var slug_text = slugify(title_text);
			$("input[name=slug]").val(slug_text);
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
	</script>
@endsection