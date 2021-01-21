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

/*
$media_array_year = 2018;
include $mediaarraygenerator;

$watchmedias2018 = True;
$a2018text = True;
$a2019text = false;
#MediaReader imported from 2018.php (MediaReader 2018.php)
include $mediareader2018;
*/

$selected_year = 2018;
$current_year = $selected_year;

# Current Year Watched Media Generator file includer
$mobile_version = False;
echo $computer_div;
$current_year_watched_number = ${"watched_episodes_".$current_year."_line_number"} - 1;
$current_year_watched_episodes_text = ${"year_".$current_year."_watched_episodes_text"};
$current_year_watched_time_text = ${"year_".$current_year."_watched_time_text"};
$current_year_watched_media_type_text =  ${"year_".$current_year."_watched_media_type_text"};
$media_type_text_file_lines_array = $media_type_text_file_lines_arrays[$current_year];
$watched_media_numbers_current_year = ${"watched_media_numbers_".$current_year};

require $current_year_watched_media_generator;
echo $div_close;

# Current Year Watched Media Generator file includer
$mobile_version = True;
echo $mobile_div;
require $current_year_watched_media_generator;
echo $div_close;

echo '</'.$m.'>'."\n";

$current_year = $current_year_backup;

#Old style of reading 2019 medias, created on Watch History.php
#$i = 0;
#$a = 0;
#while ($i <= $watched_number_2018) {
#	$i2 = $i + 1;
#	if (in_array($i, $watched_number_2018array)) {
#		if (in_array($i, $watched_number_2018timearray)) {
#			echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".$watched2018mediatypetxt[$i]." - </span>".$watched2018txt[$i].' - <span class="w3-text-white">'.$watched2018time[$a].'</span></span>'.$div_close."\n";
#			$a++;
#		}
#
#		if (!in_array($i, $watched_number_2018timearray)) {
#			echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".$watched2018mediatypetxt[$i]." - </span>".$watched2018txt[$i].' - <span class="w3-text-white">'.$notimetxt.'</span></span>'.$div_close."\n";
#		}
#	}
#
#	if (in_array($i, $watchedmovie2018numbarray)) {
#		if (in_array($i, $watched_number_2018timearray)) {
#			echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$moviestxt.') - </span>'.$watched2018txt[$i].' - <span class="w3-text-white">'.$watched2018time[$a].'</span></span>'.$div_close."\n";
#			$a++;
#		}
#	
#		if (!in_array($i, $watched_number_2018timearray)) {
#			echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$moviestxt.') - </span>'.$watched2018txt[$i].' - <span class="w3-text-white">'.$notimetxt.'</span></span>'.$div_close."\n";
#		}
#	}
#
#    $i++;
#}

?>