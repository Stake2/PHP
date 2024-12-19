<?php 

# Create the year buttons string
$year_buttons = "";

foreach ($website["Year buttons"] as $button) {
	$year_buttons .= $button."\n";

	if ($button != end($website["Year buttons"])) {
		$year_buttons .= "<br />";
	}
}

# Define the title of the tab as "Year websites"
$tab_title = $website["Language texts"]["year_websites"];

# Define the tab templates for the "Yearse" website
$website["tabs"]["templates"] = [
	"Years" => [
		"name" => $tab_title,
		"add" => " ".HTML::Element("span", count($website["Years"]), "", $website["Style"]["text"]["theme"]["dark"]),
		"content" => $year_buttons,
		"icon" => "calendar",
		"Display tab by default" => True
	]
];

?>