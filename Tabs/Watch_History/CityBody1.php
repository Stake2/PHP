<?php

$tab_header = $tab_names[0].Create_Element("span", $text_yellow_css_class, " [".$current_year_watched_number_text."]").": ".$icons[5];

$city_titles[0] = '
<div class="'.$computer_variable.'">'.$every_watched_button_computer.$div_close.
'<div class="'.$mobile_variable.'">'.$every_watched_button_mobile.$div_close.
'<hr class="'.$header_full_border.'" />
'.$div_zoom_animation.
'<'.$h2_element.' class="'.$computer_variable.'"><p></p><br /><b>'.'<span class="'.$first_text_color." ".$computer_variable.'">'.$tab_header.'</b><br /><p></p></'.$h2_element.'>'.
'<'.$h4_element.' class="'.$mobile_variable.'"><p></p><br /><b>'.'<span class="'.$first_text_color." ".$mobile_variable.'">'.$tab_header.'</b><br /><p></p></'.$h4_element.'>'.
$div_close.'<hr class="'.$header_full_border.'" />'."\n";
$city_bodies[0] = '';

?>