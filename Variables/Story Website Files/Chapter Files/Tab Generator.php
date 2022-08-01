<?php 

#Defines some number variables
$chapter_number_2 = 2;
$chapter_number_3 = 0;
$chapter_number_4 = 0;
$chapter_number_4a = 0;
$chapter_number_7 = 0;
$chapter_date_number = 1;

# Chapter file text link array generator, it generates the array to access the text files of the chapters
$array_index = 1;
$chapter_file_title_number = 1;

while ($array_index <= $story_info["chapter_number"]) {
	$array_index_less_one = $array_index - 1;

	$new_chapter_file_title_number = Add_Leading_Zeros($chapter_file_title_number);

	if ($story_website_settings["has_titles"] == True) {
		$chapter_title = $new_chapter_file_title_number." - ";

		$chapter_title .= $chapter_titles[$array_index_less_one];

		if ($story_website_settings["multiple_titles_files"] == False) {
			$chapter_title = str_replace($chapter_titles[$array_index_less_one], Replace_Text($chapter_titles[$array_index_less_one], "/", "-"), $chapter_title);
		}

		if ($story_website_settings["multiple_titles_files"] == False) {
			$chapter_title .= Replace_Text($chapter_titles[$array_index_less_one], "/", "-");
		}

		if ($story_website_settings["has_custom_story_folder"] == True) {
			$chapter_title = $chapter_titles[$array_index_less_one];
		}

		if ($story_website_settings["number_chapter_file"] == True) {
			$chapter_title = $new_chapter_file_title_number;
		}

		$normal_chapters[$array_index] = $story_chapter_files_folder_language.$chapter_title.'.txt';
		$normal_chapters[$array_index] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?", "<br />"), "", $normal_chapters[$array_index]);

		if (file_exists($normal_chapters[$array_index]) == False and $story_website_settings["has_custom_story_folder"] == False) {
			Create_File($normal_chapters[$array_index]);
		}
	}

	else {
		$normal_chapters[$array_index] = $story_chapter_files_folder_language.$new_chapter_file_title_number.".txt";
		$normal_chapters[$array_index] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?", "<br />"), "", $normal_chapters[$array_index]);

		Create_File($normal_chapters[$array_index]);
	}

	$array_index++;
	$chapter_file_title_number++;
}

#Chapter file text link array generator for the English language, it generates the array to access the English text files of the chapters
$array_index = 1;
$chapter_file_title_number = 1;

while ($array_index <= $story_info["chapter_number"]) {
	$array_index_less_one = $array_index - 1;

	$main_story_folder_4 = $story_chapter_files_folder.strtoupper($en_language).'/';

	$new_chapter_file_title_number = Add_Leading_Zeros($chapter_file_title_number);

	$english_chapters[$array_index] = $main_story_folder_4.$new_chapter_file_title_number.'.txt';
	$english_chapters[$array_index] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?", "<br />"), "", $normal_chapters[$array_index]);

	if ($story_website_settings["has_titles"] == True) {
		$english_chapters[$array_index] = $main_story_folder_4.$new_chapter_file_title_number." - ".Replace_Text($chapter_titles[$array_index_less_one], "/", "-").'.txt';
		$english_chapters[$array_index] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?", "<br />"), "", $english_chapters[$array_index]);
	}

	$array_index++;
	$chapter_file_title_number++;
}

#Chapter date file reader, it generates the capdate array which contains the date that the chapter was written
$array_index = 0;
$chapter_dates_file = $story_info_folder.'Chapter Written Dates.txt';
if ($story_website_settings["has_dates"] == True) {
	Create_File($chapter_dates_file);

	$chapter_dates = Read_Lines($chapter_dates_file);

	while ($array_index <= $story_info["chapter_number"]) {
		$array_index_less_one = $array_index - 1;

		$chapter_dates[$array_index] = Remove_Text_From_String($chapter_dates[$array_index]);

		$array_index++;
	}
}

$array_index = 1;
$chapter_file_title_number = 1;

echo "\n";

$you_are_reading_chapter_text_template = '<div class="{}">'."\n".
'<{} class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'."\n".
$div_zoom_animation."\n".
"<br />"."\n".
"<b>".$you_are_reading_story_text."\n".
"<br />"."\n".
$chapter_title_text.": {}"."\n".
"</b>"."\n".
$div_close."\n".
"</{}>"."\n".
$div_close."\n";

# Chapter tab content displayer, it shows the inner content of the chapter tabs
$chapter_number_1 = 1;
$chapter_cover_number = 1;
$modal_number = 1;
while ($chapter_number_1 <= $story_info["chapter_number"]) {
	if ($chapter_number_1 == 1) {
		echo '<div id="'.mb_strtolower($chapters_text).'-div">'."\n";
	}

	$previous_chapter_title = $chapter_number_1 - 1;
	$previous_chapter_div_name = $chapter_div_text.$previous_chapter_title;

	$chapter_title = $chapter_number_1;
	$chapter_div_name = $chapter_div_text.$chapter_number_1;

	$next_chapter_title = $chapter_number_1 + 1;
	$next_chapter_div_name = $chapter_div_text.$next_chapter_title;

	$current_chapter_tab_div_text = $chapter_tab_div_text.$chapter_number_1;

	if ($story_website_settings["has_titles"] == True) {
		$chapter_title .= " - ".$chapter_titles[$chapter_number_1 - 1];
	}

	$previous_chapter_button = "";

	if ($chapter_number_1 != 1) {
		$previous_chapter_title .= " - ".$chapter_titles[$chapter_number_1 - 2];
		$replaced_previous_chapter_title = " - ".ucwords($chapter_text).": ".str_replace("'", "", $previous_chapter_title);

		$open_tab = "openCity('".$chapter_div_text.($chapter_number_1 - 1)."');";
		$add_to_title_script = "Add_To_Website_Title('".$replaced_previous_chapter_title."', 'notification');";
		$previous_chapter_script = $open_tab.$add_to_title_script;

		$previous_chapter_button = '<a href="#'.$previous_chapter_div_name.'">'.'<button class="w3-btn '.$second_button_style.'" style="float:left;'.$rounded_border_style_2.'" onclick="'.$previous_chapter_script.'">'."\n".
		"<".$h3_element.">".$icons_array["arrow left"]."</".$h3_element.">"."\n".
		"</button></a>"."\n";
	}

	$next_chapter_button = "";
	$has_next_chapter_button = False;

	if ($chapter_number_1 != $story_info["chapter_number"]) {
		$next_chapter_title .= " - ".$chapter_titles[$chapter_number_1];
		$replaced_next_chapter_title = " - ".ucwords($chapter_text).": ".str_replace("'", "", $next_chapter_title);

		$open_tab = "openCity('".$chapter_div_text.($chapter_number_1 + 1)."');";
		$add_to_title_script = "Add_To_Website_Title('".$replaced_next_chapter_title."', 'notification');";
		$next_chapter_script = $open_tab.$add_to_title_script;

		$next_chapter_button = '<a href="#'.$next_chapter_div_name.'">'.'<button class="w3-btn '.$second_button_style.'" style="float:right;'.$rounded_border_style_2.'" onclick="'.$next_chapter_script.'">'."\n".
		"<".$h3_element.">".$icons_array["arrow right"]."</".$h3_element.">"."\n".
		"</button></a>"."\n";

		$has_next_chapter_button = True;
	}

	$you_are_reading_chapter_text = $chapter_title;

	if ($story_website_settings["use_status"] == True and $story_website_settings["show_new_chapter_text"] == True) {
		if ($chapter_number_1 == $story_info["chapter_number"] and in_array($story_status, array($story_status_texts[0], $story_status_texts[3])) == False) {
			$you_are_reading_chapter_text = $you_are_reading_chapter_text.$new_chapter_span;
		}
	}

	$local_button_style = "float: right;".$rounded_border_style_2;

	if ($has_next_chapter_button == True) {
		$local_button_style = "float: right;margin-right: 15px;".$rounded_border_style_2;
	}

	# Read Generator
	require $reading_card_generator;

	# Comment Card Generator
	require $comment_card_generator;

	# Chapter Tab Generator
	require $chapter_tab_content_generator;

	if ($chapter_number_1 == $story_info["chapter_number"]) {
		echo $div_close."\n";
	}

	if ($story_website_settings["has_reads"] == True) {
		# Read-modal Tab generator
		require $read_modal_generator_php;
	}

	if ($story_website_settings["chapter_comments"] == True) {
		# Comment-modal Tab generator
		require $comment_modal_generator_php;
	}

	$chapter_number_1++;
	$chapter_number_2++;
	$chapter_number_3++;
	$chapter_date_number .= 3;
	$chapter_cover_number++;
	$modal_number++;

	$i++;
}

?>