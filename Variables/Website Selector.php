<?php 

$i = 0;
$c = 0;
$array = $website_folders;
while ($c <= count($array) - 1) {
	if (file_exists($array[$i].'Website.php')) {
		$current_website_folder = $array[$i];
		$current_website_file = $array[$i].'Website.php';
		
		if (file_exists($array[$i].'Website Style.php')) {
			$website_style_file = $array[$i].'Website Style.php';
		}

		include $current_website_file;

		if (file_exists($website_style_file)) {
			#require $website_style_file;
			$website_style = $website_style_file;
		}
	}

	$i++;
	$c++;
}

?>