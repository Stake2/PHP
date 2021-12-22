<?php

# V_Global.php $website_folder, website and FontAwesome link variables
$selected_website_url = $website_links[$website_title];

$dot_text = ".txt";

$folder_and_website_variables_php = $global_files_folder.'Folder And Website Variables.php';
$php_files_php = $global_files_folder.'PHP Files.php';

# Folder And Website Variables PHP file loader
require $folder_and_website_variables_php;

# "PHP Files.php" file loader
require $php_files_php;

# CSS definers for specific websites
$website_css_file = $choosed_website_css_file;

# Website CSS and Javascript definer
require $website_css_and_javascript_definer_php;

# Global Normal Functions PHP File Loader
require $normal_functions_file_php;

# Website Style Chooser.php file loader
if ($website_settings["custom_layout"] == False) {
	require $website_style_chooser_file;
}

if ($website_settings["custom_layout"] == False) {
	# Story variables PHP file includer if the website is a story website
	require $story_variables_php;

	# Websites Tab Attributes.php includer
	require $websites_tab_arrays;

	# Story variables PHP file includer if the website is a story website
	require $story_variables_php;
}

# Websites array
$i = 0;
foreach ($website_titles as $value) {
	if ($website_title == $value) {
		require $website_variables_files[$value];
	}

	$i++;
}

# Website Style.php File Includer
require $website_style_file;

# Tab Generator.php includer
require $website_tabs_generator;

if ($website_type == $story_website_type and $website_settings["notifications"] == True) {
	# Website notification variables if the website notification setting is True
	# Revised chapter title
	$reviewed_chapter_code = $chapter_buttons[$revised_chapter];
	$reviewed_chapter_button_mobile = $chapter_buttons[$revised_chapter];
}

# Website Image Maker.php file loader
if ($website_settings["custom_layout"] == False) {
	require $website_image_maker;

	# Website Classes.php file loader
	require $website_classes_php;
}

# Website notifications includer if the website has notifications activated
if ($website_settings["notifications"] == True) {
	require $website_notifications_php;
}

if ($website_is_prototype_setting == False and $website_settings["custom_layout"] == False) {
	require $websites_tab_button_maker;
}

$include_custom_website_head_content = "";

if (isset($custom_website_head_content) == True) {
	$include_custom_website_head_content = "\n".$custom_website_head_content;
}

if ($deactivate_js == True) {
	$website_js_files = "";
}

$handle = "Stake2__";
$twitter_info = "\n".'<meta name="twitter:card" content="summary" />
<meta name="twitter:website" value="@'.$handle.'" />
<meta name="twitter:site" value="@'.$handle.'" />
<meta name="twitter:creator" content="@'.$handle.'" />
<meta content="summary_large_image" name="twitter:card" />
<meta content="'.$website_link.'" name="twitter:url" />';

$website_head = '
<title>'.$website_title_text.'</title>
<meta property="og:type" content="website" />
<meta property="og:title" content="'.$website_title_text.'" />
<meta property="og:site_name" content="'.$website_title_text.'" />
<meta property="og:url" content="'.$website_link.'" />
<meta property="og:image" content="'.$website_image.'" />
<meta property="og:description" content="'.$website_meta_description.'" />
<meta property="og:locale" content="en_US" />
<meta property="og:locale:alternate" content="pt_BR" />
<meta property="og:locale:alternate" content="pt_PT" />
<link rel="canonical" href="'.$website_link.'" />
<link rel="icon" type="image/'.$image_format.'" href="'.$website_image.'" />
<link rel="image_src" type="image/'.$image_format.'" href="'.$website_image.'" />
<meta name="description" content="'.$website_meta_description.'" />
<meta content="#916f3b" name="theme-color" />'
.$twitter_info.'
<meta name="revised" content="'."Stake2's Enterprise TM".', '.$data.'" />
<meta name="author" content="Stake2" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
<meta charset="UTF-8" />'.
"\n"."\n".$website_css_links.
"\n"."\n".$website_javascript_links.
$include_custom_website_head_content;

if (in_array($website_title, $year_websites)) {
	$website_meta_description = $website_header_description;
}

require $website_header_php;

?>