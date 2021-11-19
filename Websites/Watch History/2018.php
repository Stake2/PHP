<?php 

$selected_year = 2018;
$local_current_year = $selected_year;

$tabcode = "Watched_".strtolower($archived_text)."_".strtolower($current_variable_year).'_Computer';
$tabcode_mobile = "Watched_".strtolower($archived_text)."_".strtolower($current_variable_year).'_Mobile';

$tab_content = $archived_media_machine_php;
$tab_content_mobile = $archived_media_machine_php;

require $city_template_php;

$local_current_year = $current_year_backup;

?>