<?php 

# Swid MC Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$website_swid_mc) == True) {
	$selected_website = $website_swid_mc;

	# Website title and name definer
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pequenata;

	# Website settings setter file includer
	include $setting_parameters_file;

	# Website Tabs array
	$tabs = array('Read');

	# Website Tabnames array
	if (in_array($website_language, $en_languages_array)) {
		$tabnames = array('Read story');
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tabnames = array('Ler história');
	}

	# Number of tabs
	$tabnumb = count($tabs) - 1;

	# Includer of the array of the GenericTabs files
	include $generic_tabs_generator_file;

	$found_selected_website = True;
}

?>