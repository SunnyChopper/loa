<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\ProductHelper;
use App\Custom\UploadHelper;

class ProductsController extends Controller
{
    public function add_product(Request $data) {
        // Initialize product helper
        $product_helper = new ProductHelper();

        // Get next product ID
        $product_id = $product_helper->get_next_product_id();

        // Set the timezone
        date_default_timezone_set('America/Los_Angeles');

        // Get data
        $product_name = $data->product_name;
        $product_price = $data->product_price;
        $product_description = $data->product_description;
        $stock = $data->stock;
        $sku = $data->sku;
        $digital_product = $data->digital_product;
        $digital_product_link = $data->digital_product_link;
        $image = $data->file('featured_image');

        // Get extra images
        if ($data->hasFile('extra_image_1')) {
            $extra_image_1 = $data->file('extra_image_1');
            $has_extra_image_1 = true;
        } else {
            $has_extra_image_1 = false;
        }

        if ($data->hasFile('extra_image_2')) {
            $extra_image_2 = $data->file('extra_image_2');
            $has_extra_image_2 = true;
        } else {
            $has_extra_image_2 = false;
        }

        if ($data->hasFile('extra_image_3')) {
            $extra_image_3 = $data->file('extra_image_3');
            $has_extra_image_3 = true;
        } else {
            $has_extra_image_3 = false;
        }

        // Upload image for featured image URL
        $upload_helper = new UploadHelper();
        $file_name = "featured_image." . $image->getClientOriginalExtension();
        $file_path = "products/" . $product_id . "/" . $file_name;
        $featured_image_url = $upload_helper->upload_image_to_s3($image, $file_path);

        // Upload extra images if uploaded
        $extra_image_links = array();
        if ($has_extra_image_1 == true) {
            $file_name_extra_image_1 = "extra_image_1." . $extra_image_1->getClientOriginalExtension();
            $file_path_extra_image_1 = "products/" . $product_id . "/" . $file_name_extra_image_1;
            $extra_image_1_url = $upload_helper->upload_image_to_s3($extra_image_1, $file_path_extra_image_1);
            array_push($extra_image_links, $extra_image_1_url);
        }

        if ($has_extra_image_2 == true) {
            $file_name_extra_image_2 = "extra_image_2." . $extra_image_2->getClientOriginalExtension();
            $file_path_extra_image_2 = "products/" . $product_id . "/" . $file_name_extra_image_2;
            $extra_image_2_url = $upload_helper->upload_image_to_s3($extra_image_2, $file_path_extra_image_2);
            array_push($extra_image_links, $extra_image_2_url);
        }

        if ($has_extra_image_3 == true) {
            $file_name_extra_image_3 = "extra_image_3." . $extra_image_3->getClientOriginalExtension();
            $file_path_extra_image_3 = "products/" . $product_id . "/" . $file_name_extra_image_3;
            $extra_image_3_url = $upload_helper->upload_image_to_s3($extra_image_3, $file_path_extra_image_3);
            array_push($extra_image_links, $extra_image_3_url);
        }

        // Get selectors
        $return_selectors = array();
        $selector_array = $data->selector_array;
        $selectors = json_decode($selector_array);
        $num_selectors = count($selectors);
        for ($i = 0; $i < $num_selectors; $i++) {
            // Get key and value
            $key_selector = "key_" . strval($selectors[$i]);
            $value_selector = "value_" . strval($selectors[$i]);

            $key = $data->get($key_selector);
            $value = $data->get($value_selector);

            // Get lowercase version
            $lowercase_key = strtolower($key);
            if (array_key_exists($lowercase_key, $return_selectors)) {
                $value_array = $return_selectors[$lowercase_key];
                array_push($value_array, $value); 
                $return_selectors[$lowercase_key] = $value_array;
            } else {
                $value_array = array($value);
                $return_selectors[$lowercase_key] = $value_array;
            }
        }

        // Data for product
        $product_data = array(
            "product_name" => $product_name,
            "product_description" => $product_description,
            "product_price" => $product_price,
            "stock" => $stock,
            "sku" => $sku,
            "featured_image_url" => $featured_image_url,
            "image_links" => json_encode($extra_image_links),
            "selectors" => json_encode($return_selectors),
            "digital_product" => $digital_product,
            "digital_product_link" => $digital_product_link,
            "shipping_options" => "['Free Shipping']"
        );

        // Add the product
        $product_helper->add_product($product_data);

    	// Redirect
    	return redirect(url('/admin/products/view'));
    }

    public function delete(Request $data) {
    	$product_id = $data->product_id;
    	$product_helper = new ProductHelper($product_id);
    	$product_helper->delete_product();
    	return redirect()->back();
    }
}
