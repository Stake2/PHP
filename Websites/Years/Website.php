<?php 

# Create the year buttons string
$year_buttons = "";

foreach ($website["Year buttons"] as $button) {
	$year_buttons .= $button."\n";
}

# Define the tab templates for the "Yearse" website
$website["tabs"]["templates"] = [
	"Years" => [
		"name" => $website["Language texts"]["years, title()"],
		"add" => " ".HTML::Element("span", count($website["Years"]), "", $website["Style"]["text"]["theme"]["dark"]),
		"content" => $year_buttons,
		"icon" => "calendar",
		"Display tab by default" => True
	]
];

?>