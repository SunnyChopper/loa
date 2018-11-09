<?php

namespace App\Custom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReferralHelper {
	/* Private global variables */
	private $ref_tag_enabled;
	private $ref_tag;
	private $ip;

	/* Initializer */
	public function __construct($ref_tag) {
		$this->ip = $_SERVER['REMOTE_ADDR'];
		$this->ref_tag = $ref_tag;
		$this->ref_tag_enabled = 1;

		$this->save();
	}

	/* Public functions */
	public function does_ref_tag_exist() {
		if (Session::has('ref_tag_enabled')) {
			if (Session::get('reg_tag_enabled') == 1) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function get_ref_tag() {
		if (Session::has('ref_tag')) {
			return Session::get('ref_tag');
		} else {
			return "None";
		}
	}

	public function get_ref_ip() {
		if (Session::has('ref_ip')) {
			return Session::get('ref_ip');
		} else {
			return "None";
		}
	}

	public function enable_ref_tag() {
		Session::put('ref_tag_enabled', 1);
	}

	public function disable_ref_tag() {
		Session::put('ref_tag_enabled', 0);
	}

	public function save() {
		Session::put('ref_tag_enabled', $this->ref_tag_enabled);
		Session::put('ref_tag', $this->ref_tag);
		Session::put('ref_ip', $this->ref_ip);
	}

	public function clear_all() {
		Session::forget('ref_tag_enabled');
		Session::forget('ref_tag');
		Session::forget('ref_ip');
	}
}

?>