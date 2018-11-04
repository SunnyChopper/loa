<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\ProductHelper;

class ProductsController extends Controller
{
    public function add_product(Request $data) {
    	$product_helper = new ProductHelper();
    	$product_helper->add_product($data);

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
