@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				@foreach($posts as $post)
					<a href="/posts/{{ $post->id }}/{{ $post->slug }}" class="black-link">
						<div class="blog-entry">
							<div class="image">
								<img src="{{ $post->featured_image_url }}" class="regular-image">
							</div>
							<div class="info">
								<h3>{{ $post->title }}</h3>
								<p>{{ substr(strip_tags($post->post_body), 0, 128) . '...' }}</p>
								<hr />
								<p class="mb-0"><small>Written on {{ $post->created_at->format('F jS, Y') }}</small></p>
							</div>
						</div>
					</a>
				@endforeach

				{{ $posts->links() }}
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				{{-- <h4 class="mt-16">Search</h4>
				<div class="row mt-16">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
						<input type="text" class="form-control">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<a href="4"  class="genric-btn btn-sm primary arrow center-button small"><span class="lnr lnr-arrow-right-circle" style="font-size:24px; margin-top: 6px; margin-bottom: 6px; margin-left: -0px; margin-right:0px;"></span>
						</a>

					</div>
				</div>

				<hr /> --}}

				{{-- <h4 class="mt-16">Top Posts</h4>

				@foreach($top_posts as $top_post)
				<div class="image-box">
					<div class="image">
						<img src="{{ $top_post->featured_image_url }}" class="regular-image"> 
					</div>
					<div class="info">
						<h6 class="mt-0 mb-2">{{ $top_post->title }}</h6>
						<a href="/posts/{{ $top_post->id }}/{{ $top_post->slug }}" class="genric-btn small primary">Read More <span class="lnr lnr-arrow-right"></span></a>
					</div>
				</div>
				@endforeach --}}
			</div>
		</div>
	</div>
@endsection