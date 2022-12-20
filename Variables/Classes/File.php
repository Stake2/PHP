<?php 

class File extends Class_ {
	public function __construct() {
		parent::__construct(self::class);
	}

	public static function Sanitize($file) {
		
	}

	public static function Exist($file) {
		
	}

	public static function Create($file) {
		
	}

	public static function Delete($file) {
		
	}

	public static function Copy($file) {
		
	}

	public static function Move($file) {
		
	}

	public static function Edit($file) {
		
	}

	public static function Replace_Text($array) {
		$items = array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF");

		return str_replace($items, "", $array);
	}

	public static function Contents($file) {
		$contents = [
			"lines" => [],
			"string" => "",
			"length" => count(file($file)),
		];

		$read = fopen($file, "r", "UTF-8");

		$contents["lines"] = self::Replace_Text(explode("\n", fread($read, filesize($file))));

		$i = 0;
		foreach ($contents["lines"] as $line) {
			$contents["string"] .= $line;

			if ($i != $contents["length"]) {
				$contents["string"] .= "\n";
			}

			$i++;
		}

		fclose($read);

		return $contents;
	}

	public static function Dictionary($file) {
		$dictionary = [];

		$lines = file($file);

		foreach ($lines as $line) {
			if (strpos($line, ": ") == True) {
				$split = explode(": ", $line);

				$key = $split[0];
				$value = $split[1];

				$dictionary[$key] = $value;
			}
		}

		return $dictionary;
	}
}

?>