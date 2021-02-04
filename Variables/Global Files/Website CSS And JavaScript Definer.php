<?php 

if ($new_write_style == True) {
	$write_chapter_script = '<script src="'.$cdnjs.'WriteChapter.js"></script>'."\n";
}

else {
	$write_chapter_script = '';
}

# CSS Pack generator by class
/*
Make a CSS Pack Generator class that sets all the style variables using an array that the specific website contains
The styles array of the website contains all the styles used for that website

Make a variable in the Website.php file that is called $css_pack that contains the style array of the website
Make the website style arrays inside each folder of each website, called "CSS Pack.php"

*/

if ($site_is_prototype == false) {
	$site_css_file_loader = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.$website_css_file.'.css" />';
	$main_css = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'Main_CSS.css" />';
	$colors_css = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'Colors Prototype.css" />';
	$stories_css = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'Stories.css" />';
	$mobile_css = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'Mobile.css" />';
	$imghover_css = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'ImgHover.css" />';

#Website CSS definer
	$website_css_files = $site_css_file_loader.'
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn_css.'w3.css" />
'.$main_css.'
'.$colors_css.'
'.$stories_css.'
'.$mobile_css.'
'.$imghover_css."\n".
$notificationcss.
$newdesigncss;
}

else {
	#Website CSS definer
	$website_css_files = '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
'.
$notificationcss.
$newdesigncss;
}

if ($site_is_prototype == false) {
	#Website JavaScript definer
	$sitejs = '<script src="'.$cdnjs.'Search.js"></script>
<script src="'.$cdnjs.'Tabs.js"></script>
<script src="'.$cdnjs.'Redirect.js" onLoad="Rodar();"></script>
<script src="'.$cdnjs.'ShowHide.js"></script>
<script src="'.$cdnjs.'SideMenu.js"></script>
<script src="'.$cdnjs.'Set Revised Date.js"></script>
<script src="'.$cdnjs.'Open Chapter By Keys.js"></script>
<script src="'.$cdnjs.'Change Button Color.js"></script>'."\n".
$edit_button_script.
$newdesignscript.
$write_chapter_script.
'<script src="https://code.jquery.com/jquery-3.5.1.js"></script>'."\n";
}

else {
#Website JavaScript definer
	$sitejs = '<script src="'.$cdnjs.'Redirect.js" onLoad="Rodar();"></script>
<script src="'.$cdnjs.'Set Revised Date.js"></script>'."\n";
}

?>