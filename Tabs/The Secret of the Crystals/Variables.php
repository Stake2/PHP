<?php 

# Story name definer
$text = "The Secret of the Crystals";
$website_story_name = $story_names[$text];
$english_story_name = $english_story_names[$text];
$portuguese_story_name = $portuguese_story_names[$english_story_name];
$general_story_name = $english_story_name;

# Folder variables
$selected_website_url = $story_website_links[$english_story_name];

$story_folder = $english_story_name;
$no_language_story_folder = $mega_stories_folder.$story_folder."/";
$website_images_folder = $website_media_images_website_images.$story_folder."/";

# Form code for the comment and read forms
$website_form_code = $english_story_name;

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php_variable;

# Website numbers
$crossover = 9;
$comments_number = 3;
$website_comments_number = 0;
$comments_number_text = $comments_number;

$number_of_chapter_comments = $comments_number_text;

# Text File Reader PHP file includer
require $text_file_reader_file_php;

#$comments_number = $story_comments_check_number - 1;
$readed_number = 5;

# The chapter that I want to write
if ($website_chapter_to_write_setting == False) {
	$story_name_website_chapter_to_write = "";
}

else {
	$story_name_website_chapter_to_write = (int)$website_chapter_to_write_setting;
}

# Re-require of the StoryVars.php file to set the story name
require $story_variables_php;

# Story Details Definer PHP file includer
require $story_details_definer;

# Reads the book cover image directory if the website has book covers
if ($website_story_has_book_covers_setting == True) {
	require $cover_images_generator_php_variable;
}

# Website name, title, URL and description setter, by language
$website_name = $selected_website;
$website_title = $website_story_name." Geral";
$website_title_header = $website_story_name." Geral".': '.$icons[11];
$website_link = $selected_website_url;

if ($website_language != $language_geral) {
	$website_title = str_replace(" Geral", "", $website_title);

	if ($website_language == $ptpt_language) {
		$website_title .= " ".$website_title_language;
	}

	$website_title_header = str_replace(" Geral".': '.$icons[11], "", $website_title_header).': '.$icons[11];
	$website_link .= $website_link_language."/";
}

# Buttons and tabs definer
if ($website_writing_pack_setting == True) {
	$tab_names[0] = str_replace('Read', 'Write', $tab_names[0]);
	$tab_names[0] = str_replace('Ler', 'Escrever', $tab_names[0]);
}

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
": ".Create_Element("span", $w3_text_colors["white"]." ".$text_hover_white_css_class, $readers_number)." ".$icons[20]."<br />".$thanks_everyone_text,
": ".Create_Element("span", $w3_text_colors["white"], $stories_number)." ".$icons[11],
);

$custom_tab_titles_array = Mix_Arrays($custom_tab_names, $custom_tab_titles_array, $left_or_right = "right");

$use_custom_tab_titles_array = True;

$tab_texts = array();

Make_Button_Names();

# Website Style.php File Includer
require $website_style_file;

# Tab Generator.php includer
require $website_tabs_generator;

# Website notification variables if the website notification setting is True
if ($website_has_notifications == True) {
	# Revised chapter title
	$reviewed_chapter_code = $chapter_buttons[$revised_chapter];
	$reviewed_chapter_button_mobile = $chapter_buttons[$revised_chapter];
}

$sharks_maelstrom_ep_link = Make_Link("https://soundcloud.com/sharkstunes/sets/maelstrom-ep-rushdown-release", Language_Item_Definer("link here", "link aqui"), $text_white_css_class, $new_tab = True);

$sharks_coral = Make_Link("https://soundcloud.com/rushdownrecs/sharks-coral?in=sharkstunes/sets/maelstrom-ep-rushdown-release", "Coral", $text_white_css_class, $new_tab = True);

$variable_inserter_array = array(
$sharks_maelstrom_ep_link,
$sharks_coral,
$lapis_lazuli_steven_universe,
$ted_humanoid_the_secret_of_the_crystals_image,
);

?>