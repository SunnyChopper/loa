<?php

namespace App\Custom;

use App\Event;

use Auth;

class EventHelper {
	/* Private variables */
	private $event_id;

	/* Initializers */
	public function __construct($event_id = 0) {
		$this->event_id = $event_id;
	}

	/* Public functions */
	public function create_event($data) {
		$event_name = $data["event_name"];
		$event_description = $data["event_description"];
		$event_location = $data["event_location"];
		$start_time = $data["start_time"];
		$end_time = $data["end_date"];

		$event = new Event;
		$event->event_name = $event_name;
		$event->event_description = $event_description;
		$event->location = $event_location;
		$event->start_time = $start_time;
		$event->end_date = $end_time;
		$event->save();

		$this->event_id = $event->id;
	}

	public function get_all_events() {
		return Event::where('is_active', 1)->get();
	}

	public function get_events_with_pagination($pagination) {
		return Event::where('is_active', 1)->paginate($pagination);
	}

	public function get_upcoming_events() {
		date_default_timezone_set('America/Los_Angeles');
		$current_date = date('Y-m-d H:i:s');
		return Event::where('start_time', '>', $current_date)->where('is_active', 1)->get();
	}

	public function get_ongoing_events() {
		date_default_timezone_set('America/Los_Angeles');
		$current_date = date('Y-m-d H:i:s');
		return Event::where('start_time', '<', $current_date)->where('end_time', '>', $current_date)->where('is_active', 1)->get();
	}

	public function get_past_events() {
		date_default_timezone_set('America/Los_Angeles');
		$current_date = date('Y-m-d H:i:s');
		return Event::where('end_time', '<', $current_date)->where('is_active', 1)->get();
	}

	public function get_event($event_id = 0) {
		if ($event_id == 0) {
			$event_id = $this->event_id;
		}

		return Event::where('id', $event_id)->first();
	}

	public function update_event($data) {
		$event_id = $data["event_id"];
		$event_name = $data["event_name"];
		$event_description = $data["event_description"];
		$event_location = $data["event_location"];
		$start_time = $data["start_time"];
		$end_time = $data["end_date"];

		$event = Event::where('id', $event_id)->first();
		$event->event_name = $event_name;
		$event->event_description = $event_description;
		$event->location = $event_location;
		$event->start_time = $start_time;
		$event->end_date = $end_time;
		$event->save();
	}

	public function delete_event() {
		$event = Event::where('id', $this->event_id)->first();
		$event->is_active = 0;
		$event->save();
	}
}

?>