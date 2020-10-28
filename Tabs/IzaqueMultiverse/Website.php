<?php 

#2018 Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$siteizaquemultiverse) == true) {
	$selected_website = $siteizaquemultiverse;

	$site = $selected_website;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Site settings
	$website_uses_tab_body_generator = true;
	$siteusesuniversalfilereader = true;

	$tabs = array();

	#Site settings setter file includer
	include $setting_parameters_file;

	if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
		$tabnames = array('First Tab');
	}

	if ($website_language == $languages_array[2]) {
		$tabnames = array('Primeira Aba');
	}

	if (empty($tabnames)) {
		if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
			array_push($tabnames, 'Placeholder of the Tab');
		}

		if ($website_language == $languages_array[2]) {
			array_push($tabnames, 'Espaço reservado para a Aba');
		}
	}

	$tabnumb = 0;
	$tabnumb2 = $tabnumb;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>