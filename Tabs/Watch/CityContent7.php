<?php 

echo '<hr class="'.$sitehr2.'" />'."\n";
echo '<'.$m.' class="w3-black w3-text-blue" style="text-align:left;">'."\n";

include $mediaarraygenerator;

$watchmedias2019 = true;
$a2018text = false;
$a2019text = true;
#MediaReader imported from 2019.php (MediaReader 2019.php)
include $mediareader2019;

echo '</'.$m.'>'."\n";

#Old style of reading 2019 medias, created on Watch History.php
#$i = 0;
#$a = 0;
#
#while ($i <= $watchednumb2019file) {
#	$i2 = $i + 1;
#	if (in_array($i, $watchedmovie2019numbarray)) {
#		echo $divzoomanim.'<span class="'.$cssbtn4.'">'.'<span class="w3-text-white">'.$i2.' - ('.$moviestxt.') - </span>'.$watched2019txt[$i].'- <span class="w3-text-white">'.$watched2019time[$a].'</span></span>'.$divc.''."\n";
#		$a++;
#	}
#
#	if (!in_array($i, $watchedmovie2019numbarray)) {
#		echo $divzoomanim.'<span class="'.$cssbtn4.'">'.'<span class="w3-text-white">'.$i2.' - '.$watched2019mediatypetxt[$i]." - </span>".$watched2019txt[$i].'- <span class="w3-text-white">'.$watched2019time[$a].'</span></span>'.$divc.''."\n";
#		$a++;
#	}
#    $i++;
#}

?>