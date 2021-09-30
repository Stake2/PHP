<?php 

$i = 7;
$i2 = $i + 2;
echo '<div class="'.$computer_variable.'">';
echo '<a href="#'.$website_tab_codes_computer[$i].'" style="float:left;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_computer[$i]."')".'">'.$icons[28].'</button></a>'."\n";

echo '<a href="#'.$website_tab_codes_computer[$i2].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_computer[$i2]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$citycodes[1].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$citycodes[1]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo '<div class="'.$mobile_variable.'">';
echo '<a href="#'.$website_tab_codes_mobile[$i].'" style="float:left;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[$i]."')".'">'.$icons[28].'</button></a>'."\n";

echo '<a href="#'.$website_tab_codes_mobile[$i2].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[$i2]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$citycodes[1].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$citycodes[1]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo '<br /><br />';

echo '<div class="'.$computer_variable.'">'."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:1%;margin-left:3%;margin-right:3%;">'.$tabdescriptions[7].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
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
echo '<p style="margin-bottom:7%;">'.$tabdescriptions[7].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
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

echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $div_close."\n";

?>