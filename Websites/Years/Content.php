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

# Define custom website folders
if (in_array($website["data"]["title"], $website["years"]) == True) {
	$website["data"]["folders"]["year"] = $folders["mega"]["bloco_de_notas"]["dedicação"]["years"][$website["data"]["title"]];
}

$website["data"]["folders"]["generators"] = [
	"root" => $website["dictionary"]["Years"]["folders"]["php"]["root"]."Generators/"
];

# Define the website files
$website["data"]["files"] = [
	"summary" => "",
	"this_year_i" => "",
	"generators" => []
];

if (in_array($website["data"]["title"], $website["years"]) == True) {
	$website["data"]["files"]["summary"] = $website["data"]["folders"]["year"]["root"].$full_language."/".$website["language_texts"]["summary, title()"].".txt";
	$website["data"]["files"]["this_year_i"] = $website["data"]["folders"]["year"]["root"].$full_language."/".$website["language_texts"]["this_year_i"].".txt";
}

# Define the Generator files
$names = [
	"Watched"
];

if (in_array($website["data"]["title"], $website["years"]) == True) {
	$names = [
		"Summary",
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

	$website["data"]["files"]["generators"][$key] = $local_folder.$item.".php";
}

$year = $website["data"]["title"];

$website["tab_content"] = [];

# Define tab templates
if (in_array($website["data"]["title"], $website["years"]) == True) {
	$website["tabs"]["templates"]["this_year_i"] = [
		"name" => $website["language_texts"]["this_year_i"],
		"file" => $website["data"]["files"]["this_year_i"],
		"empty_message" => Text::Format($website["language_texts"]["the_{}_text_has_not_been_created_yet"], $website["language_texts"]["this_year_i"]),
		"text_style" => "text-align: left;",
		"icon" => "calendar_days"
	];
}

# Require generator files to generate tab templates
foreach (array_keys($website["data"]["files"]["generators"]) as $key) {
	$generator_file = $website["data"]["files"]["generators"][$key];

	require $generator_file;
}

?>