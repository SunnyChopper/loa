@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2 class="text-center">Invest in Yourself</h2>
				<p class="text-center mt-2">The best investment is the one made in your education. As the great billionare Warren Buffett said, "the more you learn, the more you earn."</p>
				<hr />
			</div>
		</div>

		<div class="row">
			@if($course_helper->get_number_of_courses_on_display() > 0)
				@foreach($courses as $course)
					@if($course->course_status == 2)
						<a href="/courses/view/{{ $course->id }}" class="black-link">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="image-box-disabled">
									<div class="image">
										<img src="{{ $course->course_image_url }}" class="regular-image">
									</div>
									<div class="info">
										<h4>{{ $course->course_title }}</h4>
										<p class="mt-2 mb-0">{{ $course->course_description }}</p>
										<p class="mt-2 mb-0 text-center"><b>Coming Soon</b></p>
									</div>
								</div>
							</div>
						</a>
					@elseif($course->course_status == 3)
						<a href="/courses/view/{{ $course->id }}" class="black-link">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="image-box">
									<div class="image">
										<img src="{{ $course->course_image_url }}" class="regular-image">
									</div>
									<div class="info">
										<h4>{{ $course->course_title }}</h4>
										<p class="mt-2 mb-0">{{ $course->course_description }}</p>
										<p class="mt-2 mb-0 text-center"><b>Coming Soon</b></p>
									</div>
								</div>
							</div>
						</a>
					@endif
				@endforeach
			@else
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
					<div class="well">
						<h4 class="text-center">No courses available yet...</h4>
						<p class="text-center mb-0">Check back soon. I will also send out email updates as new courses become available.</p>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection