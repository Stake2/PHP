<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	#Year definer
	$local_current_year = strftime("%Y");
	$current_year_backup = $local_current_year;

	$previous_year = "2019";
	$previous_previous_year = "2018";
	$archived_medias_number = 2;

	#Website title and name definer
	$website = ucwords($selected_website);
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_watch_history;

	#Website settings
	$website_has_changelog_setting = True; #If website has a changelog tab and file to be read
	$website_watch_history_show_to_watch_only_setting = True; #If website shows only the Ready To Watch medias or not
	$website_watch_history_new_watched_style_setting = True; #If website uses the new Watched Media displaying style or not

	$website_settings["uses_custom_buttons_bar"] = True;

	#Website settings setter file includer
	require $setting_parameters_file;

	#Website Tabs array
	$tabs = array('Watched', 'Media being watched', 'Movies', 'Archived');

	#Website Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array('Watched Media in '.$local_current_year, 'Media Being Watched', 'Movies', 'Archived Media');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array('Mídias Assistidas em '.$local_current_year, 'Mídias Sendo Assitidas', 'Filmes', 'Mídias Arquivadas');
	}

	#Number of tabs
	$website_tab_number = count($tab_names) - 1;
	$website_tab_number_less = $website_tab_number - 1;

	# Includer of the array of the Generic Tabs files
	require $generic_tabs_generator_file;

	$found_selected_website = True;
}

?>