<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	# Website title definer
	$website = $website_titles[$selected_website];
	$website_name = $website_titles[$selected_website];

	$choosed_website_css_file = $css_file_pequenata;
	$selected_website_style_file = $local_website_folder."Style.php";

	# Website Style.php File Includer
	require $selected_website_style_file;

	# Website settings
	$website_settings["notifications"] = True;
	$website_settings["has_stories_tab"] = True;
	$website_settings["variable_inserter"] = True;

	$story_website_settings["chapter_opener"] = True;
	$story_website_settings["show_chapter_covers"] = True;

	$website_shows_comments = True; #Defines if website shows the comments on the Comments Tab	
	$story_website_settings["has_reads"] = True;
	$story_website_settings["has_dates"] = False; #Defines if the story has dates
	$website_story_has_titles = True; #Defines if the story has chapter_titles
	$story_website_settings["use_status"] = True; #Defines if the story uses the story statuses
	$story_website_contains_reads = True; #Defines if the story has story_reads_array on it
	$story_website_contains_comments = True; #Defines if the story has comments on it

	# Website Tabs array
	$tabs = array("Read", "Readers", "Stories");

	# Website Tab Names array
	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array("Read story", "Readers", "Other stories");
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array("Ler história", "Leitores", "Outras histórias");
	}

	# Number of tabs
	$website_tab_number = count($tab_names) - 1;

	$found_selected_website = True;
}

?>