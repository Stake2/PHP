<?php 

if ($sitename == $choosenwebsite) {
	$hidenotifattribute = 'hidenotif();hidenotifm();';
}

else {
	$hidenotifattribute = '';
}

echo '<'.$m.'>'.'<b>'."\n";
echo $divzoomanim."\n";

include $capbtngeneratorphp;

echo $divc."\n";
echo '</b>'.'</'.$m.'>'."\n";

?>