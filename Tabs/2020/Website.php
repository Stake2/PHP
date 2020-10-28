<?php 

#2020 Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$site2020) == true) {
	$selected_website = $site2020;

	$site = $selected_website;
	$ano = $site;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Site settings setter file includer
	include $setting_parameters_file;

	$tabs = array($ano, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');

	if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
		$tabnames = array($ano, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');
	}

	if ($website_language == $languages_array[2]) {
		$tabnames = array($ano, 'Mídia', 'Amigos', 'Prints', 'Tarefas', 'Anos');
	}

	$tabnumb = 5;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>