<?php 

function format($text, $parameters) {
	$parameters = (array)$parameters;

	$text = preg_replace_callback("#\{\}#",
	function ($parameters_array) {
		static $i = 0;
		return '{'.($i++).'}';
	},
	$text);

	return str_replace(
		array_map(
		function ($key) {
			return '{'.$key.'}';
		},

		array_keys($parameters)),

		array_values($parameters),

		$text
	);
}

function Remove_Text_From_String($item, $text_to_replace = Null) {
	global $line_replace_array;

	if ($text_to_replace == Null) {
		$text_to_replace = $line_replace_array;
	}

	if (is_string($item) or is_array($item)) {
		return str_replace($text_to_replace, "", $item);
	}
}

function Create_File($file) {
	$file = fopen($file, "w");
}

function Open_File($file, $mode = Null) {
	if ($mode == Null) {
		$mode = "r";
	}

	if (file_exists($file) == True) {
		return $file = fopen($file, $mode, 'UTF-8');
	}

	else {
		return null;
	}
}

function Read_Lines($file, $add_none = False) {
	$file_read = Open_File($file);

	if ($file_read != Null) {
		if ($add_none == False) {
			$array = explode("\n", fread($file_read, filesize($file)));
			$array = Remove_Text_From_String($array);
		}

		if ($add_none == True) {
			$array = array("None");

			while(!feof($file_read)) {
				$text_line = fgets($file_read);
				$text_line = Remove_Text_From_String($text_line);

				array_push($array, $text_line);
			}
		}

		return $array;
	}

	else {
		return null;
	}
}

function Read_String($file) {
	$file_read = Open_File($file);

	if ($file_read != Null) {
		$array = explode("\n", fread($file_read, filesize($file)));
		$array = Remove_Text_From_String($array);

		$string = "";

		foreach ($array as $line) {
			if ($line != array_reverse($array)[0]) {
				$string .= $line."<br />"."\n";
			}

			if ($line == array_reverse($array)[0]) {
				$string .= $line;
			}
		}

		return $string;
	}

	else {
		return null;
	}
}

function Language_Item_Definer($english_variable, $portuguese_variable) {
	global $website_language;
	global $en_languages_array;
	global $pt_languages_array;

	if (in_array($website_language, $en_languages_array)) {
		$variable = $english_variable;
	}

	if (in_array($website_language, $pt_languages_array)) {
		$variable = $portuguese_variable;
	}

	return $variable;
}

?>