<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;
use Validator;

use App\Custom\ProductHelper;
use App\Custom\CartHelper;

class PagesController extends Controller
{
    public function index() {
    	// SEO Data
    	$page_title = "Home";
    	$page_description = "Law of Ambition is more than just a brand or a person. It's a mindset.";

    	return view('pages.index')->with('page_title', $page_title)->with('page_description', $page_description);
    }

    public function contact() {
    	// SEO Data
    	$page_title = "Contact";
    	$page_description = "Got a question? Just want to say hi? No problem. Fill out the contact form and I'll get back to you as soon as possible.";

    	// Dynamic page features
    	$page_header = "Contact";

    	return view('pages.contact')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function tools() {
    	// SEO Data
    	$page_title = "Free Tools";
    	$page_description = "As an entrepreneur, it's important to have the right tools so you can work smarter than the competition.";

    	// Dynamic page features
    	$page_header = "Free Tools";

    	return view('pages.tools')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function blog() {
    	// SEO Data
    	$page_title = "Free Advice";
    	$page_description = "Every entrepreneur starts their journey by getting some free eye-opening advice. Get yours here.";

    	// Dynamic page features
    	$page_header = "Free Advice";

    	return view('pages.blog')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function shop() {
    	// SEO Data
    	$page_title = "Ambition Shop";
    	$page_description = "Show off that you're part of Wolf Squad. Take pride in the work and effort that you make.";

    	// Dynamic page features
    	$page_header = "Ambition Shop";

        // Get all products
        $product_helper = new ProductHelper();
        $products = $product_helper->get_active_products();

    	return view('pages.shop')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header)->with('products', $products);
    }

    public function courses() {
    	// SEO Data
    	$page_title = "Courses";
    	$page_description = "Become a better entrepreneur with these online courses. The more you invest in yourself, the better.";

    	// Dynamic page features
    	$page_header = "Courses";

    	return view('pages.courses')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function events() {
    	// SEO Data
    	$page_title = "Events";
    	$page_description = "Come out and meet me and other Wolf Squad members. Network and grow your alliance.";

    	// Dynamic page features
    	$page_header = "Events";

    	return view('pages.events')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function product($product_id) {
        // Get product
        $product_helper = new ProductHelper($product_id);
        $product = $product_helper->get_product_by_id();

        // Dynamic page features
        $page_header = $product->product_name;

        return view('pages.product')->with('page_header', $page_header)->with('product', $product);
    }

    public function cart() {
        // Dynamic page features
        $page_header = "Cart";

        // Get products in cart
        $cart_helper = new CartHelper();
        $products = $cart_helper->get_products_in_cart();

        // Product helper for page
        $product_helper = new ProductHelper();

        return view('pages.cart')->with('page_header', $page_header)->with('products', $products)->with('product_helper', $product_helper)->with('cart_helper', $cart_helper);
    }

    public function getFutureBusinessDay($num_business_days, $today_ymd = null, $holiday_dates_ymd = []) {
        $num_business_days = min($num_business_days, 1000);
        $business_day_count = 0;
        $current_timestamp = empty($today_ymd) ? time() : strtotime($today_ymd);
        while ($business_day_count < $num_business_days) {
            $next1WD = strtotime('+1 weekday', $current_timestamp);
            $next1WDDate = date('Y-m-d', $next1WD);        
            if (!in_array($next1WDDate, $holiday_dates_ymd)) {
                $business_day_count++;
            }
            $current_timestamp = $next1WD;
        }
        return date('Y-m-d', $current_timestamp);
    }

    public function checkout() {
        // Dynamic page features
        $page_header = "Checkout";

        // Get important info from cart helper class
        $cart_helper = new CartHelper();
        $total = $cart_helper->get_total();

        // Get date three business days from now
        $expected_shipping_date = $this->getFutureBusinessDay(env('SHIPPING_DAYS'));

        return view('pages.checkout')->with('page_header', $page_header)->with('total', $total)->with('expected_shipping_date', $expected_shipping_date);
    }

    public function thank_you() {
        // Dynamic page features
        $page_header = "Order Confirmed";

        return view('pages.thank-you')->with('page_header', $page_header);
    }

    public function test_payment() {
        $page_header = "Test Payment";
        return view('pages.test-payment')->with('page_header', $page_header);
    }

    public function test_payment_charge(Request $request) {
        $validator = Validator::make($request->all(), [
            'card_number' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
            'amount' => 'required',
        ]);

        $input = $request->all();
        if ($validator->passes()) {
            $input = array_except($input,array('_token'));
            $stripe = Stripe::make(env('STRIPE_SECRET'));

            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number'    => $request->get('card_number'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year'  => $request->get('ccExpiryYear'),
                        'cvc'       => $request->get('cvvNumber'),
                    ],
                ]);

                if (!isset($token['id'])) {
                    \Session::put('error','The Stripe Token was not generated correctly');
                    return redirect()->route('stripform');
                }

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount'   => $request->get('amount'),
                    'description' => 'Test payment',
                ]);

                if($charge['status'] == 'succeeded') {
                    echo "Successful";
                } else {
                    echo "Error";
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
                echo $e->getMessage();
            } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                echo $e->getMessage();
            }
        }
        \Session::put('error','All fields are required!!');
        echo "Something went wrong";
    }

    public function login() {
    	// SEO Data
    	$page_title = "Login";
    	$page_description = "Login into the Wolf Squad and start to upgrade your mindsets as an entrepreneur.";

    	// Dynamic page features
    	$page_header = "Wolf Squad Awaits You";

    	return view('pages.login')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }

    public function register() {
    	// SEO Data
    	$page_title = "Register";
    	$page_description = "Start your journey with Wolf Squad. Upgrade your business mindset.";

    	// Dynamic page features
    	$page_header = "Join Wolf Squad";

    	return view('pages.register')->with('page_title', $page_title)->with('page_description', $page_description)->with('page_header', $page_header);
    }
}
