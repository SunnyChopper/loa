@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	@include('admin.voting-polls.modals.delete-voting-poll')
	<div class="container mt-32 mb-32">
		<div class="row">
			@if(count($polls) > 0)
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Option 1 Votes</th>
								<th>Option 2 Votes</th>
								<th>Option 3 Votes</th>
								<th>Option 4 Votes</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($polls as $poll)
									<tr>
										<td>{{ $poll->voting_option_1_votes }}</td>
										<td>{{ $poll->voting_option_2_votes }}</td>
										<td>{{ $poll->voting_option_3_votes }}</td>
										<td>{{ $poll->voting_option_4_votes }}</td>
										<td>{{ Carbon\Carbon::parse($poll->start_date)->format('M jS, Y') }}</td>
										<td>{{ Carbon\Carbon::parse($poll->end_date)->format('M jS, Y') }}</td>
										<td>
											<button id="delete_{{ $poll->id }}" class="genric-btn danger small delete_voting_poll_button">Delete</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@else
				<div class="col-lg-8 offset-lg-2 col-md-10 offset-1 col-sm-12 col-12">
					<div class="well">
						<h3 class="text-center">No Polls</h3>
						<p class="text-center mt-8">Create your first voting poll and gain feedback from the audience.</p>
						<div class="row">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<a href="/admin/voting/new" class="genric-btn primary rounded" style="font-size: 14px;">Create Voting Poll</a>
							</div>
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".delete_voting_poll_button").on('click', function() {
			// Get the product id
			var voting_poll_id_string = $(this).attr('id');
			var voting_poll_id = voting_poll_id_string.replace("delete_", "");

			// Change the hidden input value
			$("#voting_poll_id_delete_modal").val(voting_poll_id);

			// Show the modal
			$("#delete_voting_poll_modal").modal();
		});
	</script>
@endsection