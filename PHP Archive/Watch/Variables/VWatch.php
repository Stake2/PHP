<?php 

$enus = 'ENUS';
$ptbr = 'PTBR';

$sitetitulogeral = "Watch History";
$sitetituloenus = "Watch History EN-US";
$sitetituloptbr = "Watch History PT-BR";
$sitefoldername = "watch";

$siteurlgeral = "https://diario.netlify.com/".$sitefoldername."/";
$siteurlenus = "https://diario.netlify.com/".$sitefoldername."/en-us";
$siteurlptbr = "https://diario.netlify.com/".$sitefoldername."/pt-br/";

$siteimg = "https://diario.netlify.com/cdn/img/WH.png";
$sitedescgeral = "Site pra mostrar videos, animes, séries, filmes que assisti e videos que eu vou assistir, feito por stake2, Website to show videos, animes, series, movies that I watched and that I will watch, made by stake2.";

$sitedescenus = "Website to show videos, animes, series, movies that I watched and that I will watch, made by stake2.";
$sitedescptbr = "Site pra mostrar videos, animes, séries, filmes que assisti e videos que eu vou assistir, feito por stake2.";
$sitecss = '<link rel="stylesheet" type="text/css" href="https://diario.netlify.com/cdn/css/watch.css" />
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css" />
<link rel="stylesheet" type="text/css" href="https://diario.netlify.com/cdn/css/w3.css" />
<link rel="stylesheet" type="text/css" href="https://diario.netlify.com/cdn/css/Colors.css" />
<link rel="stylesheet" type="text/css" href="https://diario.netlify.com/cdn/css/stories.css" />
<link rel="stylesheet" type="text/css" href="https://diario.netlify.com/cdn/css/mobile.css" />
<link rel="stylesheet" type="text/css" href="https://diario.netlify.com/cdn/css/imghover.css" />'.
"\n";
$sitejs = '<script src="https://diario.netlify.com/cdn/js/myFunction.js"></script>
<script src="https://diario.netlify.com/cdn/js/tabs.js"></script>
<script src="https://diario.netlify.com/cdn/js/ShowHide.js"></script>
<script src="https://diario.netlify.com/cdn/js/sidemenu.js"></script>
<script src="https://diario.netlify.com/cdn/js/redirect.js" onLoad="rodar();"></script>
<script src="https://diario.netlify.com/cdn/js/js.js"></script>'.
"\n";
date_default_timezone_set("America/Sao_Paulo");
$data = date("d/m/Y");
$ano = 2020;
$anos = array('2018', '2019', '2020');

$watched2020textfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[2]."/Watched".$anos[2].".txt";
$watched2020timefile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[2]."/Watched".$anos[2]."time.txt";
$watched2020mediatypeptbrfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[2]."/Watched".$anos[2]."MediaTypePTBR.txt";
$watched2020mediatypeenusfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[2]."/Watched".$anos[2]."MediaTypeENUS.txt";
$watched2018textfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[0]."/Watched".$anos[0].".txt";
$watched2018timefile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[0]."/Watched".$anos[0]."time.txt";
$watched2018mediatypeenusfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[0]."/Watched".$anos[0]."MediaTypeENUS.txt";
$watched2018mediatypeptbrfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[0]."/Watched".$anos[0]."MediaTypePTBR.txt";
$watched2019textfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[1]."/Watched".$anos[1].".txt";
$watched2019timefile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[1]."/Watched".$anos[1]."time.txt";
$watched2019mediatypeenusfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[1]."/Watched".$anos[1]."MediaTypeENUS.txt";
$watched2019mediatypeptbrfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/".$anos[1]."/Watched".$anos[1]."MediaTypePTBR.txt";
$watchedmoviestextfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/WatchedMovies.txt";
$watchedmoviestimefile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/WatchedMoviestime.txt";
$twfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/ToWatch.txt";
$twstatusfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/ToWatchStatus.txt";
$twmediafile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/ToWatchMedia.txt";
$twmediatypeenusfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/ToWatchMediaTypeENUS.txt";
$twmediatypeptbrfile = "C:/Mega/Bloco De Notas/Effort/Networks/Media Network/Watch History/ToWatchMediaTypePTBR.txt";

$siteheadgeral = '
<title>'.$sitetitulogeral.'</title>
<meta charset="UTF-8" />
<meta property="og:title" content="'.$sitetitulogeral.'" />
<meta property="og:site_name" content="'.$sitetitulogeral.'" />
<link rel="canonical" href="'.$siteurlgeral.'" />
<meta property="og:url" content="'.$siteurlgeral.'" />
<link rel="icon" href="'.$siteimg.'" />
<link rel="image_src" href="'.$siteimg.'" />
<meta property="og:image" content="'.$siteimg.'" />
<meta name="description" content="'.$sitedescgeral.'" />
<meta property="og:description" content="'.$sitedescgeral.'" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />
'.$sitecss.'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';

$siteheadenus = '
<title>'.$sitetituloenus.'</title>
<meta charset="UTF-8" />
<meta property="og:title" content="'.$sitetituloenus.'" />
<meta property="og:site_name" content="'.$sitetituloenus.'" />
<link rel="canonical" href="'.$siteurlenus.'" />
<meta property="og:url" content="'.$siteurlenus.'" />
<link rel="icon" href="'.$siteimg.'" />
<link rel="image_src" href="'.$siteimg.'" />
<meta property="og:image" content="'.$siteimg.'" />
<meta name="description" content="'.$sitedescenus.'" />
<meta property="og:description" content="'.$sitedescenus.'" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />
'.$sitecss.'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';

$siteheadptbr = '
<title>'.$sitetituloptbr.'</title>
<meta charset="UTF-8" />
<meta property="og:title" content="'.$sitetituloptbr.'" />
<meta property="og:site_name" content="'.$sitetituloptbr.'" />
<link rel="canonical" href="'.$siteurlptbr.'" />
<meta property="og:url" content="'.$siteurlptbr.'" />
<link rel="icon" href="'.$siteimg.'" />
<link rel="image_src" href="'.$siteimg.'" />
<meta property="og:image" content="'.$siteimg.'" />
<meta name="description" content="'.$sitedescptbr.'" />
<meta property="og:description" content="'.$sitedescptbr.'" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />
'.$sitecss.'<meta name="revised" content="'."Stake's Enterprisetm".', '.$data.'" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />';

$cssbtn1 = "borderbtn";
$cssbtn2 = "borderbtn2";
$cssbtn3 = "borderbtnblack2";
$cssbtn4 = "borderbtn3";
$text = 'w3-text-white';
$textstyle = 'w3-black w3-text-white';
$sitehr = 'slhr';
$color1 = 'black';
$color2 = 'blue';
$color3 = 'white';
$color4 = 'yellow';
$colortext = 'w3-text-white';
$colorsubtext = 'w3-text-orange';
$darkcolortext = 'darkpqnttext';
$btnstyle = $color2.' '.$cssbtn1;
$tw = 'tw';
$w = 'w';
$n1 = '<h2>';
$n2 = '</h2>';
$n3 = 'h2';
$m1 = '<h4>';
$m2 = '</h4>';
$m3 = 'h4';
$m21 = '<h6>';
$m22 = '</h6>';
$m23 = 'h6';
$h2c = '</h2>';
$h4c = '</h4>';
$h6c = '</h6>';
$n = 'h2';
$m = 'h4';
$h2c = '</h2>';
$h4c = '</h4>';
$h42 = '<'.$m.' class="'.$textstyle.'" style="margin:10%;border-width:3px;border-color:white;border-style:solid;">';
$div3 = 'div';
$bigspace = '<div class="mobileHide"><br /><br /><br /><br /><br /><br /><br /><br /></div>';
$margin = '<div style="margin:10%;background-color:black;border-width:3px;border-color:'.$color3.';border-style:solid;">';
$margin2 = '<div style="margin:10%;background-color:black;border-width:3px;border-color:'.$color2.';border-style:solid;">';
$margin3 = '<div style="margin:6%;">';
$margincss1 = 'margin-left:11%;margin-right:11%;';
$margincss2 = 'margin-left:10%;margin-right:10%;';
$margincss3 = 'margin-left:5%;margin-right:5%;';
$mobile0 = 'mobileHide';
$mobile1 = 'mobileShow';
$divmobile0 = '<div class="mobileHide">';
$divmobile1 = '<div class="mobileShow">';
$pcbutton = $color2.' '.$cssbtn1;
$mobilebutton = $color2.' '.$cssbtn1;
$marginnumber = '2%';
$h2 = '<'.$n3.' class="'.$colortext.'">';
$h4 = '<'.$m3.' class="'.$colortext.'">';
$spanc = '</span>';
$divc = '</div>';
$h2c = '</h2>';
$h4c = '</h4>';
$widthsize = '50';
$size = 'height="'.$widthsize.'"';
$border = 'border-width:4px;border-color:'.$color2.';border-style:solid;';

$sitebtnicon = '<i class="fas fa-globe-americas"></i>';
$sitebtnname = 'Sites: ';
$sitebtn = '<center><a href="#sites"><button class="w3-btn '.$btnstyle.'" onclick="openCity('."'sites'".')">'.$n1.$sitebtnname.$sitebtnicon.$n2.'</button><br /></a></center>';
$sitesbtnphp = $sitephpfolder.$global."/".$folder1."/"."SitesBTN.php";

$moviesnumber = 0;
$handle = fopen ($watchedmoviestextfile, "r");
while (!feof ($handle)){
  $line = fgets ($handle);
  $moviesnumber++;
}

$watched2018number = 0;
$handle = fopen ($watched2018textfile, "r");
while (!feof ($handle)){
  $line = fgets ($handle);
  $watched2018number++;
}

$watched2019number = 0;
$handle = fopen ($watched2019textfile, "r");
while (!feof ($handle)){
  $line = fgets ($handle);
  $watched2019number++;
}

$watched2020number = 0;
$handle = fopen ($watched2020textfile, "r");
while (!feof ($handle)){
  $line = fgets ($handle);
  $watched2020number++;
}

$twnumber = 0;
$handle = fopen ($twfile, "r");
while (!feof ($handle)){
  $line = fgets ($handle);
  $twnumber++;
}

$watchednumb2018file = $watched2018number - 1;
$watchednumb2018filetext = $watched2018number;
$watchednumb2018 = $watchednumb2018filetext;
$watchednumb2019file = $watched2019number - 1;
$watchednumb2019filetext = $watched2019number;
$watchednumb2019 = $watchednumb2019filetext;
$watchednumb2020file = $watched2020number - 1;
$watchednumb2020filetext = $watched2020number;
$twnumbfile = $twnumber - 1;
$twnumbfiletext = $twnumber;
$towatchnumb = $twnumbfiletext;
$watchednumb2020 = $watchednumb2020filetext;
$watchedmoviesnumbfile = $moviesnumber - 1;
$watchedmoviesnumbfiletext = $moviesnumber;
$moviesnumb = $watchedmoviesnumbfiletext;
$archnumb = 2;
$linknumb = 6;
$watchednumbtext = $watchednumb2020filetext;
$everywatchednumb = $watchednumb2020filetext + $watchednumb2019filetext + $watchednumb2018filetext;
$watchednumb2018array = array(2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51);
$watchednumb2018timearray = array(1, 9, 10, 11, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 46, 47, 48, 49, 50, 51);
$watchedmovie2018numbarray = array(0, 1, 3, 33, 23, 81, 148, 164);
$watchedmovie2018timenumbarray = array(1, 4, 5, 6 , 7);
$watchedmovie2019numbarray = array(23, 81, 148, 164);
$watchedmovienumbarray = array(0, 1, 3, 33, 23, 81, 148, 164);
$watchedmovietimenumbarray = array(1, 4, 5, 6, 7);
$watchedmoviecommentarray = array(1, 4, 5, 6, 7);

$watchedenus = 'watchedenus';
$movieenus = 'mvenus';
$archenus = 'archenus';
$e2018enus = 'arch'.$anos[0]."enus";
$e2019enus = 'arch'.$anos[1]."enus";
$e2020enus = 'arch'.$anos[2]."enus";
$towatchenus = 'towatchenus';
$linkenus = 'linkenus';

$watchedptbr = 'watchedptbr';
$movieptbr = 'mvptbr';
$archptbr = 'archptbr';
$e2018ptbr = 'arch'.$anos[0]."ptbr";
$e2019ptbr = 'arch'.$anos[1]."ptbr";
$e2020ptbr = 'arch'.$anos[2]."ptbr";
$towatchptbr = 'towatchptbr';
$linkptbr = 'linkptbr';

$watchedenusm = 'watchedenusm';
$movieenusm = 'mvenusm';
$archenusm = 'archenusm';
$e2018enusm = 'arch'.$anos[0]."enusm";
$e2019enusm = 'arch'.$anos[1]."enusm";
$e2020enusm = 'arch'.$anos[2]."enusm";
$towatchenusm = 'towatchenusm';
$linkenusm = 'linkenusm';

$watchedptbrm = 'watchedptbrm';
$movieptbrm = 'mvptbrm';
$archptbrm = 'archptbrm';
$e2018ptbrm = 'arch'.$anos[0]."ptbrm";
$e2019ptbrm = 'arch'.$anos[1]."ptbrm";
$e2020ptbrm = 'arch'.$anos[2]."ptbrm";
$towatchptbrm = 'towatchptbrm';
$linkptbrm = 'linkptbrm';

$watchedtxtenus = 'Watched '.$ano.' ['.$watchednumbtext.']: <i class="fas fa-eye"></i>';
$movietxtenus = 'Movies ['.$watchedmoviesnumbfiletext.']: <i class="fas fa-film"></i>';
$archtxtenus = 'Archived Media ['.$archnumb.']: <i class="fas fa-archive"></i>';
$e2018txtenus = 'Archived '.$anos[0].' ['.$watchednumb2018filetext.']: <i class="fas fa-archive"></i>';
$e2019txtenus = 'Archived '.$anos[1].' ['.$watchednumb2019filetext.']: <i class="fas fa-archive"></i>';
$e2020txtenus = 'Archived '.$anos[2].' ['.$watchednumb2020filetext.']: <i class="fas fa-archive"></i>';
$towatchtxtenus = 'To Watch ['.$towatchnumb.']: <i class="fas fa-play"></i>';

$watchedtxtptbr = 'Assistidos '.$ano.' ['.$watchednumbtext.']: <i class="fas fa-eye"></i>';
$movietxtptbr = 'Filmes ['.$watchedmoviesnumbfiletext.']: <i class="fas fa-film"></i>';
$archtxtptbr = 'Mídias Arquivadas ['.$archnumb.']: <i class="fas fa-archive"></i>';
$e2018txtptbr = 'Arquivado '.$anos[0].' ['.$watchednumb2018filetext.']: <i class="fas fa-archive"></i>';
$e2019txtptbr = 'Arquivado '.$anos[1].' ['.$watchednumb2019filetext.']: <i class="fas fa-archive"></i>';
$e2020txtptbr = 'Arquivado '.$anos[2].' ['.$watchednumb2020filetext.']: <i class="fas fa-archive"></i>';
$towatchtxtptbr = 'Para Assistir ['.$towatchnumb.']: <i class="fas fa-play"></i>';
$linktxt = 'Links ['.$linknumb.']: <i class="fas fa-globe"></i>';

$watched_enus = $n1.$watchedtxtenus.$n2;
$movie_enus = $n1.$movietxtenus.$n2;
$arch_enus = $n1.$archtxtenus.$n2;
$e2018_enus = $n1.$e2018txtenus.$n2;
$e2019_enus = $n1.$e2019txtenus.$n2;
$e2020_enus = $n1.$e2020txtenus.$n2;
$towatch_enus = $n1.$towatchtxtenus.$n2;
$watched_ptbr = $n1.$watchedtxtptbr.$n2;
$movie_ptbr = $n1.$movietxtptbr.$n2;
$arch_ptbr = $n1.$archtxtptbr.$n2;
$e2018_ptbr = $n1.$e2018txtptbr.$n2;
$e2019_ptbr = $n1.$e2019txtptbr.$n2;
$e2020_ptbr = $n1.$e2020txtptbr.$n2;
$towatch_ptbr = $n1.$towatchtxtptbr.$n2;
$link_ = $n1.$linktxt.$n2;

$watched_ptbr = $n1.$watchedtxtptbr.$n2;
$movie_ptbr = $n1.$movietxtptbr.$n2;
$arch_ptbr = $n1.$archtxtptbr.$n2;
$e2018_ptbr = $n1.$e2018txtptbr.$n2;
$e2019_ptbr = $n1.$e2019txtptbr.$n2;
$e2020_ptbr = $n1.$e2020txtptbr.$n2;
$towatch_ptbr = $n1.$towatchtxtptbr.$n2;
$watched_ptbr = $n1.$watchedtxtptbr.$n2;
$movie_ptbr = $n1.$movietxtptbr.$n2;
$arch_ptbr = $n1.$archtxtptbr.$n2;
$e2018_ptbr = $n1.$e2018txtptbr.$n2;
$e2019_ptbr = $n1.$e2019txtptbr.$n2;
$e2020_ptbr = $n1.$e2020txtptbr.$n2;
$towatch_ptbr = $n1.$towatchtxtptbr.$n2;
$link_ = $n1.$linktxt.$n2;

$watched_enusm = $m1.$watchedtxtenus.$m2;
$movie_enusm = $m1.$movietxtenus.$m2;
$arch_enusm = $m1.$archtxtenus.$m2;
$e2018_enusm = $m1.$e2018txtenus.$m2;
$e2019_enusm = $m1.$e2019txtenus.$m2;
$e2020_enusm = $m1.$e2020txtenus.$m2;
$towatch_enusm = $m1.$towatchtxtenus.$m2;
$watched_ptbrm = $m1.$watchedtxtptbr.$m2;
$movie_ptbrm = $m1.$movietxtptbr.$m2;
$arch_ptbrm = $m1.$archtxtptbr.$m2;
$e2018_ptbrm = $m1.$e2018txtptbr.$m2;
$e2019_ptbrm = $m1.$e2019txtptbr.$m2;
$e2020_ptbrm = $m1.$e2020txtptbr.$m2;
$towatch_ptbrm = $m1.$towatchtxtptbr.$m2;
$link_m = $m1.$linktxt.$m2;

$watched_ptbrm = $m1.$watchedtxtptbr.$m2;
$movie_ptbrm = $m1.$movietxtptbr.$m2;
$arch_ptbrm = $m1.$archtxtptbr.$m2;
$e2018_ptbrm = $m1.$e2018txtptbr.$m2;
$e2019_ptbrm = $m1.$e2019txtptbr.$m2;
$e2020_ptbrm = $m1.$e2020txtptbr.$m2;
$towatch_ptbrm = $m1.$towatchtxtptbr.$m2;
$watched_ptbrm = $m1.$watchedtxtptbr.$m2;
$movie_ptbrm = $m1.$movietxtptbr.$m2;
$arch_ptbrm = $m1.$archtxtptbr.$m2;
$e2018_ptbrm = $m1.$e2018txtptbr.$m2;
$e2019_ptbrm = $m1.$e2019txtptbr.$m2;
$e2020_ptbrm = $m1.$e2020txtptbr.$m2;
$towatch_ptbrm = $m1.$towatchtxtptbr.$m2;
$link_m = $m1.$linktxt.$m2;

$watchedbtnenus = '<a href="#'.$watchedenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$watchedenus."')".'">'.$watched_enus.'</button></a>';
$moviebtnenus = '<a href="#'.$movieenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$movieenus."')".'">'.$movie_enus.'</button></a>';
$archbtnenus = '<a href="#'.$archenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$archenus."')".'">'.$arch_enus.'</button></a>';
$e2018btnenus = '<a href="#'.$e2018enus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2018enus."')".'">'.$e2018_enus.'</button></a>';
$e2019btnenus = '<a href="#'.$e2019enus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2019enus."')".'">'.$e2019_enus.'</button></a>';
$e2020btnenus = '<a href="#'.$e2020enus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2020enus."')".'">'.$e2020_enus.'</button></a>';
$towatchbtnenus = '<a href="#'.$towatchenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$towatchenus."')".'">'.$towatch_enus.'</button></a>';
$linkbtnenus = '<a href="#'.$linkenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$linkenus."')".'">'.$link_.'</button></a>';

$watchedbtnptbr = '<a href="#'.$watchedptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$watchedptbr."')".'">'.$watched_ptbr.'</button></a>';
$moviebtnptbr = '<a href="#'.$movieptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$movieptbr."')".'">'.$movie_ptbr.'</button></a>';
$archbtnptbr = '<a href="#'.$archptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$archptbr."')".'">'.$arch_ptbr.'</button></a>';
$e2018btnptbr = '<a href="#'.$e2018ptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2018ptbr."')".'">'.$e2018_ptbr.'</button></a>';
$e2019btnptbr = '<a href="#'.$e2019ptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2019ptbr."')".'">'.$e2019_ptbr.'</button></a>';
$e2020btnptbr = '<a href="#'.$e2020ptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2020ptbr."')".'">'.$e2020_ptbr.'</button></a>';
$towatchbtnptbr = '<a href="#'.$towatchptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$towatchptbr."')".'">'.$towatch_ptbr.'</button></a>';
$linkbtnptbr = '<a href="#'.$linkptbr.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$linkptbr."')".'">'.$link_.'</button></a>';

$watchedbtnenusm = '<a href="#'.$watchedenusm.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$watchedenusm."')".'">'.$watched_enusm.'</button></a>';
$moviebtnenusm = '<a href="#'.$movieenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$movieenus."')".'">'.$movie_enusm.'</button></a>';
$archbtnenusm = '<a href="#'.$archenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$archenus."')".'">'.$arch_enusm.'</button></a>';
$e2018btnenusm = '<a href="#'.$e2018enus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2018enus."')".'">'.$e2018_enusm.'</button></a>';
$e2019btnenusm = '<a href="#'.$e2019enus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2019enus."')".'">'.$e2019_enusm.'</button></a>';
$e2020btnenusm = '<a href="#'.$e2020enus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2020enus."')".'">'.$e2020_enusm.'</button></a>';
$towatchbtnenusm = '<a href="#'.$towatchenusm.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$towatchenusm."')".'">'.$towatch_enusm.'</button></a>';
$linkbtnenusm = '<a href="#'.$linkenus.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$linkenus."')".'">'.$link_m.'</button></a>';

$watchedbtnptbrm = '<a href="#'.$watchedptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$watchedptbrm."')".'">'.$watched_ptbrm.'</button></a>';
$moviebtnptbrm = '<a href="#'.$movieptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$movieptbrm."')".'">'.$movie_ptbrm.'</button></a>';
$archbtnptbrm = '<a href="#'.$archptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$archptbrm."')".'">'.$arch_ptbrm.'</button></a>';
$e2018btnptbrm = '<a href="#'.$e2018ptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2018ptbrm."')".'">'.$e2018_ptbrm.'</button></a>';
$e2019btnptbrm = '<a href="#'.$e2019ptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2019ptbrm."')".'">'.$e2019_ptbrm.'</button></a>';
$e2020btnptbrm = '<a href="#'.$e2020ptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$e2020ptbrm."')".'">'.$e2020_ptbrm.'</button></a>';
$towatchbtnptbrm = '<a href="#'.$towatchptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$towatchptbrm."')".'">'.$towatch_ptbrm.'</button></a>';
$linkbtnptbrm = '<a href="#'.$linkptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color2.' '.$cssbtn1.'" onclick="openCity('."'".$linkptbrm."')".'">'.$link_m.'</button></a>';

$watchedbtnenusy = '<a href="#'.$watchedenus.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$watchedenus."')".'">'.$watched_enus.'</button></a>';
$moviebtnenusy = '<a href="#'.$movieenus.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$movieenus."')".'">'.$movie_enus.'</button></a>';
$archbtnenusy = '<a href="#'.$archenus.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$archenus."')".'">'.$arch_enus.'</button></a>';
$e2018btnenusy = '<a href="#'.$e2018enus.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2018enus."')".'">'.$e2018_enus.'</button></a>';
$e2019btnenusy = '<a href="#'.$e2019enus.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2019enus."')".'">'.$e2019_enus.'</button></a>';
$e2020btnenusy = '<a href="#'.$e2020enus.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2020enus."')".'">'.$e2020_enus.'</button></a>';
$towatchbtnenusy = '<a href="#'.$towatchenus.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$towatchenus."')".'">'.$towatch_enus.'</button></a>';
$linkbtnenusy = '<a href="#'.$linkenus.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$linkenus."')".'">'.$link_.'</button></a>';

$watchedbtnptbry = '<a href="#'.$watchedptbr.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$watchedptbr."')".'">'.$watched_ptbr.'</button></a>';
$moviebtnptbry = '<a href="#'.$movieptbr.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$movieptbr."')".'">'.$movie_ptbr.'</button></a>';
$archbtnptbry = '<a href="#'.$archptbr.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$archptbr."')".'">'.$arch_ptbr.'</button></a>';
$e2018btnptbry = '<a href="#'.$e2018ptbr.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2018ptbr."')".'">'.$e2018_ptbr.'</button></a>';
$e2019btnptbry = '<a href="#'.$e2019ptbr.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2019ptbr."')".'">'.$e2019_ptbr.'</button></a>';
$e2020btnptbry = '<a href="#'.$e2020ptbr.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2020ptbr."')".'">'.$e2020_ptbr.'</button></a>';
$towatchbtnptbry = '<a href="#'.$towatchptbr.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$towatchptbr."')".'">'.$towatch_ptbr.'</button></a>';
$linkbtnptbry = '<a href="#'.$linkptbr.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$linkptbr."')".'">'.$link_.'</button></a>';

$watchedbtnenusym = '<a href="#'.$watchedenusm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$watchedenusm."')".'">'.$watched_enusm.'</button></a>';
$moviebtnenusym = '<a href="#'.$movieenusm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$movieenusm."')".'">'.$movie_enusm.'</button></a>';
$archbtnenusym = '<a href="#'.$archenusm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$archenus."')".'">'.$arch_enusm.'</button></a>';
$e2018btnenusym = '<a href="#'.$e2018enusm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2018enusm."')".'">'.$e2018_enusm.'</button></a>';
$e2019btnenusym = '<a href="#'.$e2019enusm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2019enusm."')".'">'.$e2019_enusm.'</button></a>';
$e2020btnenusym = '<a href="#'.$e2020enusm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2020enusm."')".'">'.$e2020_enusm.'</button></a>';
$towatchbtnenusym = '<a href="#'.$towatchenusm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$towatchenusm."')".'">'.$towatch_enusm.'</button></a>';
$linkbtnenusym = '<a href="#'.$linkenusm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$linkenus."')".'">'.$link_m.'</button></a>';

$watchedbtnptbrym = '<a href="#'.$watchedptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$watchedptbrm."')".'">'.$watched_ptbrm.'</button></a>';
$moviebtnptbrym = '<a href="#'.$movieptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$movieptbrm."')".'">'.$movie_ptbrm.'</button></a>';
$archbtnptbrym = '<a href="#'.$archptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$archptbrm."')".'">'.$arch_ptbrm.'</button></a>';
$e2018btnptbrym = '<a href="#'.$e2018ptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2018ptbrm."')".'">'.$e2018_ptbrm.'</button></a>';
$e2019btnptbrym = '<a href="#'.$e2019ptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2019ptbrm."')".'">'.$e2019_ptbrm.'</button></a>';
$e2020btnptbrym = '<a href="#'.$e2020ptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$e2020ptbrm."')".'">'.$e2020_ptbrm.'</button></a>';
$towatchbtnptbrym = '<a href="#'.$towatchptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$towatchptbrm."')".'">'.$towatch_ptbrm.'</button></a>';
$linkbtnptbrym = '<a href="#'.$linkptbrm.'" onclick="closeNav()"><button class="w3-btn '.$color4.' '.$cssbtn1.'" onclick="openCity('."'".$linkptbrm."')".'">'.$link_m.'</button></a>';

$pcbtn1 = '<br /><button class="w3-btn yellow '.$cssbtn1.'" onclick="buttons();"><h2><i class="fas fa-arrow-circle-up"></i></h2></button>';
$pcbtn2 = '<button id="ShowButton" class="w3-btn yellow mobileHide '.$cssbtn1.'" style="display:none;" onclick="buttons2();"><h2><i class="fas fa-arrow-circle-down"></i></h2></button>';

$everybtn = $watchedbtnenus."\n".$towatchbtnenus."\n".$linkbtnenus."<br />".$watchedbtnptbr."\n".$towatchbtnptbr."\n".$linkbtnenus;
$everybtnenus = $watchedbtnenus."\n".$towatchbtnenus."\n".$linkbtnenus;
$everybtnptbr = $watchedbtnptbr."\n".$towatchbtnptbr."\n".$linkbtnptbr;

$everybtnwatched = $watchedbtnenus."\n".$moviebtnenus."\n".$archbtnenus."<br />".$watchedbtnptbr."\n".$moviebtnptbr."\n".$archbtnptbr;
$everybtnwatchedenus = $watchedbtnenus."\n".$moviebtnenus."\n".$archbtnenus;
$everybtnwatchedptbr = $watchedbtnptbr."\n".$moviebtnptbr."\n".$archbtnptbr;
$everybtnwatchedenusy1 = $watchedbtnenusy."\n".$moviebtnenus."\n".$archbtnenus;
$everybtnwatchedenusy2 = $watchedbtnenus."\n".$moviebtnenusy."\n".$archbtnenus;
$everybtnwatchedenusy3 = $watchedbtnenus."\n".$moviebtnenus."\n".$archbtnenusy;
$everybtnwatchedptbry1 = $watchedbtnptbry."\n".$moviebtnptbr."\n".$archbtnptbr;
$everybtnwatchedptbry2 = $watchedbtnptbr."\n".$moviebtnptbry."\n".$archbtnptbr;
$everybtnwatchedptbry3 = $watchedbtnptbr."\n".$moviebtnptbr."\n".$archbtnptbry;

$everyanos = $e2018btnenus."\n".$e2019btnenus."<br />".$e2018btnptbr."\n".$e2019btnptbr;
$everyanosenus = $e2018btnenus."\n".$e2019btnenus;
$everyanosptbr = $e2018btnptbr."\n".$e2019btnptbr;

$everyanosenus2018y = $e2018btnenusy."\n".$e2019btnenus;
$everyanosptbr2018y = $e2018btnptbry."\n".$e2019btnptbr;
$everyanosenus2019y = $e2018btnenus."\n".$e2019btnenusy;
$everyanosptbr2019y = $e2018btnptbr."\n".$e2019btnptbry;

$everybtnm = $watchedbtnenusm."\n".$towatchbtnenusm."\n".$linkbtnenusm."<br />".$watchedbtnptbrm."\n".$towatchbtnptbrm."\n".$linkbtnenusm;
$everybtnenusm = $watchedbtnenusm."\n".$towatchbtnenusm."\n".$linkbtnenusm;
$everybtnptbrm = $watchedbtnptbrm."\n".$towatchbtnptbrm."\n".$linkbtnptbrm;

$everybtnwatchedm = $watchedbtnenusm."\n".$moviebtnenusm."\n".$archbtnenusm."<br />".$watchedbtnptbrm."\n".$moviebtnptbrm."\n".$archbtnptbrm;
$everybtnwatchedenusm = $watchedbtnenusm."\n".$moviebtnenusm."\n".$archbtnenusm;
$everybtnwatchedptbrm = $watchedbtnptbrm."\n".$moviebtnptbrm."\n".$archbtnptbrm;
$everybtnwatchedenusy1m = $watchedbtnenusym."\n".$moviebtnenusm."\n".$archbtnenusm;
$everybtnwatchedenusy2m = $watchedbtnenusm."\n".$moviebtnenusym."\n".$archbtnenusm;
$everybtnwatchedenusy3m = $watchedbtnenusm."\n".$moviebtnenusm."\n".$archbtnenusym;
$everybtnwatchedptbry1m = $watchedbtnptbrym."\n".$moviebtnptbrm."\n".$archbtnptbrm;
$everybtnwatchedptbry2m = $watchedbtnptbrm."\n".$moviebtnptbrym."\n".$archbtnptbrm;
$everybtnwatchedptbry3m = $watchedbtnptbrm."\n".$moviebtnptbrm."\n".$archbtnptbrym;

$everyanosm = $e2018btnenusm."\n".$e2019btnenusm."<br />".$e2018btnptbrm."\n".$e2019btnptbrm;
$everyanosenusm = $e2018btnenusm."\n".$e2019btnenusm;
$everyanosptbrm = $e2018btnptbrm."\n".$e2019btnptbrm;

$everyanosenus2018ym = $e2018btnenusym."\n".$e2019btnenusm;
$everyanosptbr2018ym = $e2018btnptbrym."\n".$e2019btnptbrm;
$everyanosenus2019ym = $e2018btnenusm."\n".$e2019btnenusym;
$everyanosptbr2019ym = $e2018btnptbrm."\n".$e2019btnptbrym;

$mobilemenuopen = '<button id="ShowMenu" class="w3-btn '.$color2.' mobileShow border '.$cssbtn1.'" style="float:left;position:fixed;" onclick="openNav()"><h2><i class="fas fa-bars"></i></h2></button>';

$sidemenubtnsptbr = '<div id="mySidenav" class="sidenav mobileShow">'."\n".'
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times-circle"></i></a>
'.$everybtnptbrm."\n".
'</div>'."\n".'
'.$mobilemenuopen;

$sidemenubtnsenus = '<div id="mySidenav" class="sidenav mobileShow">'."\n".'
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-times-circle"></i></a>
'.$everybtnenusm."\n".
'</div>'."\n".'
'.$mobilemenuopen;

$watchedtextptbr = "Coisas assistidas Em";
$towatchtextptbr = "Coisas para Assistir";
$movietextptbr = 'Filmes Assistidos';
$moviestextptbr = 'Filme';
$archtextptbr = 'Mídias Arquivadas';
$linktextptbr = 'Links Para Baixar';
$notimeptbr = '(Horário Assistido Desconhecido)';
$mediasptbr = "Midias Assistidas";

$watchedtextenus = "Watched Things In";
$towatchtextenus = "Things to Watch";
$movietextenus = 'Watched Movies';
$moviestextenus = 'Movie';
$archtextenus = 'Archived Media';
$linktextenus = 'Links To Download';
$notimeenus = '(Unknown Watched Time)';
$mediasenus = "Watched Media";

$midia1enus = "Series";
$midia2enus = "Cartoon";
$midia3enus = "Channel";
$midia4enus = "Anime";
$midiasenus = array($midia1enus, $midia2enus, $midia3enus, $midia4enus);

$linktxt1 = '1 - '.'The Walking Dead ('.$midiasenus[0].')';
$linktxt2 = '2 - '.'My Little Pony ('.$midiasenus[1].')';
$linktxt3 = '3 - '.'Ben 10 ('.$midiasenus[1].')';
$linktxt4 = '4 - '.'Alanzoka ('.$midiasenus[2].')';
$linktxt5 = '5 - '.'Sword Art Online: Alicization - War Of Underworld ('.$midiasenus[3].')';
$linktxt6 = '6 - '.'Bang Dream! ('.$midiasenus[3].')';
$linktxts = array($linktext1enus, $linktext2enus, $linktext3enus, $linktext4enus, $linktext5enus, $linktext6enus);

$midia1ptbr = "Série";
$midia2ptbr = "Desenho";
$midia3ptbr = "Canal";
$midia4ptbr = "Anime";
$midiasptbr = array($midia1ptbr, $midia2ptbr, $midia3ptbr, $midia4ptbr);

$linktext1ptbr = '1 - '.'The Walking Dead ('.$midiasptbr[0].')';
$linktext2ptbr = '2 - '.'My Little Pony ('.$midiasptbr[1].')';
$linktext3ptbr = '3 - '.'Ben 10 ('.$midiasptbr[1].')';
$linktext4ptbr = '4 - '.'Alanzoka ('.$midiasptbr[2].')';
$linktext5ptbr = '5 - '.'Sword Art Online: Alicization - War Of Underworld ('.$midiasptbr[3].')';
$linktext6ptbr = '6 - '.'Bang Dream! ('.$midiasptbr[3].')';
$linkstextptbr = array($linktext1ptbr, $linktext2ptbr, $linktext3ptbr, $linktext4ptbr, $linktext5ptbr, $linktext6ptbr);

$link1_1 = 'https://www.baixarseriesmp4.com/baixar-the-walking-dead-6a-temporada-dublado-e-legendado-mega/';
$link1_2 = 'https://www.baixarseriesmp4.org/baixar-the-walking-dead-7a-temporada-dublado-e-legendado/';
$link1_3 = 'https://www.baixarseriesmp4.org/baixar-the-walking-dead-8a-temporada-dublado-e-legendado/';
$link1_4 = 'https://www.baixarseriesmp4.org/baixar-the-walking-dead-9a-temporada-mp4-dublado-e-legendado/';
$link1_5_1 = 'https://pt.wikipedia.org/wiki/Lista_de_epis%C3%B3dios_de_The_Walking_Dead';
$link1_5_2 = 'https://diario.netlify.com/cdn/sites/twdlist.htm';
$link2_1 = 'https://mlp.fandom.com/pt/wiki/A_Amizade_%C3%A9_M%C3%A1gica_m%C3%ADdia_de_anima%C3%A7%C3%A3o';
$link2_1_1text = 'https://mlp.fandom.com/pt/wiki/A_Amizade_é_Mágica_mídia_de_animação';
$link2_2 = 'https://diario.netlify.com/cdn/sites/mlplist.htm';
$link3_1 = 'http://www.itunesmaxhd.com/2015/08/ben-10-forca-alienigena-s01-completa.html';
$link3_2 = 'http://www.itunesmaxhd.com/2015/08/ben-10-forca-alienigenas02.html';
$link3_3 = 'http://www.itunesmaxhd.com/2016/03/ben-10-alien-force-3-temporada-completa.html';
$link4 = 'https://www.youtube.com/user/ElectronicDesireGE/videos/';
$link5 = 'https://www.superanimes.site/anime/sword-art-online-alicization/';
$link6_1 = 'https://www.superanimes.site/anime/bang-dream-2/';
$link6_2 = 'https://bandori.fandom.com/wiki/BanG_Dream!_2nd_Season/';

$linkmedias = array(
'https://www.baixarseriesmp4.com/baixar-the-walking-dead-6a-temporada-dublado-e-legendado-mega/', 
'https://www.baixarseriesmp4.org/baixar-the-walking-dead-7a-temporada-dublado-e-legendado/', 
'https://www.baixarseriesmp4.org/baixar-the-walking-dead-8a-temporada-dublado-e-legendado/', 
'https://www.baixarseriesmp4.org/baixar-the-walking-dead-9a-temporada-mp4-dublado-e-legendado/',
'https://pt.wikipedia.org/wiki/Lista_de_epis%C3%B3dios_de_The_Walking_Dead', 
'https://diario.netlify.com/cdn/sites/twdlist.htm', 
'https://mlp.fandom.com/pt/wiki/A_Amizade_é_Mágica_mídia_de_animação', 
'https://diario.netlify.com/cdn/sites/mlplist.htm',
'http://www.itunesmaxhd.com/2015/08/ben-10-forca-alienigena-s01-completa.html',
'http://www.itunesmaxhd.com/2015/08/ben-10-forca-alienigenas02.html',
'http://www.itunesmaxhd.com/2016/03/ben-10-alien-force-3-temporada-completa.html',
'https://www.youtube.com/user/ElectronicDesireGE/videos/',
'https://www.superanimes.site/anime/sword-art-online-alicization/',
'https://www.superanimes.site/anime/bang-dream-2/',
'https://bandori.fandom.com/wiki/BanG_Dream!_2nd_Season/');

$linkimgs = array($cdn.'/img/twd.jpg', $cdn.'/img/mlp.png', $cdn.'/img/ben10.jpg', $cdn.'/img/alan.jpg', $cdn.'/img/saoa.jpg', $cdn.'/img/bg.jpg');

$linkwrap1_1 = '<a href="'.$link1_1.'">'.$link1_1.'</a>';
$linkwrap1_2 = '<a href="'.$link1_2.'">'.$link1_2.'</a>';
$linkwrap1_3 = '<a href="'.$link1_3.'">'.$link1_3.'</a>';
$linkwrap1_4 = '<a href="'.$link1_4.'">'.$link1_4.'</a>';
$linkwrap1_5_1 = '<a href="'.$link1_5_1.'">'.$link1_5_1.'</a>';
$linkwrap1_5_2 = '<a class="w3-btn w3-gray w3-text-black" href="'.$link1_5_2.'"><'.$m3.'><i class="fas fa-archive"></i></'.$m3.'></a>';
$linkwrap2_1 = '<a href="'.$link2_1.'">'.$link2_1_1text.'</a>';
$linkwrap2_2 = '<a class="w3-btn w3-gray w3-text-black" href="'.$link2_2.'"><'.$m3.'><i class="fas fa-archive"></i></'.$m3.'></a>';
$linkwrap3_1 = '<a href="'.$link3_1.'">'.$link3_1.'</a>';
$linkwrap3_2 = '<a href="'.$link3_2.'">'.$link3_2.'</a>';
$linkwrap3_3 = '<a href="'.$link3_3.'">'.$link3_3.'</a>';
$linkwrap4 = '<a href="'.$link4.'">'.$link4.'</a>';
$linkwrap5 = '<a href="'.$link5.'">'.$link5.'</a>';
$linkwrap6_1 = '<a href="'.$link6_1.'">'.$link6_1.'</a>';
$linkwrap6_2 = '<a href="'.$link6_2.'">'.$link6_2.'</a>';

$linkimgs = array($linkimg1, $linkimg2, $linkimg3, $linkimg4, $linkimg5, $linkimg6);
$linkstwd = array($linkwrap1_1, $linkwrap1_2, $linkwrap1_3, $linkwrap1_4, $linkwrap1_5_1);
$linksmlp = array($linkwrap2_1, $linkwrap2_2);
$linksben = array($linkwrap3_1, $linkwrap3_2, $linkwrap3_3);
$linksbgd = array($linkwrap6_1, $linkwrap6_2);

$cmntlinks = array(
$cdn.'/txt/Hoje, Sexta (Vingadores Guerra Infinita).txt', 
$cdn.'/txt/Hoje, Segunda (Power Rangers 2017).txt', 
$cdn.'/txt/Hoje, Sabado (Detona Ralph 2 Ralph Quebra a Internet).txt', 
$cdn.'/txt/Hoje, Domingo (Equestria Girls Spring Breakdown).txt', 
$cdn.'/txt/Hoje, Sabado 2 (Os Vingadores Ultimato).txt');

$comments = array(
'<a class="'.$cssbtn4.'" onclick="window.open('."'".$commentlinks[0]."'".');"><i class="fas fa-comments"></i></a>', 
'<a class="'.$cssbtn4.'" onclick="window.open('."'".$commentlinks[1]."'".');"><i class="fas fa-comments"></i></a>', 
'<a class="'.$cssbtn4.'" onclick="window.open('."'".$commentlinks[2]."'".');"><i class="fas fa-comments"></i></a>', 
'<a class="'.$cssbtn4.'" onclick="window.open('."'".$commentlinks[3]."'".');"><i class="fas fa-comments"></i></a>', 
'<a class="'.$cssbtn4.'" onclick="window.open('."'".$commentlinks[4]."'".');"><i class="fas fa-comments"></i></a>');

$watchedmoviesfp = @fopen($watchedmoviestextfile, 'r', 'UTF-8');
if ($watchedmoviesfp) {
   $watchedmoviestextroot = explode("\n", fread($watchedmoviesfp, filesize($watchedmoviestextfile)));
   $watchedmoviestextarray = str_replace(";", ":", $watchedmoviestextroot);
}

$watchedmoviesfp = @fopen($watchedmoviestextfile, 'r', 'UTF-8'); 
if ($watchedmoviesfp) {
   $watchedmoviestext = str_replace("^", "", $watchedmoviestextarray);
}

$watchedmoviesfp = @fopen($watchedmoviestimefile, 'r', 'UTF-8'); 
if ($watchedmoviesfp) {
   $watchedmoviestimearray = explode("\n", fread($watchedmoviesfp, filesize($watchedmoviestimefile)));
   $watchedmoviestime = str_replace("^", "", $watchedmoviestimearray);
}


$watched2018fp = @fopen($watched2018textfile, 'r', 'UTF-8');
if ($watched2018fp) {
   $watched2018textroot = explode("\n", fread($watched2018fp, filesize($watched2018textfile)));
   $watched2018text = str_replace(";", ":", $watched2018textroot);
}

$watched2018fp = @fopen($watched2018timefile, 'r', 'UTF-8');
if ($watched2018fp) {
   $watched2018timeroot = explode("\n", fread($watched2018fp, filesize($watched2018timefile)));
   $watched2018time = str_replace(";", ":", $watched2018timeroot);
}

$watched2018mediatypefp  = @fopen($watched2018mediatypeenusfile, 'r', 'UTF-8');
if ($watched2018mediatypefp) {
   $watched2018mediatypearray = explode("\n", fread($watched2018mediatypefp, filesize($watched2018mediatypeenusfile)));
   $watched2018mediatypeenustext = str_replace("^", "", $watched2018mediatypearray);
}

$watched2018mediatypefp  = @fopen($watched2018mediatypeptbrfile, 'r', 'UTF-8');
if ($watched2018mediatypefp) {
   $watched2018mediatypearray = explode("\n", fread($watched2018mediatypefp, filesize($watched2018mediatypeptbrfile)));
   $watched2018mediatypeptbrtext = str_replace("^", "", $watched2018mediatypearray);
}


$watched2019fp = @fopen($watched2019textfile, 'r', 'UTF-8');
if ($watched2019fp) {
   $watched2019textroot = explode("\n", fread($watched2019fp, filesize($watched2019textfile)));
   $watched2019text = str_replace(";", ":", $watched2019textroot);
}

$watched2019fp = @fopen($watched2019timefile, 'r', 'UTF-8');
if ($watched2019fp) {
   $watched2019timeroot = explode("\n", fread($watched2019fp, filesize($watched2019timefile)));
   $watched2019time = str_replace("^", "", $watched2019timeroot);
}

$watched2019mediatypefp  = @fopen($watched2019mediatypeenusfile, 'r', 'UTF-8');
if ($watched2019mediatypefp) {
   $watched2019mediatypearray = explode("\n", fread($watched2019mediatypefp, filesize($watched2019mediatypeenusfile)));
   $watched2019mediatypeenustext = str_replace("^", "", $watched2019mediatypearray);
}

$watched2019mediatypefp  = @fopen($watched2019mediatypeptbrfile, 'r', 'UTF-8');
if ($watched2019mediatypefp) {
   $watched2019mediatypearray = explode("\n", fread($watched2019mediatypefp, filesize($watched2019mediatypeptbrfile)));
   $watched2019mediatypeptbrtext = str_replace("^", "", $watched2019mediatypearray);
}


$watched2020fp = @fopen($watched2020textfile, 'r', 'UTF-8');
if ($watched2020fp) {
   $watched2020textroot = explode("\n", fread($watched2020fp, filesize($watched2020textfile)));
   $watched2020textarray = str_replace(";", ":", $watched2020textroot);
}

$watched2020fp = @fopen($watched2020textfile, 'r', 'UTF-8'); 
if ($watched2020fp) {
   $watched2020text = str_replace("^", "", $watched2020textarray);
}

$watched2020fp = @fopen($watched2020timefile, 'r', 'UTF-8'); 
if ($watched2020fp) {
   $watched2020timearray = explode("\n", fread($watched2020fp, filesize($watched2020timefile)));
   $watched2020time = str_replace("^", "", $watched2020timearray);
}

$watched2020mediatypefp = @fopen($watched2020mediatypeenusfile, 'r', 'UTF-8');
if ($watched2020mediatypefp) {
   $watched2020mediatypearray = explode("\n", fread($watched2020mediatypefp, filesize($watched2020mediatypeenusfile)));
   $watched2020mediatypeenustext = str_replace("^", "", $watched2020mediatypearray);
}

$watched2020mediatypefp = @fopen($watched2020mediatypeptbrfile, 'r', 'UTF-8');
if ($watched2020mediatypefp) {
   $watched2020mediatypearray = explode("\n", fread($watched2020mediatypefp, filesize($watched2020mediatypeptbrfile)));
   $watched2020mediatypeptbrtext = str_replace("^", "", $watched2020mediatypearray);
}


$twfilefp = @fopen($twfile, 'r', 'UTF-8');
if ($twfilefp) {
   $twroot = explode("\n", fread($twfilefp, filesize($twfile)));
   $twtext = str_replace('"', '', $twroot);
}


$twstatusfilefp = @fopen($twstatusfile, 'r', 'UTF-8');
if ($twstatusfilefp) {
   $twstatusroot = explode("\n", fread($twstatusfilefp, filesize($twstatusfile)));
   $twstatusarray = str_replace("\n", " ", $twstatusroot);
}

$twstatusfilefp = @fopen($twstatusfile, 'r', 'UTF-8'); 
if ($twstatusfilefp) {
   $twstatustext = str_replace("\n", " ", $twstatusarray);
}

$twmediafilefp = @fopen($twmediafile, 'r', 'UTF-8');
if ($twmediafilefp) {
   $twmediaroot = explode("\n", fread($twmediafilefp, filesize($twmediafile)));
   $twmediatext = str_replace("^", "", $twmediaroot);
}

$twmediatypefilefp = @fopen($twmediatypeenusfile, 'r', 'UTF-8');
if ($twmediatypefilefp) {
   $twmediatyperoot = explode("\n", fread($twmediatypefilefp, filesize($twmediatypeenusfile)));
   $twmediatypeenustext = str_replace("^", "", $twmediatyperoot);
}

$twmediatypefilefp = @fopen($twmediatypeptbrfile, 'r', 'UTF-8');
if ($twmediatypefilefp) {
   $twmediatyperoot = explode("\n", fread($twmediatypefilefp, filesize($twmediatypeptbrfile)));
   $twmediatypeptbrtext = str_replace("^", "", $twmediatyperoot);
}

?>