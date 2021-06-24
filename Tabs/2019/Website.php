<?php 

#2019 Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$website_2019) == True) {
	$selected_website = $website_2019;

	$website = $selected_website;
	$current_year = $website;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	$website_uses_tab_body_generator = True;

	#Website settings setter file includer
	require $setting_parameters_file;

	$tabs = array($current_year, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');

	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array($current_year, 'Media', 'Friends', 'Screenshots', 'Tasks', 'Years');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array($current_year, 'Mídia', 'Amigos', 'Prints', 'Tarefas', 'Anos');
	}

	$website_tab_number = count($tab_names) - 1;

	#Includer of the array of the GenericTabs files
	require $generic_tabs_generator_file;

	$found_selected_website = True;
}

?>