<?php

namespace App\Custom;

use App\BookDiscussion;
use App\DiscussionPostLike;
use App\DiscussionPostComment;

use Auth;

class VotingHelper {
	/* Private variables */
	private $book_discussion_id;

	/* Initializers */
	public function __construct($book_discussion_id = 0) {
		$this->book_discussion_id = $book_discussion_id;
	}

	/* Public functions */
	public function create_book_discussion($data) {
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

	public function get_current_book_discussion() {
		return BookDiscussion::where('start_date', '>=', Carbon\Carbon::now())->where('end_date', '>', Carbon\Carbon::now())->first();
	}
}

?>