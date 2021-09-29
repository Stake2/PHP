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

# Website name, title, URL and description setter, by language
$website_name = $selected_website;
$website_title = $general_story_name;
$website_title_header = $general_story_name.': '.$icons[11];

if ($website_language != $language_geral) {
	$website_title = $website_story_name;

	if ($website_language != $ptbr_language) {
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