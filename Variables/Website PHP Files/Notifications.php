<?php 

if ($website_name == $website_nazzevo) {
	$div_style_for_notification = $border_3px_solid_black_css_class." ".$background_color;
	$button_style_for_notification = $first_button_style;
}

if ($website_name != $website_nazzevo) {
	$div_style_for_notification =  $border_3px_solid_black_css_class." ".$background_color;
	$button_style_for_notification = $first_button_style;
}

$change_title_script = "<script>
function Change_Website_Title() {
	document.title = document.title.replace('(1) ', '');
}
</script>";

# Computer Website notification div and text
$website_notification_text_computer = "\n".'<'.$h3_element.' class="'.$computer_variable.'">'."\n"."\n".
'<span id="notification_close_button_computer" class="w3-btn '.$button_style_for_notification.' '.$border_3px_solid_black_css_class.'" style="'.$notifbtncss1.$rounded_border_style_2.'box-shadow: 0 9px black!important;">'."\n".
'<b>'."\n".
'X'."\n".
'</b>'."\n".
$spanc."\n"."\n".
$website_notification_text." ".$icons[13]."\n".
'<b>'."\n".
'<span style="margin-left:2%;">'."\n".
$reviewed_chapter_code."\n".
$spanc."\n".
'</b>'."\n".
'</'.$h3_element.'>'."\n";

# Mobile Website notification div and text
$website_notification_text_mobile = "\n".'<'.$h2_element.' class="'.$mobile_variable.'">'."\n"."\n".
'<span id="notification_close_button_mobile" class="w3-btn '.$button_style_for_notification.' '.$border_3px_solid_black_css_class.' '.$mobile_variable.'" style="'.$notifbtncss2.$rounded_border_style_2.'box-shadow: 0 9px black!important;">'."\n".
'<b>'."\n".
'X'."\n".
'</b>'."\n".
$spanc."\n".
'<br /><br />'.
'<b>'."\n".
$h4_right_element."\n".
$website_notification_text." ".$icons[13]."\n".
$h4_close_element."\n".
'</b>'."\n"."\n".
'<b>'."\n".
'<span class="'.$mobile_variable.'">'."\n".
$reviewed_chapter_code."\n".
$spanc."\n".
'</b>'."\n".
'</'.$h2_element.'>'."\n";

# Website notification definer
$website_notification = $change_title_script."\n".'<div id="notification_div_computer" class="element_appear_from_bottom border '.$div_style_for_notification.' '.$computer_variable.'" style="position:fixed;right:0;bottom:0;padding-top:2%;padding-bottom:2%;padding-left:7%;padding-right:7%;'.$rounded_border_style_2.'">'.$website_notification_text_computer.$div_close."\n".

'<div id="notification_div_mobile" class="element_appear_from_bottom border '.$div_style_for_notification.' '.$mobile_variable.'" style="position:fixed;right:0;bottom: 0;padding-top:1%;padding-bottom:1%;padding-left:10%;padding-right:10%;'.$rounded_border_style_2.'">'.$website_notification_text_mobile.$div_close."\n";

$text = "Notifications";
$notifications_javascript_link = $website_function_javascript_folder.$text;

?>