<?php 

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

$main_folders_and_files = $folders_and_files_folder."Main Folders And Files.php";
$v_global_php = $php_folder_variables."V_Global.php";
$website_selector_file = $php_folder_variables."Website Selector.php";

$website_subdomain_name = explode("\n", fread(fopen($subdomain_file, "r", "UTF-8"), filesize($subdomain_file)))[0];
$main_website_url = $https_text.$website_subdomain_name.".".$netlify_url."/";

?>