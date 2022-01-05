<?php

$line_replace_array = array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF");

# Get the localhost link
if (isset($host_text) == False) {
	$host_text = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$return = False;
}

if (isset($host_text) == True) {
	$return = False;
}

$current_year = strftime("%Y");
date_default_timezone_set("America/Sao_Paulo");
$data = date("d/m/Y");

# Website variables
$https_text = "https://";
$netlify_url = "netlify.app";
$hard_drive_letter = "C";
$mega_folder = $hard_drive_letter.":/Mega/";
$medias_local_folder = $hard_drive_letter.":/Midias/";

if (file_exists($mega_folder) == False) {
	$hard_drive_letter = "D";
	$mega_folder = $hard_drive_letter.":/Mega/";
	$medias_local_folder = $hard_drive_letter.":/Midias/";
}

$mega_folder_stake2_website = $mega_folder."Stake2 Website/";
$subdomain_file = $mega_folder_stake2_website."Subdomain.txt";
$main_php_folder = $mega_folder."PHP/";

$php_folder_websites = $main_php_folder."Websites/";
$php_folder_variables = $main_php_folder."Variables/";

$folders_and_files_folder = $php_folder_variables."Folders and Files/";
$global_files_folder = $php_folder_variables."Global Files/";
$database_folder = $php_folder_variables."Database/";

$website_selector_file = $php_folder_variables."Website Selector.php";
$main_folders_and_files = $folders_and_files_folder."Main Folders And Files.php";

$global_texts_php = $global_files_folder."Global Texts.php";
$global_style_file_php = $global_files_folder."Global Style.php";

$connect_php = $database_folder."Connect.php";

$website_subdomain_name = explode("\n", fread(fopen($subdomain_file, "r", "UTF-8"), filesize($subdomain_file)))[0];
$main_website_url = $https_text.$website_subdomain_name.".".$netlify_url."/";

# "Main PHP Folders" PHP File Loader
require $main_folders_and_files;

# Crucial Functions PHP File Loader
require $crucial_functions_file_php;

$php_settings = array(
"allow_current_year" => False,
);

# Main Arrays PHP file loader
require $main_arrays_php;

# Global Arrays PHP file loader
require $global_arrays_php;

# Connect to Database
require $connect_php;

# Websites Array Generator PHP file loader
require $website_arrays_generator_php;

# Default Setting Values file require
require $website_settings_checker;

# Website Language Definer file require
require $website_language_definer_php;

# Variable Inserter PHP file loader
require $website_variable_inserter_php;

# Global CSS variables loader
require $global_style_file_php;

# Global Texts PHP file loader
require $global_texts_php;

# Website selector file require
require $website_selector_file;

$media_variables_php = $website_folders["Watch History"]."Media Variables.php";

$website_title = $website_titles[$selected_website_title];
$website_title_backup = $website_title;
$website_title_key = $website_title;
$website_type = $website_types[$selected_website_title];
$website_folder = $website_folders[$website_title];
$website_title_text = Language_Item_Definer($website_titles[$selected_website_title], $website_portuguese_titles[$selected_website_title]);
$website_title_text_backup = $website_title_text;

if ($website_title_backup == $website_titles["Watch History"]) {
	require $media_variables_php;
}

$v_global_php = $php_folder_variables.'V_Global.php';

$columns = array(
"website_name VARCHAR(50) NOT NULL,",
"website_description VARCHAR(50) NOT NULL,",
"website_header_description VARCHAR(50) NOT NULL,",
"website_image VARCHAR(50) NOT NULL",
);

Create_Database_Table($website_title_key, $columns);

# VGlobal.php variables file require
require $v_global_php;

if ($return == False) {
	echo "<!DOCTYPE html>"."\n";

	# Website Header displayer
	echo $website_header;

	if ($website_function_settings["tabs"] == True and $website_settings["custom_layout"] == False) {
		# "Tabs loader" file loader
		require $website_tabs_loader;
	}

	require $website_extra_website_things;

	echo "<script>
Define_Colors_And_Styles();
</script>"."\n\n";

	if ($website_settings["custom_layout"] == False) {
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

	if ($website_function_settings["tabs"] == True and $website_settings["custom_layout"] == False) {
		# "Tabs Loader" file loader
		ob_start();
		require $website_tabs_loader;
		$website .= ob_get_clean();
	}

	ob_start();
	require $website_extra_website_things;
	$website .= ob_get_clean();

	$website .= "<script>
	Define_Colors_And_Styles();
	</script>"."\n\n";

	if ($website_settings["custom_layout"] == False and $website_function_settings["center_website"] == False) {
		$website .= '</center>'."\n";
	}

	$website .= '</body>
	</html>';

	$html_folder = $website_folder.$website_title_language."/";
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

if (in_array($website_title_backup, $year_websites) == True and $website_language != $language_geral and $website_language != $language_ptpt) {
	$year_summary_file = $year_language_folders[$full_language][$website_title_backup].Language_Item_Definer("Summary", "Sumário").".txt";

	if ($website_title_backup == "2020" and $website_language == $language_ptbr) {
		$year_summary_text = substr_replace($year_summary_text, "", -1);
	}

	Write_To_File($year_summary_file, $year_summary_text);
}

?>