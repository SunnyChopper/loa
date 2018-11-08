<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\UserHelper;

use App\User;

use Auth;

class UsersController extends Controller
{
    public function logout() {
    	Auth::logout();
    	return redirect(url('/'));
    }

    public function get_user_info($user_id) {
    	// Get user info
    	$user_helper = new UserHelper();
    	$user = $user_helper->get_user_by_id($user_id);

    	// Create return JSON array
    	$json_array = array(
    		"user_id" => $user->id,
    		"first_name" => $user->first_name,
    		"last_name" => $user->last_name,
    		"email" => $user->email,
    		"backend_auth" => $user->backend_auth
    	);

    	return json_encode($json_array);
    }

    public function create_user(Request $data) {
        // Get data
        $first_name = $data->first_name;
        $last_name = $data->last_name;
        $username = $data->username;
        $password = $data->password;
        $email = $data->email;
        $backend_auth = $data->backend_auth;

        // Check if email or username taken
        if (User::where('username', $username)->count() > 0) {
            return redirect()->back()->with('username_error', 'Username already exists!');
        }

        if (User::where('email', $email)->count() > 0) {
            return redirect()->back()->with('email_error', 'Email already taken!');
        }

        // Make user array
        $user_array = array(
            "first_name" => $first_name,
            "last_name" => $last_name,
            "username" => $username,
            "email" => $email,
            "password" => $password,
            "backend_auth" => $backend_auth
        );

        // Create user
        $user_helper = new UserHelper();
        $user_id = $user_helper->create_user($user_array);

        // Redirect to viewing users
        return redirect(url('/admin/users/view'));
    }

    public function edit_user(Request $data) {
        // Get data
        $user_id = $data->user_id;
        $backend_auth = $data->backend_auth;

        // Edit user permissions
        $user_helper = new UserHelper();
        $user_helper->edit_user_permissions($user_id, $backend_auth);

        // Return
        return redirect()->back();
    }
}
