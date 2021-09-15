<?php 

$years_array = array();
$year_websites_links = array();

$current_variable_year = 2018;

$i = 0;
while ($current_variable_year <= $current_year - 1) {
	array_push($years_array, ${"website_".$current_variable_year});
	array_push($years_array, $main_website_url."/Years/".${"website_".$current_variable_year}.'/');

    $current_variable_year++;
	$i++;
}

$years_number = count($year_websites_links) - 1;

$current_variable_year = 2018;

$i = 0;
while ($current_variable_year <= $current_year - 1) {
	${"year_".$current_variable_year} = $years_array[$i];

    $current_variable_year++;
	$i++;
}

?>