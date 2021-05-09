<?php 

# Comments displayer
if (isset($comments_array[$chapter_number_1]) and is_array($comments_array[$chapter_number_1]) == True and $comments_array[$chapter_number_1] != Null) {
	echo $comment_header."\n";

	$c = 0;
	while ($c <= count($comments_array[$chapter_number_1]) - 1) {
		echo $comments_array[$chapter_number_1][$c]."\n";

		$c++;
	}

	echo $div_close."\n";
}

else if (isset($comments_array[$number_variable]) and $comments_array[$number_variable] != Null) {
	echo $comment_header."\n";

	echo $comments_array[$number_variable]."\n";

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