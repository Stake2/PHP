<?php

# Story

$language = $Language -> user_language;
$full_language = $Language -> full_user_language;

if ($language == "general") {
	$language = "en";
	$full_language = "English";
}

# Create the basic story website tabs
$tab_titles = [
	"read_story",
	"readers",
	"other_stories"
];

$tabs = [];

foreach ($tab_titles as $tab) {
	$tabs[$tab] = [
		"template" => $tab
	];
}

$website["tabs"]["data"] = $website["tabs"]["data"] + $tabs;

# Move the websites tab template to the end
$backup = $website["tabs"]["data"]["websites_tab"];

unset($website["tabs"]["data"]["websites_tab"]);

$website["tabs"]["data"]["websites_tab"] = $backup;

# Require all of the PHP files inside the "Story" folder
$array = $folders["PHP"]["Story folder"];

$keys = array_keys($array);
$keys = array_diff($keys, ["root"]);

foreach ($keys as $key) {
	$file = $array[$key];

	require $file;
}

# "Chapter tabs.php", to generate the chapter tabs
# "Insert variables.php", to create the "Variable Inserter" array
# "Modals.php", to generate the modals for the chapter comments and reads
# "Story cards.php", to generate the story cards used in the "Stories" tab

# Define tab templates for story websites
$website["tabs"]["templates"] = [
	"read_story" => [
		"name" => $website["Language texts"]["read_story"],
		"title" => $website["Language texts"]["chapters_in_[language]"].": ".$website["Language texts"]["language_icon"]." ".HTML::Element("span", $story["Information"]["Chapters"]["Number"], "", $website["Style"]["text"]["theme"]["dark"]),
		"content" => $story["chapter_buttons"],
		"icon" => "open_book"
	],
	"readers" => [
		"name" => $website["Language texts"]["readers, title()"],
		"add" => " ".HTML::Element("span", $story["Information"]["Readers"]["Number"], "", $website["Style"]["text"]["theme"]["dark"]),
		"content" => Text::From_Array($story["Information"]["Readers"]["List"], "", $enumerate = True, $website["Style"]["text_highlight"], "text_hover_white"),
		"icon" => "reader"
	],
	"other_stories" => [
		"name" => $website["Language texts"]["other_stories"],
		"add" => " ".HTML::Element("span", ($stories["Number"]), "", $website["Style"]["text"]["theme"]["dark"]),
		"content" => $website["story_cards"],
		"icon" => "book"
	]
];

?>