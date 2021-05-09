<?php

$hard_drive_letter = "C";
$mega_folder = $hard_drive_letter.':/Mega/';

if (!file_exists($mega_folder)) {
	$hard_drive_letter = "D";
	$mega_folder = $hard_drive_letter.':/Mega/';
}

$mega_folder_stake2_website = $mega_folder.'Stake2 Website/';
$main_php_folder = $mega_folder.'PHP/';

$php_folder_tabs = 'Tabs';
$variables_folder_variable = 'Variables';
$global_variable = 'Global';

$php_folder_variables = $main_php_folder.$variables_folder_variable.'/';
$global_files_folder = $php_folder_variables.$global_variable.' Files/';
$global_files_folder = $global_files_folder;
$main_arrays_php = $global_files_folder.'Main Arrays.php';

$index_php = $main_php_folder."Index.php";

require $main_arrays_php;

$host_text_selector = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$selected_language_parameter = "selected_language";
$selected_website_parameter = "selected_website";

if (strpos ($host_text_selector, $selected_language_parameter.'=') == True) {
	$selected_language = str_replace((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]/Website%20HTML%20File%20Generator.php?no-redirect=true&".$selected_language_parameter."=", "", $host_text_selector);
	$selected_language = preg_replace("/&selected_website=.*/", "", $selected_language);
}

if (strpos ($host_text_selector, $selected_website_parameter.'=') == True) {
	$selected_website = str_replace((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]/Website%20HTML%20File%20Generator.php?no-redirect=true&".$selected_language_parameter."=".$selected_language."&".$selected_website_parameter."=", "", $host_text_selector);
}

$selected_language = str_replace("&".$selected_website_parameter."=".$selected_website, "", $selected_language);

$host_text = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]/?no-redirect=true&website_language=".$selected_language."&website=".$selected_website;

ob_start();

require_once $index_php;

$website = ob_get_clean();

$html_folder = $mega_folder_stake2_website.str_replace($main_website_url, "", $selected_website_url);

echo $html_folder;

if ($selected_language != $language_geral) {
	if ($selected_website == "diario") {
		if ($selected_language == $language_ptbr) {
			$html_folder = $html_folder;
		}

		if ($selected_language == $language_ptpt) {
			$html_folder = $html_folder.$hyphen_separated_website_language."/";
		}
	}

	else {
		$html_folder = $html_folder.$hyphen_separated_website_language."/";
	}
}

if ($selected_language == $language_geral) {
	$html_folder = $html_folder;
}

$html_index_file = $html_folder."Index.html";

if (file_exists($html_folder) == False) {
	mkdir($html_folder);
}

if (file_exists($html_index_file) == True) {
	$file_exists = True;
}

if (file_exists($html_index_file) == False) {
	$file_exists = False;
}

$file_open = fopen($html_index_file, 'w');
fwrite($file_open, $website);
fclose($file_open);

if ($file_exists == True) {
	$text = "updated with new contents";
}

if ($file_exists == False) {
	$text = "created";
}

echo "<h2>Website file was ".$text.".</h2><br />"."\n";

?>