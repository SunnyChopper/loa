<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\UserHelper;

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
}
