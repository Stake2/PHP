<?php 

$story_namenumbsnumb = 0;
$handle = fopen ($story_namenumbsfile, "r");
while (!feof ($handle)){
	$line = fgets ($handle);
	$story_namenumbsnumb++;
}

$story_nametxtsnumb = 0;
$handle = fopen ($story_nametxtsfile, "r");
while (!feof ($handle)){
	$line = fgets ($handle);
	$story_nametxtsnumb++;
}

$story_namenumbsnumbfile = $story_namenumbsnumb - 1;
$story_namenumbsnumbfiletxt = $story_namenumbsnumb;
$story_nametxtsnumbfile = $story_nametxtsnumb - 1;
$story_nametxtsnumbfiletxt = $story_nametxtsnumb;

$story_namenumbsfp = @fopen($story_namenumbsfile, 'r', 'UTF-8');
if ($story_namenumbsfp) {
	$story_namenumbsroot = explode("\n", fread($story_namenumbsfp, filesize($story_namenumbsfile)));
	$story_namenumbtxt = str_replace("^", "", $story_namenumbsroot);
}

$story_nametxtsfp = @fopen($story_nametxtsfile, 'r', 'UTF-8');
if ($story_nametxtsfp) {
	$story_nametxtsroot = explode("\n", fread($story_nametxtsfp, filesize($story_nametxtsfile)));
	$story_nametxtstxt = str_replace("^", "", $story_nametxtsroot);
}

$story_namenumbtxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $story_namenumbtxt);
$story_nametxtstxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $story_nametxtstxt);

echo $author2.'<br />'."\n";
echo '<br />';
$i = 2;
echo $story_nametxtstxt[$i].'<br />'."\n";
$i++;
echo $story_nametxtstxt[$i].'<br />'."\n";
$i++;
echo $story_nametxtstxt[$i].'<br />'."\n";
$i++;
echo $story_nametxtstxt[$i].'<br />'."\n";
$i++;
echo $story_nametxtstxt[$i].'<br />'."\n";
$i++;
echo $story_nametxtstxt[$i].'<br />'."\n";
$i++;
echo $story_nametxtstxt[$i].'<br />'."\n";
$i++;
echo $story_nametxtstxt[$i].'<br />'."\n";
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
#echo '<a href="'.$main_website_url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
#$i++;
#echo $txts[$i].': '.'<a href="'.$yearnumbstxt[$i].'">'.$bluespan.$yearnumbstxt[$i].$spanc.'</a>'.'<br />'."\n";
#$i++;
#$v = 0;
#while ($i <= 10) {
#	echo '<a href="'.$main_website_url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
#	$medias[$v] = '<a href="'.$main_website_url.'/watch/" class="w3-text-white">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbstxt[$i].$spanc.'<br />'."\n";
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
#echo '<a href="'.$story_namelinks[$a4].'" class="w3-text-green">'.$txts[$i].'</a>'.': '.$bluespan.$yearnumbstxt[$i].$spanc.' '.$txts[$i4].'s, '.$bluespan.$yearnumbstxt[$i2].$spanc.' '.$txts[$i5].', '.$bluespan.$yearnumbstxt[$i3].' '.$spanc.$txts[$i6].'<br />'."\n";
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
#	echo $greenspan.'<a href="'.$story_namelinks[$a4].'" class="w3-text-green">'.$txts[$a].'</a>'.$spanc.': '.$bluespan.$yearnumbstxt[$i].$spanc.' '.$captxt.', '.$bluespan.$yearnumbstxt[$i2].$spanc.' '.$txts[$i5].' ('.$cyanspan.$newtxt.'!'.$spanc.')'.'<br />'."\n";
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
#echo $websites_buttons_array[18].
#$websites_buttons_array[6].
#$websites_buttons_array[19].
#$websites_buttons_array[20].
#$websites_buttons_array[4].
#$websites_buttons_array[16].
#$websites_buttons_array[8].
#$websites_buttons_array[21].
#$websites_buttons_array[9].
#$websites_buttons_array[10].
#$websites_buttons_array[11];
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