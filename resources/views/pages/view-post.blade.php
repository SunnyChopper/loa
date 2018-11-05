@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">
				<img src="{{ $post->featured_image_url }}" class="regular-image mb-16">
				<div id="post-body">
					{!! $post->post_body !!}
				</div>
				<hr />
				<p><small>Written by {{ $post->author_first_name }} on {{ $post->created_at->format('F jS, Y') }}</small>
			</div>

			{{-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<h4 class="mt-16">Search</h4>
				<div class="row mt-16">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
						<input type="text" class="form-control">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<a href="4"  class="genric-btn btn-sm primary arrow center-button small"><span class="lnr lnr-arrow-right-circle" style="font-size:24px; margin-top: 6px; margin-bottom: 6px; margin-left: -0px; margin-right:0px;"></span>
						</a>

					</div>
				</div>

				<hr />

				<h4 class="mt-16">Recent Posts</h4>

				<div class="image-box">
					<div class="image">
						<img src="https://assets.entrepreneur.com/content/3x2/2000/20181023203135-GettyImages-922710432.jpeg" class="regular-image"> 
					</div>
					<div class="info">
						<h6 class="mt-0 mb-2">5 Tips to Help Entrepreneurs Successfully Manage Multiple Ventures</h6>
						<a href="" class="genric-btn small primary">Read More <span class="lnr lnr-arrow-right"></span></a>
					</div>
				</div>

				<div class="image-box">
					<div class="image">
						<img src="https://assets.entrepreneur.com/content/3x2/2000/20181015203000-shutterstock-1034276521-crop.jpeg" class="regular-image"> 
					</div>
					<div class="info">
						<h6 class="mt-0 mb-2">How Building Relationships Helped Build My Business</h6>
						<a href="" class="genric-btn small primary">Read More <span class="lnr lnr-arrow-right"></span></a>
					</div>
				</div>

				<div class="image-box">
					<div class="image">
						<img src="https://assets.entrepreneur.com/content/3x2/2000/20181025213708-GettyImages-187232514.jpeg" class="regular-image"> 
					</div>
					<div class="info">
						<h6 class="mt-0 mb-2">Twitter's Stock Price Jumped 15 Percent Today. Here's Why.</h6>
						<a href="" class="genric-btn small primary">Read More <span class="lnr lnr-arrow-right"></span></a>
					</div>
				</div>
			</div> --}}
		</div>
	</div>
@endsection