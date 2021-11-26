<?php 

require $local_website_folder."Name.php";

if (strpos ($host_text, $website_selector_parameters[0].'='.$local_website_name) == True) {
	$selected_website = $website_titles[$local_website_name];

	# Website title definer
	$website_name = $website_titles[$selected_website];
	$choosed_website_css_file = $css_file_spaceliving;	$found_selected_website = True;
}

?>