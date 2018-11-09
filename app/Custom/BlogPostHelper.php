<?php

namespace App\Custom;

use Illuminate\Support\Facades\DB;

use App\BlogPost;
use App\Custom\SiteStatsHelper;

use Auth;

class BlogPostHelper {
	/* Private global variables */
	private $blog_post_id;

	/* Initializer */
	public function __construct($blog_post_id = 0) {
		$this->blog_post_id = $blog_post_id;
	}

	/* Public functions */
	public function add_view($post_id = 0) {
		// Post ID
		if ($post_id == 0) {
			$post_id = $this->blog_post_id;
		}

		// Get blog post and update views
		$blog_post = BlogPost::where('id', $post_id)->first();
		$blog_post->views = $blog_post->views + 1;
		$blog_post->save();
	}

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

		// Create stats
		$site_stats_helper = new SiteStatsHelper();
		$post_data = array(
			"post_id" => $blog->id,
			"author_id" => $author_id
		);
		$site_stats_helper->new_blog_post($post_data);

		return $blog->id;
	}

	public function put_blog_post_in_draft($post_id) {
		$blog_post = BlogPost::where('id', $post_id)->first();
		$blog_post->is_active = 2;
		$blog_post->save();
	}

	public function publish_blog_post($post_id) {
		$blog_post = BlogPost::where('id', $post_id)->first();
		$blog_post->is_active = 1;
		$blog_post->save();
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

	public function get_latest_posts($num_posts = 3) {
		return BlogPost::where('is_active', 1)->orderBy('created_at', 'desc')->limit($num_posts)->get();
	}


	public function get_posts_with_pagination($pagination) {
		return BlogPost::where('is_active', 1)->orderBy('created_at', 'desc')->paginate($pagination);
	}

	public function get_posts_by_author_id($author_id) {
		return BlogPost::where('author_id', $author_id)
			->where(function($q) {
				$q->where('is_active', 1)
				->orWhere('is_active', 2);
			})
			->get();
	}

	public function get_top_posts($num_posts) {
		return BlogPost::orderBy('likes', 'desc')->limit($num_posts)->get();
	}

	public function get_post_by_id($post_id = 0) {
		if ($post_id == 0) {
			$post_id = $this->blog_post_id;
		}

		return BlogPost::where('id', $post_id)->first();
	}

	public function get_image_url($post_id = 0) {
		if ($post_id == 0) {
			$post_id = $this->blog_post_id;
		}

		return BlogPost::where('id', $post_id)->first()->featured_image_url;
	}

	public function update_blog_post($data) {
		// Get blog post data
		$post_id = $data["post_id"];
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
		$this->blog_post_id = $post_id;
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