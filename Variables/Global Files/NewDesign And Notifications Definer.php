<?php 

#SuperAnimes test CSS and script
if ($website_new_design_setting == True) {
	#SuperAnimes test loader
	include $newdesignphp;

	$newdesigncss = $newdesigncss;
	$newdesignscript = $newdesignscript;
}

else {
	$newdesigncss = '';
	$newdesignscript = '';
}

#Notifications CSS and script includer
if ($website_has_notifications == True) {
	$notificationcss = '<link rel="stylesheet" type="text/css" href="'.$cdn_css.'Notification.css" />'."\n";
	$notificationscript = '<script src="'.$cdnjs.'Notification.js"></script>'."\n".
	'<script src="'.$cdnjs.'HideNotification.js"></script>';
}

if ($website_has_notifications == false) {
	$notificationcss = '';
	$notificationscript = '';
}

if ($website_name == $website_text_maker) {
	$edit_button_script = '<script src="'.$cdnjs.'EditBtn.js"></script>';
}

else {
	$edit_button_script = '';
}

?>