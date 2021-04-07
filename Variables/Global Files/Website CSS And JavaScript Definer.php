<?php 

if ($new_write_style == True) {
	$open_chapter_by_keys = '';
}

if ($new_write_style == False) {
	$open_chapter_by_keys = "\n".'<script src="'.$website_story_websites_javascript_folder.'Open Chapter By Keys.js"></script>';
}

$write_chapter_script = "\n".'<script src="'.$website_story_websites_javascript_folder.'Write Chapter.js"></script>';

# CSS Pack generator by class
/*

Make a CSS Pack Generator class that sets all the style variables using an array that the specific website contains
The styles array of the website contains all the styles used for that website

Make a variable in the Website.php file that is called $css_pack that contains the style array of the website
Make the website style arrays inside each folder of each website, called "CSS Pack.php"

*/

if ($site_is_prototype == False and $website_uses_custom_layout_setting == False) {
	$main_css = '<link rel="stylesheet" type="text/css" href="'.$website_css_styler_css_folder.'Main_CSS.css" />';
	$website_css_file_loader = '<link rel="stylesheet" type="text/css" href="'.$website_css_website_css_folder.$website_css_file.'.css" />';
	$colors_css = '<link rel="stylesheet" type="text/css" href="'.$website_css_styler_css_folder.'Colors.css" />';
	#$stories_css = '<link rel="stylesheet" type="text/css" href="'.$website_css_styler_css_folder.'Stories.css" />';
	$mobile_css = '<link rel="stylesheet" type="text/css" href="'.$website_css_styler_css_folder.'Mobile.css" />';
	$image_hover_css = '<link rel="stylesheet" type="text/css" href="'.$website_css_styler_css_folder.'Image_Hover.css" />';

	# Website CSS definer
	$website_css_files = "\n\n"."<!-- CSS files -->".'
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css" />
<link rel="stylesheet" type="text/css" href="'.$website_css_styler_css_folder.'W3.css" />
'.$main_css.'
'.$website_css_file_loader.'
'.$colors_css.'
'.$mobile_css.''
."\n".
$notification_css;
}

else if ($website_uses_custom_layout_setting == False) {
	# Website CSS definer
	$website_css_files = "\n".'<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
'.
$notification_css;
}

if ($site_is_prototype == False and $website_uses_custom_layout_setting == False) {
	# Website JavaScript definer
	$website_js_files = '
<!-- JavaScript files -->
<script src="'.$website_function_javascript_folder.'Tabs.js"></script>
<script src="'.$website_function_javascript_folder.'Redirect.js" onLoad="Rodar();"></script>
<script src="'.$website_function_javascript_folder.'Show Hide.js"></script>
<script src="'.$website_function_javascript_folder.'Mobile Side Menu.js"></script>
<script src="'.$website_function_javascript_folder.'Set Revised Date.js"></script>'.$open_chapter_by_keys.$write_chapter_script.'
<script src="'.$website_function_javascript_folder.'Change Button Color.js"></script>'
."\n".
$edit_button_script.
$new_design_script.
'<script src="https://code.jquery.com/jquery-3.5.1.js"></script>'."\n";
}

else if ($website_uses_custom_layout_setting == False) {
#Website JavaScript definer
	$website_js_files = '<script src="'.$website_function_javascript_folder.'Redirect.js" onLoad="Rodar();"></script>
<script src="'.$website_function_javascript_folder.'Set Revised Date.js"></script>'."\n";
}

?>