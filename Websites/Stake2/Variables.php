<?php

$website_images_folder = $website_media_images_website_images.$website_info["english_title"]."/";

# Website image link and image size
$website_info["image_format"] = "png";
$website_info["image_link"] = $website_media_images_website_icons.$website_info["english_title"].".".$website_info["image_format"];

$website_image_size_computer = 31;
$website_image_size_mobile = 52;

$names_text = Language_Item_Definer("Names", "Nomes");

$website_header_descriptions = array(
	Null,
	"Website to show who I am in the Internet, created by me, ".Create_Element("span", $text_orange_css_class, "Izaque")."."."<br />".
	"I am my two Digital Identities, ".Create_Element("span", $text_orange_css_class, "Stake2").", and ".Create_Element("span", $text_orange_css_class, "Funkysnipa Cat")."<br />".
	$names_text.": Izaque, Stake2, Funkysnipa Cat, The Cold Lake Appears.",
	"Site para mostrar quem sou eu na Internet, criado por mim, ".Create_Element("span", $text_orange_css_class, "Izaque")."."."<br />".
	"Eu sou minhas duas Identidades Digitais, ".Create_Element("span", $text_orange_css_class, "Stake2").", e ".Create_Element("span", $text_orange_css_class, "Funkysnipa Cat")."."."<br />".
	$names_text.": Izaque, Stake2, Funkysnipa Cat, The Cold Lake Appears.",
);

$website_descriptions = array(
	Null,
	"Website to show who I am in the Internet, created by me, Izaque.\nI am my two Digital Identities, Stake2, and Funkysnipa Cat.\n".$names_text.": Izaque, Stake2, Funkysnipa Cat, The Cold Lake Appears.",
	"Site para mostrar quem sou eu na Internet, criado por mim, Izaque.\nEu sou minhas duas Identidades Digitais, Stake2, e Funkysnipa Cat.\n".$names_text.": Izaque, Stake2, Funkysnipa Cat, The Cold Lake Appears.",
);

$local_icons = array(
	$icons_array["user circle"],
	$icons_array["user circle"],
	$icons_array["user circle"],
	$icons_array["globe"],
);

$tab_titles_prototype = $local_icons;

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$digital_identity_text = Language_Item_Definer("Digital Identity", "Identidade Digital");

$custom_tab_titles = array(
	Language_Item_Definer("Person", "Pessoa"),
	$digital_identity_text,
	$digital_identity_text,
	"",
);

$custom_tab_titles = Mix_Arrays($custom_tab_titles, $tab_names, $left_or_right = "right", $additinonal_value = array(": ", "left"));
$custom_tab_titles = Mix_Arrays($custom_tab_titles, $local_icons, $left_or_right = "right", $additinonal_value = array(" ", "left"));

$custom_tab_titles[3] = str_replace(": ", "", $custom_tab_titles[3]);
$custom_tab_titles[3] = substr_replace($custom_tab_titles[3], ": ", strlen($custom_tab_titles[3]) - strlen($icons_array["globe"]) - 1, 0);


$tab_texts = array();

Make_Button_Names();

# Website name, title, URL and description setter, by language
$website_info["language_title"] = $website_info["english_title"].", Funkysnipa Cat";
$website_info["language_title_with_icon"] = $website_info["language_title"].": ".$icons_array["user circle"];
$website_info["language_title_with_icon_header"] = $website_info["language_title_with_icon"];

$website_info["meta_description"] = $website_descriptions[$language_number];
$website_info["header_description"] = $website_header_descriptions[$language_number];

?>