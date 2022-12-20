<?php 

$spanstyle = $whitespan;
$hover_text_color = $text_hover_white_css_class;
$number_text_color = $first_text_color;
$number_text_color_span = '<span class="'.$number_text_color.'">';

if ($mobile_version == True) {
	$margin_div_style = '<div>';
	$mobile_a_name = "_Mobile";
}

if ($mobile_version == Null) {
	$margin_div_style = '<div style="margin-left:30px;">';
	$mobile_a_name = "";
}

echo '<'.$h4_element.' class="'.$number_text_color.'" style="text-align:left;">'."\n";

$i = 0;
$a = 0;
$c = 0;
while ($i <= $watched_movie_names_line_number) {
	$i2 = $i + 1;

	if (in_array($i, $watched_movie_time_numbers_array)) {
		if (in_array($i, $watched_movie_comment_numbers_array)) {
			if ($i != 10) {
				#echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.$spanstyle.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].$spanstyle.' - ('.$watched_movies_time[$a].") - </span></span> ".$watched_movie_comments[$c].'<br />'.$div_close."\n";
			}

			if ($i == 10) {
				#echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.$spanstyle.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].$spanstyle.' - ('.$watched_movies_time[$a].") - </span></span> ".$watched_movie_comments[$c].$div_close."\n";
			}

			$a++;
			$c++;
		}

		if (!in_array($i, $watched_movie_comment_numbers_array)) {
			if ($i != 10) {
				#echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].'<span class="w3-text-white"> - ('.$watched_movies_time[$a].')</span></span>'.'<br />'.$div_close."\n";
			}

			if ($i == 10) {
				#echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].'<span class="w3-text-white"> - ('.$watched_movies_time[$a].')</span></span>'.$div_close."\n";
			}

			$a++;
		}
	}

	if (!in_array($i, $watched_movie_time_numbers_array)) {
		#echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].' - <span class="w3-text-white">'.$unknown_watched_time_text.'</span></span>'.$div_close.''."\n";
	}

    $i++;
}

$i = 0;
$movie_time_number = 0;
$comment_number = 0;
while ($i <= $watched_movie_names_line_number - 1) {
	$i2 = $i + 1;

	if ($i == 1) {
		echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].'<span class="w3-text-white"> - ('.$watched_movie_times_text[$movie_time_number].')</span></span> - '.$watched_movie_comments[$comment_number].$div_close."\n";

		$movie_time_number++;
		$comment_number++;
	}

	if ($i >= 4 and $i < 23) {
		if (in_array($i, $watched_movie_comment_numbers_array)) {
			echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].'<span class="w3-text-white"> - ('.$watched_movie_times_text[$movie_time_number].')</span></span> - '.$watched_movie_comments[$comment_number].$div_close."\n";

			$comment_number++;
		}

		if (!in_array($i, $watched_movie_comment_numbers_array)) {
			echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].'<span class="w3-text-white"> - ('.$watched_movie_times_text[$movie_time_number].')</span></span>'.$div_close."\n";
		}

		$movie_time_number++;
	}

	if ($i >= 23 and $i != 25 and $i != 26 and $i != 32) {
		$c = 0;
		$number_array = array();
		while ($c <= 100) {
			array_push($number_array, " (Rewatched ".$c."x - Reassistido ".$c."x)");

			$c++;
		}

		$watched_movies_comment_text[$i] = str_replace($number_array, "", $watched_movie_names_text[$i]);

		$watched_movie_comments[$watched_movie_names_text[$i]] = '<a target="_blank" href="'.$cdn_text_movie_comments.$watched_movies_comment_text[$i].'.txt'.'" class="'.$text_hover_white_css_class.'" style="cursor:pointer;"><i class="fas fa-comments"></i></a>';

		echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].'<span class="w3-text-white"> - ('.$watched_movie_times_text[$movie_time_number].')</span></span> - '.$watched_movie_comments[$watched_movie_names_text[$i]].$div_close."\n";

		$comment_number++;
		$movie_time_number++;
	}

	if ($i >= 23 and $i == 25) {
		echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].'<span class="w3-text-white"> - ('.$watched_movie_times_text[$movie_time_number].')</span></span>'.$div_close."\n";

		$movie_time_number++;
	}

	if ($i >= 23 and $i == 26) {
		echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].'<span class="w3-text-white"> - ('.$watched_movie_times_text[$movie_time_number].')</span></span>'.$div_close."\n";

		$movie_time_number++;
	}

	if ($i >= 23 and $i == 32) {
		echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].'<span class="w3-text-white"> - ('.$watched_movie_times_text[$movie_time_number].')</span></span>'.$div_close."\n";

		$movie_time_number++;
	}

	if ($i != 1 and $i < 4) {
		echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$media_type_names_portuguese_dict["Movies"].') - </span> '.$watched_movie_names_text[$i].'</span>'.' - <span class="w3-text-white">('.$unknown_watched_time_text.')</span>'.$div_close."\n";
	}

	$i++;
}

echo '</h5>';

?>