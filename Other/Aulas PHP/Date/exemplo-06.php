<?php 

date_default_timezone_set("America/Sao_Paulo");

$dt = new DateTime();

$periodo = new DateInterval("P15M");

echo $dt -> format("d/m/Y H:i:s");

echo "<br />";

$dt -> add($periodo);

echo $dt -> format("d/m/Y H:i:s");

?>