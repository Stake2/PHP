<?php 

#2018 Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$site2018) == true) {
	$selected_website = $site2018;

	$site = $selected_website;
	$ano = $site;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Site settings setter file includer
	include $setting_parameters_file;

	$tabs = array($ano, 'Media', 'Tasks', 'Years');

	if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
		$tabnames = array($ano, 'Media', 'Tasks', 'Years');
	}

	if ($website_language == $languages_array[2]) {
		$tabnames = array($ano, 'Mídia', 'Tarefas', 'Anos');
	}

	$tabnumb = 3;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>