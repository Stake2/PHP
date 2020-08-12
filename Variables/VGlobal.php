<?php

# VGlobal.php $sitefolder, site, cdn and fontawesome link variables
$sitefolder = strtolower($site);
$site = $sitefolder;

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
$sitecssfile = $setsitecssfile;

# NewDesign and Notifications definer
require $newdesign_and_notifications_definer_php;

# Site CSS and Javascript definer
require $site_css_and_javascript_definer_php;

# Date style definer
date_default_timezone_set("America/Sao_Paulo");
$data = date("d/m/Y");

# Global CSS variables loader
require $global_style_file_php;

if ($site_is_prototype == false) {
	#Stories variables includer if the site is a story site
	require $story_variables_php_variable;

	#SitesButtons Attributes.php includer
	require $sitesbuttonsattributes;
}

# VYears.php file loader for YearsSites
if (in_array($sitename, $yeararray)) {
	require $vyears_php;
}

# Websites array
$i = 0;
foreach ($sitenamesarray as $value) {
	if ($sitename == $value) {
		require $sitefilevars[$i];
	}

	$i++;
}

# Site notifications includer if site has notifications activated
if ($sitehasnotifications == true) {
	require $notificationsphp;
}

if ($site_is_prototype == false) {
	require $sitesbuttonscreator;
}

# Global image variables loader
require $global_image_variables_php;

if (isset($custom_website_head_content)) {
	$include_custom_website_head_content = "\n".$custom_website_head_content;
}

else {
	$include_custom_website_head_content = '';
}

$sitehead = '
<title>'.$sitetitulo.'</title>
<meta charset="UTF-8" />
<meta property="og:title" content="'.$sitetitulo.'" />
<meta property="og:site_name" content="'.$sitetitulo.'" />
<link rel="canonical" href="'.$siteurl.'" />
<meta property="og:url" content="'.$siteurl.'" />
<link rel="icon" href="'.$siteimage.'" />
<link rel="image_src" href="'.$siteimage.'" />
<meta property="og:image" content="'.$siteimage.'" />
<meta name="description" content="'.$sitedesc.'" />
<meta property="og:description" content="'.$sitedesc.'" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />
'.$sitecss.
'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />'.$fontawesome_script.
$include_custom_website_head_content;

/*'<link rel="stylesheet" href="'.$fontawesome_link.'" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';*/

if ($sitename == $sitetextmaker) {
	$sitedesc = $sitedesc;
}

if (in_array($sitename, $yeararray)) {
	$sitedesc = $sitedesc2;
}

if ($sitename != $sitetextmaker) {
	$sitedesc = $sitedesc;
}

require $site_header_file_php;

?>