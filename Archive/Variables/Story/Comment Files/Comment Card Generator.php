<?php 

# Add leading zeros to chapter number one
$new_chapter_number_1 = Add_Leading_Zeros($chapter_number_1);

$show_chapter_on_comment = True;

# Folders definer
$current_chapter_comments_folder = $story_chapter_comments_folder.$new_chapter_number_1."/";

# Files definer
$commenter_file = $current_chapter_comments_folder."Commenter.txt";
$comment_file = $current_chapter_comments_folder.$comment_text.".txt";
$comment_date_file = $current_chapter_comments_folder."Date.txt";

# Text array creators
$commenters = Read_Lines($commenter_file, $add_none = True);
$comments = Read_Lines($comment_file, $add_none = True);
$comment_dates = Read_Lines($comment_date_file, $add_none = True);

if ($comment_dates != Null) {
	$local_comment_number = count($comment_dates) - 1;
}

else {
	$local_comment_number = Null;
}

if ($local_comment_number != 0 and $local_comment_number != Null) {
	$chapter_comment_number = $local_comment_number;
	$chapter_comment_numbers_array[$chapter_number_1] = $chapter_comment_number;
}

else {
	$chapter_comment_numbers_array[$chapter_number_1] = "0";
}

$datetime = new DateTime();

if ($local_comment_number != Null) {
	$comment_number = 1;

	while ($comment_number <= $local_comment_number) {
		$datetime -> setTimestamp(strtotime($comment_dates[$comment_number]));

		$comment_date = $datetime -> format($website_information["date_format"]);
		$commenter = $commenters[$comment_number];
		$current_comment = $comments[$comment_number];

		if ($local_comment_number == 1) {
			$commenter_text = $commenter;
		}

		if ($local_comment_number > 1) {
			$commenter_text = $comment_number." - ".$commenter;
		}

		$comment_data = array($commenter_text, $commented_in_text, $comment_date);

		# Chapter text and title
		if ($story_website_settings["show_chapter_on_comment"] == True) {
			array_push($comment_data, $commented_on_the_chapter_text);
			array_push($comment_data, $chapter_titles[$chapter_number_3]);
		}

		array_push($comment_data, $current_comment);

		$comment = format($comment_card_template, $comment_data);

		$chapter_comments_array[$chapter_number_1][$comment_number] = $comment;

		$comment_number++;
	}
}

?>