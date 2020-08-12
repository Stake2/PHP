<?php 

if ($newdesign == false) {
	#Top Buttons file loader
	ob_start();
	include $topbuttonscreator;
	$buttons = ob_get_clean();
	$buttons = $divzoomanim."\n".$buttons."\n".$divc;
}

else {
	$buttons = '';
}

?>