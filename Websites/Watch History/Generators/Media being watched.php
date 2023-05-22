<?php 

# Media being watched.php

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

# Create the "media_being_watched" tab template
$website["tabs"]["templates"]["media_being_watched"] = [
	"name" => $website["language_texts"]["media_being_watched"],
	"add" => " ".HTML::Element("span", "1", "", $website["style"]["text_highlight"]),
	"text_style" => "text-align: left;",
	"content" => "content",
	"icon" => "play"
];

?>