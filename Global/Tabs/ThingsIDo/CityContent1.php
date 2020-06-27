<?php 

echo '<'.$m.'>'.'<b>'."\n";
echo $divzoomanim."\n";
echo '<div class="'.$computervar.'">'."\n";

$i = 2;
$c = 0;
while ($c <= $prodbtnsnumb - 1) {
	echo $btns[$i];

	$i++;
	$c++;
}

echo $divc;

echo '<div class="'.$mobilevar.'">'."\n";

$i = 2;
$c = 0;
while ($c <= $prodbtnsnumb - 1) {
	echo $btnsm[$i];

	$i++;
	$c++;
}

echo $divc."\n";
echo $divc."\n";
echo '</b>'.'</'.$m.'>'."\n";

?>