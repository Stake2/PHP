<a name="<?php echo $e2018enusm; ?>"></a>
<div id="<?php echo $e2018enusm; ?>" class="city" style="display:none;">
<div class="mobileHide"><br /><br /><br /></div><?php echo "\n"; ?>
<?php echo $margin2; ?><?php echo "\n"; ?>
<br /><?php echo "\n"; ?>
<?php echo $margin3; ?><?php echo "\n"; ?>
<?php echo $everybtnwatchedenusy3m; ?><?php echo "\n"; ?>
<?php echo $divc; ?><?php echo "\n"; ?>
<div class="w3-black"><?php echo "\n"; ?>
<<?php echo $m3; ?> class="w3-text-blue w3-black"><hr class="<?php echo $sitehr; ?>" /><br /><?php echo $watchedtextenus; ?> <?php echo $anos[0]; ?>: <span class="w3-text-yellow">[<?php echo $watchednumb2018; ?>]</span><br /><br /><hr class="<?php echo $sitehr; ?>" /></<?php echo $m3; ?>><?php echo "\n"; ?>
<?php echo $margin3; ?><?php echo "\n"; ?>
<?php echo $everyanosenus2018ym; ?><?php echo "\n"; ?>
<?php echo $divc; ?><?php echo "\n"; ?>
<hr class="<?php echo $sitehr; ?>" /><?php echo "\n"; ?>
<<?php echo $m23; ?> class="w3-text-blue w3-black" style="text-align:left;margin:2%;"><?php echo "\n"; ?>
<?php

$i = 0;
$a = 0;

while ($i <= $watchednumb2018file) {
	$i2 = $i + 1;
	if (in_array($i, $watchednumb2018array)) {
		if (in_array($i, $watchednumb2018timearray)) {
			echo '<span class="w3-text-white">'.$i2." - ".$watched2018mediatypeenustext[$i]." - </span>".$watched2018text[$i].'- <span class="w3-text-white">'.$watched2018time[$a].'</span><br />'."\n";
			$a++;
		}

		if (!in_array($i, $watchednumb2018timearray)) {
			echo '<span class="w3-text-white">'.$i2." - ".$watched2018mediatypeenustext[$i]." - </span>".$watched2018text[$i].' - <span class="w3-text-white">'.$notimeenus.'</span><br />'."\n";
		}
	}

	if (in_array($i, $watchedmovie2018numbarray)) {
	
		if (in_array($i, $watchednumb2018timearray)) {
			echo '<span class="w3-text-white">'.$i2." - ".'('.$moviestextenus.') - </span>'.$watched2018text[$i].'- <span class="w3-text-white">'.$watched2018time[$a].'</span><br />'."\n";
			$a++;
		}
	
		if (!in_array($i, $watchednumb2018timearray)) {
			echo '<span class="w3-text-white">'.$i2." - ".'('.$moviestextenus.') - </span>'.$watched2018text[$i].' - <span class="w3-text-white">'.$notimeenus.'</span><br />'."\n";
		}
	}
    $i++;
}

?>
</<?php echo $m23; ?>>
</div>
<?php echo $divc; ?><?php echo "\n"; ?>
</div>