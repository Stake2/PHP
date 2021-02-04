<?php 

if ($website_name == $website_nazzevo) {
	$div_style_for_notification = $border_3px_solid_black_css_class." ".$background_color;
	$button_style_for_notification = $first_button_style;
}

if ($website_name != $website_nazzevo) {
	$div_style_for_notification =  $border_3px_solid_black_css_class." ".$background_color;
	$button_style_for_notification = $first_button_style;
}

#Computer Website notification div and text
$website_notification_text = '<h3>'.
'<span id="notificationclose" class="w3-btn '.$button_style_for_notification.' '.$border_3px_solid_black_css_class.' notification_text" style="'.$notifbtncss1.$rounded_border_style_2.'box-shadow: 0 9px black!important;">'.'<b>X</b>'.$spanc.
'<span class="notification_text">'.$website_notification_text." ".$icons[13].$spanc.
'<b>'.'<span class="notification_text" style="margin-left:2%;">'.$reviewed_chaptercode.$spanc.'</b>'.
'</h3>';

#Mobile Website notification div and text
$website_notification_text_mobile = '<h4>'.
'<span id="notificationclosem" class="w3-btn '.$button_style_for_notification.' '.$border_3px_solid_black_css_class.' notification_text" style="'.$notifbtncss2.$rounded_border_style_2.'box-shadow: 0 9px black!important;">'.'<b>X</b>'.$spanc.
'<br /><br />'.
'<b>'.'<span class="notification_text">'.$website_notification_text." ".$icons[13].$spanc.'</b>'.'<br /><br />'.
'<b>'.'<span class="notification_text">'.$reviewed_chaptercode.$spanc.'</b>'.
'</h4>

<style>
@keyframes blink_black_to_white {
	0% {
		color: black;
		border-color:black;
	} 

	50% {
		color: white;
		border-color:white;
	}

	100% {
		color: black;
		border-color:black;
	} 
}

.notification_text {
	animation: blink_black_to_white 0.8s;
	animation-iteration-count: infinite;
}
</style>';

#Website notification definer
$website_notification = '<div id="notificationdiv" onload="ChangeTitle();" class="stake2animatebottom border '.$div_style_for_notification.' '.$computer_variable.'" style="position:fixed;right:0;bottom:0;padding-top:2%;padding-bottom:2%;padding-left:7%;padding-right:7%;'.$rounded_border_style_2.'">'.$website_notification_text.$div_close."\n".

'<div id="notificationdivm" onload="ChangeTitle();" class="stake2animatebottom border '.$div_style_for_notification.' '.$mobile_variable.'" style="position:fixed;right:0;bottom: 0;padding-top:1%;padding-bottom:1%;padding-left:10%;padding-right:10%;'.$rounded_border_style_2.'">'.$website_notification_text_mobile.$div_close."\n";

?>