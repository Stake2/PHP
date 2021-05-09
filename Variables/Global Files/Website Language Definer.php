<?php 

# Website Language definer
if (strpos ($host_text, $website_language_parameter.'='.$language_geral) == True) {
    $website_language = $language_geral;
}

if (strpos ($host_text, $website_language_parameter.'='.$language_enus) == True) {
    $website_language = $language_enus;
}

if (strpos ($host_text, $website_language_parameter.'='.$language_ptbr) == True) {
    $website_language = $language_ptbr;
}

if (strpos ($host_text, $website_language_parameter.'='.$language_ptpt) == True) {
    $website_language = $language_ptpt;
}

if (in_array($website_language, $en_languages_array)) {
	$language_number = 1;
}

if (in_array($website_language, $pt_languages_array)) {
	$language_number = 2;
}

$full_language = $full_languages_array[$language_number];

?>