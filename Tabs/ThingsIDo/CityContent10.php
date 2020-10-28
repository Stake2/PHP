<?php 

$i = 8;
$i2 = $i + 2;
echo '<div class="'.$computer_variable.'">'."\n";
echo '<a href="#'.$tabcodes[$i].'" style="float:left;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".'">'.$icons[28].'</button></a>'."\n";

echo '<a href="#'.$tabcodes[$i2].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i2]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$citycodes[1].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$citycodes[1]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo '<div class="'.$mobile_variable.'">'."\n";
echo '<a href="#'.$tabcodesm[$i].'" style="float:left;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".'">'.$icons[28].'</button></a>'."\n";

echo '<a href="#'.$tabcodesm[$i2].'" style="float:right;"><button class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i2]."')".'">'.$icons[29].'</button></a>'."\n";

echo '<a href="#'.$citycodes[1].'"><button class="w3-btn '.$first_button_style.'" style="float:left;margin-left:15px;'.$rounded_border_style_2.'" onclick="openCity('."'".$citycodes[1]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $div_close."\n";

echo '<br /><br />'."\n";

echo '<div class="'.$computer_variable.'">'."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:1%;margin-left:3%;margin-right:3%;">'.$tabdescriptions[8].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:3%;">'.'<b>'.$tabsubdescs[8].': '.'</b>'.$pc."\n";

echo $websites_buttons_blue[3];

echo '<br />'."\n";

echo '<a href="#a2018"><button class="w3-btn w3-blue w3-text-black '.$cssbtn1.'" '.$roundedborderstyle.'><b>2018</b></button></a>'."\n";
echo '<a href="#a2019"><button class="w3-btn w3-blue w3-text-black '.$cssbtn1.'" '.$roundedborderstyle.'><b>2019</b></button></a>'."\n";
echo '<a href="#a2020"><button class="w3-btn w3-blue w3-text-black '.$cssbtn1.'" '.$roundedborderstyle.'><b>2020</b></button></a>'."\n";

echo '<br /><br />'."\n";

echo '<div class="border" '.$roundedborderstyle.'>'."\n";
echo $margin."\n";
echo '<a name="a2018"></a>'."\n";
echo '<'.$n.'><p></p><br /><b>'.'2018: '.'</b><br /><br /><p></p></'.$n.'>'."\n";
echo '<hr class="'.$sitehr3.'" style="border-width:3px;border-color:'.$color.';border-style:solid;" />'."\n";

$ano = 2018;
$thingsidofake = true;
$make2018medias = true;
$make2019medias = false;
$mediaarrayyear = $site2018;
$regeneratemedias2019 = false;
include $mediaarraygenerator;

$sitename2 = $website_name;
$website_name = $sitewatch;
$a2018text = true;
$a2019text = false;
#MediaReader imported from 2018.php (MediaReader 2018.php)
include $mediareader2018;
$website_name = $sitename2;

echo $div_close."\n";
echo $div_close."\n";

echo '<br /><br />'."\n";

echo '<div class="border" '.$roundedborderstyle.'>'."\n";
echo $margin."\n";
echo '<a name="a2019"></a>'."\n";
echo '<'.$n.'><p></p><br /><b>'.'2019: '.'</b><br /><br /><p></p></'.$n.'>'."\n";
echo '<hr class="'.$sitehr3.'" style="border-width:3px;border-color:'.$color.';border-style:solid;" />'."\n";

$ano = 2019;
$thingsidofake = true;
$make2018medias = false;
$make2019medias = true;
$reneneratemedias2019 = true;
$a2019 = false;
$mediaarrayyear = $site2019;
include $mediaarraygenerator;

$sitename2 = $website_name;
$website_name = $sitewatch;
#MediaReader imported from 2019.php (MediaReader 2019.php)
include $mediareader2019;
$website_name = $sitename2;

echo $div_close."\n";
echo $div_close."\n";

echo '<br /><br />'."\n";

echo '<div class="border" '.$roundedborderstyle.'>'."\n";
echo $margin."\n";
echo '<a name="a2020"></a>'."\n";
echo '<'.$n.'><p></p><br /><b>'.'2020: '.'</b><br /><br /><p></p></'.$n.'>'."\n";
echo '<hr class="'.$sitehr3.'" style="border-width:3px;border-color:'.$color.';border-style:solid;" />'."\n";

echo '<div style="text-align:left;">'."\n";

#Goes here
$thingsidofake = true;
$ano = 2020;
$sitename2 = $website_name;
$website_name = $sitewatch;
$mobileversion = false;

#TextFileReader.php file includer
include $textfilereaderphp;

#WatchedmMedia2020 Generator file includer
include $watchedmediageneratorphp;

$website_name = $sitename2;

echo $div_close."\n";

echo $div_close."\n";
echo $div_close."\n";

echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";



#Mobile version of the tab
echo '<div class="'.$mobile_variable.'">'."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:7%;">'.$tabdescriptions[8].$pc."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$rounded_border_style_2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-bottom:7%;">'.'<b>'.$tabsubdescs[8].': '.'</b>'.$pc."\n";

echo $websites_buttons_blue_mobile[3];

echo '<br />'."\n";

echo '<a href="#2018m"><button class="w3-btn w3-blue w3-text-black '.$cssbtn1.'" '.$roundedborderstyle.'><b>2018</b></button></a>'."\n";
echo '<a href="#2019m"><button class="w3-btn w3-blue w3-text-black '.$cssbtn1.'" '.$roundedborderstyle.'><b>2019</b></button></a>'."\n";
echo '<a href="#2020m"><button class="w3-btn w3-blue w3-text-black '.$cssbtn1.'" '.$roundedborderstyle.'><b>2020</b></button></a>'."\n";

echo '<br /><br />'."\n";

echo '<div class="border" '.$roundedborderstyle.'>'."\n";
echo $margin."\n";
echo '<br />'."\n";
echo '<a name="2018m"></a>'."\n";
echo '<b>2018</b><br />'."\n";
echo '<hr class="'.$sitehr3.'" style="border-width:3px;border-color:'.$color.';border-style:solid;" />'."\n";

$ano = 2018;
$thingsidofake = true;
$make2018medias = true;
$make2019medias = false;
$mediaarrayyear = $site2018;
include $mediaarraygenerator;

$sitename2 = $website_name;
$website_name = $sitewatch;
#MediaReader imported from 2018.php (MediaReader 2018.php)
include $mediareader2018;
$website_name = $sitename2;

echo $div_close."\n";
echo $div_close."\n";

echo '<br /><br />'."\n";

echo '<div class="border" '.$roundedborderstyle.'>'."\n";
echo $margin."\n";
echo '<br />'."\n";
echo '<a name="2019m"></a>'."\n";
echo '<b>2019</b><br />'."\n";
echo '<hr class="'.$sitehr3.'" style="border-width:3px;border-color:'.$color.';border-style:solid;" />'."\n";

$ano = 2019;
$thingsidofake = true;
$make2018medias = false;
$make2019medias = true;
$reneneratemedias2019 = true;
$a2019 = false;
$mediaarrayyear = $site2019;
include $mediaarraygenerator;

$sitename2 = $website_name;
$website_name = $sitewatch;
#MediaReader imported from 2019.php (MediaReader 2019.php)
include $mediareader2019;
$website_name = $sitename2;

echo $div_close."\n";
echo $div_close."\n";

echo '<br /><br />'."\n";

echo '<div class="border" '.$roundedborderstyle.'>'."\n";
echo $margin."\n";
echo '<br />'."\n";
echo '<a name="2020m"></a>'."\n";
echo '<b>2020</b><br />'."\n";
echo '<hr class="'.$sitehr3.'" style="border-width:3px;border-color:'.$color.';border-style:solid;" />'."\n";

echo $margin."\n";
echo '<div style="text-align:left;">'."\n";

$thingsidofake = true;
$ano = 2020;
$sitename2 = $website_name;
$website_name = $sitewatch;
$mobileversion = true;

#TextFileReader.php file includer
include $textfilereaderphp;

#WatchedmMedia2020 Generator file includer
include $watchedmediageneratorphp;

$website_name = $sitename2;

echo $div_close."\n";
echo $div_close."\n";

echo $div_close."\n";
echo $div_close."\n";

echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";
echo $div_close."\n";

echo $div_close."\n";

?>