<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\BlogPostHelper;
use App\Custom\EventHelper;
use App\Custom\CourseHelper;
use App\Custom\VotingHelper;
use App\Custom\UserHelper;
use App\Custom\BookDiscussionHelper;

use Auth;

class DashboardController extends Controller
{
    public function index() {
    	// Check if authorized
    	if ($this->checkAuth() == 0) {
            return redirect(url('/members/login'));
        }

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

        // Get courses for user
        $course_helper = new CourseHelper();
        $my_courses = $course_helper->get_courses_for_user(Auth::id());

    	return view('dashboard.index')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header)->with('posts', $posts)->with('events', $events)->with('my_courses', $my_courses);
    }

    public function tools() {
    	// Check if authorized
    	if ($this->checkAuth() == 0) {
            return redirect(url('/members/login'));
        }

    	// SEO Data
    	$page_title = "Tools";
    	$page_description = "Work smarter than the competition by using these software tools made for entrepreneurs.";

    	// Dynamic page elements
    	$page_header = "Tools";

    	return view('dashboard.tools')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function community() {
    	// SEO Data
    	$page_title = "Community";
    	$page_description = "It's not just about what you know but who you know. Get help from the Wolf Squad community.";

    	// Dynamic page elements
    	$page_header = "Community";

        // Get current book
        $book_discussion_helper = new BookDiscussionHelper();
        $book = $book_discussion_helper->get_current_book_discussion();

        // Get voting poll helper for page
        $voting_helper = new VotingHelper();

    	return view('dashboard.community')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header)->with('book', $book)->with('voting_helper', $voting_helper);
    }

    public function courses() {
    	// Check if authorized
    	if ($this->checkAuth() == 0) {
            return redirect(url('/members/login'));
        }

    	// SEO Data
    	$page_title = "Courses";
    	$page_description = "Become a better entrepreneur with these online courses. The more you invest in yourself, the better.";

    	// Dynamic page elements
    	$page_header = "Courses";

    	return view('dashboard.courses')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function shop() {
    	// Check if authorized
    	if ($this->checkAuth() == 0) {
            return redirect(url('/members/login'));
        }

    	// SEO Data
    	$page_title = "Shop";
    	$page_description = "Show off that you're part of Wolf Squad. Take pride in the work and effort that you make.";

    	// Dynamic page elements
    	$page_header = "Ambition Shop";

    	return view('dashboard.courses')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function settings() {
    	// Check if authorized
    	if ($this->checkAuth() == 0) {
            return redirect(url('/members/login'));
        }

    	// SEO Data
    	$page_title = "Settings";
    	$page_description = "Control your experience on Law of Ambition. With Wolf Squad, you get to control your entrepreneur journey.";

    	// Dynamic page elements
    	$page_header = "Settings";

    	return view('dashboard.settings')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function profile() {
        // Check if authorized
        if ($this->checkAuth() == 0) {
            return redirect(url('/members/login'));
        }

        // SEO Data
        $page_title = "Your Profile";
        $page_description = "Control your experience on Law of Ambition. With Wolf Squad, you get to control your entrepreneur journey.";

        // Get user
        $user_helper = new UserHelper();
        $user = Auth::user();

        // Get courses
        $enrolled_courses = $user_helper->get_course_memberships_by_id($user->id);
        $enrolled_tools = $user_helper->get_tool_memberships_by_id($user->id);

        // Course helper
        $course_helper = new CourseHelper();

        // Dynamic page elements
        $page_header = $user->first_name . " " . $user->last_name;

        return view('dashboard.profile')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header)->with('user', $user)->with('courses', $enrolled_courses)->with('tools', $enrolled_tools)->with('course_helper', $course_helper);
    }

    public function view_book_discussion($book_discussion_id) {
        // Check if authorized
        if ($this->checkAuth() == 0) {
            return redirect(url('/members/login'));
        }

        // Get current book discussion
        $book_discussion_helper = new BookDiscussionHelper();
        $book_discussion = $book_discussion_helper->get_current_book_discussion();
        $posts = $book_discussion_helper->get_discussion_posts_with_id_and_pagination($book_discussion_id, 2);

        // Get User and user helper
        $user_helper = new UserHelper();
        $user = Auth::user();

        // SEO Data
        $page_title = $book_discussion->book_title . " - Book Discussion";

        // Dynamic page elements
        $page_header = $book_discussion->book_title;

        return view('dashboard.book-discussion.view-posts')->with('page_title', $page_title)->with('page_header', $page_header)->with('posts', $posts)->with('book', $book_discussion)->with('user', $user)->with('user_helper', $user_helper);
    }

    public function checkAuth() {
    	if (Auth::guest()) {
    		return 0;
    	} else {
    		return 1;
    	}
    }
}
