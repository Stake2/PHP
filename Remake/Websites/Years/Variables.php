<?php

$selected_website_url = $website["url"].$website_information["php_folder"].'/'.$current_year.'/';
$website_information["php_folder"] = $folders["mega"]["php"]["websites"]["root"].$current_year.'/';

# Website image link and image size
$website_image = $current_year;
$website_information["image_link"] = $cdnimg.$website_image.".png";

#Website descriptions
$website_descriptions_array = array(
'Website to show my '.$current_year.', Website para mostar o meu '.$current_year.' (stake2)', 
'Website para mostar o meu '.$current_year.' (stake2)',
);

$website_html_descriptions_array = array(
'Description: A website to show how my year '.$orangespan.'('.$current_year.')'.$spanc.' was and what I did during it, I am '.$orangespan.'stake2'.$spanc.', or '.$orangespan.'Izaque'.$spanc.'.',
'Descrição: Um website para mostar como meu ano '.$orangespan.'('.$current_year.')'.$spanc.' foi e o que eu fiz durante ele, eu sou '.$orangespan.'stake2'.$spanc.', ou '.$orangespan.'Izaque'.$spanc.'.',
);

#General language, title, main_website_url and description
if ($website_information["language"] == $languages_array[0]) {
	$hyphen_separated_website_language = strtoupper($website_information["language"]);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_title_text = $current_year;
	$website_title_header = $current_year.': '.$icons[3];
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

#English language, title, main_website_url and description
if ($website_information["language"] == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_information["language"]);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_title_text = $current_year." ".$hyphen_separated_website_language;
	$website_title_header = $current_year.': '.$icons[3];
	$website_information["link"] .= $website_information["language"]."/";
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[0];
}

#Brazilian Portuguese language, title, main_website_url and description
if (in_array($website_information["language"], $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_information["language"]);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_title_text = $current_year." ".$hyphen_separated_website_language;
	$website_title_header = $current_year.': '.$icons[3];
	$website_information["link"] .= $website_information["language"]."/";
	$website_meta_description = $website_descriptions_array[2];
	$website_header_description = $website_html_descriptions_array[1];
}

#TextFileReader.php file includer
require $text_file_reader_file_php;

?>