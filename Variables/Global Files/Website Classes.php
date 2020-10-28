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

class Website_Info extends Website_Info_Abstract_Class {

}

interface Website_Style_Interface {

	public function set_style_file($website_folder);
	public function get_style_file();

}

abstract class Website_Style_Abstract_Class implements Website_Style_Interface {

	private $website_style_file;

	public function get_style_file() {

		return $this -> website_style_file;

	}

	public function set_style_file($website_folder) {

		$this -> website_style_file = $website_folder."Website Style.php";

	}

}

class Website_Style extends Website_Style_Abstract_Class {

	private $website_style_file;

	public function get_style_file() {

		return $this -> website_style_file;

	}

	public function set_style_file($website_folder) {

		$this -> website_style_file = $website_folder."Website Style.php";

	}

}

$website_style = new Website_Style();
$website_style -> set_style_file($sitefolder_desertisland);
$website_style_file = $website_style -> get_style_file();

$website_info = new Website_Info($website_title_html, $website_meta_description, $website_header_description, $website_images_variable);

$website_header_title = $website_info -> get_title();
$website_description = $website_info -> get_description();
$website_header_description = $website_info -> get_header_description();
$website_images = $website_info -> get_images();

?>