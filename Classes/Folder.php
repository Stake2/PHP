<?php 

# Folder.php

class Folder extends Class_ {
	public function __construct() {
		global $folders;

		parent::__construct(self::class);

		$this -> folders = $folders;
	}

	public function Sanitize($folder) {
		$restricted_characters = ["?", '"', "|", "*", "<", ">"];

		return str_replace($restricted_characters, "", $folder);
	}

	public function Exist($folder) {
		if (file_exists($folder) == True) {
			return True;
		}

		else {
			return False;
		}
	}

	public function Create($folder) {
		$folder = $this -> Sanitize($folder);

		if ($this -> Exist($folder) == False) {
			mkdir($folder);
		}
	}
}

?>