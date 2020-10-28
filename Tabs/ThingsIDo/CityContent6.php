<?php 

$i = 4;
$i2 = $i + 2;
echo $computer_div;
echo '<a href="#'.$tabcodes[$i].'" style="float:left;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".'">'.$icons[28].'</button></a>'."\n";

echo '<a href="#'.$tabcodes[$i2].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i2]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$citycodes[0].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo $mobile_div;
echo '<a href="#'.$tabcodesm[$i].'" style="float:left;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".'">'.$icons[28].'</button></a>'."\n";

echo '<a href="#'.$tabcodesm[$i2].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i2]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$citycodes[0].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo '<br /><br />'."\n";

echo $computer_div."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:1%;margin-left:3%;margin-right:3%;">'.$tabdescriptions[4].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:3%;">'.'<b>'.$tabsubdescs[4].': '.'</b>'.$pc."\n";

echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $div_close."\n";

echo $mobile_div."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:7%;">'.$tabdescriptions[4].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo $margin."\n";
echo $margin3."\n";
echo '<p style="margin-bottom:7%;">'.'<b>'.$tabsubdescs[4].': '.'</b>'.$pc."\n";

echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $div_close."\n";
echo $div_close."\n";

$i = 0;
while ($i <= $videosnumb) {
	echo $margin."\n";
	echo '<div class="border">'."\n";
	echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
	echo $div_zoom_animation.'<p></p><br />'.'<b>'.$videotitles[$i].':</b>'.$div_close.'<br /><p></p>'.'<hr class="'.$sitehr3.'" style="border-width:3px;border-color:'.$color.';border-style:solid;" />'."\n";
	echo '<br />'."\n";

	if ($showembeds2 == false) {
		echo $div_zoom_animation.'<a class="w3-text-black" target="_newtab" href="https://www.youtube.com/watch?v='.$youtubevideoids[$i].'">'.$videotitles[$i].'</a>'.$div_close.'<br /><p></p>'."\n";
	}

	if ($showembeds2 == true) {
		echo $videoembedsyoutube[$i]."\n";
	}

	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";

	$i++;
}

?>