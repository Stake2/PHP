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

echo '<hr class="'.$header_full_border.'" />'."\n";
echo '<'.$m.' class="'.$number_text_color.'" style="text-align:left;">'."\n";

include $mediaarraygenerator;

$watchmedias2019 = True;
$a2018text = false;
$a2019text = True;
#MediaReader imported from 2019.php (MediaReader 2019.php)
include $mediareader2019;

echo '</'.$m.'>'."\n";

#Old style of reading 2019 medias, created on Watch History.php
#$i = 0;
#$a = 0;
#
#while ($i <= $watched_number_2019) {
#	$i2 = $i + 1;
#	if (in_array($i, $watchedmovie2019numbarray)) {
#		echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2.' - ('.$moviestxt.') - </span>'.$watched2019txt[$i].'- <span class="w3-text-white">'.$watched2019time[$a].'</span></span>'.$div_close.''."\n";
#		$a++;
#	}
#
#	if (!in_array($i, $watchedmovie2019numbarray)) {
#		echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2.' - '.$watched2019mediatypetxt[$i]." - </span>".$watched2019txt[$i].'- <span class="w3-text-white">'.$watched2019time[$a].'</span></span>'.$div_close.''."\n";
#		$a++;
#	}
#    $i++;
#}

?>