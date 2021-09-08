<?php

#CSS style variables
#$color2 = 'yellow';
#$color4 = 'white';
#$colortext = 'w3-text-white';
#$sitehr = 'whitehr';
#$textstyle = 'w3-black w3-text-white';

#Variables that mixes CSS tags
#$first_button_style = $color2.' '.$cssbtn1;
#$btnstyle2 = $color2.' '.$cssbtn1;
#$sitewhilestyle = $color2;

#HTML and HTML Style variables
#$h2 = '<'.$h2_element.' class="'.$computer_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color2.';border-style:solid;'.$rounded_border_style_2.'">';
#$h4 = '<'.$h4_element.' class="'.$mobile_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color2.';border-style:solid;'.$rounded_border_style_2.'">';
#$h42 = '<'.$h4_element.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color2.';border-style:solid;'.$rounded_border_style_2.'">';
#$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'"';
#$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'"';
#$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'"';
#$border = 'border-width:4px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'';
#$border2 = 'border-width:7px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'';

# Folder variables
$year_text_files_folder = $notepad_years_folder;
$current_year_text_folder = $year_text_files_folder.$current_year.'/';

$year_folders = array();

$current_variable_year = 2018;

while ($current_variable_year <= $current_year) {
	$year_folders[$current_variable_year] = $year_text_files_folder.$current_variable_year.'/';

    $current_variable_year++;
}

$website_folder = strtolower($years_folder_variable);
$selected_website_url = $main_website_url.$website_folder.'/'.$current_year.'/';
$selected_website_folder = $php_folder_tabs.$current_year.'/';
$years_number = 3;

#VYears PHP files
$year_maker_file_php = $php_folder_tabs.ucwords($sitetextmaker).'/YearMaker.php';
$year_maker_2_file = $php_folder_tabs.ucwords($sitetextmaker).'/YearMaker2.php';
$year_maker_file_php_2_test = $php_folder_tabs.ucwords($sitetextmaker).'/YearMaker2.php';
$yearsbuttonsgenerator = $php_folder_tabs.'Years/'.'YearsButtons Generator.php';

#English texts for all websites
#if (in_array($website_language, $en_languages_array)) {
#	$marginstyle4 = 'style="margin-right:75%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
#	$marginstyle22 = 'style="margin-right:73%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
#}
#
##Brazilian Portuguese texts for all websites
#if (in_array($website_language, $pt_languages_array)) {
#	$marginstyle4 = 'style="margin-right:78%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
#	$marginstyle22 = 'style="margin-right:76%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
#}

# Website image link and image size
$website_image = $current_year;
$website_image = $cdnimg.$website_image.".png";
$website_image_link = $website_image;
$website_image_size_computer = 30;
$website_image_size_mobile = 66;
$screenshot_link = '<a href="'.$cdnimg.'Jogos 616-691.gif" class="w3-text-blue">Jogos 616-691.gif</a>';

#Website descriptions
$website_descriptions_array = array(
'Website to show my '.$current_year.', Website para mostar o meu '.$current_year.' (stake2)', 
'Website to show my '.$current_year.'. (stake2)',
'Website para mostar o meu '.$current_year.' (stake2)',
);

$website_html_descriptions_array = array(
'Description: A website to show how my year '.$orangespan.'('.$current_year.')'.$spanc.' was and what I did during it, I am '.$orangespan.'stake2'.$spanc.', or '.$orangespan.'Izaque'.$spanc.'.',
'Descrição: Um website para mostar como meu ano '.$orangespan.'('.$current_year.')'.$spanc.' foi e o que eu fiz durante ele, eu sou '.$orangespan.'stake2'.$spanc.', ou '.$orangespan.'Izaque'.$spanc.'.',
);

#Year texts and YearNumbs.txt reader
require $year_variables_file;

#General language website_name, title, main_website_url and description
if ($website_language == $languages_array[0]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $website;
	$website_title = $current_year;
	$website_title_header = $current_year.': '.$icons[3];
	$website_link = $selected_website_url;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

#English language website_name, title, main_website_url and description
if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $website_folder;
	$website_name = $current_year;
	$website_title = $current_year." ".$hyphen_separated_website_language;
	$website_title_header = $current_year.': '.$icons[3];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language)."/";
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[0];
}

#Brazilian Portuguese language website_name, title, main_website_url and description
if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $website_folder;
	$website_name = $current_year;
	$website_title = $current_year." ".$hyphen_separated_website_language;
	$website_title_header = $current_year.': '.$icons[3];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language)."/";
	$website_meta_description = $website_descriptions_array[2];
	$website_header_description = $website_html_descriptions_array[1];
}

#File definers
#Friends file
$year_friends_file = $notepad_years_folder.$site2019.'/Friends List.txt';

#Tasks file
if (in_array($website_language, $en_languages_array)) {
	$year_made_tasks_file = $notepad_effort_folder.'/Will to Think and Register Thought/Productive Network/Archives/To-Do Slim '.$current_year." Archive ".strtoupper($languages_array[1]).".txt";
}

if (in_array($website_language, $pt_languages_array)) {
	$year_made_tasks_file = $notepad_effort_folder.'/Will to Think and Register Thought/Productive Network/Archives/To-Do Slim '.$current_year." Archive ".strtoupper($languages_array[2]).".txt";
}

#Number counters
#Friends number counter
$year_friends_file_number = 0;
if (file_exists($year_friends_file)) {
	$handle = fopen($year_friends_file, "r");
	while (!feof($handle)) {
		$line = fgets($handle);
		$year_friends_file_number++;
	}
}

#Tasks number counter
$year_tasks_file_number = 0;
if (file_exists($year_made_tasks_file)) {
	$handle = fopen($year_made_tasks_file, "r");
	while (!feof($handle)) {
		$line = fgets($handle);
		$year_tasks_file_number++;
	}
}

#Friends and Tasks numbers
$year_friends_file_number_2 = $year_friends_file_number - 1;
$year_tasks_file_number2 = $year_tasks_file_number - 1;

#Text readers
#Friends file reader
if (file_exists($year_friends_file)) {
	$fp = fopen($year_friends_file, 'r', 'UTF-8'); 
	if ($fp) {
		$year_friends_text = explode("\n", fread($fp, filesize($year_friends_file)));
	}
}

#Tasks file reader
if (file_exists($year_made_tasks_file)) {
	$fp = fopen($year_made_tasks_file, 'r', 'UTF-8'); 
	if ($fp) {
		$year_made_tasks_filetxt = explode("\n", fread($fp, filesize($year_made_tasks_file)));
	}
}

#Replacer for characters
if (isset($year_friends_text)) {
	$year_friends_text = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $year_friends_text);
}

if (isset($year_made_tasks_filetxt)) {
	$year_made_tasks_filetxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $year_made_tasks_filetxt);
}

#TextFileReader.php file includer
require $text_file_reader_file_php;

#$a2019 = false;
#$regenerate_2019_medias = 'a';
#$generate2019 = True;
#YearMaker2.php reader
#ob_start();
#require $year_maker_2_file;
#$year_maker_2_file = ob_get_clean();

?>