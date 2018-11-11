<?php

namespace App\Custom;

use App\EventSignup;

use Auth;

class EventSignupHelper {
	/* Private variables */
	private $event_id;

	/* Initializers */
	public function __construct($event_id = 0) {
		$this->event_id = $event_id;
	}

	/* Public functions */
	public function create_event_signup($data) {
		$event_id = $data["event_id"];
		$first_name = $data["first_name"];
		$last_name = $data["last_name"];
		$email = $data["email"];

		if (Auth::guest()) {
			$is_guest = 1;
			$user_id = 0;
		} else {
			$is_guest = 0;
			$user_id = Auth::id();
		}

		$event_signup = new EventSignup;
		$event_signup->event_id = $event_id;
		$event_signup->first_name = $first_name;
		$event_signup->last_name = $last_name;
		$event_signup->email = $email;
		$event_signup->is_guest = $is_guest;
		$event_signup->user_id = $user_id;
		$event_signup->save();
	}

	public function get_signups_for_event($event_id) {
		return EventSignup::where('event_id', $event_id)->get();
	}

	public function get_signups_for_user($user_id) {
		return EventSignup::where('user_id', $user_id)->get();
	}

	public function delete_event_signup($signup_id) {
		$event = EventSignup::where('id', $signup_id)->first();
		$event->is_active = 0;
		$event->save();
	}
}

?>