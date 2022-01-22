<?php 

interface Website_Info_Interface {
	public function get_header_title():string;
	public function set_header_title($website_title);

	public function get_description():string;
	public function set_description($website_description);

	public function get_header_description():string;
	public function set_header_description($website_header_description);

	public function get_images():string;
	public function set_images($website_images);

	public function get_website_info_dict();

	public function __construct($website_title, $website_description, $website_header_description, $website_images);
}

abstract class Website_Info_Abstract_Class implements Website_Info_Interface {
	public $website_title;
	public $website_description;
	public $website_header_description;
	public $website_images;

	public function get_header_title():string {
		return $this -> website_title;
	}

	public function set_header_title($website_title) {
		$this -> website_title = $website_title;
	}

	public function get_description():string {
		return $this -> website_description;
	}

	public function set_description($website_description) {
		$this -> website_description = $website_description;
	}

	public function get_header_description():string {
		return $this -> website_header_description;
	}

	public function set_header_description($website_header_description) {
		$this -> website_header_description = $website_header_description;
	}

	public function get_images():string {
		return $this -> website_images;
	}

	public function set_images($website_images) {
		$this -> website_images = $website_images;
	}

	public function get_website_info_dict() {
		return array(
			"title" => $this -> get_header_title(),
			"meta_description" => $this -> get_description(),
			"header_description" => $this -> get_header_description(),
			"images" => $this -> get_images(),
		);
	}

	public function __construct($website_title, $website_description, $website_header_description, $website_images) {
		$this -> website_title = $website_title;
		$this -> website_description = $website_description;
		$this -> website_header_description = $website_header_description;
		$this -> website_images = $website_images;
	}
}

?>