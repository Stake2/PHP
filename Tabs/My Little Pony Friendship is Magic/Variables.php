<?php 

# Website image link and image size
$image_format = "png";
$website_image = $website_media_images_website_icons.$website_title.".".$image_format;

$website_image_link = $website_image;
$website_image_size_computer = 31;
$website_image_size_mobile = 52;

#Website descriptions
$website_descriptions_array = array(
Null,
"A website to thank and honor the cartoon \"My Little Pony: Friendship is Magic\".For being so good, beautiful, and making me happy, made by Stake2.", 
"Um site para agradecer e honrar o desenho \"My Little Pony: A Amizade é Mágica\".Por ser tão bom, lindo, e me fazer feliz, feito por Stake2.",
);

$website_header_descriptions = array(
Null,
);

$search_items = array(
"Izaque",
"For",
"Por",
);

$replace_items = array(
Create_Element("span", $w3_text_colors["orange"], $multi_persons["Izaque"]),
"<br />For",
"<br />Por",
);

$website_header_descriptions[1] = For_Each_Replace($search_items, $replace_items, $website_descriptions_array[1]);
$website_header_descriptions[2] = For_Each_Replace($search_items, $replace_items, $website_descriptions_array[2]);

# Text File Reader.php file includer
require $text_file_reader_file_php;

# Website name, title, URL and description setter, by language
$website_title_header = $website_title_text;
$website_link = $selected_website_url;
$website_meta_description = $website_descriptions_array[$language_number];
$website_header_description = $website_header_descriptions[$language_number];

if ($website_language != $language_geral) {
	$website_title_text .= " ".$website_title_language;
	$website_title_header = str_replace(': '.$icons[11], "", $website_title_header);
	$website_link .= $website_link_language."/";
}

$tab_titles_prototype = array(
$icons_array["open book"]." ".$icons_array["heart"],
);

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;
$custom_tab_names[0] = "";

$custom_tab_titles_array = array(
$tab_titles[0],
);

$custom_tab_titles_array = Mix_Arrays($custom_tab_names, $custom_tab_titles_array, $left_or_right = "right");

$use_custom_tab_titles_array = True;

$tab_texts = array();

Make_Button_Names();

$thankful_text_file_names = array(
$full_language_enus => "Thankful Text",
$full_language_ptbr => "Texto de Agradecimento",
);

foreach ($full_languages_array_no_null as $language) {
	$thankful_text_file = $website_folder.$thankful_text_file_names[$language].".txt";
	Create_File($thankful_text_file);
}

$thankful_text_file = $website_folder.Language_Item_Definer("Thankful Text", "Texto de Agradecimento").".txt";

# Website Style.php File Includer
require $website_style_file;

# Tab Generator.php includer
require $website_tabs_generator;

?>