<?php

#Defines the folder for the chapter text files that are going to be read

$a = 1;
$z = 1;
#Chapter file text link array generator
while ($a <= $publishedblocks) {
	$a2 = $a - 1;
	$blockfiles[$a] = $story_name_folder.$z.'.txt';
	$blockfiles[$a] = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF"), "", $blockfiles[$a]);

	$z++;
	$a++;
}

$c = 0;
$chapter_number_1 = 1;
$chapter_number_2 = 2;
$chapter_number_3 = 0;
$chapter_text_style = $textstyle2;
#Chapter reader/writer
while ($c <= $publishedblocks - 1) {
	$i2 = $i + 1;
	$i3 = $i + 2;
	$reading2 = $reading.' '.ucwords($chapter_text).' '.$numbertxt.': '.$chapter_number_1;

	echo "\n";

	#Tab div id, a name and big space generator
	echo '<a name="'.$blockdiv.$chapter_number_1.'"></a>'."\n";
	echo '<div id="'.$blockdiv.$chapter_number_1.'" class="city '.$chapter_text_style.'" style="display:none;'.$hstyle2.$rounded_border_style_2.'">'."\n";
	echo '<div class="'.$mobile_variable.'"><br /><br /><br /><br /><br /><br />'.$div_close."\n";

	echo "\n";

	echo $margin."\n";

	#"You're Reading [Story]" Text
	if ($chapter_number_1 == $publishedblocks) {
		echo '<h2 class="'.$textstyle2.'">'."\n";
		echo $div_zoom_animation.'<br />'."\n".
		'<b>'.$reading2.' '.$bluespan.' ['.$newtxt.']'.$spanc.'</b>'."\n".
		$div_close.'</'.$n.'>'."\n";
	}

	else {
		echo '<h2 class="'.$chapter_text_style.'">'."\n";
		echo $div_zoom_animation.'<br />'."\n".
		'<b>'.$reading2.'</b>'."\n".
		$div_close.'</'.$n.'>'."\n";
	}

	echo "\n";

	#Top Previous chapter button
	if ($chapter_number_1 != 1) {
		echo '<a href="#'.$blockdiv.$chapter_number_3.'">'."\n".
		'<button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;'.$rounded_border_style_2.'" onclick="openCity('."'".$blockdiv.$chapter_number_3."')".'">'."\n".
		'<h3><i class="fas fa-arrow-circle-left"></i></h3>'."\n".
		'</button></a>'."\n";
	}

	#Top Next chapter button
	if ($chapter_number_1 != $publishedblocks) {
		echo '<a href="#'.$blockdiv.$chapter_number_2.'">'."\n".
		'<button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;'.$rounded_border_style_2.'" onclick="openCity('."'".$blockdiv.$chapter_number_2."')".'">'."\n".
		'<h3><i class="fas fa-arrow-circle-right"></i></h3>'."\n".
		'</button></a>'."\n";
	}

	echo "\n";

	echo '<a href="#'.$citycodes[0].'">'."\n".
	'<button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-right:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$citycodes[0]."')".'">'."\n".
	'<h3>'.$icons[16].'</h3>'."\n".
	'</button></a>'."\n"."\n";

	echo '<br /><br /><br /><br />'."\n";
	echo $div_zoom_animation."\n";

	echo '<h5 class="'.$chapter_text_style.'" style="'.$hstyle.'text-align:left;"><hr class="'.$sitehr3.'" />'."\n";

	if (file_exists($blockfiles[$chapter_number_1])) {
		#Block text displayer
		if (file_exists($blockfiles[$chapter_number_1])) {
			if ($file = fopen($blockfiles[$chapter_number_1], "r")) {
			while (!feof($file)) {
				$line = fgets($file);
				$line = str_replace(array("\r\n", "\r", "\n"), "", $line);
				echo $line."<br />"."\n";
			}
				fclose($file);
			}
		}
	}

	if (file_exists($blockfiles[$chapter_number_1]) == false) {
		echo $cannotfindfiletxt."\n";
	}

	echo "\n";

	#Bottom Previous chapter button
	if ($chapter_number_1 != 1) {
		echo '<a href="#'.$blockdiv.$chapter_number_3.'">'."\n".
		'<button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:left;'.$rounded_border_style_2.'" onclick="openCity('."'".$blockdiv.$chapter_number_3."')".'">'."\n".
		'<h3><i class="fas fa-arrow-circle-left"></i></h3>'."\n".
		'</button></a>'."\n";
	}

	#Bottom Next chapter button
	if ($chapter_number_1 != $publishedblocks) {
		echo '<a href="#'.$blockdiv.$chapter_number_2.'">'."\n".
		'<button class="w3-btn '.$color.' '.$cssbtn1.'" style="float:right;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$blockdiv.$chapter_number_2."')".'">'."\n".
		'<h3><i class="fas fa-arrow-circle-right"></i></h3>'."\n".
		'</button></a>'."\n";
	}

	echo "\n";

	echo '</h5>'."\n";

	echo $div_close."\n";
	echo '<br /><br />'."\n";
	echo '<br /><br />'."\n";

	echo "\n";

	#"You're Reading [Story]" Text
	if ($chapter_number_1 == $publishedblocks) {
		echo '<div style="text-align:center;">'."\n".
		'<h5>'."\n".
		$div_zoom_animation."\n".
		'<span class="'.$chapter_text_style.'">'."\n".
		'<br />'."\n".
		'<b>'.$reading2.' '.$bluespan.' ['.$newtxt.' '.$publishedblocks.']'.'<br />'.$spanc.'</b>'."\n".
		'<br />'.$spanc."\n".
		$div_close."\n".
		'</h5>'."\n".
		'<br /><br /><br />'."\n".
		$div_close."\n"."\n";
	}

	else {
		echo '<div style="text-align:center;">'."\n".
		'<h5>'."\n".
		$div_zoom_animation."\n".
		'<span class="'.$chapter_text_style.'">'."\n".
		'<br />'."\n".
		'<b>'.$reading2.'</b>'.'<br />'."\n".
		'<br />'.$spanc."\n".
		$div_close."\n".
		'</h5>'."\n".
		'<br /><br /><br />'."\n".
		$div_close."\n"."\n";
	}

	echo $div_close."\n";

    $chapter_number_1++;
    $chapter_number_2++;
    $chapter_number_3++;
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