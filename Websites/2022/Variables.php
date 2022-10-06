<?php 

$summary_text = Language_Item_Definer("Summary", "Resumo");
$this_year_i_language_text = Language_Item_Definer("This Year I", "Este Ano Eu");

$first_template = "Website to show how my ".$website_info["english_title"]." was, and what I did in it.{}\n".
"Made by {}";

$second_template = "Site para mostrar como meu ".$website_info["english_title"]." foi, e o que eu fiz nele.{}\n".
"Feito por {}";

$website_descriptions = array(
	format($first_template, array("", $person_names["Izaque"])),

	format($second_template, array("", $person_names["Izaque"])),
);

$website_header_descriptions = array(
	format($first_template, array("<br>", $person_names_painted["Izaque"])),

	format($second_template, array("<br>", $person_names_painted["Izaque"])),
);

# Website image link and image size
$website_info["image_format"] = "png";
$website_info["image_link"] = $website_media_images_website_icons.$website_info["english_title"].".".$website_info["image_format"];

# Website name, title, URL and description setter, by language
$website_info["language_title"] = Language_Item_Definer("My", "Meu")." ".$website_info["english_title"];
$website_info["language_title_with_icon"] = $website_info["language_title"].": ".$icons_array["calendar"];

$website_info["meta_description"] = $website_descriptions[$language_number - 1].".";
$website_info["header_description"] = $website_header_descriptions[$language_number - 1].".";

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

$tab_titles_prototype = array(
	$icons_array["clipboard"],
	$icons_array["eye"],
	$icons_array["calendar"],
	$icons_array["calendar"],
);

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_titles = array(
	"",
	$every_year_watched_number_array[$website_info["english_title"]],
	"",
	count($year_websites),
);

$custom_tab_titles = Mix_Arrays($tab_titles, $custom_tab_titles, $left_or_right = "right", $additional_value = [" ", "left"]);

$tab_texts = array();

Make_Button_Names();

# PHP read "Years/Texts.json" as $year_summary_texts to create $files key value array

$files = [];

?>