<a name="<?php echo $towatchptbrm; ?>"></a><?php echo "\n"; ?>
<div id="<?php echo $towatchptbrm; ?>" class="city <?php echo $mobile1; ?>"><?php echo "\n"; ?>
<div class="mobileHide"><br /><br /><br /></div><?php echo "\n"; ?>
<?php echo $margin2; ?><?php echo "\n"; ?>
<br /><?php echo "\n"; ?>
<<?php echo $m3; ?> class="w3-text-blue w3-black"><br /><?php echo $towatchtextptbr; ?>: <span class="w3-text-yellow">[<?php echo $towatchnumb; ?>]</span><br /><br /></<?php echo $m3; ?>><hr class="<?php echo $sitehr; ?>" />
<br />
<?php echo $margin3; ?><?php echo "\n"; ?>
<?php

$i = 0;


while ($i <= $twnumbfile) {
	$i2 = $i + 1;
	if (strpos ($twstatustext[$i], 'w') == true) {
		$twstatus = 'w';
		$twstatusicon = 'fa-eye';
	}

	if (strpos ($twstatustext[$i], 'tw') == true) {
		$twstatus = 'tw';
		$twstatusicon = 'fa-play';
	}
	
	echo '<'.$m3.' class="'.$twstatus.' '.$cssbtn4.'">'.$i2." - ".$twmediatypeptbrtext[$i]." - ".$twtext[$i].' - <a href="vlc://file:///C:/Midias/'.$twmediatext[$i].'/'.$twtext[$i].'.mp4"><i class="fas '.$twstatusicon.'"></i></a>'."</".$m3.">"."\n";
    $i++;
}

?>
<?php echo $divc; ?><?php echo "\n"; ?>
<br />
<?php echo $divc; ?><?php echo "\n"; ?>
<hr />
</div>