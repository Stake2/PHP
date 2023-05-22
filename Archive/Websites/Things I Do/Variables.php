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
$siteurlgeral2 = $website["url"].$siteurlcodes[1].'/';
$website_information["php_folder"] = $website_folder_things_i_do;
$imageswebfolder = $local_cdn_image_drawings;
$drawingswebfolder = $cdn_image_drawings;

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
if (in_array($website_information["language"], $en_languages_array)) {
	$website_image = 'TID';
}

if (in_array($website_information["language"], $pt_languages_array)) {
	$website_image = 'CQEF';
}

$website_information["image_link"] = $cdnimg.$website_image.".png";
$website_image_size_computer = 30;
$website_image_size_mobile = 66;

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
require $website_information["php_folder"].'ThingsIDo Texts.php';

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
if ($website_information["language"] == $languages_array[0]) {
	$website_information["language"] = $languages_array[1];
	$hyphen_separated_website_language = strtoupper($website_information["language"]);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_information["english_title"] = $websites_names_array[0].' '.$hyphen_separated_website_language;
	$website_information["language"] = $languages_array[0];
	
	$website_title_text = $websites_names_array[0].' '.ucwords($website_information["language"]);
	$website_title_header = $websites_names_array[0].': '.$icons[4].' '.$icons[22];
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
	$website_information["language"] = $languages_array[0];
}

if ($website_information["language"] == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_information["language"]);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_information["english_title"] = $websites_names_array[0];

	$website_title_text = $websites_names_array[0];
	$website_title_header = $websites_names_array[0].': '.$icons[4].' '.$icons[22];
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

if (in_array($website_information["language"], $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_information["language"]);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_information["english_title"] = $websites_names_array[1];

	$website_title_text = $websites_names_array[1];
	$website_title_header = $websites_names_array[1].': '.$icons[4].' '.$icons[22];
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[1];
}

?>