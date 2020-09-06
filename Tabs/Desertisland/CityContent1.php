<?php 

if ($sitename == $choosenwebsite) {
	$hidenotifattribute = 'hidenotif();hidenotifm();';
}

else {
	$hidenotifattribute = '';
}

echo '<'.$m.'>'.'<b>'."\n";
echo $divzoomanim."\n";

require $chapter_button_generator_php_variable;

echo $divc."\n";
echo '</b>'.'</'.$m.'>'."\n";

?>