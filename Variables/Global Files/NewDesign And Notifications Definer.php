<?php 

if ($newwritestyle == true) {
	$newwritestylescript = '<script src="'.$cdnjs.'WriteChapter.js"></script>'."\n";
}

else {
	$newwritestylescript = '';
}

#SuperAnimes test CSS and script
if ($newdesign == true) {
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
if ($sitehasnotifications == true) {
	$notificationcss = '<link rel="stylesheet" type="text/css" href="'.$cdncss.'Notification.css" />'."\n";
	$notificationscript = '<script src="'.$cdnjs.'Notification.js"></script>'."\n".
	'<script src="'.$cdnjs.'HideNotification.js"></script>';
}

if ($sitehasnotifications == false) {
	$notificationcss = '';
	$notificationscript = '';
}

if ($sitename == $sitetextmaker) {
	$editbtnscript = '<script src="'.$cdnjs.'EditBtn.js"></script>';
}

else {
	$editbtnscript = '';
}

?>