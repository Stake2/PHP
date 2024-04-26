<?php 

# Require the "Story cards.php" file
# To generate the story cards used in the "Stories" tab
require $folders["PHP"]["Story folder"]["Story cards"];

# Define the tab templates for the "Stories" website
$website["tabs"]["templates"] = [
	"Stories" => [
		"name" => $website["Language texts"]["stories, title()"],
		"add" => " ".HTML::Element("span", ($stories["Numbers"]["Total"]), "", $website["Style"]["text"]["theme"]["dark"]),
		"content" => $website["story_cards"],
		"icon" => "book",
		"Display tab by default" => True
	]
];

?>