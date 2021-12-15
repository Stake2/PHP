<?php 

$websites_tab_button_icon = '<i class="fas fa-globe-americas"></i>';

$websites_tab_button_name = Language_Item_Definer("Websites", "Sites");
$websites_tab_code = Language_Item_Definer($websites_tab_button_name." tab", "Aba de ".$websites_tab_button_name);
$websites_tab_button_name .= ": ";

$websites_tab_button_computer = Create_Element("span", $computer_variable, "\n".Create_Element("a", "", "\n".Create_Element("button", "w3-btn ".$first_button_style, Create_Element("h2", "", "\n".$websites_tab_button_name.$websites_tab_button_icon), 'id="websites_tab_button" '.$roundedborderstyle.' alt="'.$websites_tab_code.'" title="'.$websites_tab_code.'" onclick="Hide_Computer_Buttons();openCity('."'".$websites_tab_code."'".');Define_Button('."'".'websites_tab_button'."'".');Change_Button_Color();"'), "href=\"#".$websites_tab_code."\"")."\n");

$websites_tab_button_mobile = Create_Element("span", $mobile_variable, "\n".Create_Element("a", "", "\n".Create_Element("button", "w3-btn ".$first_button_style, Create_Element("h4", "", "\n".$websites_tab_button_name.$websites_tab_button_icon), 'id="websites_tab_button" '.$roundedborderstyle.' alt="'.$websites_tab_code.'" title="'.$websites_tab_code.'" onclick="Hide_Computer_Buttons();openCity('."'".$websites_tab_code."'".');Define_Button('."'".'websites_tab_button'."'".');Change_Button_Color();"'), "href=\"#".$websites_tab_code."\"")."\n");

?>