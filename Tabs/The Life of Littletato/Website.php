<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	# Website title definer
	#$website = $website_titles[$selected_website];
	$website_name = $website_titles[$selected_website];

	$choosed_website_css_file = $css_file_pequenata;

	$alternative_website_style = False;

	if ($alternative_website_style == True) {
		$alternative_website_style_folder = $sitefolder_desertisland;
		$alternative_website_style_file = $alternative_website_style_folder."Style.php";
	}

	# Website settings definer
	$website_settings["show new chapter text"] = True;

	$website_has_notifications = True; #Defines if website has notifications on
	$website_has_comments_tab = True; #Defines if website has a Comments Tab variable
	$website_has_comments = True; #Defines the website has comments
	$website_shows_comments = True; #Defines if website shows the comments on the Comments Tab
	$website_has_stories_tab_setting = True; #Defines if website has a Stories Tab
	$website_has_changelog_setting = True; #Defines if website has a changelog tab and file to be read
	$website_show_write_form_text_setting = False; #Defines if website shows title and story text on the writing chapter
	$website_show_chapter_text_on_write_form_setting = False; #Defines if website shows the chapter text on the writing chapter form
	$website_hides_notification_on_clicking_on_read_tab_setting = False; #Defines if website hides the notification when you click on the "Read story" button
	$story_website_uses_chapter_opener = True; #Defines if the website uses the Open Chapter Script
	$website_uses_tab_body_generator = True;
	$site_uses_new_comment_and_read_displayer = True;
	$use_variable_inserter = True;

	$website_write_story_setting = False; #Defines if website has a story writing chapter
	$new_write_style = False; #Defines if the website uses the new writing style for chapters
	$website_story_has_book_covers_setting = True; #Defines if website has book covers for the story
	$story_writes_story_text_files = False; #Defines if the story website creates text files with the story text (chapters)
	$story_has_reads = True; #Defines if the story website has "story_reads_array" number, file and elements
	$story_has_chapter_comments = True; #Defines if the story has comments on the chapter
	$story_has_dates = True; #Defines if the story has dates
	$website_story_has_titles = True; #Defines if the story has chapter_titles
	$story_uses_status = True; #Defines if the story uses the story statuses
	$story_website_contains_reads = True; #Defines if the story has story_reads_array on it
	$story_website_contains_comments = True; #Defines if the story has comments on it

	# Website settings setter file includer
	require $setting_parameters_file;

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
	$website_tab_number = count($tabs) - 1;

	# Includer of the array of the Generic Tabs files
	require $generic_tabs_generator_file;

	$found_selected_website = True;
}

?>