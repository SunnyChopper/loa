@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	@include('admin.posts.modals.delete-post')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				@if(count($posts) > 0)
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Title</th>
								<th>Views</th>
								<th>Likes</th>
								<th>Status</th>
								<th>Created</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($posts as $post)
									<tr>
										<td style="min-width: 150px;">{{ $post->title }}</td>
										<td style="min-width: 50px;">{{ $post->views }}</td>
										<td style="min-width: 50px;">{{ $post->likes }}</td>
										<td style="min-width: 50px;">
											@if($post->is_active == 1)
												Published
											@elseif($post->is_active == 2)
												In Draft
											@endif
										</td>
										<td style="min-width: 50px;">{{ $post->created_at->format('M d, Y') }}</td>
										<td style="min-width: 100px;"> 
											<a href="/admin/posts/edit/{{ $post->id }}" class="genric-btn info small">Edit</a>
											<button id="{{ $post->id }}" type="button" class="genric-btn danger small delete_post_button">Delete</button>
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
								<h3 class="text-center">No Active Blog Posts</h3>
								<p class="text-center">Click below to get started on writing your first blog post.</p>
								<div class="row">
									<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
										<a href="/admin/posts/new" class="genric-btn primary rounded center-button" style="font-size: 16px;">Create New Post</a>
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