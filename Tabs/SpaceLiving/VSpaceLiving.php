<?php 

#CSS color and text style variables
$color = 'blue';
$color1 = 'blue';
$color2 = 'blue';
$color3 = 'blue';
$color4 = 'blue';
$color5 = 'blue';
$colortext = 'w3-text-blue';
$colortext2 = 'w3-text-black';
$colorsubtext = 'w3-text-orange';
$colorsubtext2 = 'w3-text-black';
$colorsubtext3 = 'w3-text-white';
$sitehr = 'slhr';
$sitehr2 = 'slhr';
$sitehr3 = 'blackhr';
$spanstyle = "blue w3-text-black";
$formbtnstyle = "black w3-text-blue";

#Variables that mixes CSS tags
$textstyle = $colortext.' black';
$textstyle2 = 'w3-text-black blue';
$btnstyle = $color4.' '.$cssbtn1;
$btnstyle2 = $color3.' '.$cssbtn1;
$btnstyle3 = $color5.' '.$cssbtn1;
$subtextspan = '<span class="'.$colorsubtext3.'">';
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
$sitephpfolder2 = $phptabs.ucwords($choosenwebsite).'/';
$storyfolder = $slstoryfolder;

#Form code for the comment and read forms
$formcode = 'spaceliving';

$nolangstoryfolder = $rootstoryfolder.$storyfolder.'/';

#Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
include $coverimagesgeneratorphp;

#Story name definer
$story = $slstoryname;

#Story status
$storystatus = $status[2];

#Site image vars
$siteimage = 'SpaceLiving Logo';

#Defines the site image if the site has book covers or not
if ($storyhascovers == true) {
	$siteimage = $coverfolder.'1 '.$covertxt.'.png';
	$imagesize1 = 60;
	$imagesize2 = 88;
}

else {
	$siteimage = $cdn.'/'.'img'.'/'.$siteimage.'.jpg';
	$imagesize1 = 55;
	$imagesize2 = 99;
}

$imglink = $siteimage;

#Site numbers
$crossover = 9;
$commentsnumb = 0;
$commentsnormalnumb = 0;

if ($sitehascomments == true) {
	$commentsnumbtext = $commentsnumb + 1;
	$commentsnormalnumbtowrite = $commentsnormalnumb - 1;
}

else {
	$commentsnumbtext = $commentsnumb;
	$commentsnormalnumbtowrite = $commentsnormalnumb;	
}

$commentschapternumb = $commentsnumbtext - $commentsnormalnumb;

#Non-language dependent texts
$authorname = 'Izaque Sanvezzo (stake2)';
#$commentsbtn = '<a href="#'.$tabcode[6].'"><button class="w3-btn '.$btnstyle.' '.$computervar.'" onclick="openCity('."'".$tabcode[6]."')".'">'.$commentsnumb.' '.$icons[12].'</button></a>'."\n";
#$commentsbtnm = '<a href="#'.$tabcodem[6].'"><button class="w3-btn '.$btnstyle.' '.$mobilevar.'" onclick="openCity('."'".$tabcodem[6]."')".'">'.$commentsnumb.' '.$icons[12].'</button></a>'."\n";

#TextFileReader.php file includer
include $textfilereaderphp;

#Story date definer using story date text file
$storydate = $storydate[0];

#The chapter that I want to write
if ($chaptertowrite == false) {
	$sitestorywritechapter = '';
}

else {
	$sitestorywritechapter = (int)$chaptertowrite;
}

#StoryVars.php file includer
include $storyvarsphp;

#Reviewed chapter number
$reviewedcap = 2;

#Site descriptions
$sitedescs = array(
'Website about my story, '.$story.', made by stake2', 
'Site sobre a minha história, '.$story.', feito por stake2',
);

#Synopsis text definer using the $synopsis that is generated from TextFileReader.php
$descs = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$synopsis[0].'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$synopsis[1].'"<br />',
);

#Reads the book cover image directory if the site has book covers
if ($storyhascovers == true) {
	#Sets the local Cover folder and lists the files inside it
	$dir = $coverfolder2;
	$x2 = 0;
	$zz2 = 0;
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				$files[$zz2] = $coverfolder.$file;
				$x2++;
				$zz2++;
			}
			closedir($dh);
		}
	}

	#Cover image array creator
	$a = 1;
	$i = 3;
	$z = 1;
	$c = 1;
	while ($c <= (count($files) - 3)) {
		if (isset($files[$a]) == true) {
			$onclickscript = 'openCity('."'".$capdiv.$z."'".');DefineChapter('.$z.');';
			if ($c == 3) {
				$z--;
				$onclickscript = 'openCity('."'".$capdiv.$z."'".');DefineChapter('.$z.');';

				$coverimages[$a] = '<div class="'.$computervar.'">'.'<img src="'.$files[$i].'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$computervar.'" />'."\n";

				$coverimagesm[$a] = '<div class="'.$mobilevar.'">'.'<img src="'.$files[$i].'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$mobilevar.'" />'."\n";
			}

			if ($c == 2) {
				$onclickscript = 'openCity('."'".$capdiv.($z + 8)."'".');DefineChapter('.($z + 8).');';

				$coverimages[$a] = '<div class="'.$computervar.'">'.'<img src="'.$files[$i].'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$computervar.'" />'."\n";

				$coverimagesm[$a] = '<div class="'.$mobilevar.'">'.'<img src="'.$files[$i].'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$mobilevar.'" />'."\n";
			}

			else {
				$coverimages[$a] = '<div class="'.$computervar.'">'.'<img src="'.$files[$i].'" width="60%" height="60%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$computervar.'" />'."\n";

				$coverimagesm[$a] = '<div class="'.$mobilevar.'">'.'<img src="'.$files[$i].'" width="99%" height="99%" style="border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle3.'height: auto;max-width: 4000px;" onclick="'.$onclickscript.'" />'."\n".$divc.'<br class="'.$mobilevar.'" />'."\n";
			}

			$a++;
			$i++;
			$z++;
			$c++;
		}
	
		else {
			$c++;
		}
	}
}

#English texts for Pequenata website
if (in_array($lang, $en_langs)) {
	$readtxts = array(
	$readingtxt = "You're reading",
	$readingtxt.': '.ucwords($story),
	'I Read It ✓',
	'I read the Chapter',
	'Read the Chapter',
	'Readings',
	'Readers',
	'Reader',
	);

	$writetxts = array(
	'Write',
	'Write the Chapter',
	substr($readingtxt, 0, -8).' '.strtolower('Writing').': '.ucwords($story),
	);
}

#Brazilian Portuguese texts for Pequenata website
if (in_array($lang, $pt_langs)) {
	$readtxts = array(
	$readingtxt = "Você está lendo",
	$readingtxt.': '.ucwords($story),
	'Eu li ✓',
	'Eu li o Capítulo',
	'Leu o Capítulo',
	'Leituras',
	'Leitores',
	'Leitor',
	);

	$writetxts = array(
	'Escrever',
	'Escreva o capítulo',
	substr($readingtxt, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story),
	);
}

#Status text definer, that sets the status text with [] around it
$statustxt = '['.ucfirst($storystatus).']';

#Site name, title, URL and description setter, by language
if ($lang == $langs[0]) {
	$lang = $langs[1];

	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $choosenwebsite;

	$lang = $langs[0];

	$sitetitulo = $storyfolder;
	$sitetitulo2 = $storyfolder.': '.$icons[11];
	$siteurl = $sitesllink;
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];

	$lang = $langs[0];
}

if ($lang == $langs[1]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $choosenwebsite;

	$sitetitulo = $story.' '.$lang2;
	$sitetitulo2 = $story.': '.$icons[11];
	$siteurl = $sitesllink.strtolower($lang2).'/';
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];
}

if (in_array($lang, $pt_langs)) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $choosenwebsite;

	$sitetitulo = $story.' '.$lang2;
	$sitetitulo2 = $story.': '.$icons[11];
	$siteurl = $sitesllink.strtolower($lang2).'/';
	$sitedesc = $sitedescs[1];
	$sitedesc2 = $descs[1];
}

#Buttons and tabs definer
#Tab names replacer for langs
if (in_array($lang, $en_langs)) {
	$tabnames[5] = substr_replace($tabnames[5], '-', 6, 0);
	$tabnames[5] = strtr($tabnames[5], "l", strtoupper("l"));;
}

if ($writingpack == true) {
	$tabnames[0] = str_replace('Read', 'Write', $tabnames[0]);
	$tabnames[0] = str_replace('Ler', 'Escrever', $tabnames[0]);
}

#str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", ${"$filetextarraynames[$i]"});

#Button names
$citiestxts = array(
$tabnames[0].': '.$icons[21].' '.'<span class="w3-text-yellow"> ['.$newtxt.' '.$chapters.']</span>',
$tabnames[1].': '.$icons[20].' ❤️ 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$icons[11],
$icons[13],
);

#Buttons and tabs definer
#Tab titles definer
$tabtitles = array(
$tabnames[0].': '.$icons[21].' '.'<span class="w3-text-yellow"> ['.$newtxt.' '.$chapters.']</span>',
$tabnames[1].': '.$icons[20].' ❤️ 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$icons[11],
);

#Button names definer
$i = 0;
foreach ($tabtitles as $tabname) {
	$citiestxts[$i] = $tabname;

	$i++;
}

#TabGenerator.php includer
include $tabgeneratorphp;

#Site notification variables if the site notification setting is true
if ($sitehasnotifications == true) {
	#Reviewed chapter title
	$reviewedcapcode = $chapterbtns[$reviewedcap];
}

?>