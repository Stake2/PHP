<?php 

# Website Language definer
$array = array_merge($english_words, $en_languages_array, $portuguese_words, $pt_languages_array, $other_languages);
$english_array = array_merge($english_words, $en_languages_array);
$portuguese_array = array_merge($portuguese_words, $pt_languages_array);

foreach ($array as $local_language) {
	$parameter_language = $http_method["language"];

	if (in_array($parameter_language, $array)) {
		if (in_array($parameter_language, $en_languages_array) == False and in_array($parameter_language, $pt_languages_array) == False) {
			$website_info["language"] = $languages_by_word[ucwords($parameter_language)];
		}

		else {
			$website_info["language"] = $parameter_language;
		}
	}
}

if (in_array($website_info["language"], $english_array)) {
	$language_number = 1;
}

if (in_array($website_info["language"], $portuguese_array)) {
	$language_number = 2;
}

$full_language = $full_languages_array[$language_number];
$website_info["full_language"] = $full_language;

$website_info["title_language"] = substr_replace(mb_strtoupper($website_info["language"]), "-", 2, 0);
$website_info["title_language_lower"] = mb_strtolower($website_info["title_language"]);

?>