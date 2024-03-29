<?php 

$left_english_text = "left";
$right_english_text = "right";

$watched_string = "Watched";

$other_stories_text = Language_Item_Definer("Other stories", "Outras histórias");

$social_media_text = Language_Item_Definer("Social Media", "Redes Sociais");

$in_text = Language_Item_Definer("in", "em");
$on_text = Language_Item_Definer("on", "no");
$or_text = Language_Item_Definer("or", "or");
$and_text = Language_Item_Definer("and", "e");
$of_text = Language_Item_Definer("of", "do");
$of_feminine_text = Language_Item_Definer("of", "da");

$new_text = Language_Item_Definer("New", "Novo");
$new_feminine_text = "Nova";
$name_text = Language_Item_Definer("Name", "Nome");
$number_text = Language_Item_Definer("number", "número");
$english_text_text = "Text";
$text_text = Language_Item_Definer($english_text_text, $english_text_text."o");
$time_text = Language_Item_Definer("Time", "Tempo");
$form_text = Language_Item_Definer("Form", "Formulário");

$word_text = Language_Item_Definer("Word", "Palavra");
$words_text = $word_text."s";

$copy_text = Language_Item_Definer("Copy", "Copiar");

$read_text = Language_Item_Definer("Read", "Ler");
$send_form_text = Language_Item_Definer("Send", "Enviar");

$website_open_image_in_new_tab_text = Language_Item_Definer("Open image in new tab", "Abrir imagem em nova aba");
$website_language_icon = Language_Item_Definer("🇺🇸", "🇧🇷");
$mobile_buttons_menu_text = Language_Item_Definer("Mobile button menu", "Menu de botões mobile");

$edit_text = Language_Item_Definer("Edit text", "Editar texto");
$activate_text = Language_Item_Definer("Activate", "Ativar");
$deactivate_text = Language_Item_Definer("Deactivate", "Desativar");
$copy_html_text = Language_Item_Definer("Copy", "Copiar")." HTML";
$copy_text_text = $copy_text." ".$text_text;

$can_not_find_file_text = Language_Item_Definer("This file could not be found, sorry", "Não foi possível encontrar este arquivo, desculpe");

$english_watched_episodes_text = "Episodes";
$english_watched_times_text = "Times";
$english_watched_media_types_text = "Media Types";

$read_text_lower = mb_strtolower($read_text);

$person_names_array = array(
	"Izaque",
	"Izaque Sanvezzo (Stake2, Funkysnipa Cat)",
	"Izaque White",
	"Izaque Green Water",
	"Julia",
	"Júlia",
	"Ana",
);

$person_name_colors = array(
	"orange",
	"orange",
	"white",
	$text_green_water_css_class,
	"pink",
	"pink",
	"blue",
);

$person_names = array();

# Create person_names with custom variables
$i = 0;
foreach ($person_names_array as $person_name) {
	$name_color = $person_name_colors[$i];

	if ($person_name != "Ana" and in_array($person_name, ["Julia", "Júlia"]) == False) {
		$person_names[$person_name] = "Izaque Sanvezzo (Stake2, Funkysnipa Cat)";
	}

	else {
		$person_names[$person_name] = $person_name;
	}

	if (strpos($name_color, "_") == False) {
		$person_names_painted[$person_name] = Create_Element("span", $w3_text_colors[$name_color], $person_names[$person_name]);
	}

	else {
		$person_names_painted[$person_name] = Create_Element("span", $name_color, $person_names[$person_name]);
	}

	$i++;
}

$person_names_painted["Default"] = $person_names_painted["Izaque"];
$person_names_painted["Default White"] = $person_names_painted["Izaque White"];
$person_names_painted["Izaque Sanvezzo (Stake2, Funkysnipa Cat)W"] = $person_names_painted["Izaque White"];
$person_names_painted["Default Green Water"] = $person_names_painted["Izaque Green Water"];
$person_names_painted["Izaque Sanvezzo (Stake2)"] = $person_names_painted["Izaque"];

$multi_persons["Izaque"] = "Stake2, Funkysnipa Cat, Izaque";

$multi_persons_painted["Izaque"] = Create_Element("span", "w3-text-white", "Stake2").", ".Create_Element("span", "w3-text-white", "Funkysnipa Cat").", ".Create_Element("span", "w3-text-white", "Izaque");

$w3_text_format = "w3-text-{}";

$archived_media_text = Language_Item_Definer("Media", "Mídia");
$archived_text = Language_Item_Definer("Archived", "Arquivado");
$unknown_watched_time_text = Language_Item_Definer("Unknown Watched Time", "Horário Assistido Desconhecido");
$watched_media_text = Language_Item_Definer("Watched Media", "Midias Assistidas");
$rewatched_text = Language_Item_Definer("Re-Watched", "Re-Assistido");
$rewatched_text_en = "Re-Watched";
$rewatched_text_pt = "Re-Assistido";

$english = array(
	"Animes",
	"Cartoons",
	"Series",
	"Movies",
	"Videos",
);

$portuguese = array(
	"Animes",
	"Desenhos",
	"Séries",
	"Filmes",
	"Vídeos",
);

$media_types_plural = Language_Item_Definer($english, $portuguese);

$summary_text = Language_Item_Definer("Summary", "Resumo");
$this_year_i_language_text = Language_Item_Definer("This Year I", "Este Ano Eu");

?>