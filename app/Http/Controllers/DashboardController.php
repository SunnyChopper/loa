<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\BlogPostHelper;
use App\Custom\EventHelper;

use Auth;

class DashboardController extends Controller
{
    public function index() {
    	// Check if authorized
    	$this->checkAuth();

    	// SEO Data
    	$page_title = "Dashboard";
    	$page_description = "Welcome to your Law of Ambition dashboard. From here you can start your entrepreneur journey.";

    	// Dynamic page elements
    	$page_header = "Dashboard";

        // Get latest posts
        $blog_post_helper = new BlogPostHelper();
        $posts = $blog_post_helper->get_latest_posts();

        // Get upcoming events
        $event_helper = new EventHelper();
        $events = $event_helper->get_upcoming_events();

    	return view('dashboard.index')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header)->with('posts', $posts)->with('events', $events);
    }

    public function tools() {
    	// Check if authorized
    	$this->checkAuth();

    	// SEO Data
    	$page_title = "Tools";
    	$page_description = "Work smarter than the competition by using these software tools made for entrepreneurs.";

    	// Dynamic page elements
    	$page_header = "Tools";

    	return view('dashboard.tools')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function community() {
    	// Check if authorized
    	$this->checkAuth();

    	// SEO Data
    	$page_title = "Community";
    	$page_description = "It's not just about what you know but who you know. Get help from the Wolf Squad community.";

    	// Dynamic page elements
    	$page_header = "Community";

    	return view('dashboard.community')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function courses() {
    	// Check if authorized
    	$this->checkAuth();

    	// SEO Data
    	$page_title = "Courses";
    	$page_description = "Become a better entrepreneur with these online courses. The more you invest in yourself, the better.";

    	// Dynamic page elements
    	$page_header = "Courses";

    	return view('dashboard.courses')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function shop() {
    	// Check if authorized
    	$this->checkAuth();

    	// SEO Data
    	$page_title = "Shop";
    	$page_description = "Show off that you're part of Wolf Squad. Take pride in the work and effort that you make.";

    	// Dynamic page elements
    	$page_header = "Ambition Shop";

    	return view('dashboard.courses')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function settings() {
    	// Check if authorized
    	$this->checkAuth();

    	// SEO Data
    	$page_title = "Settings";
    	$page_description = "Control your experience on Law of Ambition. With Wolf Squad, you get to control your entrepreneur journey.";

    	// Dynamic page elements
    	$page_header = "Settings";

    	return view('dashboard.settings')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function checkAuth() {
    	if (Auth::guest()) {
    		return redirect(url('/members/login'));
    	} else {
    		return true;
    	}
    }
}
