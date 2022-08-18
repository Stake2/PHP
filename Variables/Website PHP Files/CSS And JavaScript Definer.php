<?php 

$javascript_folder = $website_function_javascript_folder;

$javascript_links = array(
	"https://code.jquery.com/jquery-3.6.0.slim.min",
	"https://kit.fontawesome.com/6f0935b8d2",
	$javascript_folder."Tabs",
	$javascript_folder."Language Redirector",
	$javascript_folder."Show Hide",
	$javascript_folder."Mobile Side Menu",
	$javascript_folder."Set Revised Date",
	$javascript_folder."Change Button Color",
);

$number = 3;

if ($website_info["language"] == $language_geral) {
	$javascript_links = array(
		$javascript_folder."Language Redirector",
	);

	$number = 0;
}

if (strpos($_SERVER["REQUEST_URI"], "Website%20HTML") == False) {
	unset($javascript_links[$number]);
}

if ($website_info["type"] == $story_website_type and $website_info["language"] != $language_geral) {
	array_push($javascript_links, $website_story_websites_javascript_folder."Open Chapter By Keys");
	array_push($javascript_links, $website_story_websites_javascript_folder."Write Chapter");
	array_push($javascript_links, $website_story_websites_javascript_folder."Hide Chapter Covers");
	array_push($javascript_links, $website_story_websites_javascript_folder."Hide Modal");
}

$css_links = array(
	"https://www.w3schools.com/lib/w3",
	$website_css_styler_css_folder."W3",
	$website_css_styler_css_folder."Main_CSS",
	$website_css_styler_css_folder."Colors",
);

if ($website_function_settings["is_prototype"] == False and $website_settings["custom_layout"] == False and strpos($_SERVER["REQUEST_URI"], "Select_Website") == False) {
	$website_css_file_name = Remove_Non_File_Characters($website_info["english_title"]);

	if (isset($website_info["custom_css_file"]) == True) {
		$website_css_file_name = $website_info["custom_css_file"];
	}

	array_push($css_links, $website_css_website_css_folder.$website_css_file_name);
}

if ($website_settings["notifications"] == True) {
	$text = "Notifications";

	array_push($css_links, $website_css_styler_css_folder.$text);
}

# Website CSS links string creator
$website_css_links = "";

$css_link_string = '<link rel="stylesheet" type="text/css" href="{}.css" />';

foreach ($css_links as $link) {
	$website_css_links .= "\t".format($css_link_string, array($link));

	if ($link != array_reverse($css_links)[0]) {
		$website_css_links .= "\n";
	}
}

$website_css_links .= "\n";

# Website JavaScript links string creator
$website_javascript_links = "";

$javascript_link_string = '<script src="{}.js"></script>';

$javascript_link_string_with_crossorigin = '<script src="{}.js" crossorigin="anonymous"></script>';

foreach ($javascript_links as $link) {
	$string_to_use = $javascript_link_string;

	if (strpos($link, "fontawesome") == True) {
		$string_to_use = $javascript_link_string_with_crossorigin;
	}

	if ($website_function_settings["javascript"] == True) {
		$website_javascript_links .= "\t".format($string_to_use, array($link));

		if ($link != array_reverse($javascript_links)[0]) {
			$website_javascript_links .= "\n";
		}
	}
}

$website_javascript_links .= "\n";

?>