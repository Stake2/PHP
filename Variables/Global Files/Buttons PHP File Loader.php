<?php 

if ($website_new_design_setting == false) {
	#Top Buttons file loader
	ob_start();
	include $computer_buttons_creator;

	$buttons = ob_get_clean();
	$buttons = $div_zoom_animation."\n".$buttons."\n".$div_close;
}

else {
	$buttons = '';
}

?>