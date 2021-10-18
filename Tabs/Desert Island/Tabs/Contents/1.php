<?php 

if (isset($alternative_website_style_file) == True) {
	require $alternative_website_style_file;
}

echo '<'.$h4_element.'>'.'<b>'."\n";
echo $div_zoom_animation."\n";

require $chapter_button_generator_php_variable;

echo $div_close."\n";
echo '</b>'.'</'.$h4_element.'>'."\n";

?>