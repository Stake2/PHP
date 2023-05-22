<?php 

# Global_Switches.php

class Global_Switches {
	public function __construct() {
		global $folders;

		# Global Switches dictionary
		$this -> switches = self::JSON($folders["mega"]["php"]["classes"]["text_files"]["switches"]);
	}

	public static function JSON($file) {
		$contents = json_decode(file_get_contents($file), True);

		return $contents;
	}
}

?>