<?php 

$i = 0;
foreach ($website_titles as $value) {
	$local_portuguese_website_name = $portuguese_websites[$value];

	$website_titles_portuguese[$key] = $local_portuguese_website_name;

	$i++;
}

$i = 0;
foreach ($website_titles as $value) {
	$website_keys[$value] = Remove_Non_File_Characters(str_replace(" ", "_", strtolower($value)));

	$i++;
}

$i = 0;
foreach ($website_titles as $value) {
	$folder = $php_folder_tabs.Remove_Non_File_Characters($value)."/";

	$website_folders[$value] = $folder;

	$i++;
}

# Checks if the folder of the website exists, if it does not, it creates the folder
foreach ($website_folders as $local_website_folder) {
	if (file_exists($local_website_folder) == False) {
		mkdir($local_website_folder);
	}
}

$website_style_files = array();

$i = 0;
foreach ($website_titles as $value) {
	$website_folder = $website_folders[$value];

	$variables_file = $website_folder."Variables.php";
	$website_style_file = $website_folder."Style.php";
	$website_name_file = $website_folder."Name.php";

	$website_variables_files[$value] = $variables_file;
	$website_style_files[$value] = $website_style_file;
	$website_name_files[$value] = $website_name_file;

	if (file_exists($variables_file) == False) {
		fopen($variables_file, "w", "UTF-8");
	}

	if (file_exists($website_style_file) == False) {
		fopen($website_style_file, "w", "UTF-8");
	}

	if (file_exists($website_name_file) == False) {
		fopen($website_name_file, "w", "UTF-8");	
		file_put_contents($website_name_file, "<?php"."\n\n"."\$local_website_name = \"".$value."\";"."\n\n"."?>");
	}

	$i++;
}

# Website.php Files array
$i = 0;
foreach ($website_titles as $value) {
	$website_file = $website_folders[$value]."Website.php";

	if (file_exists($website_file) == False) {
		fopen($website_file, "w", "UTF-8");
	}

	$website_files[$value] = $website_file;

	$i++;
}

?>