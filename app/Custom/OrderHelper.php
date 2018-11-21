<?php

namespace App\Custom;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

use App\Custom\ProductHelper;
use App\Custom\MailHelper;

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
	private $order_city;
	private $order_state;
	private $order_country;
	private $order_zipcode;
	private $order_status;
	private $order_tracking_num;
	private $order_group;
	private $quantity;
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
		$this->order_city = "";
		$this->order_state = "";
		$this->order_country = "";
		$this->order_zipcode = "";
		$this->order_status = 0;
		$this->order_tracking_num = "";
		$this->order_group = 0;
		$this->quantity = 0;
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
		$this->order_city = $data["order_city"];
		$this->order_state = $data["order_state"];
		$this->order_country = $data["order_country"];
		$this->order_zipcode = $data["order_zipcode"];
		$this->customer_id = $data["customer_id"];
		$this->quantity = $data["quantity"];
		$this->order_status = 1;
		$this->order_tracking_num = "";
		$this->order_group = $data["order_group"];

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
		$order->order_selectors = $this->order_selectors;
		$order->order_first_name = $this->order_first_name;
		$order->order_last_name = $this->order_last_name;
		$order->order_email = $this->order_email;
		$order->order_address = $this->order_address;
		$order->order_city = $this->order_city;
		$order->order_state = $this->order_state;
		$order->order_country = $this->order_country;
		$order->order_zipcode = $this->order_zipcode;
		$order->order_status = $this->order_status;
		$order->order_tracking_num = $this->order_tracking_num;
		$order->quantity = $this->quantity;
		$order->order_group = $this->order_group;
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
		$this->order_city = $order->order_city;
		$this->order_state = $order->order_state;
		$this->order_country = $order->order_country;
		$this->order_zipcode = $order->order_zipcode;
		$this->order_status = $order->order_status;
		$this->order_tracking_num = $order->order_tracking_num;
		$this->created_at = $order->created_at;
		$this->updated_at = $order->updated_at;

		return $order;
	}

	public function load_all_orders() {
		return Order::orderBy('created_at', 'desc')->paginate(10);
	}

	public function load_open_orders() {
		return Order::where('status', 1)->get('id', 'order_first_name', 'order_last_name', 'order_country');
	}

	public function load_shipped_orders() {
		return Order::where('status', 2)->get('id', 'order_first_name', 'order_last_name', 'order_country');
	}

	public function load_refunded_orders() {
		return Order::where('status', 3)->get('id', 'order_first_name', 'order_last_name', 'order_country');
	}

	public function load_returned_orders() {
		return Order::where('status', 4)->get('id', 'order_first_name', 'order_last_name', 'order_country');
	}

	public function get_order_by_id($order_id) {
		return Order::where('id', $order_id)->first();
	}

	public function edit_status($status) {
		if ($this->order_id == 0) {
			return "error";
		} else {
			$order = Order::where('id', $this->order_id)->first();
			$order->order_status = $status;
			$order->save();

			$this->updated_at = $order->updated_at;
			return "success";
		}
	}

	public function edit_tracking_num($tracking_num) {
		if ($this->order_id == 0) {
			return "error";
		} else {
			// Update order
			$order = Order::where('id', $this->order_id)->first();
			$order->order_tracking_num = $tracking_num;
			$order->save();

			// Get information about product
			$product_helper = new ProductHelper($order->product_id);
			$product = $product_helper->get_product_by_id();

			// Send email to customer
			$to_email = $order->order_email;
			$to_first_name = $order->order_first_name;
			$to_last_name = $order->order_last_name;

			$body = "<p style='text-align: center;'>We've shipped out your <b>" . $product->product_name . "</b>.</p>";
			$body .= "<p style='text-align: center;'>Your tracking number: <b>" . $tracking_num . "</b></p>";
			$body .= "<p style='text-align: center;'><small>If you have any questions about your order, reply to this email.</small></p>"; 

			$email_data = array(
				"recipient_first_name" => $to_first_name,
				"recipient_last_name" => $to_last_name,
				"recipient_email" => $to_email,
				"sender_first_name" => "Luis",
				"sender_last_name" => "Garcia",
				"sender_email" => "info@lawofambition.com",
				"subject" => "📦 Your Order Has Been Shipped 📦",
				"body" => $body
			);

			$mail_helper = new MailHelper($email_data);
			$mail_helper->send_tracking_number_email();

			$this->updated_at = $order->updated_at;
			return "success";
		}
	}

	public function get_next_order_group() {
		// Check to see if any rows
		if (Order::count() == 0) {
			return 1;
		} else {
			// Get last row
			$last_order = Order::orderBy('created_at', 'desc')->first();
			$order_group = $last_order->order_group;
			return intval($order_group) + 1;
		}
	}
}

?>