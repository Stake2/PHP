<?php 

# HTML and HTML Style variables
#$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
#$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
#$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
#$border = 'border-width:4px;border-color:'.'#ffffb3'.';border-style:solid;';
#$border2 = 'border-width:7px;border-color:'.$color3.';border-style:solid;';
#$h2 = '<'.$n.' class="'.$computer_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'">';'.$rounded_border_style_2.';
#$h4 = '<'.$m.' class="'.$mobile_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;">';
#$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'">';
#$widthsize = '';
#$size = '';
#$websites_tab_number_text_color = $subtextspan;
#$websites_tab_number_hover_color = $cssbtn5;

#$textstyle = 'w3-text-black'.' '.$ultimate_bg_color;

$story_name = $desert_island_story_name;

# New site name generator, generates: "desert_island"
$new_site_name = str_replace(' ', '_', strtolower($sitename_desertisland));

# Folder variables
$selected_website_url = $main_website_url.$new_site_name.'/';
$selected_website_folder = $php_tabs.ucwords($selected_website).'/';
$story_name_folder = $desert_island_story_folder;

# Form code for the comment and read forms
$formcode = 'desert_island';

$no_language_story_folder = $notepad_stories_folder_variable.$story_name_folder.'/';
$no_language_story_folder = $notepad_stories_folder_variable.$story_name_folder.'/';

$single_cover_folder = 'Capas';
$cover_folder = $cdn_image_stories_desertisland.$single_cover_folder.'/';

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_displayer_php_variable;

# Story name definer
$story_name_variable = $desert_island_story_name;

# Story status
$story_status = $status[1];

# Defines the site image if the site has book covers or not
if ($website_story_has_bookcovers_setting == true) {
	$story_name_cover_image_filename = '1';

	$website_image = $online_cover_subfolder.$story_name_cover_image_filename.'.png';
	$website_image_size_computer = 60;
	$website_image_size_mobile = 100;
}

else {
	$website_image = $cdnimg.$website_image.'.jpg';

	$website_image_size_computer = 30;
	$website_image_size_mobile = 77;
}

$website_image_link = $website_image;

# TextFileReader.php file includer
require $text_file_reader_file_php;

$chapters = $chapter_number[0];

# Story Details Definer.php file includer
require $story_name_details_definer_php;

$comments_number = 1;
$comments_number_text = $comments_number + 1;
$website_comments_number = 0;
$website_comments_number_to_show = $website_comments_number - 1;
$number_of_chapter_comments = $comments_number_text - $website_comments_number;

$readed_number = 1;

# Reads the book cover image directory if the site has book covers
if ($website_story_has_bookcovers_setting == true) {
	require $cover_images_generator_php_variable;
}

# Re-include of the StoryVars.php file to set the story name
include $story_name_variables_php_variable;

# English texts for Desert Island website
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
}

#Brazilian Portuguese texts for Desert Island website
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
}

#Status text definer, that sets the status text with [] around it
$statustxt = '['.ucfirst($story_status).']';

#Site name, title, main_website_url and description setter
if ($website_language == $geral_language) {
	$website_language = $enus_language;
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_language = $geral_language;

	$website_name = $enus_title.' '.$hyphen_separated_website_language;
	$website_title = $enus_title.' '.ucwords($website_language);
	$website_title_html = $enus_title.': '.$icons[11];
	$website_link = $selected_website_url;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];

	$website_language = $geral_language;
}

if ($website_language == $enus_language) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $enus_title;
	$website_title = $enus_title;
	$website_title_html = $enus_title.': '.$icons[11];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	if ($website_language == $ptpt_language) {
		$website_title = $websites_names_array[1].' '.strtoupper($hyphen_separated_website_language);
	}

	else {
		$website_title = $websites_names_array[1];
	}

	$website_name = $selected_website;
	$website_title_html = $story_name_variable.': '.$icons[11];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[1];
}

#Button names
$citiestxts = array(
$tabnames[0].': '.$icons[21].' '.$cyanspan.'['.$newtxt.' '.$chapters.']'.$spanc,
$tabnames[1].': '.$icons[20].' '.' ❤️ '.' 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$icons[11],
$icons[13],
);

#Buttons and tabs definer
#Tab chapter_titles definer
$tabtitles = array(
$tabnames[0].': '.$icons[21].' '.$cyanspan.'['.$newtxt.' '.$chapters.']'.$spanc,
$tabnames[1].': '.$icons[20].' '.' ❤️ '.' 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$yellowspan.$storiesnumb.$spanc.' '.$icons[11],
);

#Button names definer
$i = 0;
foreach ($tabtitles as $tabname) {
	$citiestxts[$i] = $tabname;

	$i++;
}

#TabGenerator.php includer
include $website_tabs_generator;

?>