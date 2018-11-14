<?php

namespace App\Custom;

use App\Finance;

use Auth;

class FinanceHelper {
	/* Private variables */
	private $id;

	/* Initializers */
	public function __construct($id = 0) {
		$this->id = $id;
	}

	/* Public functions */
	public function create_transaction($data) {
		$title = $data["title"];
		$description = $data["description"];
		$amount = $data["amount"];
		$stripe_fees = $data["stripe_fees"];
		$taxes = $data["taxes"];

		$finance = new Finance;
		$finance->title = $title;
		$finance->description = $description;
		$finance->amount = $amount;
		$finance->stripe_fees = $stripe_fees;
		$finance->taxes = $taxes;
		$finance->save();

		$this->id = $finance->id;
	}

	public function update_transaction($data) {
		$id = $data["id"];
		$title = $data["title"];
		$description = $data["description"];
		$amount = $data["amount"];
		$stripe_fees = $data["stripe_fees"];
		$taxes = $data["taxes"];

		$finance = Event::where('id', $id)->first();
		$finance->title = $title;
		$finance->description = $description;
		$finance->amount = $amount;
		$finance->stripe_fees = $stripe_fees;
		$finance->taxes = $taxes;
		$finance->save();
	}
}

?>