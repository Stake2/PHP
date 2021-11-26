<?php

# Website Style.php File Includer
require $website_style_file;

$website_images_folder = $website_media_images_website_images.$website_title."/";

# Buttons and tabs definer
# Tab chapter_titles definer
$tab_titles_prototype = array(
$icons_array["user circle"],
$icons_array["user circle"],
$icons_array["user circle"],
$icons_array["globe"],
);

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(" ", "left"));

$custom_tab_names = $tab_names;

$i = 0;
while ($i <= count($tab_names) - 1) {
	$custom_tab_names[$i] = "";

	$i++;
}

$digital_identity_text = Language_Item_Definer("Digital Identity", "Identidade Digital").": ";

$custom_tab_titles_array = array(
Language_Item_Definer("Person", "Pessoa").": ".str_replace(":", "", $tab_titles[0]),
$digital_identity_text.str_replace(":", "", $tab_titles[1]),
$digital_identity_text.str_replace(":", "", $tab_titles[2]),
$tab_titles[3],
);

$custom_tab_titles_array = Mix_Arrays($custom_tab_names, $custom_tab_titles_array, $left_or_right = "right");

$use_custom_tab_titles_array = True;

$tab_texts = array();

Make_Button_Names();

# Website image link and image size
$image_format = "png";
$website_image = $website_media_images_website_icons.$website_title.".".$image_format;

$website_image_link = $website_image;
$website_image_size_computer = 31;
$website_image_size_mobile = 52;

$names_text = Language_Item_Definer("Names", "Nomes");

$website_html_descriptions_array = array(
Null,
"Website to show who I am in the Internet, created by me, ".Create_Element("span", $text_orange_css_class, "Izaque")."."."<br />".
"I am my two Digital Identities, ".Create_Element("span", $text_orange_css_class, "Stake2").", and ".Create_Element("span", $text_orange_css_class, "Funkysnipa Cat")."<br />".
$names_text.": Izaque, Stake2, Funkysnipa Cat, The Cold Lake Appears.",
"Site para mostrar quem sou eu na Internet, criado por mim, ".Create_Element("span", $text_orange_css_class, "Izaque")."."."<br />".
"Eu sou minhas duas Identidades Digitais, ".Create_Element("span", $text_orange_css_class, "Stake2").", e ".Create_Element("span", $text_orange_css_class, "Funkysnipa Cat")."."."<br />".
$names_text.": Izaque, Stake2, Funkysnipa Cat, The Cold Lake Appears.",
);

$website_descriptions_array = array(
Null,
"Website to show who I am in the Internet, created by me, Izaque.\nI am my two Digital Identities, Stake2, and Funkysnipa Cat.\n".$names_text.": Izaque, Stake2, Funkysnipa Cat, The Cold Lake Appears.",
"Site para mostrar quem sou eu na Internet, criado por mim, Izaque.\nEu sou minhas duas Identidades Digitais, Stake2, e Funkysnipa Cat.\n".$names_text.": Izaque, Stake2, Funkysnipa Cat, The Cold Lake Appears.",
);

# Website name, title, URL and description setter, by language
$website_name = $selected_website;
$website_title = $website_title.", Funkysnipa Cat";
$website_title_header = $website_title.": ".$icons_array["user circle"];
$website_link = $selected_website_url;
$website_meta_description = $website_descriptions_array[$language_number];
$website_header_description = $website_html_descriptions_array[$language_number];

if ($website_language != $language_geral) {
	$website_title .= " ".$website_title_language;
	$website_link .= $website_link_language."/";
}

?>