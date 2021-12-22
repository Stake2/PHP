<?php 

$i2 = $i + 1;
$i3 = $i + 2;

$number_variable = $chapter_number_1;

# Read Generator PHP File Includer
require $read_generator;

# Comment Generator PHP File Includer
require $comment_generator;

# Defines the top and bottom texts
if ($website_story_has_titles == True) {
	$local_chapter_titles = array_values($chapter_titles);

	if (strpos($local_chapter_titles[$chapter_number_4], "/") == True) {
		#$local_chapter_titles[$chapter_number_4] = array_reverse(explode("/", $local_chapter_titles[$chapter_number_4]))[0];
	}

	$top_and_bottom_chapter_text = "\n\n"."<b>".$you_are_reading_story_text."<br />"."\n".$chapter_text_name.": ".$chapter_number_1." - ".$local_chapter_titles[$chapter_number_4]."</b>"."\n\n";
}

else {
	$top_and_bottom_chapter_text = "\n\n"."<b>".$you_are_reading_story_text."<br />"."\n".$chapter_text_name.": ".$chapter_number_1."</b>"."\n\n";
}

# Tab div id, a name and big space generator
echo "\n";
echo '<a name="'.$chapter_div_text.$chapter_number_1.'"></a>'."\n";

echo '<div id="'.$chapter_div_text.$chapter_number_1.'" class="city '.$alternative_full_tab_style." ".$third_full_border." ".$border_color." ".$border_4px_solid_css_class.'" style="display:none;'.$hstyle2.''.$rounded_border_style_2.'">'."\n";
echo '<br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" />'."\n";
echo '<br />'."\n";

$new_chapter_span = Create_Element("span", $third_text_color, '<b>['.$new_text.'!]</b>');

# "You're Reading [Story]" top text displayer
if ($story_website_settings["use_status"] == True) {
	if ($chapter_number_1 == $chapters and $story_status != $story_status_texts[0] and $story_status != $story_status_texts[3] and $story_website_settings["show_new_chapter_text"] == True) {
		echo '<div class="'.$computer_variable.'">'.'<'.$h2_element.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$new_chapter_span.'<br />'.$div_close.'</'.$h2_element.'>'.$div_close."\n";

		echo '<div class="'.$mobile_variable.'">'.'<'.$h4_element.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$new_chapter_span.$div_close.'</'.$h4_element.'>'.$div_close."\n";

		$chapter_number_4++;
	}

	else {
		echo '<div class="'.$computer_variable.'">'.'<'.$h2_element.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$div_close.'</'.$h2_element.'>'.$div_close."\n";

		echo $margin.'<div class="'.$mobile_variable.'">'.'<'.$h4_element.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$div_close.'</'.$h4_element.'>'.$div_close."\n".$div_close."\n";
	
		$chapter_number_4++;
	}
}

else {
	if ($chapter_number_1 == $chapters and $story_website_settings["show_new_chapter_text"] == True) {
		echo '<div class="'.$computer_variable.'">'.'<'.$h2_element.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$new_chapter_span.'<br />'.$div_close.'</'.$h2_element.'>'.$div_close."\n";

		echo '<div class="'.$mobile_variable.'">'.'<'.$h4_element.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$new_chapter_span.$div_close.'</'.$h4_element.'>'.$div_close."\n";

		$chapter_number_4++;
	}

	else {
		echo '<div class="'.$computer_variable.'">'.'<'.$h2_element.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$div_close.'</'.$h2_element.'>'.$div_close."\n";

		echo $margin.'<div class="'.$mobile_variable.'">'.'<'.$h4_element.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$div_close.'</'.$h4_element.'>'.$div_close."\n".$div_close."\n";
	
		$chapter_number_4++;
	}
}

# H5 header and hr creator
echo "\n";
echo '<h5 class="'.$alternative_full_tab_style.'" style="'.$hstyle.'text-align:left;"><hr class="'.$third_full_border.'" />'."\n";

# Top Previous chapter button
if ($chapter_number_1 != 1) {
	if ($website_story_has_titles == True) {
		$chapter_number_and_text = " - ".ucwords($chapter_text). ": ".$chapter_number_3." - ".str_replace("'", "", $chapter_titles[$chapter_number_3 - 1]);
	}

	if ($website_story_has_titles == False) {
		$chapter_number_and_text = " - ".ucwords($chapter_text). ": ".$chapter_number_3;
	}

	$change_title_on_click_script = "Add_To_Website_Title('".$chapter_number_and_text."', 'notification');";

	$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_3."'".');'.$change_title_on_click_script;

	echo '<a href="#'.$chapter_div_text.$chapter_number_3.'"><button class="w3-btn '.$second_button_style.'" style="float:left;'.$rounded_border_style_2.'" onclick="'.$on_click_script.'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>'."\n";

	$has_previous_chapter_button = True;
}

else {
	$has_previous_chapter_button = False;
}

# Top Next chapter button
if ($chapter_number_1 != $chapters and $chapter_number_1 != $chapters + 1) {
	if ($website_story_has_titles == True) {
		$chapter_number_and_text = " - ".ucwords($chapter_text). ": ".($chapter_number_4 + 1)." - ".str_replace("'", "", $chapter_titles[$chapter_number_4]);
	}

	if ($website_story_has_titles == False) {
		$chapter_number_and_text = " - ".ucwords($chapter_text). ": ".($chapter_number_4 + 1);
	}

	$change_title_on_click_script = "Add_To_Website_Title('".$chapter_number_and_text."', 'notification');";

	$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_2."'".');'.$change_title_on_click_script;

	echo '<a href="#'.$chapter_div_text.$chapter_number_2.'"><button class="w3-btn '.$second_button_style.'" style="float:right;'.$rounded_border_style_2.'" onclick="'.$on_click_script.'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>'."\n";

	$has_next_chapter_button = True;
}

else {
	$has_next_chapter_button = False;
}

# "Go back to the chapter buttons tab" button
if ($has_next_chapter_button == True) {
	$local_button_style = 'float: right;margin-right: 15px;'.$rounded_border_style_2;
}

if ($has_next_chapter_button == false) {
	$local_button_style = 'float: right;'.$rounded_border_style_2;
}

echo '<a href="#'.$tab_codes[0].'">'.
'<button class="w3-btn '.$second_button_style.' '.$computer_variable.'" style="'.$local_button_style.'" onclick="openCity('."'".$tab_codes[0]."')".'"><h3>'.$icons[16].'</h3></button>'.
'</a>'."\n";

echo '<a href="#'.$website_tab_codes_mobile[0].'">'.
'<button class="w3-btn '.$second_button_style.' '.$mobile_variable.'" style="'.$local_button_style.'" onclick="openCity('."'".$website_tab_codes_mobile[0]."')".'"><h3>'.$icons[16].'</h3></button>'.
'</a>'."\n";

echo '<br /><br /><br /><br />'."\n";

echo $div_zoom_animation."\n";

# Story cover shower if story has the website_story_has_book_covers_setting setting as True
if ($story_website_settings["show_chapter_covers"] == True) {
	echo "<center>"."\n";

	if (isset($chapter_cover_images_computer[$book_cover_number]) and isset($chapter_cover_images_mobile[$book_cover_number])) {
		echo $chapter_cover_images_computer[$book_cover_number];
		echo $chapter_cover_images_mobile[$book_cover_number];
	}

	echo "</center>"."\n";
	echo "<br />"."\n";
}

echo '<div id="'.$chapter_tab_div_text.$chapter_number_1.'" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" unselectable="on" onselectstart="return false;" onmousedown="return false;">'."\n";

require $chapter_text_displayer_php;

# Bottom Previous chapter button
if ($chapter_number_1 != 1) {
	if ($website_story_has_titles == True) {
		$chapter_number_and_text = " - ".ucwords($chapter_text). ": ".$chapter_number_3." - ".str_replace("'", "", $chapter_titles[$chapter_number_3 - 1]);
	}

	if ($website_story_has_titles == False) {
		$chapter_number_and_text = " - ".ucwords($chapter_text). ": ".$chapter_number_3;
	}

	$change_title_on_click_script = "Add_To_Website_Title('".$chapter_number_and_text."', 'notification');";

	$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_3."'".');'.$change_title_on_click_script;

	echo '<a href="#'.$chapter_div_text.$chapter_number_3.'"><button class="w3-btn '.$second_button_style.'" style="float:left;'.$rounded_border_style_2.'" onclick="'.$on_click_script.'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>'."\n";

	$has_previous_chapter_button = True;
}

# Bottom Next chapter button
if ($chapter_number_1 != $chapters) {
	if ($website_story_has_titles == True) {
		$chapter_number_and_text = " - ".ucwords($chapter_text). ": ".($chapter_number_4 + 1)." - ".str_replace("'", "", $chapter_titles[$chapter_number_4]);
	}

	if ($website_story_has_titles == False) {
		$chapter_number_and_text = " - ".ucwords($chapter_text). ": ".($chapter_number_4 + 1);
	}

	$change_title_on_click_script = "Add_To_Website_Title('".$chapter_number_and_text."', 'notification');";

	$on_click_script = 'openCity('."'".$chapter_div_text.$chapter_number_2."'".');'.$change_title_on_click_script;

	echo '<a href="#'.$chapter_div_text.$chapter_number_2.'"><button class="w3-btn '.$second_button_style.'" style="float:right;'.$rounded_border_style_2.'" onclick="'.$on_click_script.'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>'."\n";

	$has_next_chapter_button = True;
}

$to_comment_button_text = $to_comment_text." ".$icons_array["comment"];

# Computer Comment button
if ($story_website_settings["chapter_comments"] == True) {
	echo '<div class="'.$computer_variable.'">'."\n";
	echo '<button class="w3-btn '.$second_button_style.' '.$computer_variable.'" id="comment_button_'.$a.'" style="margin-left:15px;float:right;'.$rounded_border_style_2.'"><h3><b>'.$to_comment_button_text.'</b></h3></button>'."\n";
	echo $div_close."\n";
}

$i_read_it_button_text = $i_read_it_text." ".$icons_array["reader"];

# Computer "I Read it" button
if ($story_website_settings["has_reads"] == True) {
	echo '<div class="'.$computer_variable.'">'."\n";
	echo '<button class="w3-btn '.$second_button_style.' '.$computer_variable.'" id="readbtn'.$a.'" style="margin-left:15px;float:right;'.$rounded_border_style_2.'"><h3><b>'.$i_read_it_button_text.'</b></h3></button>'."\n";
	echo $div_close."\n";
}

if ($story_website_settings["has_reads"] == True) {
	echo $big_space_mobile_and_computer;
}

# Mobile Comment button
if ($story_website_settings["chapter_comments"] == True) {
	echo "\n";
	echo '<div class="'.$mobile_variable.'"><br /><br />'."\n".$div_close."\n";
	echo '<div class="'.$mobile_variable.'">'."\n";
	echo '<button class="w3-btn '.$second_button_style.' '.$mobile_variable.'" id="comment_button_'.$a.'m" style="margin-left:15px;float:right;'.$rounded_border_style_2.'"><'.$h4_element.'><b>'.$to_comment_button_text.')</b></'.$h4_element.'></button>'."\n";
	echo '<br /><br />'."\n";
	echo $div_close."\n";
}

# Mobile "I Read it" button
if ($story_website_settings["has_reads"] == True) {
	echo '<div class="'.$mobile_variable.'">'."\n";
	echo '<button class="w3-btn '.$second_button_style.' '.$mobile_variable.'" id="readbtn'.$a.'m" style="margin-left:15px;float:right;'.$rounded_border_style_2.'" onclick="openCity('."'".'modal-read-'.$a."m')".'"><'.$h4_element.'><b>'.$i_read_it_text.' ('.$readed_number.' '.$icons[20].')</b></'.$h4_element.'></button>'."\n";
	echo $div_close."\n";
	echo '<br /><div class="'.$mobile_variable.'"><br /><br />'."\n".'</div>'."\n";
}

if ($story_website_settings["has_reads"] == False) {
	echo '<br /><br /><br />'."\n";
}

# "You're Reading [Story]" bottom text
if ($story_website_settings["use_status"] == True) {
	if ($chapter_number_1 == $chapters and $story_status != $story_status_texts[0] and $story_status != $story_status_texts[3] and $story_website_settings["show_new_chapter_text"] == True) {
		echo '<div style="text-align:center;">'."\n".
		$div_zoom_animation."\n".
		'<span class="'.$alternative_full_tab_style.'">'."\n".
		'<br />'.$top_and_bottom_chapter_text."\n".
		$new_chapter_span."\n".
		'<br /></span>'."\n".
		$div_close."\n".
		$div_close."\n";

		$chapter_number_7++;
	} 

	else {
		echo '<div style="text-align:center;">'."\n".
		$div_zoom_animation."\n".
		'<span class="'.$alternative_full_tab_style.'">'."\n".
		'<br />'.$top_and_bottom_chapter_text.'<br />'."\n".
		'</span>'."\n".
		$div_close."\n".
		$div_close."\n";

		$chapter_number_7++;
	}
}

else {
	if ($chapter_number_1 == $chapters and $story_website_settings["show_new_chapter_text"] == True) {
		echo '<div style="text-align:center;">'."\n".
		$div_zoom_animation."\n".
		'<span class="'.$alternative_full_tab_style.'">'."\n".
		'<br />'.$top_and_bottom_chapter_text."\n".
		'<b>'.$span_variable.'['.$new_text.'!]'.$spanc.'</b>'."\n".
		'<br /></span>'."\n".
		$div_close."\n".
		$div_close."\n";

		$chapter_number_7++;
	} 

	else {
		echo '<div style="text-align:center;">'."\n".
		$div_zoom_animation."\n".
		'<span class="'.$alternative_full_tab_style.'">'."\n".
		'<br />'.$top_and_bottom_chapter_text.'<br />'."\n".
		'</span>'."\n".
		$div_close."\n".
		$div_close."\n";

		$chapter_number_7++;
	}
}

# HR displayer if the story has comments or rads
if (isset($array1[$number_variable]) or isset($array2[$number_variable])) {
	echo '<hr class="'.$third_full_border.'" />'."\n";
}

else {
	echo $mobile_div.'<br />'.$div_close."\n";
}

echo '</h5>'."\n";

if ($story_website_settings["chapter_comments"] == True and $story_website_contains_comments == True) {
	require $chapter_comment_and_read_displayer_php;
}

echo $div_close."\n";

# Adds to the variables
$i++;
$i2++;
$a++;

if (isset($h) == True) {
	if ($h != 0) {
		$h--;
	}
}

$chapter_number_1++;
$chapter_number_2++;
$chapter_number_3++;
$chapter_date_number++;
$chapter_date_number++;
$chapter_date_number++;
$book_cover_number++;

?>