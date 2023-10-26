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
if (isset($website["watch_history"]) == False) {
	$website["watch_history"] = [
		"years_list" => Date::Create_Years_List($mode = "array", $start = 2018, $plus = -1)
	];
}

$content = "";

foreach ($website["watch_history"]["years_list"] as $local_year) {
	$website["data"]["year"] = $local_year;

	$id = "past_registry_".$local_year;

	# Define the tab button
	$tab = [
		"id" => $id,
		"name" => $local_year,
		"name_icon" => $local_year.": ".$website["icons"]["calendar"]
	];

	# Add the tab button
	$website["past_registries_buttons"][$website["data"]["year"]] = HTML::Tab_Button($tab)."\n";

	$website["tab_content"]["past_registries"]["string"] .= $website["past_registries_buttons"][$website["data"]["year"]]."\n";

	# Define the tab data
	$content = "";

	# Define the tab content
	if ($local_year != $website["watch_history"]["years_list"][0]) {
		$previous_year = (int)$local_year - 1;

		$previous_year = [
			"id" => "past_registry_".$previous_year,
			"name" => $previous_year,
			"name_icon" => $previous_year.": ".$website["icons"]["calendar"],
			"button_style" => "float: left;"
		];

		$content .= HTML::Tab_Button($previous_year)."\n";
	}

	if ($local_year != array_reverse($website["watch_history"]["years_list"])[0]) {
		$next_year = (int)$local_year + 1;

		$next_year = [
			"id" => "past_registry_".$next_year,
			"name" => $next_year,
			"name_icon" => $next_year.": ".$website["icons"]["calendar"],
			"button_style" => "float: right;"
		];

		$content .= HTML::Tab_Button($next_year)."\n";
	}

	if ($content != "") {
		$content .= "<br /><br />".
		HTML::Element("hr", "", "", $website["data"]["style"]["border_1px"]["theme"]["light"]);
	}

	# Require "Watched.php" to generate the "Watched things" elements and information
	$website["data"]["year"] = $local_year;

	require $website["data"]["files"]["generators"]["watched"];

	$content .= $website["tab_content"]["watched_things"]["string"];

	$website["additional_tabs"]["data"][$local_year] = [
		"id" => $id,
		"name" => $website["language_texts"]["watched_things_in"]." ".$local_year,
		"text_style" => "text-align: left;",
		"content" => $content,
		"icon" => "calendar",
		"add" => " ".$website["data"]["numbers"]["Watched things by year"][$local_year]
	];

	$website["tab_content"]["past_registries"]["number"]++;
}

$website["tab_content"]["past_registries"]["string"] .= "</center>";

# Create the "past_registries" tab template
$website["tabs"]["templates"]["past_registries"] = [
	"name" => $website["language_texts"]["past_registries"],
	"add" => " ".HTML::Element("span", $website["tab_content"]["past_registries"]["number"], "", $website["style"]["text_highlight"]),
	"text_style" => "text-align: left;",
	"content" => $website["tab_content"]["past_registries"]["string"],
	"icon" => "archive"
];

?>