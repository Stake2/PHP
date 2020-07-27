<?php 

if ($sitename == $sitepequenata) {
	$hidenotifattribute = 'hidenotif();hidenotifm();';
}

else {
	$hidenotifattribute = '';
}

$reviewedcap = 0;

echo '<'.$m.'>'.'<b>'."\n";
echo $divzoomanim."\n";

require $chapter_button_generator_php_variable;

echo $divc."\n";
echo '</b>'.'</'.$m.'>'."\n";

?>