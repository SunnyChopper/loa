@extends('layouts.app')

@section('content')
	@include('layouts.hero')
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
						<h4 class="mb-2">Finished making vBeta of website</h4>
						<p class="mb-0">The beta version of the website has been complete, moving onto making more tools, courses, and content.</p>
						<p class="mb-0"><small>November 4th, 2018</small></p>
					</li>
				</ul>
			</div>
		</div>
	</div>
@endsection