<?php 

$verbose = False;

$normal_website_type = "Normal Website Type";
$story_website_type = "Story Website Type";

$websites_text_file = $website_php_files_folder."Websites.txt";
$websites_portuguese_text_file = $website_php_files_folder."Sites.txt";
$website_types_text_file = $website_php_files_folder."Website Types.txt";

$websites = Read_Lines($websites_text_file);

$website_types_text = Read_Lines($website_types_text_file);

# -----

array_push($websites, "Stories");
array_push($website_types_text, "S");

array_push($websites, "New World");
array_push($website_types_text, "S");

array_push($websites, "Izaque Multiverse");
array_push($website_types_text, "S");

$story_names_file = $mega_folder."Stories/Story Database/Names.txt";

$story_names = Read_Lines($story_names_file);

$new_story_names = array();

foreach ($story_names as $local_story_name) {
	$local_story_name = explode(", ", $local_story_name)[0];

	array_push($new_story_names, $local_story_name);
}

$story_names = $new_story_names;

$array = array(
"To Be Invincible",
"Crystals & Virtual",
"My Little Pony - Rise to Equestria",
"My Little Pony - The Visit of Izaque",
);

foreach ($story_names as $local_story_name) {
	$i = 0;
	while ($i <= count($array) - 1) {
		if (($key = array_search($array[$i], $story_names)) !== False) {
			unset($story_names[$key]);
		}

		$i++;
	}
}

foreach ($story_names as $local_story_name) {
	array_push($websites, $local_story_name);
	array_push($website_types_text, "S");
}

# -----

array_push($websites, "Years");
array_push($website_types_text, "N");

$websites = Add_Years_To_Array($websites, $mode = "push");

$website_types_text = Add_Years_To_Array($website_types_text, $mode = "push", $custom_value_read = "N");

$websites_number = 0;

foreach ($websites as $local_website_name) {
	$local_website_type = $website_types_text[$websites_number];

	$key = (string)$local_website_name;

	$local_website_link = $main_website_url;

	if (preg_match("/[0-9][0-9][0-9][0-9]/i", $local_website_name) == True) {
		$local_website_link .= "Years/";
	}

	$local_website_link .= $local_website_name."/";

	if ($local_website_type == "N") {
		$local_website_type = $normal_website_type;
	}

	if ($local_website_type == "S") {
		$local_website_type = $story_website_type;
	}

	if ($verbose == True) {
		echo $local_website_name."<br />"."\n";
	}

	$website_titles[$key] = $local_website_name;
	$website_types[$key] = $local_website_type;
	$website_links[$key] = $local_website_link;

	$websites_number++;
}

$year_websites = array();

$year_websites = Add_Years_To_Array($year_websites, $mode = "dict");

/*
$websites_array = array();

foreach ($website_titles as $website_title_selector) {
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
*/

?>