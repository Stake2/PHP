<?php 

$found_selected_website = False;

$website_number = 0;
foreach ($website_titles as $local_website_title) {
	$local_portuguese_title = $website_portuguese_titles[$local_website_title];
	$local_website_file = $website_files[$local_website_title];
	$local_website_folder = $website_php_folders[$local_website_title];
	$local_website_style_file = $website_style_files[$local_website_title];
	$local_website_key = $website_keys[$local_website_title];

	if (file_exists($local_website_file) == True) {
		if (
			$http_method["website"] == $local_website_title or 
			$http_method["website"] == $local_portuguese_title or
			$http_method["website"] == $local_website_key
		) {
			# Website title definer
			$website_title = $local_website_title;

			$website_info["type"] = $website_types[$website_title];

			$choosed_website_css_file = $website_title;
			$website_style_file = $local_website_style_file;

			if ($website_info["type"] == $story_website_type and isset($english) == False and isset($portuguese) == False) {
				$story_website_tab_names = array(Language_Item_Definer("Read story", "Ler história"), Language_Item_Definer("Readers", "Leitores"), $other_stories_text);
				$english = $story_website_tab_names;
				$portuguese = $story_website_tab_names;
			}

			require $local_website_file;

			$tab_names = Language_Item_Definer($english, $portuguese);

			# Number of tabs
			$website_tab_number = count($tab_names) - 1;
		}

		unset($english);
		unset($portuguese);

		$website_number++;
	}

	unset($english);
	unset($portuguese);
}

$local_websites_number = 0;

foreach ($websites as $local_website_name) {
	$local_website_portuguese_name = $portuguese_websites[$local_website_name];

	$key = (string)$local_website_name;

	$local_website_link = $main_website_url;

	if (preg_match("/[0-9][0-9][0-9][0-9]/i", $local_website_name) == True) {
		$local_website_link .= "Years/";
	}

	$local_website_link .= Remove_Non_File_Characters($local_website_name)."/";

	$local_website_link_element = Create_Element("a", "", Language_Item_Definer($local_website_name, $local_website_portuguese_name), "href=\"$local_website_link\" style=\"color:white!important;\"");

	$website_link_elements[$key] = $local_website_link_element;

	$local_websites_number++;
}

?>