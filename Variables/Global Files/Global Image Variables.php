<?php 

if ($sitetype1 == $types[1]) {
	$br = '<br />';
	$border2 = 'border-width:3px;border-color:'.$bordercolor.';border-style:solid;';
}

else {
	$br = '<br /><br />';
	$border2 = 'border-width:3px;border-color:'.$bordercolor.';border-style:solid;';
}

if ($sitename == $sitepequenata) {
	$mainimage = '<img src="'.$imglink.'" width="'.$imagesize1.'%" class="'.$colortext.' '.$computervar.'" style="'.$border2.''.$roundedborderstyle4.'" />';
	$mainimagem = '<img src="'.$imglink.'" width="'.$imagesize2.'%" class="'.$colortext.' '.$mobilevar.'" style="'.$border2.''.$roundedborderstyle4.'" />';
}

else {
	$mainimage = '<img src="'.$imglink.'" width="'.$imagesize1.'%" class="'.$colortext.' '.$computervar.'" style="'.$border2.''.$roundedborderstyle2.'" />';
	$mainimagem = '<img src="'.$imglink.'" width="'.$imagesize2.'%" class="'.$colortext.' '.$mobilevar.'" style="'.$border2.''.$roundedborderstyle2.'" />';
}

$imgbtn = '<div class="'.$computervar.'">'.'<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="window.open('."'".$imglink."'".')">'.'<'.$m.'>'.ucfirst($imglinktxt).': '.$icons[2].'</'.$m.'>'.'</button>'.$divc;
$imgbtnm = '<div class="'.$mobilevar.'">'.'<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="window.open('."'".$imglink."'".')">'.'<'.$m.'>'.ucfirst($imglinktxt).': '.$icons[2].'</'.$m.'>'.'</button>'.$divc;

$imagens = $mainimage."\n".$imgbtn.
"\n".
$mainimagem."\n".$imgbtnm.
"\n";

?>