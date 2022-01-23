<?php 

# Story name definer
$general_story_name = "Littletato - Pequenata";

# Folder variables
$story_folder = $english_story_name;
$no_language_story_folder = $mega_stories_folder.$story_folder."/";
$website_images_folder = $website_media_images_website_images.$story_folder."/";

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php;

# Form code for the comment and read forms
$website_form_code = mb_strtolower(str_replace(" ", "-", $english_story_name));

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
if ($story_website_settings["has_story_covers"] == True) {
	require $cover_images_generator_php;
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

$website_settings["use_custom_tab_titles"] = True;

$tab_texts = array();

Make_Button_Names();

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

# Website name, title, URL and description setter, by language
$website_title_text = $general_story_name;
$website_title_header = $general_story_name.": ".$icons[11];

if ($website_language != $language_geral) {
	$website_title_text = $website_story_name;

	if ($website_language == $ptpt_language) {
		$website_title_text .= " ".$website_title_language;
	}

	$website_title_header = $website_title_text.": ".$icons[11];

	$website_info["link"] .= $website_info["language_hyphen"]."/";
}

?>