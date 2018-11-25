<?php

namespace App\Custom;

use Illuminate\Support\Carbon;

use App\BookDiscussion;
use App\DiscussionPost;
use App\DiscussionPostLike;
use App\DiscussionPostComment;

use Auth;

class BookDiscussionHelper {
	/* Private variables */
	private $book_discussion_id;

	/* Initializers */
	public function __construct($book_discussion_id = 0) {
		$this->book_discussion_id = $book_discussion_id;
	}

	/* Public functions */
	public function create_book_discussion($data) {
		date_default_timezone_set("America/Los_Angeles");

		// Get data
		$start_date = $data["start_date"];
		$end_date = $data["end_date"];
		$book_title = $data["book_title"];
		$author = $data["author"];
		$book_description = $data["book_description"];
		$amazon_referral_link = $data["amazon_referral_link"];
		$book_image_url = $data["book_image_url"];

		// Create book discussion
		$book_discussion = new BookDiscussion;
		$book_discussion->start_date = $start_date;
		$book_discussion->end_date = $end_date;
		$book_discussion->book_title = $book_title;
		$book_discussion->author = $author;
		$book_discussion->book_description = $book_description;
		$book_discussion->amazon_referral_link = $amazon_referral_link;
		$book_discussion->book_image_url = $book_image_url;
		$book_discussion->save();

		return $book_discussion->id;	
	}

	public function create_book_discussion_post($data) {
		date_default_timezone_set("America/Los_Angeles");

		// Get data
		$book_discussion_id = $data["book_discussion_id"];
		$post_owner_id = $data["post_owner_id"];
		$post_body = $data["post_body"];

		// Create book discussion post
		$discussion_post = new DiscussionPost;
		$discussion_post->book_discussion_id = $book_discussion_id;
		$discussion_post->post_owner_id = $post_owner_id;
		$discussion_post->post_body = $post_body;
		$discussion_post->is_active = 1;
		$discussion_post->save();

		// Update book discussion number of posts
		$book_discussion = DiscussionPost::where('id', $book_discussion_id)->first();
		$book_discussion->num_posts = $book_discussion->num_posts + 1;
		$book_discussion->save();

		return $discussion_post->id;
	}

	public function create_discussion_post_comment($data) {
		// Get data
		$post_id = $data["post_id"];
		$comment_body = $data["comment_body"];
		$comment_user_id = $data["comment_user_id"];

		// Create comment
		$comment = new DiscussionPostComment;
		$comment->post_id = $post_id;
		$comment->comment_body = $comment_body;
		$comment->comment_user_id = $comment_user_id;
		$comment->save();

		return $comment->id;
	}

	public function create_discussion_post_like($data) {
		// Get data
		$post_id = $data["post_id"];
		$user_id = $data["user_id"];

		// Create like
		$like = new DiscussionPostLike;
		$like->post_id = $post_id;
		$like->user_id = $user_id;
		$like->save();

		return $like->id;
	}

	public function delete_book_discussion_post($post_id) {
		$post = DiscussionPost::where('id', $post_id)->first();
		$post->is_active = 0;
		$post->save();
	}

	public function get_current_book_discussion() {
		$today = date("Y-m-d");
		return BookDiscussion::where('start_date', '<=', $today)->where('end_date', '>', $today)->first();
	}

	public function get_book_discussions() {
		return BookDiscussion::where('is_active', 1)->get();
	}

	public function get_discussion_posts_with_id_and_pagination($book_discussion_id, $pagination) {
		return DiscussionPost::where('book_discussion_id', $book_discussion_id)->paginate($pagination);
	}

	public function get_discussion_posts_with_id($book_discussion_id) {
		return DiscussionPost::where('book_discussion_id', $book_discussion_id)->get();
	}

	public function get_discussion_posts_for_user($user_id) {
		return DiscussionPost::where('post_owner_id', $user_id)->get();
	}

	public function get_comments_for_post($post_id) {
		return DiscussionPostComment::where('post_id', $post_id)->get();
	}

	public function get_likes_for_user($user_id) {
		return DiscussionPostLike::where('user_id', $user_id)->get();
	}

	public function get_next_book_discussion_id() {
		return DiscussionPostLike::count() + 1;
	}
}

?>