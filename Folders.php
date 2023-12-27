<?php

# Folders.php

# folders array
$folders = [
	"Hard drive letter" => substr(__FILE__, 0, 2)."/"
];

# Root folders
$names = [
	"Apps",
	"Mega",
	"Media",
	"Games"
];

foreach ($names as $item) {
	$key_backup = $item;

	$key = str_replace(" ", "_", strtolower($item));

	if ($item == "Media") {
		$item = "Mídias";
	}

	if ($item == "Games") {
		$item = "Jogos";
	}

	$folders[$key] = [
		"root" => $folders["Hard drive letter"].$item."/"
	];

	$folders[$key_backup] = [
		"root" => $folders["Hard drive letter"].$item."/"
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

# "Apps" files
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

# "Languages.json" file
$folders["apps"]["module_files"]["utility"]["language"]["languages"] = $folders["apps"]["module_files"]["utility"]["language"]["root"]."Languages.json";

# Foreach loop on the module names list
foreach ($modules as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	# "Texts.json" file
	if (isset($folders["apps"]["module_files"][$key]) == True) {
		$folders["apps"]["module_files"][$key]["texts"] = $folders["apps"]["module_files"][$key]["root"]."Texts.json";
	}

	else {
		$folders["apps"]["module_files"]["utility"][$key]["texts"] = $folders["apps"]["module_files"]["utility"][$key]["root"]."Texts.json";
	}
}

# Mega folders
$names = [
	"Notepad",
	"Image",
	"PHP",
	"Stories",
	"Websites"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	if ($item == "Notepad") {
		$key = "Notepad";
		$item = "Bloco De Notas";
	}

	$folders["mega"][$key] = [
		"root" => $folders["mega"]["root"].$item."/"
	];

	$folders["Mega"][$key] = [
		"root" => $folders["mega"]["root"].$item."/"
	];
}

# "Notepad/Effort" folders
$names = [
	"Diary" => "Diário",
	"Diary Slim" => "Diário Slim",
	"Izaque Sanvezzo" => "",
	"Data Networks" => "Redes de Dados",
	"Years" => "Anos"
];

foreach (array_keys($names) as $key) {
	$item = $key;

	if ($names[$item] != "") {
		$item = $names[$item];
	}

	$folders["Mega"]["Notepad"][$key] = [
		"root" => $folders["Mega"]["Notepad"]["root"].$item."/"
	];
}

# "Notepad/Diary (Slim)" folders
$diaries = [
	"Diary",
	"Diary Slim"
];

$names = [];

foreach (range(2018, date("Y")) as $year) {
	$year = (string)$year;

	array_push($names, $year);
}

array_push($names, "Database");
array_push($names, "Story");

foreach ($diaries as $diary) {
	# "Diary (Slim)/Year" folders
	foreach ($names as $item) {
		$key = str_replace(" ", "_", strtolower($item));

		$folders["Mega"]["Notepad"][$diary][$key] = [
			"root" => $folders["Mega"]["Notepad"][$diary]["root"].$item."/"
		];
	}

	# "Diary (Slim)/Story" folders
	$sub_files = [
		"Synopsis",
		"Comments",
		"Readers and Reads"
	];

	foreach ($sub_files as $item) {
		$key = str_replace(" ", "_", strtolower($item));

		$folders["Mega"]["Notepad"][$diary]["story"][$key] = [
			"root" => $folders["Mega"]["Notepad"][$diary]["story"]["root"].$item."/"
		];
	}
}

# "Notepad/Izaque Sanvezzo" folders
$names = [
	"en" => "English",
	"pt" => "Português"
];

foreach (array_keys($names) as $key) {
	$item = $names[$key];

	$folders["Mega"]["Notepad"]["Izaque Sanvezzo"][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Izaque Sanvezzo"]["root"].$item."/"
	];
}

# Define the language "About me" folders
$names = [
	"en" => "About me",
	"pt" => "Sobre mim"
];

$texts = [
	"en" => "Little biography",
	"pt" => "Pequena biografia"
];

foreach (array_keys($names) as $local_language) {
	$key = "About me";
	$item = $names[$local_language];

	# "About me" folder
	$folders["Mega"]["Notepad"]["Izaque Sanvezzo"][$local_language][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Izaque Sanvezzo"][$local_language]["root"].$item."/"
	];

	# "Little biography" folder
	$folders["Mega"]["Notepad"]["Izaque Sanvezzo"][$local_language][$key]["Little biography"] = [
		"root" => $folders["Mega"]["Notepad"]["Izaque Sanvezzo"][$local_language][$key]["root"].$texts[$local_language]."/"
	];
}

# "Izaque Sanvezzo" Social Networks folders
$names = [
	"en" => "Social Networks",
	"pt" => "Redes Sociais"
];

foreach (array_keys($names) as $local_language) {
	$key = "Social Networks";
	$item = $names[$local_language];

	$folders["Mega"]["Notepad"]["Izaque Sanvezzo"][$local_language][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Izaque Sanvezzo"][$local_language]["root"].$item."/"
	];
}

# "Social Networks.json" file
$folders["Mega"]["Notepad"]["Izaque Sanvezzo"]["en"]["Social Networks"]["Social Networks"] = $folders["Mega"]["Notepad"]["Izaque Sanvezzo"]["en"]["Social Networks"]["root"]."Social Networks.json";

# "Izaque Sanvezzo" Digital Identities folders
$names = [
	"Stake2",
	"Funkysnipa Cat"
];

$texts = [
	"en" => "Text",
	"pt" => "Texto"
];

foreach (array_keys($texts) as $local_language) {
	foreach ($names as $key) {
		# Digital Identity folder
		$folders["Mega"]["Notepad"]["Izaque Sanvezzo"][$local_language][$key] = [
			"root" => $folders["Mega"]["Notepad"]["Izaque Sanvezzo"][$local_language]["root"].$key."/"
		];

		# Text file
		$folders["Mega"]["Notepad"]["Izaque Sanvezzo"][$local_language][$key]["Text"] = $folders["Mega"]["Notepad"]["Izaque Sanvezzo"][$local_language][$key]["root"].$texts[$local_language].".txt";
	}
}

# Digital Identity text files


# "Networks/Audiovisual Media" folder
$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"] = [
	"root" => $folders["Mega"]["Notepad"]["Data Networks"]["root"]."Mídia Audiovisual/"
];

# "Audiovisual Media" folders
$names = [
	"Data",
	"Media information",
	"Watch History"
];

foreach ($names as $key) {
	$item = $key;

	if ($item == "Media information") {
		$item = "Informações de mídia";
	}

	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["root"].$item."/"
	];
}

# "Audiovisual Media/Data" folder
$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Data"]["types"] = $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Data"]["root"]."Types.json";

# "Audiovisual Media/Media Information" folder
$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Media information"]["Information"] = $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Media information"]["root"]."Information.json";

# "Audiovisual Media/Watch History" folder
$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"] = [
	"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["root"]."Watch History/"
];

# Create year Watched folders
foreach (range(2018, date("Y")) as $year) {
	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"]["root"].$year."/"
	];

	# "Entries.json" file
	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["entries"] = $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["root"]."Entries.json";

	# "Per Media Type" folder of current year Watched folder
	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["Per Media Type"] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["root"]."Per Media Type/"
	];

	# "Per Media Type" files folder of current year Watched folder
	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["Per Media Type"]["files"] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["Per Media Type"]["root"]."Files/"
	];

	# Years folders
	$folders["Mega"]["Notepad"]["Years"][$year] = [
		"root" => $folders["Mega"]["Notepad"]["Years"]["root"].$year."/"
	];
}

# Productive Network files
$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"] = [
	"root" => $folders["Mega"]["Notepad"]["Data Networks"]["root"]."Produtividade/"
];

# Productive Network/Data folder
$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Data"] = [
	"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["root"]."Data/"
];

$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Data"]["types"] = $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Data"]["root"]."Types.json";

# Productive Network/Task History folder
$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"] = [
	"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["root"]."Task History/"
];

# Task History year folders
foreach (range(2018, date("Y")) as $year) {
	$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"]["root"].$year."/"
	];

	$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year]["Per Task Type"] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year]["root"]."Per Task Type/"
	];

	$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year]["tasks"] = $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year]["root"]."Tasks.json";
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
	"Dictionary"
];

foreach ($names as $item) {
	$folders["mega"]["php"][$item] = $folders["mega"]["php"]["root"].$item.".json";
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
$folders["mega"]["php"]["websites"]["Websites"] = $folders["mega"]["php"]["websites"]["root"]."Websites.json";

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
	"Functions",
	"Index",
	"SQL",
	"Story",
	"Website",
	"Make_Website_Dictionary"
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