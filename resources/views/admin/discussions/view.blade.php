@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<table class="table table-striped" style="text-align: center; display: table;">
				<thead>
					<tr>
						<th style="text-align: left;">Book</th>
						<th></th>
						<th>Posts</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($book_discussions as $discussion)
						<tr>
							<td style="max-width: 100px;" class="center-table-cell">
								<img src="{{ $discussion->book_image_url }}" class="regular-image">
							</td>
							<td class="center-table-cell">{{ $discussion->book_title }}</td>
							<td class="center-table-cell">{{ $discussion->num_posts }}</td>
							<td class="center-table-cell">{{ Carbon\Carbon::parse($discussion->start_date)->format('M jS, Y') }}</td>
							<td class="center-table-cell">{{ Carbon\Carbon::parse($discussion->end_date)->format('M jS, Y') }}</td>
							<td class="center-table-cell">
								<a href="/admin/discussions/edit/{{ $discussion->id }}" class="genric-btn rounded info">Edit</a>
								<button class="genric-btn danger rounded">Delete</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$("")
	</script>
@endsection