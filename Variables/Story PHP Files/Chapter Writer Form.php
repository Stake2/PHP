<?php 

#Shows the text area where the title of the chapter is shown
echo '<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$titletxt.': " style="height:85px;'.$roundedborderstyle3.'">'."\n";

#Checks if the variable show_write_form_text is set to true
if ($show_title_text == true) {
	# Shows the chapter title if the setting is set to true
	if ($show_write_form_text == true) {
		if ($website_translate_story_setting == true) {
			echo $titletxt.': '."\n".$chapter_number_1.' - '.$titlesenus[($chapter_number_4 - 1)];
		}

		if ($website_translate_story_setting == false) {
			echo $titletxt.': '."\n".$chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}
	}

	else {
		if ($website_translate_story_setting == true) {
			echo $chapter_number_1.' - '.$titlesenus[($chapter_number_4 - 1)];
		}

		if ($website_translate_story_setting == false) {
			echo $chapter_number_1.' - '.$chapter_titles[($chapter_number_4 - 1)];
		}
	}
}

echo '</textarea>'."\n";

#Shows the text area  where the text of the chapter is shown
echo '<textarea type="text" width="1000" class="border '.$textstyle2.' w3-input" placeholder="'.$story_nametxt.': " style="height:3000px;'.$roundedborderstyle3.'">'."\n";

if ($website_show_write_form_text_setting == true) {
	echo $story_nametxt.': '."\n"."\n";
}

if ($show_write_form_text == true) {
	if ($website_translate_story_setting == true) {
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
			echo $cannotfindfiletxt.': <br />'.$english_chapters[$chapter_number_1].'<br />';
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

?>