<?php 

$current_variable_year = 2018;
$current_year_local = $current_year;

if ($php_settings["allow_current_year"] == False) {
	$current_year_local = $current_year - 1;	
}

while ($current_variable_year <= $current_year_local) {
	if ((int)$local_current_year != $current_variable_year) {
		$year_link = $website_links[$current_variable_year];

		Show(Make_Website_Button($year_link, Language_Item_Definer("My", "Meu")." ".$current_variable_year, $first_button_style, ": ".$icons_array["calendar"]), $add_br = True);
	}

	if ((int)$local_current_year == $current_variable_year) {
		Show(Make_Website_Button("return false;", Language_Item_Definer("My", "Meu")." ".$current_variable_year, $first_button_style, ": ".$icons_array["calendar"]." (".Language_Item_Definer("You are here", "Você está aqui").")"), $add_br = True);
	}

	$current_variable_year++;
}

?>