<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\OrderHelper;
use App\Custom\ProductHelper;

class OrdersController extends Controller
{
    public function update_order(Request $data) {
    	// Get data
    	$order_id = $data->order_id;
    	$status = $data->order_status;
    	$tracking_num = $data->order_tracking_num;

    	// Create order helper
    	$order_helper = new OrderHelper();
    	$order_helper->load_order_by_id($order_id);

    	// Update
    	$order_helper->edit_status($status);
    	$order_helper->edit_tracking_num($tracking_num);

    	// TODO: Send out email

    	// Return back
    	return redirect()->back();
    }

    public function get_order($order_id) {
    	// Order helper
    	$order_helper = new OrderHelper();
    	$order = $order_helper->get_order_by_id($order_id);

        // Get product data
        $product_helper = new ProductHelper($order->product_id);
        $product = $product_helper->get_product_by_id();

    	// Create return JSON
    	$json_array = array(
    		"order_id" => $order_id,
    		"is_guest" => $order->is_guest,
    		"digital" => $order->digital,
    		"user_id" => $order->user_id,
    		"product_id" => $order->product_id,
    		"customer_id" => $order->customer_id,
    		"order_ip" => $order->order_ip,
    		"order_first_name" => $order->order_first_name,
    		"order_last_name" => $order->order_last_name,
    		"order_email" => $order->order_email,
    		"order_address" => $order->order_address,
    		"order_state" => $order->order_state,
    		"order_country" => $order->order_country,
    		"order_zipcode" => $order->order_zipcode,
    		"order_status" => $order->order_status,
    		"order_tracking_num" => $order->order_tracking_num,
    		"created_at" => $order->created_at,
    		"updated_at" => $order->updated_at,
    		"order_selectors" => $order->order_selectors,
    		"order_city" => $order->order_city,
    		"quantity" => $order->quantity,
            "product_name" => $product->product_name,
            "featured_image_url" => $product->featured_image_url,
            "promo_code" => $order->promo_code,
            "promo_code_id" => $order->promo_code_id
    	);

    	return json_encode($json_array);
    }
}
