<?php 

# Folder variables
$selected_website_name = $website_names_array[$selected_website_number];
$selected_website_folder = ${"website_folder_".$website_names_array[$selected_website_number]};
$selected_website_title = $website_titles_array[$selected_website_number];
$selected_website_url = $main_website_url.$website_names_array[$selected_website_number].'/';
$selected_website_title_with_underline = str_replace(" ", "_", $selected_website_title);

# Website image vars
$website_image_file_name = 'Swid MC';

$website_image = $cdnimg.$website_image_file_name.'.jpg';

$website_image_size_computer = 30;
$website_image_size_mobile = 72;

$website_image_link = $website_image;

# TextFileReader.php File Includer
#include $text_file_reader_file_php;

# Website descriptions
$website_descriptions_array = array(
'A website of a Minecraft server called Swid MC.',
'Um site de um servidor de Minecraft chamado Swid MC.',
);

# Synopsis text definer using the $synopsis that is generated from TextFileReader.php
$website_html_descriptions_array = array(
$website_descriptions_array[0].'<br />',
$website_descriptions_array[1].'<br />',
);

# English texts for Pequenata website
if (in_array($website_language, $en_languages_array)) {

}

# Brazilian Portuguese texts for Pequenata website
if (in_array($website_language, $pt_languages_array)) {

}

# Website name, title, URL and description setter, by language
if (in_array($website_language, $en_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website_title;
	
	$website_title = $selected_website_title;
	$website_title_html = $selected_website_title.': '.$icons[11];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website_title;

	if ($website_language == $ptpt_language) {
		$website_title = $selected_website_title.' '.strtoupper($hyphen_separated_website_language);
	}

	else {
		$website_title = $selected_website_title;
	}

	$website_title_html = $selected_website_title.': '.$icons[11];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[1];
}

$custom_website_header = include $selected_website_folder."Custom Website Layout.php";

?>