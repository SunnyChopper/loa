@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-64 mb-64">
		<form id="new_blog_post_form" action="" method="post">
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
								<textarea name="body" class="form-control" rows="8" required></textarea>
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
									<img src="" class="regular-image">
									<input type="file" name="featured_image" required>
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
								<button class="genric-btn primary medium center-button">Publish Post</button>
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