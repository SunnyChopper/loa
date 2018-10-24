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
}
