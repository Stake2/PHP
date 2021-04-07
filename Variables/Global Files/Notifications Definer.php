<?php 

# Notifications CSS and Script includer
if ($website_has_notifications == True) {
	$notification_css = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'Notification.css" />'."\n";
	$notification_script = '<script src="'.$cdnjs.'Notification.js"></script>'."\n";
}

if ($website_has_notifications == false) {
	$notification_css = '';
	$notification_script = '';
}

if ($website_name == $website_text_maker) {
	$edit_button_script = '<script src="'.$cdnjs.'Edit Button.js"></script>';
}

else {
	$edit_button_script = '';
}

?>