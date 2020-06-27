<?php

include "C:/Mega/Diario/PHP/VariablesDiário.php";

 ?>
<!DOCTYPE html>
<head>
<title><?php echo $sitetitle; ?></title>
<meta charset="UTF-8" />
<meta property="og:title" content="<?php echo $sitetitle; ?>" />
<meta property="og:site_name" content="<?php echo $sitetitle; ?>" />
<link rel="canonical" href="<?php echo $siteurl; ?>" />
<meta property="og:url" content="<?php echo $siteurl; ?>" />
<link rel="icon" href="<?php echo $siteimage; ?>" />
<link rel="image_src" href="<?php echo $siteimage; ?>" />
<meta property="og:image" content="<?php echo $siteimage; ?>" />
<meta name="description" content="<?php echo $sitedesc; ?>" />
<meta property="og:description" content="<?php echo $sitedesc; ?>" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" value="@The_Snakes90" />
<meta name="twitter:creator" content="@The_Snakes90" />
<?php echo $sitecss; ?>
<meta name="revised" content="Stake's Enterprisetm, <?php 
date_default_timezone_set("America/Sao_Paulo");
$data = date("d/m/Y");
echo $data; ?>" />
<meta name="author" content="Stake Ferreira" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
</head>
<body>
<?php echo $sitejs; ?>
<center>

<?php echo $sidemenubtns; ?>

<div id="myDIV" class="w3-bar mobileHide" style="position:fixed;float:right;">
<?php echo $everybutton; ?>
<?php echo $btn1; ?>
</div>
<?php echo "\n".$btn2; ?>

<div class="mobileHide"><br /><br /><br /><br /><br /><br /><br /></div>
<hr /><h1 class="w3-text-white"><?php echo $sitetitle; ?></h1><hr /><br /><?php echo $mainimage."\n".$mainimagem; ?><br /><br /><hr />

<h5 class="<?php echo $colortext; ?>">
Este é um diario sobre a minha vida, as coisas que faço, e compartilho tudo isso com meu amigo Nodus e com vocês que leem, adoro escrever nele.<br />
-</h5>
<h4 class="<?php echo $colortext; ?>">
Diario feito por Izaque Sanvezzo (stake2)<br />
Blocks (Capítulos): <span class="w3-text-blue"><?php echo $blocks; ?></span> blocos de texto.<br />
<span class="w3-text-blue"><?php echo $currentblocks; ?></span> blocos Indexados, ainda adicionando mais<br />
<?php echo $dataptbr; echo ", ".$dataenus; ?>: <span class="w3-text-blue">05/08/2017</span><br />
</h4><hr /><br />

<a name="chars"></a>
<div id="chars" class="city w3-black" style="display:none;">
<hr class="<?php echo $sitehr2; ?>" /><b><h2 class="<?php echo $colortext; ?>"><?php echo $chartitleptbr; ?></h2></b><hr class="<?php echo $sitehr2; ?>" />
<h4><span class="w3-text-orange">Izaque (stake2):</span><span class="<?php echo $colortext; ?>"> Eu é claro kk, minha fala é mostrada com [hora]: "[dialogo]"</span></h4>
<h4><span class="w3-text-blue">Nodus:</span><span class="<?php echo $colortext; ?>"> Meu amigo "do futuro", a fala dele é mostrada com [hora]: //[dialogo]</span></h4>
<h4><span class="w3-text-cyan">Ted:</span><span class="<?php echo $colortext; ?>"> Um cara ai que aparece as vezes, a fala dele é mostrada com [hora]: ~[dialogo]</span></h4><hr />
</div>

<?php

include "C:/Mega/Diario/PHP/BlocksBtnPT.php";

?>

</center>

<?php

include "C:/Mega/Diario/PHP/BlocksTextPT.php";

?>

<br /><br />
<center><button class="w3-btn grey w3-text-black <?php echo $cssbtn1; ?>" onclick="window.open('https://diario.netlify.com/arquivado/arquivo_18-01-2019.html');"><h4><i class="fas fa-archive"></i> 18/01/2019</h4></button></center>
</body>
</html>