<?php 

if ($selected_website != $website_desert_island) {
	$span_variable = $yellowspan;
}

if ($selected_website == $website_desert_island) {
	$span_variable = $cyanspan;
}

$chapter_number_1 = 1;
$chapter_number_2 = 1;
$chapter_number_3 = 1;
$chapter_number_4 = 0;
while ($chapter_number_1 <= $chapters) {
	if ($website_story_has_bookcovers_setting == True) {
		if (isset($coverimages[$chapter_number_1]) and isset($coverimagesm[$chapter_number_1])) {
			$cover_image_button = '<center>'."\n".'<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_number_1.' - '.$chapter_titles[$chapter_number_4].'">'.$coverimages[$chapter_number_1]."\n".'</a>'.
			"\n"."\n".
			'<a href="#'.$chapter_div_text.''.$chapter_number_1.'">'."\n".$coverimagesm[$chapter_number_1]."\n".'</a>'.
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

	if ($chapter_number_1 == $chapters) {
		if ($new_write_style == True) {
			$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_1."'".');DefineChapter('.$chapter_number_1.');';
		}

		else if ($new_write_style == false) {
			$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_1."'".');';
		}

		if ($website_deactivate_notification_setting == True) {
			$hide_notification_attribute = '';
		}

		elseif (isset($hide_notification_attribute)) {
			$hide_notification_attribute = $hide_notification_attribute;
		}

		if (isset($reviewed_chapter) and $chapter_number_1 == $reviewed_chapter and $website_has_notifications == True) {
			echo '<div class="'.$shake_side_to_side_animation.'">'."\n";

			if ($website_story_has_titles == True) {
				$chapter_text_variable = $chapter_number_1.' - '.$chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}
			
			$chapter_button = '<style>
@keyframes blink_black_to_white {
	0% {
		color: black;
		border-color:black;
	} 

	50% {
		color: white;
		border-color:white;
	}

	100% {
		color: black;
		border-color:black;
	} 
}

.notification_text {
	animation: blink_black_to_white 0.8s;
	animation-iteration-count: infinite;
}
</style>'."\n".
			'<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.' notification_text" '.$roundedborderstyle.' onclick="'.$hide_notification_attribute.$on_click_script.'">'.$chapter_text_variable.' '.$span_variable.'['.$newtxt.'!]'.$spanc."</button></a> "."\n";

			echo $chapter_button;

			echo $cover_image_button;

			echo $div_close;

			$chapter_buttons[$chapter_number_2] = $chapter_button;

			$chapter_number_4++;
		}

		else {
			echo '<div class="'.$shake_side_to_side_animation.'">'."\n";

			if ($website_story_has_titles == True) {
				$chapter_text_variable = $chapter_number_1.' - '.$chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}

			$chapter_button = '<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.'" '.$roundedborderstyle.' onclick="'.$on_click_script.'">'.$chapter_text_variable.' '.$span_variable.'['.$newtxt.'!]'.$spanc.'</button></a> '."\n";

			echo $chapter_button;

			echo $cover_image_button;

			echo $div_close;

			$chapter_buttons[$chapter_number_2] = $chapter_button;

			$chapter_number_4++;
		}
	}

	else {
		if ($new_write_style == True) {
			$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_1."'".');DefineChapter('.$chapter_number_1.');';
		}

		else if ($new_write_style == false) {
			$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_1."'".');';
		}

		if ($website_deactivate_notification_setting == True) {
			$hide_notification_attribute = '';
		}

		elseif (isset($hide_notification_attribute)) {
			$hide_notification_attribute = $hide_notification_attribute;
		}

		if (isset($reviewed_chapter) and $chapter_number_1 == $reviewed_chapter and $website_has_notifications == True) {
			echo '<div class="'.$shake_side_to_side_animation.'">'."\n";

			if ($website_story_has_titles == True) {
				$chapter_text_variable = $chapter_number_1.' - '.$chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}

			$chapter_button = '<style>
@keyframes blink_black_to_white {
	0% {
		color: black;
		border-color:black;
	} 

	50% {
		color: white;
		border-color:white;
	}

	100% {
		color: black;
		border-color:black;
	} 
}

.notification_text {
	animation: blink_black_to_white 0.8s;
	animation-iteration-count: infinite;
}
</style>'."\n".
			'<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.' notification_text" '.$roundedborderstyle.' onclick="'.$hide_notification_attribute.$on_click_script.'">'.$chapter_text_variable."</button></a> "."\n";

			echo $chapter_button;

			echo $cover_image_button;

			echo $div_close;

			$chapter_buttons[$chapter_number_2] = $chapter_button;

			$chapter_number_4++;
		}

		else {
			echo '<div class="'.$shake_side_to_side_animation.'">'."\n";

			if ($website_story_has_titles == True) {
				$chapter_text_variable = $chapter_number_1.' - '.$chapter_titles[$chapter_number_4];
			}

			else {
				$chapter_text_variable = $chapter_number_1;
			}

			$chapter_button = '<a href="#'.$chapter_div_text.''.$chapter_number_1.'" title="'.$chapter_text_variable.'"><button class="w3-btn '.$second_button_style.'" '.$roundedborderstyle.' onclick="'.$on_click_script.'">'.$chapter_text_variable."</button></a> "."\n";

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