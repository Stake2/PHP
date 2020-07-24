<?php 

$i = 3;
echo $computer_div."\n";
echo '<a class="link" href="#'.$tabcodes[$i].'" style="float:right;"><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodes[$i]."')".'">'.$icons[29].'</button></a>'."\n";
echo '<a class="link" href="#'.$citycodes[0].'"><button class="w3-btn '.$btnstyle.'" style="float:left;margin-left:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $divc."\n";

echo '<div class="'.$mobilevar.'">';
echo '<a class="link" href="#'.$tabcodesm[$i].'" style="float:right;"><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="openCity('."'".$tabcodesm[$i]."')".'">'.$icons[29].'</button></a>'."\n";
echo '<a class="link" href="#'.$citycodes[0].'"><button class="w3-btn '.$btnstyle.'" style="float:left;margin-left:15px;'.$roundedborderstyle2.'" onclick="openCity('."'".$citycodes[0]."')".'"><h3>'.$icons[16].'</h3></button></a>'."\n";
echo $divc."\n";

echo '<br /><br />'."\n";

echo $computer_div."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:1%;">'.$tabdescriptions[1].$pc."\n";
echo $divc."\n";
echo $divc."\n";
echo $divc."\n";

echo $margin."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">';
echo '<p style="margin-bottom:3%;">'.'<b>'.$tabsubdescs[1].': '.'</b>'.$pc."\n";
echo $divc."\n";
echo $divc."\n";
echo $divc."\n";

include $storiesglobal;

echo $divc."\n";

echo $mobile_div."\n";
echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">'."\n";
echo $margin."\n";
echo '<p style="margin-top:2%;">'.'<b>'.$tabsubdescs[0].': '.'</b>'.$pc."\n";
echo '<p style="margin-bottom:7%;">'.$tabdescriptions[1].$pc."\n";
echo $divc."\n";
echo $divc."\n";
echo $divc."\n";


echo $margin."\n";
echo '<div class="'.$textstyle2.'" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle2.'">';
echo $margin."\n";
echo '<p style="margin-bottom:7%;">'.'<b>'.$tabsubdescs[1].': '.'</b>'.$pc."\n";
echo $divc."\n";
echo $divc."\n";
echo $divc."\n";

include $storiesglobal;

echo $divc."\n";

?>