<?php 

if ($sitename == $choosenwebsite) {
	$hidenotifattribute = 'hidenotif();hidenotifm();';
}

else {
	$hidenotifattribute = '';
}

echo '<'.$m.'>'.'<b>'."\n";
echo $divzoomanim."\n";

require $capbtngeneratorphp;

echo $divc."\n";
echo '</b>'.'</'.$m.'>'."\n";

?>