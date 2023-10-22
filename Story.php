<?php

# Story

$language = $Language -> user_language;
$full_language = $Language -> full_user_language;

if ($language == "general") {
	$language = "en";
	$full_language = "English";
}

# Require "Insert_Variables.php" PHP file to create Variable Inserter array
require $folders["php"]["story_folder"]["insert_variables"];

# Require "Chapter_Tabs.php" PHP file to generate chapter tabs
require $folders["php"]["story_folder"]["chapter_tabs"];

# Require "Modals.php" PHP file to generate modals related to chapter comments and reads
require $folders["php"]["story_folder"]["modals"];

# Require "Story_Cards.php" PHP file to generate modals related to chapter comments and reads
require $folders["php"]["story_folder"]["story_cards"];

# Define tab templates for story websites
$website["tabs"]["templates"] = [
	"read story" => [
		"name" => $website["language_texts"]["read_story"],
		"title" => $website["language_texts"]["chapters_in_[language]"].": ".$website["language_texts"]["language_icon"]." ".HTML::Element("span", $story["Information"]["Chapters"]["Number"], "", $website["style"]["text_highlight"]),
		"content" => $story["chapter_buttons"],
		"icon" => "open_book"
	],
	"readers" => [
		"name" => $website["language_texts"]["readers, title()"],
		"add" => " ".HTML::Element("span", $story["Information"]["Readers"]["Number"], "", $website["style"]["text_highlight"]),
		"content" => Text::From_Array($story["Information"]["Readers"]["List"], "", $enumerate = True, $website["style"]["text_highlight"], "text_hover_white"),
		"icon" => "reader"
	],
	"other stories" => [
		"name" => $website["language_texts"]["other_stories"],
		"add" => " ".HTML::Element("span", ($stories["Number"]), "", $website["style"]["text_highlight"]),
		"content" => $website["story_cards"],
		"icon" => "book"
	]
];

?>