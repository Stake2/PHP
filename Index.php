<?php

$line_replace_array = array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF");

# Get the localhost link
if (isset($host_text) == False) {
	$host_text = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on" ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$return = False;
}

$variable = "";

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
$mega_folder = $hard_drive_letter.':/Mega/';
$medias_local_folder = $hard_drive_letter.':/Midias/';

if (file_exists($mega_folder) == False) {
	$hard_drive_letter = "D";
	$mega_folder = $hard_drive_letter.':/Mega/';
	$medias_local_folder = $hard_drive_letter.':/Midias/';
}

$mega_folder_stake2_website = $mega_folder.'Stake2 Website/';
$subdomain_file = $mega_folder_stake2_website.'Subdomain.txt';
$main_php_folder = $mega_folder.'PHP/';

$php_folder_tabs = $main_php_folder."Tabs/";
$php_folder_variables = $main_php_folder."Variables/";

$global_files_folder = $php_folder_variables."Global Files/";
$database_folder = $php_folder_variables."Database/";

$main_php_folders_and_files = $global_files_folder."Main PHP Folders And Files.php";
$global_texts_php = $global_files_folder.'Global Texts.php';
$global_style_file_php = $global_files_folder.'Global Style.php';
$connect_php = $database_folder."Connect.php";

# "Main PHP Folders" PHP File Loader
require $main_php_folders_and_files;

# Crucial Functions PHP File Loader
require $crucial_functions_file_php;

$website_subdomain_name = Read_Lines($subdomain_file)[0];
$main_website_url = $https_text.$website_subdomain_name.".".$netlify_url."/";

$php_settings["allow_current_year"] = True;

# Main Arrays PHP file loader
require $main_arrays_php;

# Global Arrays PHP file loader
require $global_arrays_php;

require $connect_php;

# Websites Array Generator PHP file loader
require $website_arrays_generator_php;

# Year Arrays PHP file loader
#require $year_arrays_php;

# Default Setting Values file require
require $default_setting_values_php;

# Website Language Definer file require
require $website_language_definer_php;

# Variable Inserter PHP file loader
require $variable_inserter_php;

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

	if ($website_deactivate_tabs_setting == False and $website_is_prototype_setting == False and $website_uses_custom_layout_setting == False) {
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

	if ($website_deactivate_tabs_setting == False and $website_is_prototype_setting == False and $website_uses_custom_layout_setting == False) {
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

?>