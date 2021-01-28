<?php 

$selected_year = 2018;
$current_year = $selected_year;

$tabcode = 'watched'.'-'.strtolower($archived_text).' '.strtolower($current_variable_year);
$tabcode_mobile = 'watched'.'-'.strtolower($archived_text).' '.strtolower($current_variable_year).'_mobile';

$tab_content = $selected_website_folder.'Watched '.$current_year.' Content.php';
$tab_content_mobile = $selected_website_folder.'Watched '.$current_year.' Content.php';

require $city_template_php;

$current_year = $current_year_backup;

?>