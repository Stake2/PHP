<?php 

class Website_Style extends Website_Style_Abstract_Class {

	private $website_style_file;

	public function get_style_file() {

		return $this -> website_style_file;

	}

	public function set_style_file($website_folder) {

		$this -> website_style_file = $website_folder."Style.php";

	}

}

?>