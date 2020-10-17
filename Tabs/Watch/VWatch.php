<?php 

#CSS style variables
$color2 = $background_yellow_css_class;
$color4 = $background_blue_css_class;
$colortext = "w3-text-blue";
$sitehr = $border_1px_solid_blue;
$sitehr2 = $border_1px_solid_yellow;
$textstyle = $background_white_css_class." w3-text-white";

#Variables that mixes CSS tags
$btnstyle = $color4.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;

#HTML and HTML Style variables
$h2 = '<'.$n.' class="'.$computervar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'">';
$h4 = '<'.$m.' class="'.$mobilevar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'">';
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'">';
$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'"';
$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'"';
$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'"';
$sitewhilestyle = $color4;
$border = 'border-width:4px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'';
$border2 = 'border-width:7px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'';

$website_border_color = "slhr";
#$website_border_color = $border_3px_solid_blue_css_class;

$moviesnumb = 0;

#Folder variables
$siteurlgeral = $url.$sitefolder.'/';
$sitephpfolder2 = $php_tabs_variable.ucwords($site).'/';

#Comment links
$cmntlinks = array(
$cdn_txt_moviecomments.'Hoje, Sexta (Vingadores Guerra Infinita).txt', 
$cdn_txt_moviecomments.'Hoje, Segunda (Power Rangers 2017).txt', 
$cdn_txt_moviecomments.'Hoje, Sabado (Detona Ralph 2 Ralph Quebra a Internet).txt', 
$cdn_txt_moviecomments.'Hoje, Domingo (Equestria Girls Spring Breakdown).txt', 
$cdn_txt_moviecomments.'Hoje, Sabado 2 (Os Vingadores Ultimato).txt',
$cdn_txt_moviecomments.'Homem-Aranha Longe de Casa 2019.txt',
);

#Comments buttons
$cmnts = array(
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$cmntlinks[0]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$cmntlinks[1]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$cmntlinks[2]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$cmntlinks[3]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>', 
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$cmntlinks[4]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>',
'<a class="'.$text_hover_white_css_class.'" onclick="window.open('."'".$cmntlinks[5]."'".');" style="cursor:pointer;"><i class="fas fa-comments"></i></a>',
);

#Site image link and image size
$siteimage = 'WH';
$siteimage = $cdnimg.$siteimage.".png";
$imglink = $siteimage;
$imagesize1 = 27;
$imagesize2 = 61;

#Site descriptions
$sitedescs = array(
'Website to show videos, animes, series, movies that I watched and that I will watch, made by stake2.', 
'Site para mostrar videos, animes, séries, filmes que assisti e videos que eu vou assistir, feito por stake2.');

$descs = array(
'Website to show videos, animes, series, movies that I watched and that I will watch, made by stake2.', 
'Site para mostrar videos, animes, séries, filmes que assisti e videos que eu vou assistir, feito por stake2.');

#Media links for the Links tab
$linkmedias = array(
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

#Image links for the Links tab
$linkimgs = array(
$cdnimg.'twd.jpg', 
$cdnimg.'mlp.png', 
$cdnimg.'ben10.jpg', 
$cdnimg.'alan.jpg', 
$cdnimg.'saoa.jpg', 
$cdnimg.'bg.jpg',
);

#TextFileReader.php file includer
include $text_file_reader_file_php;

$mobileversion = '';

#YearNumbers.txt reader for showing the Archived Medias from 2018 and 2019 in Watch History tab: "Archived Media > 2018" and "2019"
include $yearsvarsfilephp;

#Watch History website texts file includer
include $watchtextsphp;

#General language sitename, title, url and description
if ($lang == $langs[0]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $site;
	
	$sitetitulo = ucwords($site).' History';
	$sitetitulo2 = ucwords($site).' History'.': '.$icons[5].' '.$yellowspan.'['.$everywatchednumb." ".$mediastxt.']'.$spanc;
	$siteurl = $siteurlgeral;
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];
}

#English language sitename, title, url and description
if ($lang == $langs[1]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $site;
	
	$sitetitulo = ucwords($site).' History '.$lang2;
	$sitetitulo2 = ucwords($site).' History '.$lang2.': '.$icons[5].' '.$yellowspan.'['.$everywatchednumb." ".$mediastxt.']'.$spanc;
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];
}

#Brazilian Portuguese language sitename, title, url and description
if ($lang == $langs[2]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $site;

	$sitetitulo = ucwords($site).' History '.$lang2;
	$sitetitulo2 = ucwords($site).' History '.$lang2.': '.$icons[5].' '.$yellowspan.'['.$everywatchednumb." ".$mediastxt.']'.$spanc;
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[1];
}

#Tabtexts definers for English and General language
if ($lang == $langs[0] or $lang == $langs[1]) {
	$tabnames[0] = substr_replace($tabnames[0], ' ', 7, 0);
	$tabnames[7] = substr_replace($tabnames[7], '-', 6, 0);
	$tabnames[7] = strtr($tabnames[7], "l", strtoupper("l"));;
}

#Tabtexts definers for Brazilian Portuguese language
if ($lang == $langs[2]) {
	$tabnames[0] = substr_replace($tabnames[0], ' ', 10, 0);
}

#Tabtexts array
$citiestxts = array(
$tabnames[0].' ['.$watchednumbtxt.']'.': '.$icons[5],
$tabnames[1].' ['.$twitems.']'.': '.$icons[6],
$tabnames[2].' ['.$linksnumb.']'.': '.$icons[7],
$tabnames[3].' ['.$moviesnumb.']'.': '.$icons[19],
$tabnames[4].' ['.$archnumb.']'.': '.$icons[8],
$tabnames[5].' ['.$watchednumb2018.']'.': '.$icons[8],
$tabnames[6].' ['.$watchednumb2019.']'.': '.$icons[8],
$icons[13],
);

#Tabtexts array
$citiestxtswithouthtml = array(
$tabnames[0].' ['.$watchednumbtxt.']',
$tabnames[1].' ['.$twitems.']',
$tabnames[2].' ['.$linksnumb.']',
$tabnames[3].' ['.$moviesnumb.']',
$tabnames[4].' ['.$archnumb.']',
$tabnames[5].' ['.$watchednumb2018.']',
$tabnames[6].' ['.$watchednumb2019.']',
$icons[13],
);

#TabGenerator.php includer
include $tabgeneratorphp;

?>