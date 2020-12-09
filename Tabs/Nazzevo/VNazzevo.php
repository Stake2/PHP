<?php 

# CSS style variables
$color2 = 'yellow';
$color3 = '#b88e50';
$color4 = 'bg2';
$colortext = 'pqnttext';
$colortext2 = 'w3-text-black';
$colorsubtext = 'w3-text-orange';
$sitehr = 'pqnthr';
$sitehr2 = 'pqnthr';
$sitehr3 = 'blackhr';
$spanstyle = "pqntspan";
$formbtnstyle = "pqntsend";

# Variables that mixes CSS tags
$textstyle = $colortext.' blackbg';
$textstyle2 = 'w3-text-black bg';
$textstyleinvert = $colortext2.' bg';
$first_button_style = $color4.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;
$btnstyle3 = $color4.' '.$cssbtn1;
$subtextspan = '<span class="'.$colorsubtext.'">';
$sitewhilestyle = $color4;
$formcolor = $color4;

# HTML and HTML Style variables
$h2 = '<'.$n.' class="'.$computer_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'">';
$h4 = '<'.$m.' class="'.$mobile_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'">';
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'">';
$widthsize = '';
$size = '';
$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
$border = 'border-width:4px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'';
$border2 = 'border-width:7px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'';

# Folder variables
$selected_website_url = $main_website_url.$website_folder."/";
$selected_website_folder = $php_tabs.ucwords($sitenazzevo).'/';
$story_name_folder = $nazzevostoryfolder;

# Form code for the comment and read forms
$formcode = 'nazzevo';

$no_language_story_folder = $notepad_stories_folder_variable.$story_name_folder.'/';
$no_language_story_folder = $notepad_stories_folder_variable.$story_name_folder.'/';

$single_cover_folder = 'Capas/';
$cover_folder = $cdn_image_stories_nazzevo.$single_cover_folder;

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_displayer_php_variable;

# Story name definer
$story_name_variable = $nazzevo_story_name;

# Story status
$story_status = $status_finished_and_publishing;

# Comments variable
$sitecomments = true;

# Site image vars
$website_image = 'nazzevo';

# Defines the site image if the site has book covers or not
if ($website_story_has_bookcovers_setting == true) {
	$story_name_cover_image_filename = '1';

	$website_image = $online_cover_subfolder.$story_name_cover_image_filename.'.png';
	$website_image_size_computer = 60;
	$imagesize2 = 88;
}

else {
	$website_image = $cdnimg.$website_image.'.jpg';

	$website_image_size_computer = 30;
	$imagesize2 = 77;
}

$website_image_link = $website_image;

# Numbers and non-language dependent texts
$comments_number = 0;
$comments_number_text = $comments_number + 1;
$website_comments_number = 1;
$commentsnormalnumbtowrite = $website_comments_number - 1;
$number_of_chapter_comments = $comments_number_text - $website_comments_number;
$readed_number = 1;
$authorname = 'Izaque Sanvezzo (stake2)'.' '.$whitespan.$andtxt.$spanc.' '.$purplespan.'Lulu Black Fazbear'.$spanc;
$commentsbtn = '<a href="# '.$tabcode[6].'"><button class="w3-btn '.$first_button_style.' '.$computer_variable.'" onclick="openCity('."'".$tabcode[6]."')".'">'.$comments_number.' '.$icons[12].'</button></a>'."\n";
$commentsbtnm = '<a href="# '.$tabcodem[6].'"><button class="w3-btn '.$first_button_style.' '.$mobile_variable.'" onclick="openCity('."'".$tabcodem[6]."')".'">'.$comments_number.' '.$icons[12].'</button></a>'."\n";

# TextFileReader.php file includer
include $text_file_reader_file_php;

# Chapters and storydate definer using Story date.txt and ChapterNumber.txt
$chapters = $chapters[0];
$story_namedate = $story_namedate[0];

# Site descriptions
$website_descriptions_array = array(
'Website about my story, '.$story_name.', made by stake2', 
'Site sobre a minha história, '.$story_name.', feito por stake2',
);

$website_html_descriptions_array = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$synopsis[0].'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$synopsis[1].'"<br />',
);

# Re-include of the StoryVars.php file to set the story name
include $story_name_variables_php_variable;

# Texts for the English language
if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
	$authortxt = 'Author';
	$captxt = 'Chapters';
	$datatxt = 'Date';
	$datatxt2 = 'Made in';

	$nametxt1 = 'Name';
	$nametxt2 = 'Your';
	$sendtxt = 'Send';

	# Status text definer, that sets the status text with [] around it
	$statustxt = ucfirst($story_status);

	$read_texts_array = array(
	$readingtxt = "You're reading",
	$readingtxt.': '.ucwords($story_name),
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
	$story_nametxt = 'Story text';
	$timetxt = 'Time';
	$storiestxt = 'Stories';
	$formname = 'Name';
	$formtxt = 'Form';
	
	$write_texts_array = array(
	'Write',
	'Write the Chapter',
	substr($readingtxt, 0, -8).' '.strtolower('Writing').': '.ucwords($story_name),
	);

	$readersdesc = "Thanks everyone ♥";
}

# Texts for the Brazilian Portuguese language
if ($website_language == $languages_array[2]) {
	$authortxt = 'Autor';
	$captxt = "Capítulos";
	$datatxt = "Data";
	$datatxt2 = "Feito em";

	$nametxt1 = 'Nome';
	$nametxt2 = 'Seu';
	$sendtxt = 'Enviar';

	# Status text definer, that sets the status text with [] around it
	$statustxt = ucfirst($story_status);

	$read_texts_array = array(
	$readingtxt = "Você está lendo",
	$readingtxt.': '.ucwords($story_name),
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

	$timetxt = 'Tempo';
	$storiestxt = "Histórias";
	$formname = "Nome";
	$formtxt = 'Formulário';

	$write_texts_array = array(
	'Escrever',
	'Escreva o capítulo',
	substr($readingtxt, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story_name),
	);

	$readersdesc = "Obrigado a todos ♥";
}

# Reads the book cover image directory if the site has book covers
if ($website_story_has_bookcovers_setting == true) {
	require $cover_images_generator_php_variable;
}

# "You're reading" text definers
$statustxt = "[".$statustxt."]";

# Site name, title, main_website_url and description setter
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

if ($website_language == $languages_array[2]) {
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
if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
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

# TabGenerator.php includer
include $website_tabs_generator;

# Site notification variables
if ($website_has_notifications == true) {
	# Reviewed chapter title
	$reviewed_chaptercode = $chapter_buttons[0];
}

?>