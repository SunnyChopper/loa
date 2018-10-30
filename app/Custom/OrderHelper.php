<?php

namespace App\Custom;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

use App\Product;
use App\Order;

use Auth;

class OrderHelper {
	/* Global variables */
	private $order_id;
	private $is_guest;
	private $digital;
	private $user_id;
	private $product_id;
	private $customer_id;
	private $order_selectors;
	private $order_ip;
	private $order_first_name;
	private $order_last_name;
	private $order_email;
	private $order_address;
	private $order_state;
	private $order_country;
	private $order_zipcode;
	private $order_status;
	private $order_tracking_number;
	private $created_at;
	private $updated_at;

	/* Initializer */
	public function __construct() {
		$this->order_id = 0;
		$this->is_guest = 0;
		$this->digital = 0;
		$this->user_id = 0;
		$this->product_id = 0;
		$this->customer_id = "";
		$this->order_selectors = "";
		$this->order_ip = "";
		$this->order_first_name = "";
		$this->order_last_name = "";
		$this->order_email = "";
		$this->order_address = "";
		$this->order_state = "";
		$this->order_country = "";
		$this->order_zipcode = "";
		$this->order_status = 0;
		$this->order_tracking_number = "";
		$this->created_at = "";
		$this->updated_at = "";
	}

	/* Public functions */
	public function create_order($data) {
		// Set data
		$this->product_id = $data["product_id"];
		$this->order_ip = $data["order_ip"];
		$this->order_selectors = $data["order_selectors"];
		$this->order_first_name = $data["order_first_name"];
		$this->order_last_name = $data["order_last_name"];
		$this->order_email = $data["order_email"];
		$this->order_address = $data["order_address"];
		$this->order_state = $data["order_state"];
		$this->order_country = $data["order_country"];
		$this->order_zipcode = $data["order_zipcode"];
		$this->customer_id = $data["customer_id"];
		$this->order_status = 1;
		$this->order_tracking_number = "";

		// Set guest variables
		if (Auth::guest()) {
			$this->is_guest = 1;
			$this->user_id = 0;
		} else {
			$this->is_guest = 0;
			$this->user_id = Auth::user()->id;
		}

		// Check to see if digital product
		if (Product::where('id', $this->product_id)->first()->digital_product == 1) {
			$this->digital = 1;
		}

		// Finally, create the order
		$order = new Order;
		$order->is_guest = $this->is_guest;
		$order->digital = $this->digital;
		$order->user_id = $this->user_id;
		$order->product_id = $this->product_id;
		$order->customer_id = $this->customer_id;
		$order->order_ip = $this->order_ip;
		$order->order_first_name = $this->order_first_name;
		$order->order_last_name = $this->order_last_name;
		$order->order_email = $this->order_email;
		$order->order_address = $this->order_address;
		$order->order_state = $this->order_state;
		$order->order_country = $this->order_country;
		$order->order_zipcode = $this->order_zipcode;
		$order->order_status = $this->order_status;
		$order->order_tracking_number = $this->order_tracking_number;
		$order->save();

		// Update variables
		$this->order_id = $order->id;
		$this->created_at = $order->created_at;
		$this->updated_at = $order->updated_at;
	}

	public function load_order_by_id($order_id) {
		$this->order_id = $order_id;

		$order = Order::where('id', $order_id)->first();
		$this->is_guest = $order->is_guest;
		$this->digital = $order->digital;
		$this->user_id = $order->user_id;
		$this->product_id = $order->product_id;
		$this->customer_id = $order->customer_id;
		$this->order_ip = $order->order_ip;
		$this->order_first_name = $order->order_first_name;
		$this->order_last_name = $order->order_last_name;
		$this->order_email = $order->order_email;
		$this->order_address = $order->order_address;
		$this->order_state = $order->order_state;
		$this->order_country = $order->order_country;
		$this->order_zipcode = $order->order_zipcode;
		$this->order_status = $order->order_status;
		$this->order_tracking_number = $order->order_tracking_number;
		$this->created_at = $order->created_at;
		$this->updated_at = $order->updated_at;
	}

	public function load_open_orders() {
		return Order::where('status', 1)->get('id', 'order_first_name', 'order_country');
	}

	public function load_shipped_orders() {
		return Order::where('status', 2)->get('id', 'order_first_name', 'order_country');
	}

	public function load_refunded_orders() {
		return Order::where('status', 3)->get('id', 'order_first_name', 'order_country');
	}

	public function load_returned_orders() {
		return Order::where('status', 4)->get('id', 'order_first_name', 'order_country');
	}

	public function edit_status($status) {
		if ($this->order_id == 0) {
			return "error";
		} else {
			$order = Order::where('id', $this->order_id)->first();
			$order->status = $status;
			$order->save();

			$this->updated_at = $order->updated_at;
			return "success";
		}
	}

	public function edit_tracking_number($tracking_number) {
		if ($this->order_id == 0) {
			return "error";
		} else {
			$order = Order::where('id', $this->order_id)->first();
			$order->order_tracking_number = $tracking_number;
			$order->save();

			$this->updated_at = $order->updated_at;
			return "success";
		}
	}

}

?>