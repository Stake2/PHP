<?php 

#Watch History Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$sitewatch) == true) {
	$selected_website = $sitewatch;

	#Year definer
	$current_year = strftime("%Y");
	$previous_year = $current_year - 1;
	$previous_previous_year = $current_year - 2;

	#Site title and name definer
	$site = ucwords($selected_website);
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_watch_history;

	#Site settings
	$website_has_changelog_setting = true; #If site has a changelog tab and file to be read
	$website_watch_history_show_to_watch_only_setting = true; #If site shows only the Ready To Watch medias or not
	$website_watch_history_new_watched_style_setting = true; #If site uses the new Watched Media displaying style or not

	#Site settings setter file includer
	include $setting_parameters_file;

	#Site Tabs array
	$tabs = array('Watched', 'To Watch', 'Links', 'Movies', 'Arch', 'Arch'.$previous_previous_year, 'Arch'.$previous_year, 'Changelog');

	#Site Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('Watched'.$current_year, 'To Watch', 'Links', 'Movies', 'Archived Media', 'Archived '.$previous_previous_year, 'Archived '.$previous_year, 'Changelog');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Assistidos'.$current_year, 'Para Assistir', 'Links', 'Filmes', 'Mídias Arquivadas', 'Arquivado '.$previous_previous_year, 'Arquivado '.$previous_year, 'Registro de Mudanças');
	}

	#Number of tabs
	$tabnumb = 7;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>