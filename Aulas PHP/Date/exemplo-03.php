<?php 

setlocale(LC_ALL, "pt_BR", "pt_BR.utf8", "portuguese");
date_default_timezone_set("America/Sao_Paulo");

$dia = ucwords(strftime("%A"));
$mes = ucwords(strftime("%B"));
$current_year = strftime("%Y");

$hora = strftime("%H");
$minuto = strftime("%M");

echo "Hoje é $dia do mês de $mes de $current_year.<br />
Agora são $hora:$minuto.";

?>