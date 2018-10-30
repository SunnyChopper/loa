<?php

namespace App\Custom;

use App\Tool;

use Auth;

class ToolHelper {
	/* Private variables */
	private $tool_id;

	/* Initializers */
	public function __construct($tool_id = 0) {
		$this->tool_id = $tool_id;
	}

	/* Public functions */
	public function create_tool($data) {
		$name = $data["tool_name"];
		$description = $data["tool_description"];
		$affiliate_link = $data["affiliate_link"];
		$price = $data["price"];

		$tool = new Tool;
		$tool->tool_name = $name;
		$tool->tool_description = $description;
		$tool->affiliate_link = $affiliate_link;
		if ($affiliate_link == 1) {
			$tool->affiliate_url = $data["affiliate_url"];
		}
		$tool->price = $price;
		$tool->save();

		$this->tool_id = $tool->save();
	}

	public function get_tools() {
		return Tool::all();
	}

	public function get_affiliate_tools() {
		return Tool::where('affiliate_link', 1)->get();
	}

	public function get_native_tools() {
		return Tool::where('affiliate_link', 0)->get();
	}

	public function update_tool($data) {
		$tool_id = $data["tool_id"];
		$name = $data["tool_name"];
		$description = $data["tool_description"];
		$affiliate_link = $data["affiliate_link"];
		$price = $data["price"];

		$tool = Tool::where('id', $tool_id)->first();
		$tool->tool_name = $name;
		$tool->tool_description = $description;
		$tool->affiliate_link = $affiliate_link;
		if ($affiliate_link == 1) {
			$tool->affiliate_url = $data["affiliate_url"];
		}
		$tool->price = $price;
		$tool->save();
	}

	public function affiliate_click($tool_id) {
		$tool = Tool::where('id', $tool_id)->first();
		$tool->affiliate_clicks = $tool->affiliate_clicks + 1;
		$tool->save();
		return header("Location: " . $tool->affiliate_link);
	}
}

?>