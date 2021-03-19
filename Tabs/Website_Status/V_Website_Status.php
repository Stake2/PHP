<?php 

#Folder variables
$selected_website_url = $website_website_status_link;
$selected_website_folder = $php_tabs.ucwords($website).'/';
$website_title = $website_titles_array[$selected_website_number];

#Website image link and image size
$website_image = '';
$website_image = $cdnimg.$website_image.".png";
$website_image_link = $website_image;

#Tabtexts array
$citiestxts = array(
$tabnames[0],
);

#Tabtexts array
$tab_titles_without_html = array(
$tabnames[0],
);

$website_html_descriptions_array = array(
"A website to show the construction status of my websites.",
"Um site para mostrar o estado de construção de meus sites.",
);

# Website Style.php File Includer
require $website_style_file;

#General language website_name, title, main_website_url and description
if ($website_language == $geral_language) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_title = ucwords($website_title);
	$website_title_html = $website_title;
	$website_link = $selected_website_url;
	$website_meta_description = $website_html_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

#English language website_name, title, main_website_url and description
if ($website_language == $enus_language) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_title = ucwords($website_title).' '.$hyphen_separated_website_language;
	$website_title_html = ucwords($website_title = $website_titles_array[$selected_website_number]);
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_html_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

#Brazilian Portuguese language website_name, title, main_website_url and description
if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_title = ucwords($website_title).' '.$hyphen_separated_website_language;
	$website_title_html = ucwords($website_title);
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_html_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[1];
}

$tab_titles = array(
$tabnames[0],
);

#Tab Generator.php includer
require $website_tabs_generator;

?>