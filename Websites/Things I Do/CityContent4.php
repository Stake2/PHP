<?php 

$i = 2;
$i2 = $i + 2;
echo $computer_div;
echo '<a href="#'.$website_tab_codes_computer[$i].'" style="float:left;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_computer[$i]."')".'">'.$icons[28].'</button></a>'."\n";

echo '<a href="#'.$website_tab_codes_computer[$i2].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_computer[$i2]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$tab_codes[0].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$tab_codes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo $mobile_div;
echo '<a href="#'.$website_tab_codes_mobile[$i].'" style="float:left;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[$i]."')".'">'.$icons[28].'</button></a>'."\n";

echo '<a href="#'.$website_tab_codes_mobile[$i2].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[$i2]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$tab_codes[0].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$tab_codes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo '<br /><br />';

echo $computer_div."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:1%;margin-left:3%;margin-right:3%;">'.$tabdescriptions[2].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo '<p style="margin-bottom:3%;">'.'<b>'.$tabsubdescs[2].': '.'</b>'.$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

$i = 0;
$c = 0;
$websites_number = $websites_number;
while ($c <= $websites_number) {
	echo $websites_buttons_array[$i]."\n";

	$i++;
	$c++;
}

echo $div_close."\n";

echo $mobile_div."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:7%;">'.$tabdescriptions[2].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo '<p style="margin-bottom:7%;">'.'<b>'.$tabsubdescs[2].': '.'</b>'.$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

$i = 0;
$c = 0;
$websites_number = $websites_number;
while ($c <= $websites_number) {
	echo $websites_buttons_mobile[$i]."\n";

	$i++;
	$c++;
}

echo $div_close."\n";

?>