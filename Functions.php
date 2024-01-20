<?php 

if (function_exists("Sanitize_Title") == False) {
	function Sanitize_Title($title, $remove_dot = True) {
		global $File;

		if (strlen($title) > 1 and $title[0].$title[1] == ": ") {
			$title = substr($title, 2);
		}

		if (str_contains($title, ". ")) {
			$title = str_replace(". ", " ", $title);
		}

		if (
			$remove_dot == True and
			str_contains($title, ".")
		) {
			$title = str_replace(".", "", $title);
		}

		$title = $File -> Sanitize($title);

		return $title;
	}
}

if (function_exists("Define_Title") == False) {
	function Define_Title($array) {
		global $Language;
		global $language;

		$key = "Original";

		if (array_key_exists($language, $array) == True) {
			$key = $language;
		}

		elseif (array_key_exists("Romanized", $array) == True) {
			$key = "Romanized";
		}

		return $array[$key];
	}
}

if (function_exists("Get_URL_Parameters") == False) {
	function Get_URL_Parameters() {
		$query_string = explode("&", $_SERVER["QUERY_STRING"]);

		$parameters = array();

		foreach ($query_string as $query) {
			$explode = explode("=", $query);

			$key = $explode[0];

			if (isset($explode[1])) {
				$value = $explode[1];

				$parameters[$key] = $value;
			}
		}

		return $parameters;	
	}
}

?>