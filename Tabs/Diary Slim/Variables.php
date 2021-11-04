<?php 

# Story name definer
$local_story_name = "Diary Slim";
$website_story_name = $story_names[$local_story_name];
$english_story_name = $english_story_names[$local_story_name];
$portuguese_story_name = $portuguese_story_names[$english_story_name];
$general_story_name = $local_story_name." General";

# Folder variables
$selected_website_url = $story_website_links[$english_story_name];

$story_folder = $english_story_name;
$no_language_story_folder = $diary_slim_folder;
$local_chapters_folder = $diary_slim_folder;
$chapter_titles_folder = $diary_slim_database_folder;
$story_chapter_files_folder_language = $local_chapters_folder;
$chapter_titles_file = $chapter_titles_folder."All File Names.txt";
$chapter_titles_enus_file = $chapter_titles_file;

$titles_files = array(
$chapter_titles_folder."All Year Folders.txt",
$chapter_titles_folder."All Month Folders.txt",
);

$website_images_folder = $website_media_images_website_images.$story_folder."/";

$website_image = $website_story_name;
$image_format = "png";

$story_texts_to_replace = array(
"Paranavaí",
"Morumbi",
"Terra Rica",
"Maringá",
"Parqueingá",
"Cambé",
"Nova Esperança",
"Leonardo",
"Michel",
" Cristiano",
" Patrícia",
);

$story_texts_to_add = array(
"[Minha cidade]",
"[Bairro da minha cidade]",
"[Cidade onde a maioria dos meus parentes moram]",
"[Cidade onde minha segunda irmã e o namorado dela moram]",
"[Parque na cidade onde minha segunda irmã e o namorado dela moram]",
"[Cidade onde meu irmão e minha cunhada moram]",
"[Cidade onde meu irmão e minha cunhada moravam]",
"[Namorado da minha segunda irmã]",
"[Namorado da minha primeira irmã]",
" mais velho",
"",
);

# Defines the folder for the chapter text files that are going to be read and the cover folder on the CDN
require $cover_images_folder_definer_php_variable;

# Text File Reader PHP File Includer
require $text_file_reader_file_php;

# Re-require of the VStories.php file to set the story name
require $story_variables_php;

# Story Details Definer PHP file includer
require $story_details_definer;

$search_items = array(
"Izaque",
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
Create_Element("span", $css_texts["white"], $multi_persons["Izaque"]),
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

$website_header_description = For_Each_Replace($search_items, $replace_items, $website_header_description);

$website_form_code = $website_name;

$use_variable_inserter = False;

# Buttons and tabs definer
# Tab chapter_titles definer
$tab_titles_prototype = array(
$icons_array["open book"],
$icons[12],
);

if ($website_settings["show_new_chapter_text"] == True)  {
	$tab_titles_prototype[0] = $tab_titles_prototype[0]." [".$new_text." ".ucwords($chapter_text)." ".$published_blocks."]".$spanc;
}

$tab_titles = Mix_Arrays($tab_names, $tab_titles_prototype, $left_or_right = "right", $additinonal_value = array(": ", "left"));

$custom_tab_names = $tab_names;
$custom_tab_names[0] = "";

$custom_tab_titles_array = array(
$chapter_in_language.": ".$website_language_icon,
": ".Create_Element("span", $w3_text_colors["white"], $stories_number)." ".$icons[11],
);

$custom_tab_titles_array = Mix_Arrays($custom_tab_names, $custom_tab_titles_array, $left_or_right = "right");

$use_custom_tab_titles_array = True;

$tab_texts = array();

Make_Button_Names();

# Website name, title, URL and description setter, by language
$website_title_header = $general_story_name.': '.$icons[11];
$website_link = $selected_website_url;

if ($website_language != $language_geral) {
	$website_title_header = $website_title_text.': '.$icons[11];

	if ($website_language == $ptpt_language) {
		$website_title_text .= " ".$website_title_language;
	}

	$website_link .= $website_link_language."/";
}

$website_custom_button_bar_numbers = array(
0,
1,
);

# Website Style.php File Includer
require $website_style_file;

# Tab Generator.php includer
require $website_tabs_generator;

?>