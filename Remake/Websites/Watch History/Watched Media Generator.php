<?php 

if (isset($return_string) == False) {
	$return_string = False;
}

$spanstyle = $whitespan;
$hover_text_color = $text_hover_white_css_class;
$number_text_color = $first_text_color;

$margin_div_style = '<div style="margin-left: 30px;">';
$mobile_a_name = "";

if ($mobile_version == True) {
	$margin_div_style = "<div>";
	$mobile_a_name = "_Mobile";
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
	if ($media_type_text_file_lines_array[$i] == "X" and $i == 0) {
		$has_media["Animes"] = False;
	}

	if ($media_type_text_file_lines_array[$i] != "X" and $i == 0) {
		$has_media["Animes"] = True;
	}

	if ($media_type_text_file_lines_array[$i] == "X" and $i == 1) {
		$has_media["Cartoons"] = False;
	}

	if ($media_type_text_file_lines_array[$i] != "X" and $i == 1) {
		$has_media["Cartoons"] = True;
	}

	if ($media_type_text_file_lines_array[$i] == "X" and $i == 2) {
		$has_media["Series"] = False;
	}

	if ($media_type_text_file_lines_array[$i] != "X" and $i == 2) {
		$has_media["Series"] = True;
	}

	if ($media_type_text_file_lines_array[$i] == "X" and $i == 3) {
		$has_media["Movies"] = False;
	}

	if ($media_type_text_file_lines_array[$i] != "X" and $i == 3) {
		$has_media["Movies"] = True;
	}

	if ($media_type_text_file_lines_array[$i] == "X" and $i == 4) {
		$has_media["Videos"] = False;
	}

	if ($media_type_text_file_lines_array[$i] != "X" and $i == 4) {
		$has_media["Videos"] = $hasvideomedia = True;
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

$has_margin = array(
	False,
	False,
	False,
	False,
	False,
);

$animes_code_number = 0;
$cartoons_code_number = 1;
$series_code_number = 2;
$movies_code_number = 3;
$videos_code_number = 4;

$media_type_titles = array(
'<b>'.$spanstyle.$media_types_plural[$animes_code_number].': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$animes_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_types_plural[$cartoons_code_number].': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$cartoons_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_types_plural[$series_code_number].': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$series_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_types_plural[$movies_code_number].': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$movies_code_number].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$media_types_plural[$videos_code_number].': '.$spanc.'<span class="'.$number_text_color.'">'.$watched_media_numbers_current_year[$videos_code_number].$spanc.'</b>'.'<br />'."\n",
);

$full_string = "";

$i = 0;
while ($i <= 4) {
	$local_has_media = array_values($has_media)[$i];

	if ($local_has_media == True) {
		$string = '<a href="#'.$media_types_plural[$i].'_'.$local_current_year.$mobile_a_name.'">'.$media_type_titles[$i].'</a>'."\n";

		if ($return_string == False) {
			echo $string;
		}

		$full_string .= $string;
	}

	if ($local_has_media == False) {
		$done_media_array[$i] = True;
	}

	$i++;
}

$string = '<br />'."\n";

if ($return_string == False) {
	echo $string;
}

$full_string .= $string;

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

		$current_year_watched_episodes_text[$i] = $current_year_watched_episodes_text[$i];

		if (in_array($website_information["language"], $en_languages_array)) {
			$current_year_watched_episodes_text[$i] = str_replace("Dublado", "Portuguese Dub", $current_year_watched_episodes_text[$i]);
			$current_year_watched_episodes_text[$i] = str_replace("Deixe Sua Marca", "Make Your Mark", $current_year_watched_episodes_text[$i]);
		}

		if (in_array($website_information["language"], $pt_languages_array)) {
			$current_year_watched_episodes_text[$i] = str_replace("Season", "Temporada", $current_year_watched_episodes_text[$i]);
			$current_year_watched_episodes_text[$i] = str_replace("2nd", "Segunda", $current_year_watched_episodes_text[$i]);
			$current_year_watched_episodes_text[$i] = str_replace("Second", "Segunda", $current_year_watched_episodes_text[$i]);
			$current_year_watched_episodes_text[$i] = str_replace("3rd", "Terceira", $current_year_watched_episodes_text[$i]);
			$current_year_watched_episodes_text[$i] = str_replace("Third", "Terceira", $current_year_watched_episodes_text[$i]);
			$current_year_watched_episodes_text[$i] = str_replace("S0", "T0", $current_year_watched_episodes_text[$i]);
			$current_year_watched_episodes_text[$i] = str_replace("S0", "T0", $current_year_watched_episodes_text[$i]);
			$current_year_watched_episodes_text[$i] = str_replace("Friendship Is Magic", "A Amizade É Mágica", $current_year_watched_episodes_text[$i]);

			if (strstr($current_year_watched_episodes_text[$i], "Round 6 (Squid Game)") == False) {
				$current_year_watched_episodes_text[$i] = str_replace("Squid Game", "Round 6 (Squid Game)", $current_year_watched_episodes_text[$i]);
			}

			$current_year_watched_episodes_text[$i] = str_replace("Make Your Mark", "Deixe Sua Marca", $current_year_watched_episodes_text[$i]);
			$current_year_watched_episodes_text[$i] = str_replace("Chapter 1", "Capítulo 1", $current_year_watched_episodes_text[$i]);
			$current_year_watched_episodes_text[$i] = str_replace("Chapter 2", "Capítulo 2", $current_year_watched_episodes_text[$i]);
			$current_year_watched_episodes_text[$i] = str_replace("Chapter 3", "Capítulo 3", $current_year_watched_episodes_text[$i]);
		}

		$a = 0;
		while ($a <= 5) {
			$text_to_find = "/(".$rewatched_text_en." ".$a."x - ".$rewatched_text_pt." ".$a."x)/i";

			$current_year_watched_episodes_text[$i] = preg_replace($text_to_find, $rewatched_text." ".$a."x", $current_year_watched_episodes_text[$i]);

			$a++;
		}

		# New style of showing Watched Media

		$media_type = $current_year_watched_media_type_text[$i];

		if ($has_media["Animes"] == True and $done_media_array[$animes_code_number] == False) {
			if ($media_type == $mixed_media_type_names_plural_without_null[$animes_code_number]) {
				if ($i == $media_type_text_file_lines_array[$animes_code_number]) {
					$string = '<a name="'.$media_types_plural[$animes_code_number].'_'.$local_current_year.$mobile_a_name.'"></a>'."\n".
					$media_type_titles[$animes_code_number]."\n".$margin_div_style."\n";

					if ($return_string == False) {
						echo $string;
					}

					$full_string .= $string;

					$has_margin[$overall_number] = True;
				}

				if ($local_current_year != $current_year_backup) {
					if ($current_year_watched_time_text[$i] != $empty_watched_time_text) {
						$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					}

					if ($current_year_watched_time_text[$i] == $empty_watched_time_text) {
						$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$unknown_watched_time_text.')</span></span><br />'.$div_close."\n";
					}
				}

				else {
					$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
				}

				$full_string .= $string;

				if ($return_string == False) {
					echo $string;
				}

				$number++;
				$c++;

				$has_medias = True;
			}
		}

		if ($has_media["Cartoons"] == True and $done_media_array[$cartoons_code_number] == False and $done_media_array[$animes_code_number] == True) {
			if ($media_type == $mixed_media_type_names_plural_without_null[$cartoons_code_number]) {
				if ($i == $media_type_text_file_lines_array[$cartoons_code_number]) {
					$string = '<a name="'.$media_types_plural[$cartoons_code_number].'_'.$local_current_year.$mobile_a_name.'"></a>'."\n".
					$media_type_titles[$cartoons_code_number]."\n".$margin_div_style."\n";

					if ($return_string == False) {
						echo $string;
					}

					$full_string .= $string;

					$has_margin[$overall_number] = True;
				}

				if ($local_current_year != $current_year_backup) {
					if ($current_year_watched_time_text[$i] != $empty_watched_time_text) {
						$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					}

					if ($current_year_watched_time_text[$i] == $empty_watched_time_text) {
						$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$unknown_watched_time_text.')</span></span><br />'.$div_close."\n";
					}
				}

				else {
					$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
				}

				$full_string .= $string;

				if ($return_string == False) {
					echo $string;
				}

				$number++;
				$c++;

				$has_medias = True;
			}
		}

		if ($has_media["Series"] == True and $done_media_array[$series_code_number] == False and $done_media_array[$animes_code_number] == True and $done_media_array[$cartoons_code_number] == True) {
			if ($media_type == $mixed_media_type_names_plural_without_null[$series_code_number]) {
				if ($i == $media_type_text_file_lines_array[$series_code_number]) {
					$string = '<a name="'.$media_types_plural[$series_code_number].'_'.$local_current_year.$mobile_a_name.'"></a>'."\n".
					$media_type_titles[$series_code_number]."\n".$margin_div_style."\n";

					if ($return_string == False) {
						echo $string;
					}

					$full_string .= $string;

					$has_margin[$overall_number] = True;
				}

				if ($local_current_year != $current_year_backup) {
					if ($current_year_watched_time_text[$i] != $empty_watched_time_text) {
						$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					}

					if ($current_year_watched_time_text[$i] == $empty_watched_time_text) {
						$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$unknown_watched_time_text.')</span></span><br />'.$div_close."\n";
					}
				}

				else {
					$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
				}

				$full_string .= $string;

				if ($return_string == False) {
					echo $string;
				}

				$number++;
				$c++;

				$has_medias = True;
			}
		}

		if ($has_media["Movies"] == True and $done_media_array[$movies_code_number] == False and $done_media_array[$series_code_number] == True and $done_media_array[$cartoons_code_number] == True and $done_media_array[$animes_code_number] == True and $done_media_array[$videos_code_number] == False) {
			if ($media_type == $mixed_media_type_names_plural_without_null[$movies_code_number]) {
				if ($i == $media_type_text_file_lines_array[$movies_code_number]) {
					$string = '<a name="'.$media_types_plural[$movies_code_number].'_'.$local_current_year.$mobile_a_name.'"></a>'."\n".
					$media_type_titles[$movies_code_number]."\n".$margin_div_style."\n";

					if ($return_string == False) {
						echo $string;
					}

					$full_string .= $string;

					$has_margin[$overall_number] = True;
				}

				if ($local_current_year != $current_year_backup) {
					if ($current_year_watched_time_text[$i] != $empty_watched_time_text) {
						$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					}

					if ($current_year_watched_time_text[$i] == $empty_watched_time_text) {
						$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$unknown_watched_time_text.')</span></span><br />'.$div_close."\n";
					}
				}

				else {
					$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
				}

				$full_string .= $string;

				if ($return_string == False) {
					echo $string;
				}

				$number++;
				$c++;

				$has_medias = True;
			}
		}

		if ($has_media["Videos"] == True and $done_media_array[$videos_code_number] == False and $done_media_array[$movies_code_number] == True and $done_media_array[$series_code_number] == True and $done_media_array[$cartoons_code_number] == True and $done_media_array[$animes_code_number] == True) {
			if ($media_type == $mixed_media_type_names_plural_without_null[$videos_code_number]) {
				if ($i == $media_type_text_file_lines_array[$videos_code_number]) {
					$string = '<a name="'.$media_types_plural[$videos_code_number].'_'.$local_current_year.$mobile_a_name.'"></a>'."\n".
					$media_type_titles[$videos_code_number]."\n".$margin_div_style."\n";

					if ($return_string == False) {
						echo $string;
					}

					$full_string .= $string;

					$has_margin[$overall_number] = True;
				}

				if ($local_current_year != $current_year_backup) {
					if ($current_year_watched_time_text[$i] != $empty_watched_time_text) {
						$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
					}

					if ($current_year_watched_time_text[$i] == $empty_watched_time_text) {
						$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$unknown_watched_time_text.')</span></span><br />'.$div_close."\n";
					}
				}

				else {
					$string = '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$current_year_watched_episodes_text[$i].$spanstyle.' - ('.$current_year_watched_time_text[$i].')</span></span><br />'.$div_close."\n";
				}

				$full_string .= $string;

				if ($return_string == False) {
					echo $string;
				}

				$number++;
				$c++;

				$has_medias = True;
			}
		}

		if ($i == $current_year_watched_number and $has_margin[$overall_number] == True) {
			$full_string .= "<br />".$div_close."\n";

			if ($return_string == False) {
				echo "<br />".$div_close."\n";
			}
		}

		$i++;
	}

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