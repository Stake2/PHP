<?php

#Cities array includer
$i = 0;
while ($i <= $tabnumb) {
	include $cities[$i];
	
	if ($i != $tabnumb) {
		echo "\n";
	}

	$i++;
}

if ($website_name == $website_watch_history) {
	$current_variable_year = 2018;
	$current_year = $current_year;

	$i = 0;
	while ($current_variable_year <= $current_year - 1) {
		require $selected_website_folder.$current_variable_year.'.php';

		$current_variable_year++;
		$i++;
	}
}

#Diario website php file loader
if ($website_name == $website_diario) {
	include $websites_tab_generator;
	require $chapter_generator_global_variable;
}

#ChapterReader.php includer for Pequenata website
if ($website_type == $story_website_type) {
	require $chapter_generator_global_variable;
}

if ($website_name != $website_diario) {
	#SiteButton displayer and SiteButtons tab includer
	if ($website_deactivate_website_buttons_setting == False and $website_deactivate_websites_tab_setting == False) {
		echo "<br /><br /><br /><br /><br /><br /><br /><br /><br />"."\n";
		echo $websites_tab_button_centered."\n";
	}

	if ($website_deactivate_websites_tab_setting == False) {
		include $websites_tab_generator;
	}
}

?>