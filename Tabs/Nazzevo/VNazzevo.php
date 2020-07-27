<?php 

#CSS style variables
$color2 = 'yellow';
$color3 = '#b88e50';
$color4 = 'bg2';
$colortext = 'pqnttext';
$colortext2 = 'w3-text-black';
$colorsubtext = 'w3-text-orange';
$sitehr = 'pqnthr';
$sitehr2 = 'pqnthr';
$sitehr3 = 'blackhr';
$spanstyle = "pqntspan";
$formbtnstyle = "pqntsend";

#Variables that mixes CSS tags
$textstyle = $colortext.' blackbg';
$textstyle2 = 'w3-text-black bg';
$textstyleinvert = $colortext2.' bg';
$btnstyle = $color4.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;
$btnstyle3 = $color4.' '.$cssbtn1;
$subtextspan = '<span class="'.$colorsubtext.'">';
$sitewhilestyle = $color4;
$formcolor = $color4;

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
$siteurlgeral = $url.$sitefolder."/";
$sitephpfolder2 = $php_tabs_variable.ucwords($sitenazzevo).'/';
$storyfolder = $nazzevostoryfolder;

#Form code for the comment and read forms
$formcode = 'nazzevo';

$nolangstoryfolder = $notepad_stories_folder_variable.$storyfolder;

$single_cover_folder = 'Capas/';
$cover_folder = $cdn_image_stories.'Nazzevo/'.$single_cover_folder;

#Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_displayer_php_variable;

#Story name definer
$story = $nazzevostoryname;

#Story status
$storystatus = $status[3];
if ($storystatus == $status[0]) {
	$storystatus = $storystatuses[1];
}

if ($storystatus == $status[1]) {
	$storystatus = $storystatuses[1];
}

if ($storystatus == $status[2]) {
	$storystatus = $storystatuses[2];
}

if ($storystatus == $status[3]) {
	$storystatus = $storystatuses[3];
}

#Comments variable
$sitecomments = true;

#Site image vars
$siteimage = 'nazzevo';

#Defines the site image if the site has book covers or not
if ($storyhascovers == true) {
	$siteimage = $online_cover_folder.'1 '.$covertxt.'.png';
	$imagesize1 = 60;
	$imagesize2 = 88;
}

else {
	$siteimage = $cdnimg.$siteimage.'.jpg';
	$imagesize1 = 30;
	$imagesize2 = 77;
}

$imglink = $siteimage;

#Numbers and non-language dependent texts
$commentsnumb = 2;
$commentsnumbtext = $commentsnumb + 1;
$commentsnormalnumb = 1;
$commentsnormalnumbtowrite = $commentsnormalnumb - 1;
$commentschapternumb = $commentsnumbtext - $commentsnormalnumb;
$readednumb = 1;
$authorname = 'Izaque Sanvezzo (stake2)'.' '.$whitespan.$andtxt.$spanc.' '.$purplespan.'Lulu Black Fazbear'.$spanc;
$commentsbtn = '<a href="#'.$tabcode[6].'"><button class="w3-btn '.$btnstyle.' '.$computervar.'" onclick="openCity('."'".$tabcode[6]."')".'">'.$commentsnumb.' '.$icons[12].'</button></a>'."\n";
$commentsbtnm = '<a href="#'.$tabcodem[6].'"><button class="w3-btn '.$btnstyle.' '.$mobilevar.'" onclick="openCity('."'".$tabcodem[6]."')".'">'.$commentsnumb.' '.$icons[12].'</button></a>'."\n";

#TextFileReader.php file includer
include $textfilereaderphp;

#Chapters and storydate definer using Story date.txt and ChapterNumber.txt
$chapters = $chapters[0];
$storydate = $storydate[0];

#Site descriptions
$sitedescs = array(
'Website about my story, '.$story.', made by stake2', 
'Site sobre a minha história, '.$story.', feito por stake2',
);

$descs = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$synopsis[0].'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$synopsis[1].'"<br />',
);

#Texts for the English language
if ($lang == $langs[0] or $lang == $langs[1]) {
	$authortxt = 'Author';
	$captxt = 'Chapters';
	$datatxt = 'Date';
	$datatxt2 = 'Made in';

	$nametxt1 = 'Name';
	$nametxt2 = 'Your';
	$sendtxt = 'Send';

	#Status text definer, that sets the status text with [] around it
	$statustxt = ucfirst($storystatus);

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

	$cmntstxts = array(
	'Comment',
	'Comment',
	'Commented',
	'in the',
	'on',
	'Say what you think about the story',
	'Say what you think about the chapter',
	);

	$titletxt = 'Title';
	$storytxt = 'Story text';
	$timetxt = 'Time';
	$storiestxt = 'Stories';
	$formname = 'Name';
	$formtxt = 'Form';
	
	$writetxts = array(
	'Write',
	'Write the Chapter',
	substr($readingtxt, 0, -8).' '.strtolower('Writing').': '.ucwords($story),
	);

	$readersdesc = "Thanks everyone ♥";
}

#Texts for the Brazilian Portuguese language
if ($lang == $langs[2]) {
	$authortxt = 'Autor';
	$captxt = "Capítulos";
	$datatxt = "Data";
	$datatxt2 = "Feito em";

	$nametxt1 = 'Nome';
	$nametxt2 = 'Seu';
	$sendtxt = 'Enviar';

	#Status text definer, that sets the status text with [] around it
	$statustxt = ucfirst($storystatus);

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

	$cmntstxts = array(
	'Comentário',
	'Comentar',
	'Comentado',
	'no',
	'em',
	'Comente o que achou da história',
	'Comente o que achou do capítulo',
	);

	$timetxt = 'Tempo';
	$storiestxt = "Histórias";
	$formname = "Nome";
	$formtxt = 'Formulário';

	$writetxts = array(
	'Escrever',
	'Escreva o capítulo',
	substr($readingtxt, 0, -6).' '.strtolower('Escrevendo').': '.ucwords($story),
	);

	$readersdesc = "Obrigado a todos ♥";
}

#Reads the book cover image directory if the site has book covers
if ($storyhascovers == true) {
	require $cover_images_generator_php_variable;
}

#"You're reading" text definers
$statustxt = "[".$statustxt."]";

#Site name, title, url and description setter
if ($lang == $langs[0]) {
	$lang = $langs[1];
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $sitename;
	$lang = $langs[0];
	
	$sitetitulo = $story.' '.ucwords($lang);
	$sitetitulo2 = $story.': '.$icons[11];
	$siteurl = $siteurlgeral;
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];
	$lang = $langs[0];
}

if ($lang == $langs[1]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $sitename;
	
	$sitetitulo = $story;
	$sitetitulo2 = $story.': '.$icons[11];
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];
}

if ($lang == $langs[2]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $sitename;

	$sitetitulo = $story;
	$sitetitulo2 = $story.': '.$icons[11];
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[1];
}

#Buttons definer
if ($lang == $langs[0] or $lang == $langs[1]) {
	$tabnames[5] = substr_replace($tabnames[5], '-', 6, 0);
	$tabnames[5] = strtr($tabnames[5], "l", strtoupper("l"));;
}

#Button names
$citiestxts = array(
$tabnames[0].': '.$icons[21],
$tabnames[1].': '.$icons[20].' ❤️ 😊',
$tabnames[2].': '.$icons[12],
$tabnames[3].': '.$icons[10],
$tabnames[4].': '.$icons[11],
$icons[13],
'',
);

#TabGenerator.php includer
include $tabgeneratorphp;

#Site notification variables
if ($sitehasnotifications == true) {
	#Reviewed chapter title
	$reviewedcapcode = $chapterbtns[0];
}

?>