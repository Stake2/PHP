<?php 

$websites_tab_button_icon = '<i class="fas fa-globe-americas"></i>';

$websites_tab_button_name = Language_Item_Definer("Websites", "Sites").": ";
$websites_tab_code = Language_Item_Definer($websites_tab_button_name." tab", "Sites de ".$websites_tab_button_name).": ";

$websites_tab_button_centered = '<center>'."\n".'<a href="#'.$websites_tab_code.'"><button id="websites_tab_button" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' alt="'.$websites_tab_code.'" title="'.$websites_tab_code.'" onclick="openCity('."'".$websites_tab_code."'".');Define_Button('."'".'websites_tab_button'."'".');Change_Button_Color();"><'.$h2_element.'>'.$websites_tab_button_name.$websites_tab_button_icon.'</'.$h2_element.'></button></a>'."\n".'</center>';

$websites_tab_button_not_centered = '<a href="#'.$websites_tab_code.'"><button id="websites_tab_button" class="w3-btn '.$first_button_style.'" '.$roundedborderstyle.' alt="'.$websites_tab_code.'" title="'.$websites_tab_code.'" onclick="openCity('."'".$websites_tab_code."'".');Define_Button('."'".'websites_tab_button'."'".');Change_Button_Color();"><'.$h2_element.'>'.$websites_tab_button_name.$websites_tab_button_icon.'</'.$h2_element.'></button></a>';

?>