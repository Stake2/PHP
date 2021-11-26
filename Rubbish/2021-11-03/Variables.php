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
"A website to thank and honor the cartoon \"My Little Pony: Friendship is Magic\".<br />For being so good, beautiful, and making me happy, made by Stake2.", 
"Um site para agradecer e honrar o desenho \"My Little Pony: A Amizade é Mágica\".<br />Por ser tão bom, lindo, e me fazer feliz, feito por Stake2.",
);

$website_header_descriptions = array(
Null,
);

$search_items = array(
"Izaque",
);

$replace_items = array(
Create_Element("span", $w3_text_colors["orange"], $multi_persons["Izaque"]),
);

$website_header_descriptions[1] = For_Each_Replace($search_items, $replace_items, $website_descriptions_array[1]);
$website_header_descriptions[2] = For_Each_Replace($search_items, $replace_items, $website_descriptions_array[2]);

# Text File Reader.php file includer
require $text_file_reader_file_php;

# Website name, title, URL and description setter, by language
$website_name = $selected_website;
$website_title = $website_title;
$website_title_header = $website_title;
$website_link = $selected_website_url;
$website_meta_description = $website_descriptions_array[$language_number];
$website_header_description = $website_header_descriptions[$language_number];

if ($website_language != $language_geral) {
	$website_title .= " ".$website_title_language;
	$website_title_header = str_replace(': '.$icons[11], "", $website_title_header);
	$website_link .= $website_link_language."/";
}

$tab_titles_without_html = array();

#Tab texts array
$tab_texts = array(
$tab_names[0],
);

#Tab texts array
$tab_titles_without_html = array(
$tab_names[0],
);

# Website Style.php File Includer
require $website_style_file;

# Tab Generator.php includer
require $website_tabs_generator;

?>