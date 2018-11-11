<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\EventSignupHelper;

class EventSignupsController extends Controller
{
    public function create(Request $data) {
    	// Get data
    	$event_id = $data->event_id;
    	$first_name = $data->first_name;
    	$last_name = $data->last_name;
    	$email = $data->email;

    	// Create signup data
    	$signup_data = array(
    		"event_id" => $event_id,
    		"first_name" => $first_name,
    		"last_name" => $last_name,
    		"email" => $email
    	);

    	// Get event signups helper
    	$event_signups_helper = new EventSignupHelper();
    	$event_signups_helper->create_event_signup($signup_data);

    	// Redirect to thank you page
    	return redirect(url('/events/thank-you'));
    }
}
