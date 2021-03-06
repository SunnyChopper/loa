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
	public function set_product_id($product_id) {
		$this->product_id = $product_id;
	}

	public function get_active_products() {
		return Product::where('is_active', 1)->get();
	}

	public function get_product_by_id() {
		return Product::where('id', $this->product_id)->first();
	}

	public function edit_product($data) {
		// Get product id
		$this->product_id = $data["product_id"];

		// Go through each key and check if available
		if (isset($data["product_name"])) {
			$this->update_name($data["product_name"]);
		}

		if (isset($data["product_price"])) {
			$this->update_price($data["product_price"]);
		}

		if (isset($data["product_description"])) {
			$this->update_description($data["product_description"]);
		}

		if (isset($data["stock"])) {
			$this->update_stock($data["stock"]);
		}

		if (isset($data["sku"])) {
			$this->update_sku($data["sku"]);
		}

		if (isset($data["selectors"])) {
			$this->update_selectors($data["selectors"]);
		}

		if (isset($data["digital_product"])) {
			$this->update_digital_product($data["digital_product"]);
		}

		if (isset($data["digital_product_link"])) {
			$this->update_digital_product_link($data["digital_product_link"]);
		}

		if (isset($data["featured_image_url"])) {
			$this->update_featured_image_url($data["featured_image_url"]);
		}

		if (isset($data["image_links"])) {
			$this->update_image_links($data["image_links"]);
		}
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

	public function update_digital_product($digital_product) {
		if ($this->product_id == 0) {
			return "error";
		} else {
			$product = Product::where('id', $this->product_id)->first();
			$product->digital_product = $digital_product;
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

	public function add_product($data) {
		$product = new Product;
		$product->product_name = $data["product_name"];
		$product->product_description = $data["product_description"];
		$product->product_price = $data["product_price"];
		$product->stock = $data["stock"];
		$product->featured_image_url = $data["featured_image_url"];
		$product->image_links = $data["image_links"];
		$product->sku = $data["sku"];
		$product->selectors = $data["selectors"];
		$product->shipping_options = "['Free Shipping']";
		$product->num_reviews = 0;

		if ($data["digital_product"] == 1) {
			$product->digital_product = 1;
			$product->digital_product_link = $data["digital_product_link"];
		}

		return $product->save();
	}

	public function delete_product() {
		// Get product
		$product = Product::where('id', $this->product_id)->first();

		// Change
		$product->is_active = 0;
		$product->save();
	}

	public function get_next_product_id() {
		// Get count of products
		$product_count = Product::count();
		return $product_count + 1;
	}
}

?>