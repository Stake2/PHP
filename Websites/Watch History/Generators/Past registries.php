<?php 

# Past registries

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

$website["tab_content"]["past_registries"] = [
	"string" => "<center>",
	"number" => 0
];

if (array_key_exists("additional_tabs", $website) == False) {
	$website["additional_tabs"] = [
		"data" => []
	];
}

$website["past_registries_buttons"] = [];

# Iterate through the years list
if (isset($website["Watch History"]) == False) {
	$website["Watch History"] = [
		"Years list" => Date::Create_Years_List($mode = "array", $start = 2018, $plus = -1)
	];
}

$content = "";

foreach ($website["Watch History"]["Years list"] as $local_year) {
	$website["Data"]["Year"] = $local_year;

	$id = "past_registry_".$local_year;

	# Define the tab button
	$tab = [
		"id" => $id,
		"name" => $local_year,
		"name_icon" => $local_year.": ".$website["Icons"]["calendar"]
	];

	# Add the tab button
	$website["past_registries_buttons"][$website["Data"]["Year"]] = HTML::Tab_Button($tab)."\n";

	$website["tab_content"]["past_registries"]["string"] .= $website["past_registries_buttons"][$website["Data"]["Year"]].
	"<br />"."\n";

	# Define the tab data
	$content = "";

	# Define the tab content
	if ($local_year != $website["Watch History"]["Years list"][0]) {
		$previous_year = (int)$local_year - 1;

		$previous_year = [
			"id" => "past_registry_".$previous_year,
			"name" => $previous_year,
			"name_icon" => $previous_year.": ".$website["Icons"]["calendar"],
			"button_style" => "float: left;"
		];

		$content .= HTML::Tab_Button($previous_year)."\n";
	}

	if ($local_year != end($website["Watch History"]["Years list"])) {
		$next_year = (int)$local_year + 1;

		$next_year = [
			"id" => "past_registry_".$next_year,
			"name" => $next_year,
			"name_icon" => $next_year.": ".$website["Icons"]["calendar"],
			"button_style" => "float: right;"
		];

		$content .= HTML::Tab_Button($next_year)."\n";
	}

	if ($content != "") {
		$content .= "<br /><br />".
		HTML::Element("hr", "", "", $website["Data"]["Style"]["border_1px"]["theme"]["light"]);
	}

	# Require the "Watched" generator to generate the "Watched things" elements and information
	$website["Data"]["Year"] = $local_year;

	require $website["Data"]["Files"]["Generators"]["Watched"];

	$content .= $website["tab_content"]["watched_things"]["string"];

	$website["additional_tabs"]["data"][$local_year] = [
		"id" => $id,
		"name" => $website["Language texts"]["watched_things_in"]." ".$local_year,
		"text_style" => "text-align: left;",
		"content" => $content,
		"icon" => "calendar",
		"add" => " ".$website["Data"]["Numbers"]["By year"][$local_year]
	];

	$website["tab_content"]["past_registries"]["number"]++;
}

$website["tab_content"]["past_registries"]["string"] .= "</center>";

# Create the "past_registries" tab template
$website["tabs"]["templates"]["past_registries"] = [
	"name" => $website["Language texts"]["past_registries"],
	"add" => " ".HTML::Element("span", $website["tab_content"]["past_registries"]["number"], "", $website["Style"]["text"]["theme"]["dark"]),
	"text_style" => "text-align: left;",
	"content" => $website["tab_content"]["past_registries"]["string"],
	"icon" => "archive"
];

?>