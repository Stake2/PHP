<?php

# V_Global.php $website_folder, website and FontAwesome link variables
$website_folder = strtolower($website);
$website = $website_folder;
$selected_website_url = $main_website_url.$website_folder."/";
$selected_website_folder = ${"website_folder_".$website_names_array[$selected_website_number]};

$folder_and_website_variables_php = $global_files_folder.'Folder And Website Variables.php';
$php_files_php = $global_files_folder.'PHP Files.php';

# Folder And Website Variables PHP file loader
require $folder_and_website_variables_php;

# "PHP Files.php" file loader
require $php_files_php;

# Watch History and YearWebsites year variables
require $watch_and_yearwebsites_variables_php;

# CSS definers for specific websites
$website_css_file = $choosed_website_css_file;

# Website CSS and Javascript definer
require $website_css_and_javascript_definer_php;

require $elements_file;

# Global Normal Functions PHP File Loader
require $normal_functions_file_php;

# Website Style Chooser.php file loader
if ($website_uses_custom_layout_setting == False) {
	require $website_style_chooser_file;
}

if ($website_is_prototype_setting == False and $website_uses_custom_layout_setting == False) {
	# Story variables PHP file includer if the website is a story website
	require $story_variables_php;

	# Websites Tab Attributes.php includer
	require $websites_tab_attributes;

	# Story variables PHP file includer if the website is a story website
	require $story_variables_php;
}

# VYears.php file loader for YearsSites
if (in_array($website_name, $years_array)) {
	require $vyears_php;
}

# Websites array
$i = 0;
foreach ($website_names_array as $value) {
	if ($website_name == $value) {
		require $website_variables_files[$i];
	}

	$i++;
}

# Website Image Maker.php file loader
if ($website_uses_custom_layout_setting == False) {
	require $website_image_maker;

	# Website Classes.php file loader
	require $website_classes_php;
}

# Website notifications includer if the website has notifications activated
if ($website_has_notifications == True) {
	require $website_notifications_php;
}

if ($website_is_prototype_setting == False and $website_uses_custom_layout_setting == False) {
	require $websites_tab_button_maker;
}

if (isset($custom_website_head_content)) {
	$include_custom_website_head_content = "\n".$custom_website_head_content;
}

else {
	$include_custom_website_head_content = '';
}

if ($deactivate_js == False and isset($website_js_files) == True) {
	$website_js_files = $website_js_files;
}

else {
	$website_js_files = "";
}

if ($website_is_for_other_person_setting == True) {
	$twitter_info = '';
}

if ($website_is_for_other_person_setting == False) {
	$twitter_info = "\n".'<meta name="twitter:card" content="summary" />
<meta name="twitter:website" value="@The_Snakes90" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />';
}

if ($website_name == $website_website_status) {
	$website_title = $website_titles_array[$selected_website_number];
}

$website_head = '
<title>'.$website_title.'</title>
<meta property="og:type" content="website" />
<meta property="og:title" content="'.$website_title.'" />
<meta property="og:site_name" content="'.$website_title.'" />
<meta property="og:url" content="'.$website_link.'" />
<meta property="og:image" content="'.$website_image.'" />
<meta property="og:description" content="'.$website_meta_description.'" />
<meta property="og:locale" content="en_US" />
<meta property="og:locale:alternate" content="pt_BR" />
<meta property="og:locale:alternate" content="pt_PT" />
<link rel="canonical" href="'.$website_link.'" />
<link rel="icon" type="image/'.$image_format.'" href="'.$website_image.'" />
<link rel="image_src" type="image/'.$image_format.'" href="'.$website_image.'" />
<meta name="description" content="'.$website_meta_description.'" />'
.$twitter_info.'
<meta name="revised" content="'."Stake's Enterprise TM".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
<meta charset="UTF-8" />'.
"\n"."\n".$website_css_links.
"\n"."\n".$website_javascript_links.
$include_custom_website_head_content;

if (in_array($website_name, $years_array)) {
	$website_meta_description = $website_header_description;
}

require $website_header_php;

?>