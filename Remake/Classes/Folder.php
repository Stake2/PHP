<?php 

# Folder

class Folder extends Class_ {
	public function __construct() {
		global $folders;

		parent::__construct(self::class);

		$this -> folders = $folders;
	}

	public static function Sanitize($folder) {
		$restricted_characters = ["?", '"', "|", "*", "<", ">"];

		return str_replace($restricted_characters, "", $folder);
	}

	public static function Create($folder) {
		$folder = self::Sanitize($folder);

		if (file_exists($folder) == False) {
			mkdir($folder);
		}
	}
}

?>