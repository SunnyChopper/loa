<?php

namespace App\Custom;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;

use App\Product;

use App\Custom\OrderHelper;
use App\Custom\SiteStatsHelper;
use App\Custom\MailHelper;
use App\Custom\PromoCodeHelper;

use Validator;
use Session;
use Auth;


class CartHelper {
	/* Private global variables */
	private $num_items;
	private $product_array;
	private $cart_total;
	private $old_total;
	private $promo_code;

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

		if (Session::has('old_total')) {
			$this->old_total = Session::get('old_total');
		} else {
			$this->old_total = 0;
		}

		if (Session::has('promo_code')) {
			$this->promo_code = Session::get('promo_code');
		} else {
			$this->promo_code = "";
		}

		$this->save();
	}

	/* Public functions */
	public function add_to_cart($data) {
		// Get product info
		$product_info = array(
			"num_items" => $data["num_items"],	
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
		$this->update_total_with_promo_code();
	}

	public function delete_from_cart($data) {
		// Get product info
		$product_info = array(
			"num_items" => $data["num_items"],
			"product_id" => $data["product_id"],
			"selectors" => $data["selectors"]
		);

		// Reduce number of items
		$num_items = $this->get_current_num_items();
		$num_items -= $product_info["num_items"];

		// Check which index product array lives on
		$products = $this->get_current_products();
		if (count($products) == 1) {
			$this->delete_all_from_cart();
		} else {
			$target_index = -1;
			$iterator_index = 0;
			foreach ($products as $product) {
				if ($product["product_id"] === $product_info["product_id"]) {
					// Next, check selectors
					$selectors = $product_info["selectors"];
					if ($product["selectors"] === $selectors) {
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
			$this->update_total_with_promo_code();
		}
	}

	public function delete_all_from_cart() {
		$this->num_items = 0;
		$this->product_array = array();
		$this->cart_total = 0;
		$this->old_total = 0;
		$this->promo_code = "";

		$this->save();
	}

	public function attach_promo_code($promo_code) {
		// Check to see if promo code already attached
		if ($this->does_promo_code_exist_in_cart() != true) {
			// Check to see if promo code exists
			$promo_code_helper = new PromoCodeHelper();
			if ($promo_code_helper->does_promo_code_exist(strtoupper($promo_code)) == true) {
				// Yes, it exists, get the info and edit cart
				$promo_code = $promo_code_helper->get_promo_code(strtoupper($promo_code));
				$code_type = $promo_code->code_type;
				if ($code_type == 1) {
					// This means percent off. We need to calculate and update total.
					$percent_off = $promo_code->percent_off;
					$cart_total = $this->cart_total;
					$amount_removed = $cart_total * $percent_off;
					$new_total = $cart_total - $amount_removed;

					// Update variables
					$this->old_total = $cart_total;
					$this->cart_total = $new_total;
					$this->promo_code = $promo_code;

					// Create addition in stats helper
	                $site_stats_helper = new SiteStatsHelper();
	                if (Auth::guest()) {
	                    $site_stats_helper->promo_code_add_guest_addition($promo_code->id);
	                } else {
	                	$site_stats_helper->promo_code_add_member_addition($promo_code->id);
	                }

					// Update cart
					$this->save();
				} else {
					// This means dollars off.
					$dollars_off = $promo_code->dollars_off;
					$minimum_amount = $promo_code->minimum_amount;
					$cart_total = $this->cart_total;
					if ($cart_total < $minimum_amount) {
						return "Cart total does not meet minimum requirement of $" . $minimum_amount .  " for this promo code.";
					} else {
						// Get new total
						$new_total = $cart_total - $dollars_off;

						// Update variables
						$this->old_total = $cart_total;
						$this->cart_total = $new_total;
						$this->promo_code = $promo_code;

						// Create addition in stats helper
		                $site_stats_helper = new SiteStatsHelper();
		                if (Auth::guest()) {
		                    $site_stats_helper->promo_code_add_guest_addition($promo_code->id);
		                } else {
		                	$site_stats_helper->promo_code_add_member_addition($promo_code->id);
		                }

						// Update cart
						$this->save();
					}
				}
			} else {
				return "Promo code does not exist.";
			}
		} else {
			return "Promo code already attached to cart.";
		}
	}

	public function remove_promo_code() {
		// Create removal in stats helper
	    $site_stats_helper = new SiteStatsHelper();
        if (Auth::guest()) {
            $site_stats_helper->promo_code_add_guest_removal($this->promo_code->id);
        } else {
        	$site_stats_helper->promo_code_add_member_removal($this->promo_code->id);
        }
		
		// Revert back to old total
		$this->cart_total = $this->old_total;

		// Remove promo code
		$this->promo_code = "";

		// Update cart
		$this->save();
	}

	public function checkout($data) {
		// Start by creating a charge
		$stripe = Stripe::make(env('STRIPE_SECRET'));

		try {
			// Create the token
			$token = $stripe->tokens()->create([
				'card' => [
					'number'    => $data["card_number"],
					'exp_month' => $data["ccExpiryMonth"],
					'exp_year'  => $data["ccExpiryYear"],
					'cvc'       => $data["cvvNumber"]
				]
			]);

			if (!isset($token['id'])) {
				\Session::put('error','The Stripe Token was not generated correctly');
				return redirect()->back();
			}

			// Create a customer
			$customer = $stripe->customers()->create([
				"email" => $data["order_email"]
			]);

			// Create a card for customer
			$card = $stripe->cards()->create($customer["id"], $token["id"]);

			// Get total
			$total = $this->get_total();

			$charge = $stripe->charges()->create([
				'customer' => $customer["id"],
				'currency' => 'USD',
				'amount'   => $total,
				'description' => 'Purchase from Law of Ambition E-Commerce Shop'
			]);

			if($charge['status'] == 'succeeded') {
				// Successfully created charge, now, let's create orders for each product
				$products = $this->get_current_products();
				$site_stats_helper = new SiteStatsHelper();

				// Get order group ID
				$order_helper = new OrderHelper();
				$order_group = $order_helper->get_next_order_group();

				foreach ($products as $product) {
					// Create dictionary for OrderHelper
					$order_info = array();
					$order_info["product_id"] = $product["product_id"];
					$order_info["order_ip"] = $_SERVER["REMOTE_ADDR"];
					$order_info["order_selectors"] = $product["selectors"];
					$order_info["order_first_name"] = $data["order_first_name"];
					$order_info["order_last_name"] = $data["order_last_name"];
					$order_info["order_email"] = $data["order_email"];
					$order_info["order_address"] = $data["order_address"];
					$order_info["order_city"] = $data["order_city"];
					$order_info["order_state"] = $data["order_state"];
					$order_info["order_country"] = $data["order_country"];
					$order_info["order_zipcode"] = $data["order_zipcode"];
					$order_info["customer_id"] = $customer["id"];
					$order_info["quantity"] = $product["quantity"];
					$order_info["order_group"] = $order_group;

					// Check to see if promo code attached
					if ($this->does_promo_code_exist_in_cart()) {
						$order_info["promo_code"] = $this->get_promo_code()->code;
						$promo_code_id = $this->get_promo_code()->id;
						$order_info["promo_code_id"] = $promo_code_id;

						// Create usage in stats helper
					    $site_stats_helper = new SiteStatsHelper();
				        if (Auth::guest()) {
				            $site_stats_helper->promo_code_add_guest_usage($promo_code_id);
				        } else {
				        	$site_stats_helper->promo_code_add_member_usage($promo_code_id);
				        }

				        // Calculate revenue lost
				        $cart_total = $this->cart_total;
				        $old_total = $this->old_total;
				        $revenue_lost = doubleval($old_total) - doubleval($cart_total);
				        if (Auth::guest()) {
				            $site_stats_helper->promo_code_add_guest_revenue_lost($promo_code_id, $revenue_lost);
				        } else {
				        	$site_stats_helper->promo_code_add_member_revenue_lost($promo_code_id, $revenue_lost);
				        }
					}

            		$site_stats_helper->product_add_purchased($product["product_id"]);
            		if (Auth::guest()) {
            			$site_stats_helper->product_add_guest_purchase($product["product_id"]);
            		} else {
            			$site_stats_helper->product_add_member_purchase($product["product_id"]);
            		}

					$order_helper = new OrderHelper();
					$order_helper->create_order($order_info);
				}

				// Send thank you email
				$mail_data = array(
					"recipient_email" => $data["order_email"],
					"recipient_first_name" => $data["order_first_name"],
					"recipient_last_name" => $data["order_last_name"],
					"sender_email" => env('MAIL_USERNAME'),
					"sender_first_name" => env('MAIL_FIRST_NAME'),
					"sender_last_name" => env('MAIL_LAST_NAME'),
					"subject" => "Law of Ambition - Order Confirmation"
				);

				$mail_helper = new MailHelper($mail_data);
				$mail_helper->send_thank_you_email();

				return "success";
			} else {
				return "error";
			}
		} catch (Exception $e) {
			return $e->getMessage();
		} catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
			return $e->getMessage();
		} catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
			return $e->getMessage();
		}
	}

	public function get_number_of_items() {
		return $this->get_current_num_items();
	}

	public function get_products_in_cart() {
		return $this->get_current_products();
	}

	public function get_total() {
		return $this->get_current_total();
	}

	public function get_promo_code() {
		return $this->get_current_promo_code();
	}

	public function get_old_total() {
		return $this->get_current_old_total();
	}

	public function does_promo_code_exist_in_cart() {
		if (Session::has('promo_code')) {
			if (Session::get('promo_code') != "") {
				return true;
			} else {
				return false;
			}
		} else {
			if ($this->promo_code != "") {
				return true;
			} else {
				return false;
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

		// Check if promo code attached and delete if total drops below minimum amount
		if ($this->does_cart_already_have_promo_code() == true) {
			// Yes, it does, check to see if still above minimum amount
			$promo_code = $this->promo_code;
			if ($promo_code->code_type == 2) {
				if ($total < $promo_code->minimum_amount) {
					$this->remove_promo_code();
				}
			}
		}

		// Update and save
		$this->cart_total = $total;
		$this->save();
	}

	private function update_total_with_promo_code() {
		// Check if promo code attached
		if ($this->does_cart_already_have_promo_code() == true) {
			// Make new old total
			$this->old_total = $this->cart_total;
			$promo_code = $this->promo_code;
			if ($promo_code->code_type == 1) {
				$percent_off = $promo_code->percent_off;
				$cart_total = $this->cart_total;
				$amount_removed = $cart_total * $percent_off;
				$new_total = $cart_total - $amount_removed;

				// Update variables
				$this->old_total = $cart_total;
				$this->cart_total = $new_total;
				$this->promo_code = $promo_code;

				// Update cart
				$this->save();
			} else {
				$dollars_off = $promo_code->dollars_off;
				$minimum_amount = $promo_code->minimum_amount;
				$cart_total = $this->cart_total;
				if ($cart_total < $minimum_amount) {
					return "Cart total does not meet minimum requirement of $" . $minimum_amount .  " for this promo code.";
				} else {
					// Get new total
					$new_total = $cart_total - $dollars_off;

					// Update variables
					$this->old_total = $cart_total;
					$this->cart_total = $new_total;
					$this->promo_code = $promo_code;

					// Create addition in stats helper
	                $site_stats_helper = new SiteStatsHelper();
	                if (Auth::guest()) {
	                    $site_stats_helper->promo_code_add_guest_addition($promo_code->id);
	                } else {
	                	$site_stats_helper->promo_code_add_member_addition($promo_code->id);
	                }

					// Update cart
					$this->save();
				}
			}
		}
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
		$loop_index = 0;
		foreach ($products as $product) {
			if ($product["product_id"] === $product_id) {
				// Next, check selectors
				$selectors = $product_info["selectors"];
				if ($product["selectors"] === $selectors) {
					// Update quantity
					$products[$loop_index]["quantity"] = strval(intval($product_info["num_items"]) + intval($product["quantity"]));

					// Update subtotal
					$old_subtotal = floatval($product["subtotal"]);
					$product = Product::where('id', $product_info["product_id"])->first();
					$product_price = $product->product_price;
					$addon_subtotal = intval($product_info["num_items"]) * $product_price;
					$new_subtotal = $old_subtotal + $addon_subtotal;
					$products[$loop_index]["subtotal"] = strval($new_subtotal);
				}
			}

			$loop_index++;
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
			if ($product["product_id"] === $product_id) {
				// Next, check selectors
				$selectors = $product_info["selectors"];
				if ($product["selectors"] === $selectors) {
					// Yes, duplicate
					$duplicate_product = true;
				}
			}
		}

		return $duplicate_product;
	}

	private function does_cart_already_have_promo_code() {
		if ($this->promo_code != "") {
			return true;
		} else {
			return false;
		}
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

	private function get_current_promo_code() {
		if (Session::has('promo_code')) {
			$promo_code = Session::get('promo_code');
			return $promo_code;
		} else {
			return "";
		}
	}

	private function get_current_old_total() {
		if (Session::has('old_total')) {
			$old_total = Session::get('old_total');
			return $old_total;
		} else {
			return 0;
		}
	}

	private function save() {
		Session::put('cart_num_items', $this->num_items);
		Session::put('cart_product_array', $this->product_array);
		Session::put('cart_total', $this->cart_total);
		Session::put('old_total', $this->old_total);
		Session::put('promo_code', $this->promo_code);
	}
}

?>