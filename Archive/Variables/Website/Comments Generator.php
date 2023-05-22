<?php 

# Comment form
echo "<".$h4_element.">"."\n".'<b>'."\n";
echo $div_zoom_animation."\n";
echo $website_comment_form;
echo "\n".'</b>'."\n".'</'.$h4_element.'>'."\n";

$show_chapter_on_comment = False;

# Files definer
$commenter_file = $website_comments_folder."Commenter.txt";
$comment_file = $website_comments_folder.$comment_text.".txt";
$comment_date_file = $website_comments_folder."Date.txt";

# Text array creators
$commenters = Read_Lines($commenter_file, $add_none = True);
$comments = Read_Lines($comment_file, $add_none = True);
$comment_dates = Read_Lines($comment_date_file, $add_none = True);

$comment_style = $additional_background_color." ".$text_black_css_class." ".$border_3px_solid_black_css_class;

if ($comment_dates != Null) {
	$local_comment_number = count($comment_dates) - 1;
}

else {
	$local_comment_number = Null;
}

# Comment Style definer
$comment_style = $additional_background_color." ".$text_black_css_class." ".$border_3px_solid_black_css_class;

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

		array_push($comment_data, $current_comment);

		$comment = format($comment_card_template, $comment_data);

		$website_comments_array[$comment_number] = $comment;

		echo $comment;

		$comment_number++;
	}
}

?>