<?php 

$css_links = array(
"https://www.w3schools.com/lib/w3.css",
$website_css_styler_css_folder."W3",
);

$javascript_folder = $website_function_javascript_folder;

$javascript_links = array(
"https://code.jquery.com/jquery-3.6.0.slim.min",
"https://kit.fontawesome.com/df0c191291",
$javascript_folder."Tabs",
$javascript_folder."Redirect To Website Of User Language",
$javascript_folder."Show Hide",
$javascript_folder."Mobile Side Menu",
$javascript_folder."Set Revised Date",
$javascript_folder."Change Button Color",
$javascript_folder."Hide Chapter Button Images",
);

if ($website_type == $story_website_type) {
	array_push($javascript_links, $website_story_websites_javascript_folder."Open Chapter By Keys");
	array_push($javascript_links, $website_story_websites_javascript_folder."Write Chapter");
}

if ($website_is_prototype_setting == False and $website_settings["custom_layout"] == False) {
	$css_links = array(
	"https://www.w3schools.com/lib/w3",
	$website_css_styler_css_folder."W3",
	$website_css_styler_css_folder."Main_CSS",
	$website_css_website_css_folder.$website_css_file,
	$website_css_styler_css_folder."Colors",
	);
}

if ($website_settings["notifications"] == True) {
	$text = "Notifications";

	array_push($css_links, $website_css_styler_css_folder.$text);
}

# Website CSS links string creator
$website_css_links = "<!-- CSS files -->"."\n";

$css_link_string = '<link rel="stylesheet" type="text/css" href="{}.css" />';

foreach ($css_links as $link) {
	$website_css_links .= format($css_link_string, array($link));

	if ($link != array_reverse($css_links)[0]) {
		$website_css_links .= "\n";
	}
}

# Website JavaScript links string creator
$website_javascript_links = "<!-- JavaScript files -->"."\n";

$javascript_link_string = '<script src="{}.js"></script>';

$javascript_link_string_with_onload = '<script src="{}.js" onLoad="Check_Website_Link();"></script>';
$javascript_link_string_with_crossorigin = '<script src="{}.js" crossorigin="anonymous"></script>';

foreach ($javascript_links as $link) {
	$string_to_use = $javascript_link_string;

	if (strpos($link, "Redirect To Website Of User Language") == True) {
		$string_to_use = $javascript_link_string_with_onload;
	}

	if (strpos($link, "fontawesome") == True) {
		$string_to_use = $javascript_link_string_with_crossorigin;
	}

	$website_javascript_links .= format($string_to_use, array($link));

	if ($link != array_reverse($javascript_links)[0]) {
		$website_javascript_links .= "\n";
	}
}

?>