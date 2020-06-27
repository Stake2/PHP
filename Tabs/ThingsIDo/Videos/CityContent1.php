<?php 

$i = 0;
$i2 = $i + 1;
echo '<div class="'.$computervar.'">';
echo '<a href="#'.$tabcodes[$i2].'" style="float:right;"><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i2]."')".'">'.$icons[29].'</button></a>'."\n";
echo $divc."\n";

echo '<div class="'.$mobilevar.'">';
echo '<a href="#'.$tabcodesm[$i2].'" style="float:right;"><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i2]."')".'">'.$icons[29].'</button></a>'."\n";
echo $divc."\n";

echo '<br /><br />';

echo '<div class="'.$computervar.'">'."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">'."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:1%;margin-left:3%;margin-right:3%;">'.$tabdescriptions[4].$pc."\n";
echo $divc."\n";
echo $divc."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:3%;">'.'<b>'.$tabsubdescs[4].': '.'</b>'.$pc."\n";

echo $divc."\n";
echo $divc."\n";
echo $divc."\n";
echo $divc."\n";

echo $divc."\n";

echo '<div class="'.$mobilevar.'">'."\n";
echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">'."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:7%;">'.$tabdescriptions[4].$pc."\n";
echo $divc."\n";
echo $divc."\n";
echo $divc."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:7%;">'.'<b>'.$tabsubdescs[4].': '.'</b>'.$pc."\n";

echo $divc."\n";
echo $divc."\n";
echo $divc."\n";
echo $divc."\n";

echo $divc."\n";

$i = 0;
while ($i <= $videosnumb) {
	echo $margin."\n";
	echo '<div class="border">'."\n";
	echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">'."\n";
	echo '<p></p><br />'.'<b>'.$videotitles[$i].':</b>'.'<br /><br /><p></p>'.'<hr class="'.$sitehr3.'" style="border-width:3px;border-color:'.$color.';border-style:solid;" />'."\n";

	if ($showembeds2 == true) {
		echo $videoembedsyoutube[$i]."\n";
	}

	echo $divc."\n";
	echo $divc."\n";
	echo $divc."\n";

	$i++;
}

?>