<?php 

interface Website_Info_Interface {

	public function getTitle():string;
	public function setTitle($website_title);

	public function getDescription():string;
	public function setDescription($website_description);

	public function getHeaderDescription():string;
	public function setHeaderDescription($website_header_description);

	public function getImages():string;
	public function setImages($website_images);

	public function __construct($a, $b, $c, $d);

	public function showWebsiteInfo();

}

abstract class Website_Info extends Website_Info_Interface {

	private $website_title;
	private $website_description;
	private $website_header_description;
	private $website_images;

	public function getTitle():string {

		return $this -> website_title;

	}

	public function setTitle($website_title) {

		$this -> website_title = $website_title;

	}

	public function getDescription():string {

		return $this -> website_description;

	}

	public function setDescription($website_description) {

		$this -> website_description = $website_description;

	}

	public function getHeaderDescription():string {

		return $this -> website_header_description;

	}

	public function setHeaderDescription($website_header_description) {

		$this -> website_header_description = $website_header_description;

	}

	public function getImages():string {

		return $this -> website_images;

	}

	public function setImages($website_images) {

		$this -> website_images = $website_images;

	}

	public function __construct($a, $b, $c, $d) {

		$this -> website_title = $a;
		$this -> website_description = $b;
		$this -> website_header_description = $c;
		$this -> website_images = $d;

	}

	public function showWebsiteInfo() {

		return array(
			"website_title" => $this -> getTitle(),
			"website_description" => $this -> getDescription(),
			"website_header_description" => $this -> getHeaderDescription(),
			"website_images" => $this -> getImages(),
		);

	}

}

class WebsiteInfo {

	private $website_title;
	private $website_description;
	private $website_header_description;
	private $website_images;

	public function getTitle():string {

		return $this -> website_title;

	}

	public function setTitle($website_title) {

		$this -> website_title = $website_title;

	}

	public function getDescription():string {

		return $this -> website_description;

	}

	public function setDescription($website_description) {

		$this -> website_description = $website_description;

	}

	public function getHeaderDescription():string {

		return $this -> website_header_description;

	}

	public function setHeaderDescription($website_header_description) {

		$this -> website_header_description = $website_header_description;

	}

	public function getImages():string {

		return $this -> website_images;

	}

	public function setImages($website_images) {

		$this -> website_images = $website_images;

	}

	public function __construct($a, $b, $c, $d) {

		$this -> website_title = $a;
		$this -> website_description = $b;
		$this -> website_header_description = $c;
		$this -> website_images = $d;

	}

	public function showWebsiteInfo() {

		return array(
			"website_title" => $this -> getTitle(),
			"website_description" => $this -> getDescription(),
			"website_header_description" => $this -> getHeaderDescription(),
			"website_images" => $this -> getImages(),
		);

	}

}

$website_info = new WebsiteInfo($sitetitulo2, $sitedesc, $sitedesc2, $imagens);

$website_title = $website_info -> getTitle();
$website_description = $website_info -> getDescription();
$website_header_description = $website_info -> getHeaderDescription();
$website_images = $website_info -> getImages();

?>