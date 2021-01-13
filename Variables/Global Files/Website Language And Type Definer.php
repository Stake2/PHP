<?php 

#Language definer
if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[0]) == true) {
    $website_language = $languages_array[0];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[1]) == true) {
    $website_language = $languages_array[1];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[2]) == true) {
    $website_language = $languages_array[2];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[3]) == true) {
    $website_language = $languages_array[3];
}

#Normal site type definer
if (strpos ($host_text, $website_selector_parameters[1].'='.$website_types_array[0]) == true) {
	#Sitetype definer
	$sitetype1 = $website_types_array[0];
}

#Story site type definer
if (strpos ($host_text, $website_selector_parameters[1].'='.$website_types_array[1]) == true) {
	#Sitetype definer
	$sitetype1 = $website_types_array[1];

	#"Site has stories" setting definer
	$website_has_stories_tab_setting = true;
}

#Years site type definer
if (in_array($host_text, $years_array)) {
	$sitetype2 = 'Years';
}

?>