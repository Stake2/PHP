<?php 

# Change the website title to a colored one, word by word

$items = [
	"My L" => [
		"Color" => "light_purple"
	],
	"ittle" => [
		"Color" => "yellow"
	],
	"Pony" => [
		"Color" => "pink"
	],
	"A Amizad" => [
		"Color" => "blue"
	],
	"Friendshi" => [
		"Color" => "blue"
	],
	"e É M" => [
		"Color" => "orange"
	],
	"p is M" => [
		"Color" => "orange"
	],
	"ágica" => [
		"Color" => "orange"
	],
	"agic" => [
		"Color" => "orange"
	]
];

foreach (array_keys($items) as $item) {
	$color = "text_".$items[$item]["Color"];

	$span = HTML::Element("span", $item, "", $color);

	$website["Data"]["titles"]["icon"] = str_replace($item, $span, $website["Data"]["titles"]["icon"]);
}

# Define tab template for identity
$website["tabs"]["templates"]["thanks"] = [
	"name" => "Thanks",
	"title" => $website["Language texts"]["thanks, title()"],
	"icon" => "heart"
];

$website["tabs"]["templates"]["thanks"]["content"] = "Conteúdo";

?>