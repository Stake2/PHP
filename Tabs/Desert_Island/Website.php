<?php 

#Desert Island Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$website_desert_island) == True) {
	$selected_website = $website_desert_island;

	#Website title and name definer
	$website = $selected_website;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_desert_island;

	#Website settings definer
	$website_deactivate_all_setting = false;
	$site_is_prototype = false;
	$site_haves_additional_website_content = false;

	$website_has_notifications = false; #Defines if website has notifications on
	$website_has_comments_tab = True; #Defines if website has a Comments Tab variable
	$website_has_comments_tab_setting = false; #Defines if website has a Comments Tab variable
	$website_has_comments = True; #Defines the website has comments
	$website_shows_comments = True; #Defines if website shows the comments on the Comments Tab
	$website_has_stories_tab_setting = True; #Defines if website has a Stories Tab
	$website_has_changelog_setting = false; #Defines if website has a changelog tab and file to be read
	$website_show_write_form_text_setting = false; #Defines if website shows title and story text on the writing chapter
	$website_show_chapter_text_on_write_form_setting = false; #Defines if website shows the chapter text on the writing chapter form
	$website_hides_notification_on_clicking_on_read_tab_setting = false; #Defines if website hides the notification when you click on the "Read story" button
	$story_website_uses_chapter_opener = True; #Defines if website uses the Chapter Opener script
    $website_uses_tab_body_generator = True; #Defines if the website uses the CityBody generator
	$site_uses_new_comment_and_read_displayer = True;

	$website_write_story_setting = false; #Defines if website has a story writing chapter
	$new_write_style = false; #Defines if the website uses the new writing style for chapters
	$website_story_has_bookcovers_setting = True; #Defines if website has book covers for the story
	$story_has_reads = True; #Defines if the story website has "story_reads_array" number, file and elements
	$story_has_dates = True; #Defines if the story has dates
	$website_story_has_titles = True; #Defines if the story has chapter_titles
	$story_uses_status = True; #Defines if the story uses the story statuses
	$story_has_chapter_comments = True; #Defines if the story has comments on the chapter
	$story_name_has_write_form = True; #Defines if the story has writing form to write the story
	$story_website_contains_reads = false; #Defines if the story has story_reads_array on it
	$story_website_contains_comments = false; #Defines if the story has comments on it

	$site_is_beta = false;
	if ($site_is_beta == True) {
		#Website settings definer
		$website_deactivate_all_setting = True;
		$site_is_prototype = True;
		$site_haves_additional_website_content = True;
	}

	#Website settings setter file includer
	include $setting_parameters_file;

	#Website Tabs array
	$tabs = array('Read', 'Readers', 'Comment', 'Write', 'Stories');

	#Website Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('Read story', 'Readers', 'Comment', 'Write', 'Stories', 'Chapters', 'Comments');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Ler história', 'Leitores', 'Comentar', 'Escrever', 'Histórias', 'Capítulos', 'Comentários');
	}

	#Number of tabs
	$tabnumb = count($tabs) - 1;
	$tabnumb2 = $tabnumb;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>