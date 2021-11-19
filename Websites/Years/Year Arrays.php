<?php 

$years_array = array();
$year_websites_links = array();

$current_variable_year = 2018;

$i = 0;
while ($current_variable_year <= $current_year - 1) {
	$local_website_title = $website_titles[(string)$current_variable_year];
	$local_website_link = $main_website_url."Years/".$local_website_title."/";

	array_push($years_array, $local_website_title);
	$year_websites_links[(string)$current_variable_year] = $local_website_link;

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