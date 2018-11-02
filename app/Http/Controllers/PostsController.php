<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\UploadHelper;
use App\Custom\BlogPostHelper;
use App\Custom\SiteStatsHelper;

use Auth;

class PostsController extends Controller
{
    public function create(Request $data) {
    	// Initialize blog post helper
    	$blog_post_helper = new BlogPostHelper();

    	// Set the timezone
        date_default_timezone_set('America/Los_Angeles');

    	// Get contents
    	$title = $data->title;
    	$post_body = $data->post_body;
    	$slug = $data->slug;
    	$image = $data->file('featured_image');

    	// Upload image for featured image URL
    	$upload_helper = new UploadHelper();
    	$file_name = "featured_image" . "." . $image->getClientOriginalExtension();
    	$file_path = "posts/" . $blog_post_helper->get_next_post_id() . "/" . $file_name;
    	$featured_image_url = $upload_helper->upload_image_to_s3($image, $file_path);

    	// Gather data
    	$post_data = array(
    		"title" => $title,
    		"post_body" => $post_body,
    		"slug" => $slug,
    		"featured_image_url" => $featured_image_url
    	);

    	// Create blog post
    	$post_id = $blog_post_helper->create_blog_post($post_data);

    	// Create analytics
    	$site_stats_helper = new SiteStatsHelper();
    	$post_data = array(
    		"post_id" => $post_id,
    		"author_id" => Auth::id()
    	);
    	$site_stats_helper->new_blog_post($post_data);

    	// Redirect to view blog post
    	return redirect(url('/posts/' . Auth::id() . '/' . $slug));
    }

    public function update(Request $data) {
        // Get contents
        $post_id = $data->post_id;
        $title = $data->title;
        $post_body = $data->post_body;
        $slug = $data->slug;

    	// Initialize blog post helper
    	$blog_post_helper = new BlogPostHelper($post_id);

    	// Set the timezone
        date_default_timezone_set('America/Los_Angeles');

        // Check to see if image updated
        if($data->hasFile('featured_image')) {
            $image = $data->file('featured_image');

            // Upload image for featured image URL
            $upload_helper = new UploadHelper();
            $file_name = "featured_image" . "." . $image->getClientOriginalExtension();
            $file_path = "posts/" . $post_id . "/" . $file_name;
            $featured_image_url = $upload_helper->upload_image_to_s3($image, $file_path);

            $featured_image_url;
        } else {
            $featured_image_url = $blog_post_helper->get_image_url(); 
        }

    	// Gather data
    	$post_data = array(
    		"post_id" => $post_id,
    		"title" => $title,
    		"post_body" => $post_body,
    		"slug" => $slug,
    		"featured_image_url" => $featured_image_url
    	);

    	// Update blog post
    	$blog_post_helper->update_blog_post($post_data);

        header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
        header("Pragma: no-cache"); // HTTP 1.0.
        header("Expires: 0");

    	// Redirect to blog post
    	return redirect(url('/posts/' . Auth::id() . '/' . $slug));
    }

    public function save_draft(Request $data) {
    	// Initialize blog post helper
    	$blog_post_helper = new BlogPostHelper();

    	// Set the timezone
        date_default_timezone_set('America/Los_Angeles');

        // Get contents
    	$title = $data->title;
    	$post_body = $data->post_body;
    	$slug = $data->slug;
    	$image = $data->file('featured_image');

    	// Check to see if new post or old post
    	if ($data->post_id != "") {
    		$new_post = false;
    	} else {
    		$new_post = true;
    	}

    	// Upload image for featured image URL
    	$upload_helper = new UploadHelper();
    	$file_name = "featured_image" . "." . $image->getClientOriginalExtension();
    	$file_path = "posts/" . $blog_post_helper->get_next_post_id() . "/" . $file_name;
    	$featured_image_url = $upload_helper->upload_image_to_s3($image, $file_path);

    	// Gather data
    	$post_data = array(
    		"post_id" => $data->post_id,
    		"title" => $title,
    		"post_body" => $post_body,
    		"slug" => $slug,
    		"featured_image_url" => $featured_image_url
    	);

    	// Create or update blog post
    	if ($new_post == true) {
    		// Create the post
	    	$post_id = $blog_post_helper->create_blog_post($post_data);

	    	// Update to being a draft
	    	$blog_post_helper->put_blog_post_in_draft($post_id);

	    	// Redirect back to 
	    } else {
	    	// Update the post
	    	$blog_post_helper->update_blog_post($post_data);

	    	// Update to being a draft
	    	$blog_post_helper->put_blog_post_in_draft($data->post_id);
	    }
    }

    public function delete(Request $data) {
        // Get data
        $post_id = $data->post_id;

        // Delete the post
        $blog_post_helper = new BlogPostHelper();
        $blog_post_helper->delete_blog_post($post_id);

        // Return back
        return redirect()->back();
    }
}
