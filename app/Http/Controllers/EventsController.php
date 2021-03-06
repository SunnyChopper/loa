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

    public function delete_event(Request $data) {
        // Get data
        $event_id = $data->event_id;

        // Create event helper and delete
        $event_helper = new EventHelper($event_id);
        $event_helper->delete_event();

        // Return to events
        return redirect(url('/admin/events/view'));
    }

    public function update_event(Request $data) {
        // Get data
        $event_id = $data->event_id;
        $event_name = $data->event_name;
        $event_description = $data->event_description;
        $event_location = $data->event_location;
        $start_time = $data->start_time;
        $end_date = $data->end_date;

        // Create array for event helper
        $event_data = array(
            "event_id" => $event_id,
            "event_name" => $event_name,
            "event_description" => $event_description,
            "event_location" => $event_location,
            "start_time" => $start_time,
            "end_date" => $end_date
        );

        // Create event helper and edit event
        $event_helper = new EventHelper();
        $event_helper->update_event($event_data);

        // Redirect to main page
        return redirect(url('/admin/events/view'));
    }
}
