<?php

$sitefolder = strtolower($site);
$storyfolder = "Pequenata - Littletato";
$cdn = $url."/"."cdn";
$siteurlgeral = $url."/".$sitefolder."/";
$sitephpfolder = "C:/Mega/Diario/PHP/";
$fontawesomelink = "https://use.fontawesome.com/releases/v5.8.2/css/all.css";
$rootstoryfolder = "C:/Mega/Bloco De Notas/Effort/Historias/";
$storieslinks = $sitephpfolder.$global.'/'.$folder2.'/StoriesLinks.php';
$siteheaderfile = $sitephpfolder.$global.'/'.$folder2.'/SiteHeader.php';
$formfile = $sitephpfolder.$global.'/'.$folder2.'/FormFile.php';
$tabvarsfile = $sitephpfolder.$global.'/'.$folder2.'/TabVars.php';

if ($natal == true) {
	$stylefilephp = $sitephpfolder.$site."/".$folder2."/SiteStyleNatal.php";
} else {
	$stylefilephp = $sitephpfolder.$site."/".$folder2."/SiteStyle.php";
}

$globalfiles = array($stylefilephp, $storieslinks, $siteheaderfile, $formfile, $tabvarsfile);

if ($natal == true) {
	$sitecssfile = "red";
} 

else {
	$sitecssfile = "pqnt";
}

$siteimage = "Pequenata";
$siteimage = $cdn."/img/".$siteimage.".jpg";
$siteimage2 = $cdn."/img/human ".$sitefolder.".jpg";
$imglink = $siteimage2;
$sitecss = '<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/'.$sitecssfile.'.css" />
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/w3.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/stories.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/Colors.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/mobile.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/imghover.css" />'.
"\n";
$sitejs = '<script src="'.$cdn.'/js/myFunction.js"></script>
<script src="'.$cdn.'/js/tabs.js"></script>
<script src="'.$cdn.'/js/redirect.js" onLoad="rodar();"></script>
<script src="'.$cdn.'/js/ShowHide.js"></script>
<script src="'.$cdn.'/js/sidemenu.js"></script>
<script src="'.$cdn.'/js/js.js"></script>
<script src="'.$cdn.'/js/Natal.js"></script>'.
"\n";
date_default_timezone_set("America/Sao_Paulo");
$data = date("d/m/Y");

include $globalfiles[0];

#Stories numb
$storiesnumb = 4;

#English texts for all websites
if ($lang == $langs[0] or $lang == $langs[1]) {
	$andtxt = 'and';
	$newtxt = 'New';
	$ortxt = 'or';
	$numbertxt = 'number';
	$langreadtext = 'Read';
	$imglinktxt = 'image link';

	$storystatuses = array(
	'finished',
	'writing',
	'reviewing',
	'finished and publishing',
	);

	$capdiv = 'capen';
	$chaptertxt = 'chapter';
	$blockdiv = 'block';
	$siteicon = '🇺🇸';
	$btnmenutxt = 'Mobile button menu: ';
	$editbtntxt1 = 'Edit text';
	$editbtntxt2 = 'Activate';
	$editbtntxt3 = 'Deactivate';
	$copybtntxt1 = 'Copy HTML';
	$copybtntxt2 = 'Copy text';
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

	$storystatuses = array(
	'terminada',
	'escrevendo',
	'revisando',
	'terminada e postando',
	);

	$capdiv = 'cappt';
	$chaptertxt = 'capítulo';
	$blockdiv = 'block';
	$siteicon = '🇧🇷';
	$btnmenutxt = 'Menu de botões mobile: ';
	$editbtntxt1 = 'Editar texto';
	$editbtntxt2 = 'Ativar';
	$editbtntxt3 = 'Desativar';
	$copybtntxt1 = 'Copiar HTML';
	$copybtntxt2 = 'Copiar texto';
}
$langreadtext2 = strtolower($langreadtext);

#Story names definer by language
if ($lang == $langs[0] or $lang == $langs[1]) {
	$pqntstoryname = 'The Life of Littletato';
	$slstoryname = 'SpaceLiving';
	$nazzevostoryname = 'The Story of the Nazzevo brothers';
	$lonelystoryname = 'Lonely Stories';
	$luizastoryname = 'The Visit of Luiza';
}

if ($lang == $langs[2]) {
	$pqntstoryname = 'A Vida de Pequenata';
	$slstoryname = 'SpaceLiving';
	$nazzevostoryname = 'A História dos irmãos Nazzevo';
	$lonelystoryname = 'Histórias Solitárias';
	$luizastoryname = 'A Visita de Luiza';
}

#Story names array
$stories = array(
$pqntstoryname,
$slstoryname,
$nazzevostoryname,
$lonelystoryname,
$luizastoryname,
);

#Story folders array
$storyfolders = array(
$pqntstoryfolder = 'Pequenata - Littletato',
$nazzevostoryfolder = 'A História dos irmãos Nazzevo',
);

$status = array(
'finished',
'writing',
'reviewing',
'finished and publishing',
);

#Story name definer
$story = $pqntstoryname;

#Story status
$storystatus = $status[1];
if ($storystatus == $status[0]) {
	$storystatus = $storystatuses[0];
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

#Non-language dependent texts
$sitedescs = array(
'Website about my story, '.$story.', made by stake2', 
'Site sobre a minha história, '.$story.', feito por stake2',
);

#Site image vars
$siteimage = 'pequenata';
$siteimage = $cdn."/img/".$siteimage.".jpg";
$imglink = $siteimage;
$imagesize1 = 30;
$imagesize2 = 66;

#Numbers and non-language dependent texts
#$chapters = 29;
$crossover = 26;
$commentsnumb = 16;
$commentsnumbtext = $commentsnumb + 1;
$commentsnormalnumb = 10;
$commentsnormalnumbtowrite = $commentsnormalnumb - 1;
$commentschapternumb = $commentsnumbtext - $commentsnormalnumb;
$readednumb = 12;
$authorname = 'Izaque Sanvezzo (stake2)';
$commentsbtn = '<a href="#'.$tabcode[6].'"><button class="w3-btn '.$btnstyle.' '.$mobile0.'" onclick="openCity('."'".$tabcode[6]."')".'">'.$commentsnumb.' '.$icons[12].'</button></a>'."\n";
$commentsbtnm = '<a href="#'.$tabcodem[6].'"><button class="w3-btn '.$btnstyle.' '.$mobile1.'" onclick="openCity('."'".$tabcodem[6]."')".'">'.$commentsnumb.' '.$icons[12].'</button></a>'."\n";

$storydate = $storydate[0];

$descs = array(
'Synopsis: <i class="fas fa-scroll"></i> "'.$synopsis[0].'"<br />',
'Sinopse: <i class="fas fa-scroll"></i> "'.$synopsis[1].'"<br />',
);

#Folder variables
$siteurlgeral = $url."/".$sitefolder."/";
$sitephpfolder2 = $sitephpfolder.$global.'/'.$folder1.'/'.ucwords($sitepqnt).'/';
$storyfolder = $pqntstoryfolder;

$cssbtn1 = "borderbtn";
$cssbtn2 = "borderbtn2";
$cssbtn3 = "borderbtnblack2";
$n1 = '<h2>';
$n2 = '</h2>';
$n = 'h2';
$n3 = 'h2';
$n21 = '<h3>';
$n22 = '</h3>';
$n23 = 'h3';
$m1 = '<h4>';
$m2 = '</h4>';
$m = 'h4';
$m3 = 'h4';
$m4 = '<h5>';
$m5 = '</h5>';
$m6 = 'h5';
$bigspace = '<div class="mobileHide"><br /><br /><br /><br /><br /><br /><br /><br /></div>';
$margin = '<div style="margin:3%;">';
$margin2 = '<div style="margin-left:25%;margin-right:25%;">';
$margincss1 = 'style="margin-left:25%;margin-right:25%;"';
$mobile0 = 'mobileHide';
$mobile1 = 'mobileShow';
$divmobile0 = '<div class="mobileHide">';
$divmobile1 = '<div class="mobileShow">';
$pcbutton = $color2.' '.$cssbtn1;
$mobilebutton = $color2.' '.$cssbtn1;
$h2 = '<'.$n3.' class="black '.$colortext.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;">';
$h4 = '<'.$m3.' class="black '.$colortext.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;">';
$h2 = '<'.$n3.' class="black '.$colortext.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;">';
$h5 = '<'.$m6.' class="black '.$colortext.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;">';
$h6 = '<h6 class="black '.$colortext.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;">';
$hstyle = 'margin:5%;';
$hstyle2 = 'margin:10%;border-width:3px;border-color:'.$color.';border-style:solid;';
$spanc = '</span>';
$divc = '</div>';
$h2c = '</h2>';
$h4c = '</h4>';
$h5c = '</h5>';
$h6c = '</h6>';
$widthsize = '50';
$size = 'height="'.$widthsize.'"';
$readersicon1 = '<i class="fas fa-user-friends '.$text2.'"></i> ❤️ 😊';
$commenticon1 = '<i class="fas fa-comments '.$text2.'"></i>';
$writeicon1 = '<i class="fas fa-pen '.$text2.'"></i>';
$storiesicon1 = '<i class="fas fa-book '.$text2.'"></i>';
$readersicon2 = '<i class="fas fa-user-friends '.$colortext.'"></i> ❤️ 😊';
$commenticon2 = '<i class="fas fa-comments '.$colortext.'"></i>';
$writeicon2 = '<i class="fas fa-pen '.$colortext.'"></i>';
$storiesicon2 = '<i class="fas fa-book '.$colortext.'"></i>';
$mainimage = '<img src="'.$imglink.'" width="25%" class="'.$colortext.' mobileHide" style="border-width:3px;border-color:'.$color3.';border-style:solid;" />';
$mainimagem = '<img src="'.$imglink.'" width="66%" class="'.$colortext.' mobileShow" style="border-width:3px;border-color:'.$color3.';border-style:solid;" />';
$imagens = $mainimage."\n".$mainimagem;

$chapters = 29;
$crossover = 26;
$readersnumb = 30;
$titleone = 25;
$lasttitle = $chapters + 1;
$storydate = '05/08/2017';
$authorname = 'Izaque Sanvezzo(stake2)';

include $globalfiles[1];

$mobilemenuopen = '<button id="ShowMenu" class="w3-btn '.$color2.' mobileShow border '.$cssbtn1.'" style="float:left;position:fixed;" onclick="openNav()"><h2><i class="fas fa-bars"></i></h2></button>';

$pcbtn1 = '<br /><button class="w3-btn yellow '.$cssbtn1.'" onclick="buttons();"><h2><i class="fas fa-arrow-circle-up"></i></h2></button>';
$pcbtn2 = '<button id="ShowButton" class="w3-btn yellow mobileHide '.$cssbtn1.'" style="display:none;" onclick="buttons2();"><h2><i class="fas fa-arrow-circle-down"></i></h2></button>';

$archivebtn = '<br /><br />
<center><button class="w3-btn '.$color." ".$cssbtn1.'" onclick="window.open('."'".$cdn."/arquivado/Pequenata 14-04-2019.html'".');"><h5 class="dark'.$colortext.'"><b><i class="fas fa-archive dark'.$colortext.'"></i> 14/04/2019</b></h5></button>';

$sitebtnname = 'Sites: <i class="fas fa-globe-americas"></i>';
$sitebtn = '<br /><a href="#sites"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'sites'".')">'.$n1.$sitebtnname.$n2.'</button><br /></a></center>';

$readerslist = "Paulo :3<br />
Mrs. Black (Lulu) :3<br />
Rafael :)<br />
Wendy :3<br />
Camila :)<br />
Carol :3<br />
Igor :3<br />
SrLucas :3<br />
ArmaArma X :)<br />
Jesus :)<br />
MelodyStar :3<br />
Saturn :)<br />
Rosella White :3<br />
Bela :3<br />
Rainbowluna :3<br />
Nicolly :3<br />
Caroline :3<br />
Luan :3<br />
FoFi_ :3<br />
G - Alex :3<br />
Lucas :3<br />
Fabsome Sweet :3<br />
Professora Tania :)<br />
Professora Zulma :)<br />
Miyu Lynx :3<br />
Koneko (Maluísa) :3<br />
Agnes :3 ❤️ 😊<br />
Thaíssa<br />
Ana - Twitter<br />
Letícia<br />";

if ($lang == 'geral') {
$lang = 'enus';
$sitename = $site;

	if ($natal == true) {
		$sitename = $site." Edição de Natal 🎄🎁";
	} 
	
	else {
		$sitename = $site;
	}

$sitetitulo = 'Pequenata - Littletato';
$siteicon = '🇺🇸';
$siteurl = $url."/".$sitefolder."/".$lang2."/";
$sitedesc = "Website about my story, ".$sitename.", made by stake2";
$capdiv = 'capen';
$capbtntext = 'Chapter';
$reading = "<b>You're reading: ".$sitename." </b>";

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
'.$sitecss.'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" />
<link rel="stylesheet" href="'.$fontawesomelink.'" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';

$descrição = '<i class="fas fa-scroll"></i> "'.$sitename.' was a potato that lived alone, she was always tripping and walking through cities, and loved to live and to see new things, one day she found another potato, and then they talked alot..." <i class="fas fa-scroll"></i><br />';

$author = 'Author';
$captext = "Chapters";
$data = "Date";
$read = 'Read story';
$readers = 'Readers';
$statustxt = 'Writing';
$comment = 'Comment';
$write = 'Write';
$stories = 'Stories';
$formnome = "Name";
$commentdesc = "Say what you think about the story";
$writedesc = "Write the Chapter";
$readersdesc = "Thanks everyone ♥";

include $globalfiles[4];

$captitle = $captext." EN-US";
$captitle_ = "<b>".$captext." EN-US: ".$siteicon."</b>";
$status = "[".$statustxt."]";

if ($lang == 'geral') {
	$lang = 'enus';
}

$titlesfile = $rootstoryfolder.$storyfolder."/CapTitles ".$lang.".txt";

$fp = @fopen($titlesfile, 'r', 'UTF-8'); 
if ($fp) {
	$titlestxt = explode("\n", fread($fp, filesize($titlesfile)));
	$titles = str_replace("^", "", $titlestxt);
}

$lang = 'geral';

include $globalfiles[2];

include $globalfiles[3];
}

if ($lang == 'enus') {
$sitename = "Littletato";

	if ($natal == true) {
		$sitename = $sitename." Christmas Edition 🎄🎁";
	} 
	
	else {
		$sitename = $sitename;
	}

$sitetitulo = $sitename." ".$lang2;
$siteicon = '🇺🇸';
$siteurl = $url."/".$sitefolder."/".$lang2."/";
$sitedesc = "Website about my story, ".$sitename.", made by stake2";
$capdiv = 'capen';
$capbtntext = 'Chapter';
$reading = "<b>You're reading: ".$sitename." </b>";

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
'.$sitecss.'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" />
<link rel="stylesheet" href="'.$fontawesomelink.'" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';

$descrição = '<i class="fas fa-scroll"></i> "'.$sitename.' was a potato that lived alone, she was always tripping and walking through cities, and loved to live and to see new things, one day she found another potato, and then they talked alot..." <i class="fas fa-scroll"></i><br />';

$author = 'Author';
$captext = "Chapters";
$data = "Date";
$read = 'Read story';
$readers = 'Readers';
$statustxt = 'Writing';
$comment = 'Comment';
$write = 'Write';
$stories = 'Stories';
$formnome = "Name";
$commentdesc = "Say what you think about the story";
$writedesc = "Write the Chapter";
$readersdesc = "Thanks everyone ♥";

include $globalfiles[4];

$captitle = $captext." ".$lang."";
$captitle_ = "<b>".$captext." ".$lang2.": 🇺🇸</b>";
$status = "[".$statustxt."]";

$titlesfile = $rootstoryfolder.$storyfolder."/CapTitles ".$lang.".txt";

$fp = @fopen($titlesfile, 'r', 'UTF-8'); 
if ($fp) {
	$titlestxt = explode("\n", fread($fp, filesize($titlesfile)));
	$titles = str_replace("^", "", $titlestxt);
}

include $globalfiles[2];

include $globalfiles[3];
}

if ($lang == 'ptbr') {
$sitename = $site;

	if ($natal == true) {
		$sitename = $sitename." Edição de Natal 🎄🎁";
	} 
	
	else {
		$sitename = $sitename;
	}

$sitetitulo = $sitename." ".$lang2;
$siteicon = '🇧🇷';
$siteurl = $url."/".$sitefolder."/".$lang2."/";
$sitedesc = "Site sobre a minha história, ".$sitename.", feito por stake2";
$capdiv = 'cappt';
$capbtntext = 'Capítulo';
$reading = "<b>Você está lendo: ".$sitename." </b>";

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
'.$sitecss.'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" />
<link rel="stylesheet" href="'.$fontawesomelink.'" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';

$descrição = '<i class="fas fa-scroll"></i> "'.$site.' era uma batata que vivia sozinha, ela estava sempre viajando e andando pelas cidades, e amava viver e ver novas coisas, um dia ela encontrou outra batata, e eles conversaram um monte..." <i class="fas fa-scroll"></i><br />';

$author = 'Autor';
$captext = "Capítulos";
$data = "Data";
$read = 'Ler história';
$readers = "Leitores";
$statustxt = 'Escrevendo';
$comment = "Comentário";
$write = "Escrever";
$stories = "Histórias";
$formnome = "Nome";
$commentdesc = "Comente o que achou da história";
$writedesc = "Escreva o capítulo";
$readersdesc = "Obrigado a todos ♥";

include $globalfiles[4];

$captitle = $captext." ".$lang."";
$captitle_ = "<b>".$captext." ".$lang2.": 🇧🇷</b>";
$status = "[".$statustxt."]";

$titlesfile = $rootstoryfolder.$storyfolder."/CapTitles ".$lang.".txt";

$fp = @fopen($titlesfile, 'r', 'UTF-8'); 
if ($fp) {
	$titlestxt = explode("\n", fread($fp, filesize($titlesfile)));
	$titles = str_replace("^", "", $titlestxt);
}
	
include $globalfiles[2];

include $globalfiles[3];
}

?>