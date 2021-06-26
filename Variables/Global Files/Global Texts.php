<?php 

$left_english_text = "left";
$right_english_text = "right";

$watched_string = "Watched";
$to_watch_string = "To_Watch";

$other_stories_text = Language_Item_Definer("Other stories", "Outras histórias");

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
$words_text = Language_Item_Definer("Words", "Palavras");
$copy_text = Language_Item_Definer("Copy", "Copiar");

$read_text = Language_Item_Definer("Read", "Ler");
$send_form_text = Language_Item_Definer("Send", "Enviar");

$website_image_link_text = Language_Item_Definer("image link", "link da imagem");
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

$read_text_lower = strtolower($read_text);
$izaque_sanvezzo_name = "Izaque Sanvezzo (Stake2)";
$izaque_sanvezzo_name_small = "Izaque";
$lulu_black_fazbear_name = "Lulu Black Fazbear";
$lulu_black_fazbear_name_small = "Lulu";
$julia_name = Language_Item_Definer("Julia", "Júlia");
$julia_english_name = "Julia";

$person_names = array(
$izaque_sanvezzo_name_small => $izaque_sanvezzo_name,
$lulu_black_fazbear_name_small => $lulu_black_fazbear_name,
$julia_english_name => $julia_name,
);

$person_names_small = array(
$izaque_sanvezzo_name_small => $izaque_sanvezzo_name_small,
$lulu_black_fazbear_name_small => $lulu_black_fazbear_name_small,
$julia_english_name => $julia_name,
);

$person_names_painted = array(
$izaque_sanvezzo_name_small => Create_Element("span", $w3_text_colors["orange"], $person_names[$izaque_sanvezzo_name_small]),
$lulu_black_fazbear_name_small => Create_Element("span", $w3_text_colors["purple"], $person_names[$lulu_black_fazbear_name_small]),
$julia_english_name => Create_Element("span", $w3_text_colors["pink"], $person_names[$julia_english_name]),
);

$person_names_painted_small = array(
$izaque_sanvezzo_name_small => Create_Element("span", $w3_text_colors["orange"], $person_names_small[$izaque_sanvezzo_name_small]),
$lulu_black_fazbear_name_small => Create_Element("span", $w3_text_colors["purple"], $person_names_small[$lulu_black_fazbear_name_small]),
$julia_english_name => Create_Element("span", $w3_text_colors["pink"], $person_names[$julia_english_name]),
);

$izaque_sanvezzo_name_painted = $person_names_painted[$izaque_sanvezzo_name_small];
$lulu_black_fazbear_name_painted = $person_names_painted[$lulu_black_fazbear_name_small];

$izaque_sanvezzo_name_painted_small = $person_names_painted_small[$izaque_sanvezzo_name_small];
$lulu_black_fazbear_name_painted_small = $person_names_painted_small[$lulu_black_fazbear_name_small];

$julia_name_painted = $person_names_painted[$julia_english_name];

$w3_text_format = "w3-text-{}";

?>