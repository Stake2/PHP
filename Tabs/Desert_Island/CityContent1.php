<?php 

if ($website_name == $selected_website) {
	$hide_notification_attribute = 'Hide_Notification();hidenotifm();';
}

else {
	$hide_notification_attribute = '';
}

echo '<'.$m.'>'.'<b>'."\n";
echo $div_zoom_animation."\n";

require $chapter_button_generator_php_variable;

echo $div_close."\n";
echo '</b>'.'</'.$m.'>'."\n";

?>