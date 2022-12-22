<?php

# Folders

# folders array
$folders = array(
	"hard_drive_letter" => substr(__FILE__, 0, 2)."/",
);

# Root folders
$names = [
	"Apps",
	"Mega",
	"Mídias",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders[$key] = [
		"root" => $folders["hard_drive_letter"].$item."/",
	];
}

# Apps folders
$names = [
	"App Text Files",
	"Modules",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["apps"][$key] = [
		"root" => $folders["apps"]["root"].$item."/",
	];
}

# App Text Files files
$names = [
	"Language",
	"Tasks",
	"Watch_History",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["apps"]["app_text_files"][$key] = [
		"root" => $folders["apps"]["app_text_files"]["root"].$item."/",
	];
}

# Languages.json file
$folders["apps"]["app_text_files"]["language"]["languages"] = $folders["apps"]["app_text_files"]["language"]["root"]."Languages.json";

# Foreach loop on module names
foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	# "Texts.json" file
	$folders["apps"]["app_text_files"][$key]["texts"] = $folders["apps"]["app_text_files"][$key]["root"]."Texts.json";
}

# Mega folders
$names = [
	"Bloco De Notas",
	"Image",
	"PHP",
	"Stories",
	"Websites",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"][$key] = [
		"root" => $folders["mega"]["root"].$item."/",
	];
}

# Bloco De Notas folders
$names = [
	"Dedicação",
	"Dump",
	"Locked",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["bloco_de_notas"][$key] = [
		"root" => $folders["mega"]["bloco_de_notas"]["root"].$item."/",
	];
}

# Bloco De Notas/Dedicação folders
$names = [
	"Diary",
	"Diary Slim",
	"Networks",
	"Years",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["bloco_de_notas"]["dedicação"][$key] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["root"].$item."/",
	];
}

# Networks/Audiovisual Media Network folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["root"]."Audiovisual Media Network/",
];

# Audiovisual Media Network/Watch History folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["root"]."Watch History/",
];

# Watch History/Watched folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["root"]."Watched/",
];

# Create year Watched folders
foreach (range(2018, date("Y")) as $year) {
	$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$year] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"]["root"].$year."/",
	];

	# "Per Media Type" folder of Current year Watched folder
	$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$year]["per_media_type"] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$year]["root"]."Per Media Type/",
	];

	# "Per Media Type" files folder of Current year Watched folder
	$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$year]["per_media_type"]["files"] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["watched"][$year]["per_media_type"]["root"]."Files/",
	];

	# Years folders
	$folders["mega"]["bloco_de_notas"]["dedicação"]["years"][$year] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["years"]["root"].$year."/",
	];
}

# Productive Network files
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["root"]."Productive Network/",
];

# Productive Network/Media Network Data folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["media_network_data"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["root"]."Media Network Data/",
];

$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["media_network_data"]["task_types"] = $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["media_network_data"]["root"]."Task Types.json";

# Productive Network/Task Data folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_data"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["root"]."Task Data/",
];

# Productive Network/Task History folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_history"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["root"]."Task History/",
];

# 2018 Task Data folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_data"]["2018"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_data"]["root"]."2018/",
];

# Task History year folders
foreach (range(2021, date("Y")) as $year) {
	$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_history"][$year] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_history"]["root"].$year."/",
	];
}

# Temporary define the root PHP folder as the Remake folder, because I am remaking my PHP code structure
$folders["mega"]["php"]["root"] = $folders["mega"]["php"]["root"]."Remake/";

# PHP folders
$names = [
	"Classes",
	"JSON",
	"Modules",
	"Story",
	"Websites",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	if ($item == "Story") {
		$key = "story_folder";
	}

	$folders["mega"]["php"][$key] = [
		"root" => $folders["mega"]["php"]["root"].$item."/",
	];
}

# Classes folders and files
$folders["mega"]["php"]["classes"]["text_files"] = [
	"root" => $folders["mega"]["php"]["classes"]["root"]."Text files/",
];

# Text files files
$names = [
	"Switches",
	"Texts",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", explode(".", strtolower($item))[0]);

	$folders["mega"]["php"]["classes"]["text_files"][$key] = $folders["mega"]["php"]["classes"]["text_files"]["root"].$item.".json";
}

# Classes files
$names = [
	"Class list.txt",
	"Loader.php",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", explode(".", strtolower($item))[0]);

	$folders["mega"]["php"]["classes"][$key] = $folders["mega"]["php"]["classes"]["root"].$item;
}

# JSON files
$names = [
	"Colors",
	"Icons",
	"URL",
	"Website template",
	"Websites",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", explode(".", strtolower($item))[0]);

	$folders["mega"]["php"]["json"][$key] = $folders["mega"]["php"]["json"]["root"].$item.".json";
}

# Modules files
$names = [
	"Slim",
	"TPL",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"]["modules"][$key] = $folders["mega"]["php"]["modules"]["root"].$item.".php";
}

# Website Information files
$folders["mega"]["php"]["websites"]["root_websites"] = $folders["mega"]["php"]["websites"]["root"]."Root websites.json";

# Story files
$names = [
	"Chapter_Tabs",
	"Insert_Variables",
	"Modals",
	"Story_Cards",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"]["story_folder"][$key] = $folders["mega"]["php"]["story_folder"]["root"].$item.".php";
}

# Index PHP files
$names = [
	"Folders",
	"Index",
	"SQL",
	"Story",
	"Website",
	"Website_Dictionary",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"][$key] = $folders["mega"]["php"]["root"].$item.".php";
}

# Mega Stories folders
$folders["mega"]["stories"]["database"] = [
	"root" => $folders["mega"]["stories"]["root"]."Database/",
];

# Mega Stories Database Stories JSON file
$folders["mega"]["stories"]["database"]["stories"] = $folders["mega"]["stories"]["database"]["root"]."Stories.json";

# Mega Websites folders
$names = [
	"Audio",
	"CSS",
	"Images",
	"JavaScript",
	"Texts",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["websites"][$key] = [
		"root" => $folders["mega"]["websites"]["root"].$item."/",
	];
}

# Mega Websites Images folders
$names = [
	"Backgrounds",
	"Icons",
	"Images",
	"Story Covers",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["websites"]["images"][$key] = [
		"root" => $folders["mega"]["websites"]["images"]["root"].$item."/",
	];
}

# Mega Websites Website.json file
$folders["mega"]["websites"]["website"] = $folders["mega"]["websites"]["root"]."Website.json";

# Define PHP folder key as the Mega PHP folder key
$folders["php"] = $folders["mega"]["php"];

?>