<?php 

# Folder variables
#$selected_website_url = $main_website_url.$website_folder.'/';
$selected_website_url = $website_spaceliving_link;
$selected_website_folder = $php_folder_tabs.ucwords($selected_website).'/';
$story_folder = $spaceliving_story_folder;

# Form code for the comment and read forms
$website_form_code = 'spaceliving';

$no_language_story_folder = $notepad_stories_folder_variable.$story_folder.'/';

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php_variable;

# Story name definer
$story_name_variable = $spaceliving_story_name;
$story_name = $spaceliving_story_name;

# Story status
$story_status = $status[2];

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

$image_format = "gif";

# Story Details Definer PHP file includer
require $story_details_definer;

# Reads the book cover image directory if the website has book covers
if ($website_story_has_book_covers_setting == True) {
	require $cover_images_generator_php_variable;
}

$author_name = format($person_names_painted[$izaque_sanvezzo_name_small]." {}", Language_Item_Definer("and", "e"))." ".$julia_name_painted;

# Website name, title, URL and description setter, by language
$website_name = $selected_website;
$website_title = $story_name_variable;
$website_title_header = $story_name_variable.': '.$icons[11];
$website_link = $selected_website_url;

if ($website_language != $language_geral) {
	$website_title .= " ".$website_title_language;
	$website_title_header = str_replace(': '.$icons[11], "", $website_title_header)." ".$full_language.': '.$icons[11];
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

/*
# Button names definer
$i = 0;
foreach ($tab_titles as $tab_name) {
	$tab_texts[$i] = $tab_name;

	$i++;
}
*/

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

$gods_warrior_still_got_something_name = Language_Item_Definer("'Still Got Something' from God's Warrior", "'Still Got Something' do God's Warrior");

$songs = array(
"God's Warrior - Still Got Something" => '<a class="w3-text-white" href="https://www.youtube.com/watch?v=8WYMQbWUxGM">{}</a>',
);

$gods_warrior_still_got_something = format($songs["God's Warrior - Still Got Something"], "'Still Got Something'");
$gods_warrior_still_got_something_link = Make_Link("https://www.youtube.com/watch?v=8WYMQbWUxGM", $gods_warrior_still_got_something_name);

$skybreak_mizu_aurora_link = Make_Link("https://www.youtube.com/watch?v=J2P1_v9aFV8", "Skybreak & Mizu - Aurora", "w3-text-white");
$panda_eyes_take_my_hand_ft_azuria_sky_zane_remix = Make_Link("https://www.youtube.com/watch?v=OCIEd71mViM", "Panda Eyes - Take My Hand Ft. Azuria Sky (Z∆NE Remix)", $text_white_css_class);

$tom_and_jerrys_2021_soundtrack_playlist_name = Language_Item_Definer("the soundtrack of the Tom & Jerry movie from 2021", "a trilha sonora do filme Tom e Jerry de 2021");
$tom_and_jerrys_2021_soundtrack_playlist = Make_Link("https://www.youtube.com/playlist?list=PLDisKgcnAC4TkSDGxuPm1DeohG8FMEMNa", $tom_and_jerrys_2021_soundtrack_playlist_name, $text_white_css_class);
$tom_and_jerry_2021_married_in_the_park = Make_Link("https://www.youtube.com/watch?v=cAlTw8szj6Q&list=PLDisKgcnAC4TkSDGxuPm1DeohG8FMEMNa&index=42", "Tom & Jerry 2021 - Married In The Park", $text_white_css_class);
$tom_and_jerry_2021_the_weddings_off = Make_Link("https://www.youtube.com/watch?v=SCxnA10GOMA&list=PLDisKgcnAC4TkSDGxuPm1DeohG8FMEMNa&index=40", "Tom & Jerry 2021 - The Wedding's Off", $text_white_css_class);

$panda_eyes_opposite_side = Make_Link("https://www.youtube.com/watch?v=e0nay70SaXs", "Panda Eyes - Opposite Side", $text_white_css_class);

$variable_inserter_array = array(
$gods_warrior_still_got_something,
$skybreak_mizu_aurora_link,
$panda_eyes_take_my_hand_ft_azuria_sky_zane_remix,
$panda_eyes_opposite_side,
$tom_and_jerrys_2021_soundtrack_playlist,
$tom_and_jerry_2021_married_in_the_park,
$tom_and_jerry_2021_the_weddings_off,
$website_the_life_of_littletato_linked,
$website_the_story_of_the_nazzevo_brothers_linked,
$website_spaceliving_linked,
$website_spaceliving_linked_alternate,
$human_littletato_image,
$lisa_image,
$spaceliving_the_life_of_littletato_chapter_crossover_link,
$the_life_of_littletato_chapter_26,
$spaceliving_discord_join_link,
$spaceliving_lonelyship_pixel_art_story_cover,
$spaceliving_lonelyship_pixel_art_front_signboards,
$my_little_pony_fim_wikipedia_link,
);

$variable_inserter_replacer_array = array(
$gods_warrior_still_got_something_name." ",
"Skybreak & Mizu - Aurora ",
"Panda Eyes - Take My Hand Ft. Azuria Sky (Z∆NE Remix)",
$tom_and_jerrys_2021_soundtrack_playlist_name,
#"Tom & Jerry 2021 - Married In The Park ",
#"Tom & Jerry 2021 - Married In The Park ",
"Panda Eyes - Opposite Side ",
$the_life_of_littletato_link_name." ",
$spaceliving_story_name." ",
$the_story_of_the_nazzevo_brothers_story_name." ",
$chapter_twenty_six_text." ",
);

/*
$variable_inserter_array = array(
$gods_warrior_still_got_something_link,
$website_the_life_of_littletato_linked,
$website_the_story_of_the_nazzevo_brothers_linked,
$human_littletato_image,
$lisa_image,
$spaceliving_the_life_of_littletato_chapter_crossover_link,
);

$variable_inserter_replacer_array = array(
$gods_warrior_still_got_something_name,
$the_life_of_littletato_link_name,
$the_story_of_the_nazzevo_brothers_link_name,
"$"."human_littletato_image;",
"$"."lisa_image",
$crossover_previous_chapter_text_with_link_the_life_of_littletato,
);
*/

?>