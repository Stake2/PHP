<?php

#Chapter writer tab displayer
if ($new_write_style == true) {
	echo '<div style="display:none;">'.$show_story_chapter_text_button.$div_close;
	echo $edit_story_chapter_button;
}

require $chapter_writer_form_php_variable;

if ($new_write_style == true) {
	#JavaScript version for the write story form
	echo '<script>'.
	'var WriteContent'.$chapter_number_1.' = `<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$titletxt.': " style="height:85px;'.$roundedborderstyle3.'">'."\n";

	#Checks if the variable website_show_chapter_text_on_write_form_setting is set to true
	if ($website_show_chapter_text_on_write_form_setting == true) {
		#Checks if the variable showwriteformtext is set to true and shows the title text
		if ($show_write_form_text == true) {
			echo $titletxt.': '."\n".$chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}

		else {
			echo $chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}
	}

	echo '</textarea>'."\n";

	echo '<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$story_nametxt.': " style="height:3000px;'.$roundedborderstyle3.'">'."\n";

	if ($show_write_form_text == true) {
		echo $story_nametxt.': '."\n"."\n";
	}

	if ($show_write_form_text == true) {
		if (strpos($host_text, $website_translate_story_setting.'='.'true')) {
			#Chapter text reader
			if (file_exists($english_chapters[$chapter_number_1]) == true) {
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
				echo $cannotfindfiletxt.': <br />'.$normal_chapters[$chapter_number_1].'<br />';
			}
		}

		else {
			#Chapter text reader
			if (file_exists($normal_chapters[$chapter_number_1]) == true) {
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

	if ($show_write_form_text == true and $story_name_has_dates == true) {
		#Chapter date displayer
		if (file_exists($chapter_dates_file) == true) {
			$fp = fopen($chapter_dates_file, 'r', 'UTF-8'); 
			if ($fp) {
				$capdatas = explode("\n", fread($fp, filesize($chapter_dates_file)));
				$datas = str_replace("^", "", $capdatas);
				$datas = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $datas);
			}
		}

		echo '<br />'."\n";
		echo $datatxt2.': '.$datas[$chapter_date_number].'.';
	}

	echo '`;'.
	'</script>';
	#$write_chapter_script;
}

?>