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
#Read-modal Tab generation
while ($capnum1 <= $chapters) {
	$i2 = $i + 1;
	$i3 = $i + 2;
	$c2 = $c + 1;

	echo "\n";
	
	#Computer Read-modal Tab div id
	echo '<a name="modal-read-'.$a.'"></a>'."\n";
	echo '<div id="modal-read-'.$a.'" class="modal" style="display:none;'.$roundedborderstyle2.'">'."\n";
	echo $divzoomanim;
	echo '<div class="modal-content w3-black" '.$roundedborderstyle.'>'."\n";
	echo '<div class="'.$computervar.'" '.$roundedborderstyle.'>';
	
	#Close read-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.' modal_close_button" '.$roundedborderstyle.' id="closereadmodal'.$a.'">&times;</button>'."\n";
	
	#Computer Read-modal form
	echo '<form name="'.$formcode.'-read-'.$a.'" method="POST" data-netlify="true" '.$roundedborderstyle.'>'."\n";
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$readtxts[3].': '.$capnum1.' - '.$titles[$capnum4].'</b></'.$n.'>'.$divc."\n";
	echo $margin2;
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$n.'>'.$divc."\n";
	echo '<input type="text" name="name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.'" style="margin-top:1px;margin-left:15px;float:right;'.$roundedborderstyle2.'"><'.$n.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$n.'></button>'."\n";
	echo $divc;
	echo '<input type="text" name="read" value="'.$readtxts[3].': '.$i.' - '.$titles[$c].'" class="'.$formcolor.' w3-input" style="display:none;'.$roundedborderstyle2.'">'."\n";
	echo '<br /><br /><br /><br />';
	echo '</form>'."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";

	echo "\n";

	#Mobile Read-modal Tab div id
	echo '<a name="modal-read-'.$a2.'m"></a>'."\n";
	echo '<div id="modal-read-'.$a2.'m" class="modal" style="display:none;'.$roundedborderstyle2.'">'."\n";
	echo $divzoomanim;
	echo '<div class="modal-content w3-black" '.$roundedborderstyle.'>'."\n";
	echo '<div class="'.$mobilevar.'" '.$roundedborderstyle.'>';

	#Close read-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.' modal_close_button" '.$roundedborderstyle.' id="closereadmodal'.$a2.'m">&times;</button><br /><br /><br />'."\n";

	#Mobile Read-modal form
	echo '<form name="'.$formcode.'-read-'.$a2.'" method="POST" data-netlify="true" '.$roundedborderstyle.'>'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$readtxts[3].': '.$capnum12.' - '.$titles[$capnum42].'</b></'.$m.'>'.$divc."\n";
	echo $margin2;
	echo '<br />';
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$m.'>'.$divc."\n";
	echo '<input type="text" name="name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" style="margin-top:1px;margin-left:15px;float:right;'.$roundedborderstyle2.'"><'.$m.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";
	echo $divc;
	echo '<input type="text" name="read" value="'.$readtxts[3].': '.$i22.' - '.$titles[$c22].'" class="'.$formcolor.' w3-input" style="display:none;'.$roundedborderstyle2.'">'."\n";
	echo '<br /><br /><br /><br />';
	echo '</form>'."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";

	echo "\n";

	#Computer Read-modal open and close script
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