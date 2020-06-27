<?php 

$i = 0;
$yearbtns = array();
$yearbtnsm = array();

while ($i <= $yearnumb) {
	$yearbtns[$i] = '<button class="w3-btn '.$color2.' w3-text-black '.$cssbtn1.' '.$computervar.'" onclick='.'"window.open('."'".$yeartabcode[$i]."');".'"'."><".$n.">".$yeartabtxt[$i].": ".$icons[3]."</".$n."></button>"."\n";
	
	echo $yearbtns[$i];
	$i++;
}

echo "\n";

$i = 0;

while ($i <= $yearnumb) {
	$yearbtnsm[$i] = '<button class="w3-btn '.$color2.' w3-text-black '.$cssbtn1.' '.$mobilevar.'" onclick='.'"window.open('."'".$yeartabcode[$i]."');".'"'."><".$m.">".$yeartabtxt[$i].": ".$icons[3]."</".$m."></button>"."\n";
	
	echo $yearbtnsm[$i];
	$i++;
}

?>