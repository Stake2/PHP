<?php 

# Array of website chapter_titles
$website_titles_array = array(
'Prints of Computer Blocks',
'Diário',
'My Little Pony',
'Watch History',
'Music',
'Games',
'Foobar Albums',
'Terraria Talk',
'Tasks',
'Things I Do',
'Years',
);

$current_variable_year = 2018;

$i = 0;
$year_number = 0;
while ($current_variable_year <= $current_year) {
	array_push($website_titles_array, $current_variable_year);

    $current_variable_year++;
	$i++;
	$year_number++;
}

array_push($website_titles_array, "Stories");
array_push($website_titles_array, "New World");
array_push($website_titles_array, "Izaque Multiverse");
array_push($website_titles_array, "Pequenata");
array_push($website_titles_array, "SpaceLiving");
array_push($website_titles_array, "Nazzevo");
array_push($website_titles_array, "Desert Island");
array_push($website_titles_array, "Lonely Stories");
array_push($website_titles_array, "Mental Frameworks");
array_push($website_titles_array, "Website Template");
array_push($website_titles_array, "Stake2");
array_push($website_titles_array, "Text Maker");

$website_types_array = array();
$i = 0;
$c = 1;
$normal_websites_number = (11 + $year_number);
$story_websites_number = $normal_websites_number + 7;
$all_website_number = ($normal_websites_number + 9 + 4) - 1;
echo $normal_websites_number, " ".count($website_titles_array).'<br />';

while ($c <= $all_website_number) {
	#echo $c." ".$website_titles_array[$c]."<br />";
	if ($c <= $normal_websites_number) {
		$website_types_array[$c] = "Normal Website Type";
	}

	if ($c >= $normal_websites_number and $c <= $story_websites_number) {
		$website_types_array[$c] = "Story Website Type";
	}

	if ($c > $story_websites_number) {
		$website_types_array[$c] = "Normal Website Type";
	}

	$c++;
}

$normal_website_type = "Normal Website Type";
$story_website_type = "Story Website Type";

$websites_array = array();

foreach ($website_titles_array as $website_title_selector) {
	$website_title_selector = ucwords($website_title_selector);
	$website_title_selector = str_replace(" ", "_", $website_title_selector);
	$website_title_selector = str_replace(",", "", $website_title_selector);
	$website_title_selector = str_replace(".", "", $website_title_selector);
	$website_title_selector = ucwords($website_title_selector);

	array_push($websites_array, $website_title_selector);
}

$year_code_numbes_array = array();

$current_variable_year = 2018;

$i = 0;
while ($current_variable_year <= $current_year) {
	$year_code_numbes_array[$current_variable_year] = $i;

    $current_variable_year++;
	$i++;
}

$year_code_numbes_array_keys = array_keys($year_code_numbes_array);

?>