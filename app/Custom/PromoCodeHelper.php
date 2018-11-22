<?php

namespace App\Custom;

use App\PromoCode;

use App\Custom\SiteStatsHelper;

use Auth;

class PromoCodeHelper {
	/* Private variables */
	private $id;

	/* Initializers */
	public function __construct($id = 0) {
		$this->id = $id;
	}

	/* Public functions */
	public function create_promo_code($data) {
		// Get basic data
		$code = $data["code"];
		$code_type = $data["code_type"];

		// Create promo code
		$promo_code = new PromoCode;
		$promo_code->code = strtoupper($code);
		$promo_code->code_type = $code_type;

		if ($code_type == 1) {
			$percent_off = $data["percent_off"];
			$promo_code->percent_off = $percent_off;
		} else {
			$dollars_off = $data["dollars_off"];
			$minimum_amount = $data["minimum_amount"];
			$promo_code->dollars_off = $dollars_off;
			$promo_code->minimum_amount = $minimum_amount;
		}

		$promo_code->save();

		$this->id = $promo_code->id;

		// Create a promo code stats object
        $site_stats_helper = new SiteStatsHelper();
        $stats_data = array(
            "promo_code_id" => $this->id,
            "promo_code" => strtoupper($code)
        );
        $site_stats_helper->new_promo_code($stats_data);

		return $this->id;
	}

	public function update_promo_code($data) {
		// Get basic data
		$id = $data["id"];
		$code = $data["code"];
		$code_type = $data["code_type"];

		// Get promo code
		$promo_code = PromoCode::where('id', $id)->first();
		$promo_code->code = strtoupper($code);
		$promo_code->code_type = $code_type;

		if ($code_type == 1) {
			$percent_off = $data["percent_off"];
			$promo_code->percent_off = $percent_off;
		} else {
			$dollars_off = $data["dollars_off"];
			$minimum_amount = $data["minimum_amount"];
			$promo_code->dollars_off = $dollars_off;
			$promo_code->minimum_amount = $minimum_amount;
		}

		$promo_code->save();

		$this->id = $promo_code->id;

		// Update a promo code stats object
		$site_stats_helper = new SiteStatsHelper();
		$data = array( "promo_code" => strtoupper($code) );
		$site_stats_helper->update_promo_code($data);

		return $this->id;
	}

	public function delete_promo_code($promo_code_id) {
		$promo_code = PromoCode::where('id', $promo_code_id)->first();
		$promo_code->is_active = 0;
		$promo_code->save();
	}

	public function get_promo_code($promo_code) {
		return PromoCode::where('code', $promo_code)->first();
	}

	public function get_promo_code_by_id($promo_code_id = 0) {
		if ($promo_code_id == 0) {
			$promo_code_id = $this->id;
		}

		return PromoCode::where('id', $promo_code_id)->first();
	}

	public function does_promo_code_exist($promo_code) {
		if (PromoCode::where('code', $promo_code)->count() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function get_all_active_promo_codes() {
		return PromoCode::where('is_active', 1)->get();
	}
}

?>