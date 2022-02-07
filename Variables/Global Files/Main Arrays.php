<?php 

# Queries for parameters
$website_selector_parameters = array(
"website",
"website_language",
);

$website_language_parameter = $website_selector_parameters[1];

# Queries for website languages
$languages_array = array(
"geral",
"enus",
"ptbr",
"ptpt",
);

$geral_language = $languages_array[0];
$enus_language = $languages_array[1];
$ptbr_language = $languages_array[2];
$ptpt_language = $languages_array[3];

$language_geral = $languages_array[0];
$language_enus = $languages_array[1];
$language_ptbr = $languages_array[2];
$language_ptpt = $languages_array[3];

$english_words = array(
"english",
"English",
"ingles",
"Ingles",
"inglês",
"Inglês",
);

$portuguese_words = array(
"portugues",
"Portugues",
"português",
"Português",
"portuguese",
"Portuguese",
);

$languages_by_word = array(
"english" => "enus",
"ingles" => "enus",
"inglês" => "enus",
"English" => "enus",
"Ingles" => "enus",
"Inglês" => "enus",
"Portuguese" => "ptbr",
"Eportuguese" => "ptpt",
"português" => "ptbr",
"português brasileiro" => "ptbr",
"portugues" => "ptbr",
"portugues brasileiro" => "ptbr",
"Português" => "ptbr",
"Português brasileiro" => "ptbr",
"Portugues" => "ptbr",
"Portugues brasileiro" => "ptbr",
);

# Array of Portuguese languages
$pt_languages_array = array(
$ptbr_language,
$ptpt_language,
);

# Array of English languages
$en_languages_array = array(
$geral_language,
$enus_language,
);

$full_languages_array = array(
Null,
"English",
"Português Brasileiro",
);

$full_language_enus = $full_languages_array[1];
$full_language_ptbr = $full_languages_array[2];
$full_language_ptpt = "Português Europeu";

$full_languages_array_no_null = array(
$full_language_enus,
$full_language_ptbr,
);

$languages_dict = array(
$full_language_enus => "enus",
$full_language_ptbr => "ptbr",
$full_language_ptpt => "ptpt",
);

$full_languages_dict = array(
"enus" => $full_languages_array[1],
"ptbr" => $full_languages_array[2],
"ptpt" => "Português Europeu",
);

?>