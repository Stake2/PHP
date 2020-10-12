<?php 

echo '<'.$m.'>'.'<b>'."\n";
echo $divzoomanim."\n";
echo '<div class="'.$computervar.'">'."\n";

$i = 2;
$c = 0;
while ($c <= $prodbtnsnumb - 1) {
	echo $computer_buttons[$i];

	$i++;
	$c++;
}

echo $divc;

echo '<div class="'.$mobilevar.'">'."\n";

$i = 2;
$c = 0;
while ($c <= $prodbtnsnumb - 1) {
	echo $mobile_buttons[$i];

	$i++;
	$c++;
}

echo $divc."\n";
echo $divc."\n";
echo '</b>'.'</'.$m.'>'."\n";

?>