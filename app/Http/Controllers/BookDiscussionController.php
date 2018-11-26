<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\BookDiscussionHelper;
use App\Custom\UploadHelper;

use Auth;

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

    public function create_post(Request $data) {
        // Book discussion helper
        $book_discussion_helper = new BookDiscussionHelper();

        // Get data
        $book_discussion_id = $data->book_discussion_id;
        $post_owner_id = Auth::id();
        $post_body = $data->post_body;

        // Create book discussion post data
        $post_data = array(
            "book_discussion_id" => $book_discussion_id,
            "post_owner_id" => $post_owner_id,
            "post_body" => $post_body
        );

        // Create
        $book_discussion_helper->create_book_discussion_post($post_data);

        // Return to book discussion page
        return redirect(url('/discussion/' . $book_discussion_id));
    }

    public function update(Request $data) {
        // Book discussion helper
        $book_discussion_helper = new BookDiscussionHelper();

        // Get data
        $book_discussion_id = $data->book_discussion_id;
        $book_title = $data->book_title;
        $author = $data->author;
        $book_description = $data->book_description;
        $amazon_referral_link = $data->amazon_referral_link;
        $start_date = $data->start_date;
        $end_date = $data->end_date;

        // Get book
        $book = $book_discussion_helper->get_book_discussion_by_id($book_discussion_id);

        // Check to see if image updated
        if ($data->hasFile('book_image')) {
            $update_book_image = true;
            $book_image = $data->file('book_image');

            // Upload file for course image URL
            $upload_helper = new UploadHelper();
            $file_name = "book_image." . $book_image->getClientOriginalExtension();
            $file_path = "discussions/" . $book_discussion_id . "/" . $file_name;
            $book_image_url = $upload_helper->upload_image_to_s3($book_image, $file_path);
        } else {
            $update_book_image = false;
        }

        // Book discussion data for book discussion helper
        $book_data = array(
            "book_discussion_id" => $book_discussion_id,
            "start_date" => $start_date,
            "end_date" => $end_date,
            "book_title" => $book_title,
            "author" => $author,
            "book_description" => $book_description,
            "amazon_referral_link" => $amazon_referral_link
        );

        if ($update_book_image == true) {
            $book_data["book_image_url"] = $book_image_url;
        } else {
            $book_data["book_image_url"] = $book->book_image_url;
        }

        // Update
        $book_discussion_helper->update($book_data);

        // Redirect to book discussions
        return redirect(url('/admin/discussions/view'));
    }

    public function delete_post(Request $data) {
        // Book discussion helper
        $book_discussion_helper = new BookDiscussionHelper();

        // Get data
        $post_id = $data->post_id;

        // Create
        $book_discussion_helper->delete_book_discussion_post($post_id);

        // Return to book discussion page
        return redirect(url('/discussion/' . $book_discussion_id));
    }
}
