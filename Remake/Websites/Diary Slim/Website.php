<?php 

# Diary Slim

$language = $Language -> user_language;
$full_language = $Language -> full_user_language;

if ($language == "general") {
	$language = "en";
	$full_language = "English";
}

$file_names = [
	"File names",
	"Month folders",
	"Year folders",
];

$files = [];
$texts = [];

foreach ($file_names as $file_name) {
	$key = str_replace(" ", "_", strtolower($file_name));

	$file = $folders["mega"]["bloco_de_notas"]["dedicação"]["diary_slim"]["database"]["root"].$file_name.".txt";

	$files[$key] = $file;
	$texts[$key] = File::Contents($file)["lines"];
}

$contents = File::Contents($files["year_folders"]);

$website["data"]["story"]["Information"]["Chapter titles"] = [];
$website["data"]["story"]["Information"]["Chapter dates"] = [];
$website["data"]["story"]["Information"]["Chapter number"] = $contents["length"];

$i = 0;
foreach ($contents["lines"] as $year) {
	$file_name = $year;
	$file_name .= $texts["month_folders"][$i];
	$file_name .= $texts["file_names"][$i];

	array_push($website["data"]["story"]["Information"]["Chapter titles"], $file_name);

	$date = explode(", ", $texts["file_names"][$i])[1];
	$date = str_replace("-", "/", $date);
	array_push($website["data"]["story"]["Information"]["Chapter dates"], $date);

	$i++;
}

$website["data"]["story"]["folders"] = [
	"Chapters" => [
		$full_language => [
			"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["diary_slim"]["root"],
		],
	],
	"Comments" => [
		"Chapter" => $folders["mega"]["bloco_de_notas"]["dedicação"]["diary_slim"]["story"]["comments"]["root"]."Chapter/",
	],
	"Readers and Reads" => [
		"Reads" => $folders["mega"]["bloco_de_notas"]["dedicação"]["diary_slim"]["story"]["readers_and_reads"]["root"]."Reads/",
	],
];

?>