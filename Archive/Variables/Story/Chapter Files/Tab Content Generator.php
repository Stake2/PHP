<?php 

# Tab div id, a name and big space generator
echo "\n".
'<a name="'.$chapter_div_name.'"></a>'."\n".
'<div id="'.$chapter_div_name.'" class="city '.$alternative_full_tab_style." ".$third_full_border." ".$border_color." ".$border_4px_solid_css_class.'" style="display: none;'.$hstyle2.''.$rounded_border_style_2.'">'."\n";

echo format($you_are_reading_chapter_text_template, array($computer_variable, $h2_element, $you_are_reading_chapter_text, $h2_element));
echo format($you_are_reading_chapter_text_template, array($mobile_variable, $h3_element, $you_are_reading_chapter_text, $h3_element));

echo "\n".
'<h5 class="'.$alternative_full_tab_style.'" style="'.$hstyle.'text-align:left;"><hr class="'.$third_full_border.'" />'."\n".
$previous_chapter_button.
$next_chapter_button;

echo '<a href="#'.$website_tab_codes_computer[0].'">'.
'<button class="w3-btn '.$second_button_style." ".$computer_variable.'" style="'.$local_button_style.'" onclick="openCity('."'".$website_tab_codes_computer[0]."')".'"><h3>'.$icons[16].'</h3></button>'.
'</a>'."\n";

echo '<a href="#'.$website_tab_codes_mobile[0].'">'.
'<button class="w3-btn '.$second_button_style." ".$mobile_variable.'" style="'.$local_button_style.'" onclick="openCity('."'".$website_tab_codes_mobile[0]."')".'"><h3>'.$icons[16].'</h3></button>'.
'</a>'."\n";

echo "<br /><br /><br /><br />"."\n";

echo $div_zoom_animation."\n";

# Story cover shower if story has the website_story_has_book_covers_setting setting as True
if ($story_website_settings["has_story_covers"] == True) {
	echo "<center>"."\n";

	if (isset($chapter_cover_images_computer[$chapter_cover_number]) and isset($chapter_cover_images_mobile[$chapter_cover_number])) {
		echo $chapter_cover_images_computer[$chapter_cover_number];
		echo $chapter_cover_images_mobile[$chapter_cover_number];
	}

	echo "</center>"."\n";
	echo "<br />"."\n";
}

echo '<div id="'.$current_chapter_tab_div_text.'" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" unselectable="on" onselectstart="return false;" onmousedown="return false;">'."\n";

require $chapter_text_displayer_php;

# Bottom previous Chapter Button
echo $previous_chapter_button;

# Bottom next Chapter Button
echo $next_chapter_button;

$to_comment_button_text = $to_comment_text." ".$icons_array["comment"];

# Computer Comment button
if ($story_website_settings["chapter_comments"] == True) {
	echo '<div class="'.$computer_variable.'">'."\n".
	'<button class="w3-btn '.$second_button_style." ".$computer_variable.'" id="comment_button_'.$chapter_number_1.'" style="margin-left:15px;float:right;'.$rounded_border_style_2.'"><h3><b>'.$to_comment_button_text.'</b></h3></button>'."\n".
	$div_close."\n";
}

$i_read_it_button_text = $i_read_it_text." ".$icons_array["reader"];

# Computer "I Read it" button
if ($story_website_settings["has_reads"] == True) {
	echo '<div class="'.$computer_variable.'">'."\n".
	'<button class="w3-btn '.$second_button_style." ".$computer_variable.'" id="read_button_'.$chapter_number_1.'" style="margin-left:15px;float:right;'.$rounded_border_style_2.'"><h3><b>'.$i_read_it_button_text.'</b></h3></button>'."\n".
	$div_close."\n";
}

if ($story_website_settings["has_reads"] == True) {
	echo $big_space_mobile_and_computer;
}

# Mobile Comment button
if ($story_website_settings["chapter_comments"] == True) {
	echo '<div class="'.$mobile_variable.'">'."\n".
	'<button class="w3-btn '.$second_button_style." ".$mobile_variable.'" id="comment_button_'.$chapter_number_1.'_mobile" style="margin-left:15px;float:right;'.$rounded_border_style_2.'"><'.$h4_element.'><b>'.$to_comment_button_text.'</b></'.$h4_element.'></button>'."\n".
	"<br /><br /><br />"."\n".
	$div_close."\n";
}

# Mobile "I Read it" button
if ($story_website_settings["has_reads"] == True) {
	echo '<div class="'.$mobile_variable.'">'."\n".
	'<button class="w3-btn '.$second_button_style." ".$mobile_variable.'" id="read_button_'.$chapter_number_1.'_mobile" style="margin-left:15px;float:right;'.$rounded_border_style_2.'"><h3><b>'.$i_read_it_button_text.'</b></h3></button>'."\n".
	$div_close."\n";
}

echo $mobile_div."<br /><br /><br /><br />".$div_close."\n";

echo '<div style="text-align: center;">'."\n";

$h_element = $h3_element;
echo format($you_are_reading_chapter_text_template, array($computer_variable, $h_element, $you_are_reading_chapter_text, $h_element));

$h_element = $h4_element;
echo format($you_are_reading_chapter_text_template, array($mobile_variable, $h_element, $you_are_reading_chapter_text, $h_element));

echo $div_close."\n";

echo $mobile_div."<br />".$div_close."\n".
"</h5>"."\n";

if ($story_website_settings["has_comments"] == True or $story_website_settings["has_reads"]) {
	require $chapter_comment_and_read_displayer_php;
}

echo $div_close."\n";

?>