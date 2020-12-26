<?php 

#2018 Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$siteizaquemultiverse) == true) {
	$selected_website = $siteizaquemultiverse;

	$site = $selected_website;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Site settings
	$website_uses_tab_body_generator = true;
	$website_uses_universal_file_reader = true;

	$tabs = array();

	#Site settings setter file includer
	include $setting_parameters_file;

	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('First Tab');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Primeira Aba');
	}

	if (empty($tabnames)) {
		if (in_array($website_language, $en_languages_array)) {
			array_push($tabnames, 'Placeholder of the Tab');
		}

		if (in_array($website_language, $pt_languages_array)) {
			array_push($tabnames, 'Espaço reservado para a Aba');
		}
	}

	$tabnumb = 0;
	$tabnumb2 = $tabnumb;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>