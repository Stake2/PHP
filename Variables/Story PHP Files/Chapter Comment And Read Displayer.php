<?php

#Readings and Comments displayer on chapters
if ($website_name == $website_pequenata and $story_has_chapter_comments == True) {
	if ($chapter_number_1 == 1) {
		echo $comment_header."\n";

		echo $story_chapter_comments_array[1]."\n";

		echo $div_close."\n";
	}

	if ($chapter_number_1 == 2) {
		echo $comment_header."\n";

		echo $story_chapter_comments_array[(4 + $zw)]."\n";
		echo $story_chapter_comments_array[(1 + $zw)]."\n";

		echo $div_close."\n";
	}

	if ($chapter_number_1 == 3) {
		echo $comment_header."\n";

		echo $story_chapter_comments_array[(2 + $zw)]."\n";
		echo $story_chapter_comments_array[(5 + $zw)]."\n";

		echo $div_close."\n";
	}


	if ($chapter_number_1 == 7) {
		echo $comment_header."\n";

		echo $story_chapter_comments_array[0]."\n";

		echo $div_close."\n";
	}

	if ($chapter_number_1 == 8) {
		echo $comment_header."\n";

		echo $story_chapter_comments_array[(3 + $zw)]."\n";

		echo $div_close."\n";
	}

	if ($chapter_number_1 == 1) {
		echo $readings_header."\n";
	}

	if ($chapter_number_1 > 1 and $chapter_number_1 < 11) {
		echo $readings_header."\n";

		echo $story_name_reads_array[$h]."\n";
	}

	if ($chapter_number_1 == 2) {
		echo $story_name_reads_array[2]."\n";
	}

	if ($chapter_number_1 == 1) {
		echo $story_name_reads_array[($h - ($mzz + $za))]."\n";
		echo $story_name_reads_array[($h - ($mzz + $zw))]."\n";
	}
}

if ($website_name == $website_nazzevo and $story_has_chapter_comments == True) {
	if ($chapter_number_1 == 1) {
		echo $comment_header."\n";

		echo $story_chapter_comments_array[0]."\n";
		echo $story_chapter_comments_array[1]."\n";

		echo $div_close."\n";
	}
}

if ($website_name == $website_nazzevo and $story_website_contains_reads == True) {
	if ($chapter_number_1 == 1) {
		echo $readings_header."\n";

		echo $story_name_reads_array[0]."\n";
		echo $story_name_reads_array[1]."\n";
	}
}

?>