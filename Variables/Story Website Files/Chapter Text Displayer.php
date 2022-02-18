<?php

$chapter_file = $normal_chapters[$chapter_number_1];

$chapter_word_count = Word_Number($chapter_file);

Show_Text($chapter_file);

# Chapter date displayer
if ($website_info["english_title"] != $website_titles["The Story of the Bulkan Siblings"] and $story_website_settings["has_dates"] == True) {
	$chapter_written_dates = Read_Lines($chapter_dates_file);

	echo "<br />";

	if (isset($chapter_written_dates[$chapter_date_number])) {
		echo $chapter_written_in_text.': '.$chapter_written_dates[$chapter_date_number].'.'."\n";		
	}
}

echo "<br />".$words_text.": ".$chapter_word_count."."."\n";

#echo $write_chapter_script."\n";
echo $div_close."\n";
echo $div_close."\n";
echo '<br /><br />'."\n";

?>