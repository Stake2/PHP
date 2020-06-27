<?php 

$i = 7;
$i2 = $i + 2;
echo '<div class="'.$computervar.'">';
echo '<a href="#'.$tabcodes[$i].'" style="float:left;"><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".'">'.$icons[28].'</button></a>'."\n";

echo '<a href="#'.$tabcodes[$i2].'" style="float:right;"><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i2]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$citycodes[1].'"><button class="w3-btn '.$btnstyle.'" style="float:left;margin-left:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$citycodes[1]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $divc."\n";

echo '<div class="'.$mobilevar.'">';
echo '<a href="#'.$tabcodesm[$i].'" style="float:left;"><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".'">'.$icons[28].'</button></a>'."\n";

echo '<a href="#'.$tabcodesm[$i2].'" style="float:right;"><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i2]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$citycodes[1].'"><button class="w3-btn '.$btnstyle.'" style="float:left;margin-left:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$citycodes[1]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $divc."\n";

echo '<br /><br />';

echo '<div class="'.$computervar.'">'."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:1%;margin-left:3%;margin-right:3%;">'.$tabdescriptions[7].$pc."\n";
echo $divc."\n";
echo $divc."\n";
echo $divc."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:3%;">'.'<b>'.$tabsubdescs[7].': '.'</b>'.$pc."\n";

$i = 0;
while ($i <= $socialmedianumb - 1) {
	if ($i == 14) {
		echo "<b>:')</b>".'<br /><br />'."\n";
	}

	$socialmediabtns[$i] = '<button class="w3-btn '.$cssbtn1.' '.$socialmediacolors[$i].'" '.$roundedborderstyle.' onclick="window.open('."'".$socialmedialinks[$i]."')".'">'.$socialmediatxts[$i].'</button>'.'<br /><br />'."\n";

	echo '<button class="w3-btn '.$cssbtn1.' '.$socialmediacolors[$i].'" '.$roundedborderstyle.' onclick="window.open('."'".$socialmedialinks[$i]."')".'">'.$socialmediatxts[$i].'</button>'.'<br /><br />'."\n";

	$i++;
}

echo $divc."\n";
echo $divc."\n";
echo $divc."\n";
echo $divc."\n";

echo $divc."\n";

echo '<div class="'.$mobilevar.'">'."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:7%;">'.$tabdescriptions[7].$pc."\n";
echo $divc."\n";
echo $divc."\n";
echo $divc."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:7%;">'.'<b>'.$tabsubdescs[7].': '.'</b>'.$pc."\n";

$i = 0;
while ($i <= $socialmedianumb - 1) {
	if ($i == 14) {
		echo "<b>:')</b>".'<br /><br />'."\n";
	}

	echo '<button class="w3-btn '.$cssbtn1.' '.$socialmediacolors[$i].'" '.$roundedborderstyle.' onclick="window.open('."'".$socialmedialinks[$i]."')".'">'.$socialmediatxts[$i].'</button>'.'<br /><br />'."\n";

	$i++;
}

echo $divc."\n";
echo $divc."\n";
echo $divc."\n";
echo $divc."\n";

echo $divc."\n";

?>