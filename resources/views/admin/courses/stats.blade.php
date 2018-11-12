@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				@if(count($courses) > 0)
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Title</th>
								<th>Description</th>
								<th>Views</th>
								<th>Purchased</th>
								<th>Guest Purchases</th>
								<th>Member Purchases</th>
								<th>Created</th>
							</thead>
							<tbody>
								@foreach($courses as $course)
									<tr>
										<td>{{ $course->course_title }}</td>
										<td>{{ $course->course_description }}</td>
										<td>{{ $course_helper->get_views_for_course($course->id) }}</td>
										<td>{{ $course_helper->get_purchased_for_course($course->id) }}</td>
										<td>{{ $course_helper->get_guest_purchases_for_course($course->id) }}</td>
										<td>{{ $course_helper->get_member_purchases_for_course($course->id) }}</td>
										<td>{{ $course->created_at->format('M d, Y') }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					<div class="well">
						<div class="row">
							<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
								<h3 class="text-center">No Published Courses on Site</h3>
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