<?php 

$i = 8;
echo '<div class="'.$computer_variable.'">';
echo '<a href="#'.$website_tab_codes_computer[$i].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_computer[$i]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$tab_codes[1].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$tab_codes[1]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo '<div class="'.$mobile_variable.'">';
echo '<a href="#'.$website_tab_codes_mobile[$i].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[$i]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$tab_codes[1].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$tab_codes[1]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo '<br /><br />';

echo '<div class="'.$computer_variable.'">'."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:1%;margin-left:3%;margin-right:3%;">'.$tabdescriptions[6].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo '<a name="playlist"></a>'."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:3%;">'.'<b>'.$tabsubdescs[6].' '.'</b>'.$pc."\n";

echo $margin3."\n";
echo '<a href="#music"><button class="w3-btn w3-grey '.$cssbtn1.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_computer[11]."')".'">'.$website_tab_titles_computer[11].'</button></a>'."\n";
echo '<a href="#playlist"><button class="w3-btn w3-yellow '.$cssbtn1.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_computer[12]."')".'">'.$website_tab_titles_computer[12].'</button></a>'."\n";
echo '<br /><br />'."\n";
echo $div_close."\n";

echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $div_close."\n";

echo '<div class="'.$mobile_variable.'">'."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:7%;">'.$tabdescriptions[6].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:7%;">'.'<b>'.$tabsubdescs[6].' '.'</b>'.$pc."\n";

echo '<a name="playlistm"></a>'."\n";
echo $margin3."\n";
echo '<a href="#musicm"><button class="w3-btn w3-grey '.$cssbtn1.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[11]."')".'">'.$website_tab_titles_mobile[11].'</button></a>'."\n";
echo '<a href="#playlistm"><button class="w3-btn w3-yellow '.$cssbtn1.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[12]."')".'">'.$website_tab_titles_mobile[12].'</button></a>'."\n";
echo '<br /><br />'."\n";
echo $div_close."\n";

echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $div_close."\n";

$i = 0;
while ($i <= $playlistsnumb) {
	echo $margin."\n";
	echo '<div class="border">'."\n";
	echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
	echo $div_zoom_animation.'<p></p><br />'.'<b>'.$playlisttitles[$i].':</b>'.$div_close.'<br /><p></p>'.'<hr class="'.$sitehr3.'" style="border-width:3px;border-color:'.$color.';border-style:solid;" />'."\n";

	if ($showembeds == false or $showplaylistembed == True) {
		echo $div_zoom_animation.'<p></p><br /><a class="w3-text-blue" target="_newtab" href="https://www.youtube.com/playlist?list='.$youtubeplaylistids[$i].'">'.$playlisttitles[$i].'</a><br /><br /><p></p>'.$div_close."\n";
	}

	if ($showembeds == True) {
		echo $playlistembedsyoutube[$i].'<br />'."\n";
	}

	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";

	$i++;
}

?>