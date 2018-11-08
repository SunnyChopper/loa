<?php

namespace App\Custom;

use Illuminate\Http\Request;

use App\User;

class UserHelper {
	/* Public functions */
	public function get_users_with_pagination($pagination) {
		$users = User::paginate($pagination);
		return $users;
	}

	public function get_user_by_id($user_id) {
		return User::where('id', $user_id)->first();
	}
}

?>