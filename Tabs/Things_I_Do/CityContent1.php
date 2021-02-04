<?php 

echo '<'.$m.'>'.'<b>'."\n";
echo $div_zoom_animation."\n";
echo '<div class="'.$computer_variable.'">'."\n";

$i = 2;
$c = 0;
while ($c <= $prodbtnsnumb - 1) {
	echo $computer_buttons[$i];

	$i++;
	$c++;
}

echo $div_close;

echo '<div class="'.$mobile_variable.'">'."\n";

$i = 2;
$c = 0;
while ($c <= $prodbtnsnumb - 1) {
	echo $mobile_buttons[$i];

	$i++;
	$c++;
}

echo $div_close."\n";
echo $div_close."\n";
echo '</b>'.'</'.$m.'>'."\n";

?>