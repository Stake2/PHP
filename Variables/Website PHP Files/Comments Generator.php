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

if ($local_comment_number > 1 and $comment_dates != Null) {
	$comment_number = 1;

	while ($comment_number <= $local_comment_number) {
		$comment_date = date("H:i d/m/Y", strtotime($comment_dates[$comment_number]));
		$commenter = $commenters[$comment_number];
		$current_comment = $comments[$comment_number];

		$comment = '<'.$h4_element.' class="'.$comment_style.'" style="text-align:left;'.$rounded_border_style_2.'">'."\n";

		$comment .= '<div style="margin-left:5%;margin-right:5%;">'."\n".'<br />'."\n";
		
		$comment .= '<b>'.$comment_number.' - '.$commenter."</b><br />";

		$comment .= "<b>".$commented_on_text.": "."</b>".$comment_date."\n".'<br />';

		# Chapter text and title
		if ($show_chapter_on_comment == True) {
			$comment .= substr($chapters_text, 0, -1).':</b> '.$chapter_titles[$chapter_number_3].'<br />'."<b>"."\n";
		}

		$comment .= '<hr class="'.$third_full_border.'" />'.$current_comment."\n".'<br /><br /><br /><br /><br />'."\n";

		$comment .= $div_close."\n".'</'.$h4_element.'>'."\n"."<br />"."\n"."\n";

		$website_comments_array[$comment_number] = $comment;

		echo $comment;

		$comment_number++;
	}
}

?>