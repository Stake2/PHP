<?php

# Include Websites Tabs Attributes.php
include $websites_tab_attributes;

$websites_tab_name_text = 'w3-text-black';
$websites_tab_border_color = $border_color_black_css_class;

if ($website_name == $sitediario or $site == $sitediario) {
	$websites_tab_border = $border_1px_solid_black_css_class;
	$websites_tab_number_text_color = $text_blue_css_class;
	$websites_tab_number_hover_color = $text_hover_white_css_class;
	$websites_tab_div_color = 'w3-black';
	$websites_tab_border_color = $border_color_black_css_class;
}

if ($website_name == $sitewatch) {
	$websites_tab_border = $header_full_border;
	$websites_tab_name_text = $first_text_color;
	$websites_tab_number_text_color = $text_yellow_css_class;
	$websites_tab_number_hover_color = $text_hover_white_css_class;
	$websites_tab_div_color = 'w3-black';
	$websites_tab_border_color = $border_color_blue_css_class;
}

if ($website_name == $sitepequenata) {
	$websites_tab_border = $border_1px_solid_black_css_class;
	$websites_tab_name_text = $first_text_color;
	$websites_tab_number_text_color = 'w3-text-orange';
	$websites_tab_number_hover_color = $text_hover_white_css_class;
	$websites_tab_div_color = $tab_background_color;
	$websites_tab_border_color = $border_color_brown_css_class;
}

if ($website_name == $sitenazzevo) {
	$websites_tab_border = $border_1px_solid_black_css_class;
	$websites_tab_number_text_color = $text_blue_css_class;
	$websites_tab_number_hover_color = $text_hover_white_css_class;
	$websites_tab_div_color = 'w3-black';
}

if ($website_name == $sitethingsido or $site == $sitethingsido) {
	$websites_tab_border = $border_1px_solid_black_css_class;
	$websites_tab_number_text_color = $text_blue_css_class;
	$websites_tab_number_hover_color = $text_hover_white_css_class;
	$websites_tab_div_color = 'w3-black';
}

if ($website_name != $sitewatch and $website_name != $sitepequenata and $website_name != $sitenazzevo and $website_name != $sitethingsido and $site != $sitethingsido and $website_name != $sitediario and $site != $sitediario) {
	$websites_tab_border = $border_1px_solid_black_css_class;
	$websites_tab_number_text_color = $text_blue_css_class;
	$websites_tab_number_hover_color = $text_hover_white_css_class;
	$websites_tab_div_color = 'w3-black';
}

if ($website_name == $sitespaceliving) {
	$websites_tab_border = $border_1px_solid_blue_css_class;
	$websites_tab_border_color = $border_1px_solid_blue_css_class;
	$websites_tab_name_text = $first_text_color;
	$websites_tab_number_text_color = $text_blue_css_class;
	$websites_tab_number_hover_color = $text_hover_white_css_class;
	$websites_tab_div_color = 'w3-black';
}

if ($selected_website == $sitedesertisland) {
	$websites_tab_border = $border_1px_solid_black_css_class;
	$websites_tab_number_text_color = 'w3-text-blue';
	$websites_tab_number_hover_color = $text_hover_white_css_class;
	$websites_tab_div_color = $background_yellow_sand_css_class;
}

if ($website_name != $sitewatch and $website_name != $sitepequenata and $website_name != $sitenazzevo and $website_name != $sitethingsido and $site != $sitethingsido and $website_name != $sitediario and $site != $sitediario and $website_name == $sitespaceliving and $selected_website == $sitedesertisland) {
	$websites_tab_border = $border_1px_solid_black_css_class;
	$websites_tab_number_text_color = $websites_tab_global_number_color;
	$websites_tab_number_hover_color = $text_hover_white_css_class;
	$websites_tab_div_color = 'w3-black';
}

echo '<a name="'.$websites_tab_code.'"></a>'."\n".'<br />'."\n";
echo '<div id="'.$websites_tab_code.'" class="city" style="display:none;'.$rounded_border_style_2.'">'."\n";
echo $bigspace."\n";
echo '<div class="'.$computer_variable.'" '.$roundedborderstyle.'>'."\n";
#echo $h42."\n";

echo '<'.$m.' class="'.$websites_tab_border_color.' '.$websites_tab_div_color.' '.$border_3px_solid_css_class." ".$websites_tab_border_color.'" style="margin:10%;'.$rounded_border_style_2.'">';

echo $margin."\n";
echo '<center>'."\n";
echo $div_zoom_animation."\n";
echo '<'.$n.' class="'.$computer_variable.' '.$websites_tab_name_text.'" style="'.$rounded_border_style_2.'"><p></p><br /><b>'.$websites_tab_button_name.'<span class="'.$websites_tab_number_text_color.' '.$websites_tab_number_hover_color.'">'.$websites_number_text.$spanc.' '.$websites_tab_button_icon.'</b><br /><br /><p></p></'.$n.'>'."\n";
echo $div_close."\n";
echo '<hr class="'.$computer_variable.' '.$websites_tab_border.'" />'."\n";
echo $div_zoom_animation."\n";
echo '<'.$m.' class="'.$websites_tab_div_color.'" style="'.$rounded_border_style_2.'">'."\n";

$i = 0;
while ($i <= $websites_number) {
	echo $websites_buttons_array[$i];
	echo "\n";
	$i++;
}

echo $h4_close."\n";
echo $div_close."\n";
echo "</center>"."\n";
echo $div_close."\n";
echo $h4_close."\n";
echo $div_close."\n";

echo "\n";

echo '<div class="'.$mobile_variable.'">'."\n";
#echo $h42."\n";

echo '<'.$m.' class="'.$websites_tab_border_color.' '.$websites_tab_div_color.' '.$border_3px_solid_css_class." ".$websites_tab_border_color.'" style="margin:10%;'.$rounded_border_style_2.'">';

echo '<div class="'.$mobile_variable.'">'."\n".$margin.$div_close."\n";
echo "<center>"."\n";
echo $div_zoom_animation."\n";
echo '<'.$n.' class="'.$mobile_variable.' '.$websites_tab_name_text.'" style="'.$rounded_border_style_2.'"><p></p><br /><b>'.$websites_tab_button_name.'<span class="'.$websites_tab_number_text_color.' '.$websites_tab_number_hover_color.'">'.$websites_number_text.$spanc.' '.$websites_tab_button_icon.'</b><br /><br /><p></p></'.$n.'>'."\n";
	
echo $div_close."\n";
echo '<hr class="'.$mobile_variable.' '.$websites_tab_border.'" />'."\n";
echo $div_zoom_animation."\n";
echo '<'.$m.' class="'.$websites_tab_div_color.'" style="'.$rounded_border_style_2.'">'."\n";

$i = 0;
while ($i <= $websites_number) {
	echo $websites_buttons_mobile[$i];
	echo "\n";
	$i++;
}

echo $h4_close."\n";
echo $div_close."\n";
echo "</center>"."\n";
echo $div_close."\n";
echo $h4_close."\n";
echo $div_close."\n";
echo $div_close."\n";

?>