<?php 

# Add leading zeros to chapter number one
$new_chapter_number_1 = Add_Leading_Zeros($chapter_number_1);

$show_chapter_on_comment = False;

# Folders definer
$comments_folder = $story_folder.$chapter_comments_english_folder_text;
$current_chapter_comments_folder = $comments_folder.$new_chapter_number_1."/";

# Files definer
$commenter_file = $current_chapter_comments_folder."Commenter.txt";
$comment_file = $current_chapter_comments_folder.$comment_text.".txt";
$comment_date_file = $current_chapter_comments_folder."Date.txt";

echo $comment_file;

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

# Comment Style definer
$comment_style = $additional_background_color." ".$text_black_css_class." ".$border_3px_solid_black_css_class;

if ($local_comment_number > 1 and $comment_dates != Null) {
	$comment_number = 1;

	while ($comment_number <= $local_comment_number) {
		$comment_date = date("H:i d/m/Y", strtotime($comment_dates[$comment_number]));
		$commenter = $commenters[$comment_number];
		$current_chapter_comment_text = $comments[$comment_number];

		$comment = '<'.$m.' class="'.$comment_style.'" style="text-align:left;'.$rounded_border_style_2.'">'."\n";

		$comment .= '<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n";
		
		$comment .= '<b>'.$comment_number.' - '.$commenter."</b><br />"."\n";

		$comment .= "<b>".$commented_on_text.": "."</b>".$comment_date."\n".'<br />'."\n";

		# Chapter text and title
		if ($show_chapter_on_comment == True) {
			$comment .= "<b>".$commented_on_text." ".strtolower($chapter_title_text).": "."</b>".$chapter_titles[$chapter_number_3].'<br />'."\n";
		}

		$comment .= '<hr class="'.$third_full_border.'" />'.$current_chapter_comment_text."\n".'<br /><br /><br /><br /><br />'."\n";

		$comment .= $div_close."\n".'</'.$m.'>'."\n"."<br />"."\n"."\n";

		$chapter_comments_array[$chapter_number_1][$comment_number] = $comment;

		$comment_number++;
	}
}

if ($local_comment_number == 1 and $comment_dates != Null) {
	$comment_date = date("H:i d/m/Y", strtotime($comment_dates[1]));
	$commenter = $commenters[1];
	$current_chapter_comment_text = $comments[1];

	$comment = '<'.$m.' class="'.$comment_style.'" style="text-align:left;'.$rounded_border_style_2.'">'."\n";

	$comment .= '<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n";

	$comment .= '<b>'.$commenter."</b><br />";

	$comment .= "<b>".$commented_on_text.": "."</b>".$comment_date."\n".'<br />';

	# Chapter text and title
	if ($show_chapter_on_comment == True) {
		$comment .= "<b>".$chapter_title_text.": "."</b>".$chapter_titles[$chapter_number_3].'<br />'."\n";
	}

	$comment .= '<hr class="'.$third_full_border.'" />'.$current_chapter_comment_text."\n".'<br /><br /><br /><br /><br />'."\n";

	$comment .= $div_close."\n".'</'.$m.'>'."\n"."<br />"."\n"."\n";

	$chapter_comments_array[$chapter_number_1] = $comment;
}

?>