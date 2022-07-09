<?php 

if (isset($chapter_comments_array[$chapter_number_1]) or isset($readings_array[$chapter_number_1])) {
	echo $margin."\n".
	$margin."\n".
	'<hr class="'.$third_full_border.'" />'."\n".
	$div_close."\n".
	$div_close."\n";
}

# Comments displayer
if (isset($chapter_comments_array[$chapter_number_1])) {
	echo format($comment_header, array($chapter_comment_numbers_array[$chapter_number_1], $chapter_comment_numbers_array[$chapter_number_1]))."\n";

	if (is_array($chapter_comments_array[$chapter_number_1]) == True) {
		$number = 1;
		$array_number = count($chapter_comments_array[$chapter_number_1]);
		while ($number <= $array_number) {
			echo $chapter_comments_array[$chapter_number_1][$number]."\n";

			$number++;
		}
	}

	if (is_array($chapter_comments_array[$chapter_number_1]) == False) {
		echo $chapter_comments_array[$chapter_number_1]."\n";
	}

	echo $div_close."\n";
}

# Readings displayer
if (isset($readings_array[$chapter_number_1])) {
	echo format($readings_header, array($chapter_read_numbers_array[$chapter_number_1], $chapter_read_numbers_array[$chapter_number_1]))."\n";

	if (is_array($readings_array[$chapter_number_1]) == True) {
		$number = 1;
		$array_number = count($readings_array[$chapter_number_1]);
		while ($number <= $array_number) {
			echo $readings_array[$chapter_number_1][$number]."\n";

			$number++;
		}
	}

	if (is_array($readings_array[$chapter_number_1]) == False) {
		echo $readings_array[$chapter_number_1]."\n";
	}

	echo $div_close."\n";
}

?>