<?php 

if (file_exists($website_changelog_file) == True) {
	echo '<'.$m.' class="'.$tab_text_color.'" style="text-align:left;"><b>'."\n";

	$use_variable_inserter = False;
	Show_Text($website_changelog_file, $style_format = '<div class="'.$zoom_animation_class.'">{}'.$div_close);

	echo "</b></".$m.">"."\n";
	echo $div_close;
}

?>