<?php

#Defines the folder for the chapter text files that are going to be read

$a = 1;
$z = 1;
#Chapter file text link array generator
while ($a <= $publishedblocks) {
	$a2 = $a - 1;
	$blockfiles[$a] = $storyfolder.$z.'.txt';
	$blockfiles[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $blockfiles[$a]);

	$z++;
	$a++;
}

$c = 0;
$capnum1 = 1;
$capnum2 = 2;
$capnum3 = 0;
$textstylecap = $textstyle2;
#Chapter reader/writer
while ($c <= $publishedblocks - 1) {
	$i2 = $i + 1;
	$i3 = $i + 2;
	$reading2 = $reading.' '.ucwords($chaptertxt).' '.$numbertxt.': '.$capnum1;

	echo "\n";

	#Tab div id, a name and big space generator
	echo '<a name="'.$blockdiv.$capnum1.'"></a>'."\n";
	echo '<div id="'.$blockdiv.$capnum1.'" class="city '.$textstylecap.'" style="display:none;'.$hstyle2.$roundedborderstyle2.'">'."\n";
	echo '<div class="'.$mobilevar.'"><br /><br /><br /><br /><br /><br />'.$divc."\n";

	echo "\n";

	echo $margin."\n";

	#"You're Reading [Story]" Text
	if ($capnum1 == $publishedblocks) {
		echo '<h2 class="'.$textstyle2.'">'."\n";
		echo $divzoomanim.'<br />'."\n".
		'<b>'.$reading2.' '.$bluespan.' ['.$newtxt.']'.$spanc.'</b>'."\n".
		$divc.'</'.$n.'>'."\n";
	}

	else {
		echo '<h2 class="'.$textstylecap.'">'."\n";
		echo $divzoomanim.'<br />'."\n".
		'<b>'.$reading2.'</b>'."\n".
		$divc.'</'.$n.'>'."\n";
	}

	echo "\n";

	#Top Previous chapter button
	if ($capnum1 != 1) {
		echo '<a href="#'.$blockdiv.$capnum3.'">'."\n".
		'<button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;'.$roundedborderstyle2.'" onclick="openCity('."'".$blockdiv.$capnum3."')".'">'."\n".
		'<h3><i class="fas fa-arrow-circle-left"></i></h3>'."\n".
		'</button></a>'."\n";
	}

	#Top Next chapter button
	if ($capnum1 != $publishedblocks) {
		echo '<a href="#'.$blockdiv.$capnum2.'">'."\n".
		'<button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;'.$roundedborderstyle2.'" onclick="openCity('."'".$blockdiv.$capnum2."')".'">'."\n".
		'<h3><i class="fas fa-arrow-circle-right"></i></h3>'."\n".
		'</button></a>'."\n";
	}

	echo "\n";

	echo '<a href="#'.$citycodes[0].'">'."\n".
	'<button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-right:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$citycodes[0]."')".'">'."\n".
	'<h3>'.$icons[16].'</h3>'."\n".
	'</button></a>'."\n"."\n";

	echo '<br /><br /><br /><br />'."\n";
	echo $divzoomanim."\n";

	echo '<h5 class="'.$textstylecap.'" style="'.$hstyle.'text-align:left;"><hr class="'.$sitehr3.'" />'."\n";

	if (file_exists($blockfiles[$capnum1])) {
		#Block text displayer
		if (file_exists($blockfiles[$capnum1])) {
			if ($file = fopen($blockfiles[$capnum1], "r")) {
			while (!feof($file)) {
				$line = fgets($file);
				$line = str_replace(array("\r\n", "\r", "\n"), "", $line);
				echo $line."<br />"."\n";
			}
				fclose($file);
			}
		}
	}

	if (file_exists($blockfiles[$capnum1]) == false) {
		echo $cannotfindfiletxt."\n";
	}

	echo "\n";

	#Bottom Previous chapter button
	if ($capnum1 != 1) {
		echo '<a href="#'.$blockdiv.$capnum3.'">'."\n".
		'<button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;'.$roundedborderstyle2.'" onclick="openCity('."'".$blockdiv.$capnum3."')".'">'."\n".
		'<h3><i class="fas fa-arrow-circle-left"></i></h3>'."\n".
		'</button></a>'."\n";
	}

	#Bottom Next chapter button
	if ($capnum1 != $publishedblocks) {
		echo '<a href="#'.$blockdiv.$capnum2.'">'."\n".
		'<button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-left:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$blockdiv.$capnum2."')".'">'."\n".
		'<h3><i class="fas fa-arrow-circle-right"></i></h3>'."\n".
		'</button></a>'."\n";
	}

	echo "\n";

	echo '</h5>'."\n";

	echo $divc."\n";
	echo '<br /><br />'."\n";
	echo '<br /><br />'."\n";

	echo "\n";

	#"You're Reading [Story]" Text
	if ($capnum1 == $publishedblocks) {
		echo '<div style="text-align:center;">'."\n".
		'<h5>'."\n".
		$divzoomanim."\n".
		'<span class="'.$textstylecap.'">'."\n".
		'<br />'."\n".
		'<b>'.$reading2.' '.$bluespan.' ['.$newtxt.' '.$publishedblocks.']'.'<br />'.$spanc.'</b>'."\n".
		'<br />'.$spanc."\n".
		$divc."\n".
		'</h5>'."\n".
		'<br /><br /><br />'."\n".
		$divc."\n"."\n";
	}

	else {
		echo '<div style="text-align:center;">'."\n".
		'<h5>'."\n".
		$divzoomanim."\n".
		'<span class="'.$textstylecap.'">'."\n".
		'<br />'."\n".
		'<b>'.$reading2.'</b>'.'<br />'."\n".
		'<br />'.$spanc."\n".
		$divc."\n".
		'</h5>'."\n".
		'<br /><br /><br />'."\n".
		$divc."\n"."\n";
	}

	echo $divc."\n";

    $capnum1++;
    $capnum2++;
    $capnum3++;
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