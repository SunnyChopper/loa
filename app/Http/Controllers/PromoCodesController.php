<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\PromoCodeHelper;
use App\Custom\SiteStatsHelper;

class PromoCodesController extends Controller
{
    public function create(Request $data) {
    	// Get data
    	$code = $data->code;
    	$code_type = $data->code_type;

    	// Data for promo codes helper
    	$promo_code_data = array(
    		"code" => $code,
    		"code_type" => $code_type
    	);

    	if ($code_type == 1) {
    		$percent_off = $data->percent_off;
    		$percent_off = intval($percent_off) / 100;
    		$promo_code_data["percent_off"] = $percent_off;
    	} else {
    		$dollars_off = $data->dollars_off;
    		$minimum_amount = $data->minimum_amount;
    		$promo_code_data["dollars_off"] = $dollars_off;
    		$promo_code_data["minimum_amount"] = $minimum_amount;
    	}

    	// Promo code helper
    	$promo_code_helper = new PromoCodeHelper();
    	$promo_code_id = $promo_code_helper->create_promo_code($promo_code_data);

    	return redirect(url('/admin/promo/view'));
    }

    public function update(Request $data) {
    	// Get data
    	$promo_code_id = $data->promo_code_id;
    	$code = $data->code;
    	$code_type = $data->code_type;

    	// Data for promo codes helper
    	$promo_code_data = array(
    		"id" => $promo_code_id,
    		"code" => $code,
    		"code_type" => $code_type
    	);

    	if ($code_type == 1) {
    		$percent_off = $data->percent_off;
    		$percent_off = intval($percent_off) / 100;
    		$promo_code_data["percent_off"] = $percent_off;
    	} else {
    		$dollars_off = $data->dollars_off;
    		$minimum_amount = $data->minimum_amount;
    		$promo_code_data["dollars_off"] = $dollars_off;
    		$promo_code_data["minimum_amount"] = $minimum_amount;
    	}

    	// Promo code helper
    	$promo_code_helper = new PromoCodeHelper();
    	$promo_code_helper->update_promo_code($promo_code_data);

    	return redirect(url('/admin/promo/view'));
    }

    public function delete(Request $data) {
    	$promo_code_helper = new PromoCodeHelper();
    	$promo_code_helper->delete_promo_code($data->promo_code_id);
    	return redirect(url('/admin/promo/view'));
    }
}
