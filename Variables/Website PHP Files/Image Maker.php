<?php 

$rounded_border_style_to_use = $rounded_border_style_2;

if ($website_settings["custom_website_image_border"] == True) {
	$rounded_border_style_to_use = $custom_website_image_border;
}

$border_style_classes = $border_3px_solid_css_class." ".$first_border_color;

if ($website_settings["no_border_in_website_image"] == True) {
	$border_style_classes = "";
	$rounded_border_style_to_use = "";
}

$main_website_image_computer = "<!-- Computer website image -->"."\n".
"<center>"."\n".
'<img src="'.$website_image_link.'" width="'.$website_image_size_computer.'%" class="w3-center '.$border_style_classes.' '.$computer_variable.' w3-center" style="'.$rounded_border_style_to_use.'" />'."\n".
"</center>"."\n";

$main_website_image_mobile = "<!-- Mobile website image -->"."\n".
"<center>"."\n".
'<img src="'.$website_image_link.'" width="'.$website_image_size_mobile.'%" class="'.$border_style_classes.' '.$mobile_variable.' w3-center" style="'.$rounded_border_style_to_use.'" />'."\n"."</center>"."\n";

$website_image_button_computer = "";
$website_image_button_mobile = "";

if ($website_function_settings["image_link_button"] == True) {
	$website_image_button_computer = "<!-- Computer website image link button -->"."\n".
	'<div class="'.$computer_variable.' w3-center">'."\n".
	'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="window.open('."'".$website_image_link."'".')">'."\n".
	'<'.$h4_element.'>'.ucfirst($website_open_image_in_new_tab_text).': '.$icons[2].'</'.$h4_element.'>'."\n".
	'</button>'."\n".
	$div_close."\n";

	$website_image_button_mobile = "<!-- Mobile website image link button -->"."\n".
	'<div class="'.$mobile_variable.' w3-center">'."\n".
	'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="window.open('."'".$website_image_link."'".')">'."\n".
	'<'.$h4_element.'>'.ucfirst($website_open_image_in_new_tab_text).': '.$icons[2].'</'.$h4_element.'>'."\n".
	'</button>'."\n".
	$div_close."\n";
}

$website_images_variable = "\n".$main_website_image_computer."\n".$website_image_button_computer."\n".
$main_website_image_mobile."\n".$website_image_button_mobile."\n";

$website_info["image_link"] = $website_image_link;

?>