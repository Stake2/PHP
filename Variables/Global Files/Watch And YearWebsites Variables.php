<?php 

#Watch History and YearWebsites year variables
if ($website_name == $website_titles["Watch History"] or in_array($website_title, $year_websites)) {
	$current_yearanterior = $current_year - 1;
	$current_years = array(
	"2018", 
	"2019", 
	"2020",
	);

	$watched_media_reader_2018 = $php_folder_tabs.ucwords($website_2018)."/".$website_2018." MediaReader.php";
	$watched_media_reader_2019 = $php_folder_tabs.ucwords($website_2019)."/".$website_2019." MediaReader.php";

	if (in_array($website_language, $en_languages_array)) {
		$watched_media_type_2018 = $notepad_years_folder.$website_2018."/Watched VideoTypes ".$languages_array[1].".txt";
	}

	if (in_array($website_language, $pt_languages_array)) {
		$watched_media_type_2018 = $notepad_years_folder.$website_2019."/Watched VideoTypes ".$languages_array[2].".txt";
	}

	$watchedtypefile2019 = $notepad_years_folder.$website_2019."/Watched VideoTypes.txt";

	if (file_exists($watched_media_type_2018) == True) {
		$fp = fopen ($watched_media_type_2018, "r", "UTF-8"); 
		if ($fp) {
			$watchedfile2018 = explode("\n", fread($fp, filesize($watched_media_type_2018)));
		}
	}

	if (file_exists($watchedtypefile2019) == True) {
		$fp = fopen ($watchedtypefile2019, "r", "UTF-8"); 
		if ($fp) {
			$watchedfile2019 = explode("\n", fread($fp, filesize($watchedtypefile2019)));
		}
	}
}

?>