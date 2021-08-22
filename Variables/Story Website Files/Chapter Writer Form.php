<?php 

#Shows the text area where the title of the chapter is shown
echo '<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$title_text.': " style="height:85px;'.$roundedborderstyle3.'">'."\n";

#Checks if the variable show_write_form_text is set to True
if ($show_title_text == True) {
	# Shows the chapter title if the setting is set to True
	if ($show_write_form_text == True) {
		if ($website_translate_story_setting == True) {
			echo $title_text.': '."\n".$chapter_number_1.' - '.$chapter_titles_enus[($chapter_number_4 - 1)];
		}

		if ($website_translate_story_setting == false) {
			echo $title_text.': '."\n".$chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}
	}

	else {
		if ($website_translate_story_setting == True) {
			echo $chapter_number_1.' - '.$chapter_titles_enus[($chapter_number_4 - 1)];
		}

		if ($website_translate_story_setting == false) {
			echo $chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}
	}
}

echo '</textarea>'."\n";

#Shows the text area  where the text of the chapter is shown
echo '<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$story_text_text.': " style="height:4000px;'.$roundedborderstyle3.'">'."\n";

if ($website_show_write_form_text_setting == True) {
	echo $story_text_text.': '."\n"."\n";
}

if ($show_write_form_text == True) {
	if ($website_translate_story_setting == True) {
		#Chapter text reader
		if (file_exists($english_chapters[$chapter_number_1]) == True) {
			if ($file = fopen($english_chapters[$chapter_number_1], "r")) {
			while(!feof($file)) {
				$line = fgets($file);
				$line = str_replace(array("\r\n", "\r", "\n"), "", $line);
				echo $line."\n";
			}
				fclose($file);
			}
		}

		else {
			echo $can_not_find_file_text.': <br />'.$english_chapters[$chapter_number_1].'<br />';
		}
	}

	else {
		#Chapter text reader
		if (file_exists($normal_chapters[$chapter_number_1]) == True) {
			if ($file = fopen($normal_chapters[$chapter_number_1], "r")) {
			while(!feof($file)) {
				$line = fgets($file);
				$line = str_replace(array("\r\n", "\r", "\n"), "", $line);
				echo $line."\n";
			}
				fclose($file);
			}
		}

		else {
			echo $can_not_find_file_text.': <br />'.$normal_chapters[$chapter_number_1].'<br />';
		}
	}
}

echo '</textarea>'."\n";

if ($show_write_form_text == True and $story_has_dates == True) {
	#Chapter date displayer
	if ($website_name != $sitebulkan) {
		if (file_exists($chapter_dates_file) == True) {
			$fp = fopen($chapter_dates_file, 'r', 'UTF-8'); 
			if ($fp) {
				$chapter_written_dates = explode("\n", fread($fp, filesize($chapter_dates_file)));
				$chapter_written_dates = str_replace("^", "", $chapter_written_dates);
				$chapter_written_dates = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $chapter_written_dates);
			}
		}

		echo '<br />'."\n";
		echo $chapter_written_in_text.': '.$chapter_written_dates[$chapter_date_number].'.';
	}
}

?>