<?php

namespace App\Custom;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

use App\Product;

use App\Custom\OrderHelper;

use Validator;
use Session;
use Auth;


class CartHelper {
	/* Private global variables */
	private $num_items;
	private $product_array;
	private $cart_total;

	/* Initializer */
	public function __construct() {
		if (Session::has('cart_num_items')) {
			$this->num_items = Session::get('cart_num_items');
		} else {
			$this->num_items = 0;
		}

		if (Session::has('cart_product_array')) {
			$this->product_array = Session::get('cart_product_array');
		} else {
			$this->product_array = array();
		}

		if (Session::has('cart_total')) {
			$this->cart_total = Session::get('cart_total');
		} else {
			$this->cart_total = 0;
		}

		$this->save();
	}

	/* Public functions */
	public function add_to_cart($data) {
		// Get product info
		$product_info = array(
			"num_items" => $data["num_items"]
			"product_id" => $data["product_id"],
			"selectors" => $data["selectors"]
		);

		// Check if duplicate
		if ($this->check_for_duplicate_product($product_info) == true) {
			$this->insert_duplicate_product($product_info);
		} else {
			$this->insert_product($product_info);
		}

		// Update total
		$this->update_total_of_cart();
	}

	public function delete_from_cart($data) {
		// Get product info
		$product_info = array(
			"num_items" => $data["num_items"]
			"product_id" => $data["product_id"],
			"selectors" => $data["selectors"]
		);

		// Reduce number of items
		$num_items = $this->get_current_num_items();
		$num_items -= $product_info["num_items"];

		// Check which index product array lives on
		$products = $this->get_current_products();
		$target_index = -1;
		$iterator_index = 0;
		foreach ($products as $product) {
			if ($product["product_id"] == $product_info["product_id"]) {
				// Next, check selectors
				$selectors = $product_info["selectors"];
				if (strcmp($product["selectors"], $selectors)) {
					// Match, tag it
					$target_index = $iterator_index;
				}
			}

			// Uptick iterator
			$iterator_index += 1;
		}

		// Delete from products array
		unset($products[$target_index]);

		// Update variables
		$this->num_items = $num_items;
		$this->product_array = $products;
		$this->save();

		// Update total
		$this->update_total_of_cart();
	}

	public function delete_all_from_cart() {
		$this->num_items = 0;
		$this->product_array = array();
		$this->cart_total = 0;

		$this->save();
	}

	public function checkout(Request $data) {
		// Start by creating a charge
		$validator = Validator::make($request->all(), [
			'card_number' => 'required',
			'ccExpiryMonth' => 'required',
			'ccExpiryYear' => 'required',
			'cvvNumber' => 'required'
		]);

		if ($validator->passes()) {
			$input = array_except($input,array('_token'));
			$stripe = Stripe::make(env('STRIPE_SECRET'));

			try {
				// Create the token
				$token = $stripe->tokens()->create([
					'card' => [
						'number'    => $data->card_number,
						'exp_month' => $data->ccExpiryMonth,
						'exp_year'  => $data->ccExpiryYear,
						'cvc'       => $data->cvvNumber
					]
				]);

				if (!isset($token['id'])) {
					\Session::put('error','The Stripe Token was not generated correctly');
					return redirect()->back();
				}

				// Create a customer
				$customer = $stripe->customers()->create([
					"email" => $data->email
				]);

				// Create a card for customer
				$card = $stripe->cards()->create($customer["id"], $token["id"]);

				// Get total
				$total = $this->get_current_total();

				$charge = $stripe->charges()->create([
					'card' => $card,
					'currency' => 'USD',
					'amount'   => $total,
					'description' => 'Purchase from Law of Ambition E-Commerce Shop'
				]);

				if($charge['status'] == 'succeeded') {
					// Successfully created charge, now, let's create orders for each product
					$products = $this->get_current_products();
					foreach ($products as $product) {
						// Create dictionary for OrderHelper
						$order_info = array();
						$order_info["product_id"] = $product["product_id"];
						$order_info["order_ip"] = $_SERVER["REMOTE_ADDR"];
						$order_info["order_selectors"] = $product["selectors"];
						$order_info["order_first_name"] = $data->order_first_name;
						$order_info["order_last_name"] = $data->order_last_name;
						$order_info["order_email"] = $data->order_email;
						$order_info["order_address"] = $data->order_address;
						$order_info["order_state"] = $data->order_state;
						$order_info["order_country"] = $data->order_country;
						$order_info["order_zipcode"] = $data->order_zipcode;
						$order_info["customer_id"] = $customer["id"];

						$order_helper = new OrderHelper();
						$order_helper->create_order($order_info);
					}

					// TODO: Send thank you email
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
	}

	/* Private helper functions */
	private function update_total_of_cart() {
		// Get products
		$products = $this->get_current_products();

		// Loop through and add subtotals
		$total = 0;
		foreach ($products as $product) {
			$total += $product["subtotal"];
		}

		// Update and save
		$this->cart_total = $total;
		$this->save();
	}

	private function insert_product($product_info) {
		$products = $this->get_current_products();

		// Calculate subtotal
		$product = Product::where('id', $product_info["product_id"])->first();
		$product_price = $product->product_price;
		$subtotal = $product_info["num_items"] * $product_price;

		// Create insertion array
		$insertion_array = array(
			"quantity" => $product_info["num_items"],
			"selectors" => $product_info["selectors"],
			"product_id" => $product_info["product_id"],
			"subtotal" => $subtotal
		);

		// Insert array
		array_push($products, $insertion_array);

		// Update local variable and save
		$this->product_array = $products;
		$this->num_items += $product_info["num_items"];
		$this->save();
	}

	private function insert_duplicate_product($product_info) {
		$product_id = $product_info["product_id"];
		$products = $this->get_current_products();
		foreach ($products as $product) {
			if ($product["product_id"] == $product_id) {
				// Next, check selectors
				$selectors = $product_info["selectors"];
				if (strcmp($product["selectors"], $selectors)) {
					// Update quantity
					$product["quantity"] += $product_info["num_items"];

					// Update subtotal
					$old_subtotal = $product["subtotal"];
					$product = Product::where('id', $product_info["product_id"])->first();
					$product_price = $product->product_price;
					$addon_subtotal = $product_info["num_items"] * $product_price;
					$new_subtotal = $old_subtotal + $addon_subtotal;
					$product["subtotal"] = $new_subtotal;
				}
			}
		}

		// Update local variables and save
		$this->product_array = $products;
		$this->num_items += $product_info["num_items"];
		$this->save();
	}

	private function check_for_duplicate_product($product_info) {
		$duplicate_product = false;

		// First check if same product ID
		$product_id = $product_info["product_id"];
		$products = $this->get_current_products();
		foreach ($products as $product) {
			if ($product["product_id"] == $product_id) {
				// Next, check selectors
				$selectors = $product_info["selectors"];
				if (strcmp($product["selectors"], $selectors)) {
					// Yes, duplicate
					$duplicate_product = true;
				}
			}
		}

		return $duplicate_product;
	}

	private function get_current_products() {
		if (Session::has('cart_product_array')) {
			$product_array = Session::get('cart_product_array');
			return $product_array;
		} else {
			return array();
		}
	}

	private function get_current_total() {
		if (Session::has('cart_total')) {
			$cart_total = Session::get('cart_total');
			return $cart_total;
		} else {
			return 0;
		}
	}

	private function get_current_num_items() {
		if (Session::has('cart_num_items')) {
			$cart_num_items = Session::get('cart_num_items');
			return $cart_num_items;
		} else {
			return 0;
		}
	}

	private function save() {
		Session::set('cart_num_items', $this->num_items);
		Session::set('cart_product_array', $this->product_array);
		Session::set('cart_total', $this->cart_total);
	}
}

?>