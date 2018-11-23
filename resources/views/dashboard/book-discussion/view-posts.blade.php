@extends('layouts.app')

@section('content')
	@include('layouts.hero')

	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="discussion-post">
					<form>
						<div class="row mb-16">
							<div class="col-lg-2 col-md-2 col-sm-3 col-3">
								<img src="https://i.pinimg.com/originals/b3/9f/24/b39f242593d0b7edd8e9b5da9dc640db.jpg" class="regular-image circle-image">
							</div>
							<div class="col-lg-10 col-md-10 col-sm-12 col-12">
								<h5 class="mb-2">Create New Post</h5>
								<textarea name="post_body" rows="3" class="form-control"></textarea>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<input type="submit" value="Create Post" class="genric-btn primary small rounded mb-0" style="float: right;">
							</div>
						</div>
					</form>
				</div>

				<hr class="mt-32 mb-32" />
				
				<div class="row discussion-post">
					<div class="col-lg-2 col-md-2 col-sm-4 col-4 discussion-profile">
						<a href=""><img src="https://i.pinimg.com/originals/b3/9f/24/b39f242593d0b7edd8e9b5da9dc640db.jpg" class="regular-image circle-image"></a>
						<p class="mb-0 mt-2 text-center"><a href="" class="black-link">Amy Mendoza</a></p>
						<p class="mb-2 text-center"><small>8 likes</small></p>
						<button class="genric-btn small info center-button">Like</button>
					</div>
					<div class="col-lg-10 col-md-10 col-sm-8 col-8 discussion-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p class="mb-0"><small>November 20th, 2018 at 12:43PM</small></p>
					</div>
				</div>

				<div class="row discussion-post">
					<div class="col-lg-2 col-md-2 col-sm-4 col-4 discussion-profile">
						<a href=""><img src="https://i.pinimg.com/originals/b3/9f/24/b39f242593d0b7edd8e9b5da9dc640db.jpg" class="regular-image circle-image"></a>
						<p class="mb-0 mt-2 text-center"><a href="" class="black-link">Amy Mendoza</a></p>
						<p class="mb-2 text-center"><small>8 likes</small></p>
						<button class="genric-btn small info center-button">Like</button>
					</div>
					<div class="col-lg-10 col-md-10 col-sm-8 col-8 discussion-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<p class="mb-0"><small>November 20th, 2018 at 12:43PM</small></p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12 col-12">
				<div class="well">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<img src="http://killingmarketing.com/wp-content/uploads/2017/05/PULIZZI-cover-768x1154.png" class="regular-image">
							<h5 class="text-center mt-16 mb-0">Killing Marketing</h5>
							<p class="text-center"><small>November 8th to November 31st</small></p>
							<hr />
							<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.</p>
							<a href="" class="genric-btn rounded small primary center-button">Get Book</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection