<?php

#Defines the folder for the chapter text files that are going to be read
$rootstoryfolder2 = $diariofolder;

$a = 1;
$z = 1;
#Chapter file text link array generator
while ($a <= $publishedblocks) {
	$a2 = $a - 1;
	$blockfiles[$a] = $rootstoryfolder2.$z.'.txt';
	$blockfiles[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $blockfiles[$a]);

	$z++;
	$a++;
}

$blocknum1 = 1;
$blocknum2 = 2;
$blocknum3 = 0;
$c = 0;
$textstylecap = $textstyle2;
#Chapter reader/writer
while ($c <= $publishedblocks) {
	if (isset($blockfiles[$blocknum1]) and file_exists($blockfiles[$blocknum1])) {
	$i2 = $i + 1;
	$i3 = $i + 2;
	$reading2 = $reading.' '.ucwords($chaptertxt).' '.$numbertxt.': '.$blocknum1;
	echo "\n";

	#Tab div id
    echo '<a name="'.$blockdiv.$blocknum1.'"></a>'."\n";
	echo '<div id="'.$blockdiv.$blocknum1.'" class="city '.$textstylecap.'" style="display:none;'.$hstyle2.''.$roundedborderstyle2.'">'."\n";
	echo '<br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" /><br class="'.$mobilevar.'" />'."\n";
	echo '<br />'."\n";

	#'You're Reading $story' Text
	if ($blocknum1 == $publishedblocks) {
		echo '<h2 class="'.$textstyle2.'">'."\n";
		echo $divzoomanim.'<br />'.'<b>'.$reading2.' '.$bluespan.' ['.$newtxt.'!]'.$spanc.'</b>'.$divc.'</'.$n.'>'."\n";
	}

	else {
		echo '<h2 class="'.$textstylecap.'">'."\n";
		echo $divzoomanim.'<br />'.'<b>'.$reading2.'</b>'.$divc.'</'.$n.'>'."\n";
	}

	echo '<h5 class="'.$textstylecap.'" style="'.$hstyle.'text-align:left;"><hr class="'.$sitehr3.'" />'."\n";

	#Top Next/Previous chapter button
	echo '<a href="#'.$blockdiv.$blocknum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;'.$roundedborderstyle2.'" onclick="openCity('."'".$blockdiv.$blocknum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>'."\n";

	echo '<a href="#'.$blockdiv.$blocknum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;'.$roundedborderstyle2.'" onclick="openCity('."'".$blockdiv.$blocknum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>'."\n";

	echo '<a href="#'.$citycodes[0].'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-right:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
	echo '<br /><br /><br /><br />'."\n";
	echo $divzoomanim."\n";

	#Block text displayer
	if (file_exists($blockfiles[$blocknum1])) {
		if ($file = fopen($blockfiles[$blocknum1], "r")) {
		while (!feof($file)) {
			$line = fgets($file);
			$line = str_replace(array("\r\n", "\r", "\n"), "", $line);
			echo $line."<br />"."\n";
		}
			fclose($file);
		}
	}

	echo $divc."\n";
	echo '<br /><br />'."\n";

	#Bottom Next/Previous chapter button
	echo '<a href="#'.$blockdiv.$blocknum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;'.$roundedborderstyle2.'" onclick="openCity('."'".$blockdiv.$blocknum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>'."\n";

	echo '<a href="#'.$blockdiv.$blocknum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-left:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$blockdiv.$blocknum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a> '."\n";;

	echo '</h5>'."\n";

	#"You're Reading $story" Text
	if ($blocknum1 == $publishedblocks) {
		echo '<div style="text-align:center;">'."\n".$divzoomanim."\n".'<span class="'.$textstylecap.'">'."\n".'<br />'.
		"\n".'<b>'.$reading2.' '.$bluespan.' ['.$newtxt.' '.$publishedblocks.'!]'.$spanc."\n".
		'</b><br />'."\n".'</span>'.
		"\n".$divc.
		"\n".$divc."\n";
	} 

	else {
		echo '<div style="text-align:center;">'."\n".$divzoomanim."\n".'<span class="'.$textstylecap.'">'."\n".'<br />'."\n".'<b>'.$reading2.'</b>'.'<br /></span>'."\n".$divc."\n".$divc."\n";
	}

	echo $divc."\n";

	}

    $blocknum1++;
    $blocknum2++;
    $blocknum3++;
	$c++;
}

#while ($blocknum1 <= $blocks) {
#	echo "\n";
#    echo '<a name="block'.$blocknum1.'"></a>';
#	echo "\n";
#	echo '<div id="block'.$blocknum1.'" class="city '.$textstyle.'" style="display:none;">';
#	echo "\n";
#	echo '<br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" /><br class="mobileShow" />';
#	echo "\n";
#	echo '<hr class="'.$sitehr.'" /><h2 class="'.$textstyle.'">'.$readingpt.' <b>Block '.$blocknum1.'</b></h2><hr class="'.$sitehr.'" />';
#	echo "\n";
#	echo '<h5 class="'.$textstyle.'">'.'<b>Block '.$blocknum1.':</b><br /><br />';
#	echo "\n";
#	$blockpt = readfile("C:/Mega/Bloco De Notas/Diario/Blocks/".$blocknum1.'.txt', "r");
#	echo "\n";
#	echo '<br /><br />';
#	echo "\n";
#	echo '<a href="#block'.$blocknum3.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;" onclick="openCity('."'block".$blocknum3."')".'"><h3><i class="fas fa-arrow-circle-left"></i></h3></button></a>';
#	echo "\n";
#	echo '<a href="#block'.$blocknum2.'"><button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;" onclick="openCity('."'block".$blocknum2."')".'"><h3><i class="fas fa-arrow-circle-right"></i></h3></button></a>';
#	echo "\n";
#	echo '<div style="text-align:center;"><b>Diário Block '.$blocknum1.'</b></div>';
#	echo "\n";
#	echo '<br /><br /><br />';
#	echo "\n";
#	echo '<hr class="'.$sitehr.'" />';
#	echo "\n";
#	echo '</h5>';
#	echo "\n";
#	echo '</div>';
#	echo "\n";
#    $blocknum1++;
#    $blocknum2++;
#    $blocknum3++;
#}

?>