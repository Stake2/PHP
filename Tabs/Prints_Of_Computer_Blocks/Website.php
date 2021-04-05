<?php 

#Diário Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$website_prints_of_computer_blocks) == True) {
	$selected_website = $website_diario;

	#Website title and name definer
	$website = ucwords($selected_website);
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Website settings
	$sitesbuttonintab = True; #Defines if website has the Sites Button on the top bar
	$website_has_comments_tab = True; #Defines if website has a Comments Tab
	$website_has_comments = True; #Defines if the website has comments
	$website_has_stories_tab_setting = True;
	$website_shows_comments = false; #Defines if website shows the comments on the Comments Tab
	$story_has_dates = false; #Defines if the story has dates
	$website_story_has_titles = False; #Defines if the story has chapter_titles
	$story_uses_status = false; #Defines if the story uses the story statuses
	$story_has_chapter_comments = false; #Defines if the story has comments on the chapter
	$story_website_contains_reads = false; #Defines if the story has story_reads_array on it
	$story_website_contains_comments = false; #Defines if the story has comments on it

	#Website settings setter file includer
	include $setting_parameters_file;

	#Website Tabs array
	$tabs = array('Blocks', 'Characters', 'BlocksTexts', 'Comment');

	if ($website_has_stories_tab_setting == True) {
		array_push($tabs, 'Stories');
	}

	#Website Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('Read the Diary', 'Characters', 'Comment');

		if ($website_has_stories_tab_setting == True) {
			array_push($tabnames, 'Stories');
		}
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Ler o Diário', 'Personagens', 'Comentar');

		if ($website_has_stories_tab_setting == True) {
			array_push($tabnames, 'Histórias');
		}
	}

	#Number of tabs
	$tabnumb = 2;

	if ($website_has_stories_tab_setting == True) {
		$tabnumb = $tabnumb + 1;
	}

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;

	$found_selected_website = True;
}

?>