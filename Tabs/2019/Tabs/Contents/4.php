<?php 

echo $div_zoom_animation."\n";

$current_variable_year = 2018;
$local_current_year = $current_year - 1;

while ($current_variable_year <= $local_current_year) {
	if ((int)$local_website_name != $current_variable_year) {
		$year_link = $website_links[$current_variable_year];

		Show(Make_Website_Button($year_link, Language_Item_Definer("My", "Meu")." ".$current_variable_year, $first_button_style, ": ".$icons_array["calendar"]), $add_br = True);
	}

	else {
		Show("-----", $add_br = True);
		Show(Language_Item_Definer("My", "Meu")." ".$current_variable_year." (".Language_Item_Definer("You are here", "Você está aqui").")".".", $add_br = True);
		Show("-----", $add_br = True);
	}

	$current_variable_year++;
}

echo $div_close."\n";

?>