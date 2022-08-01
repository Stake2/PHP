<?php 

$hide_notification_attribute = "";

if ($website_settings["notifications"] == True) {
	$hide_notification_attribute = "Hide_Computer_Buttons();Hide_Computer_Notification();Hide_Mobile_Notification();";
}

$new_chapter_span = Create_Element("span", $third_text_color, '['.$new_text.'!]');

$local_chapter_titles = array_values($chapter_titles);

if ($story_website_settings["has_story_covers"] == True and $story_website_settings["show_story_covers_on_chapter_buttons_tab"] == True) {
	$button_name = Language_Item_Definer("Hide Chapter Covers", "Esconder Capas de Capítulos");
	$onclick = 'onClick="Hide_Chapter_Images();"';
	$hide_chapter_button_images_button = '<div id="'.$button_name.' Div">'."\n".
	'<a title="'.$button_name.'">'."\n".
	'<button id="'.$button_name.'" class="w3-btn '.$second_button_style.'" '.$roundedborderstyle.' '.$onclick.'>'.
	$button_name.
	"</button>"."\n".
	"</a>"."\n".
	"<br />"."\n".
	"<br />"."\n".
	$div_close."\n";

	echo $hide_chapter_button_images_button;
}

$chapter_number_1 = 1;
$chapter_number_2 = 1;
$chapter_number_3 = 1;
$chapter_number_4 = 0;

while ($chapter_number_1 <= $story_info["chapter_number"]) {
	$cover_image_button = "";

	if ($story_website_settings["has_story_covers"] == True) {
		$cover_image_button = "";

		if (isset($chapter_cover_images_computer[$chapter_number_1]) and isset($chapter_cover_images_mobile[$chapter_number_1]) and $story_website_settings["show_story_covers_on_chapter_buttons_tab"] == True) {
			$cover_image_button = '<div id="story_chapter_image_number_'.$chapter_number_1.'">'."\n".
			'<center>'."\n".
			'<a href="#'.$chapter_div_text.$chapter_number_1.'" title="'.$chapter_number_1." - ".$local_chapter_titles[$chapter_number_4].'">'.
			$chapter_cover_images_computer[$chapter_number_1]."\n".
			'</a>'.
			"\n"."\n".
			'<a href="#'.$chapter_div_text.$chapter_number_1.'" title="'.$chapter_number_1." - ".$local_chapter_titles[$chapter_number_4].'">'."\n".$chapter_cover_images_mobile[$chapter_number_1]."\n".'</a>'.
			'<br />'."\n"."\n".
			'</center>'."\n".
			$div_close."\n";
		}
	}

	if ($chapter_number_1 == $story_info["chapter_number"] and $story_website_settings["show_new_chapter_text"] == True) {
		if ($story_website_settings["has_titles"] == True) {
			$current_chapter_text = $chapter_number_1." - ".str_replace("'", "", $local_chapter_titles[$chapter_number_4]);
		}

		if ($story_website_settings["has_titles"] == False) {
			$current_chapter_text = $chapter_number_1;
		}

		$chapter_number_and_text = "Add_To_Website_Title('"." - ".ucwords($chapter_text).": ".$current_chapter_text."', 'notification');";

		$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_1."'".');Define_Chapter('.$chapter_number_1.');';

		$scripts = 'onclick="'.$on_click_script.$chapter_number_and_text.$hide_notification_attribute.'"';

		if (isset($revised_chapter) and $chapter_number_1 == $revised_chapter and $website_settings["notifications"] == True) {
			if ($story_website_settings["has_titles"] == True) {
				$chapter_text_variable = $chapter_number_1." - ".$local_chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}
			
			$chapter_button = '<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.'" '.$roundedborderstyle.' '.$scripts.'>'.$chapter_text_variable.' '.$new_chapter_span."</button></a> "."\n";

			if ($story_website_settings["has_titles"] == True and $local_chapter_titles[$chapter_number_4] != "") {
				$chapter_buttons[$chapter_number_2] = $chapter_button;
			}

			$chapter_number_4++;
		}

		else {
			if ($story_website_settings["has_titles"] == True) {
				$chapter_text_variable = $chapter_number_1." - ".$local_chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}

			$chapter_button = '<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.'" '.$roundedborderstyle.' '.$scripts.'>'.$chapter_text_variable.' '.$new_chapter_span.'</button></a> '."\n";

			if ($story_website_settings["has_titles"] == True and $local_chapter_titles[$chapter_number_4] != "") {
				$chapter_buttons[$chapter_number_2] = $chapter_button;
			}

			$chapter_number_4++;
		}
	}

	else {
		if ($story_website_settings["has_titles"] == True) {
			$current_chapter_text = $chapter_number_1." - ".str_replace("'", "", $local_chapter_titles[$chapter_number_4]);
		}

		if ($story_website_settings["has_titles"] == False) {
			$current_chapter_text = $chapter_number_1;
		}

		$chapter_number_and_text = "Add_To_Website_Title('"." - ".ucwords($chapter_text).": ".$current_chapter_text."', 'notification');";

		$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_1."'".');Define_Chapter('.$chapter_number_1.');';

		$scripts = 'onclick="'.$on_click_script.$chapter_number_and_text.$hide_notification_attribute.'"';

		if (isset($revised_chapter) and $chapter_number_1 == $revised_chapter and $website_settings["notifications"] == True) {
			if ($story_website_settings["has_titles"] == True) {
				$chapter_text_variable = $chapter_number_1." - ".$local_chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}

			$chapter_button = '<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.'" '.$roundedborderstyle.' '.$scripts.'>'.$chapter_text_variable."</button></a> "."\n";

			if ($story_website_settings["has_titles"] == True and $local_chapter_titles[$chapter_number_4] != "") {
				$chapter_buttons[$chapter_number_2] = $chapter_button;
			}

			$chapter_number_4++;
		}

		else {
			if ($story_website_settings["has_titles"] == True) {
				$chapter_text_variable = $chapter_number_1." - ".$local_chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}

			$chapter_button = '<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.'" '.$roundedborderstyle.' '.$scripts.'>'.$chapter_text_variable."</button></a> "."\n";

			if ($story_website_settings["has_titles"] == True and $local_chapter_titles[$chapter_number_4] != "") {
				$chapter_buttons[$chapter_number_2] = $chapter_button;
			}
	
			$chapter_number_4++;
		}
	}

	if (isset($chapter_buttons[$chapter_number_2])) {
		echo '<div class="'.$shake_side_to_side_animation.'">'."\n";

		echo $chapter_buttons[$chapter_number_2];

		echo $cover_image_button;

		echo $div_close;
	}

	$chapter_number_1++;
	$chapter_number_2++;
	$chapter_number_3++;
}

?>