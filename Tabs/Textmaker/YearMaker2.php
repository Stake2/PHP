<?php 

if ($thingsidofake == true) {
	$spanstyle = $blackspan;
	$hover_text_color = $text_hover_white_css_class;
	$number_text_color = $first_text_color;
	$number_text_color_span = '<span class="'.$number_text_color.'">';

	if ($mobileversion == true) {
		$margindivstyle = '<div>';
		$mobileaname = 'm';
	}

	if ($mobileversion == false) {
		$margindivstyle = '<div style="margin-left:30px;">';
		$mobileaname = '';
	}
}

if ($thingsidofake == null) {
	$spanstyle = $whitespan;
	$hover_text_color = $text_hover_white_css_class;
	$number_text_color = $first_text_color;
	$number_text_color_span = '<span class="'.$number_text_color.'">';

	if ($mobileversion == true) {
		$margindivstyle = '<div>';
		$mobileaname = 'm';
	}

	if ($mobileversion == null) {
		$margindivstyle = '<div style="margin-left:30px;">';
		$mobileaname = '';
	}
}


if ($site == $site2018 and $a2019 == false) {
	#2018.php version of the YearMaker from TextMaker.php, only has Medias array generator

	$bb = 6;
	$v = 0;
	#Medias array displayer and generator
	while ($bb <= 10) {
		$medias[$v] = '<a href="'.$main_website_url.'watch/" class="w3-text-white">'.$txts[$bb].'</a>'.': '.$spanc.$bluespan.$yearnumbsfile2019[$bb].$spanc.'<br />'."\n";

		$mediastexts[$v] = $txts[$bb].'2018';

		$bb++;
		$v++;
	}
}

if ($site == $site2018 and $a2019 == true) {
	#2018.php version of the YearMaker from TextMaker.php, only has Medias array generator

	$bb = 5;
	$v = 0;
	#Medias array displayer and generator
	while ($bb <= 10) {
		$medias[$v] = '<b>'.'<a href="'.$main_website_url.'watch/" class="w3-text-white">'.$txts[$bb].'</a>'.': '.'</b>'.$spanc.$bluespan.'<b>'.$yearnumbs2018txt[$bb].'</b>'.$spanc.'<br />'."\n";

		$mediastexts[$v] = $txts[$bb].'2018';

		$bb++;
		$v++;
	}
}

if ($website_name == $sitewatch or $site == $site2019 or $site == $site2018 and $a2019 == false and $regeneratemedias2019 == true) {
	#2019.php version of the YearMaker from TextMaker.php, only has Medias array generator

	$bb = 5;
	$v = 0;
	#Medias array displayer and generator
	while ($bb <= 10) {
		if ($a2019text == true and $a2018text == false) {
			$medias[$v] = '<a href="#'.$txts[$bb].'2019">'.$whitespan.$txts[$bb].': '.$spanc.$number_text_color_span.$yearnumbs2019txt[$bb].$spanc.'</a>'.'<br />'."\n";
			$mediastexts[$v] = $txts[$bb].'2019';
		}

		if ($a2019text == false and $a2018text == true) {
			$medias[$v] = '<a href="#'.$txts[$bb].'2018">'.$whitespan.$txts[$bb].': '.$spanc.$number_text_color_span.$yearnumbs2019txt[$bb].$spanc.'</a>'.'<br />'."\n";
			$mediastexts[$v] = $txts[$bb].'2018';
		}

		$bb++;
		$v++;
	}
}

if ($website_name == $sitewatch and $a2019 == false and $regeneratemedias2019 == true and $thingsidofake == true) {
	#2019.php version of the YearMaker from TextMaker.php, only has Medias array generator

	$bb = 6;
	$v = 0;
	#Medias array displayer and generator
	while ($bb <= 10) {
		$medias[$v] = '<a href="#'.$txts[$bb].'2019">'.$blackspan.$txts[$bb].': '.$spanc.$number_text_color_span.$yearnumbs2019txt[$bb].$spanc.'</a>'.'<br />'."\n";
		$mediastexts[$v] = $txts[$bb].'2019';
		$bb++;
		$v++;
	}
}

if ($site == $site2019 and $generate2019 == true) {
	#2019.php version of the YearMaker from TextMaker.php

	echo '<div class="'.$computer_variable.'">'.'<button class="w3-btn '.$first_button_style.'" id="cetoggle1btn" '.$roundedborderstyle.' onClick="Cetoggle2cmnd();">'.'<'.$n.'>'.$editbtntxt1.': '.$icons[10].'</'.$n.'>'.'</button>'."\n";
	
	echo '<button class="w3-btn '.$first_button_style.'" id="copytextbtn" '.$roundedborderstyle.' onclick="copyToClipboard2()">'.'<'.$n.'>'.''.$copybtntxt2.': '.$icons[15].'</'.$n.'>'.'</button>'."\n";
	echo '<button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="copyToClipboard1()">'.'<'.$n.'>'.''.$copybtntxt1.': '.$icons[15].'</'.$n.'>'.'</button>'."\n";
	echo $div_close."\n";
	echo '<hr class="'.$sitehr.' '.$computer_variable.'" />'."\n";
	echo '<div style="text-align:left;">'."\n";
	echo '<'.$n.' class="'.$textstyle.' '.$computer_variable.'" id="teste1div" style="text-align:left;">'."\n";
	echo $div_zoom_animation."\n";
	
	echo $author.'<br />'."\n";
	$i = 0;
	#Date reader from YearNumbs 2019 text file
	while ($i <= 1) {
		echo $txts[$i].': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
		$i++;
	}
	
	echo '<br />'."\n";
	echo $txts[$i].': '.$bluespan.'<a href="'.$yearnumbs2019txt[$i].'">'.$yearnumbs2019txt[$i].'</a>'.$spanc.'<br />'."\n";
	echo '<br />'."\n";
	echo '---'."\n";
	echo '<br />'."\n";
	echo '<br />'."\n";
	$i++;
	echo $txts[$i].': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
	echo '<br />'."\n";
	$i++;
	echo '<a href="'.$main_website_url.'watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
	$i++;
	echo $txts[$i].': '.'<a href="'.$yearnumbs2019txt[$i].'">'.$bluespan.$yearnumbs2019txt[$i].$spanc.'</a>'.'<br />'."\n";
	$i++;
	$v = 0;
	#Medias array displayer and generator
	while ($i <= 10) {
		echo '<a href="'.$main_website_url.'watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
		$medias[$v] = '<a href="'.$main_website_url.'watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
		$i++;
		$v++;
	}
	echo '<br />';
	$i2 = $i + 1;
	$i3 = $i + 2;
	$i4 = $i + 5;
	$i5 = $i + 6;
	$i6 = $i + 7;
	$a4 = 0;
	#Stories part of the My 2019.txt file generator
	echo '<a href="'.$story_namelinks[$a4].'" class="w3-text-green">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.' '.$txts[$i4].'s, '.$bluespan.$yearnumbs2019txt[$i2].$spanc.' '.$txts[$i5].', '.$bluespan.$yearnumbs2019txt[$i3].' '.$spanc.$txts[$i6].'<br />'."\n";
	$i++;
	$i++;
	$i++;
	$a4++;
	$a = 12;
	$b = 11;
	while ($a < 16) {
		$b2 = $b + 1;
		$b3 = $b + 2;
		$b4 = $b + 5;
		$b5 = $b + 6;
		$b6 = $b + 7;
		$i2 = $i + 1;
		if ($a == 12) {
			$captxt = $txts[$b4].'s';
		}
	
		if ($a == 13) {
			$captxt = $txts[$b4];
		}
	
		if ($a == 14) {
			$captxt = $txts[$b4].'s';
		}
	
		if ($a == 15) {
			$captxt = $txts[$b4];
		}
		echo $greenspan.'<a href="'.$story_namelinks[$a4].'" class="w3-text-green">'.$txts[$a].'</a>'.$spanc.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.' '.$captxt.', '.$bluespan.$yearnumbs2019txt[$i2].$spanc.' '.$txts[$i5].' ('.$cyanspan.$newtxt.'!'.$spanc.')'.'<br />'."\n";
		$i++;
		$i++;
		$a++;
		$a4++;
	}
	
	echo '<br />'."\n";
	$i--;
	$a = 22;
	#Websites part displayer
	echo $txts[19].': '.$bluespan.$yearnumbs2019txt[$a].$spanc.'<br />'."\n";
	$a++;
	echo $websites_buttons_array[18]."\n".
	$websites_buttons_array[6]."\n".
	$websites_buttons_array[19]."\n".
	$websites_buttons_array[20]."\n".
	$websites_buttons_array[4]."\n".
	$websites_buttons_array[16]."\n".
	$websites_buttons_array[8]."\n".
	$websites_buttons_array[21]."\n".
	$websites_buttons_array[9]."\n".
	$websites_buttons_array[10].$websites_buttons_array[11]."\n".
	'<br />'."\n";
	$a++;
	$i--;
	$a2 = $a + 1;
	$i2 = $i + 1;
	#Friends part displayer
	echo $txts[$i].': '.$bluespan.$yearnumbs2019txt[$a].$spanc.'<br />'."\n";
	echo $txts[$i2].': '.'<a href="'.$yearnumbs2019txt[$a2].'">'.$bluespan.$yearnumbs2019txt[$a2].$spanc.'</a>'.'<br />'."\n";
	echo '<br />'."\n";
	$i++;
	$i++;
	$a++;
	$a++;
	$a2 = $a + 1;
	#Comments part displayer
	echo $txts[$i].': '.$bluespan.$yearnumbs2019txt[$a].$spanc.' (#'.$bluespan.$yearnumbs2019txt[$a2].$spanc.')'.'<br />'."\n";
	
	echo '</'.$n.'>'."\n";
	echo $div_close."\n";
	
	echo '<script>
	var text = document.getElementById("teste1div").innerHTML;
	var text2 = document.getElementById("teste1div").textContent;
	
	function copyToClipboard1() {
		navigator.clipboard.writeText(text);
		console.log("Diario Webiste: Text copied to the clipboard: " + text);
	}
	
	function copyToClipboard2() {
		navigator.clipboard.writeText(text2);
		console.log("Diario Webiste: Text copied to the clipboard: " + text2);
	}
	</script>'."\n";
	
	
	echo '<div class="'.$mobile_variable.'">'."\n";
	echo '<button class="w3-btn '.$first_button_style.'" id="copytextbtn" onclick="copyToClipboard2()">'.'<'.$m.'>'.''.$copybtntxt2.': '.$icons[15].'</'.$m.'>'.'</button>'."\n";
	echo '<button class="w3-btn '.$first_button_style.'" onclick="copyToClipboard1()">'.'<'.$m.'>'.''.$copybtntxt1.': '.$icons[15].'</'.$m.'>'.'</button>'."\n";
	echo $div_close."\n";
	echo '<hr class="'.$sitehr.' '.$mobile_variable.'" />'."\n";
	echo '<div style="text-align:left;">'."\n";
	echo '<'.$m.' class="'.$textstyle.' '.$mobile_variable.'" id="teste1div" style="text-align:left;">'."\n";
	echo $div_zoom_animation."\n";
	
	echo $author.'<br />'."\n";
	#Date reader from YearNumbs 2019 text file
	$i = 0;
	while ($i <= 1) {
		echo $txts[$i].': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
		$i++;
	}
	
	echo '<br />'."\n";
	echo $txts[$i].': '.$bluespan.'<a href="'.$yearnumbs2019txt[$i].'">'.$yearnumbs2019txt[$i].'</a>'.$spanc.'<br />'."\n";
	echo '<br />'."\n";
	echo '---'."\n";
	echo '<br />'."\n";
	echo '<br />'."\n";
	$i++;
	echo $txts[$i].': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
	echo '<br />'."\n";
	$i++;
	echo '<a href="'.$main_website_url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
	$i++;
	echo $txts[$i].': '.'<a href="'.$yearnumbs2019txt[$i].'">'.$bluespan.$yearnumbs2019txt[$i].$spanc.'</a>'.'<br />'."\n";
	$i++;
	$v = 0;
	#Medias array displayer and generator
	while ($i <= 10) {
		echo '<a href="'.$main_website_url.'watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
		$medias[$v] = '<a href="'.$main_website_url.'watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
		$i++;
		$v++;
	}
	
	echo '<br />'."\n";
	$i2 = $i + 1;
	$i3 = $i + 2;
	$i4 = $i + 5;
	$i5 = $i + 6;
	$i6 = $i + 7;
	$a4 = 0;
	#Stories part of the My 2019.txt file generator
	echo '<a href="'.$story_namelinks[$a4].'" class="w3-text-green">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.' '.$txts[$i4].'s, '.$bluespan.$yearnumbs2019txt[$i2].$spanc.' '.$txts[$i5].', '.$bluespan.$yearnumbs2019txt[$i3].' '.$spanc.$txts[$i6].'<br />'."\n";
	$i++;
	$i++;
	$i++;
	$a4++;
	$a = 12;
	$b = 11;
	while ($a < 16) {
		$b2 = $b + 1;
		$b3 = $b + 2;
		$b4 = $b + 5;
		$b5 = $b + 6;
		$b6 = $b + 7;
		$i2 = $i + 1;
		if ($a == 12) {
			$captxt = $txts[$b4].'s';
		}
	
		if ($a == 13) {
			$captxt = $txts[$b4];
		}
	
		if ($a == 14) {
			$captxt = $txts[$b4].'s';
		}
	
		if ($a == 15) {
			$captxt = $txts[$b4];
		}
		echo $greenspan.'<a href="'.$story_namelinks[$a4].'" class="w3-text-green">'.$txts[$a].'</a>'.$spanc.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.' '.$captxt.', '.$bluespan.$yearnumbs2019txt[$i2].$spanc.' '.$txts[$i5].' ('.$cyanspan.$newtxt.'!'.$spanc.')'.'<br />'."\n";
		$i++;
		$i++;
		$a++;
		$a4++;
	}
	
	echo '<br />'."\n";
	$i--;
	$a = 22;
	echo $txts[19].': '.$bluespan.$yearnumbs2019txt[$a].$spanc.'<br />'."\n";
	$a++;
	#Websites part displayer
	echo $websites_buttons_mobile[18].
	$websites_buttons_mobile[6]."\n".
	$websites_buttons_mobile[19]."\n".
	$websites_buttons_mobile[20]."\n".
	$websites_buttons_mobile[4]."\n".
	$websites_buttons_mobile[16]."\n".
	$websites_buttons_mobile[8]."\n".
	$websites_buttons_mobile[21]."\n".
	$websites_buttons_mobile[9]."\n".
	$websites_buttons_mobile[10]."\n".
	$websites_buttons_mobile[11]."\n";
	echo '<br />'."\n";
	$a++;
	$i--;
	$a2 = $a + 1;
	$i2 = $i + 1;
	#Friends part displayer
	echo $txts[$i].': '.$bluespan.$yearnumbs2019txt[$a].$spanc.'<br />'."\n";
	echo $txts[$i2].': '.'<a href="'.$yearnumbs2019txt[$a2].'">'.$bluespan.$yearnumbs2019txt[$a2].$spanc.'</a>'.'<br />'."\n";
	echo '<br />'."\n";
	$i++;
	$i++;
	$a++;
	$a++;
	$a2 = $a + 1;
	#Comments part displayer
	echo $txts[$i].': '.$bluespan.$yearnumbs2019txt[$a].$spanc.' (#'.$bluespan.$yearnumbs2019txt[$a2].$spanc.')'.'<br />'."\n";
	
	echo '</'.$m.'>'."\n";
	echo $div_close."\n";	
}

?>