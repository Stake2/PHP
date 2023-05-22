<?php

$tab_header = $tab_names[2].Create_Element("span", $text_yellow_css_class, " [".$watched_movies_number."]").": ".$icons[19];

$tab_html_titles[2] = '
<div class="'.$computer_variable.'">'.$every_watched_button_computer.$div_close.
'<div class="'.$mobile_variable.'">'.$every_watched_button_mobile.$div_close.
'<hr class="'.$header_full_border.'" />
'.$div_zoom_animation.'<'.$h2_element.'><p></p><br /><b>'.$tab_header.'</b><br /><br /><p></p></'.$h2_element.'>'.$div_close.'<hr class="'.$header_full_border.'" />'."\n";
$tab_bodies[2] = '';

?>