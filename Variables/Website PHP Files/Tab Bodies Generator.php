<?php 

/*
$i = 0;
foreach ($tab_titles as $value) {
	$tab_html_titles[$i] = $div_zoom_animation.'<'.$h2_element.' class="w3-center"><p></p><br /><b>'.$value.'</b><br /><br /><p></p></'.$h2_element.'>'.$div_close.'<hr class="'.$alternative_tab_full_border.'" />'."\n";

	$i++;
}
*/

if ($use_custom_tab_titles_array == True) {
	Make_Tab_Titles($custom_tab_titles_array);
}

if ($use_custom_tab_titles_array == False) {
	Make_Tab_Titles();
}

?>