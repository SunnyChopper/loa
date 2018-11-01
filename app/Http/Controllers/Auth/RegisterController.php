<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Custom\SiteStatsHelper;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function split_name($name) {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
        return array($first_name, $last_name);
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/members/dashboard/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Set the timezone
        date_default_timezone_set('America/Los_Angeles');

        // Get name
        $name_array = $this->split_name($data['name']);

        // Create user 
        $user = User::create([
            'username' => $data['username'],
            'first_name' => $name_array[0],
            'last_name' => $name_array[1],
            'last_login_time' => Carbon::now(),
            'last_login_ip' => $_SERVER['REMOTE_ADDR'],
            'number_of_logins' => 1,
            'backend_auth' => 0,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Handle analytics
        $site_stats_helper = new SiteStatsHelper();
        $user_id = $user->id;
        $user_data = array("user_id" => $user_id);
        $site_stats_helper->new_signup($user_data);

        // Return user
        return $user;
    }
}
