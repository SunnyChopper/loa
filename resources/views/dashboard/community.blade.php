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
						@if($voting_helper->does_voting_poll_exist() == true)
							@if($voting_helper->has_user_voted() == true)
								<p class="text-center mt-16 mb-0">You have already voted for this week.</p>
							@else
								<?php $poll = $voting_helper->get_poll(); ?>
								<input type="hidden" name="voting_poll_id" value="{{ $poll->id }}">
								{{ csrf_field() }}
								<ul class="list-group" id="voting_options">
									<li class="list-group-item voting_option_box" id="voting_option_1">
										<input type="radio" id="option_1" name="selected_voting_option" value="1" style="display: inline-block;">
										<p class="mb-0" style="display: inline-block; margin-left: 4px;">{{ $poll->voting_option_1_vote }}</p>
										<hr />
										<p class="mb-0">{{ $poll->voting_option_1_description }}</p>
									</li>

									<li class="list-group-item voting_option_box" id="voting_option_2">
										<input type="radio" id="option_2" name="selected_voting_option" value="2" style="display: inline-block;">
										<p class="mb-0" style="display: inline-block; margin-left: 4px;">{{ $poll->voting_option_2_vote }}</p>
										<hr />
										<p class="mb-0">{{ $poll->voting_option_2_description }}</p>
									</li>

									<li class="list-group-item voting_option_box" id="voting_option_3">
										<input type="radio" id="option_3" name="selected_voting_option" value="3" style="display: inline-block;">
										<p class="mb-0" style="display: inline-block; margin-left: 4px;">{{ $poll->voting_option_3_vote }}</p>
										<hr />
										<p class="mb-0">{{ $poll->voting_option_3_description }}</p>
									</li>

									<li class="list-group-item voting_option_box" id="voting_option_4">
										<input type="radio" id="option_4" name="selected_voting_option" value="4" style="display: inline-block;">
										<p class="mb-0" style="display: inline-block; margin-left: 4px;">{{ $poll->voting_option_4_vote }}</p>
										<hr />
										<p class="mb-0">{{ $poll->voting_option_4_description }}</p>
									</li>
								</ul>
								<p class="text-center mt-8 mb-2 green" id="success" style="display: none;"></p>
								<p class="text-center mt-8 mb-2 red" id="error" style="display: none;"></p>
								<button type="button" class="genric-btn submit_vote_button primary rounded mt-16 center-button" style="font-size: 14px;">Submit Vote</button>
							@endif
						@else
							<p class="text-center mb-0 mt-16">No active polls right now. Check back later.</p>
						@endif
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

		$(".submit_vote_button").on('click', function() {
			// Get option
			var selected_option = $('input[name=selected_voting_option]:checked').val();

			// Create AJAX request
			$.ajax({
				url: '/vote/create',
				data: {
					'voting_poll_id': $('input[name=voting_poll_id]').val(),
					'option': selected_option,
					'_token': $('input[name=_token]').val()
				},
				type: "POST",
				success: function(data) {
					if (data != "error") {
						// Hide the options
						$("#voting_options").hide();

						// Show feedback
						$("#success").show();
						$("#success").html('Successfully voted.');

						// Disable button
						$(".submit_vote_button").attr('disabled', true);
					}
				}
			});
		});
	</script>
@endsection