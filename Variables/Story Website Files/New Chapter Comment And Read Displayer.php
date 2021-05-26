<?php 

# Comments displayer
if (isset($chapter_comments_array[$chapter_number_1]) and is_array($chapter_comments_array[$chapter_number_1]) == True and $chapter_comments_array[$chapter_number_1] != Null) {
	echo $comment_header."\n";

	$number = 1;
	$array_number = count($chapter_comments_array[$chapter_number_1]);
	while ($number <= $array_number) {
		echo $chapter_comments_array[$chapter_number_1][$number]."\n";

		$number++;
	}

	echo $div_close."\n";
}

else if (isset($chapter_comments_array[$chapter_number_1]) and $chapter_comments_array[$chapter_number_1] != Null) {
	echo $comment_header."\n";

	echo $chapter_comments_array[$chapter_number_1]."\n";

	echo $div_close."\n";
}

# Readings and Reads displayer
if (isset($reads_array[$chapter_number_1]) and is_array($reads_array[$chapter_number_1]) == True and $reads_array[$chapter_number_1] != Null) {
	echo $readings_header."\n";

	$number = 1;
	$array_number = count($reads_array[$chapter_number_1]);
	while ($number <= $array_number) {
		echo $reads_array[$chapter_number_1][$number]."\n";

		$number++;
	}
}

else if (isset($reads_array[$chapter_number_1]) and $reads_array[$chapter_number_1] != Null) {
	echo $readings_header."\n";

	echo $reads_array[$chapter_number_1]."\n";
}

?>