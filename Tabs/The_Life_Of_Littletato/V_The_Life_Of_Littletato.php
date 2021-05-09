<?php 

# Pequenata CSS Pack file includer
require $css_pack_pequenata;

#$full_language = $full_languages_array[$language_number];

# Folder variables
$selected_website_url = $main_website_url.$website_folder.'/';
$selected_website_url = $website_the_life_of_littletato_link;
$selected_website_folder = ${"website_folder_".$website_names_array[$selected_website_number]};

$story_folder = $littletato_story_folder;
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

# Defines the website image if the website has book covers or not
if ($website_story_has_book_covers_setting == True) {
	$story_book_cover_filename = 'Book Cover';

	$website_image = $story_book_cover_folder.$story_book_cover_filename.'.png';
	$website_image_size_computer = 60;
	$website_image_size_mobile = 88;
}

else {
	$website_image = $cdnimg.$website_image.'.jpg';

	$website_image_size_computer = 30;
	$website_image_size_mobile = 77;
}

$website_image_link = $website_image;

# Website numbers
$crossover_chapter_number = 26;
$comments_number = 11;
$comments_number_text = $comments_number + 1;
$website_comments_number = 8;
$website_comments_number_to_show = $website_comments_number - 1;
$number_of_chapter_comments = $comments_number_text - $website_comments_number;
$readed_number = 12;

# Non-language dependent texts
#$commentsbtn = '<a href="#'.$tabcode[6].'"><button class="w3-btn '.$first_button_style.' '.$computer_variable.'" onclick="openCity('."'".$tabcode[6]."')".'">'.$comments_number.' '.$icons[12].'</button></a>'."\n";
#$commentsbtnm = '<a href="#'.$tabcodem[6].'"><button class="w3-btn '.$first_button_style.' '.$mobile_variable.'" onclick="openCity('."'".$tabcodem[6]."')".'">'.$comments_number.' '.$icons[12].'</button></a>'."\n";

# TextFileReader.php File Includer
require $text_file_reader_file_php;

# Story date definer using story date text file
$story_creation_date = $story_creation_date[0];

# The chapter that I want to write
if ($website_chapter_to_write_setting == false) {
	$story_name_website_chapter_to_write = '';
}

else {
	$story_name_website_chapter_to_write = (int)$website_chapter_to_write_setting;
}

# Re-require of the VStories.php file to set the story name
require $story_variables_php_variable;

# Revised chapter number
$revised_chapter = $last_posted_chapter;

# Website descriptions
$website_descriptions_array = array(
'Website about my story, '.$story_name.', made by stake2', 
'Website sobre a minha história, '.$story_name.', feito por stake2',
);

# Synopsis text definer using the $synopsis that is generated from TextFileReader.php
$website_html_descriptions_array = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$story_synopsis[0].'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$story_synopsis[1].'"<br />',
);

# Reads the book cover image directory if the website has book covers
if ($website_story_has_book_covers_setting == True) {
	require $cover_images_generator_php_variable;
}

# English texts for Pequenata website
if (in_array($website_language, $en_languages_array)) {
	$read_texts_array = array(
	$reading_text = "You're reading",
	$reading_text.': '.ucwords($story_name),
	'I Read It ✓',
	'I read the Chapter',
	'Read the Chapter',
	'Readings',
	'Readers',
	'Reader',
	);

	$write_texts_array = array(
	'Write',
	'Write the Chapter',
	substr($reading_text, 0, -8).' '.strtolower('Writing').': '.ucwords($story_name),
	);
}

# Brazilian Portuguese texts for Pequenata website
if (in_array($website_language, $pt_languages_array)) {
	$read_texts_array = array(
	$reading_text = "Você está lendo",
	$reading_text.': '.ucwords($story_name),
	'Eu li ✓',
	'Eu li o Capítulo',
	'Leu o Capítulo',
	'Leituras',
	'Leitores',
	'Leitor',
	);

	$write_texts_array = array(
	'Escrever',
	'Escreva o capítulo',
	substr($reading_text, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story_name),
	);
}

# Status text definer, that sets the status text with [] around it
$statustxt = '['.ucfirst($story_status).']';

# Website name, title, URL and description setter, by language
if ($website_language == $language_geral) {
	$hyphen_separated_website_language = strtoupper($language_enus);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;

	$website_title = $general_story_name;
	$website_title_html = $general_story_name.': '.$icons[11];
	$website_link = $website_the_life_of_littletato_link;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

if ($website_language == $language_enus) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;

	$website_title = $story_name_variable;
	$website_title_html = $story_name_variable.': '.$icons[11];
	$website_link = $website_the_life_of_littletato_link.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;

	if ($website_language == $ptpt_language) {
		$website_title = $story_name_variable.' '.strtoupper($hyphen_separated_website_language);
	}

	else {
		$website_title = $story_name_variable;
	}

	$website_title_html = $story_name_variable.': '.$icons[11];
	$website_link = $website_the_life_of_littletato_link.strtoupper($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[1];
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
$the_life_of_littletato_spaceliving_chapter_crossover_link,
);

$variable_inserter_replacer_array = array(
" ".$the_life_of_littletato_link_name,
" ".$spaceliving_link_name,
$spaceliving_story_name." ",
" ".$till_chapter_nine_text,
);

?>