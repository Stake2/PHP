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
	$folders["Apps"][$item] = [
		"root" => $folders["Apps"]["root"].$item."/"
	];
}

# "Apps" files
$folders["Apps"]["Settings"] = $folders["Apps"]["root"]."Settings.json";

# "Module files" folders
$modules = [
	"GamePlayer",
	"Tasks",
	"Watch_History",
	"Utility"
];

foreach ($modules as $item) {
	$key = str_replace("_", " ", $item);

	$folders["Apps"]["Module files"][$key] = [
		"root" => $folders["Apps"]["Module files"]["root"].$item."/"
	];
}

# "Utility" modules
$utility_modules = [
	"Language",
	"Date"
];

foreach ($utility_modules as $item) {
	$folders["Apps"]["Module files"]["Utility"][$item] = [
		"root" => $folders["Apps"]["Module files"]["Utility"]["root"].$item."/"
	];
}

# "Languages.json" file
$folders["Apps"]["Module files"]["Utility"]["Language"]["Languages"] = $folders["Apps"]["Module files"]["Utility"]["Language"]["root"]."Languages.json";

# Add each utility module to the "modules" list
foreach ($utility_modules as $module) {
	array_push($modules, $module);
}

# Foreach loop on the module names list
foreach ($modules as $item) {
	$key = str_replace("_", " ", $item);

	# "Texts.json" file
	if (isset($folders["Apps"]["Module files"][$key]) == True) {
		$folders["Apps"]["Module files"][$key]["Texts"] = $folders["Apps"]["Module files"][$key]["root"]."Texts.json";
	}

	else {
		$folders["Apps"]["Module files"]["Utility"][$key]["Texts"] = $folders["Apps"]["Module files"]["Utility"][$key]["root"]."Texts.json";
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
	$key = $item;

	if ($item == "Notepad") {
		$key = "Notepad";

		$item = "Bloco De Notas";
	}

	$folders["Mega"][$key] = [
		"root" => $folders["Mega"]["root"].$item."/"
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

# Define the list of years
$years_list = range(2018, date("Y"));

if (
	isset($_GET["next_year"]) == True and
	$_GET["next_year"] == True
) {
	array_push($years_list, (int)date("Y") + 1);
}

# Create the year folders
foreach ($years_list as $year) {
	$folders["Mega"]["Notepad"]["Years"][$year] = [
		"root" => $folders["Mega"]["Notepad"]["Years"]["root"].$year."/"
	];
}

$names = [];

foreach ($years_list as $year) {
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

# Notepad "Izaque Sanvezzo" folders
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

# Izaque Sanvezzo "Digital Identities" folders
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

# ---------- #

# Data Networks "Audiovisual Media" folder
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

# "Types.json" file
$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Data"]["Types"] = $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Data"]["root"]."Types.json";

# Audiovisual Media "Information" folder
$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Media information"]["Information"] = $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Media information"]["root"]."Information.json";

# Audiovisual Media "Watch History" folder
$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"] = [
	"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["root"]."Watch History/"
];

# Create year Watched folders
foreach ($years_list as $year) {
	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"]["root"].$year."/"
	];

	# "Entries.json" file
	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["Entries"] = $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["root"]."Entries.json";

	# "Per Media Type" folder of the Watched folder of the current year
	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["Per Media Type"] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["root"]."Per Media Type/"
	];

	# "Per Media Type" files folder of the Watched folder of the current year
	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["Per Media Type"]["Files"] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["Per Media Type"]["root"]."Files/"
	];
}

# ---------- #

# Data Networks "Games" folder
$folders["Mega"]["Notepad"]["Data Networks"]["Games"] = [
	"root" => $folders["Mega"]["Notepad"]["Data Networks"]["root"]."Jogos/"
];

# "Games" folders
$names = [
	"Data",
	"Information",
	"Play History"
];

foreach ($names as $key) {
	$item = $key;

	$folders["Mega"]["Notepad"]["Data Networks"]["Games"][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Games"]["root"].$item."/"
	];
}

# "Types.json" file
$folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Data"]["Types"] = $folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Data"]["root"]."Types.json";

# Games "Information" folder
$folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Information"]["Information"] = $folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Information"]["root"]."Information.json";

# Games "Play History" folder
$folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Play History"] = [
	"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Games"]["root"]."Play History/"
];

# Create year Played folders
foreach ($years_list as $year) {
	$folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Play History"][$year] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Play History"]["root"].$year."/"
	];

	# "Entries.json" file
	$folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Play History"][$year]["Entries"] = $folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Play History"][$year]["root"]."Sessions.json";

	# "Per Game Type" folder of the Played folder of the current year
	$folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Play History"][$year]["Per Game Type"] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Play History"][$year]["root"]."Per Game Type/"
	];
}

# ---------- #

# Data Networks "Productivity" files
$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"] = [
	"root" => $folders["Mega"]["Notepad"]["Data Networks"]["root"]."Produtividade/"
];

# "Productivity" folders
$names = [
	"Data",
	"Task History"
];

foreach ($names as $key) {
	$item = $key;

	$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["root"].$item."/"
	];
}

# "Types.json" file
$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Data"]["Types"] = $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Data"]["root"]."Types.json";

# "Task History" year folders
foreach ($years_list as $year) {
	# Year folder
	$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"]["root"].$year."/"
	];

	# "Per Task Type" folder
	$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year]["Per Task Type"] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year]["root"]."Per Task Type/"
	];

	# "Tasks.json" file
	$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year]["Tasks"] = $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year]["root"]."Tasks.json";
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
	$key = $item;

	if ($item == "Story") {
		$key = "Story folder";
	}

	$folders["Mega"]["PHP"][$key] = [
		"root" => $folders["Mega"]["PHP"]["root"].$item."/"
	];
}

# PHP files
$names = [
	"Dictionary"
];

foreach ($names as $item) {
	$folders["Mega"]["PHP"][$item] = $folders["Mega"]["PHP"]["root"].$item.".json";
}

# Classes folders and files
$folders["Mega"]["PHP"]["Classes"]["Text files"] = [
	"root" => $folders["Mega"]["PHP"]["Classes"]["root"]."Text files/"
];

# Text files files
$names = [
	"Switches",
	"Texts"
];

foreach ($names as $item) {
	$folders["Mega"]["PHP"]["Classes"]["Text files"][$item] = $folders["Mega"]["PHP"]["Classes"]["Text files"]["root"].$item.".json";
}

# Classes files
$names = [
	"Class list.txt",
	"Loader.php"
];

foreach ($names as $item) {
	$key = explode(".", $item)[0];

	$folders["Mega"]["PHP"]["Classes"][$key] = $folders["Mega"]["PHP"]["Classes"]["root"].$item;
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
	$folders["Mega"]["PHP"]["JSON"][$item] = $folders["Mega"]["PHP"]["JSON"]["root"].$item.".json";
}

# Modules files
$names = [
	"Slim",
	"TPL"
];

foreach ($names as $item) {
	$key = str_replace(" ", "_", strtolower($item));

	$folders["Mega"]["PHP"]["Modules"][$key] = $folders["Mega"]["PHP"]["Modules"]["root"].$item.".php";
}

# "Websites.json" file
$folders["Mega"]["PHP"]["Websites"]["Websites"] = $folders["Mega"]["PHP"]["Websites"]["root"]."Websites.json";

# Story files
$names = [
	"Insert variables",
	"Chapter tabs",
	"Modals",
	"Story cards"
];

foreach ($names as $item) {
	$folders["Mega"]["PHP"]["Story folder"][$item] = $folders["Mega"]["PHP"]["Story folder"]["root"].$item.".php";
}

# Index PHP files
$names = [
	"Folders",
	"Functions",
	"Index",
	"SQL",
	"Story",
	"Website",
	"Make website dictionary"
];

foreach ($names as $item) {
	$folders["Mega"]["PHP"][$item] = $folders["Mega"]["PHP"]["root"].$item.".php";
}

# Mega Stories folders
$folders["Mega"]["Stories"]["Database"] = [
	"root" => $folders["Mega"]["Stories"]["root"]."Database/"
];

# Mega Stories Database Stories JSON file
$folders["Mega"]["Stories"]["Database"]["Stories"] = $folders["Mega"]["Stories"]["Database"]["root"]."Stories.json";

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

	$folders["Mega"]["Websites"][$item] = [
		"root" => $folders["Mega"]["Websites"]["root"].$item."/"
	];
}

# Mega Websites Images folders
$names = [
	"Backgrounds",
	"Icons",
	"Images",
	"Story covers"
];

foreach ($names as $item) {
	$folders["Mega"]["Websites"]["Images"][$item] = [
		"root" => $folders["Mega"]["Websites"]["Images"]["root"].$item."/"
	];
}

# Mega "Websites" "Website.json" file
$folders["Mega"]["Websites"]["Website"] = $folders["Mega"]["Websites"]["root"]."Website.json";

# Define the "PHP" key inside the "folders" dictionary as the Mega "PHP" key, for easier typing
$folders["PHP"] = $folders["Mega"]["PHP"];

?>