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
}
