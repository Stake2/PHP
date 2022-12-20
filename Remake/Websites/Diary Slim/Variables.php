<?php 

# Folder variables
$no_language_story_folder = $diary_slim_folder;
$local_chapters_folder = $diary_slim_folder;
$chapter_titles_folder = $diary_slim_database_folder;
$story_chapter_files_folder_language = $local_chapters_folder;
$chapter_titles_file = $chapter_titles_folder."All File Names.txt";
$chapter_titles_en_file = $chapter_titles_file;

$titles_files = array(
$chapter_titles_folder."All Year Folders.txt",
$chapter_titles_folder."All Month Folders.txt",
);

$story_texts_to_replace = array(
"Prova Paraná",
"do Paraná",
"Paraná",
"Paranavaí",
"Morumbi",
"Terra Rica",
"em Maringá",
"Maringá",
"Parqueingá",
"Ubatuba",
"Nova Esperança",
"Alto Paraná",
"Cambé",
"irmão de Nova Aliança",
"equilibrista, Cristiano",
"irmão Cristiano",
"Cristiano (meu irmão)",
"Cristiano",
"equilibrista, John",
"Aline",
"Gabi",
"Leonardo",
"Michel",
"Patrícia",
"caralho",
"filho da puta",
"puta",
"matar",
);

$story_texts_to_add = array(
"prova escolar do estado onde nasci",
"do estado onde nasci",
"estado onde nasci",
"cidade onde nasci",
"bairro da cidade onde nasci",
"cidade onde a maioria dos meus parentes moram",
"na cidade onde minha segunda irmã e o namorado dela moram",
"cidade onde minha segunda irmã e o namorado dela moram",
"parque na cidade onde minha segunda irmã e o namorado dela moram",
"cidade onde minha cunhada morava",
"cidade onde meu irmão e minha cunhada moravam",
"cidade pequena perto da cidade onde nasci",
"cidade onde meu irmão e minha cunhada colocaram o lanche pela segunda vez",
"irmão de uma cidade perto da que nasci",
"equilibrista, John",
"irmão",
"meu irmão",
"meu irmão",
"equilibrista, Cristiano",
"minha primeira irmã",
"minha segunda irmã",
"namorado da minha segunda irmã",
"namorado da minha primeira irmã",
"minha cunhada",
"[palavrão]",
"[palavrão]",
"[palavrão]",
"[coisa ruim]",
);

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

# Re-require of the VStories.php file to set the story name
require $story_variables_php;

# Story Details Definer PHP file includer
require $story_details_definer;

$search_items = array(
"Izaque Sanvezzo (Stake2, Funkysnipa Cat)",
"Story_Manager",
"Gerenciador_De_Historias",
"Watch_History",
"Histórico de Assistidos",
"GamePlayer",
"Jogador de Jogos",
"Tasks",
"Tarefas",
"Nodus",
"HTML",
"Python",
$website_story_name,
Language_Item_Definer("Diary", "Diário"),
);

$replace_items = array(
Create_Element("span", $css_texts["white"], $person_names_painted["Izaque"]),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["blue"], "{}search_item"),
Create_Element("span", $css_texts["brown"], "{}search_item"),
Create_Element("span", $css_texts["blue"], "{}search_item"),
Create_Element("span", $css_texts["blue"], "{}search_item"),
Create_Element("span", $css_texts["blue"], "{}search_item"),
);

$website_information["header_description"] = For_Each_Replace($search_items, $replace_items, $website_information["header_description"]);

$website_settings["variable_inserter"] = False;

# Buttons and tabs definer
# Tab chapter_titles definer
$tab_titles_prototype = array(
$icons_array["open book"],
$icons[12],
);

if ($story_website_settings["show_new_chapter_text"] == True)  {
	$tab_titles_prototype[0] = $tab_titles_prototype[0]." [".$new_text." ".ucwords($chapter_text)." ".$published_blocks."]".$spanc;
}

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;
$custom_tab_names[0] = "";

$custom_tab_titles = array(
$chapter_in_language.": ".$website_language_icon,
": ".Create_Element("span", $w3_text_colors["white"], $stories_number)." ".$icons[11],
);

$custom_tab_titles = Mix_Arrays($custom_tab_names, $custom_tab_titles, $left_or_right = "right");

$tab_texts = array();

Make_Button_Names();

$website_custom_button_bar_numbers = array(
0,
1,
2,
);

# Website name, title, URL and description setter, by language
$website_information["language_title"] = $website_story_name;
$website_information["language_title_with_icon"] = $website_information["language_title"].": ".$icons[11];

?>