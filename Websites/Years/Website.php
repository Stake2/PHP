<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	#Website title and name definer
	$website = ucwords($selected_website);
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	#Website settings setter file includer
	require $setting_parameters_file;

	#Website Tabs array
	$tabs = array("Output");

	#Website Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array("Output");
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array("Resultado");
	}

	#Number of tabs
	$website_tab_number = count($tabs) - 1;

	#Includer of the array of the GenericTabs files
	require $generic_tabs_generator_file;	$found_selected_website = True;
}

else {
	$found_selected_website = False;
}

?>