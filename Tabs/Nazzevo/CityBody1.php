<?php

if ($website_language == $languages_array[0]) {
	$website_language = $languages_array[1];
	$hyphen_separated_website_language = strtoupper($website_language);
	$hyphen_separated_website_language = substr_replace($hyphen_separated_website_language, '-', 2, 0);
	$website_language = $languages_array[0];
}

$citytitles[0] = $div_zoom_animation.'<'.$n.'><p></p><br /><b>'.$captxt.' '.$hyphen_separated_website_language.': '.$siteicon.'</b><br /><br /><p></p></'.$n.'>'.$div_close.'<hr class="'.$tab_full_border.'" />'."\n";
$citybodies[0] = '';

?>