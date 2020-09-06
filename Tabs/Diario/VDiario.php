<?php 

#CSS style variables
$color = 'grey';
$color2 = 'grey';
$color3 = 'grey';
$color4 = 'w3-grey';
$colortext = 'w3-text-white';
$colortext2 = 'w3-text-black';
$sitehr = 'greyhr';
$sitehr2 = 'greyhr';
$sitehr3 = 'greyhr';
$spanstyle = 'grey w3-text-black';
$formbtnstyle = 'black w3-text-grey';

#Variables that mixes CSS tags
$textstyle = $colortext.' black';
$textstyle2 = 'w3-text-black grey';
$btnstyle = $color4.' '.$cssbtn1;
$btnstyle2 = $color2.' '.$cssbtn1;
$btnstyle3 = $color2.' '.$cssbtn1;
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
$sitephpfolder2 = $php_tabs.ucwords($choosenwebsite).'/';
$blockreaderphp = $sitephpfolder2.'BlockReader.php';
$storyfolder = $diario_folder_blocks;

$nolangstoryfolder = $storyfolder;

#Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
if ($lang == $langs[0]) {
	$lang = $langs[1];

	$rootstoryfolder2 = $storyfolder;

	if ($storyhascovers == true) {
		$coverfolder = $cdn.'/'.'img'.'/'.'stories'.'/'.$formcode.'/'.'Capas'.'/'.'kids'.'/'.strtoupper($lang).'/';
		$coverfolder2 = substr($rootstoryfolder2, 0, -5).'Foto'.'/'.'Capas'.'/'.'Kids'.'/'.strtoupper($lang).'/';
	}

	$lang = $langs[0];
}

else {
	$rootstoryfolder2 = $storyfolder;

	if ($storyhascovers == true) {
		$coverfolder = $cdn.'/'.'img'.'/'.'stories'.'/'.$formcode.'/'.'capas'.'/'.'kids'.'/'.strtoupper($lang).'/';
		$coverfolder2 = substr($rootstoryfolder2, 0, -5).'Foto'.'/'.'Capas'.'/'.'Kids'.'/'.strtoupper($lang).'/';
	}
}

#Diario name in English and Brazilian Portuguese language
$diarionames = array(
'Diary',
ucwords(substr_replace($sitediario, 'á', 2, 1)),
);

#Site has comments settings
$sitecomments = false;

#Site image vars
if ($lang == $langs[0] or $lang == $langs[1]) {
	$siteimage = 'diario 2 enus';
}

if ($lang == $langs[2]) {
	$siteimage = 'diario 2';
}

$siteimage = $cdnimg.$siteimage.".png";
$imglink = $siteimage;
$imagesize1 = 30;
$imagesize2 = 66;

#Site descriptions
$sitedescs = array(
'Site to show my '.$diarionames[0].' in HTML form, made by stake2.',
'Site para mostrar o meu '.$diarionames[1].' em forma de HTML, feito por stake2.',
);

$descs = array(
'Site to show my '.$orangespan.''.$diarionames[0].''.$spanc.' in HTML form, made by '.$orangespan.'stake2'.$spanc.'.',
'Site para mostrar o meu '.$orangespan.''.$diarionames[1].''.$spanc.' em forma de HTML, feito por '.$orangespan.'stake2'.$spanc.'.',
);

#Language dependent character names
if ($lang == $langs[0] or $lang == $langs [1]) {
	$story = $diarionames[0];
	$nodusname = 'Nodus (Artificial Intelligence)';
	$tedname = 'Ted (Random guy)';
}

if ($lang == $langs[2]) {
	$story = $diarionames[1];
	$nodusname = 'Nodus (Inteligência Artificial)';
	$tedname = 'Ted (Cara aleatório)';
}

#Characters array
$characters = array(
$margin_3_h1.'<b>'.$orangespan.'Izaque (stake2):'.$spanc.'</b>'.$h1c,
$margin_3_h1.'<b>'.$bluespan.$nodusname.':'.$spanc.'</b>'.$h1c,
$margin_3_h1.'<b>'.$cyanspan.$tedname.':'.$spanc.'</b>'.$h1c,
);

#TextFileReader.php file includer
$used_folder = $diario_folder;
include $text_file_reader_file_php;

#Site numbers
$blocks = 118;
$publishedblocks = $blocksnumber[0];
$chapters = $publishedblocks;

$commentsnumb = 0;
$commentsnumbtext = $commentsnumb + 1;
$commentschapternumb = 0;

$formcode = 'diario';
$blockdiv = $chaptertxt.'-';

#Re include of the StoryVars.php file to set the story name
include $storyvarsphp;

#Texts for English language
if ($lang == $langs[0] or $lang == $langs[1]) {
	$blockstext = 'The '.$diarionames[0].' has ['.$bluespan.$blocks.$spanc.'] blocks written, each block is a chapter.';
	$charactersdescs = array(
	'<div style="margin-left:3%;">'.'Me of course xD, my dialogue is shown with:<br />
	[Current time]: "My dialogue"<br /><br />
	In other words:<br />
	23:42 19/04/2020: "My dialogue"<br />'.$divc,

	'<div style="margin-left:3%;">'.'My friend "from the future", he is an Artificial Intelligence, and a robot if you will, his dialogue is shown with:<br />
	[Current time]: //His dialogue<br /><br />
	In other words:<br />
	23:42 19/04/2020: //His dialogue<br />'.$divc,

	'<div style="margin-left:3%;">'.'A random guy that appears sometimes, his dialogue is shown with:<br />
	[Current time]: ~His dialogue<br /><br />
	In other words:<br />
	23:42 19/04/2020: ~His dialogue'.$divc,
	);

	$nametxt1 = 'Name';
	$nametxt2 = 'Your';
	$sendtxt = 'Send';
	$commenttxt = 'Comment';
	$commenttxt2 = "Comment";
	$commenttxt3 = "Commented";
	$commenttxt4 = 'in the';
	$commenttxt5 = 'on';
	$commentdesc1 = "Say what you think about the story";
	$commentdesc2 = "Say what you think about the chapter";
	$formname = "Name";
	$formtxt = 'Form';
	$writetxt = 'Write';
	$writedesc = "Write the Chapter";
}

#Texts for Brazilian Portuguese language
if ($lang == $langs[2]) {
	$blockstext = 'O '.$diarionames[1].' tem ['.$bluespan.$blocks.$spanc.'] blocks escritos, cada block é um capítulo.';
	$charactersdescs = array(
	'<div style="margin-left:3%;">'.'Eu, é claro kkkkk, meu diálogo é mostrado com:<br />
	[Hora atual]: "Meu diálogo"<br /><br />
	Em outras palavras:<br />
	23:42 19/04/2020: "Meu diálogo"'.$divc,

	'<div style="margin-left:3%;">'.'Meu amigo "do futuro", ele é uma Inteligência Artificial, e um robô se você quiser, seu diálogo é mostrado com:<br />
	[Hora atual]: //O diálogo dele<br /><br />
	Em outras palavras:<br />
	23:42 19/04/2020: //O diálogo dele'.$divc,

	'<div style="margin-left:3%;">'.'Um cara aleatório que aparece às vezes, seu diálogo é mostrado com ele:<br />
	[Hora atual]: ~O diálogo dele<br /><br />
	Em outras palavras:<br />
	23:42 19/04/2020: ~O diálogo dele'.$divc,
	);

	$nametxt1 = 'Nome';
	$nametxt2 = 'Seu';
	$sendtxt = 'Enviar';
	$commenttxt = 'Comentário';
	$commenttxt2 = "Comentar";
	$commenttxt3 = "Comentado";
	$commenttxt4 = 'no';
	$commenttxt5 = 'em';
	$commentdesc1 = "Comente o que achou da história";
	$commentdesc2 = "Comente o que achou do capítulo";
	$formname = "Nome";
	$formtxt = 'Formulário';
	$writetxt = "Escrever";
	$writedesc = "Escreva o capítulo";
}

#Story name and characters text array
$characterstext = $margin.
$margin.
'<div style="border-width:0px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'.
'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'.$characters[0].$margin.$charactersdescs[0].$divc.'<br />'.$divc.'<br /><br />'.
'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'.$characters[1].$margin.$charactersdescs[1].$divc.'<br />'.$divc.'<br /><br />'.
'<div style="border-width:3px;border-color:'.$bordercolor.';border-style:solid;'.$roundedborderstyle4.'">'.$characters[2].$margin.$charactersdescs[2].$divc.'<br />'.$divc.
$divc.$divc.$divc;

#"You're reading" text definers
if ($lang == $langs[0] or $lang == $langs[1]) {
	$reading = "<b>You're reading: ".ucwords($story).'<br />'." </b>";
}

if ($lang == $langs[2]) {
	$reading = "<b>Você está lendo: ".ucwords($story).'<br />'." </b>";
}

#Buttons definer
#Buttons names
$citiestxts = array(
$tabnames[0].': '.$icons[21].' '.$bluespan.' ['.$newtxt.' '.ucwords($chaptertxt).' '.$publishedblocks.']'.$spanc,
$tabnames[1].': '.$icons[1],
$tabnames[2].': '.$icons[12],
);

if ($sitehasstories == true) {
	array_push($citiestxts, end(array_values($tabnames)).': '.$icons[11]);
}

#TabGenerator.php includer
include $tabgeneratorphp;

#Site name, title, url and description setter
if ($lang == $langs[0]) {
	$lang = $langs[1];
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $diarionames[0].' '.$lang2;
	$lang = $langs[0];
	
	$sitetitulo = $diarionames[0];
	$sitetitulo2 = $diarionames[0].': '.$icons[11];
	$siteurl = $siteurlgeral;
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];
	$lang = $langs[0];
}

if ($lang == $langs[1]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $diarionames[0];

	$sitetitulo = $diarionames[0].' '.$lang2;
	$sitetitulo2 = $diarionames[0].': '.$icons[11];
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[0];
	$sitedesc2 = $descs[0];
}

if ($lang == $langs[2]) {
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$sitename = $diarionames[1].' '.$lang2;

	$sitetitulo = $diarionames[1].' '.$lang2;
	$sitetitulo2 = $diarionames[1].': '.$icons[11];
	$siteurl = $siteurlgeral.strtolower($lang2).'/';
	$sitedesc = $sitedescs[1];
	$sitedesc2 = $descs[1];
}

?>