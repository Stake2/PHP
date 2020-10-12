<?php 

echo '<'.$m.'>'.'<b>';
echo $divzoomanim;

echo '<div class="'.$computervar.'">';
$i = 7;
$c = 0;
while ($c <= $unprodbtnsnumb - 1) {
	echo $computer_buttons[$i];

	$i++;
	$c++;
}
echo $divc;

echo '<div class="'.$mobilevar.'">';
$i = 7;
$c = 0;
while ($c <= $unprodbtnsnumb - 1) {
	echo $mobile_buttons[$i];

	$i++;
	$c++;
}
echo $divc;

echo $divc;
echo '</b>'.'</'.$m.'>';

?>