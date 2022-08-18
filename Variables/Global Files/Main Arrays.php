<?php 

# Queries for website languages
$languages_array = array(
	"geral",
	"en",
	"pt",
);

$geral_language = $languages_array[0];
$en_language = $languages_array[1];

$language_geral = $languages_array[0];
$language_en = $languages_array[1];
$language_pt = $languages_array[2];

$other_languages = array(
	"general",
	"General",
	"geral",
	"Geral",
);

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
	"geral" => "geral",
	"Geral" => "geral",
	"General" => "geral",
	"general" => "geral",
	"english" => "en",
	"ingles" => "en",
	"inglês" => "en",
	"English" => "en",
	"Ingles" => "en",
	"Inglês" => "en",
	"Portuguese" => "pt",
	"português" => "pt",
	"portugues" => "pt",
	"Português" => "pt",
	"Portugues" => "pt",
);

# Array of Portuguese languages
$pt_languages_array = array(
	$language_pt,
);

# Array of English languages
$en_languages_array = array(
	$geral_language,
	$en_language,
);

$full_languages_array = array(
	Null,
	"English",
	"Português",
);

$full_language_en = $full_languages_array[1];
$full_language_pt = $full_languages_array[2];

$full_languages_array_no_null = array(
	$full_language_en,
	$full_language_pt,
);

$languages_dict = array(
	$full_language_en => "en",
	$full_language_pt => "pt",
);

$small_languages_array = array(
	"General",
	$full_languages_array[1],
	"Português",
);

$small_languages_dict = array(
	"geral" => "",
	"en" => $full_languages_array[1],
	"pt" => "Português",
);

$full_languages_dict = array(
	"en" => $full_languages_array[1],
	"pt" => $full_languages_array[2],
);

$beautiful_languages = array(
	"General",
	"English",
	"Portuguese",
);

$beautiful_languages_portuguese = array(
	"Geral",
	"Inglês",
	"Português",
);

?>