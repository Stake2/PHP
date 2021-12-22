<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	#Website title and name definer
	$website = $selected_website;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_desert_island;

	$website_settings["tab_body_generator"] = True;
	$website_settings["notifications"] = False; #Defines if website has notifications on
	$website_settings["has_stories_tab"] = True;

	$story_website_settings["show_chapter_covers"] = False;
	$story_website_settings["chapter_opener"] = True;

	$story_website_settings["has_reads"] = True;
	$story_website_settings["has_dates"] = True; #Defines if the story has dates
	$website_story_has_titles = True; #Defines if the story has chapter_titles
	$story_website_settings["use_status"] = True; #Defines if the story uses the story statuses
	$story_website_contains_reads = False; #Defines if the story has story_reads_array on it
	$story_website_contains_comments = False; #Defines if the story has comments on it

	# Website Tabs array
	$tabs = array("Read", "Readers", "Other stories");

	# Website Tab Names array
	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array("Read story", "Readers", $other_stories_text);
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array("Ler história", "Leitores", $other_stories_text);
	}

	$found_selected_website = True;
}

?>