<?php

if ($lang == $langs[0]) {
	$lang = $langs[1];
	$lang2 = strtoupper($lang);
	$lang2 = substr_replace($lang2, '-', 2, 0);
	$lang = $langs[0];
}

$citytitles[0] = $divzoomanim.'<'.$n.'><p></p><br /><b>'.$captxt.' '.$lang2.': '.$siteicon.'</b><br /><br /><p></p></'.$n.'>'.$divc.'<hr class="'.$sitehr2.'" />'."\n";
$citybodies[0] = '';

?>