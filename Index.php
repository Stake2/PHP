<?php

$php_settings = array(
"allow_current_year" => False,
);

$line_replace_array = array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF");

if (isset($_GET["website_settings"])) {
	$get = explode(",", str_replace(array("[", "]"), "", $_GET["website_settings"]));
}

$current_year = strftime("%Y");
date_default_timezone_set("America/Sao_Paulo");
$data = date("d/m/Y");

$website_author = "Stake2";
$twitter_author = $website_author."_";

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

$v_global_php = $php_folder_variables."V_Global.php";
$website_selector_file = $php_folder_variables."Website Selector.php";
$main_folders_and_files = $folders_and_files_folder."Main Folders And Files.php";

$global_texts_php = $global_files_folder."Global Texts.php";
$global_style_file_php = $global_files_folder."Global Style.php";

$sql_php = $database_folder."SQL.php";

$website_subdomain_name = explode("\n", fread(fopen($subdomain_file, "r", "UTF-8"), filesize($subdomain_file)))[0];
$main_website_url = $https_text.$website_subdomain_name.".".$netlify_url."/";

$website_info = array();

# "Main PHP Folders" PHP File Loader
require $main_folders_and_files;

# Crucial Functions PHP File Loader
require $crucial_functions_file_php;

# Main Arrays PHP file loader
require $main_arrays_php;

# Website Language Definer file require
require $website_language_definer_php;

# Global Arrays PHP file loader
require $global_arrays_php;

# Connect to Database
require $sql_php;

# Websites Array Generator PHP file loader
require $website_arrays_generator_php;

# Default Setting Values file require
require $website_settings_checker;

# Variable Inserter PHP file loader
require $website_variable_inserter_php;

# Global CSS variables loader
require $global_style_file_php;

# Global Texts PHP file loader
require $global_texts_php;

# Website selector file require
require $website_selector_file;

# V_Global.php variables file require
require $v_global_php;

# RainTPL Loader.php require
require $raintpl_loader;

if ($return == False) {
	// draw the template
	$tpl->draw("Head");

	echo "\n";

	$tpl->draw("Body");

	$tpl->draw("Header Descriptions/".$website_info["type"]);

	echo $div_close."\n";
	echo "<!-- End of header -->";

	echo "\n"."\n";

	if ($website_function_settings["tabs"] == True and $website_settings["custom_layout"] == False) {
		# "Tabs loader" file loader
		echo "<!-- Start of website tabs -->"."\n";
		require $website_tabs_loader;
		echo "<!-- End of website tabs -->"."\n";
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
	$website = $tpl->draw("Head");

	$website .= "\n";

	$website .= $tpl->draw("Body");

	$website .= $tpl->draw("Header Descriptions/".$website_info["type"]);

	$website .= $div_close."\n";
	$website .= "<!-- End of header -->";

	$website .= "\n"."\n";

	if ($website_function_settings["tabs"] == True and $website_settings["custom_layout"] == False) {
		# "Tabs Loader" file loader
		$website .= "<!-- Start of website tabs -->"."\n";

		ob_start();
		require $website_tabs_loader;
		$website .= ob_get_clean();

		$website .= "<!-- End of website tabs -->"."\n";
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

	$html_folder = $website_info["php_folder"].$website_info["title_language"]."/";
	$html_index_file = $html_folder."Index.html";

	if (file_exists($html_folder) == False) {
		mkdir($html_folder);
	}

	if (file_exists($html_index_file) == True) {
		$file_open = fopen($html_index_file, "w");
		fwrite($file_open, $website);
		fclose($file_open);
	}
}

if (in_array($website_info["english_title"], $year_websites) == True and $website_language != $language_geral and $website_language != $language_ptpt) {
	$year_summary_file = $year_language_folders[$full_language][$website_info["english_title"]].Language_Item_Definer("Summary", "Sumário").".txt";

	if ($website_info["english_title"] == "2020" and $website_language == $language_ptbr) {
		$year_summary_text = substr_replace($year_summary_text, "", -1);
	}

	Write_To_File($year_summary_file, $year_summary_text);
}

?>