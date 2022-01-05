<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	# Website title definer
	#$website = $website_titles[$selected_website];
	$website_name = $website_titles[$selected_website];

	$choosed_website_css_file = $selected_website;

	# Website settings
	$website_settings["tab_body_generator"] = True;
	$website_settings["notifications"] = True;
	$website_settings["has_stories_tab"] = True;
	$website_settings["variable_inserter"] = True;

	$story_website_settings["show_new_chapter_text"] = True;
	$story_website_settings["chapter_opener"] = True;

	$website_shows_comments = True;
	$story_website_settings["has_reads"] = True;
	$story_website_settings["has_dates"] = True;
	$story_website_settings["has_titles"] = True;
	$story_website_settings["use_status"] = True;
	$story_website_contains_reads = True;
	$story_website_contains_comments = True;

	# Website Tabs array
	$tabs = array("Read", "Readers", "Other stories");

	# Website Tab Names array
	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array("Read story", "Readers", $other_stories_text);
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array("Ler história", "Leitores", $other_stories_text);
	}

	# Number of tabs
	$website_tab_number = count($tab_names) - 1;

	$found_selected_website = True;
}

?>