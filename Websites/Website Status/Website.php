<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	#Year definer
	$current_year = strftime("%Y");
	$current_year_backup = $current_year;

	#Website title and name definer
	$website = $selected_website;
	$website_name = $selected_website;
	$choosed_website_css_file = "POCB";

	$website_settings["tab_body_generator"] = True;
	$website_function_settings["center_website"] = True;

	#Website Tabs array
	$tabs = array('Website Status');

	#Website Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array('Website Status');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array('Status dos Sites');
	}

	#Number of tabs
	$website_tab_number = count($tab_names) - 1;

	#Includer of the array of the GenericTabs files
	require $generic_tabs_generator_file;	$found_selected_website = True;
}

else {
	$found_selected_website = False;
}

?>