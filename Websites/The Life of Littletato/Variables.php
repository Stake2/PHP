<?php 

# Pequenata CSS Pack file includer
require $css_pack_pequenata;

# Story name definer
$local_website_name = "The Life of Littletato";
$website_story_name = $story_names[$local_website_name];
$english_story_name = $english_story_names[$local_website_name];
$portuguese_story_name = $portuguese_story_names[$english_story_name];
$general_story_name = "Littletato - Pequenata";

# Folder variables
$selected_website_url = $story_website_links[$english_story_name];

$story_folder = $english_story_name;
$no_language_story_folder = $mega_stories_folder.$story_folder."/";
$website_images_folder = $website_media_images_website_images.$story_folder."/";

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php_variable;

# Form code for the comment and read forms
$website_form_code = strtolower(str_replace(" ", "-", $english_story_name));

# Website numbers
$crossover_chapter_number = 26;
$comments_number = 5;
$comments_number_text = $comments_number + 1;
$website_comments_number = 8;
$website_comments_number_to_show = $website_comments_number;
$number_of_chapter_comments = $comments_number;
$readed_number = 31;

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

# Re-require of the VStories.php file to set the story name
require $story_variables_php;

# Story Details Definer PHP file includer
require $story_details_definer;

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

	if ($website_language == $ptpt_language) {
		$website_title = $website_story_name." ".$website_title_language;
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

# Website Style.php File Includer
require $website_style_file;

# Tab Generator.php File Includer
require $website_tabs_generator;

$read_story_button = $computer_buttons_bar[0];

# Website notification variables if the website notification setting is True
if ($website_has_notifications == True) {
	# Revised chapter title
	$reviewed_chapter_code = $chapter_buttons[$revised_chapter];
	$reviewed_chapter_button_mobile = $chapter_buttons[$revised_chapter];
}

$website_the_life_of_littletato_linked = $website_links[$local_website_name];
$website_spaceliving_linked = $website_links["SpaceLiving"];
$website_spaceliving_linked_alternate = $website_links["SpaceLiving"];

$variable_inserter_array = array(
$website_the_life_of_littletato_linked,
$website_spaceliving_linked,
$website_spaceliving_linked_alternate,
$spaceliving_chapter_9,
$littletato_anime_image,
$littletato_anime_image_link_not_cdn,
$human_littletato_image,
$lisa_image,
$the_life_of_littletato_spaceliving_chapter_crossover_link,
$spaceliving_lonelyship_pixel_art_story_cover,
$spaceliving_lonelyship_pixel_art_front_signboards,
$read_story_button,
$my_little_pony_fim_wikipedia_link,
$mansion_of_littletato_and_friends,
);

$variable_inserter_replacer_array = array(
" ".$the_life_of_littletato_link_name,
" ".$spaceliving_link_name,
$story_names["SpaceLiving"]." ",
$story_names["SpaceLiving"]."\ ",
" ".$till_chapter_nine_text,
$mlp_fim_wikipedia_link_text."/",
);

?>