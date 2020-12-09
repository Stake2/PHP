<?php

#Chapter text reader
if ($new_write_style == true) {
	#echo $edit_story_chapter_button;
	#echo '<div style="display:none;">'.$show_story_chapter_text_button.$div_close;
}

if (isset($normal_chapters[$chapter_number_1])) {
	if (file_exists($normal_chapters[$chapter_number_1]) == true) {
		if ($story_namewritesstoryfiles == true) {
			if (file_exists($chapter_write_to_folder) == true) {
				$chapter_test_file = fopen($chapter_write_to_folder.$chapter_number_1.' - '.str_replace("?", "", $chapter_titles[($chapter_number_4 - 1)]).'.txt', 'w');
			}
		}

		if ($file = fopen($normal_chapters[$chapter_number_1], "r")) {
			while(!feof($file)) {
				$line = fgets($file);
				$line = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $line);

				if ($story_namewritesstoryfiles == true) {
					if (file_exists($chapter_write_to_folder) == true) {
						$chapter_text[$z123] = $line;
						$chapter_line_number++;
						$chapter_lines_array[$chapter_number_1] = $chapter_line_number;
						$z123++;

						if (feof($file)) {
							fwrite($chapter_test_file, $line);
						}
						
						else {
							fwrite($chapter_test_file, $line."\n");
						}
					}
				}

				echo $line."\n".'<br />';
			}
			fclose($file);

			if ($story_namewritesstoryfiles == true) {
				if (file_exists($chapter_write_to_folder) == true) {
					fclose($chapter_test_file);
				}
			}
		}
	}

	if (file_exists($normal_chapters[$chapter_number_1]) == false) {
		echo $cannotfindfiletxt.': <br />'.$normal_chapters[$chapter_number_1].'<br />';
	}
}

if ($write_new_chapter == true and $chapter_number_1 == $chapters + 1) {
	require $chapter_writer_form_php_variable;
}

#Chapter date displayer
if ($website_name != $sitenazzevo and $story_name_has_dates == true) {
	if (file_exists($chapter_dates_file) == true) {
		$fp = fopen($chapter_dates_file, 'r', 'UTF-8'); 
		if ($fp) {
			$capdatas = explode("\n", fread($fp, filesize($chapter_dates_file)));
			$datas = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $capdatas);
		}
	}

	echo '<br />';
	if (isset($datas[$chapter_date_number])) {
		echo $datatxt2.': '.$datas[$chapter_date_number].'.';
	}
}

#echo $write_chapter_script."\n";
echo $div_close."\n";
echo $div_close."\n";
echo '<br /><br />'."\n";

if ($new_write_style == true) {
	#JavaScript version for the read story text
	echo '<script>'.
	'var ReadContent'.$chapter_number_1.' = `';

	#echo $edit_story_chapter_button;
	#echo '<div style="display:none;">'.$show_story_chapter_text_button.$div_close;

	if (file_exists($normal_chapters[$chapter_number_1]) == true) {
		if ($story_namewritesstoryfiles == true) {
			if (file_exists($chapter_write_to_folder) == true) {
				$chapter_test_file = fopen($chapter_write_to_folder.$chapter_number_1.' - '.str_replace("?", "", $chapter_titles[($chapter_number_4 - 1)]).'.txt', 'w');
			}
		}

		if ($file = fopen($normal_chapters[$chapter_number_1], "r")) {
		while(!feof($file)) {
			$line = fgets($file);
			$line = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $line);

			if ($story_namewritesstoryfiles == true) {
				if (file_exists($chapter_write_to_folder) == true) {
					$chapter_text[$z123] = $line;
					$chapter_line_number++;
					$chapter_lines_array[$chapter_number_1] = $chapter_line_number;
					$z123++;

					if (feof($file)) {
						fwrite($chapter_test_file, $line);
					}
					
					else {
						fwrite($chapter_test_file, $line."\n");
					}
				}
			}

			echo $line.'<br />'."\n";
		}
			fclose($file);

			if ($story_namewritesstoryfiles == true) {
				if (file_exists($chapter_write_to_folder) == true) {
					fclose($chapter_test_file);
				}
			}
		}
	}

	else {
		echo $cannotfindfiletxt.': <br />'.$normal_chapters[$chapter_number_1].'<br />';
	}

	#Chapter date displayer
	if ($website_name != $sitenazzevo and $story_name_has_dates == true) {
		if (file_exists($chapter_dates_file) == true) {
			$fp = fopen($chapter_dates_file, 'r', 'UTF-8'); 
			if ($fp) {
				$capdatas = explode("\n", fread($fp, filesize($chapter_dates_file)));
				$datas = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $capdatas);
			}
		}

		echo '<br />';
		echo $datatxt2.': '.$datas[$chapter_date_number].'.';
	}

	echo '`;'.
	'</script>';
	#$write_chapter_script;

	#JavaScript version for the write story form
	echo '<script>'.
	'var WriteContent'.$chapter_number_1.' = `';

	#echo $show_story_chapter_text_button;
	#echo '<div style="display:none;">'.$edit_story_chapter_button.$div_close;

	echo '<textarea id="edit_chapter_title_text_textarea_number_'.$chapter_number_1.'" type="text" width="1000" class="'.$text_black_css_class.' '.$background_color.' '.$second_full_border.' w3-input" placeholder="'.$titletxt.': " style="height:85px;'.$roundedborderstyle3.'">'."\n";

	#Checks if the variable show_write_form_text is set to true
	if ($show_write_form_text == true) {
		#Checks if the variable showwriteformtext is set to true and shows the title text
		if ($showwriteformtext == true) {
			echo $titletxt.': '."\n".$chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}

		else {
			echo $chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}
	}

	echo '</textarea>'."\n";

	echo '<textarea id="edit_chapter_story_text_textarea_number_'.$chapter_number_1.'" type="text" width="1000" class="'.$text_black_css_class.' '.$background_color.' '.$second_full_border.' w3-input" placeholder="'.$story_nametxt.': " style="height:3000px;'.$roundedborderstyle3.'">'."\n";

	if ($showwriteformtext == true) {
		echo $story_nametxt.': '."\n"."\n";
	}

	if ($show_write_form_text == true) {
		if (strpos($host_text, $setting_parameters[8].'='.'true')) {
			#Chapter text reader
			if (file_exists($english_chapters[$chapter_number_1]) == true) {
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

	if ($show_write_form_text == true and $story_name_has_dates == true) {
		#Chapter date displayer
		if ($website_name != $sitenazzevo) {
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
	}

	echo '`;'.
	'</script>';
}

if ($write_new_chapter == true) {
	echo '<script>
	function Open_Chapter() {
		openCity("'.$chapter_div_text.($chapters + 1).'");
	}
	</script>';
}

?>