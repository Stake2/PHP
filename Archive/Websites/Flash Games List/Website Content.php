<?php 

$list_folder = $website_information["php_folder"]."List/";

echo "\n";

$tab_template = str_replace(' style="display:none;"', "", $tab_template);

Make_Tab_Titles(array($website_information["language_title_with_icon"]));

$content = $tab_html_titles[0];

$links = Read_Lines($list_folder."Links.txt");

$games = Read_Lines($list_folder."Games.txt");

$i = 0;
foreach ($games as $game) {
	$link = $links[$i];

	$game = ($i + 1)." - ".$game;

	$content .= "<b>".Make_Link($link, $game, "a", False, True)."</b>";

	$i++;
}

$array_to_format = array(
"computer_tab_1", "computer_tab_1", "computer_tab_1", "1", $content,
"mobile_tab_1", "computer_tab_1", "computer_tab_1", "1", $content,
);

echo format($tab_template, $array_to_format);

?>