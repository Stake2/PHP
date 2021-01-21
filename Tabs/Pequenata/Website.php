<?php 

#Pequenata Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$sitepequenata) == True) {
	$selected_website = $sitepequenata;

	#Site title and name definer
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pequenata;

	$alternative_website_style = false;

	if ($alternative_website_style == True) {
		$alternative_website_style_folder = $sitefolder_desertisland;
		$alternative_website_style_file = $alternative_website_style_folder."Website Style.php";
	}

	#Site settings definer
	$website_has_notifications = True; #Defines if site has notifications on
	$website_has_comments_tab = True; #Defines if site has a Comments Tab variable
	$website_has_comments = True; #Defines the site has comments
	$website_shows_comments = True; #Defines if site shows the comments on the Comments Tab
	$website_has_stories_tab_setting = True; #Defines if site has a Stories Tab
	$website_has_changelog_setting = True; #Defines if site has a changelog tab and file to be read
	$website_show_write_form_text_setting = false; #Defines if site shows title and story text on the writing chapter
	$website_show_chapter_text_on_write_form_setting = false; #Defines if site shows the chapter text on the writing chapter form
	$website_hides_notification_on_clicking_on_read_tab_setting = false; #Defines if site hides the notification when you click on the "Read story" button
	$story_website_uses_chapter_opener = True; #Defines if the website uses the ChapterOpener Script
	$site_uses_new_comment_and_read_displayer = True;

	$website_write_story_setting = false; #Defines if site has a story writing chapter
	$new_write_style = false; #Defines if the website uses the new writing style for chapters
	$website_story_has_bookcovers_setting = True; #Defines if site has book covers for the story
	$story_namewritesstoryfiles = false; #Defines if the story website creates text files with the story text (chapters)
	$story_has_reads = True; #Defines if the story website has "story_reads_array" number, file and elements
	$story_has_chapter_comments = True; #Defines if the story has comments on the chapter
	$story_has_dates = True; #Defines if the story has dates
	$website_story_has_titles = True; #Defines if the story has chapter_titles
	$story_uses_status = True; #Defines if the story uses the story statuses
	$story_website_contains_reads = True; #Defines if the story has story_reads_array on it
	$story_website_contains_comments = True; #Defines if the story has comments on it

	#Site settings setter file includer
	include $setting_parameters_file;

	#Site Tabs array
	$tabs = array('Read', 'Readers', 'Comment', 'Write', 'Stories', 'Changelog');

	#Site Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('Read story', 'Readers', 'Comment', 'Write', 'Stories', 'Changelog', 'Chapters', 'Comments');
		$site = ucwords('littletato');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Ler história', 'Leitores', 'Comentar', 'Escrever', 'Histórias', 'Registro de Mudanças', 'Capítulos', 'Comentários');
		$site = ucwords($selected_website);
	}

	#Number of tabs
	$tabnumb = count($tabs) - 1;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>