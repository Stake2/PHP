<?php 

# Story name definer
$text = "Desert Island";
$website_story_name = $story_names[$text];
$english_story_name = $english_story_names[$text];
$portuguese_story_name = $portuguese_story_names[$english_story_name];
$general_story_name = "Desert Island";

# Folder variables
$selected_website_url = $story_website_links[$english_story_name];

$story_folder = $english_story_name;
$no_language_story_folder = $mega_stories_folder.$story_folder."/";
$website_images_folder = $website_media_images_website_images.$story_folder."/";

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php_variable;

# Form code for the comment and read forms
$website_form_code = strtolower(str_replace(" ", "-", $english_story_name));

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

# Re-require of the VStories.php file to set the story name
require $story_variables_php;

# Story Details Definer PHP file includer
require $story_details_definer;

$comments_number = 1;
$comments_number_text = $comments_number + 1;
$website_comments_number = 0;
$website_comments_number_to_show = $website_comments_number - 1;
$number_of_chapter_comments = $comments_number_text - $website_comments_number;

$readed_number = 1;

# Reads the book cover image directory if the website has book covers
if ($website_story_has_book_covers_setting == True) {
	require $cover_images_generator_php_variable;
}

/*
#Website name, title, main_website_url and description setter
if ($website_language == $language_geral) {
	$website_language = $language_enus;
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_language = $language_geral;

	$website_name = $enus_title.' '.$hyphen_separated_website_language;
	$website_title = $enus_title.' '.ucwords($website_language);
	$website_title_header = $enus_title.': '.$icons[11];
	$website_link = $selected_website_url;

	$website_language = $language_geral;
}

if ($website_language == $language_enus) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $enus_title;
	$website_title = $enus_title;
	$website_title_header = $enus_title.': '.$icons[11];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	if ($website_language == $ptpt_language) {
		$website_title = $websites_names_array[1].' '.strtoupper($hyphen_separated_website_language);
	}

	else {
		$website_title = $websites_names_array[1];
	}

	$website_name = $selected_website;
	$website_title_header = $story_name.': '.$icons[11];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
}

# Button names
$tab_texts = array(
$tab_names[0].': '.$icons[21].' '.$cyanspan.'['.$new_text.' '.$chapters.']'.$spanc,
$tab_names[1].': '.$icons[20].' '.' ❤️ '.' 😊',
$tab_names[2].': '.$icons[12],
$tab_names[3].': '.$icons[10],
$tab_names[4].': '.$icons[11],
$icons[13],
);

# Buttons and tabs definer
# Tab chapter_titles definer
$tab_titles = array(
$tab_names[0].': '.$icons[21].' '.$cyanspan.'['.$new_text.' '.$chapters.']'.$spanc,
$tab_names[1].': '.$icons[20].' '.' ❤️ '.' 😊',
$tab_names[2].': '.$icons[12],
$tab_names[3].': '.$icons[10],
$tab_names[4].': '.$yellowspan.$stories_number.$spanc.' '.$icons[11],
);

# Button names definer
$i = 0;
foreach ($tab_titles as $tabname) {
	$tab_texts[$i] = $tabname;

	$i++;
}
*/

# Website name, title, URL and description setter, by language
$website_name = $selected_website;
$website_title = $general_story_name;
$website_title_header = $general_story_name.': '.$icons[11];

if ($website_language != $language_geral) {
	$website_title = $website_story_name;

	if ($website_language == $ptpt_language) {
		$website_title = $website_story_name." ".strtoupper($website_title_language);
	}

	$website_title_header = $website_title.': '.$icons[11];
}

# Buttons and tabs definer
if ($website_writing_pack_setting == True) {
	$tab_names[0] = str_replace('Read', 'Write', $tab_names[0]);
	$tab_names[0] = str_replace('Ler', 'Escrever', $tab_names[0]);
}

$tab_titles_prototype = array(
$icons_array["open book"],
$icons_array["reader"]." ❤️",
$icons_array["book"],
);

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;
$custom_tab_names[0] = "";

$custom_tab_titles_array = array(
$chapter_in_language.": ".$website_language_icon,
": ".Create_Element("span", $w3_text_colors["orange"]." ".$text_hover_white_css_class, $readers_number)." ".$icons[20]."<br />".$thanks_everyone_text,
": ".Create_Element("span", $w3_text_colors["orange"], $stories_number)." ".$icons[11],
);

$custom_tab_titles_array = Mix_Arrays($custom_tab_names, $custom_tab_titles_array, $left_or_right = "right");

$use_custom_tab_titles_array = True;

$tab_texts = array();

Make_Button_Names();

# Tab Generator.php includer
require $website_tabs_generator;

?>