<?php 

#2018 Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$website_2018) == True) {
	$selected_website = $website_2018;

	$website = $selected_website;
	$current_year = $website;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Website settings setter file includer
	include $setting_parameters_file;

	$tabs = array($current_year, 'Media', 'Tasks', 'Years');

	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array($current_year, 'Media', 'Tasks', 'Years');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array($current_year, 'Mídia', 'Tarefas', 'Anos');
	}

	$website_tab_number = 3;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;

	$found_selected_website = True;
}

?>