<?php 

$a = 0;
$a2 = $moviesnumb;
$e = 0;
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
	echo $watchedfile[$i[$e]]."<br />";
	$e++;
}

$moviesline = $original1;
$seriesline = $original2;
$cartoonsline = $original3;
$animesline = $original4;
$videosline = $original5;

echo '<br />';

echo '<b>'.$wtxt2.': '.$bluespan.$seriesnumb.$spanc.'</b><br />';

$a = 0;
$a2 = $seriesnumb;
$e = 0;
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
	echo $watchedfile[$i[$e]]."<br />";
	$e++;
}

$moviesline = $original1;
$seriesline = $original2;
$cartoonsline = $original3;
$animesline = $original4;
$videosline = $original5;

echo '<br />';

echo '<b>'.$wtxt3.': '.$bluespan.$cartoonsnumb.$spanc.'</b><br />';

$a = 0;
$a2 = $cartoonsnumb;
$e = 0;
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
	echo $watchedfile[$i[$e]]."<br />";
	$e++;
}

$moviesline = $original1;
$seriesline = $original2;
$cartoonsline = $original3;
$animesline = $original4;
$videosline = $original5;

echo '<br />';

echo '<b>'.$wtxt4.': '.$bluespan.$animesnumb.$spanc.'</b><br />';

$a = 0;
$a2 = $animesnumb;
$e = 0;
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
	echo $watchedfile[$i[$e]]."<br />";
	$e++;
}

$moviesline = $original1;
$seriesline = $original2;
$cartoonsline = $original3;
$animesline = $original4;
$videosline = $original5;

echo '<br />';

echo '<b>'.$wtxt5.': '.$bluespan.$videosnumb.$spanc.'</b><br />';

$a = 0;
$a2 = $videosnumb;
$e = 0;
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
	echo $watchedfile[$i[$e]]."<br />";
	$e++;
}

$moviesline = $original1;
$seriesline = $original2;
$cartoonsline = $original3;
$animesline = $original4;
$videosline = $original5;

?>