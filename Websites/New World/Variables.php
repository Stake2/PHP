<?php

# Story name definer
$local_website_name = "New World";
$website_story_name = $story_names[$local_website_name];
$english_story_name = $english_story_names[$local_website_name];
$portuguese_story_name = $portuguese_story_names[$english_story_name];

# Story status
$story_status = $status[2];

# Text File Reader PHP file includer
require $text_file_reader_file_php;

# Re-require of the StoryVars.php file to set the story name
require $story_variables_php;

$website_info["image_format"] = "png";

$website_info["website_folder_name"] = "New World";

# Story Details Definer PHP file includer
require $story_details_definer;

# Buttons and tabs definer
# Tab chapter_titles definer
$tab_titles_prototype = array(
	$icons[21],
	$icons[20].' ❤️',
	" ".$icons[11],
);

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;

$custom_tab_titles = array(
	$chapter_in_language.": ".$website_language_icon,
	": ".Create_Element("span", $w3_text_colors["white"]." ".$text_hover_white_css_class, $story_info["readers_number"])." ".$icons[20]."<br />".$thanks_everyone_text,
	": ".Create_Element("span", $w3_text_colors["white"], $stories_number)." ".$icons[11],
);

$custom_tab_titles = Mix_Arrays($custom_tab_names, $custom_tab_titles, $left_or_right = "right");

$tab_texts = array();

Make_Button_Names();

$variable_inserter_array = array(
	$spaceliving_lonelyship_pixel_art_story_cover,
	$spaceliving_lonelyship_pixel_art_front_signboards,
);

# Website name, title, URL and description setter, by language
$website_info["language_title"] = $website_story_name;
$website_info["language_title_with_icon"] = $website_info["language_title"].": ".$icons[11];

?>