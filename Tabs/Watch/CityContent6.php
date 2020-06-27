<?php 

echo '<hr class="'.$sitehr2.'" />'."\n";
echo '<'.$m.' class="w3-black w3-text-blue" style="text-align:left;">'."\n";

$mediaarrayyear = 2018;
include $mediaarraygenerator;

$watchmedias2018 = true;
$a2018text = true;
$a2019text = false;
#MediaReader imported from 2018.php (MediaReader 2018.php)
include $mediareader2018;

echo '</'.$m.'>'."\n";

#Old style of reading 2019 medias, created on Watch History.php
#$i = 0;
#$a = 0;
#while ($i <= $watchednumb2018file) {
#	$i2 = $i + 1;
#	if (in_array($i, $watchednumb2018array)) {
#		if (in_array($i, $watchednumb2018timearray)) {
#			echo $divzoomanim.'<span class="'.$cssbtn4.'">'.'<span class="w3-text-white">'.$i2." - ".$watched2018mediatypetxt[$i]." - </span>".$watched2018txt[$i].' - <span class="w3-text-white">'.$watched2018time[$a].'</span></span>'.$divc."\n";
#			$a++;
#		}
#
#		if (!in_array($i, $watchednumb2018timearray)) {
#			echo $divzoomanim.'<span class="'.$cssbtn4.'">'.'<span class="w3-text-white">'.$i2." - ".$watched2018mediatypetxt[$i]." - </span>".$watched2018txt[$i].' - <span class="w3-text-white">'.$notimetxt.'</span></span>'.$divc."\n";
#		}
#	}
#
#	if (in_array($i, $watchedmovie2018numbarray)) {
#		if (in_array($i, $watchednumb2018timearray)) {
#			echo $divzoomanim.'<span class="'.$cssbtn4.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$moviestxt.') - </span>'.$watched2018txt[$i].' - <span class="w3-text-white">'.$watched2018time[$a].'</span></span>'.$divc."\n";
#			$a++;
#		}
#	
#		if (!in_array($i, $watchednumb2018timearray)) {
#			echo $divzoomanim.'<span class="'.$cssbtn4.'">'.'<span class="w3-text-white">'.$i2." - ".'('.$moviestxt.') - </span>'.$watched2018txt[$i].' - <span class="w3-text-white">'.$notimetxt.'</span></span>'.$divc."\n";
#		}
#	}
#
#    $i++;
#}

?>