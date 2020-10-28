<?php 

if ($new_write_style == true) {
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
	$site_css_file_loader = '<link rel="stylesheet" type="text/css" href="'.$cdncss.$website_css_file.'.css" />';
	$main_css = '<link rel="stylesheet" type="text/css" href="'.$cdncss.'Main_CSS.css" />';
	$colors_css = '<link rel="stylesheet" type="text/css" href="'.$cdncss.'Colors Prototype.css" />';
	$stories_css = '<link rel="stylesheet" type="text/css" href="'.$cdncss.'Stories.css" />';
	$mobile_css = '<link rel="stylesheet" type="text/css" href="'.$cdncss.'Mobile.css" />';
	$imghover_css = '<link rel="stylesheet" type="text/css" href="'.$cdncss.'ImgHover.css" />';

#Site CSS definer
	$website_css_files = $site_css_file_loader.'
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css" />
<link rel="stylesheet" type="text/css" href="'.$cdncss.'w3.css" />
'.$main_css.'
'.$colors_css.'
'.$stories_css.'
'.$mobile_css.'
'.$imghover_css."\n".
$notificationcss.
$newdesigncss;
}

else {
	#Site CSS definer
	$website_css_files = '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
'.
$notificationcss.
$newdesigncss;
}

if ($site_is_prototype == false) {
	#Site JavaScript definer
	$sitejs = '<script src="'.$cdnjs.'Search.js"></script>
<script src="'.$cdnjs.'Tabs.js"></script>
<script src="'.$cdnjs.'Redirect.js" onLoad="Rodar();"></script>
<script src="'.$cdnjs.'ShowHide.js"></script>
<script src="'.$cdnjs.'SideMenu.js"></script>
<script src="'.$cdnjs.'Set Revised Date.js"></script>
<script src="'.$cdnjs.'Open Chapter By Keys.js"></script>'."\n".
$editbtnscript.
$newdesignscript.
$write_chapter_script.
'<script src="https://code.jquery.com/jquery-3.5.1.js"></script>'."\n";
}

else {
#Site JavaScript definer
	$sitejs = '<script src="'.$cdnjs.'Redirect.js" onLoad="Rodar();"></script>
<script src="'.$cdnjs.'Set Revised Date.js"></script>'."\n";
}

?>