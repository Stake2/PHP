<?php 

# Website Language definer
if (strpos ($host_text, $website_selector_parameters[1].'='.$languages_array[0]) == True) {
    $website_language = $languages_array[0];
}

if (strpos ($host_text, $website_selector_parameters[1].'='.$languages_array[1]) == True) {
    $website_language = $languages_array[1];
}

if (strpos ($host_text, $website_selector_parameters[1].'='.$languages_array[2]) == True) {
    $website_language = $languages_array[2];
}

if (strpos ($host_text, $website_selector_parameters[1].'='.$languages_array[3]) == True) {
    $website_language = $languages_array[3];
}

if (in_array($website_language, $en_languages_array)) {
	$language_number = 1;
}

if (in_array($website_language, $pt_languages_array)) {
	$language_number = 2;
}

$full_language = $full_languages_array[$language_number];

?>