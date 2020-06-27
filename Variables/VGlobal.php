<?php

#VGlobal.php site folder, site, cdn and fontawesome link variables
@$sitefolder = strtolower($site);
$site = $sitefolder;
$cdn = $url.'cdn';
$cdnimg = $cdn.'/img/';
$cdntxt = $cdn.'/txt/';
$fontawesomelink = 'https://use.fontawesome.com/releases/v5.8.2/css/all.css';

#PHP Folders variables
$maintextfolder = 'C:/Mega/Bloco De Notas/';
$maintextfolder2 = $maintextfolder.'Dedicação/';
$rootstoryfolder = $maintextfolder2.'Historias/';
$diariofolder = $maintextfolder.'/Diario/Blocks/';
$diariofolder2 = $maintextfolder.'/Diario/';

#PHP Files
$globalfilesphp = array(
$siteheaderfile = $phpvars.'SiteHeader.php',
$stylefilephp = $phpvars.'SiteStyle.php',
$globalstylefilephp = $phpvars.'GlobalStyle.php',
$formfile = $phpvars.'FormFile.php',
$storieslinksphp = $phpvars.'StoriesLinks.php',
$topbuttonscreator = $phpvars.'Top Buttons Creator.php',
$topbuttonsloader = $phpvars.'Buttons PHP File Loader.php',
$notificationsphp = $phpvars.'Notifications.php',
$textfilereaderphp = $phpvars.'TextFileReader.php',
$tabgeneratorphp = $phpvars.'Tab Generator.php',
$storyvarsphp = $phpvars.'StoryVars.php',
$capbtngeneratorphp = $phpvars.'CapButton Generator.php',
$newdesignphp = $phpvars.'NewDesignScript.php',
$newdesignsitephp = $phpvars.'NewDesignSite.php',
$citybodiesgeneratorphp = $phpvars.'CityBodies Generator.php',
$sitesbuttonsattributes = $phptabs.'Sites Buttons Tab'.'/'.'SitesButtons Attributes.php',
$sitesbuttonstab = $phptabs.'Sites Buttons Tab'.'/'.'SitesButtons Tab.php',
$sitesbuttonscreator = $phptabs.'Sites Buttons Tab'.'/'.'Sites Button Creator.php',
);

#GlobalTabs array
$globaltabs = array(
$chaptergeneratorglobal = $phpglobaltabs.'Chapters Generator '.$global.'.php',
$readersglobal = $phpglobaltabs.'Readers'.$global.'.php',
$commentsglobal = $phpglobaltabs.'Comments'.$global.'.php',
$writeglobal = $phpglobaltabs.'Write'.$global.'.php',
$storiesglobal = $phpglobaltabs.'Stories'.$global.'.php',
);

$chapterwriterdisplayer = $phpvars.'Chapter Files/'.'Chapter Writer Displayer.php';
$chaptertextdisplayer = $phpvars.'Chapter Files/'.'Chapter Text Displayer.php';

#Global files array
$globalfiles = array(
$stylefilephp, 
$siteheaderfile, 
$globalstylefilephp,
);

#Watch PHP files
$mediaarraygenerator = $phptabs.'Watch/MediaArrayGenerator.php';
$mediastyler = $phptabs.'Watch/MediaStyler.php';
$watchedmediageneratorphp = $phptabs.'Watch/WatchedMedia2020 Generator.php';
$watchtextsphp = $phptabs.'Watch/WatchTexts.php';

#Years PHP Files
$yearsvarsfilephp = $phptabs.'Years/YearsVars.php';

#English texts for all websites
if ($lang == $langs[0] or $lang == $langs[1]) {
	$andtxt = 'and';
	$newtxt = 'New';
	$ortxt = 'or';
	$numbertxt = 'number';
	$langreadtext = 'Read';
	$imglinktxt = 'image link';
	$siteicon = '🇺🇸';
	$btnmenutxt = 'Mobile button menu: ';
	$editbtntxt1 = 'Edit text';
	$editbtntxt2 = 'Activate';
	$editbtntxt3 = 'Deactivate';
	$copybtntxt1 = 'Copy HTML';
	$copybtntxt2 = 'Copy text';
	$redondodesc = 'Round revolution ahead!';
	$covertxt = 'Cover';

	if ($newdesign == true) {
		$newdesigntxts = array(
		'Story menu',
		'Chapter menu',
		);
	}
}

#Brazilian Portuguese texts for all websites
if ($lang == $langs[2]) {
	$andtxt = 'e';
	$newtxt = 'Novo';
	$newtxt2 = 'Nova';
	$ortxt = 'ou';
	$numbertxt = 'número';
	$langreadtext = 'Ler';
	$imglinktxt = 'link da imagem';
	$siteicon = '🇧🇷';
	$btnmenutxt = 'Menu de botões mobile: ';
	$editbtntxt1 = 'Editar texto';
	$editbtntxt2 = 'Ativar';
	$editbtntxt3 = 'Desativar';
	$copybtntxt1 = 'Copiar HTML';
	$copybtntxt2 = 'Copiar texto';
	$redondodesc = 'Revolução redonda avante!';
	$covertxt = 'Capa';

	if ($newdesign == true) {
		$newdesigntxts = array(
		'Menu de histórias',
		'Menu de capítulos',
		);
	}
}

$langreadtext2 = strtolower($langreadtext);

#Watch History and YearWebsites year variables
if ($sitename == $sitewatch or in_array($sitename, $yeararray)) {
	$anoanterior = $ano - 1;
	$anos = array(
	'2018', 
	'2019', 
	'2020',
	);

	$mediareader2018 = $phptabs.'/'.ucwords($site2018).'/'.$site2018.' MediaReader'.'.php';
	$mediareader2019 = $phptabs.'/'.ucwords($site2019).'/'.$site2019.' MediaReader'.'.php';

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
}

#Css definers for specific websites
$sitecssfile = $setsitecssfile;

if ($newwritestyle == true) {
	$newwritestylescript = '<script src="'.$cdn.'/js/WriteChapter.js"></script>'."\n";
}

else {
	$newwritestylescript = '';
}

#SuperAnimes test CSS and script
if ($newdesign == true) {
	#SuperAnimes test loader
	include $newdesignphp;

	$newdesigncss = $newdesigncss;
	$newdesignscript = $newdesignscript;
}

else {
	$newdesigncss = '';
	$newdesignscript = '';
}

#Notifications CSS and script includer
if ($sitehasnotifications == true) {
	$notificationcss = '<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/Notification.css" />'."\n";
	$notificationscript = '<script src="'.$cdn.'/js/Notification.js"></script>'."\n".
	'<script src="'.$cdn.'/js/HideNotification.js"></script>';
}

if ($sitehasnotifications == false) {
	$notificationcss = '';
	$notificationscript = '';
}

if ($sitename == $sitetextmaker) {
	$editbtnscript = '<script src="'.$cdn.'/js/EditBtn.js"></script>';
}

else {
	$editbtnscript = '';
}

#Site CSS definer
$sitecss = '<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/'.$sitecssfile.'.css" />
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/w3.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/Colors.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/Stories.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/Mobile.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/ImgHover.css" />'."\n".
$notificationcss.
$newdesigncss;

#Site JavaScript definer
$sitejs = '<script src="'.$cdn.'/js/myFunction.js"></script>
<script src="'.$cdn.'/js/Tabs.js"></script>
<script src="'.$cdn.'/js/Redirect.js" onLoad="Rodar();"></script>
<script src="'.$cdn.'/js/ShowHide.js"></script>
<script src="'.$cdn.'/js/SideMenu.js"></script>'."\n".
$editbtnscript.
$newdesignscript.
$newwritestylescript.
'<script src="https://code.jquery.com/jquery-3.5.1.js"></script>'."\n";

#Date style definer
date_default_timezone_set("America/Sao_Paulo");
$data = date("d/m/Y");

#SiteStyle.php includer
include $globalfiles[0];

#Global CSS variables
require $globalfiles[2];

#Stories variables includer if the site is a story site
require $storyvarsphp;

#SitesButtons Attributes.php includer
require $sitesbuttonsattributes;

#VYears.php file loader for YearsSites
if (in_array($sitename, $yeararray)) {
	require $phptabs.'/'.$folder3.'/'.'V'.$folder3.'.php';
}

#Websites array
$i = 0;
foreach ($sitenamesarray as $value) {
	if ($sitename == $value) {
		require $sitefilevars[$i];
	}

	$i++;
}

#Site notifications includer if site has notifications activated
if ($sitehasnotifications == true) {
	require $notificationsphp;
}

require $sitesbuttonscreator;

if ($sitetype1 == $types[1]) {
	$br = '<br />';
	$border2 = 'border-width:3px;border-color:'.$bordercolor.';border-style:solid;';
}

else {
	$br = '<br /><br />';
	$border2 = 'border-width:3px;border-color:'.$bordercolor.';border-style:solid;';
}

if ($sitename == $sitepequenata) {
	$mainimage = '<img src="'.$imglink.'" width="'.$imagesize1.'%" class="'.$colortext.' '.$computervar.'" style="'.$border2.''.$roundedborderstyle4.'" />';
	$mainimagem = '<img src="'.$imglink.'" width="'.$imagesize2.'%" class="'.$colortext.' '.$mobilevar.'" style="'.$border2.''.$roundedborderstyle4.'" />';
}

else {
	$mainimage = '<img src="'.$imglink.'" width="'.$imagesize1.'%" class="'.$colortext.' '.$computervar.'" style="'.$border2.''.$roundedborderstyle2.'" />';
	$mainimagem = '<img src="'.$imglink.'" width="'.$imagesize2.'%" class="'.$colortext.' '.$mobilevar.'" style="'.$border2.''.$roundedborderstyle2.'" />';
}

$imgbtn = '<div class="'.$computervar.'">'.'<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="window.open('."'".$imglink."'".')">'.'<'.$m.'>'.ucfirst($imglinktxt).': '.$icons[2].'</'.$m.'>'.'</button>'.$divc;
$imgbtnm = '<div class="'.$mobilevar.'">'.'<button class="w3-btn '.$btnstyle.'" '.$roundedborderstyle.' onclick="window.open('."'".$imglink."'".')">'.'<'.$m.'>'.ucfirst($imglinktxt).': '.$icons[2].'</'.$m.'>'.'</button>'.$divc;

$imagens = $mainimage."\n".$imgbtn.
"\n".
$mainimagem."\n".$imgbtnm.
"\n";

$sitehead = '
<title>'.$sitetitulo.'</title>
<meta charset="UTF-8" />
<meta property="og:title" content="'.$sitetitulo.'" />
<meta property="og:site_name" content="'.$sitetitulo.'" />
<link rel="canonical" href="'.$siteurl.'" />
<meta property="og:url" content="'.$siteurl.'" />
<link rel="icon" href="'.$siteimage.'" />
<link rel="image_src" href="'.$siteimage.'" />
<meta property="og:image" content="'.$siteimage.'" />
<meta name="description" content="'.$sitedesc.'" />
<meta property="og:description" content="'.$sitedesc.'" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />
'.$sitecss.
'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
<link rel="stylesheet" href="'.$fontawesomelink.'" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';

if ($sitename == $sitetextmaker) {
	$sitedesc = $sitedesc;
}

if (in_array($sitename, $yeararray)) {
	$sitedesc = $sitedesc2;
}

if ($sitename != $sitetextmaker) {
	$sitedesc = $sitedesc;
}

require $globalfiles[1];

?>