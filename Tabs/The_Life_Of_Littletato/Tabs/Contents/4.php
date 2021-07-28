<?php 

if (file_exists($website_changelog_file) == True) {
	echo '<'.$h4_element.' class="'.$tab_text_color.'" style="text-align:left;"><b>'."\n";

	$use_variable_inserter = False;
	Show_Text($website_changelog_file, $style_format = '<div class="'.$zoom_animation_class.'">{}'.$div_close);
	$use_variable_inserter = True;

	echo "</b></".$h4_element.">"."\n";
	echo $div_close;
}

?>