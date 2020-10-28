<?php 

#CSS style variables
$color = 'white';
$color2 = 'white';
$color3 = 'white';
$color4 = 'w3-white';
$colortext = 'w3-text-white';
$colortext2 = 'w3-text-black';
$sitehr = 'whitehr';
$sitehr2 = 'whitehr';
$sitehr3 = 'whitehr';
$spanstyle = 'grey w3-text-black';
$formbtnstyle = 'black w3-text-white';

#Variables that mixes CSS tags
$textstyle = $colortext.' black';
$textstyle2 = 'w3-text-black white';
$first_button_style = $color4.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;
$sitewhilestyle = $color4;
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

#Folder variables
$selected_website_url = $main_website_url.$website_folder.'/';
$selected_website_folder = $sitefolder_izaquemultiverse;

$siteimagename = 'stk2';
$website_image = $cdnimg.$siteimagename.'.png';
$website_image_link = $website_image;
$website_image_size_computer = 30;
$imagesize2 = 66;

if (empty($siteimagename)) {
	$website_image = $cdnimg.'template.png';
	$website_image_link = $website_image;
}

$websites_names_array = array(
'Test title',
'Título Teste',
);

$filenamesarray = array(
$selected_website_folder.'Descriptions'.'.txt',
);

$filetextarraynames = array(
'descriptions',
);

$i = 0;
foreach ($filetextarraynames as $filename) {
	$filenumberarraynames[$i] = $filename.'number';

	$i++;
}

#TextFileReader.php file includer
include $textfilereaderphp;

if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
	$placeholderdesc = 'Placeholder for the Description';
}

if ($website_language == $languages_array[2]) {
	$placeholderdesc = 'Espaço reservado para a Descrição.';
}

if (isset($descriptions)) {
	$website_descriptions_array = array(
	$descriptions[0],
	$descriptions[1],
	);
}

else {
	$website_descriptions_array = array(
	$placeholderdesc,
	$placeholderdesc,
	);
}

if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
	$placeholdertitle = 'Placeholder for the Tab Title: [Icon]';
}

if ($website_language == $languages_array[2]) {
	$placeholdertitle = 'Espaço reservado para o Título da Aba: [Ícone]';
}

#Tab chapter_titles definer
$tabtitles = array(
$tabnames[0],
);

#Tab chapter_titles definer
if (!isset($tabtitles) or empty($tabtitles) or $tabtitles[0] == '') {
	$tabtitles = array(
	$placeholdertitle,
	);
}

#Button names definer
$i = 0;
foreach ($tabnames as $tabname) {
	$citiestxts[$i] = $tabname;

	$i++;
}

#TabGenerator.php includer
include $website_tabs_generator;

#Site name, title, main_website_url and description setter
if ($website_language == $languages_array[0]) {
	$website_language = $languages_array[1];
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $websites_names_array[0].' '.$hyphen_separated_website_language;
	$website_title = $websites_names_array[0];
	$website_title_html = $websites_names_array[0].': '.$icons[11];
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_descriptions_array[0];

	$website_link = $selected_website_url;
	$website_language = $languages_array[0];
}

if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $websites_names_array[0];
	$website_title = $websites_names_array[0].' '.$hyphen_separated_website_language;
	$website_title_html = $websites_names_array[0].': '.$icons[11];
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_descriptions_array[0];

	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
}

if ($website_language == $languages_array[2]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $websites_names_array[1].' '.$hyphen_separated_website_language;
	$website_title = $websites_names_array[1].' '.$hyphen_separated_website_language;
	$website_title_html = $websites_names_array[1].': '.$icons[11];
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_descriptions_array[1];

	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
}

if (!isset($website_link) and !isset($website_title) and !isset($website_title_html)) {
	if ($website_language == $languages_array[0]) {
		$website_language = $languages_array[1];
		$hyphen_separated_website_language = strtoupper($website_language);
		$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
		$website_language = $languages_array[0];

		$website_name = 'Placeholder for the Site Name';
		$website_title = 'Placeholder for the Site Title';
		$website_title_html = 'Placeholder for the Site Title2';
		$website_meta_description = 'Placeholder for the Description.';
		$website_header_description = 'Placeholder for the Description.';

		$website_link = $selected_website_url;

		$website_language = $languages_array[0];
	}

	if ($website_language == $languages_array[1]) {
		$website_name = 'Placeholder for the Site Name';
		$website_title = 'Placeholder for the Site Title';
		$website_title_html = 'Placeholder for the Site Title2';
		$website_meta_description = 'Placeholder for the Description.';
		$website_header_description = 'Placeholder for the Description.';

		$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	}

	if ($website_language == $languages_array[2]) {
		$website_name = 'Espaço reservado para o Nome do Site';
		$website_title = 'Espaço reservado para o Título do Site';
		$website_title_html = 'Espaço reservado para o Título do Site2';
		$website_meta_description = 'Espaço reservado para a Descrição.';
		$website_header_description = 'Espaço reservado para a Descrição.';

		$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	}
}

?>