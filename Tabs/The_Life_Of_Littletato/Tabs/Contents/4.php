<?php 

if (file_exists($website_changelog_file) == True) {
	echo '<'.$m.' class="'.$tab_text_color.'" style="text-align:left;"><b>'."\n";
	
	#$i = 0;
	#while ($i <= $website_changelog_length) {
	#	echo '<div class="'.$zoom_animation_class.'">'.$website_changelog[$i]."<br /><br />".$div_close."\n";
	#
	#	$i++;
	#}

	Show_Text($website_changelog_file, $style_format = '<div class="'.$zoom_animation_class.'">{}'.$div_close,$use_variable_inserter = False);

	echo "</b></".$m.">"."\n";
	echo $div_close;
}

?>