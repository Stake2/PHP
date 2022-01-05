<?php 

#Defines some number variables
$chapter_number_1 = 1;
$chapter_number_2 = 2;
$chapter_number_3 = 0;
$chapter_number_4 = 0;
$chapter_number_4a = 0;
$chapter_number_7 = 0;
$chapter_text_name = str_replace("s", "", $chapters_text);
$chapter_date_number = 1;

#$reads_array = array(Null);

# Chapter file text link array generator, it generates the array to access the text files of the chapters
$array_index = 1;
$chapter_file_title_number = 1;

while ($array_index <= $chapters) {
	$array_index_less_one = $array_index - 1;

	$new_chapter_file_title_number = Add_Leading_Zeros($chapter_file_title_number);

	if ($story_website_settings["has_titles"] == True) {
		$chapter_title = $new_chapter_file_title_number.' - '.Replace_Text($chapter_titles[$array_index_less_one], "/", "-");

		if ($story_website_settings["has_custom_story_folder"] == True) {
			$chapter_title = $chapter_titles[$array_index_less_one];
		}

		$normal_chapters[$array_index] = $story_chapter_files_folder_language.$chapter_title.'.txt';
		$normal_chapters[$array_index] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?", "<br />"), "", $normal_chapters[$array_index]);

		if (file_exists($normal_chapters[$array_index]) == False and $story_website_settings["has_custom_story_folder"] == False) {
			Create_File($normal_chapters[$array_index]);
		}
	}

	else {
		$normal_chapters[$array_index] = $story_chapter_files_folder_language.$new_chapter_file_title_number.'.txt';
		$normal_chapters[$array_index] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?", "<br />"), "", $normal_chapters[$array_index]);

		Create_File($normal_chapters[$array_index]);
	}

	$array_index++;
	$chapter_file_title_number++;
}

#Chapter file text link array generator for the English language, it generates the array to access the English text files of the chapters
$array_index = 1;
$chapter_file_title_number = 1;

while ($array_index <= $chapters) {
	$array_index_less_one = $array_index - 1;

	$main_story_folder_4 = $story_chapter_files_folder.strtoupper($enus_language).'/';

	$new_chapter_file_title_number = Add_Leading_Zeros($chapter_file_title_number);

	$english_chapters[$array_index] = $main_story_folder_4.$new_chapter_file_title_number.'.txt';
	$english_chapters[$array_index] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?", "<br />"), "", $normal_chapters[$array_index]);

	if ($story_website_settings["has_titles"] == True) {
		$english_chapters[$array_index] = $main_story_folder_4.$new_chapter_file_title_number.' - '.Replace_Text($chapter_titles[$array_index_less_one], "/", "-").'.txt';
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

	while ($array_index <= $chapters) {
		$array_index_less_one = $array_index - 1;

		$chapter_dates[$array_index] = Remove_Text_From_String($chapter_dates[$array_index]);

		$array_index++;
	}
}

$array_index = 1;
$chapter_file_title_number = 1;

echo "\n";

if ($story_website_settings["has_reads"] == True) {
	require $read_generator;

	$h = $readed_number;
}

$z123 = 0;
$chapter_line_number = 0;
$b1 = 0;
$b2 = 1;
$zw = 1;
$zq = 1;
$za = 2;
$mzz = 10;
$zzcxx = 3;
$book_cover_number = 1;
$a = 1;

echo '<div id="'.mb_strtolower($chapters_text).'-div">'."\n";

# Chapter reader/writer/displayer, it generates the tabs for the chapters to be read by the user
while ($chapter_number_1 <= $chapters) {
	require $chapter_tab_generator_php;
}

echo "</div>"."\n";

if ($story_website_settings["has_reads"] == True) {
	# Read-modal Tab generator PHP file
	require $read_modal_generator_php;
}

if ($story_website_settings["chapter_comments"] == True) {
	# Comment-modal Tab generator PHP file
	require $comment_modal_generator_php;
}

?>