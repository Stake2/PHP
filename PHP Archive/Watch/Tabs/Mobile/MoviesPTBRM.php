<a name="<?php echo $movieptbrm; ?>"></a>
<div id="<?php echo $movieptbrm; ?>" class="city <?php echo $mobile1; ?>" style="display:none;"><?php echo "\n"; ?>
<div class="mobileHide"><br /><br /><br /></div><?php echo "\n"; ?>
<?php echo $margin2; ?><?php echo "\n"; ?>
<br /><?php echo "\n"; ?>
<?php echo $margin3; ?><?php echo "\n"; ?>
<?php echo $everybtnwatchedptbry2m; ?>
<?php echo $divc; ?><?php echo "\n"; ?>
<div class="w3-black"><?php echo "\n"; ?>
<<?php echo $m3; ?> class="w3-text-blue w3-black"><hr class="<?php echo $sitehr; ?>" /><br /><?php echo $movietextptbr; ?>: <span class="w3-text-yellow">[<?php echo $moviesnumb; ?>]</span><br /><br /><hr class="<?php echo $sitehr; ?>" /></<?php echo $m3; ?>><?php echo "\n"; ?>
<<?php echo $m23; ?> class="w3-black w3-text-blue" style="text-align:left;margin:2%;"><?php echo "\n"; ?>
<?php

$i = 0;
$a = 0;

while ($i <= $watchedmoviesnumbfile) {
	$i2 = $i + 1;
	if (in_array($i, $watchedmovietimenumbarray)) {
		if (in_array($i, $watchedmoviecommentarray)) {
			echo '<span class="w3-text-white">'.$i2." - ".'('.$moviestextptbr.') - </span> '.$watchedmoviestext[$i].'<span class="w3-text-white"> - '.$watchedmoviestime[$a]." - </span> ".$comments[$a]."<br />"."\n";
			$a++;
		}

		if (!in_array($i, $watchedmoviecommentarray)) {
			echo '<span class="w3-text-white">'.$i2." - ".'('.$moviestextptbr.') - </span> '.$watchedmoviestext[$i].'<span class="w3-text-white"> - '.$watchedmoviestime[$a]."</span><br />"."\n";
			$a++;
		}
	}

	if (!in_array($i, $watchedmovietimenumbarray)) {
		echo '<span class="w3-text-white">'.$i2." - ".'('.$moviestextptbr.') - </span> '.$watchedmoviestext[$i].' - <span class="w3-text-white">'.$notimeptbr."</span><br />"."\n";
	}

    $i++;
}

?>
</<?php echo $m23; ?>>
</div>
<?php echo $divc; ?><?php echo "\n"; ?>
</div>