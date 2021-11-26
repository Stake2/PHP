<?php 

$local_website_name = $website_title_backup;
$local_current_year = (int)$local_website_name;

$selected_website_url = $website_links[$local_website_name];
$website_folder = $website_folders[$local_website_name];

$image_format = "png";
$website_image = $website_media_images_website_icons.$website_title.".".$image_format;

$website_image_link = $website_image;

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

$website_descriptions_array = array(
Null,
"Website to show how my $local_website_name was, and what I did in it, made by ".$person_names_array["Izaque"], 
"Site para mostrar como meu $local_website_name foi, e o que eu fiz nele, feito por ".$person_names_array["Izaque"],
);

$website_html_descriptions_array = array(
Null,
str_replace($local_website_name, Create_Element("span", $text_blue_css_class, $local_website_name), str_replace($person_names_array["Izaque"], $person_names_painted["Izaque"], $website_descriptions_array[1])),
str_replace($local_website_name, Create_Element("span", $text_blue_css_class, $local_website_name), str_replace($person_names_array["Izaque"], $person_names_painted["Izaque"], $website_descriptions_array[2])),
);

# Website name, title, URL and description setter, by language
$website_name = $selected_website;
$website_title = Language_Item_Definer("My", "Meu")." ".$website_title;
$website_title_header = $website_title.": ".$icons_array["calendar"];
$website_link = $selected_website_url;
$website_meta_description = $website_descriptions_array[$language_number].".";
$website_header_description = $website_html_descriptions_array[$language_number].".";

if ($website_language != $language_geral) {
	$website_title .= " ".$website_title_language;
	$website_title_header = $website_title_header;
	$website_link .= $website_link_language."/";
}

$i = 0;
foreach ($tab_names as $tab_title) {
	$tab_titles_prototype[$i] = "";

	$i++;
}

$tab_titles_prototype[0] = $icons_array["clipboard"];
$tab_titles_prototype[1] = $icons_array["eye"];
$tab_titles_prototype[2] = $icons_array["calendar"];

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;
$custom_tab_names[0] = $tab_titles[0];
$custom_tab_names[1] = str_replace($icons_array["eye"], "", $tab_titles[1]).Line_Number($data_files["Watched Things"]);
$custom_tab_names[2] = $tab_titles[2];

$custom_tab_titles_array = array();

$i = 0;
foreach ($tab_titles as $tab_title) {
	$custom_tab_titles_array[$i] = "";

	$i++;
}

$custom_tab_titles_array = Mix_Arrays($custom_tab_names, $custom_tab_titles_array, $left_or_right = "right");

$use_custom_tab_titles_array = True;

$tab_texts = array();

Make_Button_Names();

?>