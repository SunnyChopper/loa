<?php

namespace App\Custom;

use App\SupportTicket;

use Auth;

class SupportTicketHelper {
	/* Private variables */
	private $ticket_id;

	/* Initializers */
	public function __construct($ticket_id = 0) {
		$this->ticket_id = $ticket_id;
	}

	/* Public functions */
	public function create_contact_submission($data) {
		if (Auth::guest()) {
			$is_guest = 1;
			$user_id = 0;
		} else {
			$is_guest = 0;
			$user_id = Auth::id();
		}

		$support_ticket = new SupportTicket;
		$support_ticket->is_guest = $is_guest;
		$support_ticket->user_id = $user_id;
		$support_ticket->email = $data["email"];
		$support_ticket->first_name = $data["first_name"];
		$support_ticket->last_name = $data["last_name"];
		$support_ticket->message = $data["message"];
		$support_ticket->contact_submission = 1;
		$support_ticket->support_ticket = 0;
		$support_ticket->status = 1;
		$support_ticket->user_id_assigned_to = 0;
		$support_ticket->save();

		$this->ticket_id = $support_ticket->id;
	}

	public function create_support_ticket($data) {
		if (Auth::guest()) {
			$is_guest = 1;
			$user_id = 0;
		} else {
			$is_guest = 0;
			$user_id = Auth::id();
		}

		$support_ticket = new SupportTicket;
		$support_ticket->is_guest = $is_guest;
		$support_ticket->user_id = $user_id;
		$support_ticket->email = $data["email"];
		$support_ticket->first_name = $data["first_name"];
		$support_ticket->last_name = $data["last_name"];
		$support_ticket->message = $data["message"];
		$support_ticket->contact_submission = 0;
		$support_ticket->support_ticket = 1;
		$support_ticket->status = 1;
		$support_ticket->user_id_assigned_to = 0;
		$support_ticket->save();

		$this->ticket_id = $support_ticket->id;
	}
}

?>