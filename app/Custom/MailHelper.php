<?php

namespace App\Custom;

use Validator;
use Session;
use Auth;
use Mail;

class MailHelper {
	/* Private global variables */
	private $sender_first_name;
	private $sender_last_name;
	private $sender_email;
	private $recipient_first_name;
	private $recipient_last_name;
	private $recipient_email;
	private $body;
	private $subject;

	/* Initializer */
	public function __construct($data) {
		if (isset($data["sender_first_name"])) {
			$this->sender_first_name = $data["sender_first_name"];
		} else {
			$this->sender_first_name = "";
		}

		if (isset($data["sender_last_name"])) {
			$this->sender_last_name = $data["sender_last_name"];
		} else {
			$this->sender_last_name = "";
		}

		if (isset($data["sender_email"])) {
			$this->sender_email = $data["sender_email"];
		} else {
			$this->sender_email = "";
		}

		if (isset($data["recipient_first_name"])) {
			$this->recipient_first_name = $data["recipient_first_name"];
		} else {
			$this->recipient_first_name = "";
		}

		if (isset($data["recipient_last_name"])) {
			$this->recipient_last_name = $data["recipient_last_name"];
		} else {
			$this->recipient_last_name = "";
		}

		if (isset($data["recipient_email"])) {
			$this->recipient_email = $data["recipient_email"];
		} else {
			$this->recipient_email = "";
		}

		if (isset($data["body"])) {
			$this->body = $data["body"];
		} else {
			$this->body = "";
		}

		if (isset($data["subject"])) {
			$this->subject = $data["subject"];
		} else {
			$this->subject = "";
		}
	}

	/* Public functions */
	public function send_contact_email() {
		$email_data = $this->get_email_data();
		Mail::send('emails.contact-email', $email_data, function($message) use ($email_data) {
			$message->to("info@lawofambition.com", "Law of Ambition")->subject($email_data["subject"]);
			$message->from("info@lawofambition.com", "Law of Ambition");
			$message->replyTo($email_data["sender_email"], $email_data["first_name"] . " " . $email_data["last_name"]);
		});
	}

	/* Private functions */
	private function get_email_data() {
		$data = array(
			"sender_first_name" => $this->sender_first_name,
			"sender_last_name" => $this->sender_last_name,
			"sender_email" => $this->sender_email,
			"recipient_first_name" => $this->recipient_first_name,
			"recipient_last_name" => $this->recipient_last_name,
			"recipient_email" => $this->recipient_email,
			"body" => $this->body,
			"subject" => $this->subject
		);

		return $data;
	}
}

?>