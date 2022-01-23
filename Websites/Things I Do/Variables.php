<?php 

#CSS style variables
#$color = 'black';
#$color2 = 'blue';
#$color3 = 'blue';
#$color4 = 'w3-blue w3-text-black';
#$colortext = 'w3-text-blue';
#$colortext2 = 'w3-text-blue';
#$sitehr = 'bluehr';
#$sitehr2 = 'bluehr';
#$sitehr3 = 'bluehr';
#$spanstyle = 'blue w3-text-black';
#$formbtnstyle = 'black w3-text-blue';
#
##Variables that mixes CSS tags
#$textstyle = $colortext.' black';
#$textstyle2 = 'w3-text-black white';
#$first_button_style = $color4.' '.$cssbtn1;
#$btnstyle2 = $color2.' '.$cssbtn1;
#$sitewhilestyle = $color4;
#$subtextspan = $whitespan;
#$formcolor = $colortext2;

#HTML and HTML Style variables
#$h2 = '<'.$h2_element.' class="'.$computer_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'">';
#$h4 = '<'.$h4_element.' class="'.$mobile_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'">';
#$h42 = '<'.$h4_element.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'">';
#$widthsize = '';
#$size = '';
#$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
#$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
#$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'"';
#$border = 'border-width:4px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'';
#$border2 = 'border-width:7px;border-color:'.$color3.';border-style:solid;'.$rounded_border_style_2.'';

#Website URL subdirectory for the online link
$siteurlcodes = array(
'Things_I_Do',
'Coisas_que_eu_faço',
);

#Story Variables php file includer
require $story_variables_php;

#Folder variables
$siteurlgeral2 = $main_website_url.$siteurlcodes[1].'/';
$website_info["php_folder"] = $website_folder_things_i_do;
$imageswebfolder = $local_cdn_image_drawings;
$drawingswebfolder = $cdn_image_drawings;

$watched_media_reader_2018 = $php_folder_websites.ucwords($website_2018).'/'.$website_2018.' MediaReader'.'.php';
$watched_media_reader_2019 = $php_folder_websites.ucwords($website_2019).'/'.$website_2019.' MediaReader'.'.php';

if (in_array($website_language, $en_languages_array)) {
	$watched_media_type_2018 = $notepad_years_folder.$website_2018.'/Watched VideoTypes '.$languages_array[1].'.txt';
}

if (in_array($website_language, $pt_languages_array)) {
	$watched_media_type_2018 = $notepad_years_folder.$website_2019.'/Watched VideoTypes '.$languages_array[2].'.txt';
}

$watchedtypefile2019 = $notepad_years_folder.$website_2019.'/Watched VideoTypes.txt';
$year_maker_file_php_2_test = $php_folder_websites.ucwords($sitetextmaker).'/YearMaker2.php';
$year_maker_file_php_2_test = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $year_maker_file_php_2_test);

if (file_exists($watched_media_type_2018) == True) {
	$fp = fopen ($watched_media_type_2018, 'r', 'UTF-8'); 
	if ($fp) {
		$watchedfile2018 = explode("\n", fread($fp, filesize($watched_media_type_2018)));
	}
}

if (file_exists($watchedtypefile2019) == True) {
	$fp = fopen ($watchedtypefile2019, 'r', 'UTF-8'); 
	if ($fp) {
		$watchedfile2019 = explode("\n", fread($fp, filesize($watchedtypefile2019)));
	}
}

require $websites_tab_arrays;

$prodbtnsnumb = 5;
$unprodbtnsnumb = 4;
$mediabtnsnumb = 1;
$socialmedianumb = 16;
$imgnumb = 19;

#Website name in English and Brazilian Portuguese language
$websites_names_array = array(
'Things I Do',
'Coisas que eu faço',
);

#Website has comments settings
$sitecomments = false;

#Website image vars
if (in_array($website_language, $en_languages_array)) {
	$website_image = 'TID';
}

if (in_array($website_language, $pt_languages_array)) {
	$website_image = 'CQEF';
}

#Website image variables
$website_image = $website_image;
$website_image = $cdnimg.$website_image.".png";
$website_image_link = $website_image;
$website_image_size_computer = 30;
$website_image_size_mobile= 66;

#Website descriptions
$website_descriptions_array = array(
'Website to show the things I do, made by stake2.',
'Website para mostrar as coisas que eu faço, feito por stake2.',
);

$website_html_descriptions_array = array(
'Website to show the things I do, made by '.$orangespan.'stake2'.$spanc.'.',
'Website para mostrar as coisas que eu faço, feito por '.$orangespan.'stake2'.$spanc.'.',
);

#ThindsIDo Texts.php file includer
require $website_info["php_folder"].'ThingsIDo Texts.php';

#Buttons definer

#Array of productive tab names
$prodtabnames = array(
$tab_names[2],
$tab_names[3],
$tab_names[4],
$tab_names[5],
$tab_names[6],
);

#Array of unproductive tab names
$unprodtabnames = array(
$tab_names[7],
$tab_names[8],
$tab_names[9],
$tab_names[10],
);

#Array of emdia tab names
$mediatabnames = array(
$tab_names[11],
$tab_names[12],
);

#Buttons names
$tab_texts = array(
$tab_names[0].': '.'<b>'.$pinkspan.$icons[10].$spanc.' '.'<span>'.$icons[24].' '.$icons[25].$spanc.$cyanspan.' ['.$icons[27].' '.$icons[0].'] '.$spanc.$pinkspan.$icons[26].$spanc.'</b>',
$tab_names[1].': '.'<b>'.'<span>'.$icons[23].$spanc.' '.$pinkspan.$icons[12].$spanc.' '.$cyanspan.$icons[0].$spanc.' '.$greenspan.$icons[22].$spanc.'</b>',
$prodtabnames[0].': '.$icons[10],
$prodtabnames[1].': '.$icons[24],
$prodtabnames[2].': '.$icons[25],
$prodtabnames[3].': '.' ['.$icons[27].' '.$icons[0].'] ',
$prodtabnames[4].': '.$icons[26],
$unprodtabnames[0].': '.$icons[23],
$unprodtabnames[1].': '.$icons[12],
$unprodtabnames[2].': '.$icons[0],
$unprodtabnames[3].': '.$icons[22],
$mediatabnames[0].': '.$icons[23],
$mediatabnames[1].': '.$icons[23],
);

#TabGenerator.php includer
require $website_tabs_generator;

#Website name, title, main_website_url and description setter
if ($website_language == $languages_array[0]) {
	$website_language = $languages_array[1];
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $websites_names_array[0].' '.$hyphen_separated_website_language;
	$website_language = $languages_array[0];
	
	$website_title_text = $websites_names_array[0].' '.ucwords($website_language);
	$website_title_header = $websites_names_array[0].': '.$icons[4].' '.$icons[22];
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
	$website_language = $languages_array[0];
}

if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $websites_names_array[0];

	$website_title_text = $websites_names_array[0];
	$website_title_header = $websites_names_array[0].': '.$icons[4].' '.$icons[22];
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $websites_names_array[1];

	$website_title_text = $websites_names_array[1];
	$website_title_header = $websites_names_array[1].': '.$icons[4].' '.$icons[22];
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[1];
}

?>