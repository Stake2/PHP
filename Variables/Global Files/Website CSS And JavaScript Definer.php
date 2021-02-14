<?php 

$write_chapter_script = "\n".'<script src="'.$cdnjs.'Write Chapter.js"></script>'."\n";

# CSS Pack generator by class
/*
Make a CSS Pack Generator class that sets all the style variables using an array that the specific website contains
The styles array of the website contains all the styles used for that website

Make a variable in the Website.php file that is called $css_pack that contains the style array of the website
Make the website style arrays inside each folder of each website, called "CSS Pack.php"

*/

if ($site_is_prototype == false) {
	$website_css_file_loader = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.$website_css_file.'.css" />';
	$main_css = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'Main_CSS.css" />';
	$colors_css = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'Colors Prototype.css" />';
	$stories_css = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'Stories.css" />';
	$mobile_css = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'Mobile.css" />';
	$image_hover_css = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'Image Hover.css" />';

#Website CSS definer
	$website_css_files = $website_css_file_loader.'
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn_css.'w3.css" />
'.$main_css.'
'.$colors_css.'
'.$stories_css.'
'.$mobile_css.'
'.$image_hover_css."\n".
$notification_css.
$new_design_css;
}

else {
	#Website CSS definer
	$website_css_files = '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
'.
$notification_css.
$new_design_css;
}

if ($site_is_prototype == False) {
	#Website JavaScript definer
	$sitejs = '<script src="'.$cdnjs.'Search.js"></script>
<script src="'.$cdnjs.'Tabs.js"></script>
<script src="'.$cdnjs.'Redirect.js" onLoad="Rodar();"></script>
<script src="'.$cdnjs.'ShowHide.js"></script>
<script src="'.$cdnjs.'SideMenu.js"></script>
<script src="'.$cdnjs.'Set Revised Date.js"></script>
<script src="'.$cdnjs.'Open Chapter By Keys.js"></script>'.$write_chapter_script.'
<script src="'.$cdnjs.'Change Button Color.js"></script>'
."\n".
$edit_button_script.
$new_design_script.
'<script src="https://code.jquery.com/jquery-3.5.1.js"></script>'."\n";
}

else {
#Website JavaScript definer
	$sitejs = '<script src="'.$cdnjs.'Redirect.js" onLoad="Rodar();"></script>
<script src="'.$cdnjs.'Set Revised Date.js"></script>'."\n";
}

?>