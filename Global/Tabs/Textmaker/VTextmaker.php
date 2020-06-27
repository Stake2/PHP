<?php 

#CSS style variables
$color2 = 'yellow';
$color4 = 'white';
$colortext = 'w3-text-white';
$sitehr = 'whitehr';
$sitehr2 = 'whitehr';
$textstyle = 'w3-black w3-text-white';

#Variables that mixes CSS tags
$btnstyle = $color2.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;
$sitewhilestyle = $color2;

#HTML and HTML Style variables
$h2 = '<'.$n.' class="'.$computervar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;">';
$h4 = '<'.$m.' class="'.$mobilevar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;">';
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;">';
$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'"';
$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;"';
$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;"';
$border = 'border-width:4px;border-color:'.$color4.';border-style:solid;';
$border2 = 'border-width:7px;border-color:'.$color4.';border-style:solid;';
$sitedesc2 = 'tet';

#Folder variables
$siteurlgeral = $url.$sitefolder."/";
$sitephpfolder2 = $sitephpfoldergeraltabs.ucwords($choosenwebsite).'/';
$yeartxtfolder = $maintextfolder2.'Anos/';

#Site image vars
$siteimage = 'TM';
$siteimage = $cdn."/img/".$siteimage.".png";
$imglink = $siteimage;
$imagesize1 = 27;
$imagesize2 = 61;

#Site descriptions
$sitedescs = array(
'Website to make text files using texts and numbers.', 
'Site para fazer arquivos de texto usando textos e números.',
);

#Year Numbers.txt file and YearMaker.php file definers
$yearnumbsfile = $yeartxtfolder.'2019/'.'2019 Numbers'.'.txt';
$yearmakerfilephp = $sitephpfoldergeraltabs.ucwords($site).'/YearMaker.php';
$yearmakerfilephp2 = $sitephpfoldergeraltabs.ucwords($site).'/YearMaker2.php';
$storynumbsfile = $rootstoryfolder.'Story Numbers'.'.txt';

#Story text file definer
if ($lang == $langs[0] or $lang == $langs[1]) {
	$storytxtsfile = $rootstoryfolder.'My Stories'.'.txt';
}

if ($lang == $langs[2]) {
	$storytxtsfile = $rootstoryfolder.'Minhas Histórias'.'.txt';
}

#StoryMaker.php definer
$storymakerfilephp = $sitephpfoldergeraltabs.ucwords($site).'/StoryMaker.php';

#YearsVars.php file includer
include $yearsvarsfilephp;

#Site name, title, URL and description setter, by language
if ($lang == $langs[0]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $site;
	
	$sitetitulo = $sitename2;
	$sitetitulo2 = $sitename2;
	$siteurl = $siteurlgeral;
	$sitedesc = $sitedescs[0];
}

if ($lang == $langs[1]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $site;
	
	$sitetitulo = $sitename2;
	$sitetitulo2 = $sitename2;
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[0];
}

if ($lang == $langs[2]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $site;

	$sitetitulo = $sitename2;
	$sitetitulo2 = $sitename2;
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[1];
}

#Loading the CityContents of the City2
ob_start();
if (file_exists($sitephpfolder2.'CityContent2.php')) {
	$file = $sitephpfolder2.'CityContent2.php';
	include $file;
}

$citycontents2 = ob_get_clean();

#Button names
$citiestxts = array(
$tabnames[0].': '.$icons[14], 
$tabnames[1].': '.$icons[14],
$tabnames[2].': '.$icons[14],
);

#TabGenerator.php includer
include $tabgeneratorphp;

?>