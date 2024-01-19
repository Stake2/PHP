<?php 

# Text.php

class Text extends Class_ {
	public function __construct() {
		parent::__construct(self::class);
	}

	public static function Show_Variable($variable, $return = False, $style = []) {
		# Define the style dictionary
		$dictionary = [
			"text_color" => "grey",
			"background_color" => "black",
			"rest" => 'line-height: 1.5;'
		];

		if ($style != []) {
			foreach ($style as $key) {
				$dictionary[$key] = $style[$key];
			}
		}

		# Define colors
		$dictionary["full"] = "color: ".$dictionary["text_color"].";";
		$dictionary["full"] .= "background-color: ".$dictionary["background_color"].";";

		# Add the rest
		$dictionary["full"] .= $dictionary["rest"];

		$style = $dictionary;

		$variable = var_export($variable, True);

		$variable = str_replace("'", '"', $variable);
		$variable = str_replace("  ", '	', $variable);
		$variable = str_replace("=> \n\t", '=> ', $variable);
		$variable = str_replace(" 	array", ' array', $variable);
		$variable = preg_replace("/[ 	]+array/i", " array", $variable);

		$variable = htmlspecialchars($variable);
		$variable = str_replace("&quot;", '"', $variable);

		$variable = '<pre style="'.$style["full"].'">'."\n".
		"<h2>"."\n".
		$variable.";"."\n".
		"</h2>"."\n".
		"</pre>";

		if ($return == False) {
			echo $variable;
		}

		else {
			return $variable;
		}
	}

	public function Insert_Variable($line) {
		global $website;

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

		if (
			in_array(substr($line, -1), [":", ".", ";"]) == False and
			$line != "" and
			$variable_matches == []
		) {
			$line .= ".";
		}

		return $line;
	}

	public static function Insert_Variables($text) {
		global $website;

		$i = 0;
		foreach ($text as $line) {
			$line_backup = $line;

			$line = self::Insert_Variable($line);

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

			if ($item != end($array)) {
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

    public function By_Number($number, $singular, $plural) {
        if (is_array($number)) {
            $number = count($number);
        }

        if ((int)$number <= 1) {
            $text = $singular;
        }

        if ((int)$number >= 2) {
            $text = $plural;
        }

        return $text;
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