<?php

#CSS style variables
$color2 = 'yellow';
$color4 = 'white';
$colortext = 'w3-text-white';
$sitehr = 'whitehr';
$textstyle = 'w3-black w3-text-white';

#Variables that mixes CSS tags
$first_button_style = $color2.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;
$sitewhilestyle = $color2;

#HTML and HTML Style variables
$h2 = '<'.$n.' class="'.$computer_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color2.';border-style:solid;'.$rounded_border_style_2.'">';
$h4 = '<'.$m.' class="'.$mobile_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color2.';border-style:solid;'.$rounded_border_style_2.'">';
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color2.';border-style:solid;'.$rounded_border_style_2.'">';
$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'"';
$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'"';
$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'"';
$border = 'border-width:4px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'';
$border2 = 'border-width:7px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'';

#Folder variables
$yeartxtfolder = $notepad_years_folder_variable;
$selected_website_url = $main_website_url.'/'.$website_folder.'/'.$ano.'/';
$selected_website_folder = $php_tabs.$ano.'/';
$anosnumb = 3;

#VYears PHP files
$yearmakerfilephp = $php_tabs.ucwords($sitetextmaker).'/YearMaker.php';
$yearmakerfilephp2 = $php_tabs.ucwords($sitetextmaker).'/YearMaker2.php';
$yearmakerfilephp2test = $php_tabs.ucwords($sitetextmaker).'/YearMaker2.php';
$yearsbuttonsgenerator = $php_tabs.'Years/'.'YearsButtons Generator.php';

#English texts for all websites
if (in_array($website_language, $en_languages_array)) {
	$marginstyle4 = 'style="margin-right:75%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
	$marginstyle22 = 'style="margin-right:73%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
}

#Brazilian Portuguese texts for all websites
if (in_array($website_language, $pt_languages_array)) {
	$marginstyle4 = 'style="margin-right:78%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
	$marginstyle22 = 'style="margin-right:76%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
}

#Previous year button
$anoanteriorbtn = '<button class="w3-btn '.$first_button_style.'" onclick="window.open('."'".$main_website_url."years/".$anoanterior."/'".')"><'.$n.'>'.$anoanterior.': <i class="fas fa-globe-americas"></i></'.$n.'></button>';

#Mobile previous year button
$anoanteriorbtnm = '<button class="w3-btn '.$first_button_style.'" onclick="window.open('."'".$main_website_url."years/".$anoanterior."/'".')"><'.$m.'>'.$anoanterior.': <i class="fas fa-globe-americas"></i></'.$m.'></button>';

#Site image link and image size
$website_image = $ano;
$website_image = $cdnimg.$website_image.".png";
$website_image_link = $website_image;
$website_image_size_computer = 25;
$imagesize2 = 66;
$screenshotlink = '<a href="'.$cdnimg.'Jogos 616-691.gif" class="w3-text-blue">Jogos 616-691.gif</a>';

#Site descriptions
$website_descriptions_array = array(
'Website to show my '.$ano.', Site para mostar o meu '.$ano.' (stake2)', 
'Website to show my '.$ano.'. (stake2)',
'Site para mostar o meu '.$ano.' (stake2)',
);

$website_html_descriptions_array = array(
'Description: A website to show how my year '.$orangespan.'('.$ano.')'.$spanc.' was and what I did during it, I am '.$orangespan.'stake2'.$spanc.', or '.$orangespan.'Izaque'.$spanc,
'Descrição: Um site para mostar como meu ano '.$orangespan.'('.$ano.')'.$spanc.' foi e o que eu fiz durante ele, eu sou '.$orangespan.'stake2'.$spanc.', ou '.$orangespan.'Izaque'.$spanc,
);

#Year texts and YearNumbs.txt reader
include $yearsvarsfilephp;

#General language website_name, title, main_website_url and description
if ($website_language == $languages_array[0]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $site;
	$website_title = $ano;
	$website_title_html = $ano.': '.$icons[3];
	$website_link = $selected_website_url;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

#English language website_name, title, main_website_url and description
if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $website_folder;
	$website_name = $ano;
	$website_title = $ano." ".$hyphen_separated_website_language;
	$website_title_html = $ano.': '.$icons[3];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language)."/";
	$website_meta_description = $website_descriptions_array[1];
	$website_header_description = $website_html_descriptions_array[0];
}

#Brazilian Portuguese language website_name, title, main_website_url and description
if ($website_language == $languages_array[2]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);

	$website_name = $website_folder;
	$website_name = $ano;
	$website_title = $ano." ".$hyphen_separated_website_language;
	$website_title_html = $ano.': '.$icons[3];
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language)."/";
	$website_meta_description = $website_descriptions_array[2];
	$website_header_description = $website_html_descriptions_array[1];
}

#File definers
#Friends file
$friendsfile = $notepad_years_folder_variable.$site2019.'/Amigos List.txt';

#Tasks file
if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
	$taskmadefile = $notepad_folder_effort_variable.'/Will to Think and Register Thought/Productive Network/Archives/To-Do Slim '.$ano." Archive ".strtoupper($languages_array[1]).".txt";
}

if ($website_language == $languages_array[2]) {
	$taskmadefile = $notepad_folder_effort_variable.'/Will to Think and Register Thought/Productive Network/Archives/To-Do Slim '.$ano." Archive ".strtoupper($languages_array[2]).".txt";
}

#Number counters
#Friends number counter
$friendsfilecount = 0;
if (file_exists($friendsfile)) {
	$handle = fopen ($friendsfile, "r");
	while (!feof($handle)) {
		$line = fgets($handle);
		$friendsfilecount++;
	}
}

#Tasks number counter
$tasksfilecount = 0;
if (file_exists($taskmadefile)) {
	$handle = fopen ($taskmadefile, "r");
	while (!feof($handle)) {
		$line = fgets($handle);
		$tasksfilecount++;
	}
}

#Friends and Tasks numbers
$friendsfilecount2 = $friendsfilecount - 1;
$tasksfilecount2 = $tasksfilecount - 1;

#Text readers
#Friends file reader
if (file_exists($friendsfile)) {
	$fp = fopen ($friendsfile, 'r', 'UTF-8'); 
	if ($fp) {
		$friendsfiletxt = explode("\n", fread($fp, filesize($friendsfile)));
	}
}

#Tasks file reader
if (file_exists($taskmadefile)) {
	$fp = fopen ($taskmadefile, 'r', 'UTF-8'); 
	if ($fp) {
		$taskmadefiletxt = explode("\n", fread($fp, filesize($taskmadefile)));
	}
}

#Replacer for characters
if (isset($friendsfiletxt)) {
	$friendsfiletxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $friendsfiletxt);
}

if (isset($taskmadefiletxt)) {
	$taskmadefiletxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $taskmadefiletxt);
}

#TextFileReader.php file includer
include $text_file_reader_file_php;

$a2019 = false;
$reneneratemedias2019 = 'a';
$generate2019 = true;
#YearMaker2.php reader
ob_start();
include $yearmakerfilephp2;
$yearmakerfilephp2 = ob_get_clean();

?>