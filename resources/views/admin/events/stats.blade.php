@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				@if(count($events) > 0)
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Name</th>
								<th>Views</th>
								<th>Attending</th>
								<th>Guests</th>
								<th>Members</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($events as $event)
									<tr>
										<td style="min-width: 50px;">{{ $event->event_name }}</td>
										<td style="min-width: 150px;">{{ $event->event_description }}</td>
										<td style="min-width: 100px;">{{ $event->location }}</td>
										<td style="min-width: 50px;">{{ Carbon\Carbon::parse($event->start_time)->format('M jS, Y \a\t H:i A') }}</td>
										<td style="min-width: 50px;">{{ Carbon\Carbon::parse($event->end_date)->format('M jS, Y \a\t H:i A') }}</td>
										<td style="min-width: 100px;"> 
											<a href="/admin/events/edit/{{ $event->id }}" class="genric-btn info small">Edit</a>
											<button id="{{ $event->id }}" type="button" class="genric-btn danger small delete_post_button">Delete</button>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					<div class="well">
						<div class="row">
							<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
								<h3 class="text-center">No Events</h3>
								<p class="text-center">Click below to create the first event.</p>
								<div class="row">
									<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
										<a href="/admin/events/new" class="genric-btn primary rounded center-button" style="font-size: 16px;">Create New Event</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(".delete_post_button").on('click', function() {
			// Get post ID
			var post_id = $(this).attr('id');

			// Set ID for modal
			$("#post_id_delete_modal").val(post_id);

			// Show modal
			$("#delete_post_modal").modal();
		});
	</script>
@endsection