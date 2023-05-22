<?php 

$thankful_text = Stringfy_Array(Read_Lines($thankful_text_file), $add_br = True);

$search_items = array(
"Izaque Sanvezzo, Stake2, Funkysnipa Cat",
"Twilight Sparkle",
"Fluttershy",
"Pinkie Pie",
"Rainbow Dash",
"Applejack",
"Rarity",
Language_Item_Definer("Don't Watch The Cartoon Called My Little Pony", "Não Assistam Ao Desenho Chamado My Little Pony"),
Language_Item_Definer("The Visit of Izaque", "A Visita de Izaque"),
Language_Item_Definer("Rise to Equestria", "Ascensão à Equestria"),
Language_Item_Definer("A New Generation", "Nova Geração"),
Language_Item_Definer("Brazilian My Little Pony Wikia/Fandom", "Wikia/Fandom My Little Pony Brasil"),
"MLP: FIM",
"MLP",
"Google+",
"4chan",
"/mlp/",
"Fandom",
"2011",
"2013",
"2019",
"Hasbro",
Language_Item_Definer("11/03/2021", "03/11/2021"),
$my_little_pony_fim_name_text,
$my_little_pony_english_name_text,
);

$replace_items = array(
Create_Element("span", $css_texts["orange"], $multi_persons["Izaque"]),
Create_Element("span", $css_texts["light_purple"], "{}search_item"),
Create_Element("span", $css_texts["yellow"], "{}search_item"),
Create_Element("span", $css_texts["pink"], "{}search_item"),
Create_Element("span", $css_texts["blue"], "{}search_item"),
Create_Element("span", $css_texts["orange"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["light_purple"], "{}search_item"),
Create_Element("span", $css_texts["light_purple"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
Create_Element("span", $css_texts["white"], "{}search_item"),
$my_little_pony_name_colored,
$my_little_pony_english_name_colored,
);

$text = For_Each_Replace($search_items, $replace_items, $thankful_text);

$thankful_text = Make_Links_In_Text($text, $css_texts["white"]);

echo Create_Element("div", "", $thankful_text, "style=\"text-align: left;\"");

?>