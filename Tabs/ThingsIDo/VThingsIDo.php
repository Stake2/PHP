<?php 

#CSS style variables
$color = 'black';
$color2 = 'blue';
$color3 = 'blue';
$color4 = 'w3-blue w3-text-black';
$colortext = 'w3-text-blue';
$colortext2 = 'w3-text-blue';
$sitehr = 'bluehr';
$sitehr2 = 'bluehr';
$sitehr3 = 'bluehr';
$spanstyle = 'blue w3-text-black';
$formbtnstyle = 'black w3-text-blue';

#Variables that mixes CSS tags
$textstyle = $colortext.' black';
$textstyle2 = 'w3-text-black white';
$first_button_style = $color4.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;
$sitewhilestyle = $color4;
$subtextspan = $whitespan;
$formcolor = $colortext2;

#HTML and HTML Style variables
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

#Site URL subdirectory for the online link
$siteurlcodes = array(
'Things_I_Do',
'Coisas_que_eu_faço',
);

#Story Variables php file includer
include $story_namevarsphp;

#Watch History website texts file includer
include $watch_texts_php;

#Folder variables
$selected_website_url = $main_website_url.$siteurlcodes[0].'/';
$siteurlgeral2 = $main_website_url.$siteurlcodes[1].'/';
$selected_website_folder = $php_tabs.ucwords($sitethingsido).'/';
$imageswebfolder = $local_cdn_image_drawings;
$drawingswebfolder = $cdn_image_drawings;

$mediareader2018 = $php_tabs.ucwords($site2018).'/'.$site2018.' MediaReader'.'.php';
$mediareader2019 = $php_tabs.ucwords($site2019).'/'.$site2019.' MediaReader'.'.php';

if (in_array($website_language, $en_languages_array)) {
	$watchedtypefile2018 = $notepad_years_folder_variable.$site2018.'/Watched VideoTypes '.$languages_array[1].'.txt';
}

if (in_array($website_language, $pt_languages_array)) {
	$watchedtypefile2018 = $notepad_years_folder_variable.$site2018.'/Watched VideoTypes '.$languages_array[2].'.txt';
}

$watchedtypefile2019 = $notepad_years_folder_variable.$site2019.'/Watched VideoTypes.txt';
$yearmakerfilephp2test = $php_tabs.ucwords($sitetextmaker).'/YearMaker2.php';
$yearmakerfilephp2test = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $yearmakerfilephp2test);

if (file_exists($watchedtypefile2018) == True) {
	$fp = fopen ($watchedtypefile2018, 'r', 'UTF-8'); 
	if ($fp) {
		$watchedfile2018 = explode("\n", fread($fp, filesize($watchedtypefile2018)));
	}
}

if (file_exists($watchedtypefile2019) == True) {
	$fp = fopen ($watchedtypefile2019, 'r', 'UTF-8'); 
	if ($fp) {
		$watchedfile2019 = explode("\n", fread($fp, filesize($watchedtypefile2019)));
	}
}

include $websites_tab_attributes;

$prodbtnsnumb = 5;
$unprodbtnsnumb = 4;
$mediabtnsnumb = 1;
$socialmedianumb = 16;
$imgnumb = 19;

#Site name in English and Brazilian Portuguese language
$websites_names_array = array(
'Things I Do',
'Coisas que eu faço',
);

#Site has comments settings
$sitecomments = false;

#Site image vars
if (in_array($website_language, $en_languages_array)) {
	$website_image = 'TID';
}

if (in_array($website_language, $pt_languages_array)) {
	$website_image = 'CQEF';
}

#Site image variables
$website_image = $website_image;
$website_image = $cdnimg.$website_image.".png";
$website_image_link = $website_image;
$website_image_size_computer = 30;
$imagesize2 = 66;

#Site descriptions
$website_descriptions_array = array(
'Site to show the things I do, made by stake2.',
'Site para mostrar as coisas que eu faço, feito por stake2.',
);

$website_html_descriptions_array = array(
'Site to show the things I do, made by '.$orangespan.'stake2'.$spanc.'.',
'Site para mostrar as coisas que eu faço, feito por '.$orangespan.'stake2'.$spanc.'.',
);

#ThindsIDo Texts.php file includer
include $selected_website_folder.'ThingsIDo Texts.php';

#Buttons definer

#Array of productive tab names
$prodtabnames = array(
$tabnames[2],
$tabnames[3],
$tabnames[4],
$tabnames[5],
$tabnames[6],
);

#Array of unproductive tab names
$unprodtabnames = array(
$tabnames[7],
$tabnames[8],
$tabnames[9],
$tabnames[10],
);

#Array of emdia tab names
$mediatabnames = array(
$tabnames[11],
$tabnames[12],
);

#Buttons names
$citiestxts = array(
$tabnames[0].': '.'<b>'.$pinkspan.$icons[10].$spanc.' '.'<span>'.$icons[24].' '.$icons[25].$spanc.$cyanspan.' ['.$icons[27].' '.$icons[0].'] '.$spanc.$pinkspan.$icons[26].$spanc.'</b>',
$tabnames[1].': '.'<b>'.'<span>'.$icons[23].$spanc.' '.$pinkspan.$icons[12].$spanc.' '.$cyanspan.$icons[0].$spanc.' '.$greenspan.$icons[22].$spanc.'</b>',
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
include $website_tabs_generator;

#Site name, title, main_website_url and description setter
if ($website_language == $languages_array[0]) {
	$website_language = $languages_array[1];
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $websites_names_array[0].' '.$hyphen_separated_website_language;
	$website_language = $languages_array[0];
	
	$website_title = $websites_names_array[0].' '.ucwords($website_language);
	$website_title_html = $websites_names_array[0].': '.$icons[4].' '.$icons[22];
	$website_link = $selected_website_url;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
	$website_language = $languages_array[0];
}

if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $websites_names_array[0];

	$website_title = $websites_names_array[0];
	$website_title_html = $websites_names_array[0].': '.$icons[4].' '.$icons[22];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $websites_names_array[1];

	$website_title = $websites_names_array[1];
	$website_title_html = $websites_names_array[1].': '.$icons[4].' '.$icons[22];
	$website_link = $siteurlgeral2;
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[1];
}

?>