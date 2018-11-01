@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				@if(count($posts) > 0)
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Main Image</th>
								<th>Title</th>
								<th>Views</th>
								<th>Likes</th>
								<th>Created</th>
								<th></th>
							</thead>
							<tbody>
								@foreach($posts as $post)
									<tr>
										<td><img src="{{ $post->featured_image_url }}" class="regular-image"></td>
										<td>{{ $post->title }}</td>
										<td>{{ $posts->views }}</td>
										<td>{{ $posts->likes }}</td>
										<td>{{ $posts->created_at->format('m D y') }}</td>
										<td>
											<a href="/admin/products/edit/{{ $product->id }}" class="genric-btn info small">Edit</a>
											<button href="" class="genric-btn danger small">Delete</button>
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