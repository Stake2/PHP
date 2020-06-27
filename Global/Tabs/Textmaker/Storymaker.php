<?php 

$storynumbsnumb = 0;
$handle = fopen ($storynumbsfile, "r");
while (!feof ($handle)){
	$line = fgets ($handle);
	$storynumbsnumb++;
}

$storytxtsnumb = 0;
$handle = fopen ($storytxtsfile, "r");
while (!feof ($handle)){
	$line = fgets ($handle);
	$storytxtsnumb++;
}

$storynumbsnumbfile = $storynumbsnumb - 1;
$storynumbsnumbfiletxt = $storynumbsnumb;
$storytxtsnumbfile = $storytxtsnumb - 1;
$storytxtsnumbfiletxt = $storytxtsnumb;

$storynumbsfp = @fopen($storynumbsfile, 'r', 'UTF-8');
if ($storynumbsfp) {
	$storynumbsroot = explode("\n", fread($storynumbsfp, filesize($storynumbsfile)));
	$storynumbtxt = str_replace("^", "", $storynumbsroot);
}

$storytxtsfp = @fopen($storytxtsfile, 'r', 'UTF-8');
if ($storytxtsfp) {
	$storytxtsroot = explode("\n", fread($storytxtsfp, filesize($storytxtsfile)));
	$storytxtstxt = str_replace("^", "", $storytxtsroot);
}

$storynumbtxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $storynumbtxt);
$storytxtstxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $storytxtstxt);

echo $author2.'<br />'."\n";
echo '<br />';
$i = 2;
echo $storytxtstxt[$i].'<br />'."\n";
$i++;
echo $storytxtstxt[$i].'<br />'."\n";
$i++;
echo $storytxtstxt[$i].'<br />'."\n";
$i++;
echo $storytxtstxt[$i].'<br />'."\n";
$i++;
echo $storytxtstxt[$i].'<br />'."\n";
$i++;
echo $storytxtstxt[$i].'<br />'."\n";
$i++;
echo $storytxtstxt[$i].'<br />'."\n";
$i++;
echo $storytxtstxt[$i].'<br />'."\n";
$i++;
echo '<br />';




#echo '<br />';
#echo $txts[$i].': '.$bluespan.'<a href="'.$yearnumbstxt[$i].'">'.$yearnumbstxt[$i].'</a>'.$spanc.'<br />'."\n";
#echo '<br />';
#echo '---';
#echo '<br />';
#echo '<br />';
#$i++;
#echo $txts[$i].': '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
#echo '<br />';
#$i++;
#echo '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
#$i++;
#echo $txts[$i].': '.'<a href="'.$yearnumbstxt[$i].'">'.$bluespan.$yearnumbstxt[$i].$spanc.'</a>'.'<br />'."\n";
#$i++;
#$v = 0;
#while ($i <= 10) {
#	echo '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
#	$medias[$v] = '<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
#	$i++;
#	$v++;
#}
#
#echo '<br />';
#$i2 = $i + 1;
#$i3 = $i + 2;
#$i4 = $i + 5;
#$i5 = $i + 6;
#$i6 = $i + 7;
#$a4 = 0;
#echo '<a href="'.$storylinks[$a4].'" class="w3-text-green">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbstxt[$i].$spanc.' '.$txts[$i4].'s, '.$bluespan.$yearnumbstxt[$i2].$spanc.' '.$txts[$i5].', '.$bluespan.$yearnumbstxt[$i3].' '.$spanc.$txts[$i6].'<br />'."\n";
#$i++;
#$i++;
#$i++;
#$a4++;
#$a = 12;
#$b = 11;
#while ($a < 16) {
#	$b2 = $b + 1;
#	$b3 = $b + 2;
#	$b4 = $b + 5;
#	$b5 = $b + 6;
#	$b6 = $b + 7;
#	$i2 = $i + 1;
#	if ($a == 12) {
#		$captxt = $txts[$b4].'s';
#	}
#
#	if ($a == 13) {
#		$captxt = $txts[$b4];
#	}
#
#	if ($a == 14) {
#		$captxt = $txts[$b4].'s';
#	}
#
#	if ($a == 15) {
#		$captxt = $txts[$b4];
#	}
#	echo $greenspan.'<a href="'.$storylinks[$a4].'" class="w3-text-green">'.$txts[$a].'</a>'.$spanc.': '.$bluespan.$yearnumbstxt[$i].$spanc.' '.$captxt.', '.$bluespan.$yearnumbstxt[$i2].$spanc.' '.$txts[$i5].' ('.$cyanspan.$newtxt.'!'.$spanc.')'.'<br />'."\n";
#	$i++;
#	$i++;
#	$a++;
#	$a4++;
#}
#
#echo '<br />';
#$i--;
#$a = 22;
#echo $txts[19].': '.$bluespan.$yearnumbstxt[$a].$spanc.'<br />'."\n";
#$a++;
#echo $sitesbtns[18].
#$sitesbtns[6].
#$sitesbtns[19].
#$sitesbtns[20].
#$sitesbtns[4].
#$sitesbtns[16].
#$sitesbtns[8].
#$sitesbtns[21].
#$sitesbtns[9].
#$sitesbtns[10].
#$sitesbtns[11];
#echo '<br />';
#$a++;
#$i--;
#$a2 = $a + 1;
#$i2 = $i + 1;
#echo $txts[$i].': '.$bluespan.$yearnumbstxt[$a].$spanc.'<br />'."\n";
#echo $txts[$i2].': '.'<a href="'.$yearnumbstxt[$a2].'">'.$bluespan.$yearnumbstxt[$a2].$spanc.'</a>'.'<br />'."\n";
#echo '<br />';
#$i++;
#$i++;
#$a++;
#$a++;
#$a2 = $a + 1;
#echo $txts[$i].': '.$bluespan.$yearnumbstxt[$a].$spanc.' (#'.$bluespan.$yearnumbstxt[$a2].$spanc.')'.'<br />';

?>