<?php

#Readings and Comments displayer on chapters
if ($website_name == $sitepequenata and $story_has_chapter_comments == True) {
	if ($chapter_number_1 == 1) {
		echo $comment_header."\n";

		echo $story_name_chapter_comments_array[1]."\n";

		echo $div_close."\n";
	}

	if ($chapter_number_1 == 2) {
		echo $comment_header."\n";

		echo $story_name_chapter_comments_array[(4 + $zw)]."\n";
		echo $story_name_chapter_comments_array[(1 + $zw)]."\n";

		echo $div_close."\n";
	}

	if ($chapter_number_1 == 3) {
		echo $comment_header."\n";

		echo $story_name_chapter_comments_array[(2 + $zw)]."\n";
		echo $story_name_chapter_comments_array[(5 + $zw)]."\n";

		echo $div_close."\n";
	}


	if ($chapter_number_1 == 7) {
		echo $comment_header."\n";

		echo $story_name_chapter_comments_array[0]."\n";

		echo $div_close."\n";
	}

	if ($chapter_number_1 == 8) {
		echo $comment_header."\n";

		echo $story_name_chapter_comments_array[(3 + $zw)]."\n";

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

if ($website_name == $sitenazzevo and $story_has_chapter_comments == True) {
	if ($chapter_number_1 == 1) {
		echo $comment_header."\n";

		echo $story_name_chapter_comments_array[0]."\n";
		echo $story_name_chapter_comments_array[1]."\n";

		echo $div_close."\n";
	}
}

if ($website_name == $sitenazzevo and $story_website_contains_reads) {
	if ($chapter_number_1 == 1) {
		echo $readings_header."\n";

		echo $story_name_reads_array[0]."\n";
		echo $story_name_reads_array[1]."\n";
	}
}

if ($website_name == $sitespaceliving and $story_has_chapter_comments == True and $story_website_contains_comments == True) {
	if ($chapter_number_1 == 1) {
		echo $comment_header."\n";

		$i = 0;
		while ($i <= count($story_name_chapter_comments_array) - 1) {
			echo $story_name_chapter_comments_array[$i]."\n";

			$i++;
		}

		#echo $story_name_chapter_comments_array[0]."\n";
		#echo $story_name_chapter_comments_array[1]."\n";

		echo $div_close."\n";
	}
}

if ($website_name == $sitespaceliving and $story_website_contains_reads) {
	if ($chapter_number_1 == 1) {
		echo $readings_header."\n";

		echo $story_name_reads_array[0]."\n";
		echo $story_name_reads_array[1]."\n";
	}
}

?>