<?php 

$found_selected_website = False;
$i = 0;
$c = 0;
$website_number = 0;
$array = $website_folders;
while ($c <= count($website_folders) - 1) {
	if (file_exists($website_folders[$i].'Website.php')) {
		$current_website_folder = $website_folders[$i];
		$current_website_file = $website_folders[$i].'Website.php';
		
		if (file_exists($website_folders[$i].'Website Style.php')) {
			$website_style_file = $website_folders[$i].'Website Style.php';
		}

		include $current_website_file;

		if (file_exists($website_style_file)) {
			#require $website_style_file;
			$website_style = $website_style_file;
		}

		if ($found_selected_website == True) {
			$selected_website_number = $website_number;
		}

		$website_number++;
		$c++;
	}

	$i++;
}

?>