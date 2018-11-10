<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\EventHelper;

class EventsController extends Controller
{
    public function create_event(Request $data) {
    	// Set default timezone
    	date_default_timezone_set('America/Los_Angeles');

    	// Get data
    	$event_name = $data->event_name;
    	$event_description = $data->event_description;
    	$event_location = $data->event_location;
    	$start_time = $data->start_time;
    	$end_date = $data->end_date;

    	// Create array for event helper
    	$event_data = array(
    		"event_name" => $event_name,
    		"event_description" => $event_description,
    		"event_location" => $event_location,
    		"start_time" => $start_time,
    		"end_date" => $end_date
    	);

    	// Create event helper and add new event
    	$event_helper = new EventHelper();
    	$event_helper->create_event($event_data);

    	// Redirect back
    	return redirect(url('/admin/events/view'));
    }
}
