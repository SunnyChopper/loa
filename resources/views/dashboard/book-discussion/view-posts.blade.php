@extends('layouts.app')

@section('content')
	@include('layouts.hero')

	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-12 col-12">

				@if(Auth::guest())
					<div class="well">
						<h4 class="text-center mb-16">You must be logged in to post.</h4>
						<div class="row">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<a href="/members/register" class="genric-btn primary rounded center-button" style="font-size: 14px;">Register</a>
							</div>
						</div>
					</div>
				@else
					<div class="discussion-post">
						<form id="create_discussion_post_form" action="/discussion/post/create" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="book_discussion_id" value="{{ $book->id }}">
							<div class="row mb-16">
								<div class="col-lg-2 col-md-2 col-sm-3 col-3">
									@if($user->profile_image_url != "")
										<img src="{{ $user->profile_image_url }}" class="regular-image circle-image">
									@else
										<img src="https://www.chaarat.com/wp-content/uploads/2017/08/placeholder-user.png" class="regular-image circle-image">
									@endif
								</div>
								<div class="col-lg-10 col-md-10 col-sm-12 col-12">
									<h5 class="mb-2">Create New Post</h5>
									<textarea name="post_body" rows="3" form="create_discussion_post_form" class="form-control"></textarea>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<input type="submit" value="Create Post" class="genric-btn primary small rounded mb-0" style="float: right;">
								</div>
							</div>
						</form>
					</div>
				@endif

				<hr class="mt-32 mb-32" />
				
				@if(count($posts) > 0)
					@foreach($posts as $post)
						<div class="row discussion-post">
							<div class="col-lg-2 col-md-2 col-sm-4 col-4 discussion-profile">
								@if($user_helper->get_user_profile_image_url_by_id($post->post_owner_id) != "")
									<a href=""><img src="{{ $user_helper->get_user_profile_image_url_by_id($post->post_owner_id) }}" class="regular-image circle-image"></a>
								@else
									<img src="https://www.chaarat.com/wp-content/uploads/2017/08/placeholder-user.png" class="regular-image circle-image">
								@endif
								<p class="mb-0 mt-2 text-center"><a href="" class="black-link">{{ $user_helper->get_user_first_name_by_id($post->post_owner_id)  }} {{ $user_helper->get_user_last_name_by_id($post->post_owner_id) }}</a></p>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-8 discussion-body">
								<p>{{ $post->post_body }}</p>
								<p class="mb-0"><small>{{ $post->created_at->format('M jS, Y \a\t h:i A') }}</small></p>
							</div>
						</div>
					@endforeach

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							{{ $posts->links() }}
						</div>
					</div>
				@else
					<h4 style="color: #C0C0C0;" class="text-center mt-64">No posts yet...be the first one!</h4>
				@endif
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12 col-12">
				<div class="well">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<img src="{{ $book->book_image_url }}" class="regular-image">
							<h5 class="text-center mt-16 mb-0">{{ $book->book_title }}</h5>
							<p class="text-center"><small>{{ Carbon\Carbon::parse($book->start_date)->format('M jS') }} to {{ Carbon\Carbon::parse($book->end_date)->format('M jS') }}</small></p>
							@if($book->book_description != "")
								<hr />
								<p class="text-center">{{ $book->book_description }}</p>
							@endif

							@if($book->book_amazon_link != "")
								<a href="{{  }}" class="genric-btn rounded small primary center-button">Get Book</a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection