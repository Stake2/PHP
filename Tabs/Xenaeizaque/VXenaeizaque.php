<?php

#CSS color and text style variables
$color2 = 'pink';
$color3 = '#ff0080';
$color4 = 'pink';
$color5 = 'darkpink';
$colortext = 'textpink';
$colorsubtext = 'w3-text-white';
$colorsubtext2 = 'w3-text-white';
$sitehr = 'pinkhr';
$sitehr2 = 'pinkhr';
$sitehr3 = 'pinkhr';
$spanstyle = '';
$formbtnstyle = '';

#Variables that mixes CSS tags
$textstyle = $colortext.' darkpink';
$textstyle2 = 'w3-text-black white';
$btnstyle = $color4.' '.$cssbtn1;
$btnstyle2 = $color3.' '.$cssbtn1;
$btnstyle3 = $color5.' '.$cssbtn1;
$subtextspan = '<span class="'.$colorsubtext2.'">';
$subtextspan2 = '<span class="'.$colorsubtext.'">';
$spannewtextcolor = $subtextspan;
$sitewhilestyle = $color4;
$formcolor = $color4;

#HTML and HTML Style variables
$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'"';
$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'"';
$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'"';
$border = 'border-width:4px;border-color:'.$color3.';border-style:solid;';
$border2 = 'border-width:7px;border-color:'.$color3.';border-style:solid;';
$h2 = '<'.$n.' class="'.$computervar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'">';'.$roundedborderstyle2.';
$h4 = '<'.$m.' class="'.$mobilevar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;">';
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'">';
$widthsize = '';
$size = '';

#Folder variables
$siteurlgeral = $url.$sitefolder.'/';
$sitephpfolder2 = $php_tabs_variable.ucwords($choosenwebsite).'/';
#$storyfolder = $pqntstoryfolder;

#Site image vars
$siteimage = 'Eu e ela juntos';

#Defines the site image if the site has book covers or not
$siteimage = $cdn.'/'.'img'.'/'.$siteimage.'.jpg';
$imagesize1 = 65;
$imagesize2 = 100;

$imglink = $siteimage;

if ($lang == $langs[0] or $lang == $langs[1]) {
	$tabdescfilename = 'TabDescription1ENUS';
}

if ($lang == $langs[2]) {
	$tabdescfilename = 'TabDescription1';
}

$filenamesarray = array(
$sitephpfolder2.'Descriptions'.'.txt',
$sitephpfolder2.$tabdescfilename.'.txt',
);

$filetextarraynames = array(
'descriptions',
'tabdescriptions',
);

$i = 0;
foreach ($filetextarraynames as $filename) {
	$filenumberarraynames[$i] = $filename.'number';

	$i++;
}

#TextFileReader.php file includer
include $textfilereaderphp;

$sitenames = array(
'Xena and Izaque, 2 months of dating :3',
'Xena e Izaque, 2 meses de namoro :3',
);

$sitedescs = array(
$descriptions[0],
$descriptions[1],
);

#Site name, title, URL and description setter, by language
if ($lang == $langs[0]) {
	$lang = $langs[1];
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $choosenwebsite;
	$lang = $langs[0];

	$sitetitulo = $sitenames[0].' '.ucwords($langs[0]);
	$sitetitulo2 = $sitenames[0].' '.'❤️ 😊';
	$siteurl = $siteurlgeral;
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $sitedescs[0];
	$lang = $langs[0];
}

if ($lang == $langs[1]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $choosenwebsite;

	$sitetitulo = $sitenames[0];
	$sitetitulo2 = $sitenames[0].' '.'❤️ 😊';
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $sitedescs[0];
}

if ($lang == $langs[2]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $choosenwebsite;

	$sitetitulo = $sitenames[1];
	$sitetitulo2 = $sitenames[1].' '.'❤️ 😊';
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[1];
	$sitedesc2 = $sitedescs[1];
}

$tabimages = array(
$cdnimg.'Xena ;3.png',
$cdnimg.'Eu e ela juntos.jpg',
$cdnimg.'Foto dela.png',
$cdnimg.'Moh com eu.png',
);

$videoembedids = array(
'mXPn5Zo51Fs',
);

$i = 0;
$array = $videoembedids;
while ($i <= count($array) - 1) {
	$videoembeds[$i] = '<iframe '.$iframestyle.' src="https://www.youtube-nocookie.com/embed/'.$array[$i].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="'.$roundedborderstyle4.'"></iframe>';

	$videoembedsm[$i] = '<iframe '.$iframestylem.' src="https://www.youtube-nocookie.com/embed/'.$array[$i].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="'.$roundedborderstyle4.'"></iframe>';

	$i++;
}

#Buttons and tabs definer
#Tab titles definer
$tabtitles = array(
$sitetitulo.' ❤️ 😊',
);

#Button names definer
$i = 0;
foreach ($tabnames as $tabname) {
	$citiestxts[$i] = $tabname;

	$i++;
}

#TabGenerator.php includer
include $tabgeneratorphp;

?>