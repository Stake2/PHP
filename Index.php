<?php

$line_replace_array = array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF");

# Get the localhost link
if (isset($host_text) == False) {
	$host_text = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$return = False;
}

if (isset($host_text) == True) {
	$return = False;
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

function Show_Text($file) {
	global $variable_inserter_array;

	$file_read = Open_File($file);

	while(!feof($file_read)) {
		$text_line = fgets($file_read);
		$text_line = Remove_Text_From_String($text_line);
		$text_line = Variable_Inserter($variable_inserter_array, $text_line);

		echo $text_line."\n".'<br />';
	}
}

function Line_Number($file) {
	$file = Open_File($file);

	$line_number = 0;
	while (!feof($file)) {
		$line = fgets($file);
		$line_number++;
	}

	return $line_number;
}

function Word_Number($file) {
	$file_read = Open_File($file);

	$lines = Read_Lines($file);
	$lines_text = "";

	foreach ($lines as $line) {
		$lines_text .= $line;
	}

	$words = number_format(str_word_count($lines_text));

	return $words;
}

$current_year = strftime("%Y");

# Website variables
$main_website_url = 'https://thestake2.netlify.app/';
$hard_drive_letter = "C";
$mega_folder = $hard_drive_letter.':/Mega/';
$medias_local_folder = $hard_drive_letter.':/Midias/';

if (!file_exists($mega_folder)) {
	$hard_drive_letter = "D";
	$mega_folder = $hard_drive_letter.':/Mega/';
	$medias_local_folder = $hard_drive_letter.':/Midias/';
}

$mega_folder_stake2_website = $mega_folder.'Stake2 Website/';
$main_php_folder = $mega_folder.'PHP/';

$tabs_folder_variable = 'Tabs';
$variables_folder_variable = 'Variables';
$years_folder_variable = 'Years';
$global_variable = 'Global';
$generic_variable = 'Generic';

$php_folder_tabs = $main_php_folder.$tabs_folder_variable.'/';
$php_folder_variables = $main_php_folder.$variables_folder_variable.'/';
$generic_tabs_folder = $main_php_folder.$tabs_folder_variable.'/'.$generic_variable.$tabs_folder_variable.'/';
$global_tabs_folder = $main_php_folder.$tabs_folder_variable.'/'.$global_variable.$tabs_folder_variable.'/';

$php_tabs = $php_folder_tabs;

$php_variables = $php_folder_variables;
$php_vars = $php_folder_variables;

$php_variables_global_files = $php_folder_variables.$global_variable.' Files/';
$php_variables_website_classes = $php_variables_global_files.'Website Classes/';
$php_variables_text_file_reader_modules = $php_variables_global_files.'Text File Reader Modules/';
$php_vars_global_files = $php_variables_global_files;
$php_variables_website_classes = $php_variables_global_files.'Website Classes/';
$website_classes_folder = $php_variables_website_classes;
$php_vars_website_classes = $php_variables_website_classes;
$variable_inserter_php = $php_vars_global_files."Variable Inserter.php";

$php_global_tabs = $global_tabs_folder;

$main_arrays_php = $php_vars_global_files.'Main Arrays.php';
$global_arrays_php = $php_vars_global_files.'Global Arrays.php';
$website_language_definer_php = $php_vars_global_files.'Website Language Definer.php';
$website_arrays_generator_php = $php_vars_global_files.'Websites Array Generator.php';
$default_setting_values_php = $php_vars_global_files.'Default Setting Values.php';
$vglobal_php = $php_variables.'VGlobal.php';
$other_index_stuff_php = $php_vars_global_files.'Other Index Stuff.php';

$website_selector_file = $php_variables.'Website Selector.php';
$website_style_chooser_file = $php_vars_global_files.'Website Style Chooser.php';
$website_style_variables_foreach = $php_vars_global_files.'Website Style Variables Foreach.php';
$generic_tabs_generator_file = $php_vars_global_files.'GenericCities Generator.php';
$setting_parameters_file = $php_vars_global_files.'Settings Params.php';

# Main Arrays PHP file loader
require $main_arrays_php;

# Global Arrays PHP file loader
require $global_arrays_php;

# Websites Array Generator PHP file loader
require $website_arrays_generator_php;

$year_arrays_php = $website_folder_years.'Year Arrays.php';

# Year Arrays PHP file loader
require $year_arrays_php;

# Default Setting Values file includer
require $default_setting_values_php;

# Website Language Definer file includer
require $website_language_definer_php;

function Language_Item_Definer($enus_item, $ptbr_item, $ptpt_item, $same_from_ptbr = False) {
	global $website_language;
	global $language_enus;
	global $language_ptbr;
	global $language_ptpt;

	if ($website_language == $language_enus) {
		return $enus_item;
	}

	if ($website_language == $language_ptbr) {
		return $ptbr_item;
	}

	if ($website_language == $language_ptpt and $same_from_ptbr == False) {
		return $ptpt_item;
	}

	if ($website_language == $language_ptpt and $same_from_ptbr == True) {
		return $ptbr_item;
	}
}

function Language_Item_Definer_By_Array($english_variable, $portuguese_variable) {
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

# Variable Inserter PHP file loader
require $variable_inserter_php;

# Website selector file includer
require $website_selector_file;

$website_title = $website_titles_array[$selected_website_number];
$website_type = $website_types_array[$selected_website_number];

# Language modifier
$hyphen_separated_website_language = strtoupper($website_language);
$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

if ($site_is_prototype == False) {
	# VGlobal.php variables file includer
	require $vglobal_php;
}

if ($site_is_prototype == True) {
	# VGlobal.php variables file includer
	@require $vglobal_php;
}

if ($return == False) {
	echo "<!DOCTYPE html>"."\n";

	# Website Header displayer
	echo $website_header;

	if ($website_deactivate_tabs_setting == False and $site_is_prototype == False and $website_uses_custom_layout_setting == False) {
		# "Tabs loader" file loader
		require $website_tabs_loader;
	}

	require $other_index_stuff_php;

	echo "<script>
Define_Colors_And_Styles();
</script>"."\n\n";

	if ($website_uses_custom_layout_setting == False) {
		echo '</center>'."\n";
	}

	echo '</body>
</html>';
}

if ($return == True) {
	$website = "";
	$website .= "<!DOCTYPE html>"."\n";

	# Website Header displayer
	$website .= $website_header;

	if ($website_deactivate_tabs_setting == False and $site_is_prototype == False and $website_uses_custom_layout_setting == False) {
		#"Tabs loader" file loader
		ob_start();
		require $website_tabs_loader;
		$website .= ob_get_clean();
	}

	ob_start();
	require $other_index_stuff_php;
	$website .= ob_get_clean();

	$website .= "<script>
	Define_Colors_And_Styles();
	</script>"."\n\n";

	if ($website_uses_custom_layout_setting == False and $website_is_not_centered_setting == False) {
		$website .= '</center>'."\n";
	}

	$website .= '</body>
	</html>';

	$html_folder = $selected_website_folder.$hyphen_separated_website_language."/";
	$html_index_file = $html_folder."Index.html";

	if (file_exists($html_folder) == False) {
		mkdir($html_folder);
	}

	if (file_exists($html_index_file) == True) {
		$file_open = fopen($html_index_file, 'w');
		fwrite($file_open, $website);
		fclose($file_open);
	}
}

?>