<?php 

function Create_Database_Table($table_name, $columns_array) {
	global $database_connection;

	$sql = "CREATE TABLE IF NOT EXISTS ".str_replace(" ", "_", $table_name)." (";

	$sql .= "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,";

	foreach ($columns_array as $column) {
		$sql .= $column."\n";

		if ($column != array_reverse($columns_array)[0]) {
			$sql .= ", ";
		}
	}

	$sql .= ")";

	$database_connection -> query($sql);
}

function Insert_Into_Database_Table($table_name, $columns, $values) {
	global $database_connection;

	$sql = "INSERT INTO ".str_replace(" ", "_", $table_name)." (";
	
	foreach ($columns as $column) {
		$sql .= $column;

		if ($column != array_reverse($columns)[0]) {
			$sql .= ", ";
		}
	}

	$sql .= ")";

	$sql .= " VALUES(";

	foreach ($values as $value) {
		$sql .= "'".$value."'";

		if ($value != array_reverse($values)[0]) {
			$sql .= ", ";
		}
	}

	$sql .= ")";

	$database_connection -> query($sql);
}

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

		$text,
	);
}

function Remove_Text_From_String($item, $text_to_replace = Null) {
	global $line_replace_array;
	global $custom_replace_values;

	if ($text_to_replace == Null) {
		$text_to_replace = $line_replace_array;
	}

	$local_text_to_add = "";

	if (isset($custom_replace_values) == True and is_array($text_to_replace) == True) {
		foreach ($text_to_replace as $text) {
			if (isset($custom_replace_values[(string)$text])) {
				$local_text_to_add = $custom_replace_values[(string)$text];
			}
		}
	}

	if (is_string($item) or is_array($item)) {
		return str_replace($text_to_replace, $local_text_to_add, $item);
	}
}

function text_contains($find, $text) {
	return strpos($text, $find);
}

function Create_File($file) {
	if (file_exists($file) == False) {
		$file = fopen($file, "w");
	}
}

function Create_Folder($folder) {
	if (file_exists($folder) == False) {
		mkdir($folder);
	}
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

function Read_Lines($file, $add_none = False, $read_string = False) {
	$file_read = Open_File($file);

	#echo $file."<br />";

	if ($file_read != Null) {
		if ($read_string == False) {
			if ($add_none == False) {
				if (filesize($file) != 0) {
					$array = explode("\n", fread($file_read, filesize($file)));
					$array = Remove_Text_From_String($array);
				}

				else {
					$array = [];
				}
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

		if ($read_string == True) {
			$array = explode("\n", fread($file_read, filesize($file)));
			$array = Remove_Text_From_String($array);

			$string = "";

			foreach ($array as $line) {
				echo $line;
				if ($line != array_reverse($array)[0]) {
					$string .= $line."<br />"."\n";
				}

				if ($line == array_reverse($array)[0]) {
					$string .= $line;
				}
			}

			return $string;
		}
	}

	if ($file_read == Null) {
		return Null;
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

function Language_Item_Definer($english_variable, $portuguese_variable, $custom_language = Null) {
	global $website_language;
	global $en_languages_array;
	global $pt_languages_array;

	if ($custom_language != Null) {
		$website_language = $custom_language;
	}

	if (in_array($website_language, $en_languages_array)) {
		$variable = $english_variable;
	}

	if (in_array($website_language, $pt_languages_array)) {
		$variable = $portuguese_variable;
	}

	return $variable;
}

function Create_Element($element, $class, $text, $custom_parameters = Null) {
	if (is_array($class) == True) {
		$new_class = "";

		foreach ($class as $class_name) {
			$new_class .= $class_name." ";
		}

		$class = $new_class;
	}

	if ($custom_parameters != Null) {
		if (is_array($custom_parameters) == True) {
			$new_custom_parameters = "";

			foreach ($custom_parameters as $custom_parameter) {
				$new_custom_parameters .= $custom_parameter." ";
			}

			$custom_parameters = $new_custom_parameters;
		}
	}

	else {
		$custom_parameters = "";
	}

	$element_prototype = '<{} class="{}" {}>{}</{}>';

	$parameters = array(
	$element,
	$class,
	$custom_parameters,
	$text,
	$element,
	);

	return format($element_prototype, $parameters);
}

function Add_Years_To_Array($array, $mode = "push", $custom_value = Null, $custom_value_read = Null, $less_one = True) {
	global $current_year;
	global $php_settings;

	$current_variable_year = 2018;

	$local_current_year = $current_year;

	if ($php_settings["allow_current_year"] == True) {
		$local_current_year = $local_current_year;
	}

	elseif ($less_one == True) {
		$local_current_year = $local_current_year - 1;
	}

	$year_number = 0;
	while ($current_variable_year <= $local_current_year) {
		$value = (string)$current_variable_year;

		if ($custom_value != Null) {
			$value = format($custom_value, $value);
		}

		if ($custom_value_read != Null) {
			$value = $custom_value_read;
		}

		if ($mode == "push") {
			array_push($array, $value);
		}

		if ($mode == "dict") {
			$array[(string)$current_variable_year] = $value;
		}

		$current_variable_year++;
		$year_number++;
	}

	return $array;
}

function Make_Setting_Dictionary($text_array, $setting_splitter = Null) {
	if ($setting_splitter == Null) {
		$setting_splitter = ": ";
	}

	$settings_dictionary = array();

	foreach ($text_array as $setting) {
		$split = explode($setting_splitter, $setting);
		$setting = $split[0];
		$value = $split[1];

		$settings_dictionary[$setting] = $value;
	}

	return $settings_dictionary;
}

function Remove_Non_File_Characters($file, $text_to_add = array()) {
	$replace_list = [
	":",
	"?",
	"\"",
	"\\",
	"|",
	"*",
	"<",
	">",
	];

	foreach ($text_to_add as $text) {
		array_push($replace_list, $text);
	}

	foreach ($replace_list as $text) {
		if (strpos($file, $text) == True) {
			$file = str_replace($text, "", $file);
		}
	}

	return $file;
}

function Replace_Text($text, $to_replace, $to_add = "") {
	return str_replace($to_replace, $to_add, $text);
}

function Make_Website_Button($link, $name, $classes, $add_to_button_name = Null, $add_to_button_title = Null, $new_tab = True) {
	global $roundedborderstyle;
	global $h2_element;

	$onclick = "onclick=\"window.open('".$link."');\"";

	if ($new_tab == False) {
		$onclick = "onclick=\"function() {return false;}\"";
	}

	$website_button = "<button class=\"w3-btn ".$classes."\" title=\"".$name.$add_to_button_title."\" ".$roundedborderstyle." ".$onclick."><".$h2_element.">".$name.$add_to_button_name."</".$h2_element."></button>";

	return $website_button;
}

?>