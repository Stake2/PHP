<?php 

$verbose = False;

$normal_website_type = "Normal Website Type";
$story_website_type = "Story Website Type";

$websites_text_file = $websites_list_folder."Websites.txt";
$all_websites_text_file = $websites_list_folder."All Websites.txt";
$websites_portuguese_text_file = $websites_list_folder."Sites.txt";
$website_types_text_file = $websites_list_folder."Website Types.txt";

$websites = Read_Lines($websites_text_file);

$portuguese_websites = Make_Setting_Dictionary(Read_Lines($websites_portuguese_text_file), "=");

$website_types_text = Read_Lines($website_types_text_file);

# -----

$first_array = array(
	"Stories",
	"Izaque Multiverse",
);

$second_array = array(
	"Histórias",
	"Multiverso Izaque",
);

$i = 0;
foreach ($first_array as $value) {
	$websites[] = $value;
	$portuguese_websites[$value] = $second_array[$i];

	$i++;
}

$first_array = array(
	"S",
	"S",
);

foreach ($first_array as $value) {
	array_push($website_types_text, $value);
}

$story_names_file = $story_database_folder."Names.txt";

$story_names = Read_Lines($story_names_file);

$new_story_names = array();
$new_portuguese_story_names = array();

function str_contains_1($contains, $string) {
	return strpos($string, $contains);
}

foreach ($story_names as $value) {
	$local_story_name = $value;
	$local_portuguese_story_name = $value;

	if (str_contains_1(", ", $value)) {
		$local_story_name = explode(", ", $value)[0];
		$local_portuguese_story_name = explode(", ", $value)[1];
	}

	if ($local_story_name != "Diary" and $local_story_name != "Diary Slim") {
		array_push($new_story_names, $local_story_name);
		array_push($new_portuguese_story_names, $local_portuguese_story_name);
	}
}

$story_names = $new_story_names;
$portuguese_story_names = $new_portuguese_story_names;

$array = array(
	"To Be Invincible",
	"Crystals & Virtual",
	"My Little Pony - Friendship Is Magic - Rise to Equestria",
	"My Little Pony - Friendship Is Magic - The Visit of Izaque",
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
	"My Little Pony - A Amizade É Mágica - Ascensão á Equestria",
	"My Little Pony - A Amizade É Mágica - A Visita de Izaque",
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
	$websites[] = $local_story_name;
	$portuguese_websites[$local_story_name] = $portuguese_story_names[$i];

	$website_types_text[] = "S";

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
	$local_website_folder_path = "";

	if (preg_match("/[0-9][0-9][0-9][0-9]/i", $local_website_name) == True) {
		$local_website_link .= "Years/";
		$local_website_folder_path .= "Years/";
	}

	if ($local_website_name == "SpaceLiving") {
		$local_website_link .= "New_World/";
		$local_website_folder_path .= "New_World/";
	}

	$local_website_link .= Remove_Non_File_Characters($local_website_name)."/";
	$local_website_folder_path .= Remove_Non_File_Characters($local_website_name)."/";

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
	$website_folders[$key] = $mega_folder_stake2_website.$local_website_folder_path;

	$local_key = strtolower(str_replace(" ", "_", $key));
	$website_keys[$key] = str_replace(":", "", $local_key);

	$websites_number++;
}

$websites_number--;

$year_websites = array();

$year_websites = Add_Years_To_Array($year_websites, $mode = "dict");

$mixed_websites = array();

foreach ($websites as $local_website_name) {
	$local_portuguese_website = $website_portuguese_titles[$local_website_name];

	array_push($mixed_websites, $local_website_name);

	if ($local_website_name != $local_portuguese_website) {
		array_push($mixed_websites, $local_portuguese_website);
	}
}

$local_year_websites = array();

foreach ($websites as $local_website_name) {
	if (in_array((int)$local_website_name, $year_websites) == False) {
		array_push($local_year_websites, $local_website_name);
	}
}

$keyed_portuguese_websites = array();

foreach ($local_year_websites as $local_website_name) {
	$backup_website_name = $local_website_name;
	$local_portuguese_website = $website_portuguese_titles[$local_website_name];

	$local_website_name = $website_keys[$local_website_name];
	$local_website_name = '"'.$local_website_name.'"'.": ".'"'.$local_portuguese_website.'"';

	if ($backup_website_name != array_reverse($local_year_websites)[0]) {
		$local_website_name .= ",";
	}

	if (in_array((int)$local_website_name, $year_websites) == False) {
		array_push($keyed_portuguese_websites, $local_website_name);
	}
}

$keyed_english_websites = array();

foreach ($local_year_websites as $local_website_name) {
	$backup_website_name = $local_website_name;
	$local_portuguese_website = $website_portuguese_titles[$local_website_name];

	$local_portuguese_website = str_replace(" ", "_", $local_portuguese_website);
	$local_portuguese_website = str_replace(":", "", $local_portuguese_website);
	$local_website_name = '"'.$local_portuguese_website.'"'.": ".'"'.$local_website_name.'"';

	if ($backup_website_name != array_reverse($local_year_websites)[0]) {
		$local_website_name .= ",";
	}

	if (in_array((int)$local_website_name, $year_websites) == False) {
		array_push($keyed_english_websites, $local_website_name);
	}
}

$array_english_websites = array();

foreach ($local_year_websites as $local_website_name) {
	$backup_website_name = $local_website_name;

	$local_website_name = '"'.$local_website_name.'"';

	if ($backup_website_name != array_reverse($local_year_websites)[0]) {
		$local_website_name .= ",";
	}

	if (in_array((int)$local_website_name, $year_websites) == False) {
		array_push($array_english_websites, $local_website_name);
	}
}

?>