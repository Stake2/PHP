<?php 

$i = 0;
$c = 0;
$array = $sitefolders;
while ($c <= count($array) - 1) {
	if (file_exists($array[$i].'Website.php')) {
		$current_website_folder = $array[$i];
		$currentsitefile = $array[$i].'Website.php';

		if (file_exists($array[$i].'Website Style.php')) {
			$website_style_file = $array[$i].'Website Style.php';
		}

		include $currentsitefile;

		if (file_exists($website_style_file)) {

			#require $website_style_file;
			$website_style = $website_style_file;

		}
	}

	$i++;
	$c++;
}

?>