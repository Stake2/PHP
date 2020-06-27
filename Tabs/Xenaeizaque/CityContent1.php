<?php 

$i = 0;
$c = 0;
$array = $tabdescriptions;
while ($c <= count($array) - 1) {
	echo $array[$i].'<br />'."\n";

	$i++;
	$c++;
}

echo '<br />'."\n";
echo '<div class="'.$computervar.'" style="'.$border2.$roundborderstyle6.'">'.$videoembeds[0].$divc."\n";
echo '<div class="'.$mobilevar.'" style="'.$border2.$roundborderstyle6.'">'.$videoembedsm[0].$divc."\n";

$i = 0;
while ($i <= count($tabimages) - 1) {
	echo '<br /><br />'."\n";

	echo $computerdiv.'<img src="'.$tabimages[$i].'" width="85%" style="'.$border2.$roundborderstyle6.'" />'.'<br /><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="window.open('."'".$tabimages[$i]."'".')">'.'<'.$m.'>'.ucfirst($imglinktxt).': '.$icons[2].'</'.$m.'>'.'</button>'.$divc."\n";

	echo $mobilediv.'<img src="'.$tabimages[$i].'"  width="100%" style="'.$border2.$roundborderstyle6.'" />'.'<br /><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="window.open('."'".$tabimages[$i]."'".')">'.'<'.$m.'>'.ucfirst($imglinktxt).': '.$icons[2].'</'.$m.'>'.'</button>'.$divc."\n";

	$i++;
}

?>