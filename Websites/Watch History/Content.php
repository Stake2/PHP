<?php 

# Content.php

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

# Define custom website folders
$website["data"]["folders"]["generators"] = [
	"root" => $website["data"]["folders"]["php"]["root"]."Generators/"
];

# Define the website files
$website["data"]["files"] = [
	"generators" => [
		
	]
];

# Define the Generator files
$names = [
	"Media being watched",
	"Past registries"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$website["data"]["files"]["generators"][$key] = $website["data"]["folders"]["generators"]["root"].$item.".php";
}

# Require generator files to generate tab templates
foreach (array_keys($website["data"]["files"]["generators"]) as $key) {
	$generator_file = $website["data"]["files"]["generators"][$key];

	require $generator_file;
}

# Create the "media_being_watched" tab template
$website["tabs"]["templates"]["media_being_watched"] = [
	"name" => $website["language_texts"]["media_being_watched"],
	"add" => " ".HTML::Element("span", "1", "", $website["style"]["text_highlight"]),
	"text_style" => "text-align: left;",
	"content" => "content",
	"icon" => "play"
];

# Create the "past_registries" tab template
$website["tabs"]["templates"]["past_registries"] = [
	"name" => $website["language_texts"]["past_registries"],
	"add" => " ".HTML::Element("span", "4", "", $website["style"]["text_highlight"]),
	"text_style" => "text-align: left;",
	"content" => "content",
	"icon" => "archive"
];

?>