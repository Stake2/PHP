<?php 

if ($website_has_notifications == True and $website_deactivate_notification_setting == False) {
	$hide_notification_attribute = 'Hide_Notification_Computer();Hide_Notification_Mobile();';
}

echo '<'.$h4_element.'>'.'<b>'."\n";
echo $div_zoom_animation."\n";

require $chapter_button_generator_php_variable;

echo $div_close."\n";
echo '</b>'.'</'.$h4_element.'>'."\n";

?>