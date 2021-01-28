<?php 

#Websites Tab icon, name and button variables

$websites_tab_button_icon = '<i class="fas fa-globe-americas"></i>';

if (in_array($website_language, $en_languages_array)) {
	$websites_tab_button_name = 'Websites: ';
	$websites_tab_code = 'Websites tab';
}

if (in_array($website_language, $pt_languages_array)) {
	$websites_tab_button_name = 'Sites: ';
	$websites_tab_code = 'Aba de sites';
}

$websites_tab_button_centered = '<center>'."\n".'<a href="#'.$websites_tab_code.'"><button id="websites_tab_button" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' alt="'.$websites_tab_code.'" title="'.$websites_tab_code.'" onclick="openCity('."'".$websites_tab_code."'".');Define_Button('."'".'websites_tab_button'."'".');Change_Button_Color();"><'.$n.'>'.$websites_tab_button_name.$websites_tab_button_icon.'</'.$n.'></button></a>'."\n".'</center>';

$websites_tab_button_not_centered = '<a href="#'.$websites_tab_code.'"><button id="websites_tab_button" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' alt="'.$websites_tab_code.'" title="'.$websites_tab_code.'" onclick="openCity('."'".$websites_tab_code."'".');Define_Button('."'".'websites_tab_button'."'".');Change_Button_Color();"><'.$n.'>'.$websites_tab_button_name.$websites_tab_button_icon.'</'.$n.'></button></a>';

?>