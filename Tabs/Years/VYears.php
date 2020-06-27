<?php

if (in_array($sitename, $yeararray)) {
	#CSS style variables
	$color2 = 'yellow';
	$color4 = 'white';
	$colortext = 'w3-text-white';
	$sitehr = 'whitehr';
	$textstyle = 'w3-black w3-text-white';

	#Variables that mixes CSS tags
	$btnstyle = $color2.' '.$cssbtn1;
	$btnstyle2 = $color2.' '.$cssbtn1;
	$sitewhilestyle = $color2;

	#HTML and HTML Style variables
	$h2 = '<'.$n.' class="'.$computervar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color2.';border-style:solid;'.$roundedborderstyle2.'">';
	$h4 = '<'.$m.' class="'.$mobilevar.' '.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color2.';border-style:solid;'.$roundedborderstyle2.'">';
	$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:'.$color2.';border-style:solid;'.$roundedborderstyle2.'">';
	$marginstyle1 = 'style="margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'"';
	$marginstyle2 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'"';
	$marginstyle3 = 'style="margin-right:70%;border-width:3px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'"';
	$border = 'border-width:4px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'';
	$border2 = 'border-width:7px;border-color:'.$color4.';border-style:solid;'.$roundedborderstyle2.'';

	#Folder variables
	$yeartxtfolder = $maintextfolder2.'/Anos/';
	$siteurlgeral = $url.'/'.$sitefolder.'/'.$ano.'/';
	$sitephpfolder2 = $sitephpfolder.$global.'/'.$folder1.'/'.$ano.'/';
	$anosnumb = 3;

	#VYears PHP files
	$yearmakerfilephp = $sitephpfoldergeraltabs.ucwords($sitetextmaker).'/YearMaker.php';
	$yearmakerfilephp2 = $sitephpfoldergeraltabs.ucwords($sitetextmaker).'/YearMaker2.php';
	$yearmakerfilephp2test = $sitephpfoldergeraltabs.ucwords($sitetextmaker).'/YearMaker2.php';
	$yearsbuttonsgenerator = $sitephpfoldergeraltabs.'Years/'.'YearsButtons Generator.php';

	#English texts for all websites
	if ($lang == $langs[0] or $lang == $langs[1]) {
		$marginstyle4 = 'style="margin-right:75%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
		$marginstyle22 = 'style="margin-right:73%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
	}

	#Brazilian Portuguese texts for all websites
	if ($lang == $langs[2]) {
		$marginstyle4 = 'style="margin-right:78%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
		$marginstyle22 = 'style="margin-right:76%;border-width:3px;border-color:'.$color2.';border-style:solid;"';
	}

	#Previous year button
	$anoanteriorbtn = '<button class="w3-btn '.$btnstyle.'" onclick="window.open('."'https://diario.netlify.com/years/".$anoanterior."/'".')"><'.$n.'>'.$anoanterior.': <i class="fas fa-globe-americas"></i></'.$n.'></button>';

	#Mobile previous year button
	$anoanteriorbtnm = '<button class="w3-btn '.$btnstyle.'" onclick="window.open('."'https://diario.netlify.com/years/".$anoanterior."/'".')"><'.$m.'>'.$anoanterior.': <i class="fas fa-globe-americas"></i></'.$m.'></button>';

	#Site image link and image size
	$siteimage = $ano;
	$siteimage = $cdn."/img/".$siteimage.".png";
	$imglink = $siteimage;
	$imagesize1 = 25;
	$imagesize2 = 66;
	$screenshotlink = '<a href="'.$cdn.'/img/Jogos 616-691.gif" class="w3-text-blue">Jogos 616-691.gif</a>';

	#Site descriptions
	$sitedescs = array('Website to show my '.$ano.', Site para mostar o meu '.$ano.' (stake2)', 
	'Website to show my '.$ano.'. (stake2)',
	'Site para mostar o meu '.$ano.' (stake2)');

	$descs = array('Description: A website to show how my year '.$orangespan.'('.$ano.')'.$spanc.' was and what I did during it, I am '.$orangespan.'stake2'.$spanc.', or '.$orangespan.'Izaque'.$spanc, 
	'Descrição: Um site para mostar como meu ano '.$orangespan.'('.$ano.')'.$spanc.' foi e o que eu fiz durante ele, eu sou '.$orangespan.'stake2'.$spanc.', ou '.$orangespan.'Izaque'.$spanc);
}

#Year texts and YearNumbs.txt reader
include $yearsvarsfilephp;

#General language sitename, title, url and description
if ($lang == $langs[0]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $site;

	$sitetitulo = $ano;
	$sitetitulo2 = $ano.': '.$icons[3];
	$siteurl = $siteurlgeral;
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];
}

#English language sitename, title, url and description
if ($lang == $langs[1]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $sitefolder;
	$sitename = $ano;

	$sitetitulo = $ano." ".$lang2;
	$sitetitulo2 = $ano.': '.$icons[3];
	$siteurl = $siteurlgeral.strtolower($lang2)."/";
	$sitedesc = $sitedescs[1];
	$sitedesc2 = $descs[0];
}

#Brazilian Portuguese language sitename, title, url and description
if ($lang == $langs[2]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $sitefolder;
	$sitename = $ano;

	$sitetitulo = $ano." ".$lang2;
	$sitetitulo2 = $ano.': '.$icons[3];
	$siteurl = $siteurlgeral.strtolower($lang2)."/";
	$sitedesc = $sitedescs[2];
	$sitedesc2 = $descs[1];
}

#File definers
#Friends file
$friendsfile = $maintextfolder2.'/Anos/'.$site2019.'/Amigos List.txt';

#Tasks file
if ($lang == $langs[0] or $lang == $langs[1]) {
	$taskmadefile = $maintextfolder2.'/Will to Think and Register Thought/Productive Network/Archives/To-Do Slim '.$ano." Archive ".strtoupper($langs[1]).".txt";
}

if ($lang == $langs[2]) {
	$taskmadefile = $maintextfolder2.'/Will to Think and Register Thought/Productive Network/Archives/To-Do Slim '.$ano." Archive ".strtoupper($langs[2]).".txt";
}

#Number counters
#Friends number counter
$friendsfilecount = 0;
$handle = fopen ($friendsfile, "r");
while (!feof($handle)) {
	$line = fgets($handle);
	$friendsfilecount++;
}

#Tasks number counter
$tasksfilecount = 0;
$handle = fopen ($taskmadefile, "r");
while (!feof($handle)) {
	$line = fgets($handle);
	$tasksfilecount++;
}

#Friends and Tasks numbers
$friendsfilecount2 = $friendsfilecount - 1;
$tasksfilecount2 = $tasksfilecount - 1;

#Text readers
#Friends file reader
$fp = fopen ($friendsfile, 'r', 'UTF-8'); 
if ($fp) {
	$friendsfiletxt = explode("\n", fread($fp, filesize($friendsfile)));
}

#Tasks file reader
$fp = fopen ($taskmadefile, 'r', 'UTF-8'); 
if ($fp) {
	$taskmadefiletxt = explode("\n", fread($fp, filesize($taskmadefile)));
}

#Replacer for characters
$friendsfiletxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $friendsfiletxt);
$taskmadefiletxt = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $taskmadefiletxt);

#TextFileReader.php file includer
include $textfilereaderphp;

$a2019 = false;
$reneneratemedias2019 = 'a';
$generate2019 = true;
#YearMaker2.php reader
ob_start();
include $yearmakerfilephp2;
$yearmakerfilephp2 = ob_get_clean();

?>