@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="well">
					<h4 class="text-center">Join the Facebook Group</h4>
					<hr />
					<p class="text-center">If you have a question or just want to share some knowledge, you need to join the Law of Ambition Facebook Group. Click below to get started.</p>
					<button class="genric-btn primary center-button rounded" style="font-size: 14px;">Join the Group</button>
				</div>

				<div class="well">
					<h4 class="text-center">Book of the Week</h4>
					<hr />
					<p class="text-center">Every week we read a book and discuss about it. Click the button below to enter the discussion room for this book.</p>
					<div class="row">
						<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
							<img src="{{ $book->book_image_url }}" class="regular-image">
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<h4 class="text-center mt-8">{{ $book->book_title }}</h4>
							<p class="text-center"><small>By {{ $book->author }}</small></p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
							<a href="/discussion/{{ $book->id }}" class="genric-btn primary center-button rounded" style="font-size: 14px;">Join Discussion</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="well">
					<h4 class="text-center">Vote on the Next Video</h4>
					<hr />
					<p class="text-center">I want to make content that will benefit the maximum amount of people. Vote below what you would like to see and then </p>
					<ul class="list-group">
						<li class="list-group-item voting_option_box" id="voting_option_1">
							<input type="radio" id="option_1" name="selected_voting_option" value="1" style="display: inline-block;">
							<p class="mb-0" style="display: inline-block; margin-left: 4px;">Voting Option 1</p>
							<hr />
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</li>

						<li class="list-group-item voting_option_box" id="voting_option_2">
							<input type="radio" id="option_2" name="selected_voting_option" value="2" style="display: inline-block;">
							<p class="mb-0" style="display: inline-block; margin-left: 4px;">Voting Option 2</p>
							<hr />
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</li>

						<li class="list-group-item voting_option_box" id="voting_option_3">
							<input type="radio" id="option_3" name="selected_voting_option" value="3" style="display: inline-block;">
							<p class="mb-0" style="display: inline-block; margin-left: 4px;">Voting Option 3</p>
							<hr />
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</li>

						<li class="list-group-item voting_option_box" id="voting_option_4">
							<input type="radio" id="option_4" name="selected_voting_option" value="4" style="display: inline-block;">
							<p class="mb-0" style="display: inline-block; margin-left: 4px;">Voting Option 4</p>
							<hr />
							<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</li>
					</ul>
					<button type="button" class="genric-btn submit_vote_button primary rounded mt-16 center-button" style="font-size: 14px;">Submit Vote</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$("#voting_option_1").on('click', function() {
			$("#option_1").prop("checked", true);
		});

		$("#voting_option_2").on('click', function() {
			$("#option_2").prop("checked", true);
		});

		$("#voting_option_3").on('click', function() {
			$("#option_3").prop("checked", true);
		});

		$("#voting_option_4").on('click', function() {
			$("#option_4").prop("checked", true);
		});
	</script>
@endsection