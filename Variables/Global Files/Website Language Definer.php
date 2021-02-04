<?php 

# Website Language definer
if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[0]) == True) {
    $website_language = $languages_array[0];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[1]) == True) {
    $website_language = $languages_array[1];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[2]) == True) {
    $website_language = $languages_array[2];
}

if (strpos ($host_text, $website_selector_parameters[2].'='.$languages_array[3]) == True) {
    $website_language = $languages_array[3];
}

?>