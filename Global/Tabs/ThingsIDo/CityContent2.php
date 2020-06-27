<?php 

echo '<'.$m.'>'.'<b>';
echo $divzoomanim;

echo '<div class="'.$computervar.'">';
$i = 7;
$c = 0;
while ($c <= $unprodbtnsnumb - 1) {
	echo $btns[$i];

	$i++;
	$c++;
}
echo $divc;

echo '<div class="'.$mobilevar.'">';
$i = 7;
$c = 0;
while ($c <= $unprodbtnsnumb - 1) {
	echo $btnsm[$i];

	$i++;
	$c++;
}
echo $divc;

echo $divc;
echo '</b>'.'</'.$m.'>';

?>