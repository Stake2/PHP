<?php 

#CSS style variables
$color = 'white';
$color2 = 'white';
$color3 = 'white';
$color4 = 'w3-white';
$colortext = 'w3-text-white';
$colortext2 = 'w3-text-black';
$sitehr = 'whitehr';
$sitehr2 = 'whitehr';
$sitehr3 = 'whitehr';
$spanstyle = 'grey w3-text-black';
$formbtnstyle = 'black w3-text-white';

#Variables that mixes CSS tags
$textstyle = $colortext.' black';
$textstyle2 = 'w3-text-black white';
$btnstyle = $color4.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;
$sitewhilestyle = $color4;
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

#Folder variables
$siteurlgeral = $url.$sitefolder.'/';
$sitephpfolder2 = $sitefolder_izaquemultiverse;

$siteimagename = 'stk2';
$siteimage = $cdnimg.$siteimagename.'.png';
$imglink = $siteimage;
$imagesize1 = 30;
$imagesize2 = 66;

if (empty($siteimagename)) {
	$siteimage = $cdnimg.'template.png';
	$imglink = $siteimage;
}

$sitenames = array(
'Test title',
'Título Teste',
);

$filenamesarray = array(
$sitephpfolder2.'Descriptions'.'.txt',
);

$filetextarraynames = array(
'descriptions',
);

$i = 0;
foreach ($filetextarraynames as $filename) {
	$filenumberarraynames[$i] = $filename.'number';

	$i++;
}

#TextFileReader.php file includer
include $textfilereaderphp;

if ($lang == $langs[0] or $lang == $langs[1]) {
	$placeholderdesc = 'Placeholder for the Description';
}

if ($lang == $langs[2]) {
	$placeholderdesc = 'Espaço reservado para a Descrição.';
}

if (isset($descriptions)) {
	$sitedescs = array(
	$descriptions[0],
	$descriptions[1],
	);
}

else {
	$sitedescs = array(
	$placeholderdesc,
	$placeholderdesc,
	);
}

if ($lang == $langs[0] or $lang == $langs[1]) {
	$placeholdertitle = 'Placeholder for the Tab Title: [Icon]';
}

if ($lang == $langs[2]) {
	$placeholdertitle = 'Espaço reservado para o Título da Aba: [Ícone]';
}

#Tab titles definer
$tabtitles = array(
$tabnames[0],
);

#Tab titles definer
if (!isset($tabtitles) or empty($tabtitles) or $tabtitles[0] == '') {
	$tabtitles = array(
	$placeholdertitle,
	);
}

#Button names definer
$i = 0;
foreach ($tabnames as $tabname) {
	$citiestxts[$i] = $tabname;

	$i++;
}

#TabGenerator.php includer
include $tabgeneratorphp;

#Site name, title, url and description setter
if ($lang == $langs[0]) {
	$lang = $langs[1];
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);

	$sitename = $sitenames[0].' '.$lang2;
	$sitetitulo = $sitenames[0];
	$sitetitulo2 = $sitenames[0].': '.$icons[11];
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $sitedescs[0];

	$siteurl = $siteurlgeral;
	$lang = $langs[0];
}

if ($lang == $langs[1]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);

	$sitename = $sitenames[0];
	$sitetitulo = $sitenames[0].' '.$lang2;
	$sitetitulo2 = $sitenames[0].': '.$icons[11];
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $sitedescs[0];

	$siteurl = $siteurlgeral.strtolower($lang2).'/';
}

if ($lang == $langs[2]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);

	$sitename = $sitenames[1].' '.$lang2;
	$sitetitulo = $sitenames[1].' '.$lang2;
	$sitetitulo2 = $sitenames[1].': '.$icons[11];
	$sitedesc = $sitedescs[1];
	$sitedesc2 = $sitedescs[1];

	$siteurl = $siteurlgeral.strtolower($lang2).'/';
}

if (!isset($siteurl) and !isset($sitetitulo) and !isset($sitetitulo2)) {
	if ($lang == $langs[0]) {
		$lang = $langs[1];
		$lang2 = strtoupper($lang);
		$lang2 = substr_replace($lang2, '-', 2, 0);
		$lang = $langs[0];

		$sitename = 'Placeholder for the Site Name';
		$sitetitulo = 'Placeholder for the Site Title';
		$sitetitulo2 = 'Placeholder for the Site Title2';
		$sitedesc = 'Placeholder for the Description.';
		$sitedesc2 = 'Placeholder for the Description.';

		$siteurl = $siteurlgeral;

		$lang = $langs[0];
	}

	if ($lang == $langs[1]) {
		$sitename = 'Placeholder for the Site Name';
		$sitetitulo = 'Placeholder for the Site Title';
		$sitetitulo2 = 'Placeholder for the Site Title2';
		$sitedesc = 'Placeholder for the Description.';
		$sitedesc2 = 'Placeholder for the Description.';

		$siteurl = $siteurlgeral.strtolower($lang2).'/';
	}

	if ($lang == $langs[2]) {
		$sitename = 'Espaço reservado para o Nome do Site';
		$sitetitulo = 'Espaço reservado para o Título do Site';
		$sitetitulo2 = 'Espaço reservado para o Título do Site2';
		$sitedesc = 'Espaço reservado para a Descrição.';
		$sitedesc2 = 'Espaço reservado para a Descrição.';

		$siteurl = $siteurlgeral.strtolower($lang2).'/';
	}
}

?>