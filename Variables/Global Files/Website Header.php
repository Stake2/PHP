<?php 

if ($website_new_design_setting == false and $website_not_so_much_space_setting == false) {
	$computerspace = '<div class="'.$computer_variable.'"><br /><br /><br /><br /><br /><br /><br /><br />'.$div_close."\n";
}

elseif ($website_not_so_much_space_setting == false) {
	$computerspace = '<div class="'.$computer_variable.'"><br /><br /><br />'.$div_close;
}

elseif ($website_not_so_much_space_setting == True) {
	$computerspace = '';
}

#if ($website_name != $sitediario and $site != $sitediario and $website_name == $sitepqnt or $website_name == $sitenazzevo) {
#	$website_meta_description = $website_meta_description.'<br /> <b>'.$div_zoom_animationlouco.$orangespan.$redondodesc.$spanc.$div_close.'</b>'."\n";
#	$website_header_description = $website_header_description.'<br /> <b>'.$div_zoom_animationlouco.$orangespan.$redondodesc.$spanc.$div_close.'</b>'."\n";
#}
#
#if ($website_name != $sitediario and $site != $sitediario and $website_name != $sitepqnt and $website_name != $sitenazzevo ) {
#	$website_meta_description = $website_meta_description.'<br /> <b>'.$div_zoom_animationlouco.$bluespan.$redondodesc.$spanc.$div_close.'</b>'."\n";
#	$website_header_description = $website_header_description.'<br /> <b>'.$div_zoom_animationlouco.$bluespan.$redondodesc.$spanc.$div_close.'</b>'."\n";
#}


# Website Info Class
/*

A Class that contains the title of the website, the description, images
A Class that contains the styles of the selected website


*/

#require $website_classes_php;

function format($text, $parameters) {
	$parameters = (array)$parameters;

	$text = preg_replace_callback("#\{\}#",
	function ($parameters_array) {
		static $i = 0;
		return '{'.($i++).'}';
	},
	$text);

	return str_replace(
		array_map(
		function ($key) {
			return '{'.$key.'}';
		},

		array_keys($parameters)),

		array_values($parameters),

		$text
	);

}

# Blank website generator using templates
if (!isset($website_title_html) and !isset($website_meta_description) and $website_deactivate_header_setting == false) {
	$website_image = $cdnimg.'Template.png';
	$website_image_link = $website_image;
	$website_image_size_computer = 33;
	$imagesize2 = 44;

	if (in_array($website_language, $en_languages_array)) {
		$website_title_html = 'Placeholder for the Title: [Icon]';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$website_title_html = 'Espaço reservado para o Título: [Ícone]';
	}

	$main_website_image_computer = '<img src="'.$website_image_link.'" width="'.$website_image_size_computer.'%" class="'.$colortext.' '.$computer_variable.'" style="'.$border2.''.$rounded_border_style_2.'" />';
	$main_website_image_mobile = '<img src="'.$website_image_link.'" width="'.$imagesize2.'%" class="'.$colortext.' '.$mobile_variable.'" style="'.$border2.''.$rounded_border_style_2.'" />';

	$website_image_button_computer = '<div class="'.$computer_variable.'">'.'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="window.open('."'".$website_image_link."'".')">'.'<'.$m.'>'.ucfirst($website_image_link_text).': '.$icons[2].'</'.$m.'>'.'</button>'.$div_close;
	$website_image_button_mobile = '<div class="'.$mobile_variable.'">'.'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="window.open('."'".$website_image_link."'".')">'.'<'.$m.'>'.ucfirst($website_image_link_text).': '.$icons[2].'</'.$m.'>'.'</button>'.$div_close;

	$website_images_variable = $main_website_image_computer."\n".$website_image_button_computer.
	"\n".
	$main_website_image_mobile."\n".$website_image_button_mobile.
	"\n";

	$styletext2 = '';

	$website_header_wrapper = $computerspace.
	'<div class="'.$default_background_color.'" '.$styletext2.' style="margin-left:5%;margin-right:5%;'.$first_border_color.$rounded_border_style_2.'">
	<'.$n.' class="'.$colortext.' '.$zoom_animation_class.'"><p><br /><b>'.$website_title_html.'</b><br /><br /><p></'.$n.'>'."\n".'
	<hr class="'.$first_full_border.'" />
	'.$website_images_variable.'
	<'.$n.' class="'.$colortext.' '.$computer_variable.'">'.$website_meta_description.'</'.$n.'>
	<'.$m.' class="'.$colortext.' '.$mobile_variable.'">'.$website_meta_description.'</'.$m.'>
	<br />
	'.$div_close."\n";	
}

if ($sitetype1 == $website_types_array[0] and $website_deactivate_header_setting == false or $sitetype1 == 'Years' and $website_deactivate_header_setting == false) {
	if ($site == $sitediario) {
		$blockstextonheader = $blockstext.'<br />'."\n";
		$diariostuff1 = '<'.$n.' class="'.$colortext.' '.$computer_variable.'">'.$blockstextonheader.'</'.$n.'>
		';
		$diariostuff2 = '<'.$m.' class="'.$colortext.' '.$mobile_variable.'">'.$blockstextonheader.'</'.$m.'>
		';
	}

	if ($site != $sitediario) {
		$blockstextonheader = '';
		$diariostuff1 = '';
		$diariostuff2 = '';
	}

	$website_header_wrapper = $computerspace.
	'<div class="'.$default_background_color.' '.$first_full_border.'" style="margin-left:5%;margin-right:5%;'.$rounded_border_style_2.'">'.
	$div_zoom_animation.'<'.$n.' class="'.$first_text_color.' '.$zoom_animation_class.' '.$computer_variable.'"><p><br /><b>'.$website_header_title.'</b><br /><br /><p></'.$n.'>'.$div_close."\n".
	$div_zoom_animation.'<'.$m.' class="'.$first_text_color.' '.$zoom_animation_class.' '.$mobile_variable.'"><p><br /><b>'.$website_header_title.'</b><br /><br /><p></'.$m.'>'.$div_close."\n".'
	<hr class="'.$header_full_border.'" />
	'.$website_images_variable.
	$div_zoom_animation.'<'.$n.' class="'.$first_text_color.' '.$computer_variable.'">'.$website_header_description.'</'.$n.'>'.$div_close.
	$div_zoom_animation.'<'.$m.' class="'.$first_text_color.' '.$mobile_variable.'">'.$website_header_description.'</'.$m.'>'.$div_close
	.$diariostuff1.$diariostuff2.
	'<br />
	'.$div_close."\n";
}

# Story website header generator
if ($sitetype1 == $website_types_array[1]) {
	if ($story_status != $story_statuses[1] or $story_status != $story_statuses[2]) {
		$newchaptertext = '';
	}

	if ($story_status == $story_statuses[1] or $story_status == $story_statuses[2]) {
		$newchaptertext = '<span class="'.$third_text_color.'">'.' ['.$newtxt.'!]'.$spanc;
	}

/*
	$website_header_wrapper = $computerspace.
	'<div style="background-color:black;margin-left:5%;margin-right:5%;'.$border.''.$rounded_border_style_2.'">'."\n".
	$margin.'<'.$n.' class="'.$colortext.' '.$zoom_animation_class.'"><p><br /><b>'.$website_title.'</b><br /><br /><p></'.$n.'>'.$div_close."\n".
	'<hr class="'.$third_full_border.'" />'."\n".
	$website_images."\n".
	'<'.$m.' class="'.$colortext.'" style="'.$margincss1.'">'.$website_header_description.'</'.$m.'>'."\n".
	'<'.$m.' class="'.$colortext.'">'."\n".
	$author_text.": ".'<span class="'.$colorsubtext.'">'.$author_name."<br />".'</span>'."\n".
	$chapters_text.': <span class="'.$colorsubtext.'">'.$chapters.$newchaptertext.'</span><br />'."\n".
	$read_texts_array[6].': <span class="'.$colorsubtext.'">'.$readersnumb.' '.$iconbookreader.'</span><br />'."\n".
	$chapter_date_text.': <span class="'.$colorsubtext.'">'.$story_creation_date.'</span><br />'."\n".
	'Status: <span class="'.$colorsubtext.'">'.$statustxt.'</span></'.$m.'>'.'<br />'."\n".
	'</div>'."\n";
*/

	$website_header_wrapper = $computerspace.
	'<div class="'.$default_background_color.' '.$first_full_border.'" style="margin-left:5%;margin-right:5%;'.$rounded_border_style_2.'">'."\n".
	$margin.'<'.$n.' class="'.$first_text_color.' '.$zoom_animation_class.'"><p><br /><b>'.$website_header_title.'</b><br /><br /><p></'.$n.'>'.$div_close."\n".
	'<hr class="'.$header_full_border.'" />'."\n".
	$website_images."\n".
	format('<'.$m.' class="'.$first_text_color.'" style="'.$margincss1.'">{}</'.$m.'>'."\n", $website_header_description).
	'<'.$m.' class="'.$first_text_color.'">'."\n".
	$author_text.": ".'<span class="'.$second_text_color.'">'.$author_name."<br />".'</span>'."\n".
	$chapters_text.': <span class="'.$second_text_color.'">'.$chapters.$newchaptertext.'</span><br />'."\n".
	$read_texts_array[6].': <span class="'.$second_text_color.'">'.$readersnumb.' '.$iconbookreader.'</span><br />'."\n".
	$chapter_date_text.': <span class="'.$second_text_color.'">'.$story_creation_date.'</span><br />'."\n".
	'Status: <span class="'.$second_text_color.'">'.$statustxt.'</span></'.$m.'>'.'<br />'."\n".
	'</div>'."\n";
}

if ($website_has_notifications == True and $website_deactivate_notification_setting == false) {
	$changetitlescript = '<script>
var olddocumenttitle = "";

function ChangeTitle() {
	olddocumenttitle = document.title;
	document.title = "(1) " + document.title;
}

function ResetTitle() {
	document.title = olddocumenttitle;
}
</script>';

	$sitenotification = $sitenotification;
}

else {
	$changetitlescript = '';

	$sitenotification = '';
}

if ($website_new_design_setting == True) {
	$sitewrappershow = $website_header_wrapper;
}

if ($website_deactivate_header_setting == True) {
	$sitewrappershow = '';
}

if ($website_deactivate_header_setting == false) {
	$sitewrappershow = $website_header_wrapper;
}

if ($deactivate_js == True) {
	$site_js = null;
}

if ($deactivate_js == false) {
	$site_js = $sitejs;
}

if ($website_deactivate_all_setting == True) {
	$center = null;
}

if ($website_deactivate_all_setting == false) {
	$center = '<center>';
}

$website_header = '<head>'.
$website_head."\n".
$site_js.
'</head>
<body>
'.$center."\n"."\n".
$buttons."\n".

$changetitlescript."\n".

$sitewrappershow."\n".

$sitenotification."\n";

?>