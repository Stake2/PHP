<?php 

if (function_exists("Sanitize_Title") == False) {
	function Sanitize_Title($title, $remove_dot = True) {
		global $File;

		if (
			strlen($title) > 1
		) {
			if (
				$title[0].$title[1] == ": " or
				$title[0].$title[1] == ". "
			) {
				$title = substr($title, 2);
			}
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

# If the "Get_URL_Parameters" function is not defined, define it
if (function_exists("Get_URL_Parameters") == False) {
	function Get_URL_Parameters() {
		# Get the query string of the server and explode it by separating the parameters by the "&" character
		$query_string = explode("&", $_SERVER["QUERY_STRING"]);

		# Define the empty parameters array
		$parameters = [];

		# Iterate through the queries inside the query string
		foreach ($query_string as $query) {
			# Explode the query into the key and value
			$key_and_value = explode("=", $query);

			# Get the key
			$key = $key_and_value[0];

			# If there is a value
			if (isset($key_and_value[1])) {
				# Get the value
				$value = $key_and_value[1];

				# Define the key and value inside the parameters dictionary
				$parameters[$key] = $value;
			}
		}

		# Return the parameters dictionary
		return $parameters;	
	}
}

?>