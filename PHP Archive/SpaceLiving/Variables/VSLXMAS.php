<?php

$sitegeral = "SpaceLiving";
$siteenus = "SpaceLiving";
$siteptbr = "SpaceLiving";
$siteptbrn = "SpaceLiving Christmas Natal Edition 🎄🎁 ";
$siteenusn = "SpaceLiving Christmas Natal Edition 🎄🎁 ";
$sitefolder = "new_world/spaceliving";
$enus = "ENUS";
$ptbr = "PTBR";
$enus2 = "en-us";
$ptbr2 = "pt-br";
$enus3 = "EN-US";
$ptbr3 = "PT-BR";
$sitecssfile = "red";
$url = "https://diario.netlify.com";
$cdn = "https://diario.netlify.com/cdn";
$fontawesomelink = "https://use.fontawesome.com/releases/v5.8.2/css/all.css";

$storyfolder = $sitegeral;
$rootstoryfolder = "C:/Mega/Bloco De Notas/Effort/Historias/";

$titlesfileenus = $rootstoryfolder.$storyfolder."/CapTitles ".$enus.".txt";
$titlesfileptbr = $rootstoryfolder.$storyfolder."/CapTitles ".$ptbr.".txt";

$sitetitulogeral = $siteptbrn;
$sitetituloenus = $siteenusn.$enus3;
$sitetituloptbr = $siteptbrn.$ptbr3;
$siteurlgeral = "https://diario.netlify.com/".$sitefolder."/natal/";
$sitedescgeral = "Site sobre a minha história, ".$siteptbr.", Website about my story, ".$siteenus.", feito por - made by stake2";

$siteurlptbr = $url."/".$sitefolder."/".$ptbr2."/natal/";
$sitedescptbr = "Site sobre a minha história, ".$siteptbr.", feito por stake2";

$siteurlenus = $url."/".$sitefolder."/".$enus2."/natal/";
$sitedescenus = "Website about my story, ".$siteenus.", made by stake2";

$siteimage = $cdn."/img/".$siteptbr."logonatal.jpg";
$sitecss = '<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/'.$sitecssfile.'.css" />
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/w3.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/stories.css" />
<link rel="stylesheet" type="text/css" href="'.$cdn.'/css/Colors.css" />
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

$siteheadgeral = '
<title>'.$sitetitulogeral.'</title>
<meta charset="UTF-8" />
<meta property="og:title" content="'.$sitetitulogeral.'" />
<meta property="og:site_name" content="'.$sitetitulogeral.'" />
<link rel="canonical" href="'.$siteurlgeral.'" />
<meta property="og:url" content="'.$siteurlgeral.'" />
<link rel="icon" href="'.$siteimage.'" />
<link rel="image_src" href="'.$siteimage.'" />
<meta property="og:image" content="'.$siteimage.'" />
<meta name="description" content="'.$sitedescgeral.'" />
<meta property="og:description" content="'.$sitedescgeral.'" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />
'.$sitecss.'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" />
<link rel="stylesheet" href="'.$fontawesomelink.'" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';

$siteheadenus = '
<title>'.$sitetituloenus.'</title>
<meta charset="UTF-8" />
<meta property="og:title" content="'.$sitetituloenus.'" />
<meta property="og:site_name" content="'.$sitetituloenus.'" />
<link rel="canonical" href="'.$siteurlenus.'" />
<meta property="og:url" content="'.$siteurlenus.'" />
<link rel="icon" href="'.$siteimage.'" />
<link rel="image_src" href="'.$siteimage.'" />
<meta property="og:image" content="'.$siteimage.'" />
<meta name="description" content="'.$sitedescenus.'" />
<meta property="og:description" content="'.$sitedescenus.'" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />
'.$sitecss.'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" />
<link rel="stylesheet" href="'.$fontawesomelink.'" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';

$siteheadptbr = '
<title>'.$sitetituloptbr.'</title>
<meta charset="UTF-8" />
<meta property="og:title" content="'.$sitetituloptbr.'" />
<meta property="og:site_name" content="'.$sitetituloptbr.'" />
<link rel="canonical" href="'.$siteurlptbr.'" />
<meta property="og:url" content="'.$siteurlptbr.'" />
<link rel="icon" href="'.$siteimage.'" />
<link rel="image_src" href="'.$siteimage.'" />
<meta property="og:image" content="'.$siteimage.'" />
<meta name="description" content="'.$sitedescptbr.'" />
<meta property="og:description" content="'.$sitedescptbr.'" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />
'.$sitecss.'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" />
<link rel="stylesheet" href="'.$fontawesomelink.'" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';

$cssbtn1 = "borderbtn";
$cssbtn2 = "borderbtn2";
$cssbtn3 = "borderbtnblack2";
$text = 'w3-text-black';
$textstyle = 'w3-black w3-text-red';
$textstylenormal = 'w3-black w3-text-black';
$textstylexmas = 'w3-white w3-text-black';
$xmashr = 'darkredhr';
$sitehr = 'darkredhr';
$sitehr2 = 'blackhr';
$color = 'darkred';
$color2 = 'red';
$color3 = 'w3-red';
$color4 = 'red';
$color5 = 'red';
$bg = 'w3-black';
$bg2 = 'w3-white';
$colortext = 'w3-text-red';
$colortext2 = 'w3-text-black';
$colorsubtext = 'w3-text-white';
$text2 = 'darkpqnttext';
$border = "border";
$n1 = '<h2>';
$n2 = '</h2>';
$n3 = 'h2';
$n21 = '<h3>';
$n22 = '</h3>';
$n23 = 'h3';
$m1 = '<h4>';
$m2 = '</h4>';
$m3 = 'h4';
$h2c = '</h2>';
$h4c = '</h4>';
$bigspace = '<div class="mobileHide"><br /><br /><br /><br /><br /><br /><br /><br /></div>';
$margin = '<div style="margin:3%;">';
$margin2 = '<div style="margin-left:30%;width:40%;">';
$mobile0 = 'mobileHide';
$mobile1 = 'mobileShow';
$divmobile0 = '<div class="mobileHide">';
$divmobile1 = '<div class="mobileShow">';
$pcbutton = $color2.' '.$cssbtn1;
$mobilebutton = $color2.' '.$cssbtn1;
$h2 = '<'.$n3.' class="black '.$colortext.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;">';
$h4 = '<'.$m3.' class="black '.$colortext.'" style="margin:10%;border-width:3px;border-color:'.$color3.';border-style:solid;">';
$hstyle = 'margin:5%;';
$hstyle2 = 'margin:10%;border-width:3px;border-color:'.$color4.';border-style:solid;';
$hstyle2xmas = 'margin:10%;border-width:3px;border-color:'.$color5.';border-style:solid;';
$spanc = '</span>';
$divc = '</div>';
$h2c = '</h2>';
$h4c = '</h4>';
$widthsize = '50';
$size = 'height="'.$widthsize.'"';

$mainimage = '<img src="'.$siteimage.'" width="45%" class="mobileHide" style="border-width:3px;border-color:'.$color.';border-style:solid;" />
<img src="'.$siteimage.'" width="80%" class="mobileShow" style="border-width:3px;border-color:'.$color.';border-style:solid;" />';

$descriçãoptbr = '<i class="fas fa-scroll"></i> Descrição: "Lisa era uma menina que gostava de escrever histórias, jogar no computador e PS4, comer coisas, assistir filmes e ouvir musicas." <i class="fas fa-scroll"></i><br />';
$descriçãoenus = '<i class="fas fa-scroll"></i> Description: "Lisa was a girl that likes to write stories, play on her computer and PS4, eat things, watch movies, and listen to music." <i class="fas fa-scroll"></i><br />';

$leitoreslist = "RequeiJhon :3<br />
Passive :3<br />
adjecarry :3<br />
Mayu-chan :3<br />
Wendy :3<br />
Igor :3<br />
Guilherme :3<br />
Nicolly :3<br />
Natalia :3<br />
Marina Duda :3 😊<br />
Andressa :3 😊 ^^<br />
Professora Tania :)<br />
Professora Zulma :)<br />";

$autorptbr = "Autores";
$autorenus = 'Authors';
$autores = '<span class="w3-text-orange">Izaque Sanvezzo(stake2)</span>, <span class="w3-text-white">Julia</span>';

$dataptbr = "Data";
$dataenus = "Date";

$leitores = "13";
$leitoresptbr = "Leitores";
$leitoresenus = "Readers";
$leitoresdescptbr = "Obrigado a todos ♥";
$leitoresdescenus = "Thanks everyone ♥";

$status = "[Writing Escrevendo]";
$statusenus = "[Writing]";
$statusptbr = "[Escrevendo]";

$formtextptbr = "Qual capítulo você parou?";
$formtextenus = "Which chapter did you stop?";
$formnomeptbr = "Nome";
$formnomeenus = "Name";
$commentdescptbr = "Comente o que achou da história";
$commentdescenus = "Say what you think about the story";
$writedescptbr = "Escreva o capítulo";
$writedescenus = "Write the Chapter";

$tabenus = 'capsen';
$tabenus9 = 'capen9';
$commentenus = 'commentenus';
$writeenus = 'writeenus';
$storiesenus = 'storiesenus';
$readersenus = 'rdenus';

$enustxt = 'Read: 🇺🇸';
$enustxt9 = 'Read 9: 🇺🇸';
$commenttxtenus = 'Comment: <i class="fas fa-comments '.$colortext2.'"></i>';
$writetxtenus = 'Write: <i class="fas fa-pen '.$colortext2.'"></i>';
$storiestxtenus = 'Stories: <i class="fas fa-book '.$colortext2.'"></i>';
$readerstxtenus = 'Readers: <i class="fas fa-user-friends '.$colortext2.'"></i> ❤️ 😊';

$enus_ = $n1.$enustxt.$n2;
$enus_9 = $n1.$enustxt9.$n2;
$comment_enus = $n1.$commenttxtenus.$n2;
$write_enus = $n1.$writetxtenus.$n2;
$readers_enus = $n1.$readerstxtenus.$n2;
$stories_enus = $n1.$storiestxtenus.$n2;

$btnenus = '<a href="#'.$tabenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$tabenus."')".'">'.$enus_.'</button></a>';
$btnenus9 = '<a href="#'.$tabenus9.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$tabenus9."')".'">'.$enus_9.'</button></a>';
$commentbtnenus = '<a href="#'.$commentenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$commentenus."')".'">'.$comment_enus.'</button></a>';
$writebtnenus = '<a href="#'.$writeenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$writeenus."')".'">'.$write_enus.'</button></a>';
$storiesbtnenus = '<a href="#'.$storiesenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$storiesenus."')".'">'.$stories_enus.'</button></a>';
$readersbtnenus = '<a href="#'.$readersenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$readersenus."')".'">'.$readers_enus.'</button></a>';

$tabptbr = 'capspt';
$tabptbr9 = 'cappt9';
$commentptbr = 'commentptbr';
$writeptbr = 'writeptbr';
$storiesptbr = 'storiesptbr';
$readersptbr = 'rdptbr';

$ptbrtxt = 'Ler: 🇧🇷';
$ptbrtxt9 = 'Ler 9: 🇧🇷';
$commenttxtptbr = 'Comentário: <i class="fas fa-comments '.$colortext2.'"></i>';
$writetxtptbr = 'Escrever: <i class="fas fa-pen '.$colortext2.'"></i>';
$storiestxtptbr = 'Histórias: <i class="fas fa-book '.$colortext2.'"></i>';
$readerstxtptbr = 'Leitores: <i class="fas fa-user-friends '.$colortext2.'"></i> ❤️ 😊';

$ptbr_ = $n1.$ptbrtxt.$n2;
$ptbr_9 = $n1.$ptbrtxt9.$n2;
$comment_ptbr = $n1.$commenttxtptbr.$n2;
$write_ptbr = $n1.$writetxtptbr.$n2;
$readers_ptbr = $n1.$readerstxtptbr.$n2;
$stories_ptbr = $n1.$storiestxtptbr.$n2;

$btnptbr = '<a href="#'.$tabptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$tabptbr."')".'">'.$ptbr_.'</button></a>';
$btnptbr9 = '<a href="#'.$tabptbr9.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$tabptbr9."')".'">'.$ptbr_9.'</button></a>';
$commentbtnptbr = '<a href="#'.$commentptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$commentptbr."')".'">'.$comment_ptbr.'</button></a>';
$writebtnptbr = '<a href="#'.$writeptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$writeptbr."')".'">'.$write_ptbr.'</button></a>';
$storiesbtnptbr = '<a href="#'.$storiesptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$storiesptbr."')".'">'.$stories_ptbr.'</button></a>';
$readersbtnptbr = '<a href="#'.$readersptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$readersptbr."')".'">'.$readers_ptbr.'</button></a>';

$everybuttonenus = $btnenus."\n".$readersbtnenus."\n".$commentbtnenus."\n".$writebtnenus."\n".$storiesbtnenus;
$everybuttonptbr = $btnptbr."\n".$readersbtnptbr."\n".$commentbtnptbr."\n".$writebtnptbr."\n".$storiesbtnptbr;
$everybuttonenus9 = $btnenus9."\n".$readersbtnenus."\n".$commentbtnenus."\n".$writebtnenus."\n".$storiesbtnenus;
$everybuttonptbr9 = $btnptbr9."\n".$readersbtnptbr."\n".$commentbtnptbr."\n".$writebtnptbr."\n".$storiesbtnptbr;

$pcbtn1 = '<br /><button class="w3-btn yellow '.$cssbtn1.'" onclick="buttons();"><h2><i class="fas fa-arrow-circle-up"></i></h2></button>';
$pcbtn2 = '<button id="ShowButton" class="w3-btn yellow mobileHide '.$cssbtn1.'" style="display:none;" onclick="buttons2();"><h2><i class="fas fa-arrow-circle-down"></i></h2></button>';

$enus_m = $m1.$enustxt.$m2;
$enus_m9 = $m1.$enustxt9.$m2;
$comment_enusm = $m1.$commenttxtenus.$m2;
$write_enusm = $m1.$writetxtenus.$m2;
$readers_enusm = $m1.$readerstxtenus.$m2;
$stories_enusm = $m1.$storiestxtenus.$m2;

$ptbr_m = $m1.$ptbrtxt.$m2;
$ptbr_m9 = $m1.$ptbrtxt9.$m2;
$comment_ptbrm = $m1.$commenttxtptbr.$m2;
$write_ptbrm = $m1.$writetxtptbr.$m2;
$readers_ptbrm = $m1.$readerstxtptbr.$m2;
$stories_ptbrm = $m1.$storiestxtptbr.$m2;

$btnenusm = '<a href="#'.$tabenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$tabenus."')".'">'.$enus_m.'</button></a>';
$btnenusm9 = '<a href="#'.$tabenus9.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$tabenus9."')".'">'.$enus_m9.'</button></a>';
$commentbtnenusm = '<a href="#'.$commentenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$commentenus."')".'">'.$comment_enusm.'</button></a>';
$writebtnenusm = '<a href="#'.$writeenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$writeenus."')".'">'.$write_enusm.'</button></a>';
$storiesbtnenusm = '<a href="#'.$storiesenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$storiesenus."')".'">'.$stories_enusm.'</button></a>';
$readersbtnenusm = '<a href="#'.$readersenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$readersenus."')".'">'.$readers_enusm.'</button></a>';

$btnptbrm = '<a href="#'.$tabptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$tabptbr."')".'">'.$ptbr_m.'</button></a>';
$btnptbrm9 = '<a href="#'.$tabptbr9.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$tabptbr9."')".'">'.$ptbr_m9.'</button></a>';
$commentbtnptbrm = '<a href="#'.$commentptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$commentptbr."')".'">'.$comment_ptbrm.'</button></a>';
$writebtnptbrm = '<a href="#'.$writeptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$writeptbr."')".'">'.$write_ptbrm.'</button></a>';
$storiesbtnptbrm = '<a href="#'.$storiesptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$storiesptbr."')".'">'.$stories_ptbrm.'</button></a>';
$readersbtnptbrm = '<a href="#'.$readersptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$readersptbr."')".'">'.$readers_ptbrm.'</button></a>';

$everybuttonenusm = $btnenusm."\n".$readersbtnenusm."\n".$commentbtnenusm."\n".$writebtnenusm."\n".$storiesbtnenusm;
$everybuttonptbrm = $btnptbrm."\n".$readersbtnptbrm."\n".$commentbtnptbrm."\n".$writebtnptbrm."\n".$storiesbtnptbrm;
$everybuttonenusm9 = $btnenusm9."\n".$readersbtnenusm."\n".$commentbtnenusm."\n".$writebtnenusm."\n".$storiesbtnenusm;
$everybuttonptbrm9 = $btnptbrm9."\n".$readersbtnptbrm."\n".$commentbtnptbrm."\n".$writebtnptbrm."\n".$storiesbtnptbrm;

$mobilemenuopen = '<button id="ShowMenu" class="w3-btn '.$color2.' mobileShow border '.$cssbtn1.'" style="float:left;position:fixed;" onclick="openNav()"><h2><i class="fas fa-bars"></i></h2></button>';

$sidemenubtnsenus = '<div id="mySidenav" class="sidenav mobileShow">'."\n".'
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times-circle"></i></a>
'.$everybuttonenusm."\n".
'</div>'."\n".'
'.$mobilemenuopen;

$sidemenubtnsptbr = '<div id="mySidenav" class="sidenav mobileShow">'."\n".'
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times-circle"></i></a>
'.$everybuttonptbrm."\n".
'</div>'."\n".'
'.$mobilemenuopen;

$sidemenubtnsenus9 = '<div id="mySidenav" class="sidenav mobileShow">'."\n".'
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times-circle"></i></a>
'.$everybuttonenusm9."\n".
'</div>'."\n".'
'.$mobilemenuopen;

$sidemenubtnsptbr9 = '<div id="mySidenav" class="sidenav mobileShow">'."\n".'
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times-circle"></i></a>
'.$everybuttonptbrm9."\n".
'</div>'."\n".'
'.$mobilemenuopen;

$archivebtn = '<center><a class="w3-btn '.$color.' '.$cssbtn1.'" href="'.$cdn.'/Arquivado/spaceliving 06-04-2019"><h5><b><i class="fas fa-archive"></i> 06/04/2019</b></h5></a></center>';

$sllink = "https://diario.netlify.com/new_world/spaceliving/";
$slimglink = "https://diario.netlify.com/cdn/img/spacelivinglogo.jpg";
$lslink = "https://diario.netlify.com/Lonely%20Stories/";
$lsimglink = "https://diario.netlify.com/cdn/img/lonely.jpg";
$pqntlink = "https://diario.netlify.com/pequenata/";
$pqntimglink = "https://diario.netlify.com/cdn/img/Pequenata.jpg";

$slbg = 'sl';
$lsbg = 'darksl';
$pqntbg = 'bg';
$pqnttext = 'darkpqnttext';
$story1 = '<a class="w3-btn w3-small '.$cssbtn3.' '.$pqntbg.'" href="'.$pqntlink.'"><'.$n23.' class="'.$pqnttext.'"><b>Pequenata - Littletato</b></'.$n23.'><img src="'.$pqntimglink.'" width="450"></a>';
$story2 = '<a class="w3-btn w3-small '.$cssbtn3.' '.$slbg.'" href="'.$sllink.'"><'.$n23.' class="w3-text-blue"><b>SpaceLiving</b></'.$n23.'><img src="'.$slimglink.'" width="450"></a>';
$story3 = '<a class="w3-btn w3-small '.$cssbtn3.' '.$lsbg.'" href="'.$lslink.'"><'.$n23.' class="w3-text-gray"><b>Lonely Stories</b></'.$n23.'><img src="'.$lsimglink.'" width="450"></a>';

$story1m = '<a class="w3-btn w3-small '.$cssbtn3.' '.$pqntbg.'" href="'.$pqntlink.'"><'.$m3.' class="'.$pqnttext.'"><b>Pequenata - Littletato</b></'.$m3.'><img src="'.$pqntimglink.'" width="290" height="250"></a>';
$story2m = '<a class="w3-btn w3-small '.$cssbtn3.' '.$slbg.'" href="'.$sllink.'"><'.$m3.' class="w3-text-blue"><b>SpaceLiving</b></'.$n23.'><img src="'.$slimglink.'" width="290" height="190"><br /></a>';
$story3m = '<a class="w3-btn w3-small '.$cssbtn3.' '.$lsbg.'" href="'.$lslink.'"><'.$m3.' class="w3-text-gray"><b>Lonely Stories</b></'.$m3.'><img src="'.$lsimglink.'" width="290" height="190"></a>';

$storylinks = $story1."<br /> "
."\n".
$story2."<br /> "
."\n".
$story3;

$storylinks2 = $story1m."<br /> "
."\n".
$story2m."<br /> "
."\n".
$story3m;

$storiesenus = 'storiesenus';
$storiestxtenus = 'Stories: <i class="fas fa-book w3-text-black"></i>';
$stories_enus = $n1.$storiestxtenus.$n2;

$leitoresptbr1 = "Leitores: ";
$leitoresenus1 = "Readers: ";
$commentptbr1 = "Comentário: ";
$commentenus1 = "Comment: ";
$writeptbr1 = "Escrever: ";
$writeenus1 = "Write: ";
$storiesptbr1 = "Histórias: ";
$storiesenus1 = "Stories: ";
$commentptbr2 = "Comentário";
$commentenus2 = "Comment";
$writeptbr2 = "Escrever";
$writeenus2 = "Write";
$storiesptbr2 = "Histórias";
$storiesenus2 = "Stories";
$commenticon = '<i class="fas fa-comments '.$colortext.'"></i>';
$writeicon = '<i class="fas fa-pen '.$colortext.'"></i>';
$storiesicon = '<i class="fas fa-book '.$colortext.'"></i>';
$readersicon = '<i class="fas fa-user-friends '.$colortext.'"></i> ❤️ 😊';
$commenticon2 = '<i class="fas fa-comments '.$colortext.'"></i>';
$writeicon2 = '<i class="fas fa-pen '.$colortext.'"></i>';
$storiesicon2 = '<i class="fas fa-book '.$colortext.'"></i>';
$readersicon2 = '<i class="fas fa-user-friends '.$colortext.'"></i> ❤️ 😊';

$formnomeenus = "Name";
$formnomeptbr = "Nome";
$commentdescenus = "Say what you think about the story";
$commentdescptbr = "Comente o que achou da história";
$writedescenus = "Write the Chapter";
$writedescptbr = "Escreva o capítulo";

$formcmntenus = '<br /><b><h2 class="'.$colortext.'"><b>'.$commentenus1.$commenticon2.'</b></h2><br /><hr class="'.$sitehr.'" /><br />
<form name="spaceliving-comment" method="POST" data-netlify="true">
<span class="w3-btn '.$color.' w3-text-black"><b>'.$formnomeenus.':</b><br /><textarea type="text" name="spaceliving-name" '.$size.' class="'.$color.'"></textarea></span><br />
<span class="w3-btn '.$color.' w3-text-black"><b>'.$commentdescenus.':</b><br /><textarea type="text" name="spaceliving-comment" class="'.$color.' w3-input"></textarea>
<button type="submit" class="w3-btn w3-text-blue '.$bg.'" style="float:right;"><i class="fas fa-paper-plane"></i></button></span>
</form></b>';

$formwriteenus = '<br /><b><h2 class="'.$colortext.'"><b>'.$writeenus1.$writeicon2.'</b></h2><br /><hr class="'.$sitehr.'" /><br />
<form name="spaceliving-write" method="POST" data-netlify="true">
<span class="w3-btn '.$color.' w3-text-black"><b>'.$formnomeenus.':</b><br /><textarea type="text" name="spaceliving-name" '.$size.' class="'.$color.'"></textarea></span><br />
<span class="w3-btn '.$color.' w3-text-black"><b>'.$writedescenus.':</b><br /><textarea type="text" name="spaceliving-write" class="'.$color.' w3-input"></textarea>
<button type="submit" class="w3-btn w3-text-blue '.$bg.'" style="float:right;"><i class="fas fa-paper-plane"></i></button></span>
</form></b>';

$formcmntptbr = '<br /><b><h2 class="'.$colortext.'"><b>'.$commentptbr1.$commenticon2.'</b></h2><br /><hr class="'.$sitehr.'" /><br />
<form name="spaceliving-comment" method="POST" data-netlify="true">
<span class="w3-btn '.$color.' w3-text-black"><b>'.$formnomeptbr.':</b><br /><textarea type="text" name="spaceliving-name" '.$size.' class="'.$color.'"></textarea></span><br />
<span class="w3-btn '.$color.' w3-text-black"><b>'.$commentdescptbr.':</b><br /><textarea type="text" name="spaceliving-comment" class="'.$color.' w3-input"></textarea>
<button type="submit" class="w3-btn w3-text-blue '.$bg.'" style="float:right;"><i class="fas fa-paper-plane"></i></button></span>
</form></b>';

$formwriteptbr = '<br /><b><h2 class="'.$colortext.'"><b>'.$writeptbr1.$writeicon2.'</b></h2><br /><hr class="'.$sitehr.'" /><br />
<form name="spaceliving-write" method="POST" data-netlify="true">
<span class="w3-btn '.$color.' w3-text-black"><b>'.$formnomeptbr.':</b><br /><textarea type="text" name="spaceliving-name" '.$size.' class="'.$color.'"></textarea></span><br />
<span class="w3-btn '.$color.' w3-text-black"><b>'.$writedescptbr.':</b><br /><textarea type="text" name="spaceliving-write" class="'.$color.' w3-input"></textarea>
<button type="submit" class="w3-btn w3-text-blue '.$bg.'" style="float:right;"><i class="fas fa-paper-plane"></i></button></span>
</form></b>';

$capitulos = "13";
$ultimocap = str_replace('"', "", $capitulos);
$captextenus = "Chapters";
$captextptbr = "Capítulos";
$captitleenus = $captextenus." ".$enus."";
$captitleptbr = $captextptbr." ".$ptbr."";
$captitle_enus = "<b>".$captextenus." ".$enus3.": 🇺🇸</b>";
$captitle_ptbr = "<b>".$captextptbr." ".$ptbr3.": 🇧🇷</b>";

$titulo1 = 9;
$titulo2 = 9;
$tituloultimo = $ultimocap + 1;

$fp = @fopen($titlesfileenus, 'r', 'UTF-8'); 
if ($fp) {
   $titulostxtenus = explode("\n", fread($fp, filesize($titlesfileenus)));
   $titulosenus = str_replace("^", "", $titulostxtenus);
}

$fp2 = @fopen($titlesfileptbr, 'r', 'UTF-8'); 
if ($fp2) {
   $titulostxtptbr = explode("\n", fread($fp2, filesize($titlesfileptbr)));
   $titulosptbr = str_replace("^", "", $titulostxtptbr);
}

$capnum4 = 4;
$ultimocap2en = ' <i class="fas fa-book"></i> <span class="w3-text-gray">"'.$titulosenus[$capnum4].'"</span>';
$ultimocap2pt = ' <i class="fas fa-book"></i> <span class="w3-text-gray">"'.$titulosptbr[$capnum4].'"</span>';

?>