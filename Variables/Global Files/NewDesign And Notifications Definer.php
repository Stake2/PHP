<?php 

#SuperAnimes test CSS and script
if ($website_new_design_setting == True) {
	#SuperAnimes test loader
	include $new_design_php;

	$new_design_css = $new_design_css;
	$new_design_script = $new_design_script;
}

else {
	$new_design_css = '';
	$new_design_script = '';
}

#Notifications CSS and script includer
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