<?php 

#Defines some number variables
$capnum1 = 1;
$capnum2 = 2;
$capnum3 = 0;
$capnum4 = 0;
$capnum4a = 0;
$capnum7 = 0;
$textstylecap = $textstyle2;
$captxtname = str_replace("s", "", $captxt);

$writefolder = $rootstoryfolder2.'Test/';

#Chapter file text link array generator, it generates the array to access the text files of the chapters
$capdatanumb = 1;
$a = 1;
$z = 1;
while ($a <= $chapters) {
	$a2 = $a - 1;
	$caps[$a] = $rootstoryfolder2.$z.' - '.$titles[$a2].'.txt';
	$caps[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^", "?"), "", $caps[$a]);

	$z++;
	$a++;
}

#Chapter file text link array generator for the English language, it generates the array to access the English text files of the chapters
$a = 1;
$z = 1;
$rootstoryfolder3 = $rootstoryfolder.$storyfolder.'/'.strtoupper($langs[1]).'/';
while ($a <= $chapters) {
	$a2 = $a - 1;
	$capsenus[$a] = $rootstoryfolder3.$z.' - '.$titles[$a2].'.txt';
	$capsenus[$a] = str_replace(array("\r\n", "\r", "\n"), "<br />", $capsenus[$a]);

	$z++;
	$a++;
}

#Chapter date file reader, it generates the capdate array which contains the date that the chapter was written
$a = 0;
$z = 0;
if ($sitename != $sitenazzevo) {
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
}

echo "\n";

#Comment and read modal style CSS definer
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

if ($storyhasreads == true) {
	$i = 0;
	$z = 1;
	$a = 1;
	$a2 = 1;
	$b1 = 0;
	$b2 = 0;
	$b4 = 0;
	$v1 = 0;
	$v2 = 0;
	#Read date converter, that converts the date of the readings into a date format
	while ($v2 <= $readsfilenumb) {
		$v3 = $v2 + 2;
		$readstxt[$v3] = substr($readstxt[$v3], 0, -1);
		$readstxt[$v3] = date("H:i d/m/Y", strtotime($readstxt[$v3]));

		$v2++;
		$v2++;
		$v2++;
	}

	#echo $chaptertowrite;
	$v1 = 0;
	$readednumb = 0;
	#"Reads" array generator, it generates the array of the readings
	while ($b1 <= $readsfilenumb) {
		$b22 = $b1 + 1;
		$b3 = $b1 + 2;

		$reads[$v1] = $margin.'<'.$m.' class="'.$textstyle2.'" style="text-align:left;border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'"><div style="margin-left:5%;margin-right:5%;">'.'<br /><b>'.
		#Reader text and name
		$readtxts[7].': </b>'.$readstxt[$b1].'<br /><b>'.

		#Chapter text and title
		#substr($captxt, 0, -1).':</b> '.$readstxt[$b22].'<br />'.'<b>'.

		#Read time text and time
		$timetxt.':</b> '.$readstxt[$b3].' <br /><br />'.$divc.'</'.$m.'>'.$divc."\n";

		$readednumb++;
		$b1++;
		$b1++;
		$b1++;
		$v1++;
		$b4++;
	}
}

$z123 = 0;
$chapter_line_number = 0;
$b1 = 0;
$b2 = 1;

if ($storyhasreads == true) {
	$h = $readednumb;
}

$zw = 1;
$zq = 1;
$za = 2;
$mzz = 10;
$zzcxx = 3;
$covernumb = 1;
#Chapter reader/writer, it makes the tabs for the chapters to be read
while ($capnum1 <= $chapters) {
	$i2 = $i + 1;
	$i3 = $i + 2;

	#Defines the top and bottom texts
	if ($sitestorywrite == true and $sitestorywritechapter == $capnum1) {
		$topandbottomtxt = '<b>'.$writetxts[2].'</b>'.
		'<br />'.
		'<b>'.$captxtname.': '.$capnum1.' - '.$titles[$capnum4];
	}

	else {
		$topandbottomtxt = '<b>'.$readtxts[1].'</b>'.
		'<br />'.
		'<b>'.$captxtname.': '.$capnum1.' - '.$titles[$capnum4];
	}

	#New design div
	if ($newdesign == true) {
		echo '
	<section>
	<div class="box-line">
	<div class="box-bar">
	<div class="boxConteudo">';
	}

	#Tab div id, a name and big space generator
	echo "\n";
    echo '<a name="'.$capdiv.$capnum1.'"></a>'."\n";
	echo '<div id="'.$capdiv.$capnum1.'" class="city '.$textstylecap.'" style="display:none;'.$hstyle2.''.$roundedborderstyle2.'">'."\n";
	echo '<br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" />'."\n";
	echo '<br />'."\n";

	#"You're Reading [Story]" top text shower
	if ($capnum1 == $chapters and $storystatus != $storystatuses[0] and $storystatus != $storystatuses[3]) {
		echo '<div class="'.$computervar.'">'.'<'.$n.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.'</b>'.' <span class="w3-text-yellow"><b>['.$newtxt.'!]</b></span><br />'.$divc.'</'.$n.'>'.$divc."\n";

		echo '<div class="'.$mobilevar.'">'.'<'.$m.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.'</b>'.' <span class="w3-text-yellow"><b>['.$newtxt.'!]</b></span>'.$divc.'</'.$m.'>'.$divc."\n";

		$capnum4++;
	}

	else {
		echo '<div class="'.$computervar.'">'.'<'.$n.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.'</b>'.$divc.'</'.$n.'>'.$divc."\n";

		echo $margin.'<div class="'.$mobilevar.'">'.'<'.$m.' class="'.$textstyle2.'" style="'.$roundedborderstyle5.'">'.$divzoomanim.'<br />'.$topandbottomtxt.'</b>'.$divc.'</'.$m.'>'.$divc."\n".$divc."\n";
	
		$capnum4++;
	}

	#H5 header and hr creator
	echo "\n";
	echo '<h5 class="'.$textstylecap.'" style="'.$hstyle.'text-align:left;"><hr class="'.$sitehr3.'" />'."\n";

	if ($capnum1 != 1) {
		#Top Previous chapter button
		echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;'.$roundedborderstyle2.'" onclick="openCity('."'".$capdiv.$capnum3."');".'DefineChapter('.$capnum3.');OpenChapter2(ReadContent'.$capnum3.');"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>'."\n";
	}

	if ($capnum1 != $chapters) {
		#Top Next chapter button
		echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;'.$roundedborderstyle2.'" onclick="openCity('."'".$capdiv.$capnum2."');".'DefineChapter('.$capnum2.');OpenChapter2(ReadContent'.$capnum2.');"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>'."\n";
	}

	#"Go back to the chapter buttons tab" button
	echo '<a href="#'.$citycodes[0].'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-right:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
	echo '<br /><br /><br /><br />'."\n";
	echo $divzoomanim."\n";

	#Replaces the "?"s in the chapter 26 file name with nothing
	if ($capnum1 == 26) {
		$caps[$capnum1] = str_replace(array("?"), "", $caps[$capnum1]);
	}

	if ($capnum1 == 26) {
		$capsenus[$capnum1] = str_replace(array("?"), "", $capsenus[$capnum1]);
	}

	#Story cover shower if story has the storyhascovers setting as true
	if ($storyhascovers == true and $capnum1 <= 10) {
		echo '<center>'."\n";

		if (isset($files[$capnum1]) == true) {

			if ($capnum1 == 2 and $sitename != $sitenazzevo) {
				#echo $coverimages[3];
				#echo $coverimagesm[3];

				$covernumb++;
			}

			if ($capnum1 == 10) {
				echo $coverimages[2];
				echo $coverimagesm[2];

				$covernumb++;
			}

			else {
				echo $coverimages[$covernumb];
				echo $coverimagesm[$covernumb];
			}
		}

		echo '</center>'."\n";
		echo "<br />"."\n";
	}

	echo '<div id="'.$captextdiv.$capnum1.'">'."\n";

	if ($newwritestyle == true) {
		$writestorybtn = '<span id="writebtnattribute'.$capnum1.'" style="display:none;">WriteContent'.$capnum1.'</span><button id="write-button-'.$capnum1.'" title="" class="w3-btn '.$btnstyle.'" style="border-radius: 50px;" onclick="WriteChapter(WriteContent'.$capnum1.');"><'.$n.'><i class="fas fa-pen"></i></'.$n.'></button><br /><br />'."\n";

		$readstorybtn = '<span id="readbtnattribute'.$capnum1.'" style="display:none;">ReadContent'.$capnum1.'</span><button id="write-button-'.$capnum1.'" class="w3-btn '.$btnstyle.'" style="border-radius: 50px;" onclick="OpenChapter2(ReadContent'.$capnum1.');"><'.$n.'><i class="fas fa-book"></i></'.$n.'></button><br /><br />'."\n";
	}

	#Chapter writer tab displayer
	if ($sitestorywrite == true and $sitestorywritechapter == $capnum1 or $sitestorywrite == true and $sitestorywritechapter.(int)'0' == $capnum1 and $capnum1 != 0) {
		require($chapterwriterdisplayer);
		echo "$chapterwriterdisplayer was loaded.";
		echo $newwritestylescript."\n";
		echo $divc."\n";
		echo $divc."\n";
		echo '<br /><br />'."\n";
	}

	#Chapter text tab displayer
	else {
		require($chaptertextdisplayer);
	}

	if ($capnum1 != 1) {
		#Bottom Previous chapter button
		echo '<a href="#'.$capdiv.$capnum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;'.$roundedborderstyle2.'" onclick="openCity('."'".$capdiv.$capnum3."');".'DefineChapter('.$capnum3.');OpenChapter2(ReadContent'.$capnum3.');"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>'."\n";
	}

	if ($capnum1 != $chapters) {
		#Bottom Next chapter button
		echo '<a href="#'.$capdiv.$capnum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-left:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$capdiv.$capnum2."');".'DefineChapter('.$capnum2.');OpenChapter2(ReadContent'.$capnum2.');"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>'."\n";
	}

	#Computer Comment button
	if ($sitehascommentstab == true) {
		echo '<div class="'.$computervar.'">'."\n";
		echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.'" id="commentbtn'.$a.'" style="margin-left:15px;float:right;'.$roundedborderstyle2.'"><h3><b>'.$cmntstxts[1].' '.$icons[12].' ('.$commentschapternumb.')</b></h3></button>'."\n";
		echo $divc."\n";
	}

	#Computer "I Read it" button
	if ($storyhasreads == true) {
		echo '<div class="'.$computervar.'">'."\n";
		echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.'" id="readbtn'.$a.'" style="margin-left:15px;float:right;'.$roundedborderstyle2.'"><h3><b>'.$readtxts[2].' ('.$readednumb.' '.$icons[20].')</b></h3></button>'."\n";
		echo $divc."\n";
		echo '<div class="'.$mobilevar.'"><br /><br /><br />'.$divc.'<div class="'.$computervar.'"><br /><br /><br /><br /><br />'.$divc."\n";
	}

	#"You're Reading [Story]" bottom text
	if ($capnum1 == $chapters and $storystatus != $storystatuses[0] and $storystatus != $storystatuses[3]) {
		echo '<div style="text-align:center;">'.$divzoomanim.'<span class="'.$textstylecap.'"><br />'.$topandbottomtxt.' <span class="w3-text-yellow">['.$newtxt.'!]</span>'.'</b><br /></span>'.$divc."\n".$divc."\n";

		$capnum7++;
	} 

	else {
		echo '<div style="text-align:center;">'.$divzoomanim.'<span class="'.$textstylecap.'"><br />'.$topandbottomtxt.'</b><br /></span>'.$divc."\n".$divc."\n";

		$capnum7++;
	}

	#Mobile Comment button
	if ($sitehascommentstab == true) {
		echo "\n";
		echo '<div class="'.$mobilevar.'"><br /><br />'."\n".$divc."\n";
		echo '<div class="'.$mobilevar.'">'."\n";
		echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" id="commentbtn'.$a.'m" style="margin-left:15px;float:right;'.$roundedborderstyle2.'"><'.$m.'><b>'.$cmntstxts[1].' '.$icons[12].' ('.$commentschapternumb.')</b></'.$m.'></button>'."\n";
		echo '<br /><br />'."\n";
		echo $divc."\n";
	}

	#Mobile "I Read it" button
	if ($storyhasreads == true) {
		echo '<div class="'.$mobilevar.'">'."\n";
		echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" id="readbtn'.$a2.'m" style="margin-left:15px;float:right;'.$roundedborderstyle2.'" onclick="openCity('."'".'modal-read-'.$a2."m')".'"><'.$m.'><b>'.$readtxts[2].' ('.$readednumb.' '.$icons[20].')</b></'.$m.'></button>'."\n";
		echo $divc."\n";
		echo '<br /><div class="'.$mobilevar.'"><br /><br />'."\n".'</div>'."\n";
		echo '<hr class="'.$sitehr3.'" />'."\n";
	}

	echo '</h5>'."\n";

	#Readings and Comments displayer on chapters
	if ($sitename == $sitenazzevo) {
		if ($capnum1 == 1) {
			echo $commentheader."\n";

			echo $cmntschapter[0]."\n";
			echo $cmntschapter[1]."\n";

			echo $divc."\n";
		}
	}

	if ($sitename == $sitepequenata) {
		if ($capnum1 == 1) {
			echo $commentheader."\n";

			echo $cmntschapter[1]."\n";

			echo $divc."\n";
		}

		if ($capnum1 == 2) {
			echo $commentheader."\n";

			echo $cmntschapter[(4 + $zw)]."\n";
			echo $cmntschapter[(1 + $zw)]."\n";

			echo $divc."\n";
		}

		if ($capnum1 == 3) {
			echo $commentheader."\n";

			echo $cmntschapter[(2 + $zw)]."\n";
			echo $cmntschapter[(5 + $zw)]."\n";

			echo $divc."\n";
		}


		if ($capnum1 == 7) {
			echo $commentheader."\n";

			echo $cmntschapter[0]."\n";

			echo $divc."\n";
		}

		if ($capnum1 == 8) {
			echo $commentheader."\n";

			echo $cmntschapter[(3 + $zw)]."\n";

			echo $divc."\n";
		}

		if ($capnum1 == 1) {
			echo $readingsheader."\n";
		}

		if ($capnum1 > 1 and $capnum1 < 11) {
			echo $readingsheader."\n";

			echo $reads[$h]."\n";
		}

		if ($capnum1 == 2) {
			echo $reads[2]."\n";
		}

		if ($capnum1 == 1) {
			echo $reads[($h - ($mzz + $za))]."\n";
			echo $reads[($h - ($mzz + $zw))]."\n";
		}
	}

	if ($sitename == $sitenazzevo) {
		if ($capnum1 == 1) {
			echo $readingsheader."\n";

			echo $reads[0]."\n";
			echo $reads[1]."\n";
		}
	}

	echo $divc."\n";

	#New design elements
	if ($newdesign == true) {
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

	if (isset($h) == true) {
		if ($h != 0) {
			$h--;
		}
	}

    $capnum1++;
    $capnum2++;
    $capnum3++;
	$capdatanumb++;
	$capdatanumb++;
	$capdatanumb++;
	$covernumb++;
}

while ($capnum1 <= $chapters) {
	$testscript = '';
	echo $testscript;
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
	echo '<div id="modal-read-'.$a.'" class="modal" style="display:none;'.$roundedborderstyle2.'">'."\n";
	echo $divzoomanim;
	echo '<div class="modal-content w3-black" '.$roundedborderstyle.'>'."\n";
	echo '<div class="'.$computervar.'" '.$roundedborderstyle.'>';
	
	#Close read-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.' close" '.$roundedborderstyle.' id="closereadmodal'.$a.'">&times;</button>'."\n";
	
	#Computer Read-modal form
	echo '<form name="'.$formcode.'-read-'.$a.'" method="POST" data-netlify="true" '.$roundedborderstyle.'>'."\n";
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$readtxts[3].': '.$capnum1.' - '.$titles[$capnum4].'</b></'.$n.'>'.$divc."\n";
	echo $margin2;
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$n.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.'" style="margin-top:1px;margin-left:15px;float:right;'.$roundedborderstyle2.'"><'.$n.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$n.'></button>'."\n";
	echo $divc;
	echo '<input type="text" name="'.$formcode.'-read" value="'.$readtxts[3].': '.$i.' - '.$titles[$c].'" class="'.$formcolor.' w3-input" style="display:none;'.$roundedborderstyle2.'">'."\n";
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
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.' close" '.$roundedborderstyle.' id="closereadmodal'.$a2.'m">&times;</button><br /><br /><br />'."\n";

	#Mobile Read-modal form
	echo '<form name="'.$formcode.'-read-'.$a2.'" method="POST" data-netlify="true" '.$roundedborderstyle.'>'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$readtxts[3].': '.$capnum12.' - '.$titles[$capnum42].'</b></'.$m.'>'.$divc."\n";
	echo $margin2;
	echo '<br />';
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$m.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
	echo '<button type="submit" class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" style="margin-top:1px;margin-left:15px;float:right;'.$roundedborderstyle2.'"><'.$m.'><b>'.$sendtxt.': <i class="fas fa-paper-plane"></i></b></'.$m.'></button>'."\n";
	echo $divc;
	echo '<input type="text" name="'.$formcode.'-read" value="'.$readtxts[3].': '.$i22.' - '.$titles[$c22].'" class="'.$formcolor.' w3-input" style="display:none;'.$roundedborderstyle2.'">'."\n";
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
	echo '<div id="modal-comment-'.$a.'" class="modal" style="display:none;'.$roundedborderstyle2.'">'."\n";
	echo $divzoomanim."\n";
	echo '<div class="modal-content w3-black" '.$roundedborderstyle.'>'."\n";
	echo '<div class="'.$computervar.'">'."\n";

    #Close comment-modal button
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$computervar.' close" id="closecommentmodal'.$a.'" '.$roundedborderstyle.'>&times;</button>'."\n";

    #Computer Comment-modal form
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><p></p><br /><b>'.$tabnames[2].' '.$cmntstxts[3].' '.substr($captxt, 0, -1).' '.$capnum1.' - '.$titles[$capnum4].' '.$icons[12].'</b></'.$n.'>'.$divc.'<hr class="'.$sitehr2.'" />'."\n";
	echo '<form name="'.$formcode.'-comment-'.$a.'" method="POST" data-netlify="true" '.$roundedborderstyle.'>'."\n";
	echo $margin2."\n";
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$n.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
	echo '<br />'."\n";
	echo $divzoomanim.'<'.$n.' class="'.$colortext.'"><b>'.$cmntstxts[5].':</b></'.$n.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
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
	echo '<button class="w3-btn '.$color.' w3-text-black '.$cssbtn1.' '.$mobilevar.' close" id="closecommentmodal'.$a2.'m" '.$roundedborderstyle.'>&times;</button><br /><br /><br />'."\n";

    #Mobile Comment-modal form
	echo '<form name="'.$formcode.'-comment-'.$a2.'" method="POST" data-netlify="true" '.$roundedborderstyle.'>'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><p></p><br /><b>'.$tabnames[2].' '.$cmntstxts[3].' '.substr($captxt, 0, -1).' '.$capnum12.' - '.$titles[$capnum4].' '.$icons[12].'</b></'.$m.'>'.$divc.'<hr class="'.$sitehr2.'" />'."\n";
	echo $margin2."\n";
	echo '<br />'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$nametxt2.' '.strtolower($nametxt1).':</b></'.$m.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-name" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
	echo '<br />'."\n";
	echo $divzoomanim.'<'.$m.' class="'.$colortext.'"><b>'.$cmntstxts[5].':</b></'.$m.'>'.$divc."\n";
	echo '<input type="text" name="'.$formcode.'-comment" class="'.$formcolor.' w3-input" '.$roundedborderstyle.'>'."\n";
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