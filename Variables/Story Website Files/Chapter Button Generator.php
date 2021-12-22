<?php 

$hide_notification_attribute = "";

if ($website_settings["notifications"] == True and $website_deactivate_notification_setting == False) {
	$hide_notification_attribute = "Hide_Computer_Notification();Hide_Computer_Buttons();Hide_Mobile_Notification();";
}

$new_chapter_span = Create_Element("span", $third_text_color, '['.$new_text.'!]');

$local_chapter_titles = array_values($chapter_titles);

$chapter_number_1 = 1;
$chapter_number_2 = 1;
$chapter_number_3 = 1;
$chapter_number_4 = 0;

while ($chapter_number_1 <= $chapters) {
	if ($story_website_settings["show_chapter_covers"] == True) {
		if (isset($chapter_cover_images_computer[$chapter_number_1]) and isset($chapter_cover_images_mobile[$chapter_number_1])) {
			$cover_image_button = '<center>'."\n".'<a id="story_chapter_image_number_'.$chapter_number_1.'" href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_number_1.' - '.$local_chapter_titles[$chapter_number_4].'">'.$chapter_cover_images_computer[$chapter_number_1]."\n".'</a>'.
			"\n"."\n".
			'<a href="#'.$chapter_div_text.''.$chapter_number_1.'">'."\n".$chapter_cover_images_mobile[$chapter_number_1]."\n".'</a>'.
			"\n".'</center>'.
			"\n".'<br />'."\n"."\n";
		}

		else {
			$cover_image_button = '';
		}
	}

	else {
		$cover_image_button = '';
	}

	if ($chapter_number_1 == $chapters and $story_website_settings["show_new_chapter_text"] == True) {
		if ($website_story_has_titles == True) {
			$current_chapter_text = $chapter_number_1." - ".str_replace("'", "", $local_chapter_titles[$chapter_number_4]);
		}

		if ($website_story_has_titles == False) {
			$current_chapter_text = $chapter_number_1;
		}

		$chapter_number_and_text = "Add_To_Website_Title('"." - ".ucwords($chapter_text).": ".$current_chapter_text."', 'notification');";

		$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_1."'".');Define_Chapter('.$chapter_number_1.');';

		$scripts = 'onclick="'.$on_click_script.$chapter_number_and_text.$hide_notification_attribute.'"';

		if (isset($revised_chapter) and $chapter_number_1 == $revised_chapter and $website_settings["notifications"] == True) {
			echo '<div class="'.$shake_side_to_side_animation.'">'."\n";

			if ($website_story_has_titles == True) {
				$chapter_text_variable = $chapter_number_1.' - '.$local_chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}
			
			$chapter_button = '<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.'" '.$roundedborderstyle.' '.$scripts.'>'.$chapter_text_variable.' '.$new_chapter_span."</button></a> "."\n";

			echo $chapter_button;

			echo $cover_image_button;

			echo $div_close;

			$chapter_buttons[$chapter_number_2] = $chapter_button;

			$chapter_number_4++;
		}

		else {
			echo '<div class="'.$shake_side_to_side_animation.'">'."\n";

			if ($website_story_has_titles == True) {
				$chapter_text_variable = $chapter_number_1.' - '.$local_chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}

			$chapter_button = '<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.'" '.$roundedborderstyle.' '.$scripts.'>'.$chapter_text_variable.' '.$new_chapter_span.'</button></a> '."\n";

			echo $chapter_button;

			echo $cover_image_button;

			echo $div_close;

			$chapter_buttons[$chapter_number_2] = $chapter_button;

			$chapter_number_4++;
		}
	}

	else {
		if ($website_story_has_titles == True) {
			$current_chapter_text = $chapter_number_1." - ".str_replace("'", "", $local_chapter_titles[$chapter_number_4]);
		}

		if ($website_story_has_titles == False) {
			$current_chapter_text = $chapter_number_1;
		}

		$chapter_number_and_text = "Add_To_Website_Title('"." - ".ucwords($chapter_text).": ".$current_chapter_text."', 'notification');";

		$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_1."'".');Define_Chapter('.$chapter_number_1.');';

		if ($website_deactivate_notification_setting == True or !isset($hide_notification_attribute)) {
			$hide_notification_attribute = '';
		}

		else if (isset($hide_notification_attribute)) {
			$hide_notification_attribute = $hide_notification_attribute;
		}

		$scripts = 'onclick="'.$on_click_script.$chapter_number_and_text.$hide_notification_attribute.'"';

		if (isset($revised_chapter) and $chapter_number_1 == $revised_chapter and $website_settings["notifications"] == True) {
			echo '<div class="'.$shake_side_to_side_animation.'">'."\n";

			if ($website_story_has_titles == True) {
				$chapter_text_variable = $chapter_number_1.' - '.$local_chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}

			$chapter_button = '<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.'" '.$roundedborderstyle.' '.$scripts.'>'.$chapter_text_variable."</button></a> "."\n";

			echo $chapter_button;

			echo $cover_image_button;

			echo $div_close;

			$chapter_buttons[$chapter_number_2] = $chapter_button;

			$chapter_number_4++;
		}

		else {
			echo '<div class="'.$shake_side_to_side_animation.'">'."\n";

			if ($website_story_has_titles == True) {
				$chapter_text_variable = $chapter_number_1.' - '.$local_chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}

			$chapter_button = '<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.'" '.$roundedborderstyle.' '.$scripts.'>'.$chapter_text_variable."</button></a> "."\n";

			echo $chapter_button;

			echo $cover_image_button;

			echo $div_close;

			$chapter_buttons[$chapter_number_2] = $chapter_button;
	
			$chapter_number_4++;
		}
	}

	$chapter_number_1++;
	$chapter_number_2++;
	$chapter_number_3++;
}

?>