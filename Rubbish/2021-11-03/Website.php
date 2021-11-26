<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	# Website title and name definer
	$website_name = $selected_website;
	$choosed_website_css_file = $local_website_name;

	# Website settings setter file includer
	require $setting_parameters_file;

	# Website Tab names array
	if (in_array($website_language, $en_languages_array)) {
		$tab_names = array("Read text");
	}

	if (in_array($website_language, $pt_languages_array)) {
		$tab_names = array("Ler texto");
	}

	#Number of tabs
	$website_tab_number = count($tab_names) - 1;

	$found_selected_website = True;
}

?>