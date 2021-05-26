<?php 

# Pequenata CSS Pack file includer
require $css_pack_pequenata;

#$full_language = $full_languages_array[$language_number];

# Folder variables
$selected_website_url = $main_website_url.$website_folder.'/';
$selected_website_url = $website_the_life_of_littletato_link;
$selected_website_folder = ${"website_folder_".$website_names_array[$selected_website_number]};

$story_folder = $the_life_of_littletato_story_folder;
$story_name = $littletato_story_name;
$no_language_story_folder = $notepad_stories_folder_variable.$story_folder.'/';
$website_images_folder = $website_media_images_website_images.$story_folder."/";

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php_variable;

# Story name definer
$story_name_variable = $littletato_story_name;
$general_story_name = "Littletato - Pequenata";

# Story status
$story_status = $status_reviewing_and_editing;

# Website image vars
$website_image = 'pequenata';

# Form code for the comment and read forms
$formcode = 'pequenata';

# Website numbers
$crossover_chapter_number = 26;
$comments_number = 7;
$comments_number_text = $comments_number + 1;
$website_comments_number = 8;
$website_comments_number_to_show = $website_comments_number - 1;
$number_of_chapter_comments = $comments_number_text - $website_comments_number;
$readed_number = 12;

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

# The chapter that I want to write
if ($website_chapter_to_write_setting == false) {
	$story_name_website_chapter_to_write = '';
}

else {
	$story_name_website_chapter_to_write = (int)$website_chapter_to_write_setting;
}

# Re-require of the VStories.php file to set the story name
require $story_variables_php;

# Story Details Definer PHP file includer
require $story_details_definer;

# Revised chapter number
$revised_chapter = $last_posted_chapter;

# Reads the book cover image directory if the website has book covers
if ($website_story_has_book_covers_setting == True) {
	require $cover_images_generator_php_variable;
}

# Website name, title, URL and description setter, by language
$website_name = $selected_website;
$website_title = $general_story_name;
$website_title_header = $general_story_name.': '.$icons[11];
$website_link = $selected_website_url;

if ($website_language != $language_geral) {
	$website_title = $story_name_variable;
	$website_title_header = $website_title.': '.$icons[11];
	$website_link .= $website_link_language."/";
}

# Buttons and tabs definer
#  Tab names replacer for languages_array
if (in_array($website_language, $en_languages_array)) {
	$tabnames[5] = substr_replace($tabnames[5], '-', 6, 0);
	$tabnames[5] = strtr($tabnames[5], "l", strtoupper("l"));;
}

if ($website_writing_pack_setting == True) {
	$tabnames[0] = str_replace('Read', 'Write', $tabnames[0]);
	$tabnames[0] = str_replace('Ler', 'Escrever', $tabnames[0]);
}

# Button names
$citiestxts = array(
$tabnames[0].': '.$icons[21].' '.'<span class="w3-text-yellow"> ['.$newtxt.' '.$chapters.']</span>',
$tabnames[1].': '.$icons[20].' ❤️ 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$icons[11],
$icons[13],
'',
);

# Website Style.php File Includer
require $website_style_file;

# Tab Generator.php File Includer
require $website_tabs_generator;

# Website notification variables if the website notification setting is True
if ($website_has_notifications == True) {
	# Revised chapter title
	$reviewed_chapter_code = $chapter_buttons[$revised_chapter];
	$reviewed_chapter_button_mobile = $chapter_buttons[$revised_chapter];
}

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
);

$variable_inserter_replacer_array = array(
" ".$the_life_of_littletato_link_name,
" ".$spaceliving_link_name,
$spaceliving_story_name." ",
" ".$till_chapter_nine_text,
);

?>