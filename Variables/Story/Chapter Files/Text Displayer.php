<?php

$chapter_file = $normal_chapters[$chapter_number_1];

$chapter_word_count = Word_Number($chapter_file);

if (text_contains(",", $chapter_word_count) and in_array($website_information["language"], $pt_languages_array) == True) {
	$chapter_word_count = str_replace(",", ".", $chapter_word_count);
}

Show_Text($chapter_file);

# Chapter date displayer
if ($story_website_settings["has_dates"] == True) {
	$chapter_written_dates = Read_Lines($chapter_dates_file);

	echo "<br />"."\n";

	if (isset($chapter_written_dates[$chapter_date_number])) {
		echo $chapter_written_in_text.": ".$chapter_written_dates[$chapter_date_number].'.'."\n";		
	}
}

echo "<br />"."\n";
echo $words_text.": ".$chapter_word_count."."."\n";

echo $div_close."\n";
echo $div_close."\n";
echo "<br /><br />"."\n";

?>