<?php 

if ($website_name == $sitepequenata) {
	$hide_notification_attribute = 'Hide_Notification();hidenotifm();';
}

else {
	$hide_notification_attribute = '';
}

$reviewed_chapter = 0;

echo '<'.$m.'>'.'<b>'."\n";
echo $div_zoom_animation."\n";

require $chapter_button_generator_php_variable;

echo $div_close."\n";
echo '</b>'.'</'.$m.'>'."\n";

?>