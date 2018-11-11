<?php

namespace App\Custom;

use Illuminate\Http\Request;

use App\BlogPostStats;
use App\CourseStats;
use App\CourseContentStats;
use App\EventStats;
use App\ProductStats;
use App\SignupStats;
use App\ToolStats;

use Session;

class SiteStatsHelper {

	/* Public functions */
	public function new_blog_post($data) {
		$blog_post_stats = new BlogPostStats;
		$blog_post_stats->author_id = $data["author_id"];
		$blog_post_stats->post_id = $data["post_id"];
		$blog_post_stats->save();
	}

	public function blog_post_add_view($post_id) {
		$this->verify_blog_post_exists($post_id);
		$blog_post_stats = BlogPostStats::where('post_id', $post_id)->first();
		$blog_post_stats->views = $blog_post_stats->views + 1;
		$blog_post_stats->save();
	}

	public function get_blog_post_view($post_id) {
		$this->verify_blog_post_exists($post_id);
		$blog_post_stats = BlogPostStats::where('post_id', $post_id)->first();
		return $blog_post_stats->views;
	}

	public function blog_post_add_like($post_id) {
		$this->verify_blog_post_exists($post_id);
		$blog_post_stats = BlogPostStats::where('post_id', $post_id)->first();
		$blog_post_stats->likes = $blog_post_stats->likes + 1;
		$blog_post_stats->save();
	}

	public function get_blog_post_likes($post_id) {
		$this->verify_blog_post_exists($post_id);
		$blog_post_stats = BlogPostStats::where('post_id', $post_id)->first();
		return $blog_post_stats->likes;
	}

	public function blog_post_add_link_click($post_id) {
		$this->verify_blog_post_exists($post_id);
		$blog_post_stats = BlogPostStats::where('post_id', $post_id)->first();
		$blog_post_stats->link_clicks = $blog_post_stats->link_clicks + 1;
		$blog_post_stats->save();
	}

	public function get_blog_post_link_clicks($post_id) {
		$this->verify_blog_post_exists($post_id);
		$blog_post_stats = BlogPostStats::where('post_id', $post_id)->first();
		return $blog_post_stats->link_clicks;
	}

	public function blog_post_member_signups($post_id) {
		$this->verify_blog_post_exists($post_id);
		$blog_post_stats = BlogPostStats::where('post_id', $post_id)->first();
		$blog_post_stats->member_signups = $blog_post_stats->member_signups + 1;
		$blog_post_stats->save();
	}

	public function get_blog_post_member_signups($post_id) {
		$this->verify_blog_post_exists($post_id);
		$blog_post_stats = BlogPostStats::where('post_id', $post_id)->first();
		return $blog_post_stats->member_signups;
	}

	public function new_tool($data) {
		$tool_stats = new ToolStats;
		$tool_stats->tool_id = $data["tool_id"];
		$tool_stats->save();
	}

	public function tool_add_view($tool_id) {
		$this->verify_tool_exists($tool_id);
		$tool_stats = ToolStats::where('tool_id', $tool_id)->first();
		$tool_stats->views = $tool_stats->views + 1;
		$tool_stats->save();
	}

	public function tool_add_member($tool_id) {
		$this->verify_tool_exists($tool_id);
		$tool_stats = ToolStats::where('tool_id', $tool_id)->first();
		$tool_stats->members = $tool_stats->members + 1;
		$tool_stats->save();
	}

	public function new_product($data) {
		$product_stats = new ProductStats;
		$product_stats->product_id = $data["product_id"];
		$product_stats->save();
	}

	public function product_add_view($product_id) {
		$this->verify_product_exists($product_id);
		$product_stats = ProductStats::where('product_id', $product_id)->first();
		$product_stats->views = $product_stats->views + 1;
		$product_stats->save();
	}

	public function get_product_views($product_id) {
		$this->verify_product_exists($product_id);
		$product_stats = ProductStats::where('product_id', $product_id)->first();
		return $product_stats->views;
	}

	public function product_add_add_to_cart($product_id) {
		$this->verify_product_exists($product_id);
		$product_stats = ProductStats::where('product_id', $product_id)->first();
		$product_stats->adds_to_cart = $product_stats->adds_to_cart + 1;
		$product_stats->save();
	}

	public function get_product_adds_to_cart($product_id) {
		$this->verify_product_exists($product_id);
		$product_stats = ProductStats::where('product_id', $product_id)->first();
		return $product_stats->adds_to_cart;
	}

	public function product_add_purchased($product_id) {
		$this->verify_product_exists($product_id);
		$product_stats = ProductStats::where('product_id', $product_id)->first();
		$product_stats->purchased = $product_stats->purchased + 1;
		$product_stats->save();
	}

	public function get_product_purchases($product_id) {
		$this->verify_product_exists($product_id);
		$product_stats = ProductStats::where('product_id', $product_id)->first();
		return $product_stats->purchased;
	}

	public function product_add_guest_purchase($product_id) {
		$this->verify_product_exists($product_id);
		$product_stats = ProductStats::where('product_id', $product_id)->first();
		$product_stats->guest_purchases = $product_stats->guest_purchases + 1;
		$product_stats->save();
	}

	public function get_product_guest_purchases($product_id) {
		$this->verify_product_exists($product_id);
		$product_stats = ProductStats::where('product_id', $product_id)->first();
		return $product_stats->guest_purchases;
	}

	public function product_add_member_purchase($product_id) {
		$this->verify_product_exists($product_id);
		$product_stats = ProductStats::where('product_id', $product_id)->first();
		$product_stats->member_purchases = $product_stats->member_purchases + 1;
		$product_stats->save();
	}

	public function get_product_member_purchases($product_id) {
		$this->verify_product_exists($product_id);
		$product_stats = ProductStats::where('product_id', $product_id)->first();
		return $product_stats->member_purchases;
	}

	public function new_course($data) {
		$course_stats = new CourseStats;
		$course_stats->course_id = $data["course_id"];
		$course_stats->save();
	}

	public function course_add_view($course_id) {
		$this->verify_course_exists($course_id);
		$course_stats = CourseStats::where('course_id', $course_id)->first();
		$course_stats->views = $course_stats->views + 1;
		$course_stats->save();
	}

	public function course_add_purchased($course_id) {
		$this->verify_course_exists($course_id);
		$course_stats = CourseStats::where('course_id', $course_id)->first();
		$course_stats->purchased = $course_stats->purchased + 1;
		$course_stats->save();
	}

	public function course_add_guest_purchase($course_id) {
		$this->verify_course_exists($course_id);
		$course_stats = CourseStats::where('course_id', $course_id)->first();
		$course_stats->guest_purchases = $course_stats->guest_purchases + 1;
		$course_stats->save();
	}

	public function course_add_member_purchase($course_id) {
		$this->verify_course_exists($course_id);
		$course_stats = CourseStats::where('course_id', $course_id)->first();
		$course_stats->member_purchases = $course_stats->member_purchases + 1;
		$course_stats->save();
	}

	public function new_course_content($data) {
		$course_content_stats = new CourseContentStats;
		$course_content_stats->content_id = $data["content_id"];
		$course_content_stats->save();
	}

	public function course_content_add_view($content_id) {
		$this->verify_content_exists($content_id);
		$course_content_stats = CourseContentStats::where('content_id', $content_id)->first();
		$course_content_stats->views = $course_content_stats->views + 1;
		$course_content_stats->save();
	}

	public function new_event($data) {
		$event_stats = new EventStats;
		$event_stats->event_id = $data["event_id"];
		$event_stats->save();
	}

	public function event_add_view($event_id) {
		$this->verify_event_exists($event_id);
		$event_stats = EventStats::where('event_id', $event_id)->first();
		$event_stats->views = $event_stats->views + 1;
		$event_stats->save();
	}

	public function get_event_views($event_id) {
		$this->verify_event_exists($event_id);
		$event_stats = EventStats::where('event_id', $event_id)->first();
		return $event_stats->views;
	}

	public function event_add_attending($event_id) {
		$this->verify_event_exists($event_id);
		$event_stats = EventStats::where('event_id', $event_id)->first();
		$event_stats->attending = $event_stats->attending + 1;
		$event_stats->save();
	}

	public function get_event_attendees($event_id) {
		$this->verify_event_exists($event_id);
		$event_stats = EventStats::where('event_id', $event_id)->first();
		return $event_stats->attending;
	}

	public function event_add_member_attending($event_id) {
		$this->verify_event_exists($event_id);
		$event_stats = EventStats::where('event_id', $event_id)->first();
		$event_stats->members_attending = $event_stats->members_attending + 1;
		$event_stats->save();
	}

	public function get_event_member_attendees($event_id) {
		$this->verify_event_exists($event_id);
		$event_stats = EventStats::where('event_id', $event_id)->first();
		return $event_stats->members_attending;
	}

	public function event_add_guest_attending($event_id) {
		$this->verify_event_exists($event_id);
		$event_stats = EventStats::where('event_id', $event_id)->first();
		$event_stats->guests_attending = $event_stats->guests_attending + 1;
		$event_stats->save();
	}

	public function get_event_guest_attendees($event_id) {
		$this->verify_event_exists($event_id);
		$event_stats = EventStats::where('event_id', $event_id)->first();
		return $event_stats->guests_attending;
	}

	public function new_signup($data) {
		$signup_stats = new SignupStats;
		$signup_stats->user_id = $data["user_id"];

		$now = date("Y-m-d H:i:s");
		$signup_stats->signup_time = $now;

		$country = $this->ip_info($_SERVER['REMOTE_ADDR'], "Country");
		$signup_stats->country = $country;

		if(Session::has('referral_tag')) {
			$signup_stats->referral_tag = Session::get('referral_tag');
		}

		$signup_stats->save();
	}

	private function verify_blog_post_exists($post_id) {
		if (BlogPostStats::where('post_id', $post_id)->count() == 0) {
			$this->new_blog_post($post_id);
		}
	}

	private function verify_tool_exists($tool_id) {
		if (ToolStats::where('tool_id', $tool_id)->count() == 0) {
			$this->new_tool($tool_id);
		}
	}

	private function verify_product_exists($product_id) {
		if (ProductStats::where('product_id', $product_id)->count() == 0) {
			$data = array(
				"product_id" => $product_id
			);
			$this->new_product($data);
		}
	}

	private function verify_course_exists($course_id) {
		if (CourseStats::where('course_id', $course_id)->count() == 0) {
			$this->new_course($course_id);
		}
	}

	private function verify_content_exists($content_id) {
		if (CourseContentStats::where('content_id', $content_id)->count() == 0) {
			$this->new_course_content($content_id);
		}
	}

	private function verify_event_exists($event_id) {
		if (EventStats::where('event_id', $event_id)->count() == 0) {
			$data = array(
				"event_id" => $event_id
			);
			$this->new_event($data);
		}
	}

	private function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
	    $output = NULL;
	    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
	        $ip = $_SERVER["REMOTE_ADDR"];
	        if ($deep_detect) {
	            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_CLIENT_IP'];
	        }
	    }
	    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
	    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
	    $continents = array(
	        "AF" => "Africa",
	        "AN" => "Antarctica",
	        "AS" => "Asia",
	        "EU" => "Europe",
	        "OC" => "Australia (Oceania)",
	        "NA" => "North America",
	        "SA" => "South America"
	    );
	    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
	        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
	        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
	            switch ($purpose) {
	                case "location":
	                    $output = array(
	                        "city"           => @$ipdat->geoplugin_city,
	                        "state"          => @$ipdat->geoplugin_regionName,
	                        "country"        => @$ipdat->geoplugin_countryName,
	                        "country_code"   => @$ipdat->geoplugin_countryCode,
	                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
	                        "continent_code" => @$ipdat->geoplugin_continentCode
	                    );
	                    break;
	                case "address":
	                    $address = array($ipdat->geoplugin_countryName);
	                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
	                        $address[] = $ipdat->geoplugin_regionName;
	                    if (@strlen($ipdat->geoplugin_city) >= 1)
	                        $address[] = $ipdat->geoplugin_city;
	                    $output = implode(", ", array_reverse($address));
	                    break;
	                case "city":
	                    $output = @$ipdat->geoplugin_city;
	                    break;
	                case "state":
	                    $output = @$ipdat->geoplugin_regionName;
	                    break;
	                case "region":
	                    $output = @$ipdat->geoplugin_regionName;
	                    break;
	                case "country":
	                    $output = @$ipdat->geoplugin_countryName;
	                    break;
	                case "countrycode":
	                    $output = @$ipdat->geoplugin_countryCode;
	                    break;
	            }
	        }
	    }
	    return $output;
	}

}

?>