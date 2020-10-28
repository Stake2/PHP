<?php

# VGlobal.php $website_folder, site, cdn and fontawesome link variables
$website_folder = strtolower($site);
$site = $website_folder;

$folder_and_website_variables_php = $php_vars_global_files.'Folder And Website Variables.php';
$php_files_php = $php_vars_global_files.'PHP Files.php';

# Folder And Website Variables PHP file loader
require $folder_and_website_variables_php;

# "PHP Files" file loader
require $php_files_php;

# FontAwesome link and script definer
if ($site_is_prototype == false) {
	$fontawesome_link = "\n".'https://use.fontawesome.com/releases/v5.8.2/css/all.css';
	$fontawesome_script = "\n".'<script src="https://kit.fontawesome.com/df0c191291.js" crossorigin="anonymous"></script>';
}

else {
	$fontawesome_link = null;
	$fontawesome_script = null;
}

# Global Texts PHP file loader
require $global_texts_php;

# Watch History and YearWebsites year variables
require $watch_and_yearwebsites_variables_php;

# CSS definers for specific websites
$website_css_file = $choosed_website_css_file;

# NewDesign and Notifications definer
require $newdesign_and_notifications_definer_php;

# Site CSS and Javascript definer
require $website_css_and_javascript_definer_php;

# Date style definer
date_default_timezone_set("America/Sao_Paulo");
$data = date("d/m/Y");

# Global CSS variables loader
require $global_style_file_php;

if ($site_is_prototype == false) {
	#Story variables PHP file includer if the website is a story website
	require $story_name_variables_php_variable;

	#SitesButtons Attributes.php includer
	require $websites_tab_attributes;
}

# VYears.php file loader for YearsSites
if (in_array($website_name, $yeararray)) {
	require $vyears_php;
}

# Website Style Chooser.php file loader
require $website_style_chooser_file;

# Websites array
$i = 0;
foreach ($website_names_array as $value) {
	if ($website_name == $value) {
		require $sitefilevars[$i];
	}

	$i++;
}

# Website Image Maker.php file loader
require $website_image_maker;

# Website Classes.php file loader
require $website_classes_php;

# Website notifications includer if the website has notifications activated
if ($website_has_notifications == true) {
	require $notifications_php;
}

if ($site_is_prototype == false) {
	require $websites_tab_button_maker;
}

if (isset($custom_website_head_content)) {
	$include_custom_website_head_content = "\n".$custom_website_head_content;
}

else {
	$include_custom_website_head_content = '';
}

$website_head = '
<title>'.$website_title.'</title>
<meta charset="UTF-8" />
<meta property="og:title" content="'.$website_title.'" />
<meta property="og:site_name" content="'.$website_title.'" />
<link rel="canonical" href="'.$website_link.'" />
<meta property="og:main_website_url" content="'.$website_link.'" />
<link rel="icon" href="'.$website_image.'" />
<link rel="image_src" href="'.$website_image.'" />
<meta property="og:image" content="'.$website_image.'" />
<meta name="description" content="'.$website_meta_description.'" />
<meta property="og:description" content="'.$website_meta_description.'" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />
'.$website_css_files.
'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />'.$fontawesome_script.
$include_custom_website_head_content;

/*'<link rel="stylesheet" href="'.$fontawesome_link.'" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';*/

if ($website_name == $sitetextmaker) {
	$website_meta_description = $website_meta_description;
}

if (in_array($website_name, $yeararray)) {
	$website_meta_description = $website_header_description;
}

if ($website_name != $sitetextmaker) {
	$website_meta_description = $website_meta_description;
}

require $website_header_php;

?>