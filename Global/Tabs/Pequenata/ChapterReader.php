<?php 

$capnum1 = 1;
$capnum2 = 2;
$capnum3 = 0;
$capnum4 = 0;
$capnum4a = 0;
$capnum7 = 0;
$textstylecap = $textstyle2;
$captxtname = str_replace("s", "", $captxt);

#Defines the folder for the chapter text files that are going to be read
if ($lang == $langs[0]) {
	$lang = $langs[1];
	$rootstoryfolder2 = $rootstoryfolder.$storyfolder."/".strtoupper($lang).'/';
	$lang = $langs[0];
}

else {
	$rootstoryfolder2 = $rootstoryfolder.$storyfolder."/".strtoupper($lang).'/';
}

$capdatanumb = 1;
$a = 1;
$z = 1;

#Chapter file text link array generator
while ($a <= $chapters) {
	$a2 = $a - 1;
	$caps[$a] = $rootstoryfolder2.$z.' - '.$titles[$a2].'.txt';
	$caps[$a] = str_replace(array("\r\n", "\r", "\n"), "<br />", $caps[$a]);

	$z++;
	$a++;
}

#Chapter date file reader
$a = 0;
$z = 0;

while ($a <= $chapters) {
	$a2 = $a - 1;
	$capdatesfile = $rootstoryfolder.$storyfolder."/".'Datas.txt';
	$fp = fopen($capdatesfile, 'r', 'UTF-8'); 
	if ($fp) {
		$capdates = explode("\n", fread($fp, filesize($capdatesfile)));
		$capdates = str_replace("^", "", $capdates);
	}
	$capdates[$a] = str_replace(array("\r\n", "\r", "\n"), "<br />", $capdates[$a]);

	$z++;
	$a++;
}

$i = 0;
$z = 1;
$a = 1;
$a2 = 1;
$b1 = 0;
$b2 = 0;
$b4 = 0;

echo "\n";

#Comment and read modal style css
echo '<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>';
echo "\n";

$v1 = 0;
$v2 = 0;

#Read date converter
while ($v2 <= $readsfilenumb) {
	$v3 = $v2 + 2;
	$readstxt[$v3] = substr($readstxt[$v3], 0, -1);
	$readstxt[$v3] = date("H:i d/m/Y", strtotime($readstxt[$v3]));

	$v2++;
	$v2++;
	$v2++;
}

$v1 = 0;

#"Reads" array generator
while ($b1 <= $readsfilenumb) {
	$b22 = $b1 + 1;
	$b3 = $b1 + 2;

	$reads[$v1] = $margin.'<'.$m.' class="'.$textstyle2.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.
	#Reader text and name
	$readerstxt2.': </b>'.$readstxt[$b1].'<br /><b>'.
	
	#Chapter text and title
	substr($captxt, 0, -1).':</b> '.$readstxt[$b22].'<br />'.'<b>'.
	
	#Read time text and time
	$timetxt.':</b> '.$readstxt[$b3].' <br /><br />'.$divc.'</'.$m.'>'.$divc."\n";
	
	$b1++;
	$b1++;
	$b1++;
	$v1++;
	$b4++;
}


$b1 = 0;
$b2 = 1;
$h = $readednumb;
$zw = 0;
$zq = 1;
$za = 2;
$m = 10;

#Chapter reader/writer
while ($capnum1 <= $chapters) {
	$i2 = $i + 1;
	$i3 = $i + 2;
	$reading2 = $reading.'<b>'.$captxtname.' '.$capnum1.' - '.$titles[$capnum4];
	echo "\n";
	
	#Tab div id
    echo '<a name="'.$capdiv.$capnum1.'"></a>';
	echo "\n";
	echo '<div id="'.$capdiv.$capnum1.'" class="city '.$textstylecap.'" style="display:none;'.$hstyle2.'">';
	echo "\n";
	echo '<br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" />';
	echo "\n";
	echo '<br />';
	echo "\n";

	#'You're Reading $story' Text
	if ($capnum1 == $chapters) {
		echo '<h2 class="'.$textstyle2.'">'."\n";
		echo $divzoomanim.'<br />'.$reading2.'</b>'.' <span class="w3-text-yellow"><b>['.$newtxt.'!]</b></span><br />'.$divc.'</'.$n.'>';
		$capnum4++;
	} 

	else {
		echo '<h2 class="'.$textstylecap.'">'."\n";
		echo $divzoomanim.'<br />'.$reading2.'</b>'.$divc.'</'.$n.'><br />';
		$capnum4++;
	}

	echo "\n";
	echo '<h5 class="'.$textstylecap.'" style="'.$hstyle.'text-align:left;"><hr class="'.$sitehr3.'" />';
	echo "\n";
	
	#Top Next/Previous chapter button
	echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$capdiv.$capnum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
	echo "\n";
	echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;" onclick="openCity('."'".$capdiv.$capnum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
	echo "\n";
	echo '<a href="#'.$citycodes[0].'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-right:15px;" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>';
	echo '<br /><br /><br /><br />';
	echo "\n";
	echo $divzoomanim;
	echo "\n";

	#Replaces the "?"s in the chapter 26 file name with nothing
	if ($capnum1 == 26) {
		$caps[$capnum1] = str_replace(array("?"), "", $caps[$capnum1]);
	}

	if ($file = fopen($caps[$capnum1], "r")) {
    while(!feof($file)) {
        $line = fgets($file);
		$line = str_replace(array("\r\n", "\r", "\n"), "", $line);
		echo $line."\n"."<br />";
    }
		fclose($file);
	}

	$fp = fopen($capdatesfile, 'r', 'UTF-8'); 
	if ($fp) {
		$capdatas = explode("\n", fread($fp, filesize($capdatesfile)));
		$datas = str_replace("^", "", $capdatas);
		$datas = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $datas);
	}
	echo '<br />';
	echo $datatxt2.': '.$datas[$capdatanumb].'.';

	echo "\n";
	echo $divc;
	echo "\n";
	echo '<br /><br />';
	echo "\n";

	#Bottom Next/Previous chapter button
	echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;" onclick="openCity('."'".$capdiv.$capnum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
	echo "\n";
	echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-left:15px;" onclick="openCity('."'".$capdiv.$capnum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a> ';
	echo "\n";

	#Computer Comment and Read buttons
	echo '<div class="'.$computervar.'">'."\n";
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.'" id="commentbtn'.$a.'" style="margin-left:15px;float:right;"><h3><b>'.$commenttxt2.' '.$icons[12].' ('.$commentschapternumb.')</b></h3></button>'."\n";
	echo $divc;
	echo '<div class="'.$computervar.'">';
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.'" id="readbtn'.$a.'" style="margin-left:15px;float:right;"><h3><b>'.$readedtxt.' ('.$readednumb.')</b></h3></button>'."\n";
	echo $divc."\n";
	echo '<div class="'.$mobilevar.'"><br /><br /><br />'.$divc.'<div class="'.$computervar.'"><br /><br /><br /><br /><br />'.$divc."\n";

	#"You're Reading $story" Text
	if ($capnum1 == $chapters) {
		echo '<div style="text-align:center;">'.$divzoomanim.'<span class="'.$textstylecap.'"><br />'.$reading2.' <span class="w3-text-yellow">['.$newtxt.'!]</span>'.'</b><br /></span>'.$divc.$divc;
		$capnum7++;
	} 

	else {
		echo '<div style="text-align:center;">'.$divzoomanim.'<span class="'.$textstylecap.'"><br />'.$reading2.'</b><br /></span>'.$divc.$divc;
		$capnum7++;
	}

	#Mobile Comment and Read buttons
	echo "\n";
	echo '<div class="'.$mobilevar.'"><br /><br />'.$divc;
	echo '<div class="'.$mobilevar.'">'."\n";
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" id="commentbtn'.$a.'m" style="margin-left:15px;float:right;"><'.$m.'><b>'.$commenttxt2.' '.$icons[12].' ('.$commentschapternumb.')</b></'.$m.'></button>'."\n";
	echo '<br /><br />';
	echo $divc;
	echo '<div class="'.$mobilevar.'">';
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" id="readbtn'.$a2.'m" style="margin-left:15px;float:right;" onclick="openCity('."'".'modal-read-'.$a2."m')".'"><'.$m.'><b>'.$readedtxt.' ('.$readednumb.')</b></'.$m.'></button>'."\n";
	echo $divc."\n";
	echo "\n";
	echo '<br /><div class="'.$mobilevar.'"><br /><br /></div>';
	echo "\n";
	echo '<hr class="'.$sitehr3.'" />';
	echo "\n";
	echo '</h5>';
	echo "\n";

	#Readings and Comments displayer on chapters
	if ($sitename == $sitepqnt) {
		if ($capnum1 == 1) {
			echo '<div class="'.$computervar.'">'.'<br />'.$divc;
			echo '<div class="'.$mobilevar.'">'.'<br /><br />'.$divc;
			echo '<div class="'.$computervar.'">'.'<'.$n.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$n.'>'.$divc;
			echo '<div class="'.$mobilevar.'">'.'<'.$m.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$m.'>'.$divc;
	
			echo '<div class="'.$mobilevar.'">'.'<br /><br />'.$divc;
			echo '<div class="'.$computervar.'">'.'<br /><br />'.$divc;
			echo $margin;
			echo $cmntschapter[0];
			echo $divc;
		}

		if ($capnum1 == 2) {
			echo '<div class="'.$computervar.'">'.'<br />'.$divc;
			echo '<div class="'.$mobilevar.'">'.'<br /><br />'.$divc;
			echo '<div class="'.$computervar.'">'.'<'.$n.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$n.'>'.$divc;
			echo '<div class="'.$mobilevar.'">'.'<'.$m.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$m.'>'.$divc;
	
			echo '<div class="'.$mobilevar.'">'.'<br /><br />'.$divc;
			echo '<div class="'.$computervar.'">'.'<br /><br />'.$divc;
			echo $margin;
			echo $cmntschapter[(4 + $zw)];
			echo $cmntschapter[(1 + $zw)];
			echo $divc;
		}

		if ($capnum1 == 3) {
			echo '<div class="'.$computervar.'">'.'<br />'.$divc;
			echo '<div class="'.$mobilevar.'">'.'<br /><br />'.$divc;
			echo '<div class="'.$computervar.'">'.'<'.$n.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$n.'>'.$divc;
			echo '<div class="'.$mobilevar.'">'.'<'.$m.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$m.'>'.$divc;
	
			echo '<div class="'.$mobilevar.'">'.'<br /><br />'.$divc;
			echo '<div class="'.$computervar.'">'.'<br /><br />'.$divc;
			echo $margin;
			echo $cmntschapter[(2 + $zw)];
			echo $cmntschapter[(5 + $zw)];
			echo $divc;
		}

		if ($capnum1 == 8) {
			echo '<div class="'.$computervar.'">'.'<br />'.$divc;
			echo '<div class="'.$mobilevar.'">'.'<br /><br />'.$divc;
			echo '<div class="'.$computervar.'">'.'<'.$n.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$n.'>'.$divc;
			echo '<div class="'.$mobilevar.'">'.'<'.$m.'><b>'.$commenttxt.'s:</b> '.$icons[12].'</'.$m.'>'.$divc;
	
			echo '<div class="'.$mobilevar.'">'.'<br /><br />'.$divc;
			echo '<div class="'.$computervar.'">'.'<br /><br />'.$divc;
			echo $margin;
			echo $cmntschapter[(3 + $zw)];
			echo $divc;
		}

		if ($capnum1 > 1 and $capnum1 < 11) {
			echo '<div class="'.$computervar.'">'.'<br />'.$divc;
			echo '<div class="'.$mobilevar.'">'.'<br />'.$divc;
			echo '<div class="'.$computervar.'">'.'<'.$n.'><b>'.$readedtxt4.': ✓</b></'.$n.'>'.$divc;
			echo '<div class="'.$mobilevar.'">'.'<'.$m.'><b>'.$readedtxt4.': ✓</b></'.$m.'>'.$divc;

			echo '<div class="'.$computervar.'">'.'<br /><br />'.$divc;
			echo '<div class="'.$mobilevar.'">'.'<br /><br />'.$divc;

			echo $reads[$h];
		}

		if ($capnum1 == 1) {
			echo $reads[($h - ($m + $za))];
			echo $reads[($h - ($m + $zq))];
		}
	}

	echo $divc;
	echo "\n";
	$i++;
	$i2++;
	$a++;
	$a2++;
	
	if ($h != 0) {
		$h--;
	}

    $capnum1++;
    $capnum2++;
    $capnum3++;
	$capdatanumb++;
	$capdatanumb++;
	$capdatanumb++;
}

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
	echo '<div id="modal-read-'.$a.'" class="modal" style="display:none;">'."\n";
	echo $divzoomanim;
	echo '<div class="modal-content w3-black">'."\n";
	echo '<div class="'.$computervar.'">';
	
	#Close read-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.' close" id="closereadmodal'.$a.'">&times;</button>'."\n";
	
	#Computer Read-modal form
	echo '<form name="'.$formcode.'-read-'.$a.'" method="POST" data-netlify="true">'."\n";
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$readedtxt2.': '.$capnum1.' - '.$titles[$capnum4].'</b></'.$n.'>'.$divc."\n";
	echo $margin2;
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$n.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input">'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.'" style="margin-top:1px;margin-left:15px;float:right;"><'.$m.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";
	echo $divc;
	echo '<input type="text" name="'.$formcode.'-read" value="'.$readedtxt2.': '.$i.' - '.$titles[$c].'" class="'.$formcolor.' w3-input" style="display:none;">'."\n";
	echo '<br /><br /><br /><br />';
	echo '</form>'."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";

	echo "\n";

	#Mobile Read-modal Tab div id
	echo '<a name="modal-read-'.$a2.'m"></a>'."\n";
	echo '<div id="modal-read-'.$a2.'m" class="modal" style="display:none;">'."\n";
	echo $divzoomanim;
	echo '<div class="modal-content w3-black">'."\n";
	echo '<div class="'.$mobilevar.'">';

	#Close read-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.' close" id="closereadmodal'.$a2.'m">&times;</button><br /><br /><br />'."\n";

	#Mobile Read-modal form
	echo '<form name="'.$formcode.'-read-'.$a2.'" method="POST" data-netlify="true">'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$readedtxt2.': '.$capnum12.' - '.$titles[$capnum42].'</b></'.$m.'>'.$divc."\n";
	echo $margin2;
	echo '<br />';
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$m.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input">'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" style="margin-top:1px;margin-left:15px;float:right;"><'.$m.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";
	echo $divc;
	echo '<input type="text" name="'.$formcode.'-read" value="'.$readedtxt2.': '.$i22.' - '.$titles[$c22].'" class="'.$formcolor.' w3-input" style="display:none;">'."\n";
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
	echo '<div id="modal-comment-'.$a.'" class="modal" style="display:none;">'."\n";
	echo $divzoomanim."\n";
	echo '<div class="modal-content w3-black">'."\n";
	echo '<div class="'.$computervar.'">'."\n";

    #Close comment-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.' close" id="closecommentmodal'.$a.'">&times;</button>'."\n";

    #Computer Comment-modal form
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($captxt, 0, -1).' '.$capnum1.' - '.$titles[$capnum4].' '.$icons[12].'</b></'.$n.'>'.$divc.'<hr class="'.$sitehr2.'" />'."\n";
	echo '<form name="'.$formcode.'-comment-'.$a.'" method="POST" data-netlify="true">'."\n";
	echo $margin2."\n";
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$n.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input">'."\n";
	echo '<br />'."\n";
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$commentdesc2.':</b></'.$n.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input">'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.'" style="margin-top:1px;margin-left:15px;float:right;"><'.$m.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";
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
	echo '<div id="modal-comment-'.$a2.'m" class="modal" style="display:none;">'."\n";
	echo $divzoomanim."\n";
	echo '<div class="modal-content w3-black">'."\n";
	echo '<div class="'.$mobilevar.'">'."\n";

    #Close comment-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.' close" id="closecommentmodal'.$a2.'m">&times;</button><br /><br /><br />'."\n";

    #Mobile Comment-modal form
	echo '<form name="'.$formcode.'-comment-'.$a2.'" method="POST" data-netlify="true">'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($captxt, 0, -1).' '.$capnum12.' - '.$titles[$capnum4].' '.$icons[12].'</b></'.$m.'>'.$divc.'<hr class="'.$sitehr2.'" />'."\n";
	echo $margin2."\n";
	echo '<br />'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$m.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input">'."\n";
	echo '<br />'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$commentdesc2.':</b></'.$m.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input">'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" style="margin-top:1px;margin-left:15px;float:right;"><'.$m.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";
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

/*
Deactivated Form Comment Tab generator

$i = 0;
$capnum4 = 0;
$chapters2 = $chapters - 1;

while ($i <= $chapters2) {
	$i2 = $i + 1;
	echo '<a name="'.$formcode.'-comment-'.$i2.'"></a>'."\n";
	echo '<div id="'.$formcode.'-comment-'.$i2.'" class="'.$citystyle.'" style="display:none;">'."\n";
	echo $bigspace."\n";
	echo '<'.$m.' class="'.$computervar.' '.$textstyle.'" '.$marginstyle1.'>'."\n";
	echo $margin."\n";
	echo $divzoomanim.'<'.$n.'><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($captxt, 0, -1).'<br /> "'.$i2.' - '.$titles[$capnum4].'": '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$divc.'<hr class="'.$sitehr2.'" />'."\n";
	echo $divzoomanim."\n";
	echo '<div class="'.$computervar.'">'."\n";
	echo '<form name="'.$formcode.'-comment-'.$i2.'" method="POST" data-netlify="true">'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$formname.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '</span><br />'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$commentdesc.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;"><i class="fas fa-paper-plane"></i></button>';
	echo '</'.$n.'>'."\n";
	echo '</span>'."\n";
	echo '</form>'."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo '</'.$m.'>'."\n";
	echo $divc."\n";
	echo "\n";
	echo '<a name="'.$formcode.'-comment-'.$i2.'m"></a>'."\n";
	echo '<div id="'.$formcode.'-comment-'.$i2.'m" class="'.$citystylem.'" style="display:none;">'."\n";
	echo $bigspace."\n";
	echo '<'.$m.' class="'.$mobilevar.' '.$textstyle.'" '.$marginstyle1.'>'."\n";
	echo $margin."\n";
	echo $divzoomanim.'<'.$n.'><p></p><br /><b>'.$tabnames[2].' '.$commenttxt4.' '.substr($captxt, 0, -1).'<br /> "'.$i2.' - '.$titles[$capnum4].'": '.$icons[12].'</b><br /><br /><p></p></'.$n.'>'.$divc.'<hr class="'.$sitehr2.'" />'."\n";
	echo $divzoomanim."\n";
	echo '<div class="'.$mobilevar.'">'."\n";
	echo '<form name="'.$formcode.'-comment-'.$i2.'" method="POST" data-netlify="true">'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$formname.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input"></textarea>'."\n";
	echo '</span><br />'."\n";
	echo '<span class="w3-btn '.$spanstyle.'"><b>'.$commentdesc.':</b><br />'."\n";
	echo '<textarea type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input"></textarea> '."\n";
	echo '<h2><button type="submit" class="w3-btn '.$formbtnstyle.'" style="float:right;margin-top:-10px;"><i class="fas fa-paper-plane"></i></button>';
	echo '</'.$n.'>'."\n";
	echo '</span>'."\n";
	echo '</form>'."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";
	echo '</'.$m.'>'."\n";
	echo $divc."\n";
	echo "\n";

	$i++;
	$capnum4++;
}
*/

?>