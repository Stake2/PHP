<?php 

interface Website_Info_Interface {

	public function get_title():string;
	public function set_title($website_title);

	public function get_description():string;
	public function set_description($website_description);

	public function get_header_description():string;
	public function set_header_description($website_header_description);

	public function get_images():string;
	public function set_images($website_images);

	public function __construct($website_title, $website_description, $website_header_description, $website_images);

	public function show_website_info();

}

abstract class Website_Info_Abstract_Class implements Website_Info_Interface {

	private $website_title;
	private $website_description;
	private $website_header_description;
	private $website_images;

	public function get_title():string {

		return $this -> website_title;

	}

	public function set_title($website_title) {

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

	public function __construct($website_title, $website_description, $website_header_description, $website_images) {

		$this -> website_title = $website_title;
		$this -> website_description = $website_description;
		$this -> website_header_description = $website_header_description;
		$this -> website_images = $website_images;

	}

	public function show_website_info() {

		return array(
			"website_title" => $this -> get_title(),
			"website_description" => $this -> get_description(),
			"website_header_description" => $this -> get_header_description(),
			"website_images" => $this -> get_images(),
		);

	}

}

?>