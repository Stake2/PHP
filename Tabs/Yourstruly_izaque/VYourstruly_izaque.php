<?php

#CSS color and text style variables
$color2 = 'blue2';
$color3 = 'black';
$color4 = 'blue2';
$color5 = 'blue2';
$colortext = 'w3-text-white';
$colorsubtext = 'w3-text-black';
$colorsubtext2 = 'w3-text-black';
$sitehr = 'blackhr';
$sitehr2 = 'blackhr';
$sitehr3 = 'blackhr';
$spanstyle = '';
$formbtnstyle = '';

#Variables that mixes CSS tags
$textstyle = $colortext.' blue2';
$textstyle2 = 'w3-text-white black';
$first_button_style = $color4.' '.$cssbtn1;
$btnstyle2 = $color3.' '.$cssbtn1;
$btnstyle3 = $color5.' '.$cssbtn1;
$subtextspan = '<span class="'.$colorsubtext2.'">';
$subtextspan2 = '<span class="'.$colorsubtext.'">';
$spannewtextcolor = $subtextspan;
$sitewhilestyle = $color4;
$formcolor = $color4;

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
$m = 'h5';

#Folder variables
$selected_website_url = $main_website_url.$website_folder.'/';
$selected_website_folder = $php_tabs.ucwords($selected_website).'/';
$story_name_folder = $sistoryfolder;

#Defines the folder for the chapter text files that are going to be read
if ($website_language == $languages_array[0]) {
	$website_language = $languages_array[1];
	$story_chapter_files_folder_language = $notepad_stories_folder_variable.$story_name_folder.'/'.strtoupper($website_language).'/';
	$titles_file = $notepad_stories_folder_variable.$story_name_folder.'/CapTitles '.strtoupper($website_language).'.txt';

	$website_language = $languages_array[0];
}

else {
	$story_chapter_files_folder_language = $notepad_stories_folder_variable.$story_name_folder.'/'.strtoupper($website_language).'/';
	$titles_file = $notepad_stories_folder_variable.$story_name_folder.'/CapTitles '.strtoupper($website_language).'.txt';
}

#Site image vars
$website_image = 'Eu e o computador (Stake2)';

#Defines the site image if the site has book covers or not
$website_image = $cdnimg.$website_image.'.png';
$website_image_size_computer = 60;
$imagesize2 = 100;

$website_image_link = $website_image;

$filetextarraynames = array(
'chapter_titles',
);

$i = 0;
foreach ($filetextarraynames as $filename) {
	$filenumberarraynames[$i] = $filename.'number';

	$i++;
}

$filenamesarray = array(
$titles_file,
);

#TextFileReader.php file includer
include $text_file_reader_file_php;

$chapters = $titlesnumber - 1;

$websites_names_array = array(
'Yours truly, Izaque.',
'Sinceramente, Izaque.',
);

$website_descriptions_array = array(
'',
'',
);

#Site name, title, URL and description setter, by language
if ($website_language == $languages_array[0]) {
	$website_language = $languages_array[1];
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;
	$website_language = $languages_array[0];

	$website_title = $websites_names_array[0].' '.ucwords($languages_array[0]);
	$website_title_html = $websites_names_array[0];
	$website_link = $selected_website_url;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_descriptions_array[0];
	$website_language = $languages_array[0];
}

if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;

	$website_title = $websites_names_array[0];
	$website_title_html = $websites_names_array[0];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_descriptions_array[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $selected_website;

	$website_title = $websites_names_array[1];
	$website_title_html = $websites_names_array[1];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_descriptions_array[1];
}

#Buttons and tabs definer
#Tab chapter_titles definer
$tabtitles = array(
$blackspan.$tabnames[0].$spanc,
);

#Button names definer
$i = 0;
foreach ($tabnames as $tabname) {
	$citiestxts[$i] = $tabname;

	$i++;
}

#TabGenerator.php includer
include $website_tabs_generator;

?>