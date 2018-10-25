<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function logout() {
    	Auth::logout();
    	return redirect(url('/'));
    }
}
