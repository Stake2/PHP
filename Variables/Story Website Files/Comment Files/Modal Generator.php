<?php 

$current_form_name = $website_info["english_title"]."_Read";

# Computer comment-modal Tab div id
echo "\n".
'<a name="comment-modal-'.$modal_number.'"></a>'."\n".
'<div id="comment-modal-'.$modal_number.'" class="modal '.$computer_variable.'" style="display:none;'.$rounded_border_style_2.'">'."\n".
$div_zoom_animation."\n".
'<div class="modal-content '.$tab_background_color." ".$first_full_border.'" '.$roundedborderstyle.'>'."\n";

# Close comment-modal button computer
echo '<button class="w3-btn '.$first_button_style.' modal_close_button" id="close_comment_modal_button_'.$modal_number.'" '.$roundedborderstyle.'>&times;</button>'."\n";

# Computer Comment-modal form
echo $div_zoom_animation."\n".
"<".$h2_element.' class="'.$first_text_color.'">'."\n".
"<b>".$comment_on_chapter_text.": <br />".$chapter_title." ".$icons_array["comment"]."</b>"."\n".
"</".$h2_element.">"."\n".
$div_close."\n".
'<hr class="'.$alternative_tab_full_border.'" />'."\n";

echo '<form name="'.$website_info["english_title"].'-comment" method="POST" data-netlify="True" '.$roundedborderstyle.'>'."\n".
$margin2."\n";

# Name input text
echo $div_zoom_animation."\n".
"<".$h2_element.' class="'.$first_text_color.'">'."\n".
"<b>".$your_name_text.":</b>"."\n".
"</".$h2_element.">"."\n".
$div_close."\n";

# Name input
echo '<input type="text" name="name" class="'.$first_button_style.' w3-input" '.$roundedborderstyle.'>'."\n";

# Comment input text
echo $div_zoom_animation."\n".
"<".$h2_element.' class="'.$first_text_color.'">'."\n".
"<b>".$comment_what_you_think_on_chapter_text.":</b>"."\n".
"</".$h2_element.">"."\n".
$div_close."\n";

# Comment input
echo '<input type="text" name="comment" class="'.$first_button_style.' w3-input" '.$roundedborderstyle.'>'."\n";

# Form submit button
echo '<button type="submit" class="w3-btn '.$full_form_send_button_style.'" style="margin-top:1px;margin-left:15px;float:right;'.$rounded_border_style_2.'">'."\n".
"<".$h2_element.">"."\n".
"<b>".$send_form_text.': <i class="fas fa-paper-plane"></i></b>'."\n".
"</".$h2_element.">"."\n".
"</button>"."\n";

echo $div_close."\n".
"<br /><br /><br />"."\n".
"</form>"."\n".
$div_close."\n".
$div_close."\n".
$div_close."\n"."\n";

# Mobile Comment-modal Tab div id
echo "\n".
'<a name="comment-modal-'.$modal_number.'_mobile"></a>'."\n".
'<div id="comment-modal-'.$modal_number.'_mobile" class="modal '.$mobile_variable.'" style="display:none;'.$rounded_border_style_2.'">'."\n".
$div_zoom_animation."\n".
'<div class="modal-content '.$tab_background_color." ".$first_full_border.'" '.$roundedborderstyle.'>'."\n";

# Close comment-modal button mobile
echo '<button class="w3-btn '.$first_button_style.' modal_close_button" id="close_comment_modal_button_'.$modal_number.'_mobile" '.$roundedborderstyle.'>&times;</button>'."\n";

echo $div_zoom_animation."\n".
"<".$h2_element.' class="'.$first_text_color.'">'."\n".
"<b>".$comment_on_chapter_text.": <br />".$chapter_title." ".$icons_array["comment"]."</b>"."\n".
"</".$h2_element.">"."\n".
$div_close."\n".
'<hr class="'.$alternative_tab_full_border.'" />'."\n";

# Mobile Comment-modal form
echo '<form name="'.$website_info["english_title"].'-comment" method="POST" data-netlify="True" '.$roundedborderstyle.'>'."\n".
$margin2."\n";

# Name input text
echo $div_zoom_animation."\n".
"<".$h4_element.' class="'.$first_text_color.'">'."\n".
"<b>".$your_name_text.":</b>"."\n".
"</".$h4_element.">"."\n".
$div_close."\n";

# Name input
echo '<input type="text" name="name" class="'.$first_button_style.' w3-input" '.$roundedborderstyle.'>'."\n".
"<br />"."\n";

# Comment input text
echo $div_zoom_animation."\n".
"<".$h4_element.' class="'.$first_text_color.'">'."\n".
"<b>".$comment_what_you_think_on_chapter_text.":</b>"."\n".
"</".$h4_element.">"."\n".
$div_close."\n";

# Comment input
echo '<input type="text" name="comment" class="'.$first_button_style.' w3-input" '.$roundedborderstyle.'>'."\n";

# Form submit button
echo '<button type="submit" class="w3-btn '.$full_form_send_button_style.'" style="margin-top:1px;margin-left:15px;float:right;'.$rounded_border_style_2.'">'."\n".
"<".$h4_element.">"."\n".
"<b>".$send_form_text.': <i class="fas fa-paper-plane"></i></b>'."\n".
"</".$h4_element.">"."\n".
"</button>"."\n";

echo $div_close."\n".
"<br /><br /><br />"."\n".
"</form>"."\n".
$div_close."\n".
$div_close."\n".
$div_close."\n"."\n";

#Computer Comment-modal open and close script
echo '<script>
var comment_modal_'.$modal_number.' = document.getElementById("comment-modal-'.$modal_number.'");

var comment_button_'.$modal_number.' = document.getElementById("comment_button_'.$modal_number.'");

var close_comment_modal_button_'.$modal_number.' = document.getElementById("close_comment_modal_button_'.$modal_number.'");

comment_button_'.$modal_number.'.onclick = function() {
	comment_modal_'.$modal_number.'.style.display = "block";
	document.activeElement.blur();
	comment_modal_'.$modal_number.'.tabIndex = "-1";
	comment_modal_'.$modal_number.'.focus();
}

close_comment_modal_button_'.$modal_number.'.onclick = function() {
	comment_modal_'.$modal_number.'.style.display = "none";
	document.activeElement.blur();
}

comment_modal_'.$modal_number.'.onclick = function(event) {
	if (event.target == comment_modal_'.$modal_number.') {
		comment_modal_'.$modal_number.'.style.display = "none";
		document.activeElement.blur();
	}
}

comment_modal_'.$modal_number.'.addEventListener("keydown", Check_Modal_Key);
</script>';

	echo "\n";

	#Mobile Comment-modal open and close script
	echo '<script>
var comment_modal_'.$modal_number.'_mobile = document.getElementById("comment-modal-'.$modal_number.'_mobile");

var comment_button_'.$modal_number.'_mobile = document.getElementById("comment_button_'.$modal_number.'_mobile");

var close_comment_modal_button_'.$modal_number.'_mobile = document.getElementById("close_comment_modal_button_'.$modal_number.'_mobile");

comment_button_'.$modal_number.'_mobile.onclick = function() {
	comment_modal_'.$modal_number.'_mobile.style.display = "block";
	document.activeElement.blur();
	comment_modal_'.$modal_number.'_mobile.tabIndex = "-1";
	comment_modal_'.$modal_number.'_mobile.focus();
}

close_comment_modal_button_'.$modal_number.'_mobile.onclick = function() {
	comment_modal_'.$modal_number.'_mobile.style.display = "none";
	document.activeElement.blur();
}

comment_modal_'.$modal_number.'_mobile.onclick = function(event) {
	if (event.target == comment_modal_'.$modal_number.'_mobile) {
		comment_modal_'.$modal_number.'_mobile.style.display = "none";
		document.activeElement.blur();
	}
}
</script>'."\n";

?>