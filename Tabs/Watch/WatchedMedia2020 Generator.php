<?php 

if ($thingsidofake == true) {
	$spanstyle = $blackspan;
	$hover_text_color = $text_hover_white_css_class;
	$number_text_color = $first_text_color;

	if ($mobileversion == true) {
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

	if ($mobileversion == true) {
		$margindivstyle = '<div>';
		$mobileaname = 'm';
	}

	if ($mobileversion == null) {
		$margindivstyle = '<div style="margin-left:30px;">';
		$mobileaname = '';
	}
}

$i = 0;
while ($i <= 4) {
	if ($linesarray[$i] == 'X' and $i == 0) {
		$hasmediaarray[$i] = $hasanimemedia = false;
	}

	if ($linesarray[$i] != 'X' and $i == 0) {
		$hasmediaarray[$i] = $hasanimemedia = true;
	}

	if ($linesarray[$i] == 'X' and $i == 1) {
		$hasmediaarray[$i] = $hascartoonmedia = false;
	}

	if ($linesarray[$i] != 'X' and $i == 1) {
		$hasmediaarray[$i] = $hascartoonmedia = true;
	}

	if ($linesarray[$i] == 'X' and $i == 2) {
		$hasmediaarray[$i] = $hasseriesmedia = false;
	}

	if ($linesarray[$i] != 'X' and $i == 2) {
		$hasmediaarray[$i] = $hasseriesmedia = true;
	}

	if ($linesarray[$i] == 'X' and $i == 3) {
		$hasmediaarray[$i] = $hasmoviemedia = false;
	}

	if ($linesarray[$i] != 'X' and $i == 3) {
		$hasmediaarray[$i] = $hasmoviemedia = true;
	}

	if ($linesarray[$i] == 'X' and $i == 4) {
		$hasmediaarray[$i] = $hasvideomedia = false;
	}

	if ($linesarray[$i] != 'X' and $i == 4) {
		$hasmediaarray[$i] = $hasvideomedia = true;
	}

    $i++;
}

$mediadone = array(
false,
false,
false,
false,
false,
);

$mediacodes = array(
$animesnumbcode = 0,
$cartoonsnumbcode = 1,
$seriesnumbcode = 2,
$moviesnumbcode = 3,
$videosnumbcode = 4,
);

$mediatitles = array(
'<b>'.$spanstyle.$medianames[$animesnumbcode].'s'.': '.$spanc.'<span class="'.$number_text_color.'">'.$medianumbers[$animesnumbcode].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$medianames[$cartoonsnumbcode].'s'.': '.$spanc.'<span class="'.$number_text_color.'">'.$medianumbers[$cartoonsnumbcode].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$medianames[$seriesnumbcode].': '.$spanc.'<span class="'.$number_text_color.'">'.$medianumbers[$seriesnumbcode].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$medianames[$moviesnumbcode].'s'.': '.$spanc.'<span class="'.$number_text_color.'">'.$medianumbers[$moviesnumbcode].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$medianames[$videosnumbcode].'s'.': '.$spanc.'<span class="'.$number_text_color.'">'.$medianumbers[$videosnumbcode].$spanc.'</b>'.'<br />'."\n",
);

$hasanime = true;
$hascartoon = true;
$hasseries = true;
$hasmovie = true;
$hasvideo = true;

if ($website_watch_history_new_watched_style_setting == true) {
	$i = 0;
	if ($hasanimemedia == true) {
		echo '<a href="#'.$medianames[$animesnumbcode].'s'.$ano.$mobileaname.'">'.$mediatitles[$animesnumbcode].'</a>'."\n";
	}

	$i++;
	if ($hascartoonmedia == true) {
		echo '<a href="#'.$medianames[$cartoonsnumbcode].'s'.$ano.$mobileaname.'">'.$mediatitles[$i].'</a>'."\n";
	}

	$i++;
	if ($hasseriesmedia == true) {
		echo '<a href="#'.$medianames[$seriesnumbcode].''.$ano.$mobileaname.'">'.$mediatitles[$i].'</a>'."\n";
	}

	$i++;
	if ($hasmoviemedia == true) {
		echo '<a href="#'.$medianames[$moviesnumbcode].'s'.$ano.$mobileaname.'">'.$mediatitles[$i].'</a>'."\n";
	}

	$i++;
	if ($hasvideomedia == true) {
		echo '<a href="#'.$medianames[$videosnumbcode].'s'.$ano.$mobileaname.'">'.$mediatitles[$i].'</a>'."\n";
	}

	echo '<br />'."\n";
}

$i = 0;
$c = 0;
$number = 1;
while ($i <= $watchednumbfile) {
	$i2 = $i + 1;

	$a = 0;
	while ($a <= 5) {
		$watchedtxtmedia[$i] = $watchedtxtmedia[$i];
		$text_to_find = "/(".$rewatched_text_enus." ".$a."x - ".$rewatched_text_ptbr." ".$a."x)/i";

		$watchedtxtmedia[$i] = preg_replace($text_to_find, $rewatched_text." ".$a."x", $watchedtxtmedia[$i]);

		$a++;
	}

	#echo $watchedtype[$i]. " ", $medianames[$seriesnumbcode]."<br />";

	if ($website_watch_history_new_watched_style_setting == true) {
		# New style of showing Watched Medias
		if ($hasmediaarray[$animesnumbcode] == true and $mediadone[$animesnumbcode] == false) {
			if ($watchedtype[$i] == $medianames[$animesnumbcode]) {
				if ($i == $linesarray[$animesnumbcode]) {
					echo '<a name="'.$medianames[$animesnumbcode].'s'.$ano.$mobileaname.'"></a>'."\n";
					echo $mediatitles[$animesnumbcode];
				}

				echo $margindivstyle."\n";
				echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$div_close."\n";
				echo $div_close."\n";

				$number++;
				$c++;

				if ($c == $medianumbers[$animesnumbcode]) {
					$mediadone[$animesnumbcode] = true;
					$i = 0;
					$c = 0;
					$number = 1;
					echo '<br />'."\n";
				}
			}
		}

		if ($hasmediaarray[$cartoonsnumbcode] == true and $mediadone[$cartoonsnumbcode] == false and $mediadone[$animesnumbcode] == true) {
			if ($watchedtype[$i] == $medianames[$cartoonsnumbcode]) {
				if ($i == $linesarray[$cartoonsnumbcode]) {
					echo '<a name="'.$medianames[$cartoonsnumbcode].'s'.$ano.$mobileaname.'"></a>'."\n";
					echo $mediatitles[$cartoonsnumbcode];
				}

				echo $margindivstyle."\n";
				echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$div_close."\n";
				echo $div_close."\n";

				$number++;
				$c++;

				if ($c == $medianumbers[$cartoonsnumbcode]) {
					$mediadone[$cartoonsnumbcode] = true;
					$i = 0;
					$c = 0;
					$number = 1;
					echo '<br />'."\n";
				}
			}
		}

		if ($hasmediaarray[$seriesnumbcode] == true and $mediadone[$seriesnumbcode] == false and $mediadone[$animesnumbcode] == true and $mediadone[$cartoonsnumbcode] == true) {
			if ($watchedtype[$i] == $medianames[$seriesnumbcode]) {
				if ($i == $linesarray[$seriesnumbcode]) {
					echo '<a name="'.$medianames[$seriesnumbcode].''.$ano.$mobileaname.'"></a>'."\n";
					echo $mediatitles[$seriesnumbcode];
				}

				echo $margindivstyle."\n";
				echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$div_close."\n";
				echo $div_close."\n";

				$number++;
				$c++;

				if ($c == $medianumbers[$seriesnumbcode]) {
					$mediadone[$seriesnumbcode] = true;
					$i = 0;
					$c = 0;
					$number = 1;
					echo '<br />'."\n";
				}
			}
		}

		if ($hasmediaarray[$moviesnumbcode] == true and $mediadone[$moviesnumbcode] == false and $mediadone[$seriesnumbcode] == true and $mediadone[$cartoonsnumbcode] == true and $mediadone[$animesnumbcode] == true and $mediadone[$videosnumbcode] == false) {
			if ($watchedtype[$i] == $medianames[$moviesnumbcode]) {
				if ($i == $linesarray[$moviesnumbcode]) {
					echo '<a name="'.$medianames[$moviesnumbcode].'s'.$ano.$mobileaname.'"></a>'."\n";
					echo $mediatitles[$moviesnumbcode];
				}

				echo $margindivstyle."\n";
				echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$div_close."\n";
				echo $div_close."\n";

				$number++;
				$c++;

				if ($c == $medianumbers[$moviesnumbcode]) {
					$mediadone[$moviesnumbcode] = true;
					$i = 0;
					$c = 0;
					$number = 1;
					echo '<br />'."\n";
				}
			}
		}

		if ($hasmediaarray[$videosnumbcode] == true and $mediadone[$videosnumbcode] == false and $mediadone[$moviesnumbcode] == true and $mediadone[$seriesnumbcode] == true and $mediadone[$cartoonsnumbcode] == true and $mediadone[$animesnumbcode] == true) {
			if ($watchedtype[$i] == $medianames[$videosnumbcode]) {
				if ($i == $linesarray[$videosnumbcode]) {
					echo '<a name="'.$medianames[$videosnumbcode].'s'.$ano.$mobileaname.'"></a>'."\n";
					echo $mediatitles[$videosnumbcode];
				}

				echo $margindivstyle."\n";
				echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$number.' - </span>'.$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$div_close."\n";
				echo $div_close."\n";

				$number++;
				$c++;

				if ($c == $medianumbers[$videosnumbcode]) {
					$mediadone[$videosnumbcode] = true;
					$i = 0;
					$c = 0;
					$number = 1;
					echo '<br />'."\n";
				}
			}
		}

		if ($i == $watchednumbfile) {
			echo '<br />'."\n";
		}
	}

	else {
		#Old style of showing Watched Medias
		echo '<div class="'.$zoom_animation_class.'">'.'<span class="'.$hover_text_color.'">'.$spanstyle.$i2." - (".$watchedtype[$i].") - </span>".$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$div_close."\n";
	}

    $i++;
}

?>