<?php 

$i = 5;

echo $computer_div."\n";
echo '<a href="#'.$website_tab_codes_computer[$i].'" style="float:left;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_computer[$i]."')".'">'.$icons[28].'</button></a>'."\n";
echo '<a href="#'.$tab_codes[0].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$tab_codes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo $mobile_div;
echo '<a href="#'.$website_tab_codes_mobile[$i].'" style="float:left;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$website_tab_codes_mobile[$i]."')".'">'.$icons[28].'</button></a>'."\n";
echo '<a href="#'.$tab_codes[0].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$tab_codes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo '<br /><br />'."\n";

echo $computer_div."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:1%;margin-left:3%;margin-right:3%;">'.$tabdescriptions[5].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:3%;">'.'<b>'.$tabsubdescs[5].': '.'</b>'.$pc."\n";

echo $bluespan.'<a class="link" href="'.$links[1].'">'.$links[1].'</a>'.$spanc;

#$i = 0;
#while ($i <= $imgnumb) {
#	echo $margin3."\n";
#	echo '<div class="border">'."\n";
#
#	echo '<a href="'.$drawingimgs[$i].'">'.'<img src="'.$drawingimgs[$i].'" />'.'</a>'."\n";
#
#	echo $div_close."\n";
#	echo $div_close."\n";
#
#	$i++;
#}

echo '<br /><br />'."\n"."\n";

$dir = $imageswebfolder;
$x = 0;
$z = 0;
echo $dir;
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			$files[$z] = $cdn_image_drawings.$file;
            #echo $dir.$file."<br />";
			$x++;
			$z++;
        }
        closedir($dh);
    }
}

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
echo '<p style="margin-bottom:7%;">'.$tabdescriptions[5].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:7%;">'.'<b>'.$tabsubdescs[5].': '.'</b>'.$pc."\n";

echo $bluespan.'<a class="link" href="'.$links[1].'">'.$links[1].'</a>'.$spanc;

echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $div_close."\n";

$i = 2;
while ($i <= $imgnumb) {
	echo $margin."\n";
	echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";

	echo '<a class="link" href="'.$files[$i].'">'.'<img src="'.$files[$i].'" width="80%" height="70%" />'.'</a>'.'<br />'."\n";

	echo $div_close."\n";
	echo $div_close."\n";

	$i++;
}

?>