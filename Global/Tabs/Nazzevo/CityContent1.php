<?php 

if ($sitename == $sitepqnt) {
	$hidenotifattribute = 'hidenotif();hidenotifm();';
}

else {
	$hidenotifattribute = '';
}

$reviewedcap = 0;

echo '<'.$m.'>'.'<b>'."\n";
echo $divzoomanim."\n";

include $capbtngeneratorphp;

echo $divc."\n";
echo '</b>'.'</'.$m.'>'."\n";

?>