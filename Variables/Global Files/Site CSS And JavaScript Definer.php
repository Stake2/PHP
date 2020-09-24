<?php 

if ($newwritestyle == true) {
	$write_chapter_script = '<script src="'.$cdnjs.'WriteChapter.js"></script>'."\n";
}

else {
	$write_chapter_script = '';
}

if ($site_is_prototype == false) {
	$colors_css_file = '<link rel="stylesheet" type="text/css" href="'.$cdncss.'Colors.css" />';
	$stories_css_file = '<link rel="stylesheet" type="text/css" href="'.$cdncss.'Stories.css" />';
	$mobile_css_file = '<link rel="stylesheet" type="text/css" href="'.$cdncss.'Mobile.css" />';
	$imghover_css_file = '<link rel="stylesheet" type="text/css" href="'.$cdncss.'ImgHover.css" />';
	$site_css_file_loader = '<link rel="stylesheet" type="text/css" href="'.$cdncss.$sitecssfile.'.css" />';

#Site CSS definer
	$sitecss = $site_css_file_loader.'
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css" />
<link rel="stylesheet" type="text/css" href="'.$cdncss.'w3.css" />
'.$colors_css_file.'
'.$stories_css_file.'
'.$mobile_css_file.'
'.$imghover_css_file."\n".
$notificationcss.
$newdesigncss;
}

else {
	#Site CSS definer
	$sitecss = '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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