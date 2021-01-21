<?php 

$i2 = $i + 1;
$i3 = $i + 2;

if ($site_uses_new_comment_and_read_displayer == True) {
	$number_variable = $chapter_number_1;
}

if ($write_new_chapter == True) {
	array_push($chapter_titles, $chapters + 1);
}

# Defines the top and bottom texts
if ($website_write_story_setting == True and $story_name_website_chapter_to_write == $chapter_number_1) {
	if ($website_story_has_titles == True) {
		$top_and_bottom_chapter_text = "\n"."\n".'<b>'.$write_texts_array[2].'<br />'."\n".$captxtname.': '.$chapter_number_1.' - '.$chapter_titles[$chapter_number_4].'</b>'."\n"."\n";
	}

	else {
		$top_and_bottom_chapter_text = "\n"."\n".'<b>'.$write_texts_array[2].'<br />'."\n".$captxtname.': '.$chapter_number_1.'</b>'."\n"."\n";
	}
}

else {
	if ($website_story_has_titles == True) {
		$top_and_bottom_chapter_text = "\n"."\n".'<b>'.$read_texts_array[1].'<br />'."\n".$captxtname.': '.$chapter_number_1.' - '.$chapter_titles[$chapter_number_4].'</b>'."\n"."\n";
	}

	else {
		$top_and_bottom_chapter_text = "\n"."\n".'<b>'.$read_texts_array[1].'<br />'."\n".$captxtname.': '.$chapter_number_1.'</b>'."\n"."\n";
	}
}

# New design div
if ($website_new_design_setting == True) {
	echo '
<section>
<div class="box-line">
<div class="box-bar">
<div class="boxConteudo">';
}

# Tab div id, a name and big space generator
echo "\n";
echo '<a name="'.$chapter_div_text.$chapter_number_1.'"></a>'."\n";

if ($write_new_chapter == True and $chapter_number_1 == $chapters + 1) {
	$display_variable = 'display:none;';
}

else {
	$display_variable = 'display:none;';
}

echo '<div id="'.$chapter_div_text.$chapter_number_1.'" class="city '.$alternative_full_tab_style.'" style="'.$display_variable.$hstyle2.''.$rounded_border_style_2.'">'."\n";
echo '<br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" /><br class="'.$mobile_variable.'" />'."\n";
echo '<br />'."\n";

if ($selected_website != $sitedesertisland) {
	$span_variable = $yellowspan;
}

if ($selected_website == $sitedesertisland) {
	$span_variable = $cyanspan;
}

# "You're Reading [Story]" top text displayer
if ($story_uses_status == True) {
	if ($chapter_number_1 == $chapters and $story_status != $story_statuses[0] and $story_status != $story_statuses[3]) {
		echo '<div class="'.$computer_variable.'">'.'<'.$n.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$span_variable.'<b> ['.$newtxt.'!]</b>'.$spanc.'<br />'.$div_close.'</'.$n.'>'.$div_close."\n";

		echo '<div class="'.$mobile_variable.'">'.'<'.$m.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$span_variable.'<b> ['.$newtxt.'!]</b>'.$spanc.$div_close.'</'.$m.'>'.$div_close."\n";

		$chapter_number_4++;
	}

	else {
		echo '<div class="'.$computer_variable.'">'.'<'.$n.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$div_close.'</'.$n.'>'.$div_close."\n";

		echo $margin.'<div class="'.$mobile_variable.'">'.'<'.$m.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$div_close.'</'.$m.'>'.$div_close."\n".$div_close."\n";
	
		$chapter_number_4++;
	}
}

else {
	if ($chapter_number_1 == $chapters) {
		echo '<div class="'.$computer_variable.'">'.'<'.$n.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$span_variable.'<b> ['.$newtxt.'!]</b>'.$spanc.'<br />'.$div_close.'</'.$n.'>'.$div_close."\n";

		echo '<div class="'.$mobile_variable.'">'.'<'.$m.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$span_variable.'<b> ['.$newtxt.'!]</b>'.$spanc.$div_close.'</'.$m.'>'.$div_close."\n";

		$chapter_number_4++;
	}

	else {
		echo '<div class="'.$computer_variable.'">'.'<'.$n.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$div_close.'</'.$n.'>'.$div_close."\n";

		echo $margin.'<div class="'.$mobile_variable.'">'.'<'.$m.' class="'.$alternative_full_tab_style.'" style="'.$roundedborderstyle5.'">'.$div_zoom_animation.'<br />'.$top_and_bottom_chapter_text.$div_close.'</'.$m.'>'.$div_close."\n".$div_close."\n";
	
		$chapter_number_4++;
	}
}

# H5 header and hr creator
echo "\n";
echo '<h5 class="'.$alternative_full_tab_style.'" style="'.$hstyle.'text-align:left;"><hr class="'.$third_full_border.'" />'."\n";

# Top Previous chapter button
if ($chapter_number_1 != 1) {
	if ($new_write_style == True) {
		$onclickscript = 'openCity('."'".$chapter_div_text.$chapter_number_3."'".');';
		$onclickscript = $onclickscript.'DefineChapter('.$chapter_number_3.');OpenChapter2(ReadContent'.$chapter_number_3.');';
	}

	else if ($new_write_style == false) {
		$onclickscript = 'openCity('."'".$chapter_div_text.$chapter_number_3."'".');';
	}

	echo '<a href="#'.$chapter_div_text.$chapter_number_3.'"><button class="w3-btn '.$second_button_style.'" style="float:left;'.$rounded_border_style_2.'" onclick="'.$onclickscript.'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>'."\n";

	$has_previous_chapter_button = True;
}

else {
	$has_previous_chapter_button = false;
}

# Top Next chapter button
if ($chapter_number_1 != $chapters and $chapter_number_1 != $chapters + 1) {
	if ($new_write_style == True) {
		$onclickscript = 'openCity('."'".$chapter_div_text.$chapter_number_2."'".');';
		$onclickscript = $onclickscript.'DefineChapter('.$chapter_number_2.');OpenChapter2(ReadContent'.$chapter_number_2.');';
	}

	else if ($new_write_style == false) {
		$onclickscript = 'openCity('."'".$chapter_div_text.$chapter_number_2."'".');';
	}

	echo '<a href="#'.$chapter_div_text.$chapter_number_2.'"><button class="w3-btn '.$second_button_style.'" style="float:right;'.$rounded_border_style_2.'" onclick="'.$onclickscript.'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>'."\n";

	$has_next_chapter_button = True;
}

else {
	$has_next_chapter_button = false;
}

if ($new_write_style == True) {
	if ($has_previous_chapter_button == True) {
		$local_button_style = 'float: left;margin-left: 15px;'.$rounded_border_style_2;
	}

	if ($has_previous_chapter_button == false) {
		$local_button_style = 'float: left;'.$rounded_border_style_2;
	}

	$edit_story_chapter_button = '<span id="edit_story_chapter_button_number_'.$chapter_number_1.'" style="display:none;">WriteContent'.$chapter_number_1.'</span>'.

	'<button id="'.$write_button_text.'-'.$chapter_number_1.'" title="Edit Story Chapter Button" class="w3-btn '.$second_button_style.'" style="'.$local_button_style.'" onclick="WriteChapter(WriteContent'.$chapter_number_1.');"><h3><i class="fas fa-pen"></i></h3></button>'.
	"\n"."\n";

	$show_story_chapter_text_button = '<span id="show_story_chapter_text_button_number_'.$chapter_number_1.'" style="display:none;">ReadContent'.$chapter_number_1.'</span>'.
	'<button id="'.$write_button_text.'-'.$chapter_number_1.'" class="w3-btn '.$second_button_style.'" style="'.$local_button_style.'" onclick="OpenChapter2(ReadContent'.$chapter_number_1.');"><h3><i class="fas fa-book"></i></h3></button>'.

	'<button id="write-button-'.$chapter_number_1.'" title="Edit Story Chapter Button" class="w3-btn '.$second_button_style.'" style="'.$local_button_style.'" onclick="WriteChapter(WriteContent'.$chapter_number_1.');"><h3><i class="fas fa-pen"></i></h3></button>'.
	"\n"."\n";

	$show_story_chapter_text_button = '<span id="show_story_chapter_text_button_number_'.$chapter_number_1.'" style="display:none;">ReadContent'.$chapter_number_1.'</span>'.
	'<button id="write-button-'.$chapter_number_1.'" class="w3-btn '.$second_button_style.'" style="'.$local_button_style.'" onclick="OpenChapter2(ReadContent'.$chapter_number_1.');"><h3><i class="fas fa-book"></i></h3></button>'.

	"\n"."\n";

	# Edit story button displayer
	echo $edit_story_chapter_button;
	echo '<div style="display:none;">'.$show_story_chapter_text_button.$div_close;
}

# "Go back to the chapter buttons tab" button
if ($has_next_chapter_button == True) {
	$local_button_style = 'float: right;margin-right: 15px;'.$rounded_border_style_2;
}

if ($has_next_chapter_button == false) {
	$local_button_style = 'float: right;'.$rounded_border_style_2;
}

echo '<a href="#'.$citycodes[0].'">'.
'<button class="w3-btn '.$second_button_style.' '.$computer_variable.'" style="'.$local_button_style.'" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button>'.
'</a>'."\n";

echo '<a href="#'.$tabcodesm[0].'">'.
'<button class="w3-btn '.$second_button_style.' '.$mobile_variable.'" style="'.$local_button_style.'" onclick="openCity('."'".$tabcodesm[0]."')".'"><h3>'.$icons[16].'</h3></button>'.
'</a>'."\n";

if ($write_new_chapter == True and $chapter_number_1 != $chapters + 1) {
	#"Write new chapter" button
	echo '<a href="#'.$write_new_chapter_tab_text.'">'.
	'<button class="w3-btn '.$second_button_style.'" style="float:right;margin-right:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$chapter_div_text.($chapters + 1)."')".'"><h3>'.$icon_plus.'</h3></button></a>'."\n";
}

echo '<br /><br /><br /><br />'."\n";

echo $div_zoom_animation."\n";

# Story cover shower if story has the website_story_has_bookcovers_setting setting as True
if ($website_story_has_bookcovers_setting == True or $website_story_has_bookcovers_setting == True and $website_name == $sitepequenata and $chapter_number_1 <= 10) {
	echo '<center>'."\n";

	if (isset($coverimages[$book_cover_number]) and isset($coverimagesm[$book_cover_number])) {
		echo $coverimages[$book_cover_number];
		echo $coverimagesm[$book_cover_number];
	}

	echo '</center>'."\n";
	echo "<br />"."\n";
}

if ($new_write_style == false) {
	echo '<div id="'.$captextdiv.$chapter_number_1.'" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" unselectable="on" onselectstart="return false;" onmousedown="return false;">'."\n";
}

if ($new_write_style == True) {
	echo '<div id="'.$captextdiv.$chapter_number_1.'">'."\n";
}

$website_write_story_setting = false;

# Chapter writer tab displayer
if ($website_write_story_setting == True and $story_name_website_chapter_to_write == $chapter_number_1 or $website_write_story_setting == True and $story_name_website_chapter_to_write.(int)'0' == $chapter_number_1 and $chapter_number_1 != 0) {
	echo '<div id="'.$captextdiv.$chapter_number_1.'">'."\n";

	require $chapter_writer_displayer_php;

	#echo "$chapter_writer_displayer_php was loaded.";

	if ($new_write_style == True) {
		#echo $new_write_stylescript."\n";
	}

	echo $div_close."\n";
	echo $div_close."\n";
	echo '<br /><br />'."\n";
}

# Chapter text tab displayer
else {
	require $chapter_text_displayer_php;
}

# Bottom Previous chapter button
if ($chapter_number_1 != 1) {
	echo '<a href="#'.$chapter_div_text.$chapter_number_3.'"><button class="w3-btn '.$second_button_style.'" style="float:left;'.$rounded_border_style_2.'" onclick="openCity('."'".$chapter_div_text.$chapter_number_3."');".'DefineChapter('.$chapter_number_3.');OpenChapter2(ReadContent'.$chapter_number_3.');"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>'."\n";
}

# Bottom Next chapter button
if ($chapter_number_1 != $chapters) {
	echo '<a href="#'.$chapter_div_text.$chapter_number_2.'"><button class="w3-btn '.$second_button_style.'" style="float:right;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$chapter_div_text.$chapter_number_2."');".'DefineChapter('.$chapter_number_2.');OpenChapter2(ReadContent'.$chapter_number_2.');"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>'."\n";
}

#Computer Comment button
if ($website_has_comments_tab == True and $story_has_chapter_comments == True) {
	echo '<div class="'.$computer_variable.'">'."\n";
	echo '<button class="w3-btn '.$second_button_style.' '.$computer_variable.'" id="commentbtn'.$a.'" style="margin-left:15px;float:right;'.$rounded_border_style_2.'"><h3><b>'.$comments_texts_array[1].' '.$icons[12].' ('.$number_of_chapter_comments.')</b></h3></button>'."\n";
	echo $div_close."\n";
}

#Computer "I Read it" button
if ($story_has_reads == True) {
	echo '<div class="'.$computer_variable.'">'."\n";
	echo '<button class="w3-btn '.$second_button_style.' '.$computer_variable.'" id="readbtn'.$a.'" style="margin-left:15px;float:right;'.$rounded_border_style_2.'"><h3><b>'.$read_texts_array[2].' ('.$readed_number.' '.$icons[20].')</b></h3></button>'."\n";
	echo $div_close."\n";
	echo $bigspacemobileandcomputer;
}

if ($story_has_chapter_comments == false and $story_has_reads == false) {
	echo '<br /><br />'."\n";
}

#"You're Reading [Story]" bottom text
if ($story_uses_status == True) {
	if ($chapter_number_1 == $chapters and $story_status != $story_statuses[0] and $story_status != $story_statuses[3]) {
		echo '<div style="text-align:center;">'."\n".
		$div_zoom_animation."\n".
		'<span class="'.$alternative_full_tab_style.'">'."\n".
		'<br />'.$top_and_bottom_chapter_text."\n".
		'<b>'.$span_variable.'['.$newtxt.'!]'.$spanc.'</b>'."\n".
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
	if ($chapter_number_1 == $chapters) {
		echo '<div style="text-align:center;">'."\n".
		$div_zoom_animation."\n".
		'<span class="'.$alternative_full_tab_style.'">'."\n".
		'<br />'.$top_and_bottom_chapter_text."\n".
		'<b>'.$span_variable.'['.$newtxt.'!]'.$spanc.'</b>'."\n".
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

#Mobile Comment button
if ($website_has_comments_tab == True and $story_has_chapter_comments == True) {
	echo "\n";
	echo '<div class="'.$mobile_variable.'"><br /><br />'."\n".$div_close."\n";
	echo '<div class="'.$mobile_variable.'">'."\n";
	echo '<button class="w3-btn '.$second_button_style.' '.$mobile_variable.'" id="commentbtn'.$a.'m" style="margin-left:15px;float:right;'.$rounded_border_style_2.'"><'.$m.'><b>'.$comments_texts_array[1].' '.$icons[12].' ('.$number_of_chapter_comments.')</b></'.$m.'></button>'."\n";
	echo '<br /><br />'."\n";
	echo $div_close."\n";
}

#Mobile "I Read it" button
if ($story_has_reads == True) {
	echo '<div class="'.$mobile_variable.'">'."\n";
	echo '<button class="w3-btn '.$second_button_style.' '.$mobile_variable.'" id="readbtn'.$a.'m" style="margin-left:15px;float:right;'.$rounded_border_style_2.'" onclick="openCity('."'".'modal-read-'.$a."m')".'"><'.$m.'><b>'.$read_texts_array[2].' ('.$readed_number.' '.$icons[20].')</b></'.$m.'></button>'."\n";
	echo $div_close."\n";
	echo '<br /><div class="'.$mobile_variable.'"><br /><br />'."\n".'</div>'."\n";
}

#Hr displayer if the story has comments or story_reads_array
if ($site_uses_new_comment_and_read_displayer == True) {
	if (isset($array1[$number_variable]) or isset($array2[$number_variable])) {
		echo '<hr class="'.$third_full_border.'" />'."\n";
	}
}

else if ($story_has_chapter_comments == True and $story_website_contains_comments == True or $story_has_reads == True and $story_website_contains_reads == True) {
	echo '<hr class="'.$third_full_border.'" />'."\n";
}

echo '</h5>'."\n";

if ($site_uses_new_comment_and_read_displayer == True) {
	if ($story_has_chapter_comments == True and $story_website_contains_comments == True) {
		require $new_chapter_comment_and_read_displayer_php_variable;
	}
}

else if ($story_has_chapter_comments == True and $story_website_contains_comments == True) {
	require $chapter_comment_and_read_displayer_php_variable;
}

echo $div_close."\n";

#New design elements
if ($website_new_design_setting == True) {
	echo '</div>
	</div>
	</div>
	</section>';
}

#Adds to the variables
$i++;
$i2++;
$a++;
$a2++;

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