<?php 

$i = 0;
$i2 = $i + 1;
echo '<div class="'.$computer_variable.'">';
echo '<a href="#'.$website_tab_codes_computer[$i2].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_computer[$i2]."')".'">'.$icons[29].'</button></a>'."\n";
echo $div_close."\n";

echo '<div class="'.$mobile_variable.'">';
echo '<a href="#'.$website_tab_codes_mobile[$i2].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[$i2]."')".'">'.$icons[29].'</button></a>'."\n";
echo $div_close."\n";

echo '<br /><br />';

echo '<div class="'.$computer_variable.'">'."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:1%;margin-left:3%;margin-right:3%;">'.$tabdescriptions[4].$pc."\n";
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

echo '<div class="'.$mobile_variable.'">'."\n";
echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:7%;">'.$tabdescriptions[4].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:7%;">'.'<b>'.$tabsubdescs[4].': '.'</b>'.$pc."\n";

echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $div_close."\n";

$i = 0;
while ($i <= $watched_videos_number) {
	echo $margin."\n";
	echo '<div class="border">'."\n";
	echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
	echo '<p></p><br />'.'<b>'.$videotitles[$i].':</b>'.'<br /><br /><p></p>'.'<hr class="'.$sitehr3.'" style="border-width:3px;border-color:'.$color.';border-style:solid;" />'."\n";

	if ($showembeds2 == True) {
		echo $videoembedsyoutube[$i]."\n";
	}

	echo $div_close."\n";
	echo $div_close."\n";
	echo $div_close."\n";

	$i++;
}

?>