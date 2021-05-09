<?php 

# Notifications CSS and Script includer
if ($website_has_notifications == True) {
	$notification_css = '<link rel="stylesheet" type="text/css" href="'.$website_css_styler_css_folder.'Notification.css" />'."\n";
	$notification_script = '<script src="'.$website_function_javascript_folder.'Notification.js"></script>'."\n";
}

if ($website_has_notifications == false) {
	$notification_css = '';
	$notification_script = '';
}

$edit_button_script = '';

?>