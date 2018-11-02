<?php

namespace App\Custom;

use App\BlogPost;

use Auth;

class BlogPostHelper {
	/* Private global variables */
	private $blog_post_id;

	/* Initializer */
	public function __construct($blog_post_id = 0) {
		$this->blog_post_id = $blog_post_id;
	}

	/* Public functions */
	public function create_blog_post($data) {
		// Get blog post data
		$title = $data["title"];
		$featured_image_url = $data["featured_image_url"];
		$slug = $data["slug"];
		$post_body = $data["post_body"];
		$author_id = Auth::id();
		$author_first_name = Auth::user()->first_name;
		$author_last_name = Auth::user()->last_name;
		
		// Create a new blog post
		$blog = new BlogPost;
		$blog->title = $title;;
		$blog->featured_image_url = $featured_image_url;
		$blog->slug = $slug;
		$blog->post_body = $post_body;
		$blog->author_id = $author_id;
		$blog->author_first_name = $author_first_name;
		$blog->author_last_name = $author_last_name;
		$blog->save();

		// Update local variable
		$this->blog_post_id = $blog->id;

		return $blog->id;
	}

	public function read_blog_post() {
		if ($this->blog_post_id == 0) {
			return "error";
		} else {
			return BlogPost::where('id', $this->blog_post_id)->first();
		}
	}

	public function get_next_post_id() {
		if (BlogPost::count() > 0) {
			$last_post = DB::table('blog_posts')->orderBy('created_at', 'desc')->first();
			$lastest_id = $last_post->id;
			return $lastest_id + 1;
		} else {
			return 1;
		}
	}

	public function get_all_posts() {
		return BlogPost::where('is_active', 1)->get();
	}

	public function get_posts_with_pagination($pagination) {
		return BlogPost::where('is_active', 1)->paginate($pagination);
	}

	public function get_posts_by_author_id($author_id) {
		return BlogPost::where('author_id', $author_id)->where('is_active', 1)->get();
	}

	public function update_blog_post($data) {
		// Get blog post data
		$post_id = $data["blog_post_id"];
		$title = $data["title"];
		$featured_image_url = $data["featured_image_url"];
		$slug = $data["slug"];
		$post_body = $data["post_body"];

		// Retrieve blog post
		$this->blog_post_id = $post_id;
		$blog_post = $this->get_blog_post_data();
		$blog_post->title = $title;
		$blog_post->featured_image_url = $featured_image_url;
		$blog_post->slug = $slug;
		$blog_post->post_body = $post_body;
		$blog_post->save();
	}

	public function delete_blog_post($post_id) {
		$blog_post = $this->get_blog_post_data();
		$blog_post->is_active = 0;
		$blog_post->save();
	}

	/* Private helper functions */
	private function get_blog_post_data() {
		if ($this->blog_post_id == 0) {
			return "error";
		} else {
			return BlogPost::where('id', $this->blog_post_id)->first();
		}
	}
}

?>