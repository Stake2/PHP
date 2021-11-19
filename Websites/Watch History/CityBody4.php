<?php

$tab_header = $tab_names[3].Create_Element("span", $text_yellow_css_class, " [".$archived_medias_number."]").": ".$icons[8];

$city_titles[3] = '
<div class="'.$computer_variable.'">'.$every_watched_button_computer.$div_close."\n".
'<div class="'.$mobile_variable.'">'.$every_watched_button_mobile.$div_close."\n".
'<hr class="'.$header_full_border.'" />
'.$div_zoom_animation.'<'.$h2_element.'><p></p><br /><b>'.$tab_header.'</b><br /><br /><p></p></'.$h2_element.'>'.$div_close.'
<hr class="'.$header_full_border.'" />'."\n";
$city_bodies[3] = $div_zoom_animation.'<div class="'.$computer_variable.'">'.$archived_media_buttons.$div_close."\n".
'<div class="'.$mobile_variable.'">'.$archived_media_mobile_buttons.$div_close.$div_close.$div_close;

?>