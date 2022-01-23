<?php 

$computer_space = '<div class="'.$computer_variable.'"><br /><br /><br /><br /><br /><br /><br /><br />'.$div_close."\n";

$header_hr = '<hr class="'.$header_full_border.'" style="margin-left:3%;margin-right:3%;" />'."\n";

# Blank website generator using templates
if (!isset($website_title_header) and !isset($website_meta_description) and $website_function_settings["header"] == True) {
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

	$rounded_border_style_to_use = $rounded_border_style_2;

	if ($website_settings["custom_website_image_border"] == True) {
		$rounded_border_style_to_use = $custom_website_image_border;
	}

	$main_website_image_computer = '<img src="'.$website_image_link.'" width="'.$website_image_size_computer.'%" class="'.$colortext.' '.$computer_variable.'" style="'.$border2.''.$rounded_border_style_to_use.'" />';
	$main_website_image_mobile = '<img src="'.$website_image_link.'" width="'.$website_image_size_mobile.'%" class="'.$colortext.' '.$mobile_variable.'" style="'.$border2.''.$rounded_border_style_to_use.'" />';

	$website_image_button_computer = "";
	$website_image_button_mobile = "";

	if ($website_function_settings["image_link_button"] == True) {
		$website_image_button_computer = '<div class="'.$computer_variable.'">'."\n".
		'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="window.open('."'".$website_image_link."'".')">'."\n".
		'<'.$h4_element.'>'.ucfirst($website_image_link_text).': '.$icons[2].'</'.$h4_element.'>'."\n".
		'</button>'."\n".$div_close."\n";

		$website_image_button_mobile = '<div class="'.$mobile_variable.'">'."\n".
		'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="window.open('."'".$website_image_link."'".')">'."\n".
		'<'.$h4_element.'>'.ucfirst($website_image_link_text).': '.$icons[2].'</'.$h4_element.'>'."\n".
		'</button>'."\n".
		$div_close."\n";
	}

	$website_images_variable = "\n".$main_website_image_computer."\n".$website_image_button_computer.
	$main_website_image_mobile."\n".$website_image_button_mobile."\n";

	$styletext2 = '';

	$website_header_wrapper = $computer_space.

	'<div class="'.$default_background_color.'" '.$styletext2.' style="margin-left:5%;margin-right:5%;'.$first_border_color.$rounded_border_style_2.'">
	<'.$h2_element.' class="'.$first_text_color.' '.$zoom_animation_class.'"><p><br /><b>'.$website_title_header.'</b><br /><br /><p></'.$h2_element.'>'."\n".
	$header_hr.
	$website_images_variable.'
	<'.$h2_element.' class="'.$first_text_color.' '.$computer_variable.'">'.$website_meta_description.'</'.$h2_element.'>
	<'.$h4_element.' class="'.$first_text_color.' '.$mobile_variable.'">'.$website_meta_description.'</'.$h4_element.'>
	<br />'

	.$div_close."\n";	
}

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
	'<p><br /><b>'.$website_info["language_title"].'</b><br /><br /><p>'."\n".
	'</'.$h2_element.'>'."\n".
	$div_close."\n"."\n".
	$div_zoom_animation."\n".
	"<!-- Website mobile title -->"."\n".
	'<'.$h4_element.' class="'.$first_text_color.' '.$zoom_animation_class.' '.$mobile_variable.'">'."\n".
	'<p><br /><b>'.$website_info["language_title"].'</b><br /><br /><p>'."\n".
	'</'.$h4_element.'>'."\n".
	$div_close."\n"."\n".
	$header_hr."\n"."\n".
	"<!-- Website images -->"."\n".
	'<div class="w3-center">'."\n".
	$website_images_variable.$div_close."\n"."\n".
	$div_zoom_animation."\n".
	"<!-- Website computer header description-->"."\n".
	'<'.$h2_element.' class="w3-center '.$first_text_color.' '.$computer_variable.'">'."\n".
	$website_header_description."\n".
	'</'.$h2_element.'>'."\n".
	$div_close."\n"."\n".
	$div_zoom_animation."\n".
	"<!-- Website mobile header description-->"."\n".
	'<'.$h4_element.' class="w3-center '.$first_text_color.' '.$mobile_variable.'">'."\n".
	$website_header_description."\n".
	'</'.$h4_element.'>'.$div_close."\n".
	$things_of_diario_one.$things_of_diario_two.
	"<br />"."\n".
	$div_close;
}

# Story website header generator
if ($website_info["type"] == $story_website_type and $website_settings["custom_layout"] == False) {
	if ($story_status != $story_status_texts[1] or $story_status != $story_status_texts[2]) {
		$new_chapter_text = "";
	}

	if ($story_website_settings["show_new_chapter_text"] == True) {
		if ($story_status == $story_status_texts[1] or $story_status == $story_status_texts[2]) {
			$new_chapter_text = '<span class="'.$third_text_color.'">'." [".$new_text."!]".$spanc;
		}
	}

	if ($story_website_settings["show_new_chapter_text"] == False) {
		$new_chapter_text = "";
	}

	if ($website_settings["hide_sensitive_data"] == True) {
		$author_name = "Lorem ipsum";

		$website_header_description = $synopsis_text.": \""."Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."."\"";
	}

	$website_header_wrapper = "<!-- Website header -->"."\n".
	$div_zoom_animation."\n";

	$website_header_wrapper .= "\n"."<!-- Website computer title -->"."\n".
	'<'.$h2_element.' class="w3-center '.$first_text_color.' '.$zoom_animation_class.' '.$computer_variable.'">'."\n".
	'<p><br /><b>'.$website_info["language_title"].'</b><br /><br /><p>'."\n".
	'</'.$h2_element.'>'."\n".
	$div_close."\n"."\n".
	$div_zoom_animation."\n".
	"<!-- Website mobile title -->"."\n".
	'<'.$h4_element.' class="'.$first_text_color.' '.$zoom_animation_class.' '.$mobile_variable.'">'."\n".
	'<p><br /><b>'.$website_info["language_title"].'</b><br /><br /><p>'."\n".
	'</'.$h4_element.'>'."\n".
	$div_close."\n"."\n".
	$header_hr."\n"."\n";

	$website_header_wrapper .= "<!-- Website images -->"."\n".
	'<div class="w3-center">'."\n".
	$website_images_variable.
	$div_close."\n".
	"\n".
	$header_hr."\n"."\n";

	$website_header_wrapper .= format('<'.$h4_element.' class="'.$first_text_color.'" style="'.$margincss1.'">{}</'.$h4_element.'>'."\n", $website_header_description)."\n"."\n";

	$website_header_wrapper .= '<'.$h4_element.' class="'.$first_text_color.'">'."\n".
	Define_Text_By_Number($story_author_number, $author_text, $authors_text).": ".'<span class="'.$second_text_color.'">'.$author_name."<br />".'</span>'."\n".
	Define_Text_By_Number($chapters, ucwords($chapter_text), $chapters_text).': <span class="'.$second_text_color.'">'.$chapters." ".$icons_array["open book"].$new_chapter_text.'</span><br />'."\n";

	if ($readers_number != 0 and $readers[0] != "No Readers - Sem Leitores") {
		$website_header_wrapper .= Define_Text_By_Number($readers_number, $reader_text, $readers_text).': <span class="'.$second_text_color.'">'.$readers_number.' '.$icons_array["reader"].'</span><br />'."\n";
	}

	$website_header_wrapper .= $story_creation_date_text.': <span class="'.$second_text_color.'">'.$story_creation_date.'</span><br />'."\n".
	'Status: <span class="'.$second_text_color.'">'.$story_status_text.'</span></'.$h4_element.'>'."\n".
	'<br />'."\n";

	$website_header_wrapper = $computer_space.Create_Element("div", $default_background_color.' '.$first_full_border, $website_header_wrapper, 'style="margin-left:5%;margin-right:5%;'.$rounded_border_style_2.'"');
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

$website_notification = "";

if ($website_settings["notifications"] == True) {
	$website_notification = "\n".$website_notification;
}

if ($website_settings["custom_layout"] == False) {
	$website_header = '<head>'.
$website_head.
'</head>
<body onLoad="Define_Colors_And_Styles();">
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