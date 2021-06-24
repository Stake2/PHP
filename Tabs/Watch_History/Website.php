<?php 

#Watch History Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$website_watch_history) == True) {
	$selected_website = $website_watch_history;

	#Year definer
	$current_year = strftime("%Y");
	$current_year_backup = $current_year;

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

	#Website settings setter file includer
	require $setting_parameters_file;

	#Website Tabs array
	$tabs = array('Watched', 'To Watch', 'Links', 'Movies', 'Arch', 'Changelog');

	#Website Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array('Watched'.$current_year, 'To Watch', 'Links', 'Movies', 'Archived Media', 'Changelog');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array('Assistidos'.$current_year, 'Para Assistir', 'Links', 'Filmes', 'Mídias Arquivadas', 'Registro de Mudanças');
	}

	#Number of tabs
	$website_tab_number = count($tab_names) - 1;

	#Includer of the array of the GenericTabs files
	require $generic_tabs_generator_file;

	$found_selected_website = True;
}

?>