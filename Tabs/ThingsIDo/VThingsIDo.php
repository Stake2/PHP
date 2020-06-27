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
$btnstyle = $color4.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;
$sitewhilestyle = $color4;
$subtextspan = $whitespan;
$formcolor = $colortext2;

#HTML and HTML Style variables
$h2 = '<'.$n.' class="'.$computervar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'">';
$h4 = '<'.$m.' class="'.$mobilevar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'">';
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'">';
$widthsize = '';
$size = '';
$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'"';
$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'"';
$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'"';
$border = 'border-width:4px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'';
$border2 = 'border-width:7px;border-color:'.$color3.';border-style:solid;'.$roundedborderstyle2.'';

#Site URL subdirectory for the online link
$siteurlcodes = array(
'Things_I_Do',
'Coisas_que_eu_faço',
);

#Story Variables php file includer
include $storyvarsphp;

#Watch History website texts file includer
include $watchtextsphp;

#Folder variables
$siteurlgeral = $url.$siteurlcodes[0].'/';
$siteurlgeral2 = $url.$siteurlcodes[1].'/';
$sitephpfolder2 = $phptabs.ucwords($sitethingsido).'/';
$imageswebfolder = 'C:/Mega/Diario/cdn/img/drawings/';
$drawingswebfolder = $url.'cdn'.'/'.'img'.'/'.'drawings'.'/';

$mediareader2018 = $phptabs.ucwords($site2018).'/'.$site2018.' MediaReader'.'.php';
$mediareader2019 = $phptabs.ucwords($site2019).'/'.$site2019.' MediaReader'.'.php';

if ($lang == $langs[0] or $lang == $langs[1]) {
	$watchedtypefile2018 = $maintextfolder2.'Anos/'.$site2018.'/Watched VideoTypes '.$langs[1].'.txt';
}

if ($lang == $langs[2]) {
	$watchedtypefile2018 = $maintextfolder2.'Anos/'.$site2018.'/Watched VideoTypes '.$langs[2].'.txt';
}

$watchedtypefile2019 = $maintextfolder2.'Anos/'.$site2019.'/Watched VideoTypes.txt';
$yearmakerfilephp2test = $phptabs.ucwords($sitetextmaker).'/YearMaker2.php';
$yearmakerfilephp2test = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $yearmakerfilephp2test);

if (file_exists($watchedtypefile2018) == true) {
	$fp = fopen ($watchedtypefile2018, 'r', 'UTF-8'); 
	if ($fp) {
		$watchedfile2018 = explode("\n", fread($fp, filesize($watchedtypefile2018)));
	}
}

if (file_exists($watchedtypefile2019) == true) {
	$fp = fopen ($watchedtypefile2019, 'r', 'UTF-8'); 
	if ($fp) {
		$watchedfile2019 = explode("\n", fread($fp, filesize($watchedtypefile2019)));
	}
}

include $sitesbuttonsattributes;

$prodbtnsnumb = 5;
$unprodbtnsnumb = 4;
$mediabtnsnumb = 1;
$socialmedianumb = 16;
$imgnumb = 19;

#Site name in English and Brazilian Portuguese language
$sitenames = array(
'Things I Do',
'Coisas que eu faço',
);

#Site has comments settings
$sitecomments = false;

#Site image vars
if ($lang == $langs[0] or $lang == $langs[1]) {
	$siteimage = 'TID';
}

if ($lang == $langs[2]) {
	$siteimage = 'CQEF';
}

#Site image variables
$siteimage = $siteimage;
$siteimage = $cdn."/img/".$siteimage.".png";
$imglink = $siteimage;
$imagesize1 = 30;
$imagesize2 = 66;

#Site descriptions
$sitedescs = array(
'Site to show the things I do, made by stake2.',
'Site para mostrar as coisas que eu faço, feito por stake2.',
);

$descs = array(
'Site to show the things I do, made by '.$orangespan.'stake2'.$spanc.'.',
'Site para mostrar as coisas que eu faço, feito por '.$orangespan.'stake2'.$spanc.'.',
);

#ThindsIDo Texts.php file includer
include $sitephpfolder2.'ThingsIDo Texts.php';

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
include $tabgeneratorphp;

#Site name, title, url and description setter
if ($lang == $langs[0]) {
	$lang = $langs[1];
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $sitenames[0].' '.$lang2;
	$lang = $langs[0];
	
	$sitetitulo = $sitenames[0].' '.ucwords($lang);
	$sitetitulo2 = $sitenames[0].': '.$icons[4].' '.$icons[22];
	$siteurl = $siteurlgeral;
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];
	$lang = $langs[0];
}

if ($lang == $langs[1]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $sitenames[0];

	$sitetitulo = $sitenames[0];
	$sitetitulo2 = $sitenames[0].': '.$icons[4].' '.$icons[22];
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];
}

if ($lang == $langs[2]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $sitenames[1];

	$sitetitulo = $sitenames[1];
	$sitetitulo2 = $sitenames[1].': '.$icons[4].' '.$icons[22];
	$siteurl = $siteurlgeral2;
	$sitedesc = $sitedescs[1];
	$sitedesc2 = $descs[1];
}

?>