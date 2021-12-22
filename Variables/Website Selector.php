<?php 

$found_selected_website = False;

$website_number = 0;
foreach ($website_titles as $value) {
	$local_website_file = $website_files[$value];
	$local_website_folder = $website_folders[$value];
	$local_website_style_file = $website_style_files[$value];

	if (file_exists($local_website_file) == True) {
		require $local_website_file;

		if ($found_selected_website == True) {
			$selected_website_title = $value;
			$website_style_file = $local_website_style_file;

			# Number of tabs
			$website_tab_number = count($tab_names) - 1;

			$found_selected_website = False;
		}

		$website_number++;
	}
}

?>