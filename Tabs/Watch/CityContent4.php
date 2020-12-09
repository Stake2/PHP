<?php 

if ($thingsidofake == true) {
	$spanstyle = $blackspan;
	$hover_text_color = $text_hover_white_css_class;
	$number_text_color = $first_text_color;
	$number_text_color_span = '<span class="'.$number_text_color.'">';

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
	$number_text_color_span = '<span class="'.$number_text_color.'">';

	if ($mobileversion == true) {
		$margindivstyle = '<div>';
		$mobileaname = 'm';
	}

	if ($mobileversion == null) {
		$margindivstyle = '<div style="margin-left:30px;">';
		$mobileaname = '';
	}
}

echo '<'.$m.' class="'.$number_text_color.'" style="text-align:left;">'."\n";

$i = 0;
$a = 0;
$c = 0;
while ($i <= $watchedmoviesnumbfile) {
	$i2 = $i + 1;

	if (in_array($i, $watchedmovietimenumbarray)) {
		if (in_array($i, $watchedmoviecommentarray)) {
			if ($i != 10) {
				echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.$spanstyle.$i2." - ".'('.$moviestxt.') - </span> '.$watchedmoviestxt[$i].$spanstyle.' - ('.$watchedmoviestime[$a].") - </span></span> ".$cmnts[$c].'<br />'.$div_close."\n";
			}

			if ($i == 10) {
				echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.$spanstyle.$i2." - ".'('.$moviestxt.') - </span> '.$watchedmoviestxt[$i].$spanstyle.' - ('.$watchedmoviestime[$a].") - </span></span> ".$cmnts[$c].$div_close."\n";
			}

			$a++;
			$c++;
		}

		if (!in_array($i, $watchedmoviecommentarray)) {
			if ($i != 10) {
				echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$moviestxt.') - </span> '.$watchedmoviestxt[$i].'<span class="w3-text-white"> - ('.$watchedmoviestime[$a].')</span></span>'.'<br />'.$div_close."\n";
			}

			if ($i == 10) {
				echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$moviestxt.') - </span> '.$watchedmoviestxt[$i].'<span class="w3-text-white"> - ('.$watchedmoviestime[$a].')</span></span>'.$div_close."\n";
			}

			$a++;
		}
	}

	if (!in_array($i, $watchedmovietimenumbarray)) {
		echo $div_zoom_animation.'<span class="'.$text_hover_white_css_class.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$moviestxt.') - </span> '.$watchedmoviestxt[$i].' - <span class="w3-text-white">'.$notimetxt.'</span></span>'.$div_close.''."\n";
	}

    $i++;
}

echo '</h5>';

?>