<?php 

if ($selected_website != $website_desert_island) {
	$span_variable = $whitespan;
	$hover_variable = $text_hover_white_css_class;
}

if ($selected_website == $website_desert_island) {
	$span_variable = $whitespan;
	$hover_variable = $text_hover_cyan_css_class;
}

$i = 0;
while ($i <= $story_readers_number_file) {
	$i2 = $i + 1;
	
	echo '<'.$n.' class="'.$hover_variable.' '.$zoom_animation_class.' '.$computer_variable.'">'.$span_variable.$i2.$spanc.' - '.$readers[$i].'</'.$n.'>'."\n";

    $i++;
}

echo "\n";

$i = 0;
while ($i <= $story_readers_number_file) {
	$i2 = $i + 1;
	
	echo '<'.$m.' class="'.$hover_variable.' '.$zoom_animation_class.' '.$mobile_variable.'">'.$span_variable.$i2.$spanc.' - '.$readers[$i]."</".$m.'>'."\n";

    $i++;
}

echo "<br />"."\n";

?>