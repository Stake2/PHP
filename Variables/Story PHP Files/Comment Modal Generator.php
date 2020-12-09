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
#Comment-modal Tab generation
while ($chapter_number_1 <= $chapters) {
	$i2 = $i + 1;
	$i3 = $i + 2;
	$c2 = $c + 1;

	echo "\n";

	#Computer comment-modal Tab div id
	echo '<a name="modal-comment-'.$a.'"></a>'."\n";
	echo '<div id="modal-comment-'.$a.'" class="modal" style="display:none;'.$rounded_border_style_2.'">'."\n";
	echo $div_zoom_animation."\n";
	echo '<div class="modal-content w3-black '.$first_full_border.'" '.$roundedborderstyle.'>'."\n";
	echo '<div class="'.$computer_variable.'">'."\n";

    #Close comment-modal button
	echo '<button class="w3-btn '.$first_button_style.' '.$computer_variable.' modal_close_button" id="closecommentmodal'.$a.'" '.$roundedborderstyle.'>&times;</button>'."\n";

    #Computer Comment-modal form
	echo $div_zoom_animation.'<'.$n.' class="'.$first_text_color.'"><p></p><br /><b>'.$tabnames[2].' '.$comments_texts_array[3].' '.substr($captxt, 0, -1).' '.$chapter_number_1.' - '.$chapter_titles[$chapter_number_4].' '.$icons[12].'</b></'.$n.'>'.$div_close.'<hr class="'.$tab_full_border.'" />'."\n";
	echo '<form name="'.$formcode.'-comment-'.$a.'" method="POST" data-netlify="true" '.$roundedborderstyle.'>'."\n";
	echo $margin2."\n";

	# Name input text
	echo $div_zoom_animation.'<'.$n.' class="'.$first_text_color.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$n.'>'.$div_close."\n";

	# Name input
	echo '<input type="text" name="name" class="'.$first_button_style.' w3-input" '.$roundedborderstyle.'>'."\n";

	echo '<br />'."\n";

	# Comment input text
	echo $div_zoom_animation.'<'.$n.' class="'.$first_text_color.'"><b>'.$comments_texts_array[5].':</b></'.$n.'>'.$div_close."\n";

	# Comment input
	echo '<input type="text" name="comment" class="'.$first_button_style.' w3-input" '.$roundedborderstyle.'>'."\n";

	# Form submit button
	echo '<button type="submit" class="w3-btn '.$full_form_send_button_style.' '.$computer_variable.'" style="margin-top:1px;margin-left:15px;float:right;'.$rounded_border_style_2.'"><'.$n.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$n.'></button>'."\n";

	echo $div_close."\n";
	echo '</form>'."\n";
	echo $div_close."\n";
	echo '<br /><br /><br /><br />'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";

	echo "\n";

	#Mobile Comment-modal Tab div id
	echo '<a name="modal-comment-'.$a2.'m"></a>'."\n";
	echo '<div id="modal-comment-'.$a2.'m" class="modal" style="display:none;'.$rounded_border_style_2.'">'."\n";
	echo $div_zoom_animation."\n";
	echo '<div class="modal-content w3-black" '.$roundedborderstyle.'>'."\n";
	echo '<div class="'.$mobile_variable.'">'."\n";

    #Close comment-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobile_variable.' modal_close_button" id="closecommentmodal'.$a2.'m" '.$roundedborderstyle.'>&times;</button><br /><br /><br />'."\n";

    #Mobile Comment-modal form
	echo '<form name="'.$formcode.'-comment-'.$a2.'" method="POST" data-netlify="true" '.$roundedborderstyle.'>'."\n";
	echo $div_zoom_animation.'<'.$m.' class="'.$first_text_color.'"><p></p><br /><b>'.$tabnames[2].' '.$comments_texts_array[3].' '.substr($captxt, 0, -1).' '.$capnum12.' - '.$chapter_titles[$chapter_number_4].' '.$icons[12].'</b></'.$m.'>'.$div_close.'<hr class="'.$tab_full_border.'" />'."\n";
	echo $margin2."\n";
	echo '<br />'."\n";

	# Name input text
	echo $div_zoom_animation.'<'.$m.' class="'.$first_text_color.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$m.'>'.$div_close."\n";

	# Name input
	echo '<input type="text" name="name" class="'.$first_button_style.' w3-input" '.$roundedborderstyle.'>'."\n";

	echo '<br />'."\n";

	# Comment input text
	echo $div_zoom_animation.'<'.$m.' class="'.$first_text_color.'"><b>'.$comments_texts_array[5].':</b></'.$m.'>'.$div_close."\n";

	# Comment input
	echo '<input type="text" name="comment" class="'.$first_button_style.' w3-input" '.$roundedborderstyle.'>'."\n";

	# Form submit button
	echo '<button type="submit" class="w3-btn '.$full_form_send_button_style.' '.$mobile_variable.'" style="margin-top:1px;margin-left:15px;float:right;'.$rounded_border_style_2.'"><'.$m.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";

	echo $div_close."\n";
	echo '</form>'."\n";
	echo $div_close."\n";
	echo '<br /><br /><br /><br />'."\n";
	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";

	echo "\n";

	#Computer Comment-modal open and close script
	echo '<script>
var commentmodal'.$a.' = document.getElementById("modal-comment-'.$a.'");

var commentbtn'.$a.' = document.getElementById("commentbtn'.$a.'");

var commentclosebtn'.$a.' = document.getElementById("closecommentmodal'.$a.'");

commentbtn'.$a.'.onclick = function() {
	commentmodal'.$a.'.style.display = "block";
}

commentclosebtn'.$a.'.onclick = function() {
	commentmodal'.$a.'.style.display = "none";
}

commentmodal'.$a.'.onclick = function(event) {
	if (event.target == commentmodal'.$a.') {
		commentmodal'.$a.'.style.display = "none";
	}
}
</script>';

	echo "\n";

	#Mobile Comment-modal open and close script
	echo '<script>
var commentmodal'.$a2.'m = document.getElementById("modal-comment-'.$a2.'m");

var commentbtn'.$a2.'m = document.getElementById("commentbtn'.$a2.'m");

var commentclosebtn'.$a2.'m = document.getElementById("closecommentmodal'.$a2.'m");

commentbtn'.$a2.'m.onclick = function() {
	commentmodal'.$a2.'m.style.display = "block";
}

commentclosebtn'.$a2.'m.onclick = function() {
	commentmodal'.$a2.'m.style.display = "none";
}

commentmodal'.$a2.'m.onclick = function(event) {
	if (event.target == commentmodal'.$a2.'m) {
		commentmodal'.$a2.'m.style.display = "none";
	}
}
</script>';
	echo "\n";
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