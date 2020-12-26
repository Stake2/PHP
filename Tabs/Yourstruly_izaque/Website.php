<?php 

#Pequenata Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$siteyourstruly_izaque) == true) {
	$selected_website = $siteyourstruly_izaque;

	#Site title and name definer
	$site = $selected_website;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	$website_deactivate_top_buttons_setting = false;
	$website_deactivate_website_buttons_setting = true;
	$hidecitysetting = true;
	$website_not_so_much_space_setting = false;
	$website_uses_tab_body_generator = true;
	$website_uses_universal_file_reader = true;

	#Site settings setter file includer
	include $setting_parameters_file;

	#Site Tabs array
	$tabs = array('Read');

	#Site Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('Read:');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Ler:');
	}

	#Number of tabs
	$tabnumb = count($tabs) - 1;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;
}

?>