<?php 

$computer_space = '<div class="'.$computer_variable.'"><br /><br /><br /><br /><br /><br /><br /><br />'.$div_close."\n";

if ($website_info["type"] == $normal_website_type and $website_function_settings["header"] == True and $website_settings["custom_layout"] == False) {
	$diario_blocks_text_on_header = "";
	$things_of_diario_one = "";
	$things_of_diario_two = "";

	if ($website_info["english_title"] == $website_titles["Diary"]) {
		$diario_blocks_text_on_header = $diario_blocks_text.'<br />'."\n";
		$things_of_diario_one = '<'.$h2_element.' class="'.$first_text_color.' '.$computer_variable.'">'.$diario_blocks_text_on_header.'</'.$h2_element.'>
		';
		$things_of_diario_two = '<'.$h4_element.' class="'.$first_text_color.' '.$mobile_variable.'">'.$diario_blocks_text_on_header.'</'.$h4_element.'>
		';
	}

	$website_header_wrapper = "\n".$computer_space."\n".
	"<!-- Website header -->"."\n".
	'<div class="w3-center '.$default_background_color.' '.$first_full_border.'" style="margin-left:5%;margin-right:5%;'.$rounded_border_style_2.'">'."\n".
	$div_zoom_animation."\n".
	"<!-- Website computer title -->"."\n".
	'<'.$h2_element.' class="w3-center '.$first_text_color.' '.$zoom_animation_class.' '.$computer_variable.'">'."\n".
	'<p><br /><b>'.$website_info["language_title_with_icon"].'</b><br /><br /><p>'."\n".
	'</'.$h2_element.'>'."\n".
	$div_close."\n"."\n".
	$div_zoom_animation."\n".
	"<!-- Website mobile title -->"."\n".
	'<'.$h4_element.' class="'.$first_text_color.' '.$zoom_animation_class.' '.$mobile_variable.'">'."\n".
	'<p><br /><b>'.$website_info["language_title_with_icon"].'</b><br /><br /><p>'."\n".
	'</'.$h4_element.'>'."\n".
	$div_close."\n"."\n".
	$header_hr."\n"."\n".
	"<!-- Website images -->"."\n".
	'<div class="w3-center">'."\n".
	$website_images_variable.$div_close."\n"."\n".
	$div_zoom_animation."\n".
	"<!-- Website computer header description-->"."\n".
	'<'.$h2_element.' class="w3-center '.$first_text_color.' '.$computer_variable.'">'."\n".
	$website_info["header_description"]."\n".
	'</'.$h2_element.'>'."\n".
	$div_close."\n"."\n".
	$div_zoom_animation."\n".
	"<!-- Website mobile header description-->"."\n".
	'<'.$h4_element.' class="w3-center '.$first_text_color.' '.$mobile_variable.'">'."\n".
	$website_info["header_description"]."\n".
	'</'.$h4_element.'>'.$div_close."\n".
	$things_of_diario_one.$things_of_diario_two.
	"<br />"."\n".
	$div_close;
}

# Story website header generator
if ($website_info["type"] == $story_website_type and $website_settings["custom_layout"] == False) {
	if ($website_settings["hide_sensitive_data"] == True) {
		$author_name = "Lorem ipsum";

		$website_header_description = $synopsis_text.": \""."Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."."\"";
	}

	$website_header_wrapper = "<!-- Website header -->"."\n".
	$div_zoom_animation."\n";

	$website_header_wrapper .= "\n"."<!-- Website computer title -->"."\n".
	'<'.$h2_element.' class="w3-center '.$first_text_color.' '.$zoom_animation_class.' '.$computer_variable.'">'."\n".
	'<p><br /><b>'.$website_info["language_title_with_icon"].'</b><br /><br /><p>'."\n".
	'</'.$h2_element.'>'."\n".
	$div_close."\n"."\n".
	$div_zoom_animation."\n".
	"<!-- Website mobile title -->"."\n".
	'<'.$h4_element.' class="'.$first_text_color.' '.$zoom_animation_class.' '.$mobile_variable.'">'."\n".
	'<p><br /><b>'.$website_info["language_title_with_icon"].'</b><br /><br /><p>'."\n".
	'</'.$h4_element.'>'."\n".
	$div_close."\n"."\n".
	$header_hr."\n"."\n";

	$website_header_wrapper .= "<!-- Website images -->"."\n".
	'<div class="w3-center">'."\n".
	$website_images_variable.
	$div_close."\n".
	"\n".
	$header_hr."\n"."\n";

	$website_header_wrapper .= format('<'.$h4_element.' class="'.$first_text_color.'" style="'.$margincss1.'">{}</'.$h4_element.'>'."\n", $website_info["header_description"])."\n"."\n";

	$website_header_wrapper .= '<'.$h4_element.' class="'.$first_text_color.'">'."\n".
	$story_info["author_text"].": ".format($website_info["second_text_color_span"], $author_name)."<br />"."\n".
	$story_info["chapter_text"] .": ".format($website_info["second_text_color_span"], $chapters." ".$icons_array["open book"].$new_chapter_text)."<br />"."\n";

	if ($readers_number != 0 and $readers[0] != "No Readers - Sem Leitores") {
		$website_header_wrapper .= $story_info["readers_text"].": ".format($website_info["second_text_color_span"], $readers_number.' '.$icons_array["reader"])."<br />"."\n";
	}

	$website_header_wrapper .= $story_creation_date_text.": ".format($website_info["second_text_color_span"], $story_creation_date)."<br />"."\n".
	"Status: ".format($website_info["second_text_color_span"], $story_status_text)."</".$h4_element.">"."\n".
	'<br />'."\n";

	$website_header_wrapper = $computer_space.Create_Element("div", $default_background_color.' '.$first_full_border, $website_header_wrapper, 'style="margin-left:5%;margin-right:5%;'.$rounded_border_style_2.'"');
}

$website_notification = "";

if ($website_settings["notifications"] == True) {
	$website_notification = "\n".$website_notification;
}

if ($website_settings["custom_layout"] == False) {
	$website_header = "\n".'<body onLoad="Define_Colors_And_Styles();">
<center>'."\n"."\n".
$website_buttons."\n".

$change_website_title_script."\n".

$website_header_wrapper.

$website_notification."\n";
}

if ($website_settings["custom_layout"] == True) {
	$website_header = '<head>'.$website_head."\n".
"</head>"."\n".
"<body>"."\n"."\n".
$custom_website_header;
}

?>