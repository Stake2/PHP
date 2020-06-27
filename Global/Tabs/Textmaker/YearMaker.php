<?php 

#YearMaker.php from TxtMaker.php

$ano = 2019;

if ($ano == 2019) {
	$yearnumbstxt = $yearnumbs2019txt;
}

echo $author.'<br />'."\n";
$i = 0;
#Date reader from YearNumbs 2019 text file
while ($i <= 1) {
	echo $txts[$i].': '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
	$i++;
}

echo '<br />'."\n";
echo $txts[$i].': '.$bluespan.'<a href="'.$yearnumbstxt[$i].'">'.$yearnumbstxt[$i].'</a>'.$spanc.'<br />'."\n";
echo '<br />'."\n";
echo '---'."\n";
echo '<br />'."\n";
echo '<br />'."\n";
$i++;
echo $txts[$i].' '.$ano.': '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
echo '<br />'."\n";
$i++;
echo '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
$i++;
echo $txts[$i].': '.'<a href="'.$yearnumbstxt[$i].'">'.$bluespan.$yearnumbstxt[$i].$spanc.'</a>'.'<br />'."\n";
$i++;
$v = 0;
#Medias array displayer and generator
while ($i <= 10) {
	echo '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].':</a> '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
	$medias[$v] = '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].':</a> '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
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
echo '<a href="'.$storylinks[$a4].'" class="w3-text-green">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbstxt[$i].$spanc.' '.$txts[$i4].'s, '.$bluespan.$yearnumbstxt[$i2].$spanc.' '.$txts[$i5].', '.$bluespan.$yearnumbstxt[$i3].' '.$spanc.$txts[$i6].'<br />'."\n";
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
	echo $greenspan.'<a href="'.$storylinks[$a4].'" class="w3-text-green">'.$txts[$a].'</a>'.$spanc.': '.$bluespan.$yearnumbstxt[$i].$spanc.' '.$captxt.', '.$bluespan.$yearnumbstxt[$i2].$spanc.' '.$txts[$i5].' ('.$cyanspan.$newtxt.'!'.$spanc.')'.'<br />'."\n";
	$i++;
	$i++;
	$a++;
	$a4++;
}

echo '<br />'."\n";
$i--;
$a = 22;
#Websites part displayer
echo $txts[19].': '.$bluespan.$yearnumbstxt[$a].$spanc.'<br />'."\n";
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
echo $txts[$i].': '.$bluespan.$yearnumbstxt[$a].$spanc.'<br />'."\n";
echo $txts[$i2].': '.'<a href="'.$yearnumbstxt[$a2].'">'.$bluespan.$yearnumbstxt[$a2].$spanc.'</a>'.'<br />'."\n";
echo '<br />'."\n";
$i++;
$i++;
$a++;
$a++;
$a2 = $a + 1;
#Comments part displayer
echo $txts[$i].': '.$bluespan.$yearnumbstxt[$a].$spanc.' (#'.$bluespan.$yearnumbstxt[$a2].$spanc.')'.'<br />'."\n";

?>