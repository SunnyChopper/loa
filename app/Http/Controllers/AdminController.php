<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
use Auth;

use App\Custom\BlogPostHelper;
use App\Custom\ProductHelper;
use App\Custom\OrderHelper;
use App\Custom\SiteStatsHelper;
use App\Custom\UserHelper;
use App\Custom\EventHelper;
use App\Custom\CourseHelper;
use App\Custom\PromoCodeHelper;

class AdminController extends Controller
{
    public function index() {
    	// Check if already logged in
    	if ($user = Auth::user()) {
    		if ($user->backend_auth == 1 || $user->backend_auth == 2 || $user->backend_auth == 3 || $user->backend_auth == 4 || $user->backend_auth == 5 || $user->backend_auth == 6) {
    			// Redirect
                Session::put('backend_auth', $user->backend_auth);
    			return redirect(url('/admin/dashboard'));
    		} else {
    			return redirect(url('/members/dashboard'));
    		}
    	}

    	// Dynamic page features
    	$page_header = "Admin Login";

    	return view('admin.index')->with('page_header', $page_header);
    }

    public function switch() {
        // Remove variable
        Session::forget('backend_auth');

        // Redirect
        return redirect(url('/members/dashboard'));
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
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Admin Dashboard";

        return view('admin.dashboard')->with('page_header', $page_header);
    }

    public function view_orders() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Orders";

        // Get all orders
        $order_helper = new OrderHelper();
        $orders = $order_helper->load_all_orders();

        // Product helper for the page
        $product_helper = new ProductHelper();

        return view('admin.orders.view')->with('page_header', $page_header)->with('orders', $orders)->with('product_helper', $product_helper);
    }

    public function edit_order($order_id) {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Edit Product";

        // Get order
        $order_helper = new OrderHelper();
        $order = $order_helper->load_order_by_id($order_id);

        // Product helper for the page
        $product_helper = new ProductHelper();

        return view('admin.orders.edit')->with('page_header', $page_header)->with('order', $order)->with('product_helper', $product_helper);
    }

    public function view_blog_posts() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Blog Posts";

        // Get all active posts
        $user_id = Auth::id();
        $post_helper = new BlogPostHelper();
        $posts = $post_helper->get_posts_by_author_id($user_id);

        return view('admin.posts.view')->with('page_header', $page_header)->with('posts', $posts);
    }

    public function new_blog_post() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "New Post";

        return view('admin.posts.new')->with('page_header', $page_header);
    }

    public function edit_blog_post($post_id) {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Edit Post";

        // Get post
        $blog_post_helper = new BlogPostHelper($post_id);
        $post = $blog_post_helper->get_post_by_id();

        return view('admin.posts.edit')->with('page_header', $page_header)->with('post', $post);
    }

    public function blog_post_stats() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Blog Post Stats";

        // Get all active posts
        $user_id = Auth::id();
        $post_helper = new BlogPostHelper();
        $posts = $post_helper->get_posts_by_author_id($user_id);

        // Get stats class loaded
        $site_stats_helper = new SiteStatsHelper();

        return view('admin.posts.stats')->with('page_header', $page_header)->with('posts', $posts)->with('site_stats_helper', $site_stats_helper);
    }

    public function view_products() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Active Products";

        // Get all active products
        $product_helper = new ProductHelper();
        $products = $product_helper->get_active_products();

        return view('admin.products.view')->with('page_header', $page_header)->with('products', $products);
    }

    public function view_product_stats() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Product Stats";

        // Get all active products
        $product_helper = new ProductHelper();
        $products = $product_helper->get_active_products();

        // Stats helper
        $site_stats_helper = new SiteStatsHelper();

        return view('admin.products.stats')->with('page_header', $page_header)->with('products', $products)->with('site_stats_helper', $site_stats_helper);
    }

    public function new_product() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Create New Product";

        return view('admin.products.new')->with('page_header', $page_header);
    }

    public function edit_product($product_id) {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Edit Product";

        // Get product
        $product_helper = new ProductHelper($product_id);
        $product = $product_helper->get_product_by_id();

        return view('admin.products.edit')->with('page_header', $page_header)->with('product', $product);
    }

    public function view_users() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "View Users";

        // Get users
        $user_helper = new UserHelper();
        $users = $user_helper->get_users_with_pagination(25);

        return view('admin.users.view')->with('page_header', $page_header)->with('users', $users);
    }

    public function new_user() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "New User";

        return view('admin.users.new')->with('page_header', $page_header);
    }

    public function view_events() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "View Events";

        // Get events
        $event_helper = new EventHelper();
        $events = $event_helper->get_events_with_pagination(25);

        return view('admin.events.view')->with('page_header', $page_header)->with('events', $events);
    }

    public function new_event() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "New Event";

        return view('admin.events.new')->with('page_header', $page_header);
    }

    public function edit_event($event_id) {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Edit Event";

        // Load event
        $event_helper = new EventHelper($event_id);
        $event = $event_helper->get_event();

        return view('admin.events.edit')->with('page_header', $page_header)->with('event', $event);
    }

    public function event_stats() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Event Stats";

        // Events
        $event_helper = new EventHelper();
        $events = $event_helper->get_all_events();

        // Get stats
        $site_stats_helper = new SiteStatsHelper();

        return view('admin.events.stats')->with('page_header', $page_header)->with('site_stats_helper', $site_stats_helper)->with('events', $events);
    }

    public function view_courses() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "View Courses";

        // Get courses
        $course_helper = new CourseHelper();
        $courses = $course_helper->get_all_courses();

        return view('admin.courses.view')->with('page_header', $page_header)->with('courses', $courses);
    }

    public function new_course() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "New Course";

        return view('admin.courses.new')->with('page_header', $page_header);
    }

    public function edit_course($course_id) {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Edit Course";

        // Get course
        $course_helper = new CourseHelper($course_id);
        $course = $course_helper->get_course_by_id();

        return view('admin.courses.edit')->with('page_header', $page_header)->with('course', $course);
    }

    public function course_stats() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Course Stats";

        // Get course
        $course_helper = new CourseHelper();
        $courses = $course_helper->get_published_courses();

        return view('admin.courses.stats')->with('page_header', $page_header)->with('courses', $courses);
    }

    public function new_book_discussion() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "New Book Discussion";

        return view('admin.discussions.new')->with('page_header', $page_header);
    }

    public function view_promo_codes() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Promo Codes";

        // Get courses
        $promo_code_helper = new PromoCodeHelper();
        $promo_codes = $promo_code_helper->get_all_active_promo_codes();

        return view('admin.promo-codes.view')->with('page_header', $page_header)->with('promo_codes', $promo_codes);
    }

    public function new_promo_code() {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "New Promo Code";

        return view('admin.promo-codes.new')->with('page_header', $page_header);
    }

    public function edit_promo_code($promo_code_id) {
        // Check for login
        $check_login = $this->check_login();
        if ($check_login == 1) {
            return redirect(url('/admin'));
        } elseif ($check_login == 2) {
            return redirect(url('/members/login'));
        } 

        // Dynamic page features
        $page_header = "Edit Promo Code";

        // Get promo code
        $promo_code_helper = new PromoCodeHelper($promo_code_id);
        $code = $promo_code_helper->get_promo_code_by_id($promo_code_id);

        return view('admin.promo-codes.edit')->with('page_header', $page_header)->with('code', $code);
    }

    private function check_login() {
        // Get session variables
        if (Auth::guest()) {
            // Redirect
            return 1;
        } elseif (!Session::has('backend_auth')) {
            // Redirect
            return 1;
        } else {
            if (Session::get('backend_auth') == 0) {
                // Redirect
                return 2;
            }
        }
    }
}
