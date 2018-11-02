@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	
	<div class="container mt-64 mb-64">
		<form id="edit_blog_post_form" action="/admin/posts/update" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" value="{{ $post->id }}" name="post_id"> 
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-12">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<h5 class="mb-2">Title:</h5>
								<input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
								<span class="mb-0" id="title_error" style="display: none;"><small class="red">Please enter title.</small></span>
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 mt-16">
							<div class="form-group">
								<h5 class="mb-2">Body:</h5>
								<textarea name="post_body" form="edit_blog_post_form" id="post_body" class="form-control" rows="16">{{ $post->post_body }}</textarea>
								<span class="mb-0 mt-0" id="body_error" style="display: none;"><small class="red">Please enter body.</small></span>
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
									<input type="text" name="slug" value="{{ $post->slug }}" class="form-control" required>
									<span class="mb-0" id="slug_error" style="display: none;"><small class="red">Please enter slug.</small></span>
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
									<img id="main_image_img" src="{{ $post->featured_image_url }}" class="regular-image mb-8 mt-8">
									<input type="file" onchange="displayMainImage(this);" name="featured_image">
									<span class="mb-0" id="file_error" style="display: none;"><small class="red">Please upload file.</small></span>
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
								<input type="submit" value="Update Post" class="genric-btn primary medium center-button">
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

		$("input[name=title]").on('click', function() {
			$(this).css('border', '1px solid #ced4da');
			$("#title_error").hide();
		});

		$("input[name=slug]").on('click', function() {
			$(this).css('border', '1px solid #ced4da');
			$("#slug_error").hide();
		});

		$("input[name=featured_image]").on('click', function() {
			$("#file_error").hide();
		});

		$("#edit_blog_post_form").submit(function(e) {
			if ($("input[name=title]").val() == "") {
				e.preventDefault();
				$("input[name=title]").css('border', '2px solid red');
				$("#title_error").show();
			}

			if (tinyMCE.get('post_body').getContent() == "") {
				e.preventDefault();
				$("#body_error").show();
			}

			if ($("input[name=slug]").val() == "") {
				e.preventDefault();
				$("input[name=slug]").css('border', '2px solid red');
				$("#slug_error").show();
			}

		});
	</script>
@endsection