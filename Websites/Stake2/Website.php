<?php 

require $local_website_folder."Name.php";

# Diário Website setter
if (strpos ($host_text, $website_selector_parameters[0]."=".$website_keys[$local_website_name]) == True) {
	$selected_website = $website_titles[$local_website_name];

	#Website title and name definer
	#$website = $selected_website;
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_pocb;

	$website_settings["tab_body_generator"] = True;
	$website_settings["no_border_in_website_image"] = True;

	#Website settings setter file includer
	require $setting_parameters_file;

	#Website Tabs array
	$tabs = array("Izaque", "Stake2", "Funkysnipa Cat", Language_Item_Definer("Social Media", "Redes Sociais"));

	$tab_names = array("Izaque", "Stake2", "Funkysnipa Cat", Language_Item_Definer("Social Media", "Redes Sociais"));

	# Number of tabs
	$website_tab_number = count($tabs) - 1;

	$found_selected_website = True;
}

?>