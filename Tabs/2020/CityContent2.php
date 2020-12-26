<?php 

$a = 0;
$a2 = $watched_movies_number;
$e = 0;
$line = $media_type_movies_line;
$i = array();

if ($a == 0) {
	$i[$a] = $line;
}

while ($a < $a2) {
	$i[$a] = $media_type_movies_line++;
	$a++;
}

while ($e < $watched_movies_number) {
	echo $watchedfile[$i[$e]]."<br />";
	$e++;
}

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

echo '<br />';

echo '<b>'.$wtxt2.': '.$bluespan.$watched_series_number.$spanc.'</b><br />';

$a = 0;
$a2 = $watched_series_number;
$e = 0;
$line = $media_type_series_line;
$i = array();

if ($a == 0) {
	$i[$a] = $line;
}

while ($a < $a2) {
	$i[$a] = $media_type_series_line++;
	$a++;
}

while ($e < $watched_series_number) {
	echo $watchedfile[$i[$e]]."<br />";
	$e++;
}

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

echo '<br />';

echo '<b>'.$wtxt3.': '.$bluespan.$watched_cartoons_number.$spanc.'</b><br />';

$a = 0;
$a2 = $watched_cartoons_number;
$e = 0;
$line = $media_type_cartoons_line;
$i = array();

if ($a == 0) {
	$i[$a] = $line;
}

while ($a < $a2) {
	$i[$a] = $media_type_cartoons_line++;
	$a++;
}

while ($e < $watched_cartoons_number) {
	echo $watchedfile[$i[$e]]."<br />";
	$e++;
}

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

echo '<br />';

echo '<b>'.$wtxt4.': '.$bluespan.$watched_animes_number.$spanc.'</b><br />';

$a = 0;
$a2 = $watched_animes_number;
$e = 0;
$line = $media_type_animes_line;
$i = array();

if ($a == 0) {
	$i[$a] = $line;
}

while ($a < $a2) {
	$i[$a] = $media_type_animes_line++;
	$a++;
}

while ($e < $watched_animes_number) {
	echo $watchedfile[$i[$e]]."<br />";
	$e++;
}

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

echo '<br />';

echo '<b>'.$wtxt5.': '.$bluespan.$watched_videos_number.$spanc.'</b><br />';

$a = 0;
$a2 = $watched_videos_number;
$e = 0;
$line = $media_type_videos_line;
$i = array();

if ($a == 0) {
	$i[$a] = $line;
}

while ($a < $a2) {
	$i[$a] = $media_type_videos_line++;
	$a++;
}

while ($e < $watched_videos_number) {
	echo $watchedfile[$i[$e]]."<br />";
	$e++;
}

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

?>