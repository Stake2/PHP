<?php

$sitetitle = "Diário";
$sitetitleptbr = "Diário PT-BR";
$sitetitleenus = "Diário EN-US";
$siteurl = "https://diario.netlify.com/";
#$urlpt = "https://diario.netlify.com/pequenata/pt-br/";
#$urlen = "https://diario.netlify.com/pequenata/en-us";
$siteimage = "https://diario.netlify.com/cdn/img/Diario 2.png";
$sitedesc = "Site para mostrar o meu diario em forma de HTML, feito por stake2";
#$descptbr = "Site sobre a minha história, Pequenata, feito por stake2";
#$descenus = "Website about my story, Littletato, made by stake2";

$sitecss = '<link rel="stylesheet" type="text/css" href="https://diario.netlify.com/cdn/css/pocb.css" />
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css" />
<link rel="stylesheet" type="text/css" href="https://diario.netlify.com/cdn/css/w3.css" />
<link rel="stylesheet" type="text/css" href="https://diario.netlify.com/cdn/css/colors.css" />
<link rel="stylesheet" type="text/css" href="https://diario.netlify.com/cdn/css/imghover.css" />
';

$sitejs = '<script src="https://diario.netlify.com/cdn/js/hora.js"></script>
<script src="https://diario.netlify.com/cdn/js/tabs.js"></script>
<script src="https://diario.netlify.com/cdn/js/ShowHide.js"></script>
<script src="https://diario.netlify.com/cdn/js/sidemenu.js"></script>
<script src="https://diario.netlify.com/cdn/js/js.js"></script>
';

$cssbtn1 = "borderbtn";
$cssbtn2 = "borderbtn2";
$cssbtn3 = "borderbtnblack2";
$text = 'pqnttext';
$textstyle = 'w3-text-black white';
$xmashr = 'redhr';
$sitehr = 'blackhr';
$sitehr2 = '';
$color = 'grey';
$color2 = 'grey';
$colortext = 'w3-text-white';
$colorsubtext = 'w3-text-orange';

$leitoresptbr1 = "Leitores: ";
$leitoresenus1 = "Readers: ";
$commentptbr = "Comentário: ";
$commentenus = "Comment: ";
$commentptbr2 = "Comentário";
$commentenus2 = "Comment";
$writeptbr = "Escrever: ";
$writeenus = "Write: ";
$writeptbr2 = "Escrever";
$writeenus2 = "Write";
$dataptbr = "Data";
$dataenus = "Date";
$blocktitleptbr = "Blocks PT-BR";
$blocktitleenus = "Blocks EN-US";
$chartitleptbr = "Personagens";
$chartitleenus = "Characters";
$readingen = "<b>You're reading: Diário </b>";
$readingpt = "<b>Você está lendo: Diário </b>";

$btn = '<a href="#blocks" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'blocks')".'"><h2>Ler Diário: 🇧🇷</h2></button></a>'."\n";
$sitebtn = '<a href="#sites" onclick="closeNav()"><button class="w3-btn yellow '.$cssbtn1.'" onclick="openCity('."'sites')".'"><h2><i class="fas fa-globe-americas"></i></h2></button></a>'."\n";
$charsbtn = '<a href="#chars"><button class="w3-btn grey w3-text-black '.$cssbtn1.'" onclick="openCity('."'chars'".')"><h2><i class="fas fa-id-card"></i></h2></button></a>'."\n";
$btn1 = '<br /><button class="w3-btn yellow '.$cssbtn1.'" onclick="buttons();"><h2><i class="fas fa-arrow-circle-up"></i></h2></button>'."\n";
$btn2 = '<button id="ShowButton" class="w3-btn yellow mobileHide '.$cssbtn1.'" style="display:none;" onclick="buttons2();"><h2><i class="fas fa-arrow-circle-down"></i></h2></button>'."\n";
$menuopen = '<button id="ShowMenu" class="w3-btn '.$color2.' mobileShow border '.$cssbtn1.'" style="float:left;position:fixed;" onclick="openNav()"><h2><i class="fas fa-bars"></i></h2></button>'."\n";

$everybutton = $btn.''.$charsbtn.''.$sitebtn.'';

$sidemenubtns = '<div id="mySidenav" class="sidenav mobileShow">
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times-circle"></i></a>
'.$everybutton.
'</div>

'.$menuopen;

$mainimage = '<img src="https://diario.netlify.com/cdn/img/Diario 2.png" class="mobileHide" width="20%" style="border-width:3px;border-color:grey;border-style:solid;" />';
$mainimagem = '<img src="https://diario.netlify.com/cdn/img/Diario 2.png" class="mobileShow" width="66%" style="border-width:3px;border-color:grey;border-style:solid;" />';

$descriçãoptbr = '<i class="fas fa-scroll"></i> "Pequenata era uma batata que vivia sozinha, ela estava sempre viajando e andando pelas cidades, e amava viver e ver novas coisas, um dia ela encontrou outra batata, e eles conversaram um monte..." <i class="fas fa-scroll"></i><br />';
$descriçãoenus = '<i class="fas fa-scroll"></i> "Littletato was a potato that lived alone, she was always tripping and walking through cities, and loved to live and to see new things, one day she found another potato, and then they talked alot..." <i class="fas fa-scroll"></i><br />';

$blocks = 118;
$currentblocks = 54;

?>