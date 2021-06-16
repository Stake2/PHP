<?php 

if ($website_new_design_setting == False and $website_not_so_much_space_setting == False) {
	$computer_space = '<div class="'.$computer_variable.'"><br /><br /><br /><br /><br /><br /><br /><br />'.$div_close."\n";
}

else if ($website_not_so_much_space_setting == False) {
	$computer_space = '<div class="'.$computer_variable.'"><br /><br /><br />'.$div_close;
}

else if ($website_not_so_much_space_setting == True) {
	$computer_space = '';
}

# Blank website generator using templates
if (!isset($website_title_header) and !isset($website_meta_description) and $website_deactivate_header_setting == False) {
	$website_image = $cdnimg.'Template.png';
	$website_image_link = $website_image;
	$website_image_size_computer = 33;
	$website_image_size_mobile = 44;

	if (in_array($website_language, $en_languages_array)) {
		$website_title_header = 'Placeholder for the Title: [Icon]';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$website_title_header = 'Espaço reservado para o Título: [Ícone]';
	}

	$main_website_image_computer = '<img src="'.$website_image_link.'" width="'.$website_image_size_computer.'%" class="'.$colortext.' '.$computer_variable.'" style="'.$border2.''.$rounded_border_style_2.'" />';
	$main_website_image_mobile = '<img src="'.$website_image_link.'" width="'.$website_image_size_mobile.'%" class="'.$colortext.' '.$mobile_variable.'" style="'.$border2.''.$rounded_border_style_2.'" />';

	if ($website_deactivate_image_link_setting == False) {
		$website_image_button_computer = '<div class="'.$computer_variable.'">'.'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="window.open('."'".$website_image_link."'".')">'.'<'.$m.'>'.ucfirst($website_image_link_text).': '.$icons[2].'</'.$m.'>'.'</button>'.$div_close."\n";

		$website_image_button_mobile = '<div class="'.$mobile_variable.'">'.'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="window.open('."'".$website_image_link."'".')">'.'<'.$m.'>'.ucfirst($website_image_link_text).': '.$icons[2].'</'.$m.'>'.'</button>'.$div_close."\n";
	}

	$website_images_variable = $main_website_image_computer."\n".$website_image_button_computer.
	$main_website_image_mobile."\n".$website_image_button_mobile;

	$styletext2 = '';

	$website_header_wrapper = $computer_space.

/*
	Create_Element("div", $default_background_color, '<'.$n.' class="'.$first_text_color.' '.$zoom_animation_class.'"><p><br /><b>'.$website_title_header.'</b><br /><br /><p></'.$n.'>'."\n".'
	<hr class="'.$first_full_border.'" />
	'.$website_images_variable.'
	<'.$n.' class="'.$first_text_color.' '.$computer_variable.'">'.$website_meta_description.'</'.$n.'>
	<'.$m.' class="'.$first_text_color.' '.$mobile_variable.'">'.$website_meta_description.'</'.$m.'>
	<br />
	', 'style="margin-left:5%;margin-right:5%;'.$first_border_color.$rounded_border_style_2.'"')
*/

	'<div class="'.$default_background_color.'" '.$styletext2.' style="margin-left:5%;margin-right:5%;'.$first_border_color.$rounded_border_style_2.'">
	<'.$n.' class="'.$first_text_color.' '.$zoom_animation_class.'"><p><br /><b>'.$website_title_header.'</b><br /><br /><p></'.$n.'>'."\n".'
	<hr class="'.$first_full_border.'" />
	'.$website_images_variable.'
	<'.$n.' class="'.$first_text_color.' '.$computer_variable.'">'.$website_meta_description.'</'.$n.'>
	<'.$m.' class="'.$first_text_color.' '.$mobile_variable.'">'.$website_meta_description.'</'.$m.'>
	<br />'

	.$div_close."\n";	
}

if ($website_type == $normal_website_type and $website_deactivate_header_setting == False or in_array($website_name, $years_array) and $website_deactivate_header_setting == False and $website_uses_custom_layout_setting == False) {
	if ($website_name == $website_diario) {
		$diario_blocks_text_on_header = $diario_blocks_text.'<br />'."\n";
		$things_of_diario_one = '<'.$n.' class="'.$first_text_color.' '.$computer_variable.'">'.$diario_blocks_text_on_header.'</'.$n.'>
		';
		$things_of_diario_two = '<'.$m.' class="'.$first_text_color.' '.$mobile_variable.'">'.$diario_blocks_text_on_header.'</'.$m.'>
		';
	}

	if ($website_name != $website_diario) {
		$diario_blocks_text_on_header = '';
		$things_of_diario_one = '';
		$things_of_diario_two = '';
	}

	$website_header_wrapper = $computer_space.
	'<div class="w3-center '.$default_background_color.' '.$first_full_border.'" style="margin-left:5%;margin-right:5%;'.$rounded_border_style_2.'">'.
	$div_zoom_animation.'<'.$n.' class="w3-center '.$first_text_color.' '.$zoom_animation_class.' '.$computer_variable.'"><p><br /><b>'.$website_header_title.'</b><br /><br /><p></'.$n.'>'.$div_close."\n".
	$div_zoom_animation.'<'.$m.' class="'.$first_text_color.' '.$zoom_animation_class.' '.$mobile_variable.'"><p><br /><b>'.$website_header_title.'</b><br /><br /><p></'.$m.'>'.$div_close."\n".'
	<hr class="'.$header_full_border.'" />
	<div class="w3-center">'.$website_images_variable.$div_close.
	$div_zoom_animation.'<'.$n.' class="w3-center '.$first_text_color.' '.$computer_variable.'">'.$website_header_description.'</'.$n.'>'.$div_close.
	$div_zoom_animation.'<'.$m.' class="w3-center '.$first_text_color.' '.$mobile_variable.'">'.$website_header_description.'</'.$m.'>'.$div_close
	.$things_of_diario_one.$things_of_diario_two.
	'<br />
	'.$div_close."\n";
}

# Story website header generator
if ($website_type == $story_website_type and $website_uses_custom_layout_setting == False) {
	if ($story_status != $story_status_texts[1] or $story_status != $story_status_texts[2]) {
		$new_chapter_text = '';
	}

	if ($story_status == $story_status_texts[1] or $story_status == $story_status_texts[2]) {
		$new_chapter_text = '<span class="'.$third_text_color.'">'.' ['.$new_text.'!]'.$spanc;
	}

	$text = Create_Element("div", $default_background_color.' '.$first_full_border, $margin.'<'.$n.' class="'.$first_text_color.' '.$zoom_animation_class.'"><p><br /><b>'.$website_header_title.'</b><br /><br /><p></'.$n.'>'.$div_close."\n".
	'<hr class="'.$header_full_border.'" />'."\n".
	$website_images."\n".
	format('<'.$m.' class="'.$first_text_color.'" style="'.$margincss1.'">{}</'.$m.'>'."\n", $website_header_description).
	'<'.$m.' class="'.$first_text_color.'">'."\n".
	$author_text.": ".'<span class="'.$second_text_color.'">'.$author_name."<br />".'</span>'."\n".
	$chapters_text.': <span class="'.$second_text_color.'">'.$chapters.$new_chapter_text.'</span><br />'."\n".
	$read_and_reader_texts_array[6].': <span class="'.$second_text_color.'">'.$readers_number.' '.$iconbookreader.'</span><br />'."\n".
	$story_creation_date.': <span class="'.$second_text_color.'">'.$story_creation_date.'</span><br />'."\n".
	'Status: <span class="'.$second_text_color.'">'.$story_status_text.'</span></'.$m.'>'.'<br />'."\n", 'style="margin-left:5%;margin-right:5%;'.$rounded_border_style_2.'"');

	$website_header_wrapper = $computer_space.
	Create_Element("div", $default_background_color.' '.$first_full_border, $margin."\n".'<'.$n.' class="'.$first_text_color.' '.$zoom_animation_class.'"><p><br /><b>'."\n".$website_header_title.'</b><br /><br /><p></'.$n.'>'.$div_close."\n".
	'<hr class="'.$header_full_border.'" />'."\n".
	$website_images."\n".
	format('<'.$m.' class="'.$first_text_color.'" style="'.$margincss1.'">{}</'.$m.'>'."\n", $website_header_description).
	'<'.$m.' class="'.$first_text_color.'">'."\n".
	$author_text.": ".'<span class="'.$second_text_color.'">'.$author_name."<br />".'</span>'."\n".
	$chapters_text.': <span class="'.$second_text_color.'">'.$chapters.$new_chapter_text.'</span><br />'."\n".
	$read_and_reader_texts_array[6].': <span class="'.$second_text_color.'">'.$readers_number.' '.$iconbookreader.'</span><br />'."\n".
	$story_creation_date.': <span class="'.$second_text_color.'">'.$story_creation_date.'</span><br />'."\n".
	'Status: <span class="'.$second_text_color.'">'.$story_status_text.'</span></'.$m.'>'."\n".
	'<br />'."\n", 'style="margin-left:5%;margin-right:5%;'.$rounded_border_style_2.'"');
}

$change_website_title_script = '<script>
var old_website_title, current_website_title;

function Get_Title() {
	old_website_title = document.title;
	current_website_title = document.title;
}

function Change_Title() {
	document.title = "(1) " + document.title;
	current_website_title = document.title;
}

function Reset_Title(mode, source = null) {
	if (mode == "chapter") {
		document.title = current_website_title;

		if (source == "notification") {
			document.title = document.title.replace("(1) ", "");
		}
	}

	if (mode == "notification") {
		document.title = document.title.replace("(1) ", "");
		current_website_title = document.title;
	}
}

function Add_To_Website_Title(text_to_add, source = null) {
	Reset_Title("chapter", source);
	document.title = document.title + " " + text_to_add;
}
</script>';

if ($website_has_notifications == True and $website_deactivate_notification_setting != True) {
	$website_notification = $website_notification;
}

else {
	$website_notification = '';
}

if ($website_new_design_setting == True) {
	$website_wrapper_show = $website_header_wrapper;
}

if ($website_deactivate_header_setting == True) {
	$website_wrapper_show = '';
}

if ($website_deactivate_header_setting == False) {
	$website_wrapper_show = $website_header_wrapper;
}

if ($website_deactivate_all_setting == True) {
	$center = null;
}

if ($website_deactivate_all_setting == False and $website_is_not_centered_setting == False) {
	$center = '<center>';
}

if ($website_is_not_centered_setting == True) {
	$center = '';
}

if ($website_uses_custom_layout_setting == False) {
	$website_header = '<head>'.
$website_head.
'</head>
<body onLoad="Define_Colors_And_Styles();">
'.$center."\n"."\n".
$buttons."\n".

$change_website_title_script."\n".

$website_wrapper_show."\n".

$website_notification."\n";
}

if ($website_uses_custom_layout_setting == True) {
	$website_header = '<head>'.$website_head."\n".
"</head>"."\n".
"<body>"."\n"."\n".
$custom_website_header;
}

?>