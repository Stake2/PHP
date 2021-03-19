<?php 

#Websites array
$i = 0;
foreach ($websites_array as $value) {
	$value = strtolower($value);
	$value = str_replace("á", "a", $value);

    ${"website_$value"} = $value;

	$website_names_array[$i] = ${"website_$value"};

	$i++;
}

#Website chapter_titles array
$i = 0;
foreach ($website_titles_array as $value) {
	$resource_variable = strtolower($website_names_array[$i]);

    ${"website_name_$resource_variable"} = $value;

	$website_titles_array[$i] = ${"website_name_$resource_variable"};

	$i++;
}

#Array of the paths of the website folders in the local drive
$i = 0;
foreach ($website_names_array as $value) {
	$folder_to_use = $websites_array[$i];

	if ($value == "diario") {
		$folder_to_use = "Diário";
	}

	${"website_folder_$value"} = $php_tabs.$folder_to_use.'/';

	$website_folders[$i] = ${"website_folder_$value"};

	$i++;
}

# Checks if the folder of the website exists, if it does not, it creates the folder
foreach ($website_folders as $folder) {
	if (!file_exists($folder)) {
		mkdir($folder);
	}
}

$website_style_files = array();

# V[Website].php Files array
$i = 0;
foreach ($websites_array as $value) {
	$website_folder = $php_tabs.ucwords($value);

	$variables_file = $website_folder.'/'.'V_'.$value.'.php';
	$website_style_file = $website_folder.'/'.'Website Style.php';

	if (file_exists($variables_file)) {
		$website_variables_files[$i] = $variables_file;
	}

	else {
		fopen($variables_file, 'w', 'UTF-8');
	}

	if (file_exists($website_style_file)) {
		$website_style_files[$i] = $website_style_file;
	}

	else {
		fopen($website_style_file, 'w', 'UTF-8');
	}

	$i++;
}

# Website.php Files array
$i = 0;
foreach ($websites_array as $value) {
	$websitefile = $php_tabs.ucwords($value).'/Website.php';

	if (file_exists($websitefile)) {
		$sitewebsitefiles[$i] = $websitefile;
	}

	else {
		fopen($websitefile, 'w', 'UTF-8');
	}

	$i++;
}

?>