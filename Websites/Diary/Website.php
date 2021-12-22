<?php 

require $local_website_folder."Name.php";

# Diary Website setter
if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	# Website title and name definer
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	# Website settings
	$website_settings["tab_body_generator"] = True;
	$website_settings["use_custom_buttons_bar"] = True;
	$website_settings["has_stories_tab"] = True;

	$story_website_settings["show_new_chapter_text"] = False;
	$story_website_settings["show_chapter_covers"] = True;
	$story_website_settings["chapter_opener"] = True;

	$story_website_settings["has_reads"] = True;
	$story_website_settings["has_dates"] = False; #Defines if the story has dates
	$website_story_has_titles = True; #Defines if the story has chapter_titles
	$story_website_settings["use_status"] = False; #Defines if the story uses the story statuses
	$story_website_contains_reads = True; #Defines if the story has story_reads_array on it
	$story_website_contains_comments = True; #Defines if the story has comments on it

	$tab_names = Language_Item_Definer(array("Read the ".$local_website_name, "Characters"), array("Ler o Diário", "Personagens"));

	if ($story_website_settings["show_chapter_covers"] == True) {
		if (in_array($website_language, $en_languages_array)) {
			array_push($tab_names, "Stories");
		}

		if (in_array($website_language, $pt_languages_array)) {
			array_push($tab_names, "Histórias");
		}
	}

	$found_selected_website = True;
}

?>