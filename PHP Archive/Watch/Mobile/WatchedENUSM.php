<a name="<?php echo $watchedenusm; ?>"></a>
<div id="<?php echo $watchedenusm; ?>" class="city <?php echo $mobile1; ?>" style="display:none;">
<div class="mobileHide"><br /><br /><br /></div>
<center>
<?php echo $margin2; ?><?php echo "\n"; ?>
<br />
<?php echo $margin2; ?><?php echo "\n"; ?>
<?php echo $everybtnwatchedenusy1m; ?>
<?php echo $divc; ?><?php echo "\n"; ?>
<<?php echo $m3; ?> class="w3-text-blue w3-black"><hr class="<?php echo $sitehr; ?>" /><br /><?php echo $watchedtextenus; ?> <?php echo $ano; ?>: <span class="w3-text-yellow">[<?php echo $watchednumb2020; ?>]</span><br /><br /></<?php echo $m3; ?>><hr class="<?php echo $sitehr; ?>" />
<<?php echo $m23; ?> class="w3-text-blue w3-black" style="text-align:left;margin:2%;">
<?php

$i = 0;

while ($i <= $watchednumb2020file) {
	$i2 = $i + 1;
	echo '<span class="'.$cssbtn4.'">'.'<span class="w3-text-white">'.$i2." - ".$watched2020mediatypeenustext[$i]." - </span>".$watched2020text[$i].'<span class="w3-text-white"> - '.$watched2020time[$i]."</span></span><br />";
    $i++;
}

?>
</<?php echo $m23; ?>>
<?php echo $divc; ?><?php echo "\n"; ?>
</center>
</div>