<?php

# Include Websites Tabs Attributes.php
require $websites_tab_arrays;

$websites_tab_name_text = $first_text_color;
$websites_tab_border = $first_border_color." ".$border_1px_solid_css_class;
$websites_tab_number_text_color = $second_text_color;
$websites_tab_number_hover_color = $text_hover_white_css_class;
$websites_tab_div_color = 'w3-black';
$websites_tab_border_color = $first_border_color;

echo '<a name="'.$websites_tab_code.'"></a>'."\n".'<br />'."\n";
echo '<div id="'.$websites_tab_code.'" class="city" style="display:none;'.$rounded_border_style_2.'">'."\n";
echo $big_space."\n";
echo '<div class="'.$computer_variable.'" '.$roundedborderstyle.'>'."\n";
#echo $h42."\n";

echo '<'.$h4_element.' class="'.$websites_tab_border_color.' '.$websites_tab_div_color.' '.$border_3px_solid_css_class." ".$websites_tab_border_color.'" style="margin:10%;'.$rounded_border_style_2.'">';

echo $margin."\n";
echo '<center>'."\n";
echo $div_zoom_animation."\n";
echo '<'.$h2_element.' class="'.$computer_variable.' '.$websites_tab_name_text.'" style="'.$rounded_border_style_2.'"><p></p><br /><b>'.$websites_tab_button_name.'<span class="'.$websites_tab_number_text_color.' '.$websites_tab_number_hover_color.'">'.$websites_number.$spanc.' '.$websites_tab_button_icon.'</b><br /><br /><p></p></'.$h2_element.'>'."\n";
echo $div_close."\n";
echo '<hr class="'.$computer_variable.' '.$websites_tab_border.'" />'."\n";
echo $div_zoom_animation."\n";
echo '<'.$h4_element.' class="'.$websites_tab_div_color.'" style="'.$rounded_border_style_2.'">'."\n";

foreach ($website_titles as $value) {
	$local_website_link_button = $website_link_buttons[$value];

	echo $local_website_link_button;
	echo "<br />"."\n";
}

echo $h4_close."\n";
echo $div_close."\n";
echo "</center>"."\n";
echo $div_close."\n";
echo $h4_close."\n";
echo $div_close."\n";

echo "\n";

echo '<div class="'.$mobile_variable.'">'."\n";

echo '<'.$h4_element.' class="'.$websites_tab_border_color.' '.$websites_tab_div_color.' '.$border_3px_solid_css_class." ".$websites_tab_border_color.'" style="margin:10%;'.$rounded_border_style_2.'">';

echo '<div class="'.$mobile_variable.'">'."\n".$margin.$div_close."\n";
echo "<center>"."\n";
echo $div_zoom_animation."\n";
echo '<'.$h2_element.' class="'.$mobile_variable.' '.$websites_tab_name_text.'" style="'.$rounded_border_style_2.'"><p></p><br /><b>'.$websites_tab_button_name.'<span class="'.$websites_tab_number_text_color.' '.$websites_tab_number_hover_color.'">'.$websites_number.$spanc.' '.$websites_tab_button_icon.'</b><br /><br /><p></p></'.$h2_element.'>'."\n";
	
echo $div_close."\n";
echo '<hr class="'.$mobile_variable.' '.$websites_tab_border.'" />'."\n";
echo $div_zoom_animation."\n";
echo '<'.$h4_element.' class="'.$websites_tab_div_color.'" style="'.$rounded_border_style_2.'">'."\n";

foreach ($website_titles as $value) {
	$local_website_link_button = $website_link_buttons[$value];

	echo $local_website_link_button;
	echo "<br />"."\n";
}

echo $h4_close."\n";
echo $div_close."\n";
echo "</center>"."\n";
echo $div_close."\n";
echo $h4_close."\n";
echo $div_close."\n";
echo $div_close."\n";

?>