<?php 

# Swid MC Website setter
if (strpos ($host_text, $website_selector_parameters[0].'='.$website_swid_mc) == True) {
	$selected_website = $website_swid_mc;

	# Website title and name definer
	$website_name = $selected_website;
	$choosed_website_css_file = $css_file_swid_mc;

	$website_is_for_other_person_setting = True;
	$website_deactivate_image_link_setting = True;
	$website_uses_custom_layout_setting = True;

	# Website settings setter file includer
	include $setting_parameters_file;

	$found_selected_website = True;
}

else {
	$found_selected_website = False;
}

?>