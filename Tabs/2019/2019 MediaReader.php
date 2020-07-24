<?php 

echo $divzoomanim."\n";
echo '<div style="text-align:left;">'."\n";

#Media loader for 2019 using "Watched VideoTypes 2019"
#Used in the ArchivedMedias Tab on Watch History.php

#Number resetter for Watch History website
if ($sitename == $sitewatch) {
	$watchednumb = $watched2019number;

	#Medias numbers for 2018 Medias
	$moviesnumb = 4; 
	$seriesnumb = 9; 
	$cartoonsnumb = 60;
	$animesnumb = 87;
	$videosnumb = 134;

	#Line number for the 2019 Watched VideoTypes.txt
	$original1 = 12;
	$original2 = 18;
	$original3 = 29;
	$original4 = 91;
	$original5 = 180;

	#Definer for the original numbers of medias
	$moviesline = $original1;
	$seriesline = $original2;
	$cartoonsline = $original3;
	$animesline = $original4;
	$videosline = $original5;
}

if ($sitename == $sitewatch and $thingsidofake == true and $site == $sitethingsido or $sitename == $sitethingsido) {
	echo '<b>'.$blackspan.$txts[4].': '.$spanc.'</b>'.$bluespan.'<b>'.$watchednumb.'</b>'.$spanc.'<br />'."\n";
}

if ($sitename == $sitewatch  and $thingsidofake == null or $thingsidofake == false and $watchmedias2019 == true) {
	echo '<b>'.$whitespan.$txts[4].': '.$spanc.'</b>'.$bluespan.'<b>'.$watchednumb.'</b>'.$spanc."\n".'<br />'."\n";
}

if ($sitename != $sitewatch) {
	echo '<b>'.'<a href="'.$url.'/watch/" class="w3-text-white">'.$txts[4].'</a>'.': '.$bluespan.$watchednumb.$spanc.'</b>'."\n".'<br />'."\n";
}

$a2019 = false;
$a2018text = true;
$a2019text = false;
$regeneratemedias2019 = true;
$generate2019 = false;
#YearMaker2.php reader
include $yearmakerfilephp2test;
echo '<br />'."\n".
'<b>'.$medias[0].'</b>'."\n".
'<b>'.$medias[1].'</b>'."\n".
'<b>'.$medias[2].'</b>'."\n".
'<b>'.$medias[3].'</b>'."\n".
'<b>'.$medias[4].'</b>'."\n";
echo '<br />'."\n";
$v = 0;
#Movies part
echo '<a name="'.$mediastexts[$v].'"></a>'."\n";
echo '<b>'.$medias[$v].'</b>'."\n";
$v++;
$a = 0;
$a2 = $moviesnumb;
$e = 0;
$e2 = 1;
$line = $moviesline;
$i = array();

if ($a == 0) {
	$i[$a] = $line;
}

while ($a < $a2) {
	$i[$a] = $moviesline++;
	$a++;
}

while ($e < $moviesnumb) {
	include $mediastyler;

	$echostyle = '<span class="'.$cssbtn4.'">'.$namespan.' - '.$watchedfile2019[$i[$e]].$spanc."<br />"."\n";
	echo $echostyle;
	$e++;
	$e2++;
}

$moviesline = $original1;
$seriesline = $original2;
$cartoonsline = $original3;
$animesline = $original4;
$videosline = $original5;

echo '<br />'."\n";
#Series part
echo '<a name="'.$mediastexts[$v].'"></a>'."\n";
echo '<b>'.$medias[$v].'</b>'."\n";
$v++;

$a = 0;
$a2 = $seriesnumb;
$e = 0;
$e2 = 1;
$line = $seriesline;
$i = array();

if ($a == 0) {
	$i[$a] = $line;
}

while ($a < $a2) {
	$i[$a] = $seriesline++;
	$a++;
}

while ($e < $seriesnumb) {
	include $mediastyler;

	$echostyle = '<span class="'.$cssbtn4.'">'.$namespan.' - '.$watchedfile2019[$i[$e]].$spanc."<br />"."\n";
	echo $echostyle;
	$e++;
	$e2++;
}

$moviesline = $original1;
$seriesline = $original2;
$cartoonsline = $original3;
$animesline = $original4;
$videosline = $original5;

echo '<br />'."\n";
#Cartoons part
echo '<a name="'.$mediastexts[$v].'"></a>'."\n";
echo '<b>'.$medias[$v].'</b>'."\n";
$v++;

$a = 0;
$a2 = $cartoonsnumb;
$e = 0;
$e2 = 1;
$line = $cartoonsline;
$i = array();

if ($a == 0) {
	$i[$a] = $line;
}

while ($a < $a2) {
	$i[$a] = $cartoonsline++;
	$a++;
}

while ($e < $cartoonsnumb) {
	include $mediastyler;

	$echostyle = '<span class="'.$cssbtn4.'">'.$namespan.' - '.$watchedfile2019[$i[$e]].$spanc."<br />"."\n";
	echo $echostyle;
	$e++;
	$e2++;
}

$moviesline = $original1;
$seriesline = $original2;
$cartoonsline = $original3;
$animesline = $original4;
$videosline = $original5;

echo '<br />'."\n";
#Animes part
echo '<a name="'.$mediastexts[$v].'"></a>'."\n";
echo '<b>'.$medias[$v].'</b>'."\n";
$v++;

$a = 0;
$a2 = $animesnumb;
$e = 0;
$e2 = 1;
$line = $animesline;
$i = array();

if ($a == 0) {
	$i[$a] = $line;
}

while ($a < $a2) {
	$i[$a] = $animesline++;
	$a++;
}

while ($e < $animesnumb) {
	include $mediastyler;

	$echostyle = '<span class="'.$cssbtn4.'">'.$namespan.' - '.$watchedfile2019[$i[$e]].$spanc."<br />"."\n";
	echo $echostyle;
	$e++;
	$e2++;
}

$moviesline = $original1;
$seriesline = $original2;
$cartoonsline = $original3;
$animesline = $original4;
$videosline = $original5;

echo '<br />'."\n";
#Videos part
echo '<a name="'.$mediastexts[$v].'"></a>'."\n";
echo '<b>'.$medias[$v].'</b>'."\n";
$v++;

$a = 0;
$a2 = $videosnumb;
$e = 0;
$e2 = 1;
$line = $videosline;
$i = array();

if ($a == 0) {
	$i[$a] = $line;
}

while ($a < $a2) {
	$i[$a] = $videosline++;
	$a++;
}

while ($e < $videosnumb) {
	include $mediastyler;

	$echostyle = '<span class="'.$cssbtn4.'">'.$namespan.' - '.$watchedfile2019[$i[$e]].$spanc."<br />"."\n";
	echo $echostyle;
	$e++;
	$e2++;
}

echo '<br /><br /><br />';

$moviesline = $original1;
$seriesline = $original2;
$cartoonsline = $original3;
$animesline = $original4;
$videosline = $original5;

echo $divc."\n";
echo $divc."\n";

?>