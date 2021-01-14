<?php 

if ($thingsidofake == true) {
	$spanstyle = $blackspan;
	$hover_text_color = $text_hover_white_css_class;
	$number_text_color = $first_text_color;
}

if ($thingsidofake == null) {
	$spanstyle = $whitespan;
	$hover_text_color = $text_hover_white_css_class;
	$number_text_color = $first_text_color;
}

if ($mobile_version == true) {
	$margindivstyle = '<div>';
	$mobileaname = '_Mobile';
}

if ($mobile_version == false) {
	$margindivstyle = '<div style="margin-left:30px;">';
	$mobileaname = '';
}

$i = 0;
while ($i <= 4) {
	if ($media_type_text_file_lines_array[$i] == 'X' and $i == 0) {
		$has_media_array[$i] = $hasanimemedia = false;
	}

	if ($media_type_text_file_lines_array[$i] != 'X' and $i == 0) {
		$has_media_array[$i] = $hasanimemedia = true;
	}

	if ($media_type_text_file_lines_array[$i] == 'X' and $i == 1) {
		$has_media_array[$i] = $hascartoonmedia = false;
	}

	if ($media_type_text_file_lines_array[$i] != 'X' and $i == 1) {
		$has_media_array[$i] = $hascartoonmedia = true;
	}

	if ($media_type_text_file_lines_array[$i] == 'X' and $i == 2) {
		$has_media_array[$i] = $hasseriesmedia = false;
	}

	if ($media_type_text_file_lines_array[$i] != 'X' and $i == 2) {
		$has_media_array[$i] = $hasseriesmedia = true;
	}

	if ($media_type_text_file_lines_array[$i] == 'X' and $i == 3) {
		$has_media_array[$i] = $hasmoviemedia = false;
	}

	if ($media_type_text_file_lines_array[$i] != 'X' and $i == 3) {
		$has_media_array[$i] = $hasmoviemedia = true;
	}

	if ($media_type_text_file_lines_array[$i] == 'X' and $i == 4) {
		$has_media_array[$i] = $hasvideomedia = false;
	}

	if ($media_type_text_file_lines_array[$i] != 'X' and $i == 4) {
		$has_media_array[$i] = $hasvideomedia = true;
	}

    $i++;
}

$done_media_array = array(
false,
false,
false,
false,
false,
);

$mediacodes = array(
$animes_code_number = 0,
$cartoons_code_number = 1,
$series_code_number = 2,
$movies_code_number = 3,
$videos_code_number = 4,
);

$mediatitles = array(
'<b>'.$spanstyle.$media_names_array[$animes_code_number].'s'.': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$animes_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_names_array[$cartoons_code_number].'s'.': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$cartoons_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_names_array[$series_code_number].': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$series_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_names_array[$movies_code_number].'s'.': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$movies_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_names_array[$videos_code_number].'s'.': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$videos_code_number].$spanc.'</b>'.'<br />'."\n",
);

$hasanime = true;
$hascartoon = true;
$hasseries = true;
$hasmovie = true;
$hasvideo = true;

if ($website_watch_history_new_watched_style_setting == true) {
	$i = 0;
	if ($hasanimemedia == true) {
		echo '<a href="#'.$media_names_array[$animes_code_number].'s_'.$current_year.$mobileaname.'">'.$mediatitles[$animes_code_number].'</a>'."\n";
	}

	$i++;
	if ($hascartoonmedia == true) {
		echo '<a href="#'.$media_names_array[$cartoons_code_number].'s_'.$current_year.$mobileaname.'">'.$mediatitles[$cartoons_code_number].'</a>'."\n";
	}

	$i++;
	if ($hasseriesmedia == true) {
		echo '<a href="#'.$media_names_array[$series_code_number].'_'.$current_year.$mobileaname.'">'.$mediatitles[$series_code_number].'</a>'."\n";
	}

	$i++;
	if ($hasmoviemedia == true) {
		echo '<a href="#'.$media_names_array[$movies_code_number].'s_'.$current_year.$mobileaname.'">'.$mediatitles[$movies_code_number].'</a>'."\n";
	}

	$i++;
	if ($hasvideomedia == true) {
		echo '<a href="#'.$media_names_array[$videos_code_number].'s_'.$current_year.$mobileaname.'">'.$mediatitles[$videos_code_number].'</a>'."\n";
	}

	echo '<br />'."\n";
}

$i = 0;
$c = 0;
$number = 1;
$overall_number = 0;
while ($overall_number <= 4) {
	$i = 0;
	$c = 0;
	$number = 1;

	while ($i <= $current_year_watched_number) {
		$i2 = $i + 1;

		$a = 0;
		while ($a <= 5) {
			$current_year_watched_episodes_text[$i] = $current_year_watched_episodes_text[$i];
			$text_to_find = "/(".$rewatched_text_enus." ".$a."x - ".$rewatched_text_ptbr." ".$a."x)/i";

			$current_year_watched_episodes_text[$i] = preg_replace($text_to_find, $rewatched_text." ".$a."x", $current_year_watched_episodes_text[$i]);

			$a++;
		}

		#echo $current_year_watched_media_type_text[$i]. " ", $media_names_array[$series_code_number]."<br />";

		if ($website_watch_history_new_watched_style_setting == true) {
			# New style of showing Watched Medias
			if ($has_media_array[$animes_code_number] == true and $done_media_array[$animes_code_number] == false) {
				if ($current_year_watched_media_type_text[$i] == $media_names_array[$animes_code_number]) {
					if ($i == $media_type_text_file_lines_array[$animes_code_number]) {
						echo '<a name="'.$media_names_array[$animes_code_number].'s_'.$current_year.$mobileaname.'"></a>'."\n";
						echo $mediatitles[$animes_code_number];
					}

					echo $margindivstyle."\n";
					echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					echo $div_close."\n";

					$number++;
					$c++;
				}
			}

			if ($has_media_array[$cartoons_code_number] == true and $done_media_array[$cartoons_code_number] == false and $done_media_array[$animes_code_number] == true) {
				if ($current_year_watched_media_type_text[$i] == $media_names_array[$cartoons_code_number]) {
					if ($i == $media_type_text_file_lines_array[$cartoons_code_number]) {
						echo '<a name="'.$media_names_array[$cartoons_code_number].'s_'.$current_year.$mobileaname.'"></a>'."\n";
						echo $mediatitles[$cartoons_code_number];
					}

					echo $margindivstyle."\n";
					echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					echo $div_close."\n";

					$number++;
					$c++;
				}
			}

			if ($has_media_array[$series_code_number] == true and $done_media_array[$series_code_number] == false and $done_media_array[$animes_code_number] == true and $done_media_array[$cartoons_code_number] == true) {
				if ($current_year_watched_media_type_text[$i] == $media_names_array[$series_code_number]) {
					if ($i == $media_type_text_file_lines_array[$series_code_number]) {
						echo '<a name="'.$media_names_array[$series_code_number].'_'.$current_year.$mobileaname.'"></a>'."\n";
						echo $mediatitles[$series_code_number];
					}

					echo $margindivstyle."\n";
					echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					echo $div_close."\n";

					$number++;
					$c++;
				}
			}

			if ($has_media_array[$movies_code_number] == true and $done_media_array[$movies_code_number] == false and $done_media_array[$series_code_number] == true and $done_media_array[$cartoons_code_number] == true and $done_media_array[$animes_code_number] == true and $done_media_array[$videos_code_number] == false) {
				if ($current_year_watched_media_type_text[$i] == $media_names_array[$movies_code_number]) {
					if ($i == $media_type_text_file_lines_array[$movies_code_number]) {
						echo '<a name="'.$media_names_array[$movies_code_number].'s_'.$current_year.$mobileaname.'"></a>'."\n";
						echo $mediatitles[$movies_code_number];
					}

					echo $margindivstyle."\n";
					echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					echo $div_close."\n";

					$number++;
					$c++;
				}
			}

			if ($has_media_array[$videos_code_number] == true and $done_media_array[$videos_code_number] == false and $done_media_array[$movies_code_number] == true and $done_media_array[$series_code_number] == true and $done_media_array[$cartoons_code_number] == true and $done_media_array[$animes_code_number] == true) {
				if ($current_year_watched_media_type_text[$i] == $media_names_array[$videos_code_number]) {
					if ($i == $media_type_text_file_lines_array[$videos_code_number]) {
						echo '<a name="'.$media_names_array[$videos_code_number].'s_'.$current_year.$mobileaname.'"></a>'."\n";
						echo $mediatitles[$videos_code_number];
					}

					echo $margindivstyle."\n";
					echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					echo $div_close."\n";

					$number++;
					$c++;
				}
			}

			#if ($i == $current_year_watched_number_file) {
			#	echo '<br />'."\n";
			#}
		}

		else {
			#Old style of showing Watched Medias
			echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$i2." - (".$current_year_watched_media_type_text[$i].") - </span>".$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
		}

		$i++;
	}

	echo "<br />"."\n";

	if ($overall_number == 0) {
		$done_media_array[$animes_code_number] = true;
	}

	if ($overall_number == 1) {
		$done_media_array[$cartoons_code_number] = true;
	}

	if ($overall_number == 2) {
		$done_media_array[$series_code_number] = true;
	}

	if ($overall_number == 3) {
		$done_media_array[$movies_code_number] = true;
	}

	if ($overall_number == 4) {
		$done_media_array[$videos_code_number] = true;
	}

	$overall_number++;
}

?>