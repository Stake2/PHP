<?php 

$i = 0;
foreach ($website_titles as $value) {
	$website_keys[$value] = Remove_Non_File_Characters(str_replace(" ", "_", mb_strtolower($value)));

	$i++;
}

$i = 0;
foreach ($website_titles as $value) {
	$folder = $php_folder_websites.Remove_Non_File_Characters($value)."/";

	$website_php_folders[$value] = $folder;

	$i++;
}

# Checks if the folder of the website exists, if it does not, it creates the folder
foreach ($website_php_folders as $local_website_folder) {
	if (file_exists($local_website_folder) == False) {
		mkdir($local_website_folder);
	}
}

$website_style_files = array();

$i = 0;
foreach ($website_titles as $value) {
	$website_info["php_folder"] = $website_php_folders[$value];

	$variables_file = $website_info["php_folder"]."Variables.php";
	$website_style_file = $website_info["php_folder"]."Style.php";

	$website_variables_files[$value] = $variables_file;
	$website_style_files[$value] = $website_style_file;

	if (file_exists($variables_file) == False) {
		fopen($variables_file, "w", "UTF-8");
	}

	if (file_exists($website_style_file) == False) {
		fopen($website_style_file, "w", "UTF-8");
	}

	$i++;
}

# Website.php Files array
$i = 0;
foreach ($website_titles as $value) {
	$website_file = $website_php_folders[$value]."Website.php";

	if (file_exists($website_file) == False) {
		fopen($website_file, "w", "UTF-8");
		file_put_contents($website_file, "<?php \n\n\n?>");
	}

	$website_files[$value] = $website_file;

	$i++;
}

?>