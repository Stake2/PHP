<?php 

echo '<'.$m.'>'.'<b>';
echo $div_zoom_animation;

echo '<div class="'.$computer_variable.'">';
$i = 7;
$c = 0;
while ($c <= $unprodbtnsnumb - 1) {
	echo $computer_buttons[$i];

	$i++;
	$c++;
}
echo $div_close;

echo '<div class="'.$mobile_variable.'">';
$i = 7;
$c = 0;
while ($c <= $unprodbtnsnumb - 1) {
	echo $mobile_buttons[$i];

	$i++;
	$c++;
}
echo $div_close;

echo $div_close;
echo '</b>'.'</'.$m.'>';

?>