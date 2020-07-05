<a name="<?php echo $e2019ptbr; ?>"></a><?php echo "\n"; ?>
<div id="<?php echo $e2019ptbr; ?>" class="city" style="display:none;"><?php echo "\n"; ?>
<div class="mobileHide"><br /><br /><br /></div><?php echo "\n"; ?>
<?php echo $margin2; ?><?php echo "\n"; ?>
<br /><?php echo "\n"; ?>
<?php echo $everybtnwatchedptbry3; ?><?php echo "\n"; ?>
<div class="w3-black"><?php echo "\n"; ?>
<<?php echo $n3; ?> class="w3-text-blue w3-black"><hr class="<?php echo $sitehr; ?>" /><br /><?php echo $watchedtextptbr; ?> <?php echo $anos[1]; ?>: <span class="w3-text-yellow">[<?php echo $watchednumb2019; ?>]</span><br /><br /><hr class="<?php echo $sitehr; ?>" /></<?php echo $n3; ?>><?php echo "\n"; ?>
<?php echo $everyanosptbr2019y; ?><?php echo "\n"; ?>
<hr class="<?php echo $sitehr; ?>" /><?php echo "\n"; ?>
<<?php echo $m3; ?> class="w3-text-blue w3-black" style="text-align:left;margin:2%;"><?php echo "\n"; ?>
<?php

$i = 0;
$a = 0;

while ($i <= $watchednumb2019file) {
	$i2 = $i + 1;
	if (in_array($i, $watchedmovie2019numbarray)) {
		echo '<span class="w3-text-white">'.$i2.' - ('.$moviestextptbr.') - </span>'.$watched2019text[$i].'- <span class="w3-text-white">'.$watched2019time[$a].'</span><br />'."\n";
		$a++;
	}

	if (!in_array($i, $watchedmovie2019numbarray)) {
		echo '<span class="w3-text-white">'.$i2.' - '.$watched2019mediatypeptbrtext[$i]." - </span>".$watched2019text[$i].'- <span class="w3-text-white">'.$watched2019time[$a].'</span><br />'."\n";
		$a++;
	}
    $i++;
}
?>
</<?php echo $m3; ?>>
</div>
<?php echo $divc; ?><?php echo "\n"; ?>
</div>