<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\ProductHelper;
use App\Custom\CartHelper;
use App\Custom\SiteStatsHelper;

class CartController extends Controller
{
    public function add_to_cart(Request $data) {
    	// Get product information
    	$product_id = $data->product_id;
    	$product_helper = new ProductHelper($product_id);
    	$product = $product_helper->get_product_by_id();
    	$selectors_string = $product->selectors;
    	$selectors_array = json_decode($selectors_string, true);
    	$selectors = array_keys($selectors_array);

    	// Get number of items adding
    	$num_items = $data->num_items;

    	// Loop through selectors
    	$loop_index = 0;
    	$num_selectors = count($selectors);
    	$selected_string = "{\"";
    	foreach($selectors as $selector) {
    		$selected_string .= $selector . "\": \"";
    		$selector_value = $data->$selector;
    		if ($loop_index == ($num_selectors - 1)) {
	    		$selected_string .= $selector_value . "\"}";
	    	} else {
	    		$selected_string .= $selector_value . "\", \"";
	    	}
    		$selected_array[$selector] = $selector_value;
    	}

    	// Create array to pass onto CartHelper
    	$product_info = array(
    		"num_items" => $num_items,
    		"product_id" => $product_id,
    		"selectors" => $selected_string
    	);

    	// Add to cart
    	$cart_helper = new CartHelper();
    	$cart_helper->add_to_cart($product_info);

        // Add to analytics
        $site_stats_helper = new SiteStatsHelper();
        $site_stats_helper->product_add_add_to_cart($product_id);

    	// Redirect to cart page
    	return redirect(url('/cart'));
    }

    public function delete_from_cart(Request $data) {
    	// Prepare dictionary for CartHelper class
    	$product_info = array(
    		"product_id" => $data->product_id,
    		"num_items" => $data->num_items,
    		"selectors" => $data->selectors
    	);

    	// Create cart helper class and delete
    	$cart_helper = new CartHelper();
    	$cart_helper->delete_from_cart($product_info);

    	// Return to cart
    	return redirect()->back();
    }

    public function delete_all_from_cart() {
    	// Create cart helper
    	$cart_helper = new CartHelper();
    	$cart_helper->delete_all_from_cart();

    	// Redirect to cart
    	return redirect()->back();
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

    public function checkout(Request $data) {
    	// Create checkout dictionary for cart helper
    	$checkout_data = array(
    		"order_first_name" => $data->order_first_name,
    		"order_last_name" => $data->order_last_name,
    		"order_email" => $data->order_email,
    		"order_address" => $data->order_address,
            "order_city" => $data->order_city,
    		"order_state" => $data->order_state,
    		"order_country" => $data->order_country,
    		"order_zipcode" => $data->order_zipcode,
    		"card_number" => $data->card_number,
    		"ccExpiryMonth" => $data->ccExpiryMonth,
    		"ccExpiryYear" => $data->ccExpiryYear,
    		"cvvNumber" => $data->cvvNumber
    	);

    	// Create cart helper
    	$cart_helper = new CartHelper();
    	$result = $cart_helper->checkout($checkout_data);
    	if ($result === "success") {
    		$product_helper = new ProductHelper();
    		$expected_arrival_date = $this->getFutureBusinessDay(3);
    		$page_header = "Thank You!";
    		$products = $cart_helper->get_products_in_cart();
    		$cart_helper->delete_all_from_cart();
    		return redirect(url('/thank-you'))->with('products', $products)->with('product_helper', $product_helper)->with('expected_arrival_date', $expected_arrival_date)->with('page_header', $page_header);
    	} else {
    		return $result;
    	}
    }
}
