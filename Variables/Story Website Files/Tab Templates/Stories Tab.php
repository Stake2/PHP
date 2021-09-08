<?php 

echo "\n".$div_zoom_animation;

unset($story_cards[$english_story_name]);

foreach ($story_cards as $story_card) {
	echo $story_card."\n"."<br />"."\n"."\n";
}

echo $div_close."\n";

?>