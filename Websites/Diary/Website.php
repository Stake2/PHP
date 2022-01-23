<?php 

require $local_website_folder."Name.php";

# Diary Website setter
if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	# Website title and name definer
	$website_name = $selected_website;
	$choosed_website_css_file = "POCB";

	# Website settings
	$website_settings["tab_body_generator"] = True;
	$website_settings["use_custom_buttons_bar"] = True;
	$website_settings["has_stories_tab"] = True;
	$website_settings["has_two_website_titles"] = True;

	$story_website_settings["show_new_chapter_text"] = False;
	$story_website_settings["has_story_covers"] = True;
	$story_website_settings["chapter_opener"] = True;
	$story_website_settings["has_titles"] = True;
	$story_website_settings["has_dates"] = False;
	$story_website_settings["has_reads"] = True;
	$story_website_settings["use_status"] = False;

	$story_website_contains_reads = True;
	$story_website_contains_comments = True;

	$tab_names = Language_Item_Definer(array("Read the ".$local_website_name, "Characters"), array("Ler o Diário", "Personagens"));

	if ($story_website_settings["has_story_covers"] == True) {
		array_push($tab_names, Language_Item_Definer("Stories", "Histórias"));
	}

	$found_selected_website = True;
}

?>