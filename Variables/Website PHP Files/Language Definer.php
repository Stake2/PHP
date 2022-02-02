<?php 

# Website Language definer
foreach ($languages_array as $local_language) {
	if (strpos ($host_text, $website_language_parameter.'='.$local_language) == True) {
		$website_language = $local_language;
		$website_info["language"] = $website_language;
	}
}

if (in_array($website_language, $en_languages_array)) {
	$language_number = 1;
}

if (in_array($website_language, $pt_languages_array)) {
	$language_number = 2;
}

$full_language = $full_languages_array[$language_number];
$website_info["full_language"] = $full_language;

$website_title_language = substr_replace(mb_strtoupper($website_language), "-", 2, 0);
$website_info["title_language"] = substr_replace(strtoupper($website_language), "-", 2, 0);
$website_link_language = mb_strtolower($website_title_language);

?>