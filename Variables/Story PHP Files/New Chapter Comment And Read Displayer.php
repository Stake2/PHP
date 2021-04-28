<?php 

# Comments displayer
if (isset($comments_array[$number_variable]) and is_array($comments_array[$number_variable]) == True and $comments_array[$number_variable] != Null) {
	echo $comment_header."\n";

	$c = 0;
	while ($c <= count($comments_array[$number_variable]) - 1) {
		echo $comments_array[$number_variable][$c]."\n";

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
if (isset($reads_array[$number_variable]) and is_array($reads_array[$number_variable]) == True and $reads_array[$number_variable] != Null) {
	echo $readings_header."\n";

	$c = 1;
	while ($c <= count($reads_array[$number_variable])) {
		echo $reads_array[$number_variable][$c]."\n";

		$c++;
	}
}

else if (isset($reads_array[$number_variable]) and $reads_array[$number_variable] != Null) {
	echo $readings_header."\n";

	echo $reads_array[$number_variable]."\n";
}

?>