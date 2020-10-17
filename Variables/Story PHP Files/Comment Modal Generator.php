<?php 

$i = 1;
$i22 = 1;
$a = 1;
$a2 = 1;
$z = 1;
$z2 = 1;
$c = 0;
$c22 = 0;
$capnum1 = 1;
$capnum12 = 1;
$capnum4 = 0;
$capnum42 = 0;
#Comment-modal Tab generation
while ($capnum1 <= $chapters) {
	$i2 = $i + 1;
	$i3 = $i + 2;
	$c2 = $c + 1;

	echo "\n";

	#Computer comment-modal Tab div id
	echo '<a name="modal-comment-'.$a.'"></a>'."\n";
	echo '<div id="modal-comment-'.$a.'" class="modal" style="display:none;'.$roundedborderstyle2.'">'."\n";
	echo $divzoomanim."\n";
	echo '<div class="modal-content w3-black" '.$roundedborderstyle.'>'."\n";
	echo '<div class="'.$computervar.'">'."\n";

    #Close comment-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.' modal_close_button" id="closecommentmodal'.$a.'" '.$roundedborderstyle.'>&times;</button>'."\n";

    #Computer Comment-modal form
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><p></p><br /><b>'.$tabnames[2].' '.$cmntstxts[3].' '.substr($captxt, 0, -1).' '.$capnum1.' - '.$titles[$capnum4].' '.$icons[12].'</b></'.$n.'>'.$divc.'<hr class="'.$sitehr2.'" />'."\n";
	echo '<form name="'.$formcode.'-comment-'.$a.'" method="POST" data-netlify="true" '.$roundedborderstyle.'>'."\n";
	echo $margin2."\n";
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$n.'>'.$divc."\n";
	echo '<input type="text" name="name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
	echo '<br />'."\n";
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$cmntstxts[5].':</b></'.$n.'>'.$divc."\n";
	echo '<input type="text" name="comment" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.'" style="margin-top:1px;margin-left:15px;float:right;'.$roundedborderstyle2.'"><'.$n.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$n.'></button>'."\n";
	echo $divc."\n";
	echo '</form>'."\n";
	echo $divc."\n";
	echo '<br /><br /><br /><br />'."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";

	echo "\n";

	#Mobile Comment-modal Tab div id
	echo '<a name="modal-comment-'.$a2.'m"></a>'."\n";
	echo '<div id="modal-comment-'.$a2.'m" class="modal" style="display:none;'.$roundedborderstyle2.'">'."\n";
	echo $divzoomanim."\n";
	echo '<div class="modal-content w3-black" '.$roundedborderstyle.'>'."\n";
	echo '<div class="'.$mobilevar.'">'."\n";

    #Close comment-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.' modal_close_button" id="closecommentmodal'.$a2.'m" '.$roundedborderstyle.'>&times;</button><br /><br /><br />'."\n";

    #Mobile Comment-modal form
	echo '<form name="'.$formcode.'-comment-'.$a2.'" method="POST" data-netlify="true" '.$roundedborderstyle.'>'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><p></p><br /><b>'.$tabnames[2].' '.$cmntstxts[3].' '.substr($captxt, 0, -1).' '.$capnum12.' - '.$titles[$capnum4].' '.$icons[12].'</b></'.$m.'>'.$divc.'<hr class="'.$sitehr2.'" />'."\n";
	echo $margin2."\n";
	echo '<br />'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$m.'>'.$divc."\n";
	echo '<input type="text" name="name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
	echo '<br />'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$cmntstxts[5].':</b></'.$m.'>'.$divc."\n";
	echo '<input type="text" name="comment" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" style="margin-top:1px;margin-left:15px;float:right;'.$roundedborderstyle2.'"><'.$m.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";
	echo $divc."\n";
	echo '</form>'."\n";
	echo $divc."\n";
	echo '<br /><br /><br /><br />'."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";

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
	$capnum1++;
	$capnum4++;
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