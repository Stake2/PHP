<?php 

#SuperAnimes test CSS and script
if ($website_new_design_setting == true) {
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
if ($website_has_notifications == true) {
	$notificationcss = '<link rel="stylesheet" type="text/css" href="'.$cdncss.'Notification.css" />'."\n";
	$notificationscript = '<script src="'.$cdnjs.'Notification.js"></script>'."\n".
	'<script src="'.$cdnjs.'HideNotification.js"></script>';
}

if ($website_has_notifications == false) {
	$notificationcss = '';
	$notificationscript = '';
}

if ($website_name == $sitetextmaker) {
	$editbtnscript = '<script src="'.$cdnjs.'EditBtn.js"></script>';
}

else {
	$editbtnscript = '';
}

?>