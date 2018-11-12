@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	@include('admin.posts.modals.delete-post')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				@if(count($courses) > 0)
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Title</th>
								<th>Description</th>
								<th>Members</th>
								<th>Videos</th>
								<th>Status</th>
								<th>Created</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($courses as $course)
									<tr>
										<td>{{ $course->course_title }}</td>
										<td>{{ $course->course_description }}</td>
										<td>{{ $course->course_members }}</td>
										<td>{{ $course->course_num_videos }}</td>
										@if($course->course_status == 1)
											<td>In Draft</td>
										@elseif($course->course_status == 2)
											<td>Coming Soon</td>
										@else
											<td>Published</td>
										@endif
										<td style="min-width: 150px;">{{ $course->created_at->format('M d, Y') }}</td>
										<td style="min-width: 250px;"> 
											<a href="/admin/courses/edit/{{ $course->id }}" class="genric-btn info small">Edit</a>
											<button id="{{ $course->id }}" type="button" class="genric-btn danger small delete_course_button">Delete</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					<div class="well">
						<div class="row">
							<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
								<h3 class="text-center">No Courses on Site</h3>
								<p class="text-center">Click below to get started on creating your first course.</p>
								<div class="row">
									<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
										<a href="/admin/courses/new" class="genric-btn primary rounded center-button" style="font-size: 16px;">Create New Course</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".delete_course_button").on('click', function() {
			// Get post ID
			var course_id = $(this).attr('id');

			// Set ID for modal
			$("#course_id_delete_modal").val(course_id);

			// Show modal
			$("#delete_course_modal").modal();
		});
	</script>
@endsection