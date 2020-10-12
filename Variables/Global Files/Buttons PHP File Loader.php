<?php 

if ($newdesign == false) {
	#Top Buttons file loader
	ob_start();
	include $computer_buttons_creator;

	$buttons = ob_get_clean();
	$buttons = $divzoomanim."\n".$buttons."\n".$divc;
}

else {
	$buttons = '';
}

?>