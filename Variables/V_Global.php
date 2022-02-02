<?php

$website_info["language_title"] = Language_Item_Definer($website_titles[$selected_website_title], $website_portuguese_titles[$selected_website_title]);
$website_info["language_title_with_icon"] = Language_Item_Definer($website_titles[$selected_website_title], $website_portuguese_titles[$selected_website_title]);
$website_info["english_title"] = $website_titles[$selected_website_title];
$website_info["portuguese_title"] = $website_portuguese_titles[$selected_website_title];
$website_info["language_hyphen"] = $website_link_language;
$website_info["type"] = $website_types[$selected_website_title];
$website_info["link"] = $website_links[$selected_website_title];
$website_info["php_folder"] = $website_php_folders[$website_titles[$selected_website_title]];
$website_info["website_folder"] = $website_folders[$website_titles[$selected_website_title]];
$website_info["author"] = $website_author;

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

if ($website_info["type"] == $story_website_type) {
	$website_story_name = $story_names[$website_info["english_title"]];
	$english_story_name = $english_story_names[$website_info["english_title"]];
	$portuguese_story_name = $portuguese_story_names[$website_info["english_title"]];
}

# Websites array
$i = 0;
foreach ($website_titles as $value) {
	if ($website_info["english_title"] == $value) {
		require $website_variables_files[$value];
	}

	$i++;
}

# Website Style.php File Includer
require $website_style_file;

$website_info["second_text_color_span"] = '<span class="'.$second_text_color.'">{}</span>';

if ($website_info["type"] == $story_website_type) {
	$story_info["author_text"] = Define_Text_By_Number($story_author_number, $author_text, $authors_text);
	$story_info["chapter_text"] = Define_Text_By_Number($chapters, ucwords($chapter_text), $chapters_text);
	$story_info["readers_text"] = Define_Text_By_Number($readers_number, $reader_text, $readers_text);
}

if ($story_status != $story_status_texts[1] or $story_status != $story_status_texts[2]) {
	$new_chapter_text = "";
}

if ($story_website_settings["show_new_chapter_text"] == True) {
	if ($story_status == $story_status_texts[1] or $story_status == $story_status_texts[2]) {
		$new_chapter_text = '<span class="'.$third_text_color.'">'." [".$new_text."!]".$spanc;
	}
}

if ($story_website_settings["show_new_chapter_text"] == False) {
	$new_chapter_text = "";
}

$website_notification = "";

if ($website_settings["notifications"] == True) {
	$website_notification = "\n".$website_notification;
}

$change_website_title_script = '<script>
var old_website_title, current_website_title;

function Get_Title() {
	old_website_title = document.title;
	current_website_title = document.title;
}

function Change_Title() {
	document.title = "(1) " + document.title;
	current_website_title = document.title;
}

function Reset_Title(mode, source = null) {
	if (mode == "chapter") {
		document.title = current_website_title;

		if (source == "notification") {
			document.title = document.title.replace("(1) ", "");
		}
	}

	if (mode == "notification") {
		document.title = document.title.replace("(1) ", "");
		current_website_title = document.title;
	}
}

function Add_To_Website_Title(text_to_add, source = null) {
	Reset_Title("chapter", source);
	document.title = document.title + " " + text_to_add;
}
</script>';

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

if ($website_function_settings["javascript"] == True) {
	$website_js_files = "";
}

if (in_array($website_info["english_title"], $year_websites)) {
	$website_info["meta_description"] = $website_info["header_description"];
}

$header_hr = '<hr class="'.$header_full_border.'" style="margin-left:3%;margin-right:3%;" />';

# Add website info to database
$columns = array(	
"language_title VARCHAR(70) NOT NULL",
"language_title_with_icon VARCHAR(70) NOT NULL",
"english_title VARCHAR(70) NOT NULL",
"portuguese_title VARCHAR(70) NOT NULL",
"language VARCHAR(10) NOT NULL",
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
$columns = $sql -> select("SELECT * FROM ".strtolower(str_replace(" ", "_", $website_info["english_title"]))." WHERE language = '".$website_info["language_hyphen"]."';");

# Adds the website info to the DB if there is no column there
if (count($columns) == 0) {
	$columns = array("language_title", "language_title_with_icon", "english_title", "portuguese_title", "language_hyphen", "type", "link", "php_folder", "website_folder", "meta_description", "header_description", "image_link");
	$values = array();

	foreach ($columns as $column) {
		if ($column != "php_folder" and $column != "website_folder") {
			array_push($values, $website_info[$column]);
		}

		if ($column == "php_folder" or $column == "website_folder") {
			array_push($values, $website_info[$column].$website_info["language_hyphen"]."/");
		}
	}

	Insert_Into_Database_Table($website_info["english_title"], $columns, $values);
}

?>