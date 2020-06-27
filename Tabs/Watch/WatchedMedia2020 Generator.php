<?php 

if ($thingsidofake == true) {
	$spanstyle = $blackspan;
	$cssbtnstyle = $cssbtn5;

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
	$cssbtnstyle = $cssbtn4;

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
		$hasmediaarray[$i] = $hasmoviemedia = false;
	}

	if ($linesarray[$i] != 'X' and $i == 0) {
		$hasmediaarray[$i] = $hasmoviemedia = true;
	}

	if ($linesarray[$i] == 'X' and $i == 1) {
		$hasmediaarray[$i] = $hasseriesmedia = false;
	}

	if ($linesarray[$i] != 'X' and $i == 1) {
		$hasmediaarray[$i] = $hasseriesmedia = true;
	}

	if ($linesarray[$i] == 'X' and $i == 2) {
		$hasmediaarray[$i] = $hascartoonmedia = false;
	}

	if ($linesarray[$i] != 'X' and $i == 2) {
		$hasmediaarray[$i] = $hascartoonmedia = true;
	}

	if ($linesarray[$i] == 'X' and $i == 3) {
		$hasmediaarray[$i] = $hasanimemedia = false;
	}

	if ($linesarray[$i] != 'X' and $i == 3) {
		$hasmediaarray[$i] = $hasanimemedia = true;
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
$moviesnumbcode = 0,
$seriesnumbcode = 1,
$cartoonsnumbcode = 2,
$animesnumbcode = 3,
$videosnumbcode = 4,
);

$mediatitles = array(
'<b>'.$spanstyle.$medianames[$moviesnumbcode].'s'.': '.$spanc.$bluespan.$medianumbers[$moviesnumbcode].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$medianames[$seriesnumbcode].': '.$spanc.$bluespan.$medianumbers[$seriesnumbcode].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$medianames[$cartoonsnumbcode].'s'.': '.$spanc.$bluespan.$medianumbers[$cartoonsnumbcode].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$medianames[$animesnumbcode].'s'.': '.$spanc.$bluespan.$medianumbers[$animesnumbcode].$spanc.'</b>'.'<br />'."\n",
'<b>'.$spanstyle.$medianames[$videosnumbcode].'s'.': '.$spanc.$bluespan.$medianumbers[$videosnumbcode].$spanc.'</b>'.'<br />'."\n",
);

$hasmovie = true;
$hasseries = true;
$hascartoon = true;
$hasanime = true;
$hasvideo = true;

if ($newwatchedstyle == true) {
	$i = 1;
	if ($hasseriesmedia == true) {
		echo '<a href="#'.$medianames[$i].''.$ano.$mobileaname.'">'.$mediatitles[$i].'</a>'."\n";
	}

	$i++;
	if ($hascartoonmedia == true) {
		echo '<a href="#'.$medianames[$i].'s'.$ano.$mobileaname.'">'.$mediatitles[$i].'</a>'."\n";
	}
	
	$i++;
	if ($hasanimemedia == true) {
		echo '<a href="#'.$medianames[$i].'s'.$ano.$mobileaname.'">'.$mediatitles[$i].'</a>'."\n";
	}
	
	$i++;
	if ($hasvideomedia == true) {
		echo '<a href="#'.$medianames[$i].'s'.$ano.$mobileaname.'">'.$mediatitles[$i].'</a>'."\n";
	}

	$i = 0;
	if ($hasmoviemedia == true) {
		echo '<a href="#'.$medianames[$i].'s'.$ano.$mobileaname.'">'.$mediatitles[$i].'</a>'."\n";
	}

	echo '<br />'."\n";
}

$i = 0;
$c = 0;
$number = 1;
while ($i <= $watchednumbfile) {
	$i2 = $i + 1;

	if ($newwatchedstyle == true) {
		#New style of showing Watched Medias
		if ($hasmediaarray[$seriesnumbcode] == true and $mediadone[$seriesnumbcode] == false and $mediadone[$animesnumbcode] == false) {
			if ($watchedtype[$i] == $medianames[$seriesnumbcode]) {
				if ($i == $linesarray[$seriesnumbcode]) {
					echo '<a name="'.$medianames[$seriesnumbcode].''.$ano.$mobileaname.'"></a>'."\n";
					echo $mediatitles[$seriesnumbcode];
				}

				echo $margindivstyle."\n";
				echo '<div class="'.$zoomanim.'">'.'<span class="'.$cssbtnstyle.'">'.$spanstyle.$number.' - </span>'.$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$divc."\n";
				echo $divc."\n";

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

		if ($hasmediaarray[$cartoonsnumbcode] == true and $mediadone[$cartoonsnumbcode] == false and $mediadone[$seriesnumbcode] == true) {
			if ($watchedtype[$i] == $medianames[$cartoonsnumbcode]) {
				if ($i == $linesarray[$cartoonsnumbcode]) {
					echo '<a name="'.$medianames[$cartoonsnumbcode].'s'.$ano.$mobileaname.'"></a>'."\n";
					echo $mediatitles[$cartoonsnumbcode];
				}

				echo $margindivstyle."\n";
				echo '<div class="'.$zoomanim.'">'.'<span class="'.$cssbtnstyle.'">'.$spanstyle.$number.' - </span>'.$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$divc."\n";
				echo $divc."\n";

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

		if ($hasmediaarray[$animesnumbcode] == true and $mediadone[$animesnumbcode] == false and $mediadone[$seriesnumbcode] == true and $mediadone[$cartoonsnumbcode] == true) {
			if ($watchedtype[$i] == $medianames[$animesnumbcode]) {
				if ($i == $linesarray[$animesnumbcode]) {
					echo '<a name="'.$medianames[$animesnumbcode].'s'.$ano.$mobileaname.'"></a>'."\n";
					echo $mediatitles[$animesnumbcode];
				}

				echo $margindivstyle."\n";
				echo '<div class="'.$zoomanim.'">'.'<span class="'.$cssbtnstyle.'">'.$spanstyle.$number.' - </span>'.$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$divc."\n";
				echo $divc."\n";

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

		if ($hasmediaarray[$videosnumbcode] == true and $mediadone[$seriesnumbcode] == true and $mediadone[$animesnumbcode] == true and $mediadone[$videosnumbcode] == false) {
			if ($watchedtype[$i] == $medianames[$videosnumbcode]) {
				if ($i == $linesarray[$videosnumbcode]) {
					echo '<a name="'.$medianames[$videosnumbcode].'s'.$ano.$mobileaname.'"></a>'."\n";
					echo $mediatitles[$videosnumbcode];
				}

				echo $margindivstyle."\n";
				echo '<div class="'.$zoomanim.'">'.'<span class="'.$cssbtnstyle.'">'.$spanstyle.$number.' - </span>'.$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$divc."\n";
				echo $divc."\n";

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

		if ($hasmediaarray[$moviesnumbcode] == true and $mediadone[$moviesnumbcode] == false and $mediadone[$seriesnumbcode] == true and $mediadone[$cartoonsnumbcode] == true and $mediadone[$videosnumbcode] == true and $mediadone[$animesnumbcode] == true) {
			if ($watchedtype[$i] == $medianames[$moviesnumbcode]) {
				if ($i == $linesarray[$moviesnumbcode]) {
					echo '<a name="'.$medianames[$moviesnumbcode].'s'.$ano.$mobileaname.'"></a>'."\n";
					echo $mediatitles[$moviesnumbcode];
				}

				echo $margindivstyle."\n";
				echo '<div class="'.$zoomanim.'">'.'<span class="'.$cssbtnstyle.'">'.$spanstyle.$number.' - </span>'.$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$divc."\n";
				echo $divc."\n";

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

		if ($i == $watchednumbfile) {
			echo '<br />'."\n";
		}
	}

	else {
		#Old style of showing Watched Medias
		echo '<div class="'.$zoomanim.'">'.'<span class="'.$cssbtnstyle.'">'.$spanstyle.$i2." - (".$watchedtype[$i].") - </span>".$watchedtxtmedia[$i].$spanstyle.' - ('.$watchedtime[$i].')</span></span><br />'.$divc."\n";
	}

    $i++;
}

?>