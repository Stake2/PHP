<?php 

if ($thingsidofake == True) {
	$spanstyle = $blackspan;
	$hover_text_color = $text_hover_white_css_class;
	$number_text_color = $first_text_color;
	$number_text_color_span = '<span class="'.$number_text_color.'">';

	if ($mobileversion == True) {
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

	if ($mobileversion == True) {
		$margindivstyle = '<div>';
		$mobileaname = 'm';
	}

	if ($mobileversion == null) {
		$margindivstyle = '<div style="margin-left:30px;">';
		$mobileaname = '';
	}
}

echo $div_zoom_animation."\n";
echo '<div style="text-align:left;">'."\n";

#Media loader for 2019 using "Watched VideoTypes 2019"
#Used in the ArchivedMedias Tab on Watch History.php

#Number resetter for Watch History website
if ($website_name == $sitewatch) {
	$watched_number_ = $watched_episodes_2019_line_number;

	#Medias numbers for 2018 Medias
	$watched_movies_number = 4; 
	$watched_series_number = 9; 
	$watched_cartoons_number = 60;
	$watched_animes_number = 87;
	$watched_videos_number = 134;

	#Line number for the 2019 Watched VideoTypes.txt
	$original1 = 12;
	$original2 = 18;
	$original3 = 29;
	$original4 = 91;
	$original5 = 180;

	#Definer for the original numbers of medias
	$media_type_movies_line = $original1;
	$media_type_series_line = $original2;
	$media_type_cartoons_line = $original3;
	$media_type_animes_line = $original4;
	$media_type_videos_line = $original5;
}

if ($website_name == $sitewatch and $thingsidofake == True and $website == $sitethingsido or $website_name == $sitethingsido) {
	echo '<b>'.$blackspan.$txts[4].': '.$spanc.'</b>'.$number_text_color_span.'<b>'.$watched_number_.'</b>'.$spanc.'<br />'."\n";
}

if ($website_name == $sitewatch  and $thingsidofake == null or $thingsidofake == false and $watchmedias2019 == True) {
	echo '<b>'.$whitespan.$txts[4].': '.$spanc.'</b>'.$number_text_color_span.'<b>'.$watched_number_.'</b>'.$spanc."\n".'<br />'."\n";
}

if ($website_name != $sitewatch) {
	echo '<b>'.'<a href="'.$main_website_url.'/watch/" class="w3-text-white">'.$txts[4].'</a>'.': '.$number_text_color_span.$watched_number_.$spanc.'</b>'."\n".'<br />'."\n";
}

$a2019 = false;
$a2018text = True;
$a2019text = false;
$regeneratemedias2019 = True;
$generate2019 = false;
#YearMaker2.php reader
require $year_maker_file_php_2_test;
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
$a2 = $watched_movies_number;
$e = 0;
$e2 = 1;
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
	require $mediastyler;

	$echostyle = '<span class="'.$text_hover_white_css_class.'">'.$namespan.' - '.$watchedfile2019[$i[$e]].$spanc."<br />"."\n";
	echo $echostyle;
	$e++;
	$e2++;
}

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

echo '<br />'."\n";
#Series part
echo '<a name="'.$mediastexts[$v].'"></a>'."\n";
echo '<b>'.$medias[$v].'</b>'."\n";
$v++;

$a = 0;
$a2 = $watched_series_number;
$e = 0;
$e2 = 1;
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
	require $mediastyler;

	$echostyle = '<span class="'.$text_hover_white_css_class.'">'.$namespan.' - '.$watchedfile2019[$i[$e]].$spanc."<br />"."\n";
	echo $echostyle;
	$e++;
	$e2++;
}

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

echo '<br />'."\n";
#Cartoons part
echo '<a name="'.$mediastexts[$v].'"></a>'."\n";
echo '<b>'.$medias[$v].'</b>'."\n";
$v++;

$a = 0;
$a2 = $watched_cartoons_number;
$e = 0;
$e2 = 1;
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
	require $mediastyler;

	$echostyle = '<span class="'.$text_hover_white_css_class.'">'.$namespan.' - '.$watchedfile2019[$i[$e]].$spanc."<br />"."\n";
	echo $echostyle;
	$e++;
	$e2++;
}

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

echo '<br />'."\n";
#Animes part
echo '<a name="'.$mediastexts[$v].'"></a>'."\n";
echo '<b>'.$medias[$v].'</b>'."\n";
$v++;

$a = 0;
$a2 = $watched_animes_number;
$e = 0;
$e2 = 1;
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
	require $mediastyler;

	$echostyle = '<span class="'.$text_hover_white_css_class.'">'.$namespan.' - '.$watchedfile2019[$i[$e]].$spanc."<br />"."\n";
	echo $echostyle;
	$e++;
	$e2++;
}

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

echo '<br />'."\n";
#Videos part
echo '<a name="'.$mediastexts[$v].'"></a>'."\n";
echo '<b>'.$medias[$v].'</b>'."\n";
$v++;

$a = 0;
$a2 = $watched_videos_number;
$e = 0;
$e2 = 1;
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
	require $mediastyler;

	$echostyle = '<span class="'.$text_hover_white_css_class.'">'.$namespan.' - '.$watchedfile2019[$i[$e]].$spanc."<br />"."\n";
	echo $echostyle;
	$e++;
	$e2++;
}

echo '<br /><br /><br />';

$media_type_movies_line = $original1;
$media_type_series_line = $original2;
$media_type_cartoons_line = $original3;
$media_type_animes_line = $original4;
$media_type_videos_line = $original5;

echo $div_close."\n";
echo $div_close."\n";

?>