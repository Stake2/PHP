<?php 

#2018 Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$website_izaque_multiverse) == True) {
	$selected_website = $website_izaque_multiverse;

	$website = $selected_website;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Website settings
	$website_uses_tab_body_generator = True;
	$website_uses_universal_file_reader = True;

	$tabs = array();

	#Website settings setter file includer
	require $setting_parameters_file;

	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array('First Tab');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array('Primeira Aba');
	}

	if (empty($tab_names)) {
		if (in_array($website_language, $en_languages_array)) {
			array_push($tab_names, 'Placeholder of the Tab');
		}

		if (in_array($website_language, $pt_languages_array)) {
			array_push($tab_names, 'Espaço reservado para a Aba');
		}
	}

	$website_tab_number = 0;
	$tabnumb2 = $website_tab_number;

	#Includer of the array of the GenericTabs files
	require $generic_tabs_generator_file;
}

?>