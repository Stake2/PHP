<?php 

require $local_website_folder."Name.php";

# Diário Website setter
if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	#Website title and name definer
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Website settings setter file includer
	require $setting_parameters_file;

	$website_settings["tab_body_generator"] = True;
	$website_settings[$uses_custom_buttons_bar_text] = True;
	$website_settings["show_new_chapter_text"] = False;
	$website_settings["has_custom_story_folder"] = True;

	# Website settings
	$sitesbuttonintab = True; #Defines if website has the Sites Button on the top bar
	$website_has_comments_tab = True; #Defines if website has a Comments Tab
	$website_has_comments = True; #Defines if the website has comments
	$website_has_stories_tab_setting = True;
	$website_shows_comments = False; #Defines if website shows the comments on the Comments Tab

	$story_has_dates = False; #Defines if the story has dates
	$website_story_has_titles = True; #Defines if the story has chapter_titles
	$story_uses_status = False; #Defines if the story uses the story statuses
	$story_has_chapter_comments = False; #Defines if the story has comments on the chapter
	$story_website_contains_reads = False; #Defines if the story has story_reads_array on it
	$story_website_contains_comments = False; #Defines if the story has comments on it
	$website_story_has_book_covers_setting = True; #Defines if website has book covers for the story
	$website_shows_chapter_covers = True;
	$story_shows_story_covers = False;

	$tab_names = Language_Item_Definer(array("Read the ".$local_website_name), array("Ler o Diário Slim"));

	if ($website_has_stories_tab_setting == True) {
		if (in_array($website_language, $en_languages_array)) {
			array_push($tab_names, "Stories");
		}

		if (in_array($website_language, $pt_languages_array)) {
			array_push($tab_names, "Histórias");
		}
	}

	# Number of tabs
	$website_tab_number = count($tab_names) - 1;

	# Includer of the array of the GenericTabs files
	require $generic_tabs_generator_file;

	$found_selected_website = True;
}

?>