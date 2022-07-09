<?php 

$current_form_name = $website_info["english_title"]."_Read";

# Computer Read-modal Tab div id
echo "\n".
'<a name="read-modal-'.$modal_number.'"></a>'."\n".
'<div id="read-modal-'.$modal_number.'" class="modal '.$computer_variable.'" style="display:none;'.$rounded_border_style_2.'">'."\n".
$div_zoom_animation."\n".
'<div class="modal-content '.$tab_background_color.' '.$first_full_border.'" '.$roundedborderstyle.'>'."\n";

# Close read-modal button
echo '<button class="w3-btn '.$first_button_style.' modal_close_button" id="close_read_modal_button_'.$modal_number.'" '.$roundedborderstyle.'>&times;</button>'."\n";

echo $div_zoom_animation."\n".
"<".$h2_element.' class="'.$first_text_color.'">'."\n".
"<b>".$i_read_the_chapter_text.": <br />".$chapter_title." ".$icons_array["reader"]."</b>"."\n".
"</".$h2_element.">"."\n".
$div_close."\n".
'<hr class="'.$alternative_tab_full_border.'" />'."\n";

# Computer Read-modal form
echo '<form name="'.$current_form_name.'" method="POST" data-netlify="True" '.$roundedborderstyle.'>'."\n".
$margin2."\n";

# Name input text
echo $div_zoom_animation."\n".
"<".$h2_element.' class="'.$first_text_color.'">'."\n".
"<b>".$your_name_text.":</b>"."\n".
"</".$h2_element.">"."\n".
$div_close."\n";

# Name input
echo '<input type="text" name="name" class="'.$first_button_style.' w3-input" '.$roundedborderstyle.'>'."\n";

# Form submit button
echo '<button type="submit" class="w3-btn '.$full_form_send_button_style.'" style="margin-top:1px;margin-left:15px;float:right;'.$rounded_border_style_2.'">'."\n".
"<".$h2_element.">"."\n".
"<b>".$send_form_text.': <i class="fas fa-paper-plane"></i></b>'."\n".
"</".$h2_element.">"."\n".
"</button>"."\n";

# Hidden chapter title input
echo '<input type="text" name="read" value="'.$chapter_title.'" class="'.$first_button_style.' w3-input" style="display: none;'.$rounded_border_style_2.'">'."\n".
$div_close."\n".
"<br /><br /><br />"."\n".
"</form>"."\n".
$div_close."\n".
$div_close."\n".
$div_close."\n"."\n";

# Mobile Read-modal Tab div id
echo '<a name="read-modal-'.$modal_number.'_mobile"></a>'."\n".
'<div id="read-modal-'.$modal_number.'_mobile" class="modal '.$mobile_variable.'" style="display:none;'.$rounded_border_style_2.'">'."\n".
$div_zoom_animation."\n".
'<div class="modal-content '.$tab_background_color." ".$first_full_border.'" '.$roundedborderstyle.'>'."\n";

# Close read-modal button
echo '<button class="w3-btn '.$first_button_style.' modal_close_button" '.$roundedborderstyle.' id="close_read_modal_button_'.$modal_number.'_mobile">&times;</button>'."\n";

echo $div_zoom_animation."\n".
"<".$h4_element.' class="'.$first_text_color.'">'."\n".
"<b>".$i_read_the_chapter_text.": <br />".$chapter_title." ".$icons_array["reader"]."</b>"."\n".
"</".$h4_element.">"."\n".
$div_close."\n".
'<hr class="'.$alternative_tab_full_border.'" />'."\n";

# Mobile Read-modal form
echo '<form name="'.$current_form_name.'" method="POST" data-netlify="True" '.$roundedborderstyle.'>'."\n";

# Name input text
echo $div_zoom_animation."\n".
"<".$h4_element.' class="'.$first_text_color.'">'."\n".
"<b>".$your_name_text.":</b>"."\n".
"</".$h4_element.">"."\n".
$div_close."\n";

# Name input
echo '<input type="text" name="name" class="'.$first_button_style.' w3-input" '.$roundedborderstyle.'>'."\n";

# Form submit button
echo '<button type="submit" class="w3-btn '.$full_form_send_button_style.'" style="margin-top:1px;margin-left:15px;float:right;'.$rounded_border_style_2.'">'."\n".
"<".$h4_element.">"."\n".
"<b>".$send_form_text.': <i class="fas fa-paper-plane"></i></b>'."\n".
"</".$h4_element.">"."\n".
"</button>"."\n";

# Hidden chapter title input
echo '<input type="text" name="read" value="'.$chapter_title.'" class="'.$first_button_style.' w3-input" style="display: none;'.$rounded_border_style_2.'">'."\n".
"</form>"."\n".
"<br /><br /><br />"."\n".
$div_close."\n".
$div_close."\n".
$div_close."\n".
$div_close."\n"."\n";

# Computer Read-modal open and close script
echo '<script>
var read_modal_'.$modal_number.' = document.getElementById("read-modal-'.$modal_number.'");

var read_button_'.$modal_number.' = document.getElementById("read_button_'.$modal_number.'");

var close_read_modal_button_'.$modal_number.' = document.getElementById("close_read_modal_button_'.$modal_number.'");

read_button_'.$modal_number.'.onclick = function() {
	read_modal_'.$modal_number.'.style.display = "block";
	document.activeElement.blur();
	read_modal_'.$modal_number.'.tabIndex = "-1";
	read_modal_'.$modal_number.'.focus();
}

close_read_modal_button_'.$modal_number.'.onclick = function() {
	read_modal_'.$modal_number.'.style.display = "none";
	document.activeElement.blur();
}

read_modal_'.$modal_number.'.onclick = function(event) {
	if (event.target == read_modal_'.$modal_number.') {
		read_modal_'.$modal_number.'.style.display = "none";
		document.activeElement.blur();
	}
}

read_modal_'.$modal_number.'.addEventListener("keydown", Check_Modal_Key);
</script>'."\n";

#Mobile Read-modal open and close script
echo '<script>
var read_modal_'.$modal_number.'_mobile = document.getElementById("read-modal-'.$modal_number.'_mobile");

var read_button_'.$modal_number.'_mobile = document.getElementById("read_button_'.$modal_number.'_mobile");

var close_read_modal_button_'.$modal_number.'_mobile = document.getElementById("close_read_modal_button_'.$modal_number.'_mobile");

read_button_'.$modal_number.'_mobile.onclick = function() {
	read_modal_'.$modal_number.'_mobile.style.display = "block";
	document.activeElement.blur();
	read_modal_'.$modal_number.'.tabIndex = "-1";
	read_modal_'.$modal_number.'.focus();
}

close_read_modal_button_'.$modal_number.'_mobile.onclick = function() {
	read_modal_'.$modal_number.'_mobile.style.display = "none";
	document.activeElement.blur();
}

read_modal_'.$modal_number.'_mobile.onclick = function(event) {
	if (event.target == read_modal_'.$modal_number.'_mobile) {
		read_modal_'.$modal_number.'_mobile.style.display = "none";
		document.activeElement.blur();
	}
}
</script>'."\n";

?>