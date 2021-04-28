<?php 

# Folder variables
$selected_website_url = $website_the_story_of_the_nazzevo_brothers_link;
$selected_website_folder = $php_tabs.ucwords($website_nazzevo).'/';
$story_folder = $nazzevo_story_folder;

# Form code for the comment and read forms
$formcode = 'nazzevo';

$no_language_story_folder = $notepad_stories_folder_variable.$story_folder.'/';

$single_cover_folder = 'Capas/';

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php_variable;

# Story name definer
$story_name_variable = $nazzevo_story_name;

# Story status
$story_status = $status_finished_and_publishing;

# Comments variable
$sitecomments = True;

# Website image vars
$website_image = 'nazzevo';

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

# Numbers and non-language dependent texts
$comments_number = 0;
$comments_number_text = $comments_number + 1;
$website_comments_number = 0;
$website_comments_number_to_show = $website_comments_number - 1;
$number_of_chapter_comments = $comments_number_text - $website_comments_number;
$readed_number = 1;
$author_name = 'Izaque Sanvezzo (stake2)'.' '.$whitespan.$andtxt.$spanc.' '.$purplespan.'Lulu Black Fazbear'.$spanc;
#$commentsbtn = '<a href="# '.$tabcode[6].'"><button class="w3-btn '.$first_button_style.' '.$computer_variable.'" onclick="openCity('."'".$tabcode[6]."')".'">'.$comments_number.' '.$icons[12].'</button></a>'."\n";
#$commentsbtnm = '<a href="# '.$tabcodem[6].'"><button class="w3-btn '.$first_button_style.' '.$mobile_variable.'" onclick="openCity('."'".$tabcodem[6]."')".'">'.$comments_number.' '.$icons[12].'</button></a>'."\n";

# Text File Reader.php file includer
include $text_file_reader_file_php;

# Chapters and storydate definer using Story date.txt and ChapterNumber.txt
$chapters = $chapter_number[0];
$story_creation_date = $story_creation_date[0];

# Website descriptions
$website_descriptions_array = array(
'Website about my story, '.$story_name.', made by stake2', 
'Website sobre a minha história, '.$story_name.', feito por stake2',
);

$website_html_descriptions_array = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$story_synopsis[0].'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$story_synopsis[1].'"<br />',
);

# Re-include of the VStories.php file to set the story name
include $story_variables_php_variable;

# Texts for the English language
if (in_array($website_language, $en_languages_array)) {
	$author_text = 'Author';
	$chapters_text = 'Chapters';
	$chapter_date_text = 'Date';
	$chapter_date_text_two = 'Made in';

	$person_name_text = 'Name';
	$person_name_text_two = 'Your';
	$send_form_text = 'Send';

	# Status text definer, that sets the status text with [] around it
	$statustxt = ucfirst($story_status);

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

	$comments_texts_array = array(
	'Comment',
	'Comment',
	'Commented',
	'in the',
	'on',
	'Say what you think about the story',
	'Say what you think about the chapter',
	);

	$titletxt = 'Title';
	$story_text_text = 'Story text';
	$time_text = 'Time';
	$stories_text = 'Stories';
	$form_name = 'Name';
	$form_text = 'Form';
	
	$write_texts_array = array(
	'Write',
	'Write the Chapter',
	substr($reading_text, 0, -8).' '.strtolower('Writing').': '.ucwords($story_name),
	);

	$readers_description = "Thanks everyone ♥";
}

# Texts for the Brazilian Portuguese language
if (in_array($website_language, $pt_languages_array)) {
	$author_text = 'Autor';
	$chapters_text = "Capítulos";
	$chapter_date_text = "Data";
	$chapter_date_text_two = "Feito em";

	$person_name_text = 'Nome';
	$person_name_text_two = 'Seu';
	$send_form_text = 'Enviar';

	# Status text definer, that sets the status text with [] around it
	$statustxt = ucfirst($story_status);

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

	$comments_texts_array = array(
	'Comentário',
	'Comentar',
	'Comentado',
	'no',
	'em',
	'Comente o que achou da história',
	'Comente o que achou do capítulo',
	);

	$time_text = 'Tempo';
	$stories_text = "Histórias";
	$form_name = "Nome";
	$form_text = 'Formulário';

	$write_texts_array = array(
	'Escrever',
	'Escreva o capítulo',
	substr($reading_text, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story_name),
	);

	$readers_description = "Obrigado a todos ♥";
}

# Reads the book cover image directory if the website has book covers
if ($website_story_has_book_covers_setting == True) {
	require $cover_images_generator_php_variable;
}

# "You're reading" text definers
$statustxt = "[".$statustxt."]";

# Website name, title, main_website_url and description setter
if ($website_language == $languages_array[0]) {
	$website_language = $languages_array[1];
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $website_name;
	$website_language = $languages_array[0];
	
	$website_title = $story_name_variable.' '.ucwords($website_language);
	$website_title_html = $story_name_variable.': '.$icons[11];
	$website_link = $selected_website_url;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
	$website_language = $languages_array[0];
}

if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $website_name;
	
	$website_title = $story_name_variable;
	$website_title_html = $story_name_variable.': '.$icons[11];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $website_name;

	$website_title = $story_name_variable;
	$website_title_html = $story_name_variable.': '.$icons[11];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[1];
}

# Buttons definer
if (in_array($website_language, $en_languages_array)) {
	$tabnames[5] = substr_replace($tabnames[5], '-', 6, 0);
	$tabnames[5] = strtr($tabnames[5], "l", strtoupper("l"));;
}

# Button names
$citiestxts = array(
$tabnames[0].': '.$icons[21],
$tabnames[1].': '.$icons[20].' ❤️ 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$icons[11],
$icons[13],
'',
);

# Website Style.php File Includer
require $selected_website_style_file;

# Tab Generator.php includer
include $website_tabs_generator;

# Website notification variables
if ($website_has_notifications == True) {
	# Revised chapter title
	$reviewed_chaptercode = $chapter_buttons[0];
}

?>