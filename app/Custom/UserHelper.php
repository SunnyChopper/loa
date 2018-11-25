<?php

namespace App\Custom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Custom\MailHelper;

use App\User;
use App\CourseMembership;
use App\ToolMembership;
use App\DiscussionPost;

class UserHelper {
	/* Public functions */
	public function create_user($data) {
		// Set the timezone
        date_default_timezone_set('America/Los_Angeles');

		// Get data
		$first_name = $data["first_name"];
		$last_name = $data["last_name"];
		$email = $data["email"];
		$username = $data["username"];
		$password = $data["password"];
		$backend_auth = $data["backend_auth"];
		$hash_pwd = Hash::make($password);

		// Create user
		$user = new User;
		$user->username = $username;
		$user->email = $email;
		$user->first_name = $first_name;
		$user->last_name = $last_name;
		$user->password = $hash_pwd;
		$user->last_login_time = Carbon::now();
		$user->last_login_ip = $_SERVER['REMOTE_ADDR'];
		$user->backend_auth = $backend_auth;
		$user->number_of_logins = 0;
		$user->save();

		// Body of email
		$email_body = "<p style='text-align: center;'><b>Username: </b>" . $username . "</p>";
		$email_body .= "<p style='text-align: center; margin-bottom: 2px;'><b>Email: </b>" . $email . "</p>";
		$email_body .= "<p style='text-align: center; margin-bottom: 2px;'><b>Password: </b>" . $password . "</p>";

		// Email data
		$email_data = array(
			"recipient_first_name" => $first_name,
			"recipient_last_name" => $last_name,
			"recipient_email" => $email,
			"sender_first_name" => "Luis",
			"sender_last_name" => "Garcia",
			"sender_email" => "info@lawofambition.com",
			"subject" => "😳 Law of Ambition - You've Been Invited... 😳",
			"body" => $email_body
		);

		// Email helper
		$email_helper = new MailHelper($email_data);
		$email_helper->send_new_user_email();

		return $user->id;
	}

	public function get_users_with_pagination($pagination) {
		$users = User::paginate($pagination);
		return $users;
	}

	public function get_course_memberships_by_id($user_id) {
		return CourseMembership::where('user_id', $user_id)->get();
	}

	public function get_tool_memberships_by_id($user_id) {
		return ToolMembership::where('user_id', $user_id)->get();
	}

	public function get_user_posts_by_id($user_id) {
		return DiscussionPost::where('post_owner_id', $user_id)->get();
	}

	public function get_user_by_id($user_id) {
		return User::where('id', $user_id)->first();
	}

	public function get_user_first_name_by_id($user_id) {
		return User::where('id', $user_id)->first()->first_name;
	}

	public function get_user_last_name_by_id($user_id) {
		return User::where('id', $user_id)->first()->last_name;
	}

	public function get_user_email_by_id($user_id) {
		return User::where('id', $user_id)->first()->email;
	}

	public function get_user_profile_image_url_by_id($user_id) {
		return User::where('id', $user_id)->first()->profile_image_url;
	}

	public function edit_user_permissions($user_id, $backend_auth) {
		$user = User::where('id', $user_id)->first();
		$user->backend_auth = $backend_auth;
		$user->save();
	}
}

?>