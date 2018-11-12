@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<form action="/admin/courses/update" method="POST" id="update_course_form" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="course_id" value="{{ $course->id }}" required>
					<div class="well">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<div class="form-group">
									<label>Course Title:</label>
									<input type="text" name="course_title" value="{{ $course->course_title }}" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="form-group">
									<label>YouTube ID of Course Preview:</label>
									<input type="text" name="course_video_preview_link" value="{{ $course->course_video_preview_link }}"" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Course Description:</label>
									<textarea name="course_description" form="update_course_form" class="form-control" rows="5">{{ $course->course_description }}</textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<img src="{{ $course->course_image_url }}" id="course_image" class="regular-image">
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Course Image:</label>
									<input type="file" name="course_image" onchange="displayCourseImage(this);">
								</div>

								<div class="form-group">
									<label>Course Status:</label>
									<select name="course_status" form="update_course_form" class="form-control">
										<option value="1" <?php if ($course->course_status == 1) { echo "selected"; } ?>>In Draft</option>
										<option value="2" <?php if ($course->course_status == 2) { echo "selected"; } ?>>Coming Soon</option>
										<option value="3" <?php if ($course->course_status == 3) { echo "selected"; } ?>>Published</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12 col-12">
								<input type="submit" value="Update Course" class="genric-btn rounded primary center-button" style="font-size: 16px;">
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
		function displayCourseImage(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$("#course_image").attr('src', e.target.result);
				};

				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>
@endsection