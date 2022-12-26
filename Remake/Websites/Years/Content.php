<?php 

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
$website["data"]["folders"]["year"] = $folders["mega"]["bloco_de_notas"]["dedicação"]["years"][$website["data"]["title"]];

$website["data"]["folders"]["generators"] = [
	"root" => $website["dictionary"]["Years"]["folders"]["php"]["root"]."Generators/",
];

# Define website files
$website["data"]["files"] = [
	"summary" => $website["data"]["folders"]["year"]["root"].$full_language."/".$website["language_texts"]["summary, title()"].".txt",
	"this_year_i" => $website["data"]["folders"]["year"]["root"].$full_language."/".$website["language_texts"]["this_year_i"].".txt",
	"generators" => [],
];

# Define generator files
$names = [
	"Summary",
	"Watched",
	"Tasks",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$website["data"]["files"]["generators"][$key] = $website["data"]["folders"]["generators"]["root"].$item.".php";
}

$year = $website["data"]["title"];

$website["tab_content"] = [];

# Define tab templates
$website["tabs"]["templates"] = [
	"this_year_i" => [
		"name" => $website["language_texts"]["this_year_i"],
		"file" => $website["data"]["files"]["this_year_i"],
		"empty_message" => Text::Format($website["language_texts"]["the_{}_text_has_not_been_created_yet"], $website["language_texts"]["this_year_i"]),
		"text_style" => "text-align: left;",
		"icon" => "calendar_days",
	],
];

# Require generator files to generate tab templates
foreach (array_keys($website["data"]["files"]["generators"]) as $key) {
	$generator_file = $website["data"]["files"]["generators"][$key];

	require $generator_file;
}

?>