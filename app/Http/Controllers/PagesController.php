<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
    	// SEO Data
    	$page_title = "Home";
    	$page_description = "Law of Ambition is more than just a brand or a person. It's a mindset.";

    	return view('pages.index')->with('page_title', $page_title)->with('page_description', $page_description);
    }

    public function contact() {
    	// SEO Data
    	$page_title = "Contact";
    	$page_description = "Got a question? Just want to say hi? No problem. Fill out the contact form and I'll get back to you as soon as possible.";

    	// Dynamic page features
    	$page_header = "Contact";

    	return view('pages.contact')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function tools() {
    	// SEO Data
    	$page_title = "Free Tools";
    	$page_description = "As an entrepreneur, it's important to have the right tools so you can work smarter than the competition.";

    	// Dynamic page features
    	$page_header = "Free Tools";

    	return view('pages.tools')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function blog() {
    	// SEO Data
    	$page_title = "Free Advice";
    	$page_description = "Every entrepreneur starts their journey by getting some free eye-opening advice. Get yours here.";

    	// Dynamic page features
    	$page_header = "Free Advice";

    	return view('pages.blog')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function shop() {
    	// SEO Data
    	$page_title = "Ambition Shop";
    	$page_description = "Show off that you're part of Wolf Squad. Take pride in the work and effort that you make.";

    	// Dynamic page features
    	$page_header = "Ambition Shop";

    	return view('pages.shop')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function courses() {
    	// SEO Data
    	$page_title = "Courses";
    	$page_description = "Become a better entrepreneur with these online courses. The more you invest in yourself, the better.";

    	// Dynamic page features
    	$page_header = "Courses";

    	return view('pages.courses')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function events() {
    	// SEO Data
    	$page_title = "Events";
    	$page_description = "Come out and meet me and other Wolf Squad members. Network and grow your alliance.";

    	// Dynamic page features
    	$page_header = "Events";

    	return view('pages.events')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function login() {
    	// SEO Data
    	$page_title = "Login";
    	$page_description = "Login into the Wolf Squad and start to upgrade your mindsets as an entrepreneur.";

    	// Dynamic page features
    	$page_header = "Wolf Squad Awaits You";

    	return view('pages.login')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function register() {
    	// SEO Data
    	$page_title = "Register";
    	$page_description = "Start your journey with Wolf Squad. Upgrade your business mindset.";

    	// Dynamic page features
    	$page_header = "Join Wolf Squad";

    	return view('pages.register')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }
}
