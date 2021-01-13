<?php 

#CSS color and text style variables
/*
$color = "background_blue";
$color1 = "background_blue";
$color2 = "background_blue";
$color3 = "background_blue";
$color4 = "background_blue";
$color5 = "background_blue";
$colortext = "w3-text-blue";
$colortext2 = "w3-text-black";
$colorsubtext = "w3-text-orange";
$colorsubtext2 = "w3-text-black";
$colorsubtext3 = "w3-text-white";
$sitehr = $border_1px_solid_with_color_template."blue";
$sitehr2 = $border_1px_solid_with_color_template."blue";
$sitehr3 = $border_1px_solid_with_color_template."black";
$spanstyle = "background_blue w3-text-black";
$formbtnstyle = "background_black w3-text-blue";

#Variables that mixes CSS tags
$textstyle = $colortext." background_black";
$textstyle2 = "w3-text-black background_blue";
$first_button_style = $color4.' '.$cssbtn1;
$btnstyle2 = $color3.' '.$cssbtn1;
$btnstyle3 = $color5.' '.$cssbtn1;
$subtextspan = '<span class="'.$colorsubtext3.'">';
$subtextspan2 = '<span class="'.$colorsubtext.'">';
$spannewtextcolor = $subtextspan;
$sitewhilestyle = $color4;
$formcolor = $color4;
$websites_tab_number_text_color = $subtextspan;
$websites_tab_number_hover_color = $cssbtn5;

#HTML and HTML Style variables
$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
$border = 'border-width:4px;border-color:'.$color3.';border-style:solid;';
$border2 = 'border-width:7px;border-color:'.$color3.';border-style:solid;';
$h2 = '<'.$n.' class="'.$computer_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'">';'.$rounded_border_style_2.';
$h4 = '<'.$m.' class="'.$mobile_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;">';
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'">';
$widthsize = '';
$size = '';
*/

#Folder variables
$selected_website_url = $main_website_url.$website_folder.'/';
$selected_website_folder = $php_tabs.ucwords($selected_website).'/';
$story_name_folder = $slstoryfolder;

#Form code for the comment and read forms
$formcode = 'spaceliving';

$no_language_story_folder = $notepad_stories_folder_variable.$story_name_folder.'/';

#Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_displayer_php_variable;

#Story name definer
$story_name_variable = $spaceliving_story_name;

#Story status
$story_status = $status[2];

#Site image vars
$website_image = 'SpaceLiving Logo';

#Defines the site image if the site has book covers or not
if ($website_story_has_bookcovers_setting == true) {
	$website_image = $coverfolder.'1 '.$covertxt.'.png';
	$website_image_size_computer = 60;
	$imagesize2 = 88;
}

else {
	$website_image = $cdnimg.$website_image.'.jpg';
	$website_image_size_computer = 55;
	$imagesize2 = 99;
}

$website_image_link = $website_image;

#Site numbers
$crossover = 9;
#$comments_number = 1;
$website_comments_number = 0;

if ($website_has_comments == true) {
	$comments_number_text = $comments_number + 1;
	$website_comments_number_to_show = $website_comments_number - 1;
}

else {
	$comments_number_text = $comments_number;
	$website_comments_number_to_show = $website_comments_number;	
}

$number_of_chapter_comments = $comments_number_text - $website_comments_number;

#Non-language dependent texts
#$commentsbtn = '<a href="#'.$tabcode[6].'"><button class="w3-btn '.$first_button_style.' '.$computer_variable.'" onclick="openCity('."'".$tabcode[6]."')".'">'.$comments_number.' '.$icons[12].'</button></a>'."\n";
#$commentsbtnm = '<a href="#'.$tabcodem[6].'"><button class="w3-btn '.$first_button_style.' '.$mobile_variable.'" onclick="openCity('."'".$tabcodem[6]."')".'">'.$comments_number.' '.$icons[12].'</button></a>'."\n";

#TextFileReader.php file includer
include $text_file_reader_file_php;

$comments_number = $comments_check_number - 1;

#Story date definer using story date text file
$story_namedate = $story_namedate[0];

#The chapter that I want to write
if ($website_chapter_to_write_setting == false) {
	$story_name_website_chapter_to_write = '';
}

else {
	$story_name_website_chapter_to_write = (int)$website_chapter_to_write_setting;
}

#Re-include of the StoryVars.php file to set the story name
include $story_name_variables_php_variable;

#Reviewed chapter number
$reviewed_chapter = 3;

#Website descriptions
$website_descriptions_array = array(
'Website about my story, '.$story_name.', made by stake2', 
'Site sobre a minha história, '.$story_name.', feito por stake2',
);

#Synopsis text definer using the $story_synopsis that is generated from TextFileReader.php
$website_html_descriptions_array = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$story_synopsis[0].'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$story_synopsis[1].'"<br />',
);

#Reads the book cover image directory if the site has book covers
if ($website_story_has_bookcovers_setting == true) {
	require $cover_images_generator_php_variable;
}

#English texts for Pequenata website
if (in_array($website_language, $en_languages_array)) {
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

	$write_texts_array = array(
	'Write',
	'Write the Chapter',
	substr($readingtxt, 0, -8).' '.strtolower('Writing').': '.ucwords($story_name),
	);

	$author_name = 'Izaque Sanvezzo (stake2) and Julia';
}

#Brazilian Portuguese texts for Pequenata website
if (in_array($website_language, $pt_languages_array)) {
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

	$write_texts_array = array(
	'Escrever',
	'Escreva o capítulo',
	substr($readingtxt, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story_name),
	);

	$author_name = 'Izaque Sanvezzo (stake2) e Julia';
}

#Status text definer, that sets the status text with [] around it
$statustxt = '['.ucfirst($story_status).']';

#Site name, title, URL and description setter, by language
if ($website_language == $languages_array[0]) {
	$website_language = $languages_array[1];

	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;

	$website_language = $languages_array[0];

	$website_title = $story_name_folder;
	$website_title_html = $story_name_folder.': '.$icons[11];
	$website_link = $website_spaceliving_link;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];

	$website_language = $languages_array[0];
}

if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;

	$website_title = $story_name_variable.' '.$hyphen_separated_website_language;
	$website_title_html = $story_name_variable.': '.$icons[11];
	$website_link = $website_spaceliving_link.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;

	$website_title = $story_name_variable.' '.$hyphen_separated_website_language;
	$website_title_html = $story_name_variable.': '.$icons[11];
	$website_link = $website_spaceliving_link.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[1];
}

#Buttons and tabs definer
#Tab names replacer for languages_array
if (in_array($website_language, $en_languages_array)) {
	$tabnames[5] = substr_replace($tabnames[5], '-', 6, 0);
	$tabnames[5] = strtr($tabnames[5], "l", strtoupper("l"));;
}

if ($website_writing_pack_setting == true) {
	$tabnames[0] = str_replace('Read', 'Write', $tabnames[0]);
	$tabnames[0] = str_replace('Ler', 'Escrever', $tabnames[0]);
}

#str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", ${"$filetextarraynames[$i]"});

#Button names
$citiestxts = array(
$tabnames[0].': '.$icons[21].' '.$whitespan.'['.$newtxt.' '.$chapters.']'.$spanc,
$tabnames[1].': '.$icons[20].' '.$icon_heart_painted_red.' ❤️ '.$icon_smile_beam_painted_yellow.' 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$icons[11],
$icons[13],
);

#Buttons and tabs definer
#Tab chapter_titles definer
$tabtitles = array(
$tabnames[0].': '.$icons[21].' '.$whitespan.'['.$newtxt.' '.$chapters.']'.$spanc,
$tabnames[1].': '.$icons[20].' '.$icon_heart_painted_red.' ❤️ '.$icon_smile_beam_painted_yellow.' 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$whitespan.'<span class="'.$websites_tab_number_hover_color.'">'.$storiesnumb.$spanc.$spanc.' '.$icons[11],
);

#Button names definer
$i = 0;
foreach ($tabtitles as $tabname) {
	$citiestxts[$i] = $tabname;

	$i++;
}

#TabGenerator.php includer
include $website_tabs_generator;

#Site notification variables if the site notification setting is true
if ($website_has_notifications == true) {
	#Reviewed chapter title
	$reviewed_chaptercode = $chapter_buttons[$reviewed_chapter];
}

?>