<?php 

echo '<h5 class="w3-black w3-text-blue" style="text-align:left;">'."\n";

$i = 0;
$a = 0;
while ($i <= $watchedmoviesnumbfile) {
	$i2 = $i + 1;
	if (in_array($i, $watchedmovietimenumbarray)) {
		if (in_array($i, $watchedmoviecommentarray)) {
			echo $divzoomanim.'<span class="'.$cssbtn4.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$moviestxt.') - </span> '.$watchedmoviestxt[$i].'<span class="w3-text-white"> - '.$watchedmoviestime[$a]." - </span></span> ".$cmnts[$a].'<br />'.$divc."\n";
			$a++;
		}

		if (!in_array($i, $watchedmoviecommentarray)) {
			echo $divzoomanim.'<span class="'.$cssbtn4.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$moviestxt.') - </span> '.$watchedmoviestxt[$i].'<span class="w3-text-white"> - '.$watchedmoviestime[$a].'</span></span>'.$divc.'<br />'."\n";
			$a++;
		}
	}

	if (!in_array($i, $watchedmovietimenumbarray)) {
		echo $divzoomanim.'<span class="'.$cssbtn4.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$moviestxt.') - </span> '.$watchedmoviestxt[$i].' - <span class="w3-text-white">'.$notimetxt.'</span></span>'.$divc.''."\n";
	}

    $i++;
}

echo '</h5>';

?>