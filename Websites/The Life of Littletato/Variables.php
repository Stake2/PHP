<?php 

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

# Re-require of the VStories.php file to set the story name
require $story_variables_php;

# Story Details Definer PHP file includer
require $story_details_definer;

$tab_titles_prototype = array(
	$icons_array["open book"],
	$icons_array["reader"]." ❤️",
	$icons_array["book"],
);

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;
$custom_tab_names[0] = "";

$custom_tab_titles = array(
	$chapter_in_language.": ".$website_language_icon,
	": ".Create_Element("span", $w3_text_colors["orange"]." ".$text_hover_white_css_class, $story_info["readers_number"])." ".$icons[20]."<br />".$thanks_everyone_text,
	": ".Create_Element("span", $w3_text_colors["orange"], $stories_number)." ".$icons[11],
);

$custom_tab_titles = Mix_Arrays($custom_tab_names, $custom_tab_titles, $left_or_right = "right");

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
$website_information["language_title"] = $website_story_name;
$website_information["language_title_with_icon"] = $website_information["language_title"].": ".$icons[11];

?>