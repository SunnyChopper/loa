<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function index() {
    	// Check if already logged in
    	if ($user = Auth::user()) {
    		if ($user->backend_auth == 1) {
    			// Redirect
    			return redirect(url('/admin/dashboard'));
    		} else {
    			return redirect(url('/members/dashboard'));
    		}
    	}

    	// Dynamic page features
    	$page_header = "Admin Login";

    	return view('admin.index')->with('page_header', $page_header);
    }

    public function login(Request $data) {
        // Get data
        $username = $data->username;
        $password = $data->password;

        // Get user
        if(User::where('username', $username)->count() > 0) {
            $user = User::where('username', $username)->first();
            $hash_pwd = Hash::make($password);
            if (strcasecmp($hash_pwd, $user->password)) {
                // Check for auth
                if ($user->backend_auth > 0) {
                    Auth::login($user);
                    Session::put('backend_auth', $user->backend_auth);
                    return redirect(url('/admin/dashboard'));
                } else {
                    Session::flash('backend_auth_error', 'You are not authorized.');
                    return Redirect::back();
                }
            } else {
                Session::flash('password', 'Password did not match our records.');
                return Redirect::back();
            }
        } else {
            Session::flash('username', 'The username did not match our records.');
            return Redirect::back();
        }

    }

    public function dashboard() {
        // Dynamic page features
        $page_header = "Admin Dashboard";

        return view('admin.dashboard')->with('page_header', $page_header);
    }

    public function view_products() {
        // Dynamic page features
        $page_header = "Active Products";

        return view('admin.products.view')->with('page_header', $page_header);
    }

    public function new_product() {
        // Dynamic page features
        $page_header = "Create New Product";

        return view('admin.products.new')->with('page_header', $page_header);
    }

    public function edit_product() {
        // Dynamic page features
        $page_header = "Edit Product";

        return view('admin.products.edit')->with('page_header', $page_header);
    }
}
