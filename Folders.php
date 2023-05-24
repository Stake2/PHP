<?php

# Folders

# folders array
$folders = [
	"hard_drive_letter" => substr(__FILE__, 0, 2)."/"
];

# Root folders
$names = [
	"Apps",
	"Mega",
	"Mídias"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders[$key] = [
		"root" => $folders["hard_drive_letter"].$item."/"
	];
}

# Apps folders
$names = [
	"Module files",
	"Modules"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["apps"][$key] = [
		"root" => $folders["apps"]["root"].$item."/"
	];
}

# Apps files
$folders["apps"]["settings"] = $folders["apps"]["root"]."Settings.json";

# "Module files" folders
$modules = [
	"Utility",
	"Tasks",
	"Watch_History"
];

foreach ($modules as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["apps"]["module_files"][$key] = [
		"root" => $folders["apps"]["module_files"]["root"].$item."/"
	];
}

# "Module files" sub-folders
array_push($modules, "Language");

foreach (["Language"] as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["apps"]["module_files"]["utility"][$key] = [
		"root" => $folders["apps"]["module_files"]["utility"]["root"].$item."/"
	];
}

# Languages.json file
$folders["apps"]["module_files"]["utility"]["language"]["languages"] = $folders["apps"]["module_files"]["utility"]["language"]["root"]."Languages.json";

$modules = array_diff($modules, ["Language"]);

# Foreach loop on module names
foreach ($modules as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	# "Texts.json" file
	$folders["apps"]["module_files"][$key]["texts"] = $folders["apps"]["module_files"][$key]["root"]."Texts.json";
}

# Mega folders
$names = [
	"Bloco De Notas",
	"Image",
	"PHP",
	"Stories",
	"Websites"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"][$key] = [
		"root" => $folders["mega"]["root"].$item."/"
	];
}

# Bloco De Notas folders
$names = [
	"Dedicação",
	"Dump",
	"Locked"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["bloco_de_notas"][$key] = [
		"root" => $folders["mega"]["bloco_de_notas"]["root"].$item."/"
	];
}

# Bloco De Notas/Dedicação folders
$names = [
	"Diary",
	"Diary Slim",
	"Izaque Sanvezzo",
	"Networks",
	"Years"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["bloco_de_notas"]["dedicação"][$key] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["root"].$item."/"
	];
}

# Dedicação/Diary (Slim) folders
$names = [];

foreach (range(2018, date("Y")) as $year) {
	$year = (string)$year;

	array_push($names, $year);
}

array_push($names, "Database");
array_push($names, "Story");

foreach (["Diary", "Diary Slim"] as $diary) {
	$diary = str_replace(" ", "_", strtolower($diary));

	foreach ($names as $item) {
		$key = str_replace(" ", "_", strtolower($item));

		$folders["mega"]["bloco_de_notas"]["dedicação"][$diary][$key] = [
			"root" => $folders["mega"]["bloco_de_notas"]["dedicação"][$diary]["root"].$item."/"
		];
	}

	# Diary (Slim)/Story folders
	$sub_files = [
		"Synopsis",
		"Comments",
		"Readers and Reads"
	];

	foreach ($sub_files as $item) {
		$key = str_replace(" ", "_", strtolower($item));

		$folders["mega"]["bloco_de_notas"]["dedicação"][$diary]["story"][$key] = [
			"root" => $folders["mega"]["bloco_de_notas"]["dedicação"][$diary]["story"]["root"].$item."/"
		];
	}
}

# Dedicação/Izaque Sanvezzo folders
$names = [
	"About me - Sobre mim"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));
	$key = str_replace("_-_", "_", $key);

	$folders["mega"]["bloco_de_notas"]["dedicação"]["izaque_sanvezzo"][$key] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["izaque_sanvezzo"]["root"].$item."/"
	];
}

# Izaque Sanvezzo/About me folders
$names = [
	"Social Networks",
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));
	$key = str_replace("_-_", "_", $key);

	$folders["mega"]["bloco_de_notas"]["dedicação"]["izaque_sanvezzo"]["about_me_sobre_mim"][$key] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["izaque_sanvezzo"]["about_me_sobre_mim"]["root"].$item."/"
	];
}

# Networks/Audiovisual Media Network folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["root"]."Audiovisual Media Network/"
];

# "Audiovisual Media Network" folders
$names = [
	"Data",
	"Media Info",
	"Watch History"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"][$key] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["root"].$item."/"
	];
}

# "Audiovisual Media Network/Data" folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["data"]["types"] = $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["data"]["root"]."Types.json";

# "Audiovisual Media Network/Media Info" folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["media_info"]["info"] = $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["media_info"]["root"]."Info.json";

# "Audiovisual Media Network/Watch History" folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["root"]."Watch History/"
];

# Create year Watched folders
foreach (range(2018, date("Y")) as $year) {
	$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"][$year] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"]["root"].$year."/"
	];

	# "Entries.json" file
	$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"][$year]["entries"] = $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"][$year]["root"]."Entries.json";

	# "Per Media Type" folder of current year Watched folder
	$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"][$year]["per_media_type"] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"][$year]["root"]."Per Media Type/"
	];

	# "Per Media Type" files folder of current year Watched folder
	$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"][$year]["per_media_type"]["files"] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["audiovisual_media_network"]["watch_history"][$year]["per_media_type"]["root"]."Files/"
	];

	# Years folders
	$folders["mega"]["bloco_de_notas"]["dedicação"]["years"][$year] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["years"]["root"].$year."/"
	];
}

# Productive Network files
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["root"]."Productive Network/"
];

# Productive Network/Data folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["data"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["root"]."Data/"
];

$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["data"]["types"] = $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["data"]["root"]."Types.json";

# Productive Network/Task History folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_history"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["root"]."Task History/",
];

# 2018 Task Data folder
$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["data"]["2018"] = [
	"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["data"]["root"]."2018/",
];

# Task History year folders
foreach (range(2021, date("Y")) as $year) {
	$folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_history"][$year] = [
		"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_history"]["root"].$year."/"
	];
}

# PHP folders
$names = [
	"Classes",
	"JSON",
	"Modules",
	"Story",
	"Websites"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	if ($item == "Story") {
		$key = "story_folder";
	}

	$folders["mega"]["php"][$key] = [
		"root" => $folders["mega"]["php"]["root"].$item."/"
	];
}

# PHP files
$names = [
	"Website_Information"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"][$key] = $folders["mega"]["php"]["root"].$item.".json";
}

# Classes folders and files
$folders["mega"]["php"]["classes"]["text_files"] = [
	"root" => $folders["mega"]["php"]["classes"]["root"]."Text files/"
];

# Text files files
$names = [
	"Switches",
	"Texts"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", explode(".", strtolower($item))[0]);

	$folders["mega"]["php"]["classes"]["text_files"][$key] = $folders["mega"]["php"]["classes"]["text_files"]["root"].$item.".json";
}

# Classes files
$names = [
	"Class list.txt",
	"Loader.php"
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
	"Websites"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", explode(".", strtolower($item))[0]);

	$folders["mega"]["php"]["json"][$key] = $folders["mega"]["php"]["json"]["root"].$item.".json";
}

# Modules files
$names = [
	"Slim",
	"TPL"
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
	"Story_Cards"
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
	"Website_Dictionary"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["php"][$key] = $folders["mega"]["php"]["root"].$item.".php";
}

# Mega Stories folders
$folders["mega"]["stories"]["database"] = [
	"root" => $folders["mega"]["stories"]["root"]."Database/"
];

# Mega Stories Database Stories JSON file
$folders["mega"]["stories"]["database"]["stories"] = $folders["mega"]["stories"]["database"]["root"]."Stories.json";

# Mega Websites folders
$names = [
	"Audio",
	"CSS",
	"Images",
	"JavaScript",
	"Texts"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["websites"][$key] = [
		"root" => $folders["mega"]["websites"]["root"].$item."/"
	];
}

# Mega Websites Images folders
$names = [
	"Backgrounds",
	"Icons",
	"Images",
	"Story Covers"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["mega"]["websites"]["images"][$key] = [
		"root" => $folders["mega"]["websites"]["images"]["root"].$item."/"
	];
}

# Mega Websites Website.json file
$folders["mega"]["websites"]["website"] = $folders["mega"]["websites"]["root"]."Website.json";

# Define PHP folder key as the Mega PHP folder key
$folders["php"] = $folders["mega"]["php"];

?>