<?php 

# Folder variables
$selected_website_url = $website_watch_history_link;
$selected_website_folder = $php_folder_tabs.ucwords($website).'/';

# Comment links
$watched_movie_comment_links = array(
$cdn_text_movie_comments.'Hoje, Sexta (Vingadores Guerra Infinita).txt', 
$cdn_text_movie_comments.'Hoje, Segunda (Power Rangers 2017).txt', 
$cdn_text_movie_comments.'Hoje, Sabado (Detona Ralph 2 Ralph Quebra a Internet).txt', 
$cdn_text_movie_comments.'Hoje, Domingo (Equestria Girls Spring Breakdown).txt', 
$cdn_text_movie_comments.'Hoje, Sabado 2 (Os Vingadores Ultimato).txt',
$cdn_text_movie_comments.'Homem-Aranha no Aranhaverso (2019, Sony Pictures Animation, Marvel Entertainment).txt',
);

# Comments buttons
$watched_movie_comments = array(
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[0]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[1]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[2]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[3]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[4]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>',
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$watched_movie_comment_links[5]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>',
);

# Website image link and image size
$website_image = 'WH';
$website_image = $cdnimg.$website_image.".png";
$website_image_link = $website_image;
$website_image_size_computer = 27;
$website_image_size_mobile = 50;

$span_second_text_color = '<span class="'.$second_text_color.' '.$third_text_color.'">';

#Website descriptions
$website_descriptions_array = array(
'Website to show Animes, Cartoons, Series, Movies, and Videos that I watched and medias that I will watch, made by stake2.', 
'Website para mostrar Animes, Desenhos, Séries, Filmes, e Vídeos que assisti e mídias que eu vou assistir, feito por stake2.',
);

$text = 'Website to show {}, {}, {}, {},<br />and {} that I watched and {} that I will watch, made by stake2.';

$array = array(
"Animes",
"Cartoons",
"Series",
"Movies",
"Videos",
"Medias",
);

$replacer_array_one = array();

foreach ($array as $item) {
	array_push($replacer_array_one, str_replace($item, $span_second_text_color.$item.$spanc, $item));
}

$replacer_one = format($text, $replacer_array_one);

$text = 'Website para mostrar {}, {}, {}, {},<br />e {} que assisti e {} que eu vou assistir, feito por stake2.';

$array = array(
"Animes",
"Desenhos",
"Séries",
"Filmes",
"Vídeos",
"Mídias",
);

$replacer_array_two = array();

foreach ($array as $item) {
	array_push($replacer_array_two, str_replace($item, $span_second_text_color.$item.$spanc, $item));
}

$replacer_two = format($text, $replacer_array_two);

$website_html_descriptions_array = array(
$replacer_one,
$replacer_two,
);

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
'https://www.superanimes.website/anime/sword-art-online-alicization/',
'https://www.superanimes.website/anime/bang-dream-2/',
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
require $watch_texts_php;

#General language website_name, title, main_website_url and description
if ($website_language == $geral_language) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $website;

	$website_title = ucwords($website_title);
	$website_title_header = ucwords($website_title).': '.$icons[5].' '.'<span class="'.$second_text_color.'">'.'['.$every_year_watched_number." ".$mediastxt.']'.$spanc;
	$website_link = $selected_website_url;
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

#English language website_name, title, main_website_url and description
if ($website_language == $enus_language) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $website;
	
	$website_title = ucwords($website_title).' '.$hyphen_separated_website_language;
	$website_title_header = ucwords($website_title).': '.$icons[5].' '.'<span class="'.$second_text_color.'">'.'['.$every_year_watched_number." ".$mediastxt.']'.$spanc;
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[0];
}

#Brazilian Portuguese language website_name, title, main_website_url and description
if (in_array($website_language, $pt_languages_array)) {
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_name = $website;

	$website_title = ucwords($website_title).' '.$hyphen_separated_website_language;
	$website_title_header = ucwords($website_title).': '.$icons[5].' '.'<span class="'.$second_text_color.'">'.'['.$every_year_watched_number." ".$mediastxt.']'.$spanc;
	$website_link = $selected_website_url.strtolower($hyphen_separated_website_language).'/';
	$website_meta_description = $website_descriptions_array[0];
	$website_header_description = $website_html_descriptions_array[1];
}

#Tabtexts definers for English and General language
if (in_array($website_language, $en_languages_array)) {
	$tabnames[0] = substr_replace($tabnames[0], ' ', 7, 0);
	$tabnames[7] = substr_replace($tabnames[5], '-', 5, 0);
	$tabnames[7] = strtr($tabnames[7], "l", strtoupper("l"));;
}

#Tabtexts definers for Brazilian Portuguese language
if (in_array($website_language, $pt_languages_array)) {
	$tabnames[0] = substr_replace($tabnames[0], ' ', 10, 0);
}

$tab_titles_without_html = array();

$current_variable_year = 2018;
$archived_medias_number = 0;

while ($current_variable_year <= $current_year - 1) {
	array_push($tab_titles_without_html, $archived_media_text.' '.$current_variable_year.': ['.${"watched_number_".$current_variable_year}.']');

    $current_variable_year++;
	$archived_medias_number++;
}

#Tabtexts array
$citiestxts = array(
$tabnames[0].' ['.$current_year_watched_number_text.']'.': '.$icons[5],
$tabnames[1].' ['.$to_watch_items.']'.': '.$icons[6],
$tabnames[2].' ['.$media_links_number.']'.': '.$icons[7],
$tabnames[3].' ['.$watched_movies_number.']'.': '.$icons[19],
$tabnames[4].' ['.$archived_medias_number.']'.': '.$icons[8],
$icons[13],
);

$archived_media_texts = array();

$current_variable_year = 2018;

while ($current_variable_year <= $current_year - 1) {
	array_push($archived_media_texts, $archived_media_text.' '.$current_variable_year.': ['.${"watched_number_".$current_variable_year}.']'.': '.$icons[8]);

    $current_variable_year++;
}

#Tabtexts array
$tab_titles_without_html = array(
$tabnames[0].' ['.$current_year_watched_number_text.']',
$tabnames[1].' ['.$to_watch_items.']',
$tabnames[2].' ['.$media_links_number.']',
$tabnames[3].' ['.$watched_movies_number.']',
$tabnames[4].' ['.$archived_medias_number.']',
$icons[13],
);

# Website Style.php File Includer
require $website_style_file;

#Tab Generator.php includer
require $website_tabs_generator;

?>