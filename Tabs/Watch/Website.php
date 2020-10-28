<?php 

#Watch History Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$sitewatch) == true) {
	$selected_website = $sitewatch;

	#Year definer
	$ano = 2020;
	$anoantes = $ano - 1;
	$anoantes2 = $ano - 2;

	#Site title and name definer
	$site = ucwords($selected_website);
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_watch_history;

	#Site settings
	$sitehaschangelog = true; #If site has a changelog tab and file to be read
	$website_watch_history_show_to_watch_only_setting = true; #If site shows only the Ready To Watch medias or not
	$website_watch_history_new_watched_style_setting = true; #If site uses the new Watched Media displaying style or not

	#Site settings setter file includer
	include $setting_parameters_file;

	#Site Tabs array
	$tabs = array('Watched', 'To Watch', 'Links', 'Movies', 'Arch', 'Arch'.$anoantes2, 'Arch'.$anoantes, 'Changelog');

	#Site Tabnames array
	if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
		$tabnames = array('Watched'.$ano, 'To Watch', 'Links', 'Movies', 'Archived Media', 'Archived '.$anoantes2, 'Archived '.$anoantes, 'Changelog');
	}

	if ($website_language == $languages_array[2]) {
		$tabnames = array('Assistidos'.$ano, 'Para Assistir', 'Links', 'Filmes', 'Mídias Arquivadas', 'Arquivado '.$anoantes2, 'Arquivado '.$anoantes, 'Registro de Mudanças');
	}

	#Number of tabs
	$tabnumb = 7;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>