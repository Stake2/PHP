<?php 

if ($website_name == $website_the_life_of_littletato) {
	$main_website_image_computer = '<center><img src="'.$website_image_link.'" width="'.$website_image_size_computer.'%" class="w3-center '.$border_3px_solid_css_class." ".$first_border_color.' '.$computer_variable.' w3-center" style="'.$roundedborderstyle4.'" /></center>';

	$main_website_image_mobile = '<center><img src="'.$website_image_link.'" width="'.$website_image_size_mobile.'%" class="'.$border_3px_solid_css_class." ".$first_border_color.' '.$mobile_variable.' w3-center" style="'.$roundedborderstyle4.'" /></center>';
}

else {
	$main_website_image_computer = '<center><img src="'.$website_image_link.'" width="'.$website_image_size_computer.'%" class="w3-center '.$border_3px_solid_css_class." ".$first_border_color.' '.$computer_variable.' w3-center" style="'.$rounded_border_style_2.'" /></center>';

	$main_website_image_mobile = '<center><img src="'.$website_image_link.'" width="'.$website_image_size_mobile.'%" class="'.$border_3px_solid_css_class." ".$first_border_color.' '.$mobile_variable.' w3-center" style="'.$rounded_border_style_2.'" /></center>';
}

if ($website_deactivate_image_link_setting == False) {
	$website_image_button_computer = '<div class="'.$computer_variable.' w3-center">'.'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="window.open('."'".$website_image_link."'".')">'.'<'.$m.'>'.ucfirst($website_image_link_text).': '.$icons[2].'</'.$m.'>'.'</button>'.$div_close."\n";

	$website_image_button_mobile = '<div class="'.$mobile_variable.' w3-center">'.'<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="window.open('."'".$website_image_link."'".')">'.'<'.$m.'>'.ucfirst($website_image_link_text).': '.$icons[2].'</'.$m.'>'.'</button>'.$div_close."\n";
}

if ($website_deactivate_image_link_setting == True) {
	$website_image_button_computer = "";
	$website_image_button_mobile = "";
}

$website_images_variable = $main_website_image_computer."\n".$website_image_button_computer.
$main_website_image_mobile."\n".$website_image_button_mobile;

?>