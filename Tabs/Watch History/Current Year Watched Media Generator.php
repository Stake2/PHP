<?php 

if ($thingsidofake == True) {
	$spanstyle = $blackspan;
	$hover_text_color = $text_hover_white_css_class;
	$number_text_color = $first_text_color;
}

if ($thingsidofake == null) {
	$spanstyle = $whitespan;
	$hover_text_color = $text_hover_white_css_class;
	$number_text_color = $first_text_color;
}

if ($mobile_version == True) {
	$margindivstyle = '<div>';
	$mobileaname = '_Mobile';
}

if ($mobile_version == False) {
	$margindivstyle = '<div style="margin-left:30px;">';
	$mobileaname = '';
}

if (isset($run_as_module) == True) {
	if ($run_as_module == True) {
		$local_current_year = $module_current_year;
		$current_year_watched_episodes_text = ${"year_".$local_current_year."_watched_episodes_text"};
		$current_year_watched_media_type_text = ${"year_".$local_current_year."_watched_media_type_text"};
		$current_year_watched_time_text = ${"year_".$local_current_year."_watched_time_text"};
		$current_year_watched_number = ${"watched_episodes_".$local_current_year."_line_number"} - 1;
		$media_type_text_file_lines_array = ${"media_type_text_file_lines_array_".$local_current_year};
		$watched_media_numbers_current_year = ${"watched_media_numbers_".$local_current_year};
	}
}

# Used per media type reader

$i = 0;
while ($i <= 4) {
	if ($media_type_text_file_lines_array[$i] == 'X' and $i == 0) {
		$has_media_array[$i] = $hasanimemedia = False;
	}

	if ($media_type_text_file_lines_array[$i] != 'X' and $i == 0) {
		$has_media_array[$i] = $hasanimemedia = True;
	}

	if ($media_type_text_file_lines_array[$i] == 'X' and $i == 1) {
		$has_media_array[$i] = $hascartoonmedia = False;
	}

	if ($media_type_text_file_lines_array[$i] != 'X' and $i == 1) {
		$has_media_array[$i] = $hascartoonmedia = True;
	}

	if ($media_type_text_file_lines_array[$i] == 'X' and $i == 2) {
		$has_media_array[$i] = $hasseriesmedia = False;
	}

	if ($media_type_text_file_lines_array[$i] != 'X' and $i == 2) {
		$has_media_array[$i] = $hasseriesmedia = True;
	}

	if ($media_type_text_file_lines_array[$i] == 'X' and $i == 3) {
		$has_media_array[$i] = $hasmoviemedia = False;
	}

	if ($media_type_text_file_lines_array[$i] != 'X' and $i == 3) {
		$has_media_array[$i] = $hasmoviemedia = True;
	}

	if ($media_type_text_file_lines_array[$i] == 'X' and $i == 4) {
		$has_media_array[$i] = $hasvideomedia = False;
	}

	if ($media_type_text_file_lines_array[$i] != 'X' and $i == 4) {
		$has_media_array[$i] = $hasvideomedia = True;
	}

    $i++;
}

$done_media_array = array(
False,
False,
False,
False,
False,
);

$mediacodes = array(
$animes_code_number = 0,
$cartoons_code_number = 1,
$series_code_number = 2,
$movies_code_number = 3,
$videos_code_number = 4,
);

$mediatitles = array(
'<b>'.$spanstyle.$media_types_plural[$animes_code_number].': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$animes_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_types_plural[$cartoons_code_number].': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$cartoons_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_types_plural[$series_code_number].': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$series_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_types_plural[$movies_code_number].': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$movies_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_types_plural[$videos_code_number].': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$videos_code_number].$spanc.'</b>'.'<br />'."\n",
);

$hasanime = True;
$hascartoon = True;
$hasseries = True;
$hasmovie = True;
$hasvideo = True;

if ($website_watch_history_new_watched_style_setting == True) {
	$i = 0;
	if ($hasanimemedia == True) {
		echo '<a href="#'.$media_types_plural[$animes_code_number].'_'.$local_current_year.$mobileaname.'">'.$mediatitles[$animes_code_number].'</a>'."\n";
	}

	$i++;
	if ($hascartoonmedia == True) {
		echo '<a href="#'.$media_types_plural[$cartoons_code_number].'_'.$local_current_year.$mobileaname.'">'.$mediatitles[$cartoons_code_number].'</a>'."\n";
	}

	$i++;
	if ($hasseriesmedia == True) {
		echo '<a href="#'.$media_types_plural[$series_code_number].'_'.$local_current_year.$mobileaname.'">'.$mediatitles[$series_code_number].'</a>'."\n";
	}

	$i++;
	if ($hasmoviemedia == True) {
		echo '<a href="#'.$media_types_plural[$movies_code_number].'_'.$local_current_year.$mobileaname.'">'.$mediatitles[$movies_code_number].'</a>'."\n";
	}

	$i++;
	if ($hasvideomedia == True) {
		echo '<a href="#'.$media_types_plural[$videos_code_number].'_'.$local_current_year.$mobileaname.'">'.$mediatitles[$videos_code_number].'</a>'."\n";
	}

	echo '<br />'."\n";
}

$empty_watched_time_text = " ";

$i = 0;
$c = 0;
$number = 1;
$overall_number = 0;
${"time_".$local_current_year} = 0;
while ($overall_number <= 4) {
	$i = 0;
	$c = 0;
	$number = 1;

	while ($i <= $current_year_watched_number) {
		$i2 = $i + 1;

		$a = 0;
		while ($a <= 5) {
			$current_year_watched_episodes_text[$i] = $current_year_watched_episodes_text[$i];

			if (in_array($website_language, $en_languages_array)) {
				$current_year_watched_episodes_text[$i] = str_replace("Dublado", "Dubbed", $current_year_watched_episodes_text[$i]);
			}

			if (in_array($website_language, $pt_languages_array)) {
				$current_year_watched_episodes_text[$i] = str_replace("Season", "Temporada", $current_year_watched_episodes_text[$i]);
				$current_year_watched_episodes_text[$i] = str_replace("2nd", "Segunda", $current_year_watched_episodes_text[$i]);
				$current_year_watched_episodes_text[$i] = str_replace("S0", "T0", $current_year_watched_episodes_text[$i]);
			}

			$text_to_find = "/(".$rewatched_text_enus." ".$a."x - ".$rewatched_text_ptbr." ".$a."x)/i";

			$current_year_watched_episodes_text[$i] = preg_replace($text_to_find, $rewatched_text." ".$a."x", $current_year_watched_episodes_text[$i]);

			$a++;
		}

		if ($website_watch_history_new_watched_style_setting == True) {
			# New style of showing Watched Medias

			$media_type = $current_year_watched_media_type_text[$i];

			if ($has_media_array[$animes_code_number] == True and $done_media_array[$animes_code_number] == False) {
				if ($media_type == $media_types_plural[$animes_code_number]) {
					if ($i == $media_type_text_file_lines_array[$animes_code_number]) {
						echo '<a name="'.$media_types_plural[$animes_code_number].'_'.$local_current_year.$mobileaname.'"></a>'."\n";
						echo $mediatitles[$animes_code_number];
					}

					echo $margindivstyle."\n";

					if ($local_current_year != $current_year_backup) {
						if ($current_year_watched_time_text[$i] != $empty_watched_time_text) {
							echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
						}

						if ($current_year_watched_time_text[$i] == $empty_watched_time_text) {
							echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$unknown_watched_time_text.')</span></span><br />'.$div_close."\n";
						}
					}

					else {
						echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					}

					echo $div_close."\n";

					$number++;
					$c++;
				}
			}

			if ($has_media_array[$cartoons_code_number] == True and $done_media_array[$cartoons_code_number] == False and $done_media_array[$animes_code_number] == True) {
				if ($media_type == $media_types_plural[$cartoons_code_number]) {
					if ($i == $media_type_text_file_lines_array[$cartoons_code_number]) {
						echo '<a name="'.$media_types_plural[$cartoons_code_number].'_'.$local_current_year.$mobileaname.'"></a>'."\n";
						echo $mediatitles[$cartoons_code_number];
					}

					echo $margindivstyle."\n";

					if ($local_current_year != $current_year_backup) {
						if ($current_year_watched_time_text[$i] != $empty_watched_time_text) {
							echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
						}

						if ($current_year_watched_time_text[$i] == $empty_watched_time_text) {
							echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$unknown_watched_time_text.')</span></span><br />'.$div_close."\n";
						}
					}

					else {
						echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					}

					echo $div_close."\n";

					$number++;
					$c++;
				}
			}

			if ($has_media_array[$series_code_number] == True and $done_media_array[$series_code_number] == False and $done_media_array[$animes_code_number] == True and $done_media_array[$cartoons_code_number] == True) {
				if ($media_type == $media_types_plural[$series_code_number]) {
					if ($i == $media_type_text_file_lines_array[$series_code_number]) {
						echo '<a name="'.$media_types_plural[$series_code_number].'_'.$local_current_year.$mobileaname.'"></a>'."\n";
						echo $mediatitles[$series_code_number];
					}

					echo $margindivstyle."\n";

					if ($local_current_year != $current_year_backup) {
						if ($current_year_watched_time_text[$i] != $empty_watched_time_text) {
							echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
						}

						if ($current_year_watched_time_text[$i] == $empty_watched_time_text) {
							echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$unknown_watched_time_text.')</span></span><br />'.$div_close."\n";
						}
					}

					else {
						echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					}

					echo $div_close."\n";

					$number++;
					$c++;
				}
			}

			if ($has_media_array[$movies_code_number] == True and $done_media_array[$movies_code_number] == False and $done_media_array[$series_code_number] == True and $done_media_array[$cartoons_code_number] == True and $done_media_array[$animes_code_number] == True and $done_media_array[$videos_code_number] == False) {
				if ($media_type == $media_types_plural[$movies_code_number]) {
					if ($i == $media_type_text_file_lines_array[$movies_code_number]) {
						echo '<a name="'.$media_types_plural[$movies_code_number].'_'.$local_current_year.$mobileaname.'"></a>'."\n";
						echo $mediatitles[$movies_code_number];
					}

					echo $margindivstyle."\n";

					if ($local_current_year != $current_year_backup) {
						if ($current_year_watched_time_text[$i] != $empty_watched_time_text) {
							echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
						}

						if ($current_year_watched_time_text[$i] == $empty_watched_time_text) {
							echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$unknown_watched_time_text.')</span></span><br />'.$div_close."\n";
						}
					}

					else {
						echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					}

					echo $div_close."\n";

					$number++;
					$c++;
				}
			}

			if ($has_media_array[$videos_code_number] == True and $done_media_array[$videos_code_number] == False and $done_media_array[$movies_code_number] == True and $done_media_array[$series_code_number] == True and $done_media_array[$cartoons_code_number] == True and $done_media_array[$animes_code_number] == True) {
				if ($media_type == $media_types_plural[$videos_code_number]) {
					if ($i == $media_type_text_file_lines_array[$videos_code_number]) {
						echo '<a name="'.$media_types_plural[$videos_code_number].'_'.$local_current_year.$mobileaname.'"></a>'."\n";
						echo $mediatitles[$videos_code_number];
					}

					echo $margindivstyle."\n";

					if ($local_current_year != $current_year_backup) {
						if ($current_year_watched_time_text[$i] != $empty_watched_time_text) {
							echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
						}

						if ($current_year_watched_time_text[$i] == $empty_watched_time_text) {
							echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$unknown_watched_time_text.')</span></span><br />'.$div_close."\n";
						}
					}

					else {
						echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					}

					echo $div_close."\n";

					$number++;
					$c++;
				}
			}
		}

		else {
			#Old style of showing Watched Medias
			echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$i2." - (".$current_year_watched_media_type_text[$i].") - </span>".$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
		}

		$i++;
	}

	echo "<br />"."\n";

	if ($overall_number == 0) {
		$done_media_array[$animes_code_number] = True;
	}

	if ($overall_number == 1) {
		$done_media_array[$cartoons_code_number] = True;
	}

	if ($overall_number == 2) {
		$done_media_array[$series_code_number] = True;
	}

	if ($overall_number == 3) {
		$done_media_array[$movies_code_number] = True;
	}

	if ($overall_number == 4) {
		$done_media_array[$videos_code_number] = True;
	}

	$overall_number++;
}

?>