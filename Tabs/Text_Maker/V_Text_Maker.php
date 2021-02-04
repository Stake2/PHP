<?php 

#CSS style variables
$color2 = 'yellow';
$color4 = 'white';
$colortext = 'w3-text-white';
$sitehr = 'whitehr';
$sitehr2 = 'whitehr';
$textstyle = 'w3-black w3-text-white';

#Variables that mixes CSS tags
$first_button_style = $color2.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;
$sitewhilestyle = $color2;

#HTML and HTML Style variables
$h2 = '<'.$n.' class="'.$computer_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;">';
$h4 = '<'.$m.' class="'.$mobile_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;">';
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;">';
$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'"';
$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;"';
$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;"';
$border = 'border-width:4px;border-color:'.$color4.';border-style:solid;';
$border2 = 'border-width:7px;border-color:'.$color4.';border-style:solid;';
$website_header_description = 'tet';

#Folder variables
$selected_website_url = $main_website_url.$website_folder."/";
$selected_website_folder = $php_tabs.ucwords($selected_website).'/';
$year_text_files_folder = $notepad_years_folder_variable;

#Website image vars
$website_image = 'TM';
$website_image = $cdnimg.$website_image.".png";
$website_image_link = $website_image;
$website_image_size_computer = 27;
$imagesize2 = 61;

#Website descriptions
$website_descriptions_array = array(
'Website to make text files using texts and numbers.', 
'Website para fazer arquivos de texto usando textos e números.',
);

#Year Numbers.txt file and YearMaker.php file definers
$yearnumbsfile = $year_text_files_folder.'2019/2019 Numbers.txt';
$year_maker_file_php = $php_tabs.ucwords($website).'/YearMaker.php';
$year_maker_2_file = $php_tabs.ucwords($website).'/YearMaker2.php';
$story_namenumbsfile = $notepad_stories_folder_variable.'Story Numbers'.'.txt';

#Story text file definer
if (in_array($website_language, $en_languages_array)) {
	$story_nametxtsfile = $notepad_stories_folder_variable.'My Stories.txt';
}

if (in_array($website_language, $pt_languages_array)) {
	$story_nametxtsfile = $notepad_stories_folder_variable.'Minhas Histórias.txt';
}

#StoryMaker.php definer
$story_namemakerfilephp = $php_tabs.ucwords($website).'/StoryMaker.php';

#YearsVars.php file includer
include $yearsvarsfilephp;

#Website name, title, URL and description setter, by language
if ($website_language == $languages_array[0]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $website;
	$website_title = $sitename2;
	$website_title_html = $sitename2;
	$website_link = $selected_website_url;
	$website_meta_description = $website_descriptions_array[0];
}

if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $website;
	$website_title = $sitename2;
	$website_title_html = $sitename2;
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $website;
	$website_title = $sitename2;
	$website_title_html = $sitename2;
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[1];
}

#Loading the CityContents of the City2
ob_start();
if (file_exists($selected_website_folder.'CityContent2.php')) {
	$file = $selected_website_folder.'CityContent2.php';
	include $file;
}

$citycontents2 = ob_get_clean();

#Button names
$citiestxts = array(
$tabnames[0].': '.$icons[14], 
$tabnames[1].': '.$icons[14],
$tabnames[2].': '.$icons[14],
);

#TabGenerator.php includer
include $website_tabs_generator;

?>