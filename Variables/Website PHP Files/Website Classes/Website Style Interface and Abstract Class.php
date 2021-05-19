<?php 

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

?>