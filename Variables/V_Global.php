<?php

$website_info = array(
"language_title" => Language_Item_Definer($website_titles[$selected_website_title], $website_portuguese_titles[$selected_website_title]),
"english_title" => $website_titles[$selected_website_title],
"portuguese_title" => $website_portuguese_titles[$selected_website_title],
"language" => $website_link_language,
"type" => $website_types[$selected_website_title],
"link" => $website_links[$selected_website_title],
"php_folder" => $website_php_folders[$website_titles[$selected_website_title]],
"website_folder" => $website_folders[$website_titles[$selected_website_title]],
);

$dot_text = ".txt";

$mlp_fim_language_texts_folder = Language_Item_Definer($mlp_fim_english_texts_folder, $mlp_fim_portuguese_texts_folder);
$mlp_fim_episode_list_folder = $mlp_fim_language_texts_folder.Language_Item_Definer("Episode List", "Lista de Episódios")."/";

$year_folders = array();

$year_folders = Add_Years_To_Array($year_folders, $mode = "dict", $custom_value = $notepad_years_folder."{}"."/");

$year_language_folders = array();

foreach ($full_languages_array_no_null as $local_language) {
	$year_language_folders[$local_language] = array();
	$year_language_folders[$local_language] = Add_Years_To_Array($year_language_folders[$local_language], $mode = "dict", $custom_value = $notepad_years_folder."{}"."/".$local_language."/");
}

# CSS definers for specific websites
$website_css_file = $choosed_website_css_file;

# Website CSS and Javascript definer
require $website_css_and_javascript_definer_php;

# Global Normal Functions PHP File Loader
require $normal_functions_file_php;

# Website Style Chooser.php file loader
if ($website_settings["custom_layout"] == False) {
	require $website_style_chooser_file;
}

if ($website_settings["custom_layout"] == False) {
	# Story variables PHP file includer if the website is a story website
	require $story_variables_php;

	# Websites Tab Attributes.php includer
	require $websites_tab_arrays;

	# Story variables PHP file includer if the website is a story website
	require $story_variables_php;
}

# Websites array
$i = 0;
foreach ($website_titles as $value) {
	if ($website_info["english_title"] == $value) {
		require $website_variables_files[$value];
	}

	$i++;
}

$website_info["meta_description"] = $website_meta_description;
$website_info["header_description"] = $website_header_description;

# Website Style.php File Includer
require $website_style_file;

# Tab Generator.php includer
require $website_tabs_generator;

if ($website_info["type"] == $story_website_type and $website_settings["notifications"] == True) {
	# Website notification variables if the website notification setting is True
	# Revised chapter title
	$reviewed_chapter_code = $chapter_buttons[$revised_chapter];
	$reviewed_chapter_button_mobile = $chapter_buttons[$revised_chapter];
}

# Website Image Maker.php file loader
if ($website_settings["custom_layout"] == False) {
	require $website_image_maker;
}

# Website notifications includer if the website has notifications activated
if ($website_settings["notifications"] == True) {
	require $website_notifications_php;
}

if ($website_function_settings["is_prototype"] == False and $website_settings["custom_layout"] == False) {
	require $websites_tab_button_maker;
}

$include_custom_website_head_content = "";

if (isset($custom_website_head_content) == True) {
	$include_custom_website_head_content = "\n".$custom_website_head_content;
}

if ($website_function_settings["js"] == True) {
	$website_js_files = "";
}

$handle = "Stake2__";
$twitter_info = "\n".'<meta name="twitter:card" content="summary" />
<meta name="twitter:website" value="@'.$handle.'" />
<meta name="twitter:site" value="@'.$handle.'" />
<meta name="twitter:creator" content="@'.$handle.'" />
<meta content="summary_large_image" name="twitter:card" />
<meta content="'.$website_info["link"].'" name="twitter:url" />';

$website_head = '
<title>'.$website_title_text.'</title>
<meta property="og:type" content="website" />
<meta property="og:title" content="'.$website_title_text.'" />
<meta property="og:site_name" content="'.$website_title_text.'" />
<meta property="og:url" content="'.$website_info["link"].'" />
<meta property="og:image" content="'.$website_image.'" />
<meta property="og:description" content="'.$website_meta_description.'" />
<meta property="og:locale" content="en_US" />
<meta property="og:locale:alternate" content="pt_BR" />
<meta property="og:locale:alternate" content="pt_PT" />
<link rel="canonical" href="'.$website_info["link"].'" />
<link rel="icon" type="image/'.$image_format.'" href="'.$website_image.'" />
<link rel="image_src" type="image/'.$image_format.'" href="'.$website_image.'" />
<meta name="description" content="'.$website_meta_description.'" />
<meta content="#916f3b" name="theme-color" />'
.$twitter_info.'
<meta name="revised" content="'."Stake2's Enterprise TM".', '.$data.'" />
<meta name="author" content="Stake2" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=yes" />
<meta charset="UTF-8" />'.
"\n"."\n".$website_css_links.
"\n"."\n".$website_javascript_links.
$include_custom_website_head_content;

if (in_array($website_info["english_title"], $year_websites)) {
	$website_meta_description = $website_header_description;
}

require $website_header_php;

# Add website info to database
$columns = array(
"language_title VARCHAR(60) NOT NULL",
"english_title VARCHAR(60) NOT NULL",
"portuguese_title VARCHAR(60) NOT NULL",
"language VARCHAR(60) NOT NULL",
"type VARCHAR(60) NOT NULL",
"link VARCHAR(256) NOT NULL",
"php_folder VARCHAR(500) NOT NULL",
"website_folder VARCHAR(500) NOT NULL",
"meta_description VARCHAR(1000) NOT NULL",
"header_description VARCHAR(1000) NOT NULL",
"image_link VARCHAR(256) NOT NULL",
);

Create_Database_Table($website_info["english_title"], $columns);

# Gets results from SQL Database
$sql = new SQL();
$columns = $sql -> select("SELECT * FROM ".strtolower(str_replace(" ", "_", $website_info["english_title"]))." WHERE language = '".$website_info["language"]."';");

# Adds the website info to the DB if there is no column there
if (count($columns) == 0) {
	$columns = array("language_title", "english_title", "portuguese_title", "language", "type", "link", "php_folder", "website_folder", "meta_description", "header_description", "image_link");
	$values = array();

	foreach ($columns as $column) {
		if ($column != "php_folder" and $column != "website_folder") {
			array_push($values, $website_info[$column]);
		}

		if ($column == "php_folder" or $column == "website_folder") {
			array_push($values, $website_info[$column].$website_info["language"]."/");
		}
	}

	Insert_Into_Database_Table($website_info["english_title"], $columns, $values);
}

?>