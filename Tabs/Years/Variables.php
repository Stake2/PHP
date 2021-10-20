<?php

# Folder variables
$year_text_files_folder = $notepad_years_folder;
$current_year_text_folder = $year_text_files_folder.$current_year.'/';

$year_folders = array();

$current_variable_year = 2018;

while ($current_variable_year <= $current_year - 1) {
	$year_folders[$current_variable_year] = $year_text_files_folder.$current_variable_year.'/';

    $current_variable_year++;
}

$selected_website_url = $main_website_url.$website_folder.'/'.$current_year.'/';
$website_folder = $php_folder_tabs.$current_year.'/';

# Website image link and image size
$website_image = $current_year;
$website_image = $cdnimg.$website_image.".png";
$website_image_link = $website_image;

#Website descriptions
$website_descriptions_array = array(
'Website to show my '.$current_year.', Website para mostar o meu '.$current_year.' (stake2)', 
'Website para mostar o meu '.$current_year.' (stake2)',
);

$website_html_descriptions_array = array(
'Description: A website to show how my year '.$orangespan.'('.$current_year.')'.$spanc.' was and what I did during it, I am '.$orangespan.'stake2'.$spanc.', or '.$orangespan.'Izaque'.$spanc.'.',
'Descrição: Um website para mostar como meu ano '.$orangespan.'('.$current_year.')'.$spanc.' foi e o que eu fiz durante ele, eu sou '.$orangespan.'stake2'.$spanc.', ou '.$orangespan.'Izaque'.$spanc.'.',
);

#General language website_name, title, main_website_url and description
if ($website_language == $languages_array[0]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $website;
	$website_title = $current_year;
	$website_title_header = $current_year.': '.$icons[3];
	$website_link = $selected_website_url;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

#English language website_name, title, main_website_url and description
if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $website_folder;
	$website_name = $current_year;
	$website_title = $current_year." ".$hyphen_separated_website_language;
	$website_title_header = $current_year.': '.$icons[3];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language)."/";
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[0];
}

#Brazilian Portuguese language website_name, title, main_website_url and description
if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $website_folder;
	$website_name = $current_year;
	$website_title = $current_year." ".$hyphen_separated_website_language;
	$website_title_header = $current_year.': '.$icons[3];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language)."/";
	$website_meta_description = $website_descriptions_array[2];
	$website_header_description = $website_html_descriptions_array[1];
}

#TextFileReader.php file includer
require $text_file_reader_file_php;

?>