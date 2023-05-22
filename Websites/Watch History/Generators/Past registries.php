<?php 

# Past registries.php

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

# Create the "past_registries" tab template
$website["tabs"]["templates"]["past_registries"] = [
	"name" => $website["language_texts"]["past_registries"],
	"add" => " ".HTML::Element("span", "4", "", $website["style"]["text_highlight"]),
	"text_style" => "text-align: left;",
	"content" => "content",
	"icon" => "archive"
];

?>