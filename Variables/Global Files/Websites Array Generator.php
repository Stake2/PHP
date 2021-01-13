<?php 

#Websites array
$i = 0;
foreach ($sitearray as $value) {
	$value = strtolower($value);

    ${"site$value"} = $value;

	$website_names_array[$i] = ${"site$value"};

	$i++;
}

#Website chapter_titles array
$i = 0;
foreach ($sitetitlesarray as $value) {
	$varresource = strtolower($website_names_array[$i]);

    ${"sitename_$varresource"} = $value;

	$sitetitlesarray[$i] = ${"sitename_$varresource"};

	$i++;
}

#Array of the paths of the website folders in the local drive
$i = 0;
foreach ($website_names_array as $value) {
    ${"sitefolder_$value"} = $php_tabs.ucwords($sitearray[$i]).'/';

	$website_folders[$i] = ${"sitefolder_$value"};

	$i++;
}

# Checks if the folder of the website exists, if it does not, it creates the folder
foreach ($website_folders as $folder) {
	if (!file_exists($folder)) {
		mkdir($folder);
	}
}

$website_style_files = array();

# V[Site].php Files array
$i = 0;
foreach ($sitearray as $value) {
	$website_folder = $php_tabs.ucwords($value);

	$variables_file = $website_folder.'/'.'V'.ucwords($value).'.php';
	$website_style_file = $website_folder.'/'.'Website Style.php';

	if (file_exists($variables_file)) {
		$sitefilevars[$i] = $variables_file;
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
foreach ($sitearray as $value) {
	$websitefile = $php_tabs.ucwords($value).'/'.'Website.php';

	if (file_exists($websitefile)) {
		$sitewebsitefiles[$i] = $websitefile;
	}

	else {
		fopen($websitefile, 'w', 'UTF-8');
	}

	$i++;
}

?>