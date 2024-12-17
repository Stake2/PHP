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

# Define the custom website folders
if (in_array($website["Data"]["title"], $website["Years"]) == True) {
	$website["Data"]["Folders"]["Year"] = $folders["Mega"]["Notepad"]["Years"][$website["Data"]["title"]];

	# Define the language folder
	$website["Data"]["Folders"]["Year"]["Language"] = [
		"root" => $website["Data"]["Folders"]["Year"]["root"].$full_language."/"
	];
}

# Define the generators folder
$website["Data"]["Folders"]["Generators"] = [
	"root" => $website["Dictionary"]["Years"]["Folders"]["PHP"]["root"]."Generators/"
];

# Define the website files
$website["Data"]["Files"] = [
	"summary" => "",
	"welcome" => "",
	"this_year_i" => "",
	"goodbye" => "",
	"Generators" => []
];

if (in_array($website["Data"]["title"], $website["Years"]) == True) {
	$keys = array_keys($website["Data"]["Files"]);
	$keys = array_diff($keys, ["Generators"]);

	foreach ($keys as $key) {
		$text_key = $key;

		if (str_contains($text_key, "_") == False) {
			$text_key .= ", title()";
		}

		$website["Data"]["Files"][$key] = $website["Data"]["Folders"]["Year"]["Language"]["root"].$website["Language texts"][$text_key].".txt";
	}
}

# Define the Generator files
$names = [
	"Watched"
];

# Replace the names array with an array with more generators
if (in_array($website["Data"]["title"], $website["Years"]) == True) {
	$names = [
		"Welcome",
		"Summary",
		"This Year I",
		"Pictures",
		"Memories",
		"Watched",
		"Played",
		"Tasks",
		"Goodbye"
	];
}

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$local_folder = $website["Data"]["Folders"]["Generators"]["root"];

	if ($item == "Watched") {
		$local_folder = $website["Dictionary"]["Watch History"]["Folders"]["PHP"]["Generators"]["root"];
	}

	if ($item == "Played") {
		$local_folder = $website["Dictionary"]["Play History"]["Folders"]["PHP"]["Generators"]["root"];
	}

	if ($item == "Tasks") {
		$local_folder = $website["Dictionary"]["Tasks"]["Folders"]["PHP"]["Generators"]["root"];
	}

	$website["Data"]["Files"]["Generators"][$key] = $local_folder.$item.".php";
}

$year = $website["Data"]["title"];

$website["tab_content"] = [];

# Require generator files to generate tab templates
foreach (array_keys($website["Data"]["Files"]["Generators"]) as $key) {
	$generator_file = $website["Data"]["Files"]["Generators"][$key];

	require $generator_file;
}

# Define the website tabs and data related to the year websites
if (
	$website["Data"]["title"] == "Years" or
	in_array($website["Data"]["title"], $website["Years"])
) {
	# Create the year buttons string
	$year_buttons = "";

	foreach ($website["Year buttons"] as $button) {
		$year_buttons .= $button."\n";

		if ($button != end($website["Year buttons"])) {
			$year_buttons .= "<br />";
		}
	}

	# Add tab keys and templates
	$tab_titles = [];

	# Add the "Welcome" tab for years after the year 2022
	if ((int)$website["Data"]["title"] >= 2022) {
		array_push($tab_titles, "welcome");
	}

	# Add the "summary" tab
	array_push($tab_titles, "summary");

	# Add the "This Year I" tab for years after the year 2022
	if ((int)$website["Data"]["title"] >= 2022) {
		array_push($tab_titles, "this_year_i");
	}

	# Add tabs that all year websites should have
	$more_tabs = [
		"pictures",
		"memories",
		"watched_things"
	];

	# Add the "Game sessions played" tab for years after the year 2021
	if ((int)$website["Data"]["title"] >= 2021) {
		array_push($more_tabs, "game_sessions_played");
	}

	array_push($more_tabs, "completed_tasks");

	# Add the "Goodbye" tab for years after the year 2022
	if ((int)$website["Data"]["title"] >= 2022) {
		array_push($more_tabs, "goodbye");
	}

	array_push($more_tabs, "years");

	$tab_titles = array_merge($tab_titles, $more_tabs);

	# Create the dictionaries of the tabs
	$tabs = [];

	foreach ($tab_titles as $tab) {
		if (in_array($tab, $website["tabs"]["To remove"]) == False) {
			$tabs[$tab] = [
				"template" => $tab
			];
		}
	}

	$website["tabs"]["data"] = $website["tabs"]["data"] + $tabs;

	# Create the years tab template
	$website["tabs"]["templates"]["years"] = [
		"name" => $website["Language texts"]["years, title()"],
		"add" => " ".HTML::Element("span", count($website["Years"]), "", $website["Style"]["text"]["theme"]["dark"]),
		"content" => $year_buttons,
		"icon" => "calendar_days"
	];

	# Move the websites tab template to the end
	$backup = $website["tabs"]["data"]["websites_tab"];

	unset($website["tabs"]["data"]["websites_tab"]);

	$website["tabs"]["data"]["websites_tab"] = $backup;
}

?>