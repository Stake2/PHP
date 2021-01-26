<?php

#Chapter writer tab displayer
if ($new_write_style == True) {
	echo '<div style="display:none;">'.$show_story_chapter_text_button.$div_close;
	echo $edit_story_chapter_button;
}

require $chapter_writer_form_php_variable;

if ($new_write_style == True) {
	#JavaScript version for the write story form
	echo '<script>'.
	'var WriteContent'.$chapter_number_1.' = `<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$titletxt.': " style="height:85px;'.$roundedborderstyle3.'">'."\n";

	#Checks if the variable website_show_chapter_text_on_write_form_setting is set to True
	if ($website_show_chapter_text_on_write_form_setting == True) {
		#Checks if the variable website_show_write_form_text_setting is set to True and shows the title text
		if ($show_write_form_text == True) {
			echo $titletxt.': '."\n".$chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}

		else {
			echo $chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}
	}

	echo '</textarea>'."\n";

	echo '<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$story_text_text.': " style="height:3000px;'.$roundedborderstyle3.'">'."\n";

	if ($show_write_form_text == True) {
		echo $story_text_text.': '."\n"."\n";
	}

	if ($show_write_form_text == True) {
		if (strpos($host_text, $website_translate_story_setting.'='.'true')) {
			# Chapter text reader
			if (file_exists($english_chapters[$chapter_number_1]) == True) {
				if ($file = fopen($english_chapters[$chapter_number_1], "r")) {
				while(!feof($file)) {
					$line = fgets($file);
					$line = str_replace(array("\r\n", "\r", "\n"), "", $line);

					if (feof(file)) {
						echo $line."\n";
					}

					else {
						echo $line;
					}
				}
					fclose($file);
				}
			}

			else {
				echo $cannotfindfiletxt.': <br />'.$english_chapters[$chapter_number_1].'<br />';
			}
		}

		else {
			# Chapter text reader
			if (file_exists($normal_chapters[$chapter_number_1]) == True) {
				if ($file = fopen($normal_chapters[$chapter_number_1], "r")) {
				while(!feof($file)) {
					$line = fgets($file);
					$line = str_replace(array("\r\n", "\r", "\n"), "", $line);

					if (feof(file)) {
						echo $line."\n";
					}

					else {
						echo $line;
					}
				}
					fclose($file);
				}
			}

			else {
				echo $cannotfindfiletxt.': <br />'.$normal_chapters[$chapter_number_1].'<br />';
			}
		}
	}

	echo '</textarea>'."\n";

	if ($show_write_form_text == True and $story_has_dates == True) {
		# Chapter date displayer
		if (file_exists($chapter_dates_file) == True) {
			$fp = fopen($chapter_dates_file, 'r', 'UTF-8'); 
			if ($fp) {
				$chapter_written_dates = explode("\n", fread($fp, filesize($chapter_dates_file)));
				$chapter_written_dates = str_replace("^", "", $chapter_written_dates);
				$chapter_written_dates = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $chapter_written_dates);
			}
		}

		echo '<br />'."\n";
		echo $chapter_date_text_two.': '.$chapter_written_dates[$chapter_date_number].'.';
	}

	echo '`;'.
	'</script>';
	#$write_chapter_script;
}

?>