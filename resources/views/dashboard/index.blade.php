@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	@include('dashboard.modals.rsvp-event-modal')
	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<h4 class="text-center">Latest Marketing Advice</h4>
				<hr />
				
				@foreach($posts as $post)
					<div class="row">
						<div class="col-lg-5 col-md-5 col-sm-5 col-12">
							<img src="{{ $post->featured_image_url }}" class="regular-image">
						</div>
						<div class="col-lg-7 col-md-7 col-sm-7 col-12">
							<h5 class="mobile-mt-8">{{ $post->title }}</h5>
							<p class="mb-2">{{ substr(strip_tags($post->post_body), 0, 128)  }}</p>
							<a href="/posts/{{ $post->id }}/{{ $post->slug }}">Read More</a>
						</div>
					</div>
				@endforeach
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="well">
					<h4 class="text-center">Available Courses</h4>
					<hr />
					<p class="mt-16 mb-0 text-center">No courses available at this time. We will update you through email when new courses are available.</p>
				</div>
			</div>
		</div>
	</div>

	@if(count($events) > 0)
	<div style="background-color: #EAEAEA;" class="pt-64 pb-64">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<h2 class="text-center">Upcoming Event</h2>
					<p class="text-center mb-0"><small>Come out and network with the Wolf Squad</small></p>
					<hr />
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="padding: 16px; border: 2px solid #AAAAAA; border-radius: 5px; background: white;">
						<h3 class="text-center"><b>What is it?</b></h3>
						<p class="text-center mb-0 mt-16">{{ $events[0]->event_description }}</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="padding: 16px; border: 2px solid #AAAAAA; border-radius: 5px; background: white;">
						<h3 class="text-center"><b>Where is it?</b></h3>
						<p class="text-center mb-0 mt-16">{{ $events[0]->location }}</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<div style="padding: 16px; border: 2px solid #AAAAAA; border-radius: 5px; background: white;">
						<h3 class="text-center"><b>When is it?</b></h3>
						<p class="text-center mb-0 mt-16">{{ Carbon\Carbon::parse($events[0]->start_time)->format('H:i A \o\n F jS, Y') }}</p>
					</div>
				</div>
			</div>

			<div class="row mt-32">
				<div class="col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-6 offset-sm-3 col-12">
					<h4 class="text-center">Get Updates</h4>
					<p class="text-center mb-8">Click below to sign up and get updates for the event!</p>
					<button type="button" id="event_id_{{ $events[0]->id }}" class="genric-btn primary rounded center-button rsvp_event_button" style="font-size: 16px;">RSVP for Event</button>

				</div>
			</div>
		</div>
	</div>
	@endif

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<h3 class="text-center">Latest Updates</h3>
			</div>
		</div>

		<div class="row mt-16">
			<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
				<ul class="list-group">
					<li class="list-group-item">
						<h4 class="mb-2">Finished making vBeta1.1 of website and releasing community section</h4>
						<p class="mb-0">The next version of the beta site is done. Weekly book discussions, voting polls and members backend.</p>
						<p class="mb-0"><small>November 24th, 2018</small></p>
					</li>
					<li class="list-group-item">
						<h4 class="mb-2">Finished making vBeta of website</h4>
						<p class="mb-0">The beta version of the website has been complete, moving onto making more tools, courses, and content.</p>
						<p class="mb-0"><small>November 4th, 2018</small></p>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div style="background-color: black;" class="p-32">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<h3 class="white text-center">"Education is not the learning of facts, but the training of the mind to think."</h3>
					<p class="white text-center mb-0">- Albert Einstein</p>
				</div>
			</div>
		</div>
	</div>

	@if(count($my_courses) > 0)
		<div class="container pt-64 pb-64">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<h2 class="text-center">My Courses</h2>
					<hr />
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-12">
				</div>
			</div>
		</div>
	@endif
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".rsvp_event_button").on('click', function() {
			// Get the event id
			var event_id = parseInt($(this).attr('id').replace("event_id_", ""));
			
			// Set the modal event id
			$("#event_id_rsvp_modal").val(event_id);

			// Open modal
			$("#rsvp_event_modal").modal();
		});
	</script>
@endsection