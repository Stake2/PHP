<?php 

#Diário Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$sitediario) == true) {
	$selected_website = $sitediario;

	#Site title and name definer
	$site = ucwords($selected_website);
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Site settings
	$sitesbuttonintab = true; #Defines if site has the Sites Button on the top bar
	$website_has_comments_tab = true; #Defines if site has a Comments Tab
	$website_has_comments = true; #Defines if the site has comments
	$website_shows_comments = false; #Defines if site shows the comments on the Comments Tab
	$story_name_has_dates = false; #Defines if the story has dates
	$website_story_has_titles = false; #Defines if the story has chapter_titles
	$story_name_uses_status = false; #Defines if the story uses the story statuses
	$story_name_has_chapter_comments = false; #Defines if the story has comments on the chapter
	$story_website_contains_reads = false; #Defines if the story has story_reads_array on it
	$story_website_contains_comments = false; #Defines if the story has comments on it

	#Site settings setter file includer
	include $setting_parameters_file;

	#Site Tabs array
	$tabs = array('Blocks', 'Characters', 'BlocksTexts', 'Comment');

	if ($website_has_stories_tab_setting == true) {
		array_push($tabs, 'Stories');
	}

	#Site Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('Read the Diary', 'Characters', 'Comment');

		if ($website_has_stories_tab_setting == true) {
			array_push($tabnames, 'Stories');
		}
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Ler o Diário', 'Personagens', 'Comentar');

		if ($website_has_stories_tab_setting == true) {
			array_push($tabnames, 'Histórias');
		}
	}

	#Number of tabs
	$tabnumb = 2;

	if ($website_has_stories_tab_setting == true) {
		array_push($tabnumb, $tabnumb + 1);
	}

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>