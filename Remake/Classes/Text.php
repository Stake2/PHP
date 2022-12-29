<?php 

# Text

class Text extends Class_ {
	public function __construct() {
		global $folders;

		parent::__construct(self::class);

		$this -> folders = $folders;
	}

	public static function Show_Variable($variable, $return = False) {
		$variable = var_export($variable, True);

		$variable = str_replace("'", '"', $variable);
		$variable = str_replace("  ", '	', $variable);
		$variable = str_replace("=> \n\t", '=> ', $variable);
		$variable = str_replace(" 	array", ' array', $variable);
		$variable = preg_replace("/[ 	]+array/i", " array", $variable);

		$variable = htmlspecialchars($variable);
		$variable = str_replace("&quot;", '"', $variable);

		$variable = '<pre style="background-color: white;font-family: Verdana, sans-serif;font-size: 15px;line-height: 1.5;">'."\n".
		$variable.";"."\n".
		"</pre>";

		if ($return == False) {
			echo $variable;
		}

		else {
			return $variable;
		}
	}

	public static function Insert_Variables($text) {
		global $website;

		$i = 0;
		foreach ($text as $line) {
			$line_backup = $line;

			$words = explode(" ", $line);
			$variable_matches = [];

			$w = 0;
			foreach ($words as $word) {
				preg_match('/{\$.*\}/', $word, $matches);

				if ($matches != []) {
					$variable = str_replace(["{", "}"], "", $matches[0]);

					ob_start();
					eval("echo $variable;");
					$variable = ob_get_clean();

					$variable_matches[$matches[0]] = $variable;
				}

				$w++;
			}

			foreach (array_keys($variable_matches) as $match) {
				$variable = $variable_matches[$match];

				$line = str_replace($match, $variable, $line);
			}

			if (in_array(substr($line, -1), [":", ".", ";"]) == False and $line != "" and $variable_matches == []) {
				$line .= ".";
			}

			$text[$i] = $line;

			$i++;
		}

		return self::From_Array($text, "", False, "", "", True, True);
	}

	public static function From_Array($array, $format = "", $enumerate = False, $number_class = "", $class = "", $add_br = True, $add_n = True) {
		$string = "";

		$i = 1;
		foreach ($array as $item) {
			if ($format != "") {
				$items = [];

				$number = substr_count($format, "{}");
				$c = 0;
				while ($c <= $number) {
					array_push($items, $item);

					$c++;
				}

				$item = self::Format($format, $items);
			}

			if ($enumerate == True) {
				$text = $i." - ";

				if ($number_class != "") {
					$text = HTML::Element("span", $text, "", $number_class);
				}

				$string .= $text;
			}

			if ($class != "") {
				$item = HTML::Element("span", $item, "", $class);
			}

			$string .= $item;

			if ($item != array_reverse($array)[0]) {
				if ($add_br == True) {
					$string .= "<br />";
				}

				if ($add_n == True) {
					$string .= "\n";
				}
			}

			$i++;
		}

		return $string;
	}

	public static function Format($text, $parameters) {
		$parameters = (array)$parameters;

		$text = preg_replace_callback("#\{\}#",
			function ($parameters) {
				static $i = 0;
				return '{'.($i++).'}';
			},
			$text
		);

		return str_replace(
			array_map(
				function ($key) {
					return '{'.$key.'}';
				},

				array_keys($parameters)
			),

			array_values($parameters),

			$text,
		);
	}

	public static function Add_Leading_Zeroes($number) {
		if ($number <= 9) {
			return "0".(string)$number;
		}

		if ($number > 9) {
			return $number;
		}
	}

	public static function Remove_Leading_Zeros($number) {
		if ($number <= 9) {
			return str_replace("0", "", (string)$number);
		}

		else {
			return $number;
		}
	}

	public static function Chapter_Cover_Folder($number) {
		if ($number <= 10) {
			$folder = "1 - 10";
		}

		if ($number >= 11 and $number <= 20) {
			$folder = "11 - 20";
		}

		if ($number >= 21 and $number <= 30) {
			$folder = "21 - 30";
		}

		if ($number >= 31 and $number <= 40) {
			$folder = "31 - 40";
		}

		if ($number >= 41 and $number <= 50) {
			$folder = "41 - 50";
		}

		return $folder;
	}
}

?>