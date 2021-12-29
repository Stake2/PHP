<?php

#Cities array includer
$i = 0;
while ($i <= $website_tab_number) {
	echo $website_tabs[$i];
	
	if ($i != $website_tab_number) {
		echo "\n";
	}

	$i++;
}

if ($website_title_backup == $website_titles["Watch History"]) {
	$current_variable_year = 2018;
	$local_current_year = $current_year;

	$return_string = True;

	$i = 0;
	while ($current_variable_year <= $local_current_year - 1) {
		$i2 = $i + 1;

		$selected_year = $current_variable_year;

		$tab_code = "Watched_".$archived_text."_".$current_variable_year.'_Computer';
		$tab_code_mobile = "Watched_".$archived_text."_".$current_variable_year.'_Mobile';

		$tab_contents = array(
		"Computer" => "",
		"Mobile" => "",
		);

		$mobile_version = False;
		require $archived_media_machine_php;
		$tab_contents["Computer"] .= $archived_media_string;

		$mobile_version = True;
		require $archived_media_machine_php;
		$tab_contents["Mobile"] .= $archived_media_string;

		$array_to_format = array(
		"Watched_".$archived_text."_Computer_".$i2, $tab_code, $tab_code, $i2, $tab_contents["Computer"],
		"Watched_".$archived_text."_Mobile_".$i2, $tab_code_mobile, $tab_code_mobile, $i2, $tab_contents["Mobile"],
		);

		echo format($tab_template, $array_to_format);

		$local_current_year = $current_year_backup;

		$current_variable_year++;
		$i++;
	}
}

# Chapters Generator.php includer for Pequenata website
if ($website_type == $story_website_type) {
	require $chapters_generator_php;
}

if ($website_function_settings["websites_tab"] == True) {
	echo "\n";
	require $websites_tab_generator;
}

?>