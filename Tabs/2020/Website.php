<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Website settings setter file includer
	require $setting_parameters_file;

	$website_settings["tab_body_generator"] = True;

	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array("Things");
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array("adasd");
	}

	$website_tab_number = count($tab_names) - 1;

	#Includer of the array of the GenericTabs files
	require $generic_tabs_generator_file;

	$found_selected_website = True;
}

?>