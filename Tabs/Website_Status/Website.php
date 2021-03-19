<?php 

#Watch History Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$website_website_status) == True) {
	$selected_website = $website_website_status;

	#Year definer
	$current_year = strftime("%Y");
	$current_year_backup = $current_year;

	#Website title and name definer
	$website = ucwords($website_website_status);
	$website_name = $website_website_status;
	$choosed_website_css_file = $css_file_pocb;

	$website_uses_tab_body_generator = True; #Defines if the website uses the CityBody generator
	$website_is_not_centered_setting = True;

	#Website settings setter file includer
	include $setting_parameters_file;

	#Website Tabs array
	$tabs = array('Website Status');

	#Website Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('Website Status');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Status dos Sites');
	}

	#Number of tabs
	$tabnumb = count($tabnames) - 1;

	#Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;

	$found_selected_website = True;
}

else {
	$found_selected_website = False;
}

?>