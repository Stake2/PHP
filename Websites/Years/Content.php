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
if (in_array($website["data"]["title"], $website["years"]) == True) {
	$website["data"]["folders"]["year"] = $folders["Mega"]["Notepad"]["Years"][$website["data"]["title"]];
}

$website["data"]["folders"]["generators"] = [
	"root" => $website["dictionary"]["Years"]["folders"]["php"]["root"]."Generators/"
];

# Define the website files
$website["data"]["files"] = [
	"summary" => "",
	"welcome" => "",
	"this_year_i" => "",
	"generators" => []
];

if (in_array($website["data"]["title"], $website["years"]) == True) {
	$website["data"]["files"]["welcome"] = $website["data"]["folders"]["year"]["root"].$full_language."/".$website["language_texts"]["welcome, title()"].".txt";
	$website["data"]["files"]["summary"] = $website["data"]["folders"]["year"]["root"].$full_language."/".$website["language_texts"]["summary, title()"].".txt";
	$website["data"]["files"]["this_year_i"] = $website["data"]["folders"]["year"]["root"].$full_language."/".$website["language_texts"]["this_year_i"].".txt";
}

# Define the Generator files
$names = [
	"Watched"
];

# Replace the names array with an array with more generators
if (in_array($website["data"]["title"], $website["years"]) == True) {
	$names = [
		"Welcome",
		"Summary",
		"This Year I",
		"Pictures",
		"Memories",
		"Watched",
		"Tasks"
	];
}

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$local_folder = $website["data"]["folders"]["generators"]["root"];

	if ($item == "Watched") {
		$local_folder = $website["dictionary"]["Watch History"]["folders"]["php"]["generators"]["root"];
	}

	if ($item == "Tasks") {
		$local_folder = $website["dictionary"]["Tasks"]["folders"]["php"]["generators"]["root"];
	}

	$website["data"]["files"]["generators"][$key] = $local_folder.$item.".php";
}

$year = $website["data"]["title"];

$website["tab_content"] = [];

$website["tabs"]["To remove"] = [];

# Require generator files to generate tab templates
foreach (array_keys($website["data"]["files"]["generators"]) as $key) {
	$generator_file = $website["data"]["files"]["generators"][$key];

	require $generator_file;
}

# Define the website tabs and data related to the year websites
if (
	$website["data"]["title"] == "Years" or
	in_array($website["data"]["title"], $website["years"])
) {
	$year_buttons = "";

	foreach ($website["years"] as $year) {
		$year_button = $website["dictionary"][$year]["button"];

		$year_buttons .= $year_button."\n";
	}

	# Add tab keys and templates
	$tab_titles = [];

	# Add the "Welcome" tab for years after the year 2022
	if ((int)$website["data"]["title"] >= 2022) {
		array_push($tab_titles, "welcome");
	}

	# Add the "summary" tab
	array_push($tab_titles, "summary");

	# Add the "This Year I" tab for years after the year 2022
	if ((int)$website["data"]["title"] >= 2022) {
		array_push($tab_titles, "this_year_i");
	}

	# Add tabs that all year websites should have
	$more_tabs = [
		"pictures",
		"memories",
		"watched_things",
		"completed_tasks",
		"years",
	];

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
		"name" => $website["language_texts"]["years, title()"],
		"add" => " ".HTML::Element("span", count($website["years"]), "", $website["style"]["text"]["theme"]["dark"]),
		"content" => $year_buttons,
		"icon" => "calendar_days"
	];

	# Move the websites tab template to the end
	$backup = $website["tabs"]["data"]["websites_tab"];

	unset($website["tabs"]["data"]["websites_tab"]);

	$website["tabs"]["data"]["websites_tab"] = $backup;
}

?>