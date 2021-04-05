<?php 

$i = 1;
$cover_number = $revised_chapter;
while ($i <= $cover_number) {
	$chapter_number_and_text = "Add_To_Website_Title('"." - ".ucwords($chapter_text). ": ".$i." - ".$chapter_titles[$i - 1]."');";

	if ($new_write_style == True) {
		$on_click_script = 'openCity('."'".$chapter_div_text.$i."'".');DefineChapter('.$i.');'.$chapter_number_and_text;
	}

	else if ($new_write_style == false) {
		$on_click_script = 'openCity('."'".$chapter_div_text.$i."'".');'.$chapter_number_and_text;
	}

	if ($i <= 9) {
		$number = "0".(string)$i;
	}

	else {
		$number = $i;
	}

	$online_image_link = $story_chapter_covers_folder.$number.'.png';

	$chapter_cover_images_computer[$i] = '<div class="'.$computer_variable.'">'.'<img src="'.$online_image_link.'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$computer_variable.'" />'."\n";

	$chapter_cover_images_mobile[$i] = '<div class="'.$mobile_variable.'">'.'<img src="'.$online_image_link.'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$on_click_script.'" />'."\n".$div_close.'<br class="'.$mobile_variable.'" />'."\n";

	$i++;
}

?>