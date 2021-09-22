<?php 

if (strpos ($host_text, $website_selector_parameters[0].'='.$website_tasks) == True) {
	$selected_website = $website_tasks;

	# Website title and name definer
	$website = ucwords($selected_website);
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_spaceliving;

	$found_selected_website = True;
}

?>