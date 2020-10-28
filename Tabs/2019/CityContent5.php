<?php 

echo $div_zoom_animation;

$i = 0;
$i2 = 1;
echo '<div style="text-align:left;">';

while ($i <= $tasksfilecount2) {
	echo $i2.' - '.$taskmadefiletxt[$i].'<br />';
	$i++;
	$i2++;
}

echo '</div>';

echo $div_close;

?>