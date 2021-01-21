<?php 

#Nazzevo Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$sitenazzevo) == True) {
	$selected_website = $sitenazzevo;

	#Site title and name definer
	$site = $sitenazzevo;
	$website_name = $sitenazzevo;
	$choosed_website_css_file = $css_file_pequenata;
	$selected_website_style_file = $sitefolder_nazzevo."Website Style.php";

	#Site settings
	$website_has_notifications = false; #Defines if site has notifications on
	$website_has_comments_tab = True; #Defines if site has a Comments Tab variable
	$website_has_comments = True; #Defines the site has comments
	$website_shows_comments = True; #Defines if site shows the comments on the Comments Tab
	$website_has_stories_tab_setting = True; #Defines if site has a Stories Tab
	$website_story_has_bookcovers_setting = True; #Defines if site has book covers for the story
	$story_has_reads = True; #Defines if the story website has "story_reads_array" number, file and elements
	$story_has_chapter_comments = false; #Defines if the story has comments on the chapter
	$story_has_dates = false; #Defines if the story has dates
	$website_story_has_titles = True; #Defines if the story has chapter_titles
	$story_uses_status = True; #Defines if the story uses the story statuses
	$story_website_contains_reads = false; #Defines if the story has story_reads_array on it
	$story_website_contains_comments = True; #Defines if the story has comments on it

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