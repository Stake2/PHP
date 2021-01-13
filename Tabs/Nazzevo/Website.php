<?php 

#Nazzevo Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$sitenazzevo) == true) {
	$selected_website = $sitenazzevo;

	#Site title and name definer
	$site = $sitenazzevo;
	$website_name = $sitenazzevo;
	$choosed_website_css_file = $css_file_pequenata;

	#Site settings
	$website_has_notifications = false; #Defines if site has notifications on
	$website_has_comments_tab = true; #Defines if site has a Comments Tab variable
	$website_has_comments = true; #Defines the site has comments
	$website_shows_comments = true; #Defines if site shows the comments on the Comments Tab
	$website_has_stories_tab_setting = true; #Defines if site has a Stories Tab
	$website_story_has_bookcovers_setting = true; #Defines if site has book covers for the story
	$story_name_has_reads = true; #Defines if the story website has "story_reads_array" number, file and elements
	$story_name_has_chapter_comments = false; #Defines if the story has comments on the chapter
	$story_name_has_dates = false; #Defines if the story has dates
	$website_story_has_titles = true; #Defines if the story has chapter_titles
	$story_name_uses_status = true; #Defines if the story uses the story statuses
	$story_website_contains_reads = false; #Defines if the story has story_reads_array on it
	$story_website_contains_comments = true; #Defines if the story has comments on it

	#Site Tabs array
	$tabs = array('Read', 'Readers', 'Comment', 'Write', 'Stories');

	#Site Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('Read story', 'Readers', 'Comment', 'Write', 'Stories', 'Chapters', 'Comments');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Ler história', 'Leitores', 'Comentar', 'Escrever', 'Histórias', 'Capítulos', 'Comentários');
	}

	#Number of tabs
	$tabnumb = count($tabs) - 1;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>