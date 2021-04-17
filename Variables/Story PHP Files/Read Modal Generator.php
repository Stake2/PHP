<?php 

$i = 1;
$i22 = 1;
$a = 1;
$a2 = 1;
$z = 1;
$z2 = 1;
$c = 0;
$c22 = 0;
$chapter_number_1 = 1;
$capnum12 = 1;
$chapter_number_4 = 0;
$capnum42 = 0;

# Read-modal Tab generation
while ($chapter_number_1 <= $chapters) {
	$i2 = $i + 1;
	$i3 = $i + 2;
	$c2 = $c + 1;

	echo "\n";
	
	# Computer Read-modal Tab div id
	echo '<a name="modal-read-'.$a.'"></a>'."\n";
	echo '<div id="modal-read-'.$a.'" class="modal" style="display:none;'.$rounded_border_style_2.'">'."\n";
	echo $div_zoom_animation;
	echo '<div class="modal-content '.$tab_background_color.' '.$border_3px_solid_brown_css_class.'" '.$roundedborderstyle.'>'."\n";
	echo '<div class="'.$computer_variable.'" '.$roundedborderstyle.'>';
	
	# Close read-modal button
	echo '<button class="w3-btn '.$first_button_style.' '.$computer_variable.' modal_close_button" '.$roundedborderstyle.' id="closereadmodal'.$a.'">&times;</button><br /><br /><br />'."\n";
	
	# Computer Read-modal form
	echo $div_zoom_animation.'<'.$n.' class="'.$first_text_color.'"><b>'.$read_texts_array[3].':<br />'.$chapter_number_1.' - '.$chapter_titles[$chapter_number_4].' '.$iconbookreader.'</b></'.$n.'>'.$div_close.'<hr class="'.$alternative_tab_full_border.'" />'."\n";
	echo '<form name="'.$formcode.'-read-'.$a.'" method="POST" data-netlify="True" '.$roundedborderstyle.'>'."\n";
	echo $margin2;

	# Name input text
	echo $div_zoom_animation.'<'.$n.' class="'.$first_text_color.'"><b>'.$person_name_text_two.' '.strtolower($person_name_text).':</b></'.$n.'>'.$div_close."\n";

	# Name input
	echo '<input type="text" name="name" class="'.$full_form_style.' w3-input" '.$roundedborderstyle.'>'."\n";

	# Form submit button
	echo '<button type="submit" class="w3-btn '.$full_form_send_button_style.' '.$computer_variable.'" style="margin-top:1px;margin-left:15px;float:right;'.$rounded_border_style_2.'"><'.$n.'><b>'.$send_form_text.': <i class="fas fa-paper-plane"></i></b></'.$n.'></button>'."\n";

	# Hidden chapter title input

	echo '<input type="text" name="read" value="'.$i.' - '.$chapter_titles[$c].'" class="'.$full_form_style.' w3-input" style="display:none;'.$rounded_border_style_2.'">'."\n";
	echo $div_close;
	echo '<br /><br /><br /><br />';
	echo '</form>'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";

	echo "\n";

	# Mobile Read-modal Tab div id
	echo '<a name="modal-read-'.$a2.'m"></a>'."\n";
	echo '<div id="modal-read-'.$a2.'m" class="modal" style="display:none;'.$rounded_border_style_2.'">'."\n";
	echo $div_zoom_animation;
	echo '<div class="modal-content '.$tab_background_color.' '.$border_3px_solid_brown_css_class.'" '.$roundedborderstyle.'>'."\n";
	echo '<div class="'.$mobile_variable.'" '.$roundedborderstyle.'>';

	# Close read-modal button
	echo '<button class="w3-btn '.$first_button_style.' '.$mobile_variable.' modal_close_button" '.$roundedborderstyle.' id="closereadmodal'.$a2.'m">&times;</button><br /><br /><br />'."\n";

	# Mobile Read-modal form
	echo '<form name="'.$formcode.'-read-'.$a2.'" method="POST" data-netlify="True" '.$roundedborderstyle.'>'."\n";
	echo $div_zoom_animation.'<'.$m.' class="'.$first_text_color.'"><b>'.$read_texts_array[3].':<br />'.$capnum12.' - '.$chapter_titles[$capnum42].' '.$iconbookreader.'</b></'.$m.'>'.$div_close.'<hr class="'.$alternative_tab_full_border.'" />'."\n";
	echo $margin2;
	echo '<br />';

	# Name input text
	echo $div_zoom_animation.'<'.$m.' class="'.$first_text_color.'"><b>'.$person_name_text_two.' '.strtolower($person_name_text).':</b></'.$m.'>'.$div_close."\n";

	# Name input
	echo '<input type="text" name="name" class="'.$full_form_style.' w3-input" '.$roundedborderstyle.'>'."\n";

	# Form submit button
	echo '<button type="submit" class="w3-btn '.$full_form_send_button_style.' '.$mobile_variable.'" style="margin-top:1px;margin-left:15px;float:right;'.$rounded_border_style_2.'"><'.$m.'><b>'.$send_form_text.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";

	# Hidden chapter title input
	echo '<input type="text" name="read" value="'.$i22.' - '.$chapter_titles[$c22].'" class="'.$full_form_style.' w3-input" style="display:none;'.$rounded_border_style_2.'">'."\n";
	echo $div_close;
	echo '<br /><br /><br /><br />';
	echo '</form>'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";

	echo "\n";

	# Computer Read-modal open and close script
	echo '<script>
var readmodal'.$a.' = document.getElementById("modal-read-'.$a.'");

var readbtn'.$a.' = document.getElementById("readbtn'.$a.'");

var readclosebtn'.$a.' = document.getElementById("closereadmodal'.$a.'");

readbtn'.$a.'.onclick = function() {
	readmodal'.$a.'.style.display = "block";
}

readclosebtn'.$a.'.onclick = function() {
	readmodal'.$a.'.style.display = "none";
}

readmodal'.$a.'.onclick = function(event) {
	if (event.target == readmodal'.$a.') {
		readmodal'.$a.'.style.display = "none";
	}
}
</script>';

	echo "\n";

	#Mobile Read-modal open and close script
	echo '<script>
var readmodal'.$a2.'m = document.getElementById("modal-read-'.$a2.'m");

var readbtn'.$a2.'m = document.getElementById("readbtn'.$a2.'m");

var readclosebtn'.$a2.'m = document.getElementById("closereadmodal'.$a2.'m");

readbtn'.$a2.'m.onclick = function() {
	readmodal'.$a2.'m.style.display = "block";
}

readclosebtn'.$a2.'m.onclick = function() {
	readmodal'.$a2.'m.style.display = "none";
}

readmodal'.$a2.'m.onclick = function(event) {
	if (event.target == readmodal'.$a2.'m) {
		readmodal'.$a2.'m.style.display = "none";
	}
}
</script>';
	echo "\n";
	$c++;
	$c22++;
	$chapter_number_1++;
	$chapter_number_4++;
	$i++;
	$z++;
	$a++;
	$capnum12++;
	$capnum42++;
	$i22++;
	$z2++;
	$a2++;
}

?>