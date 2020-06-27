<?php 

if ($site == $site2018 and $a2019 == false) {
	#2018.php version of the YearMaker from TextMaker.php, only has Medias array generator

	$bb = 6;
	$v = 0;
	#Medias array displayer and generator
	while ($bb <= 10) {
		$medias[$v] = '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$bb].'</a>'.': '.$spanc.$bluespan.$yearnumbsfile2019[$bb].$spanc.'<br />'."\n";
		$bb++;
		$v++;
	}
}

if ($site == $site2018 and $a2019 == true) {
	#2018.php version of the YearMaker from TextMaker.php, only has Medias array generator

	$bb = 6;
	$v = 0;
	#Medias array displayer and generator
	while ($bb <= 10) {
		$medias[$v] = '<b>'.'<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$bb].'</a>'.': '.'</b>'.$spanc.$bluespan.'<b>'.$yearnumbs2018txt[$bb].'</b>'.$spanc.'<br />'."\n";
		$bb++;
		$v++;
	}
}

if ($sitename == $sitewatch or $site == $site2019 or $site == $site2018 and $a2019 == false and $regeneratemedias2019 == true) {
	#2019.php version of the YearMaker from TextMaker.php, only has Medias array generator

	$bb = 6;
	$v = 0;
	#Medias array displayer and generator
	while ($bb <= 10) {
		if ($a2019text == true and $a2018text == false) {
			$medias[$v] = '<a href="#'.$txts[$bb].'2019">'.$whitespan.$txts[$bb].': '.$spanc.$bluespan.$yearnumbs2019txt[$bb].$spanc.'</a>'.'<br />'."\n";
			$mediastexts[$v] = $txts[$bb].'2019';
		}

		if ($a2019text == false and $a2018text == true) {
			$medias[$v] = '<a href="#'.$txts[$bb].'2018">'.$whitespan.$txts[$bb].': '.$spanc.$bluespan.$yearnumbs2019txt[$bb].$spanc.'</a>'.'<br />'."\n";
			$mediastexts[$v] = $txts[$bb].'2018';
		}

		$bb++;
		$v++;
	}
}

if ($sitename == $sitewatch and $a2019 == false and $regeneratemedias2019 == true and $thingsidofake == true) {
	#2019.php version of the YearMaker from TextMaker.php, only has Medias array generator

	$bb = 6;
	$v = 0;
	#Medias array displayer and generator
	while ($bb <= 10) {
		$medias[$v] = '<a href="#'.$txts[$bb].'2019">'.$blackspan.$txts[$bb].': '.$spanc.$bluespan.$yearnumbs2019txt[$bb].$spanc.'</a>'.'<br />'."\n";
		$mediastexts[$v] = $txts[$bb].'2019';
		$bb++;
		$v++;
	}
}

if ($site == $site2019 and $generate2019 == true) {
	#2019.php version of the YearMaker from TextMaker.php

	echo '<div class="'.$computervar.'">'.'<button class="w3-btn '.$btnstyle.'" id="cetoggle1btn" '.$roundedborderstyle.' onClick="Cetoggle2cmnd();">'.'<'.$n.'>'.$editbtntxt1.': '.$icons[10].'</'.$n.'>'.'</button>'."\n";
	
	echo '<button class="w3-btn '.$btnstyle.'" id="copytextbtn" '.$roundedborderstyle.' onclick="copyToClipboard2()">'.'<'.$n.'>'.''.$copybtntxt2.': '.$icons[15].'</'.$n.'>'.'</button>'."\n";
	echo '<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="copyToClipboard1()">'.'<'.$n.'>'.''.$copybtntxt1.': '.$icons[15].'</'.$n.'>'.'</button>'."\n";
	echo $divc."\n";
	echo '<hr class="'.$sitehr.' '.$computervar.'" />'."\n";
	echo '<div style="text-align:left;">'."\n";
	echo '<'.$n.' class="'.$textstyle.' '.$computervar.'" id="teste1div" style="text-align:left;">'."\n";
	echo $divzoomanim."\n";
	
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
	echo '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
	$i++;
	echo $txts[$i].': '.'<a href="'.$yearnumbs2019txt[$i].'">'.$bluespan.$yearnumbs2019txt[$i].$spanc.'</a>'.'<br />'."\n";
	$i++;
	$v = 0;
	#Medias array displayer and generator
	while ($i <= 10) {
		echo '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
		$medias[$v] = '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
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
	echo '<a href="'.$storylinks[$a4].'" class="w3-text-green">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.' '.$txts[$i4].'s, '.$bluespan.$yearnumbs2019txt[$i2].$spanc.' '.$txts[$i5].', '.$bluespan.$yearnumbs2019txt[$i3].' '.$spanc.$txts[$i6].'<br />'."\n";
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
		echo $greenspan.'<a href="'.$storylinks[$a4].'" class="w3-text-green">'.$txts[$a].'</a>'.$spanc.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.' '.$captxt.', '.$bluespan.$yearnumbs2019txt[$i2].$spanc.' '.$txts[$i5].' ('.$cyanspan.$newtxt.'!'.$spanc.')'.'<br />'."\n";
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
	echo $sitesbtns[18]."\n".
	$sitesbtns[6]."\n".
	$sitesbtns[19]."\n".
	$sitesbtns[20]."\n".
	$sitesbtns[4]."\n".
	$sitesbtns[16]."\n".
	$sitesbtns[8]."\n".
	$sitesbtns[21]."\n".
	$sitesbtns[9]."\n".
	$sitesbtns[10].$sitesbtns[11]."\n".
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
	echo $divc."\n";
	
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
	
	
	echo '<div class="'.$mobilevar.'">'."\n";
	echo '<button class="w3-btn '.$btnstyle.'" id="copytextbtn" onclick="copyToClipboard2()">'.'<'.$m.'>'.''.$copybtntxt2.': '.$icons[15].'</'.$m.'>'.'</button>'."\n";
	echo '<button class="w3-btn '.$btnstyle.'" onclick="copyToClipboard1()">'.'<'.$m.'>'.''.$copybtntxt1.': '.$icons[15].'</'.$m.'>'.'</button>'."\n";
	echo $divc."\n";
	echo '<hr class="'.$sitehr.' '.$mobilevar.'" />'."\n";
	echo '<div style="text-align:left;">'."\n";
	echo '<'.$m.' class="'.$textstyle.' '.$mobilevar.'" id="teste1div" style="text-align:left;">'."\n";
	echo $divzoomanim."\n";
	
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
	echo '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
	$i++;
	echo $txts[$i].': '.'<a href="'.$yearnumbs2019txt[$i].'">'.$bluespan.$yearnumbs2019txt[$i].$spanc.'</a>'.'<br />'."\n";
	$i++;
	$v = 0;
	#Medias array displayer and generator
	while ($i <= 10) {
		echo '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
		$medias[$v] = '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.'<br />'."\n";
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
	echo '<a href="'.$storylinks[$a4].'" class="w3-text-green">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.' '.$txts[$i4].'s, '.$bluespan.$yearnumbs2019txt[$i2].$spanc.' '.$txts[$i5].', '.$bluespan.$yearnumbs2019txt[$i3].' '.$spanc.$txts[$i6].'<br />'."\n";
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
		echo $greenspan.'<a href="'.$storylinks[$a4].'" class="w3-text-green">'.$txts[$a].'</a>'.$spanc.': '.$bluespan.$yearnumbs2019txt[$i].$spanc.' '.$captxt.', '.$bluespan.$yearnumbs2019txt[$i2].$spanc.' '.$txts[$i5].' ('.$cyanspan.$newtxt.'!'.$spanc.')'.'<br />'."\n";
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
	echo $sitesbtnsm[18].
	$sitesbtnsm[6]."\n".
	$sitesbtnsm[19]."\n".
	$sitesbtnsm[20]."\n".
	$sitesbtnsm[4]."\n".
	$sitesbtnsm[16]."\n".
	$sitesbtnsm[8]."\n".
	$sitesbtnsm[21]."\n".
	$sitesbtnsm[9]."\n".
	$sitesbtnsm[10]."\n".
	$sitesbtnsm[11]."\n";
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
	echo $divc."\n";	
}

?>