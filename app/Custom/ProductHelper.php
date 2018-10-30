<?php

namespace App\Custom;

use App\Product;

use Auth;

class ProductHelper {
	/* Private global variables */
	private $product_id;

	/* Initializer */
	public function __construct($product_id = 0) {
		$this->product_id = $product_id;
	}

	/* Public functions */
	public function load_active_products() {
		return Product::where('is_active', 1)->get();
	}

	public function load_product_by_id() {
		return Product::where('id', $this->product_id)->get();
	}

	public function update_name($product_name) {
		if ($this->product_id == 0) {
			return "error";
		} else {
			$product = Product::where('id', $this->product_id)->first();
			$product->product_name = $product_name;
			$product->save();

			return "success";
		}
	}

	public function update_description($product_description) {
		if ($this->product_id == 0) {
			return "error";
		} else {
			$product = Product::where('id', $this->product_id)->first();
			$product->product_description = $product_description;
			$product->save();

			return "success";
		}
	}

	public function update_price($product_price) {
		if ($this->product_id == 0) {
			return "error";
		} else {
			$product = Product::where('id', $this->product_id)->first();
			$product->product_price = $product_price;
			$product->save();

			return "success";
		}
	}

	public function update_stock($stock) {
		if ($this->product_id == 0) {
			return "error";
		} else {
			$product = Product::where('id', $this->product_id)->first();
			$product->stock = $stock;
			$product->save();

			return "success";
		}
	}

	public function update_featured_image_url($featured_image_url) {
		if ($this->product_id == 0) {
			return "error";
		} else {
			$product = Product::where('id', $this->product_id)->first();
			$product->featured_image_url = $featured_image_url;
			$product->save();

			return "success";
		}
	}

	public function update_image_links($image_links) {
		if ($this->product_id == 0) {
			return "error";
		} else {
			$product = Product::where('id', $this->product_id)->first();
			$product->image_links = $image_links;
			$product->save();

			return "success";
		}
	}

	public function update_sku($sku) {
		if ($this->product_id == 0) {
			return "error";
		} else {
			$product = Product::where('id', $this->product_id)->first();
			$product->sku = $sku;
			$product->save();

			return "success";
		}
	}

	public function update_selectors($selectors) {
		if ($this->product_id == 0) {
			return "error";
		} else {
			$product = Product::where('id', $this->product_id)->first();
			$product->selectors = $selectors;
			$product->save();

			return "success";
		}
	}

	public function update_digital_product_link($digital_product_link) {
		if ($this->product_id == 0) {
			return "error";
		} else {
			$product = Product::where('id', $this->product_id)->first();
			$product->digital_product_link = $digital_product_link;
			$product->save();

			return "success";
		}
	}

	public function add_review($rating) {
		if ($this->product_id == 0) {
			return "error";
		} else {
			$product = Product::where('id', $this->product_id)->first();
			$avg_rating = $product->avg_rating;
			if ($avg_rating == -1) {
				$avg_rating = $rating;
				$product->avg_rating = $avg_rating;
			} else {
				$product->avg_rating = ($avg_rating + $rating) / 2;
			}

			$product->num_reviews = $product->num_reviews + 1;
			$product->save();

			return "success";
		}
	}

	public function add_product(Request $data) {
		$product = new Product;
		$product->product_name = $data->product_name;
		$product->product_description = $data->product_description;
		$product->product_price = $data->product_price;
		$product->stock = $data->stock;
		$product->featured_image_url = $data->featured_image_url;
		$product->image_links = $data->image_links;
		$product->sku = $data->sku;
		$product->selectors = $data->selectors;
		$product->shipping_options = "['Free Shipping']";
		
		if ($data->digital_product == 1) {
			$product->digital_product = 1;
			$product->digital_product_link = $data->digital_product_link;
		}

		return $product->save();
	}

}

?>