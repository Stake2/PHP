<?php

#CSS color and text style variables
$color2 = 'blue2';
$color3 = 'white';
$color4 = 'blue2';
$color5 = 'blue2';
$colortext = 'w3-text-white';
$colorsubtext = 'w3-text-black';
$colorsubtext2 = 'w3-text-black';
$sitehr = 'greyhr';
$sitehr2 = 'greyhr';
$sitehr3 = 'greyhr';
$spanstyle = '';
$formbtnstyle = '';

#Variables that mixes CSS tags
$textstyle = $colortext.' blue2';
$textstyle2 = 'w3-text-white black';
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
$m = 'h5';

#Folder variables
$siteurlgeral = $url.$sitefolder.'/';
$sitephpfolder2 = $phptabs.ucwords($choosenwebsite).'/';
$storyfolder = $sistoryfolder;

#Defines the folder for the chapter text files that are going to be read
if ($lang == $langs[0]) {
	$lang = $langs[1];
	$rootstoryfolder2 = $rootstoryfolder.$storyfolder.'/'.strtoupper($lang).'/';
	$titlesfile = $rootstoryfolder.$storyfolder.'/CapTitles '.strtoupper($lang).'.txt';

	$lang = $langs[0];
}

else {
	$rootstoryfolder2 = $rootstoryfolder.$storyfolder.'/'.strtoupper($lang).'/';
	$titlesfile = $rootstoryfolder.$storyfolder.'/CapTitles '.strtoupper($lang).'.txt';
}

#Site image vars
$siteimage = 'Eu e o computador (Stake2)';

#Defines the site image if the site has book covers or not
$siteimage = $cdn.'/'.'img'.'/'.$siteimage.'.png';
$imagesize1 = 60;
$imagesize2 = 100;

$imglink = $siteimage;

$filetextarraynames = array(
'titles',
);

$i = 0;
foreach ($filetextarraynames as $filename) {
	$filenumberarraynames[$i] = $filename.'number';

	$i++;
}

$filenamesarray = array(
$titlesfile,
);

#TextFileReader.php file includer
include $textfilereaderphp;

$chapters = $titlesnumber - 1;

$sitenames = array(
'Yours truly, Izaque.',
'Sinceramente, Izaque.',
);

$sitedescs = array(
'',
'',
);

#Site name, title, URL and description setter, by language
if ($lang == $langs[0]) {
	$lang = $langs[1];
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $choosenwebsite;
	$lang = $langs[0];

	$sitetitulo = $sitenames[0].' '.ucwords($langs[0]);
	$sitetitulo2 = $sitenames[0];
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
	$sitetitulo2 = $sitenames[0];
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $sitedescs[0];
}

if ($lang == $langs[2]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $choosenwebsite;

	$sitetitulo = $sitenames[1];
	$sitetitulo2 = $sitenames[1];
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[1];
	$sitedesc2 = $sitedescs[1];
}

#Buttons and tabs definer
#Tab titles definer
$tabtitles = array(
$tabnames[0],
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