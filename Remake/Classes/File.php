<?php 

class File extends Class_ {
	public function __construct() {
		parent::__construct(self::class);
	}

	public static function Sanitize($file) {
		$restricted_characters = [":", "?", '"', "|", "*", "<", ">"];

		return str_replace($restricted_characters, "", $file);
	}

	public static function Exist($file) {
		
	}

	public static function Create($file) {
		
	}

	public static function Delete($file) {
		unlink($file);
	}

	public static function Copy($file) {
		
	}

	public static function Move($file) {
		
	}

	public static function Edit($file, $text, $mode, $json = False) {
		if (strpos($file, ".json") == True and is_string($text) == False) {
			$text = self::To_JSON($text);
		}

		$file = fopen($file, $mode);
		fwrite($file, $text);
		fclose($file);
	}

	public static function Replace_Text($array) {
		$items = array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF");

		return str_replace($items, "", $array);
	}

	public static function Contents($file, $add_br = True) {
		$contents = [
			"lines" => [],
			"string" => "",
			"length" => count(file($file)),
		];

		$read = fopen($file, "r", "UTF-8");

		if (count(file($file)) != 0) {
			$contents["lines"] = self::Replace_Text(explode("\n", fread($read, filesize($file))));
		}

		$i = 0;
		foreach ($contents["lines"] as $line) {
			$contents["string"] .= $line;

			if ($i != $contents["length"] - 1) {
				if ($add_br == True) {
					$contents["string"] .= "<br />";
				}

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

	public static function JSON($file) {
		$contents = json_decode(file_get_contents($file), True);

		return $contents;
	}

	public static function To_JSON($json) {
		return json_encode($json, JSON_PRETTY_PRINT);
	}
}

?>