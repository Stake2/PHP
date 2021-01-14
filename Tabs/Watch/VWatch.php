<?php 

# CSS style variables
/*
$color2 = $background_yellow_css_class;
$color4 = $background_blue_css_class;
$colortext = "w3-text-blue";
$sitehr = $border_1px_solid_blue;
$sitehr2 = $border_1px_solid_yellow;
$textstyle = $background_white_css_class." w3-text-white";

# Variables that mixes CSS tags
$first_button_style = $color4.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;

# HTML and HTML Style variables
$h2 = '<'.$n.' class="'.$computer_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'">';
$h4 = '<'.$m.' class="'.$mobile_variable.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'">';
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'">';
$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'"';
$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'"';
$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'"';
$sitewhilestyle = $color4;
$border = 'border-width:4px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'';
$border2 = 'border-width:7px;border-color:'.$color4.';border-style:solid;'.$rounded_border_style_2.'';
*/

#$website_border_color = "slhr";
#$website_border_color = $border_3px_solid_blue_css_class;

#$watched_movies_number = 0;

#Folder variables
$selected_website_url = $website_watch_history_link;
$selected_website_folder = $php_tabs.ucwords($site).'/';

#Comment links
$watched_movie_comment_links = array(
$cdn_text_movie_comments.'Hoje, Sexta (Vingadores Guerra Infinita).txt', 
$cdn_text_movie_comments.'Hoje, Segunda (Power Rangers 2017).txt', 
$cdn_text_movie_comments.'Hoje, Sabado (Detona Ralph 2 Ralph Quebra a Internet).txt', 
$cdn_text_movie_comments.'Hoje, Domingo (Equestria Girls Spring Breakdown).txt', 
$cdn_text_movie_comments.'Hoje, Sabado 2 (Os Vingadores Ultimato).txt',
$cdn_text_movie_comments.'Homem-Aranha Longe de Casa 2019.txt',
);

#Comments buttons
$watched_movie_comments = array(
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[0]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[1]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[2]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[3]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[4]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>',
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[5]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>',
);

#Site image link and image size
$website_image = 'WH';
$website_image = $cdnimg.$website_image.".png";
$website_image_link = $website_image;
$website_image_size_computer = 27;
$website_image_size_mobile = 50;

#Site descriptions
$website_descriptions_array = array(
'Website to show videos, animes, series, movies that I watched and that I will watch, made by stake2.', 
'Site para mostrar videos, animes, séries, filmes que assisti e videos que eu vou assistir, feito por stake2.');

$website_html_descriptions_array = array(
'Website to show videos, animes, series, movies that I watched and that I will watch, made by stake2.', 
'Site para mostrar videos, animes, séries, filmes que assisti e videos que eu vou assistir, feito por stake2.');

#Media links for the Links tab
$media_links_array = array(
'https://www.baixarseriesmp4.com/baixar-the-walking-dead-6a-temporada-dublado-e-legendado-mega/', 
'https://www.baixarseriesmp4.org/baixar-the-walking-dead-7a-temporada-dublado-e-legendado/', 
'https://www.baixarseriesmp4.org/baixar-the-walking-dead-8a-temporada-dublado-e-legendado/', 
'https://www.baixarseriesmp4.org/baixar-the-walking-dead-9a-temporada-mp4-dublado-e-legendado/',
'https://pt.wikipedia.org/wiki/Lista_de_epis%C3%B3dios_de_The_Walking_Dead', 
'https://diario.netlify.app/cdn/sites/twdlist.htm', 
'https://mlp.fandom.com/pt/wiki/A_Amizade_é_Mágica_mídia_de_animação', 
'https://diario.netlify.app/cdn/sites/mlplist.htm',
'http://www.itunesmaxhd.com/2015/08/ben-10-forca-alienigena-s01-completa.html',
'http://www.itunesmaxhd.com/2015/08/ben-10-forca-alienigenas02.html',
'http://www.itunesmaxhd.com/2016/03/ben-10-alien-force-3-temporada-completa.html',
'https://www.youtube.com/user/ElectronicDesireGE/videos/',
'https://www.superanimes.site/anime/sword-art-online-alicization/',
'https://www.superanimes.site/anime/bang-dream-2/',
'https://bandori.fandom.com/wiki/BanG_Dream!_2nd_Season/',
);

# Image links for the Links tab
$media_image_links_array = array(
$cdnimg.'twd.jpg', 
$cdnimg.'mlp.png', 
$cdnimg.'ben10.jpg', 
$cdnimg.'alan.jpg', 
$cdnimg.'saoa.jpg', 
$cdnimg.'bg.jpg',
);

$media_links_number = count($media_image_links_array);

# Text File Reader.php file includer
require $text_file_reader_file_php;

$mobileversion = '';

# YearNumbers.txt reader for showing the Archived Medias from 2018 and 2019 in Watch History tab: "Archived Media > 2018" and "2019"
require $year_variables_file;

#Watch History website texts file includer
require $watchtextsphp;

#General language website_name, title, main_website_url and description
if ($website_language == $languages_array[0]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $site;
	
	$website_title = ucwords($site).' History';
	$website_title_html = ucwords($site).' History'.': '.$icons[5].' '.'<span class="'.$second_text_color.'">'.'['.$every_year_watched_number." ".$mediastxt.']'.$spanc;
	$website_link = $selected_website_url;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

#English language website_name, title, main_website_url and description
if ($website_language == $languages_array[1]) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $site;
	
	$website_title = ucwords($site).' History '.$hyphen_separated_website_language;
	$website_title_html = ucwords($site).' History '.$hyphen_separated_website_language.': '.$icons[5].' '.'<span class="'.$second_text_color.'">'.'['.$every_year_watched_number." ".$mediastxt.']'.$spanc;
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

#Brazilian Portuguese language website_name, title, main_website_url and description
if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $site;

	$website_title = ucwords($site).' History '.$hyphen_separated_website_language;
	$website_title_html = ucwords($site).' History '.$hyphen_separated_website_language.': '.$icons[5].' '.'<span class="'.$second_text_color.'">'.'['.$every_year_watched_number." ".$mediastxt.']'.$spanc;
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[1];
}

#Tabtexts definers for English and General language
if (in_array($website_language, $en_languages_array)) {
	$tabnames[0] = substr_replace($tabnames[0], ' ', 7, 0);
	$tabnames[7] = substr_replace($tabnames[7], '-', 6, 0);
	$tabnames[7] = strtr($tabnames[7], "l", strtoupper("l"));;
}

#Tabtexts definers for Brazilian Portuguese language
if (in_array($website_language, $pt_languages_array)) {
	$tabnames[0] = substr_replace($tabnames[0], ' ', 10, 0);
}

#Tabtexts array
$citiestxts = array(
$tabnames[0].' ['.$current_year_watched_number_text.']'.': '.$icons[5],
$tabnames[1].' ['.$to_watch_items.']'.': '.$icons[6],
$tabnames[2].' ['.$media_links_number.']'.': '.$icons[7],
$tabnames[3].' ['.$watched_movies_number.']'.': '.$icons[19],
$tabnames[4].' ['.$archived_medias_number.']'.': '.$icons[8],
$tabnames[5].' ['.$watched_number_2018.']'.': '.$icons[8],
$tabnames[6].' ['.$watched_number_2019.']'.': '.$icons[8],
$icons[13],
);

#Tabtexts array
$citiestxtswithouthtml = array(
$tabnames[0].' ['.$current_year_watched_number_text.']',
$tabnames[1].' ['.$to_watch_items.']',
$tabnames[2].' ['.$media_links_number.']',
$tabnames[3].' ['.$watched_movies_number.']',
$tabnames[4].' ['.$archived_medias_number.']',
$tabnames[5].' ['.$watched_number_2018.']',
$tabnames[6].' ['.$watched_number_2019.']',
$icons[13],
);

#Tab Generator.php includer
require $website_tabs_generator;

?>