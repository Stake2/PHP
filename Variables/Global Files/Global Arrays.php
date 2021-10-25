<?php 

$verbose = False;

$normal_website_type = "Normal Website Type";
$story_website_type = "Story Website Type";

$websites_text_file = $website_php_files_folder."Websites.txt";
$websites_portuguese_text_file = $website_php_files_folder."Sites.txt";
$website_types_text_file = $website_php_files_folder."Website Types.txt";

$websites = Read_Lines($websites_text_file);

$portuguese_websites = Make_Setting_Dictionary(Read_Lines($websites_portuguese_text_file), ": ");

$website_types_text = Read_Lines($website_types_text_file);

# -----

$first_array = array(
"Stories",
"New World",
"Izaque Multiverse",
);

$second_array = array(
"Histórias",
"New World",
"Multiverso Izaque",
);

$i = 0;
foreach ($first_array as $value) {
	array_push($websites, $value);
	$portuguese_websites[$value] = $second_array[$i];

	$i++;
}

$first_array = array(
"S",
"S",
"S",
);

foreach ($first_array as $value) {
	array_push($website_types_text, $value);
}

$story_names_file = $mega_folder."Stories/Story Database/Names.txt";

$story_names = Read_Lines($story_names_file);

$new_story_names = array();
$new_portuguese_story_names = array();

foreach ($story_names as $value) {
	$local_story_name = explode(", ", $value)[0];
	$local_portuguese_story_name = explode(", ", $value)[1];

	array_push($new_story_names, $local_story_name);
	array_push($new_portuguese_story_names, $local_portuguese_story_name);
}

$story_names = $new_story_names;
$portuguese_story_names = $new_portuguese_story_names;

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

$array = array(
"To Be Invincible",
"Cristais e Virtual",
"My Little Pony - Ascensão á Equestria",
"My Little Pony - A Visita de Izaque",
);

foreach ($portuguese_story_names as $local_story_name) {
	$i = 0;
	while ($i <= count($array) - 1) {
		if (($key = array_search($array[$i], $portuguese_story_names)) !== False) {
			unset($portuguese_story_names[$key]);
		}

		$i++;
	}
}

$story_names = array_values($story_names);
$portuguese_story_names = array_values($portuguese_story_names);

$i = 0;
foreach ($story_names as $local_story_name) {
	array_push($websites, $local_story_name);
	$portuguese_websites[$local_story_name] = $portuguese_story_names[$i];
	array_push($website_types_text, "S");

	$i++;
}

# -----

array_push($websites, "Years");
array_push($portuguese_websites, "Anos");
array_push($website_types_text, "N");

$websites = Add_Years_To_Array($websites, $mode = "push");

$portuguese_websites = Add_Years_To_Array($portuguese_websites, $mode = "dict");

$website_types_text = Add_Years_To_Array($website_types_text, $mode = "push", $custom_value_read = "N");

$websites_number = 0;

foreach ($websites as $local_website_name) {
	$local_website_portuguese_name = $portuguese_websites[$local_website_name];
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
	$website_portuguese_titles[$key] = $local_website_portuguese_name;
	$website_types[$key] = $local_website_type;
	$website_links[$key] = $local_website_link;

	$websites_number++;
}

$websites_number--;

$year_websites = array();

$year_websites = Add_Years_To_Array($year_websites, $mode = "dict");

?>