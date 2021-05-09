<?php 

$verbose = False;

$normal_website_type = "Normal Website Type";
$story_website_type = "Story Website Type";

$website_titles_array = array();
$website_types_array = array();

$websites_text_file = $global_files_folder."Websites.txt";

$websites = Read_Lines($websites_text_file);

$websites_number = 0;

foreach ($websites as $website) {
	$split = explode(", ", $website);
	$selected_website_name = $split[0];
	$selected_website_type = $split[1];

	if ($selected_website_type == "N") {
		$selected_website_type = $normal_website_type;
	}

	if ($selected_website_type == "S") {
		$selected_website_type = $story_website_type;
	}

	if ($verbose == True) {
		echo $selected_website_name."<br />"."\n";
	}

	if ($selected_website_name == "Years") {
		array_push($website_titles_array, $selected_website_name);
		array_push($website_types_array, $selected_website_type);

		$current_variable_year = 2018;

		$year_number = 0;
		while ($current_variable_year <= $current_year) {
			array_push($website_titles_array, (string)$current_variable_year);
			array_push($website_types_array, $selected_website_type);

			$current_variable_year++;
			$year_number++;
		}
	}

	else {
		array_push($website_titles_array, $selected_website_name);
		array_push($website_types_array, $selected_website_type);
	}

	$websites_number++;
}

$websites_array = array();

foreach ($website_titles_array as $website_title_selector) {
	$website_title_selector = ucwords($website_title_selector);
	$website_title_selector = str_replace(" ", "_", $website_title_selector);
	$website_title_selector = str_replace(",", "", $website_title_selector);
	$website_title_selector = str_replace(".", "", $website_title_selector);
	$website_title_selector = ucwords($website_title_selector);

	if ($verbose == True) {
		echo $website_title_selector."<br />"."\n";
	}

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