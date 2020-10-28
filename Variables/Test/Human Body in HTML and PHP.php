<?php 

if ($website_language == $languages_array[0] or $website_language == $languages_array[1]) {
$humanbodyinhtmlandphp = ''.
'The Human Body in HTML & PHP
<human>
<head>
<hair /><br />
<ear align="left" />
<sight><eye align="left" />
<eye align="right" /></sight>
<ear align="right" /><br />
<nose /><br />
<form action="aliment.php"><mouth /></form><br />
<neck height="8cm" />
</head>
<body>
<tshirt style="background-color:#000; /*(white)*/">
<arm align="left"><hand /></arm>
<chestarea>
<?php 

if ($sex == "feminine") {
	echo "<tit align="left" /><tit align="right" />";
}

else {
	echo "<nipple align="left" /><nipple align="right" />";
}

?>
</chestarea>
<arm align="right" /><hand /></arm><br />
<tummy><bellybutton></tummy></tshirt>
<pants size="short"><underwear>
<?php include "private.php"; ?></underwear></pants>
<leg align="left" /><leg align="right" />
<sneaker align="left" class="Nike" /><foot /></sneaker>
<sneaker align="right" class="Nike" /><foot /></sneaker>
</body>
<human>'."\n";
}

if ($website_language == $languages_array[2]) {
$humanbodyinhtmlandphp = ''.
'O corpo humano em HTML e PHP
<humano>
<cabeça>
<cabelo /><br />
<orelha alinhamento="esquerda" />
<visão><olho alinhamento="esquerda" />
<olho alinhamento="direita" /></visão>
<orelha alinhamento="direita" /><br />
<nariz /><br />
<formulário ação="alimento.php"><boca /></formulário><br />
<pescoço altura="8cm" />
</cabeça>
<corpo>
<camiseta estilo="cor-de-fundo:#000; /*(branca)*/">
<braço alinhamento="esquerda"><mão /></braço>
<áreadopeito>
<?php 

Se ($sexo == "feminino") {
	inserir "<seio alinhamento="esquerda" /><seio alinhamento="direita" />";
}

Caso contrário {
	inserir "<mamilo alinhamento="esquerda" /><mamilo alinhamento="direita" />";
}

?>
</áreadopeito>
<braço alinhamento="direita" /><mão /></braço><br />
<barriga><umbigo></barriga></camiseta>
<calças tamanho="curto"><roupadebaixo>
<?php incluir "privado.php"; ?></roupadebaixo></calças>
<perna alinhamento="esquerda" /><perna alinhamento="direita" />
<tênis alinhamento="esquerda" classe="Nike" /><pé /></tênis>
<tênis alinhamento="direita" classe="Nike" /><pé /></tênis>
</corpo>
<humano>'."\n";
}

$memes = array(
$humanbodyinhtmlandphp,
);

$memesescape = array(
$humanbodyinhtmlandphp = htmlspecialchars($humanbodyinhtmlandphp),
);

$echomemes = '<div style="text-align:left;">'."\n".
'<pre>'."\n".
$humanbodyinhtmlandphp.
'</pre>'."\n".
$div_close."\n";

?>