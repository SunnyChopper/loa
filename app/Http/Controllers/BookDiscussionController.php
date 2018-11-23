<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\BookDiscussionHelper;
use App\Custom\UploadHelper;

class BookDiscussionController extends Controller
{
    public function create(Request $data) {
    	// Book discussion helper
        $book_discussion_helper = new BookDiscussionHelper();

        // Get data
    	$book_title = $data->book_title;
    	$author = $data->author;
    	$book_description = $data->book_description;
        $amazon_referral_link = $data->amazon_referral_link;
        $start_date = $data->start_date;
        $end_date = $data->end_date;
        $book_image = $data->file('book_image');

        // Upload image for course image URL
        $upload_helper = new UploadHelper();
        $file_name = "book_image." . $book_image->getClientOriginalExtension();
        $file_path = "discussions/" . $book_discussion_helper->get_next_book_discussion_id() . "/" . $file_name;
        $book_image_url = $upload_helper->upload_image_to_s3($book_image, $file_path);

        // Book discussion data for book discussion helper
    	$book_data = array(
    		"start_date" => $start_date,
    		"end_date" => $end_date,
            "book_title" => $book_title,
            "author" => $author,
            "book_description" => $book_description,
            "amazon_referral_link" => $amazon_referral_link,
            "book_image_url" => $book_image_url
    	);

    	// Create book discussion
    	$book_id = $book_discussion_helper->create_book_discussion($book_data);

    	// Return to all
    	return redirect(url('/admin/discussions/view'));
    }
}
