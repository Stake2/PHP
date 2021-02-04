<?php 

#Year websites array
$years_array = array(
#$website_2018,
#$website_2019,
#$website_2020,
#$website_2021,
);

#Links for the year websites
$year_websites_links = array(
#$main_website_url.'/'.$years_folder_variable.'/'.$website_2018.'/', 
#$main_website_url.'/'.$years_folder_variable.'/'.$website_2019.'/', 
#$main_website_url.'/'.$years_folder_variable.'/'.$website_2020.'/',
#$main_website_url.'/'.$years_folder_variable.'/'.$website_2021.'/',
);

$current_variable_year = 2018;

$i = 0;
while ($current_variable_year <= $current_year) {
	array_push($years_array, ${"website_".$current_variable_year});
	array_push($years_array, $main_website_url.'/'.$years_folder_variable.'/'.${"website_".$current_variable_year}.'/');

    $current_variable_year++;
	$i++;
}

$years_number = count($year_websites_links) - 1;

$current_variable_year = 2018;

$i = 0;
while ($current_variable_year <= $current_year) {
	${"year_".$current_variable_year} = $years_array[$i];

    $current_variable_year++;
	$i++;
}

?>