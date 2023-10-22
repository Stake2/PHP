<?php 

# JSON.php

class JSON extends Class_ {
	public function __construct() {
		parent::__construct(self::class);
	}

	public function Sanitize($file) {
		$restricted_characters = [":", "?", '"', "|", "*", "<", ">"];

		return str_replace($restricted_characters, "", $file);
	}

	public function Verbose($text, $item, $verbose = Null) {
		if ($this -> switches["verbose"] == True and $verbose == Null or $verbose == True) {
			$string = "\n"."<br />"."\n".
			$text."<br />"."\n".
			$item."\n";

			#echo $string;
		}
	}

	public function Exist($file) {
		if (file_exists($file) == True) {
			return True;
		}

		else {
			return False;
		}
	}

	public function Edit($file, $text, $mode = "w") {
		$text = $this -> From_PHP($text);

		$file = fopen($file, $mode);

		if ($this -> switches["testing"] == False) {
			fwrite($file, $text);
		}

		fclose($file);
	}

	public function To_PHP($file) {
		$json = [];

		if ($this -> Exist($file) == True) {
			$json = json_decode(file_get_contents($file), True);
		}

		return $json;
	}

	public function From_PHP($json) {
		return json_encode($json, JSON_PRETTY_PRINT);
	}
}

?>