<?php 

#SiteButton icon, name and button vars
$sitebtnicon = '<i class="fas fa-globe-americas"></i>';
$sitebtnname = 'Sites: ';

if ($lang == $langs[0] or $lang == $langs[1]) {
	$sitestabscode = 'Websites tab';
}

if ($lang == $langs[2]) {
	$sitestabscode = 'Aba de sites';
}

$sitebtn = '<center>'."\n".'<a href="#'.$sitestabscode.'"><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' alt="'.$sitestabscode.'" title="'.$sitestabscode.'" onclick="openCity('."'".$sitestabscode."'".')"><'.$n.'>'.$sitebtnname.$sitebtnicon.'</'.$n.'></button></a>'."\n".'</center>';

$sitebtn2 = '<a href="#'.$sitestabscode.'"><button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' alt="'.$sitestabscode.'" title="'.$sitestabscode.'" onclick="openCity('."'".$sitestabscode."'".')"><'.$n.'>'.$sitebtnname.$sitebtnicon.'</'.$n.'></button></a>';

?>