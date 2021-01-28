<?php 

#English texts
if (in_array($website_language, $en_languages_array)) {
	#English texts
	$watchedtxt = "Watched Things In";
	$towatchtxt = "Things to Watch";
	$movietxt = 'Watched Movies';
	$moviestxt = 'Movie';
	$archtxt = 'Archived Media';
	$linktxt = 'Links To Download';
	$notimetxt = '(Unknown Watched Time)';
	$mediastxt = "Watched Media";
	$rewatched_text = "Rewatched";

	#Media names
	$media_names_array = array(
	'Anime',
	'Cartoon',
	'Series',
	'Movie',
	'Video',
	);

	#Media type on the Links tab
	$mediatype = array(
	'Series',
	'Cartoon',
	'Channel',
	'Anime',
	);

	#Media names on the Links tab
	$linksmedianames = array(
	'The Walking Dead', 
	'My Little Pony', 
	'Ben 10', 
	'Alanzoka', 
	'Sword Art Online: Alicization - War Of Underworld', 
	'Bang Dream!',
	);

	#Texts for the medias on the Links tab
	$linktxts = array(
	'1 - '.$linksmedianames[0].' ('.$mediatype[0].')', 
	'2 - '.$linksmedianames[1].' ('.$mediatype[1].')', 
	'3 - '.$linksmedianames[2].' ('.$mediatype[1].')', 
	'4 - '.$linksmedianames[3].' ('.$mediatype[2].')', 
	'5 - '.$linksmedianames[4].' ('.$mediatype[3].')', 
	'6 - '.$linksmedianames[5].' ('.$mediatype[3].')',
	);

	$archived_media_text = "Medias";
	$archived_text = "Archived";
}

#Brazilian Portuguese texts
if (in_array($website_language, $pt_languages_array)) {
	#Brazilian Portuguese texts
	$watchedtxt = "Coisas assistidas Em";
	$towatchtxt = "Coisas para Assistir";
	$movietxt = 'Filmes Assistidos';
	$moviestxt = 'Filme';
	$archtxt = 'Mídias Arquivadas';
	$linktxt = 'Links Para Baixar';
	$notimetxt = '(Horário Assistido Desconhecido)';
	$mediastxt = "Midias Assistidas";
	$rewatched_text = "Reassistido";

	#Media names
	$media_names_array = array(
	'Anime',
	'Desenho',
	'Série',
	'Filme',
	'Vídeo',
	);

	#Media type on the Links tab
	$mediatype = array(
	'Série',
	'Desenho',
	'Canal',
	'Anime',
	);

	#Media names on the Links tab
	$linksmedianames = array(
	'The Walking Dead', 
	'My Little Pony', 
	'Ben 10', 
	'Alanzoka', 
	'Sword Art Online: Alicization - War Of Underworld', 
	'Bang Dream!',
	);

	#Texts for the medias on the Links tab
	$linktxts = array(
	'1 - '.$linksmedianames[0].' ('.$mediatype[0].')', 
	'2 - '.$linksmedianames[1].' ('.$mediatype[1].')', 
	'3 - '.$linksmedianames[2].' ('.$mediatype[1].')', 
	'4 - '.$linksmedianames[3].' ('.$mediatype[2].')', 
	'5 - '.$linksmedianames[4].' ('.$mediatype[3].')', 
	'6 - '.$linksmedianames[5].' ('.$mediatype[3].')',
	);

	$archived_media_text = "Mídias";
	$archived_text = "Arquivado";
}

$rewatched_text_enus = "Rewatched";
$rewatched_text_ptbr = "Reassistido";

?>