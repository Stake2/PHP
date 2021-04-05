<?php 

if ($website_name == $website_nazzevo) {
	$div_style_for_notification = $border_3px_solid_black_css_class." ".$background_color;
	$button_style_for_notification = $first_button_style;
}

if ($website_name != $website_nazzevo) {
	$div_style_for_notification =  $border_3px_solid_black_css_class." ".$background_color;
	$button_style_for_notification = $first_button_style;
}

# Computer Website notification div and text
$website_notification_text_computer = "\n".'<h3 class="'.$computer_variable.'">'."\n"."\n".
'<span id="notification_close_button_computer" class="w3-btn '.$button_style_for_notification.' '.$border_3px_solid_black_css_class.' notification_text" style="'.$notifbtncss1.$rounded_border_style_2.'box-shadow: 0 9px black!important;" onclick="function () {document.title = document.title.replace(\'(1) \', \'\')};">'."\n".
'<b>'."\n".
'X'."\n".
'</b>'."\n".
$spanc."\n"."\n".
'<span class="notification_text">'."\n".
$website_notification_text." ".$icons[13]."\n".
$spanc."\n"."\n".
'<b>'."\n".
'<span class="notification_text" style="margin-left:2%;">'."\n".
$reviewed_chapter_code."\n".
$spanc."\n".
'</b>'."\n".
'</h3>'."\n";

# Mobile Website notification div and text
$website_notification_text_mobile = "\n".'<h4 class="'.$mobile_variable.'">'."\n"."\n".
'<span id="notification_close_button_mobile" class="w3-btn '.$button_style_for_notification.' '.$border_3px_solid_black_css_class.' notification_text '.$mobile_variable.'" style="'.$notifbtncss2.$rounded_border_style_2.'box-shadow: 0 9px black!important;" onclick="function () {document.title = document.title.replace(\'(1) \', \'\')};">'."\n".
'<b>'."\n".
'X'."\n".
'</b>'."\n".
$spanc."\n".
'<br /><br />'.
'<b>'."\n".
'<span class="notification_text '.$mobile_variable.'">'."\n".
$website_notification_text." ".$icons[13]."\n".
$spanc."\n".
'</b>'."\n".
'<br />'."\n"."\n".
'<b>'."\n".
'<span class="notification_text '.$mobile_variable.'">'."\n".
$reviewed_chapter_code."\n".
$spanc."\n".
'</b>'."\n".
'</h4>

<style>
@keyframes blink_black_to_white {
	0% {
		color: black!important;
		border-color:black!important;
	} 

	50% {
		color: white!important;
		border-color:white!important;
	}

	100% {
		color: black!important;
		border-color:black!important;
	} 
}

.notification_text {
	animation: blink_black_to_white 0.8s;
	animation-iteration-count: infinite;
}
</style>'."\n";

#Website notification definer
$website_notification = '<div id="notification_div_computer" class="stake2animatebottom border '.$div_style_for_notification.' '.$computer_variable.'" style="position:fixed;right:0;bottom:0;padding-top:2%;padding-bottom:2%;padding-left:7%;padding-right:7%;'.$rounded_border_style_2.'">'.$website_notification_text_computer.$div_close."\n".

'<div id="notification_div_mobile" class="stake2animatebottom border '.$div_style_for_notification.' '.$mobile_variable.'" style="position:fixed;right:0;bottom: 0;padding-top:1%;padding-bottom:1%;padding-left:10%;padding-right:10%;'.$rounded_border_style_2.'">'.$website_notification_text_mobile.$div_close."\n";

?>