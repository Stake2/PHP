<?php 

#Text Maker Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$sitetextmaker) == true) {
	$selected_website = $sitetextmaker;

	#Site title and name definer
	$site = ucwords($selected_website);
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	$website_uses_tab_body_generator = false;

	#Site settings setter file includer
	include $setting_parameters_file;

	#Site Tabs array
	$tabs = array('Output', 'My Year', 'My Stories');

	#Site Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('Output', 'My Year', 'My Stories');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Resultado', 'Meu Ano', 'Minhas Histórias');
	}

	#Number of tabs
	$tabnumb = count($tabs) - 1;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>