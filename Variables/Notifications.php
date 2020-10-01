<?php 

if ($sitename == $sitenazzevo) {
	$textstylefornotif = $textstyleinvert;
	$buttonstylefornotif = $btnstyle;
}

if ($sitename != $sitenazzevo) {
	$textstylefornotif = $textstyle2;
	$buttonstylefornotif = $btnstyle2;
}

#Computer Site notification div and text
$website_notification_text = '<h3>'.
'<span id="notificationclose" class="w3-btn '.$buttonstylefornotif.' '.$cssbtn1.'" style="'.$notifbtncss1.$roundedborderstyle2.'box-shadow: 0 9px black!important;">'.'X'.$spanc.
$notificationtext.' '.$icons[13].
'<b>'.'<span style="margin-left:2%;">'.$reviewedcapcode.$spanc.'</b>'.
'</h3>';

#Mobile Site notification div and text
$website_notification_text_mobile = '<h4>'.
'<span id="notificationclosem" class="w3-btn '.$buttonstylefornotif.' '.$cssbtn1.'" style="'.$notifbtncss2.$roundedborderstyle2.'box-shadow: 0 9px black!important;">'.'X'.$spanc.
'<br /><br />'.
'<b>'.' '.$notificationtext.' '.$icons[13].'</b>'.'<br /><br />'.
'<b>'.$reviewedcapcode.'</b>'.
'</h4>';

#Site notification definer
$sitenotification = '<div id="notificationdiv" onload="ChangeTitle();" class="stake2animatebottom border '.$textstylefornotif.' '.$computervar.'" style="position:fixed;right:0;bottom:0;padding-top:2%;padding-bottom:2%;padding-left:7%;padding-right:7%;'.$roundedborderstyle2.'">'.$website_notification_text.$divc."\n".

'<div id="notificationdivm" onload="ChangeTitle();" class="stake2animatebottom border '.$textstylefornotif.' '.$mobilevar.'" style="position:fixed;right:0;bottom: 0;padding-top:1%;padding-bottom:1%;padding-left:10%;padding-right:10%;'.$roundedborderstyle2.'">'.$website_notification_text_mobile.$divc."\n";

?>