<?php 

#Watch History and YearWebsites year variables
if ($website_name == $sitewatch or in_array($website_name, $yeararray)) {
	$anoanterior = $ano - 1;
	$anos = array(
	'2018', 
	'2019', 
	'2020',
	);

	$mediareader2018 = $php_tabs.ucwords($site2018).'/'.$site2018.' MediaReader'.'.php';
	$mediareader2019 = $php_tabs.ucwords($site2019).'/'.$site2019.' MediaReader'.'.php';

	if (in_array($website_language, $en_languages_array)) {
		$watchedtypefile2018 = $notepad_years_folder_variable.$site2018.'/Watched VideoTypes '.$languages_array[1].'.txt';
	}

	if (in_array($website_language, $pt_languages_array)) {
		$watchedtypefile2018 = $notepad_years_folder_variable.$site2018.'/Watched VideoTypes '.$languages_array[2].'.txt';
	}

	$watchedtypefile2019 = $notepad_years_folder_variable.$site2019.'/Watched VideoTypes.txt';
	$yearmakerfilephp2test = $php_tabs.ucwords($sitetextmaker).'/YearMaker2.php';
	$yearmakerfilephp2test = str_replace(array("\r\n", "\r", "\n", "%EF%BB%BF", "%EF", "%BB", "%BF", "U+FEFF", "/uFEFF", "^"), "", $yearmakerfilephp2test);

	if (file_exists($watchedtypefile2018) == true) {
		$fp = fopen ($watchedtypefile2018, 'r', 'UTF-8'); 
		if ($fp) {
			$watchedfile2018 = explode("\n", fread($fp, filesize($watchedtypefile2018)));
		}
	}

	if (file_exists($watchedtypefile2019) == true) {
		$fp = fopen ($watchedtypefile2019, 'r', 'UTF-8'); 
		if ($fp) {
			$watchedfile2019 = explode("\n", fread($fp, filesize($watchedtypefile2019)));
		}
	}
}

?>