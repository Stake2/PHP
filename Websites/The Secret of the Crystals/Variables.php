<?php 

# Story name definer
$text = "The Secret of the Crystals";
$website_story_name = $story_names[$text];
$english_story_name = $english_story_names[$text];
$portuguese_story_name = $portuguese_story_names[$english_story_name];

# Text File Reader PHP file includer
require $text_file_reader_file_php;

# Re-require of the StoryVars.php file to set the story name
require $story_variables_php;

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
$custom_tab_names[0] = "";

$custom_tab_titles_array = array(
$chapter_in_language.": ".$website_language_icon,
": ".Create_Element("span", $w3_text_colors["white"]." ".$text_hover_white_css_class, $story_info["readers_number"])." ".$icons[20]."<br />".$thanks_everyone_text,
": ".Create_Element("span", $w3_text_colors["white"], $stories_number)." ".$icons[11],
);

$custom_tab_titles_array = Mix_Arrays($custom_tab_names, $custom_tab_titles_array, $left_or_right = "right");

$tab_texts = array();

Make_Button_Names();

$sharks_maelstrom_ep_link = Make_Link("https://soundcloud.com/sharkstunes/sets/maelstrom-ep-rushdown-release", Language_Item_Definer("link here", "link aqui"), $text_white_css_class, $new_tab = True);

$sharks_maelstrom_ep_youtube_link = Make_Link("https://www.youtube.com/watch?v=B1wglf-7EkU", Language_Item_Definer("YouTube link", "Link do YouTube"), $text_white_css_class, $new_tab = True);

$sharks_coral = Make_Link("https://soundcloud.com/rushdownrecs/sharks-coral?in=sharkstunes/sets/maelstrom-ep-rushdown-release", "Coral", $text_white_css_class, $new_tab = True);

$variable_inserter_array = array(
$sharks_maelstrom_ep_link,
$sharks_maelstrom_ep_youtube_link,
$sharks_coral,
$lapis_lazuli_steven_universe,
$ted_humanoid_the_secret_of_the_crystals_image,
);

# Website name, title, URL and description setter, by language
$website_info["language_title"] = $website_story_name;
$website_info["language_title_with_icon"] = $website_info["language_title"].": ".$icons[11];

?>