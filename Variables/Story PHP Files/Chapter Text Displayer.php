<?php

$chapter_file = $normal_chapters[$chapter_number_1];

$chapter_word_count = Word_Number($chapter_file);

Show_Text($chapter_file);

if ($write_new_chapter == True and $chapter_number_1 == $chapters + 1) {
	require $chapter_writer_form_php_variable;
}

# Chapter date displayer
if ($website_name != $website_nazzevo and $story_has_dates == True) {
	$chapter_written_dates = Read_Lines($chapter_dates_file);

	echo "<br />";

	if (isset($chapter_written_dates[$chapter_date_number])) {
		echo $chapter_date_text_two.': '.$chapter_written_dates[$chapter_date_number].'.'."\n";		
	}
}

echo "<br />".$words_text.": ".$chapter_word_count."."."\n";

#echo $write_chapter_script."\n";
echo $div_close."\n";
echo $div_close."\n";
echo '<br /><br />'."\n";

if ($new_write_style == True) {
	#JavaScript version for the read story text
	echo '<script>'.
	'var Read_Content_'.$chapter_number_1.' = `';

	Show_Text($chapter_file);

	# Chapter date displayer
	if ($website_name != $website_nazzevo and $story_has_dates == True) {
		$chapter_written_dates = Read_Lines($chapter_dates_file);

		echo "<br />";

		if (isset($chapter_written_dates[$chapter_date_number])) {
			echo $chapter_date_text_two.': '.$chapter_written_dates[$chapter_date_number].'.';
			echo "<br />".$words_text.": ".$chapter_word_count."."."\n";
		}
	}

	echo '`;'.
	'</script>';
	#$write_chapter_script;

	#JavaScript version for the write story form
	echo '<script>'.
	'var Write_Content_'.$chapter_number_1.' = `';

	#echo $show_story_chapter_text_button;
	#echo '<div style="display:none;">'.$edit_story_chapter_button.$div_close;

	if ($show_write_form_text == True) {
		if ($website_show_write_form_text_setting == True) {
			$title_text = $titletxt.': '."\n".$chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}

		else {
			$title_text = $chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}
	}

	echo '<input id="edit_chapter_title_text_textarea_number_'.$chapter_number_1.'" type="text" width="1000" class="'.$text_black_css_class.' '.$background_color.' '.$second_full_border.' w3-input" value="'.$title_text.'" style="height:50px;'.$roundedborderstyle3.'">'."\n";

	echo '</input>'."\n";

	echo '<textarea id="edit_chapter_story_text_textarea_number_'.$chapter_number_1.'" type="text" width="1000" class="'.$text_black_css_class.' '.$background_color.' '.$second_full_border.' w3-input" placeholder="'.$story_text_text.': " style="height:3300px;'.$roundedborderstyle3.'">'."\n";

	if ($website_show_write_form_text_setting == True) {
		echo $story_text_text.': '."\n"."\n";
	}

	if ($show_write_form_text == True) {
		if (strpos($host_text, $setting_parameters[8].'='.'true')) {
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
				echo $cannotfindfiletxt.': <br />'.$english_chapters[$chapter_number_1].'<br />';
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
				echo $cannotfindfiletxt.': <br />'.$normal_chapters[$chapter_number_1].'<br />';
			}
		}
	}

	echo '</textarea>'."\n";

	if ($show_write_form_text == True and $story_has_dates == True) {
		#Chapter date displayer
		if ($website_name != $website_nazzevo) {
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
	}

	echo '`;'.
	'</script>';
}

if ($write_new_chapter == True) {
	echo '<script>
	function Open_Chapter() {
		openCity("'.$chapter_div_text.($chapters + 1).'");
	}
	</script>';
}

# Chapter text reader
if ($new_write_style == True) {
	#echo $edit_story_chapter_button;
	#echo '<div style="display:none;">'.$show_story_chapter_text_button.$div_close;
}

?>