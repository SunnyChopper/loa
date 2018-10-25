@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
				<h3>Still Deciding? Here Are Some Reasons to Join Wolf Squad</h3>
				<hr />
				<ul class="list-group mt-16 mb-16">
					<li class="list-group-item">
						<h5>Work Smarter Than Your Competition</h5>
						<p class="mb-0 mt-8">As an entpreneur, it's important to have the right tools at your disposal. They help you work smarter than your competition, so that's why I include some free software tools to help you get started as an entrepreneur.</p>
					</li>
					<li class="list-group-item">
						<h5>Build Strong Groups and Alliances</h5>
						<p class="mb-0 mt-8">Sometimes it's not just what you know but also who you know. By joining Wolf Squad, you're entering a community of like-minded individuals who want to succeed just like you. Network and build alliances with each other.</p>
					</li>
					<li class="list-group-item">
						<h5>Get More Return on Your Investment</h5>
						<p class="mb-0 mt-8">The best investment you can make is the investment in yourself. That's why I've created courses that can help you start investing in yourself. I will also share with you how I built the Instagram empire and social media marketing agency I have today.</p>
					</li>
					<li class="list-group-item">
						<h5>Adopt the Growth Mindset</h5>
						<p class="mb-0 mt-8">At the end of the day, all the tools, knowledge, and people in the world cannot make a difference in your life if you are not willing to get out of your comfort zone. That's why I've structured this website to help adopt the growth mindset. Always learning.</p>
					</li>
				</ul>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="well">
					<h3 class="text-center">Become a Wolf</h3>
					<p class="text-center mb-4"><small>Fields with <span class="red">*</span> are required</small></p>
					<hr />
					<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
						@csrf
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label>Username<span class="red">*</span>:</label>
									<input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}" required autofocus>

									@if ($errors->has('username'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('username') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label>Name<span class="red">*</span>:</label>
									<input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>

									@if ($errors->has('name'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('name') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label>Email<span class="red">*</span>:</label>
									<input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>

									@if ($errors->has('email'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('email') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<label>Password<span class="red">*</span>:</label>
									<input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>

									@if ($errors->has('password'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<input type="submit" class="btn btn-sm primary-btn center-button" value="Unlock the Ambition">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection