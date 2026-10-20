<?php

# Folders.php

# Define the root folders array
$folders = [
	"Hard drive letter" => substr(__FILE__, 0, 2)."/"
];

# Define the root folders
$names = [
	"Python",
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

# Define the Python folders
$names = [
	"Modules",
	"Files"
];

foreach ($names as $item) {
	$folders["Python"][$item] = [
		"root" => $folders["Python"]["root"].$item."/"
	];
}

# "Apps" files
$folders["Python"]["Settings"] = $folders["Python"]["root"]."Settings.json";

# "Module files" folders
$modules = [
	"GamePlayer",
	"Tasks",
	"Watch_History",
	"Utility"
];

foreach ($modules as $item) {
	$key = str_replace("_", " ", $item);

	$folders["Python"]["Files"][$key] = [
		"root" => $folders["Python"]["Files"]["root"].$item."/"
	];
}

# "Utility" modules
$utility_modules = [
	"Language",
	"Date"
];

foreach ($utility_modules as $item) {
	$folders["Python"]["Files"]["Utility"][$item] = [
		"root" => $folders["Python"]["Files"]["Utility"]["root"].$item."/"
	];
}

# "Languages.json" file
$folders["Python"]["Files"]["Utility"]["Language"]["Languages"] = $folders["Python"]["Files"]["Utility"]["Language"]["root"]."Languages.json";

# Add each utility module to the "modules" list
foreach ($utility_modules as $module) {
	array_push($modules, $module);
}

# Foreach loop on the module names list
foreach ($modules as $item) {
	$key = str_replace("_", " ", $item);

	# "Texts.json" file
	if (isset($folders["Python"]["Files"][$key]) == True) {
		$folders["Python"]["Files"][$key]["Texts"] = $folders["Python"]["Files"][$key]["root"]."Texts.json";
	}

	else {
		$folders["Python"]["Files"]["Utility"][$key]["Texts"] = $folders["Python"]["Files"]["Utility"][$key]["root"]."Texts.json";
	}
}

# Mega folders
$names = [
	"Notepad",
	"Images",
	"PHP",
	"Stories",
	"Websites"
];

foreach ($names as $item) {
	$key = $item;

	if ($item == "Notepad") {
		$item = "Bloco de notas";
	}

	if ($item == "Images") {
		$item = "Imagens";
	}

	if ($item == "Stories") {
		$item = "Histórias";
	}

	if ($item == "Websites") {
		$item = "Sites";
	}

	$folders["Mega"][$key] = [
		"root" => $folders["Mega"]["root"].$item."/"
	];
}

# "Notepad" folders
$names = [
	"Diary" => "Diário",
	"Diary Slim" => "Diário Slim",
	"Me" => "",
	"Data Networks" => "Redes de Dados",
	"Years" => "Anos"
];

foreach (array_keys($names) as $key) {
	$item = $key;

	if ($names[$item] != "") {
		$item = $names[$item];
	}

	# If the item is "Me"
	if ($item == "Me") {
		# Require the "Hidden data.php" file
		require "Hidden data.php";
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

# If the "next_year" parameter is inside the URL
# And it is True
if (
	isset($_GET["next_year"]) == True and
	$_GET["next_year"] == True
) {
	# Add the next year to the local list of years
	array_push($years_list, (int)date("Y") + 1);
}

# Create the year folders
foreach ($years_list as $year) {
	$folders["Mega"]["Notepad"]["Years"][$year] = [
		"root" => $folders["Mega"]["Notepad"]["Years"]["root"].$year."/"
	];
}

$names = [
	"Story" => "História"
];

foreach ($diaries as $diary) {
	# "Diary (Slim)/Year" folders
	foreach (array_keys($names) as $key) {
		$item = $names[$key];

		$folders["Mega"]["Notepad"][$diary][$key] = [
			"root" => $folders["Mega"]["Notepad"][$diary]["root"].$item."/"
		];
	}

	# "Diary (Slim)/Story" folders
	$sub_files = [
		"Synopsis" => "Sinopse",
		"Comments" => "Comentários",
		"Readers" => "Leitores"
	];

	foreach (array_keys($sub_files) as $key) {
		$item = $sub_files[$key];

		$folders["Mega"]["Notepad"][$diary]["Story"][$key] = [
			"root" => $folders["Mega"]["Notepad"][$diary]["Story"]["root"].$item."/"
		];
	}
}

# Notepad "Me" folders
$names = [
	"en" => "English",
	"pt" => "Português"
];

foreach (array_keys($names) as $key) {
	$item = $names[$key];

	$folders["Mega"]["Notepad"]["Me"][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Me"]["root"].$item."/"
	];
}

# Define the language "About me" folders
$names = [
	"en" => "About me",
	"pt" => "Sobre mim"
];

$texts = [
	"en" => "Biography",
	"pt" => "Biografia"
];

foreach (array_keys($names) as $local_language) {
	$key = "About me";
	$item = $names[$local_language];

	# "About me" folder
	$folders["Mega"]["Notepad"]["Me"][$local_language][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Me"][$local_language]["root"].$item."/"
	];

	# "Biography" folder
	$folders["Mega"]["Notepad"]["Me"][$local_language][$key]["Biography"] = [
		"root" => $folders["Mega"]["Notepad"]["Me"][$local_language][$key]["root"].$texts[$local_language]."/"
	];
}

# "Me" Social networks folders
$names = [
	"en" => "Social networks",
	"pt" => "Redes sociais"
];

foreach (array_keys($names) as $local_language) {
	$key = "Social networks";
	$item = $names[$local_language];

	$folders["Mega"]["Notepad"]["Me"][$local_language][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Me"][$local_language]["root"].$item."/"
	];
}

# "Social Networks.json" file
$folders["Mega"]["Notepad"]["Me"]["en"]["Social networks"]["Social networks"] = $folders["Mega"]["Notepad"]["Me"]["en"]["Social networks"]["root"]."Social networks.json";

# Me "Digital identities" folders
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
		$folders["Mega"]["Notepad"]["Me"][$local_language][$key] = [
			"root" => $folders["Mega"]["Notepad"]["Me"][$local_language]["root"].$key."/"
		];

		# Text file
		$folders["Mega"]["Notepad"]["Me"][$local_language][$key]["Text"] = $folders["Mega"]["Notepad"]["Me"][$local_language][$key]["root"].$texts[$local_language].".txt";
	}
}

# ---------- #

# Data Networks "Audiovisual Media" folder
$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"] = [
	"root" => $folders["Mega"]["Notepad"]["Data Networks"]["root"]."Mídias Audiovisuais/"
];

# Define and create the "Audiovisual Media" folders
$folder_names = [
	"Data",
	"Media types",
	"Media information",
	"Watch History"
];


foreach ($folder_names as $key) {
	# Define the folder name as the key
	$folder_name = $key;

	# If the folder name is "Media types"
	if ($folder_name == "Media types") {
		# Define the folder name as its user language version
		$folder_name = "Tipos de mídias";
	}

	# If the folder name is "Media information"
	if ($folder_name == "Media information") {
		# Define the folder name as its user language version
		$folder_name = "Informações de mídias";
	}

	# Define the folder inside the "Audiovisual Media" folders dictionary
	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["root"].$folder_name."/"
	];
}

# Define the "Media types.json" file
$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Media types"]["Media types"] = $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Media types"]["root"]."Media types.json";

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

	# "By media type" folder of the Watched folder of the current year
	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["By media type"] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["root"]."By media type/"
	];

	# "By media type" files folder of the Watched folder of the current year
	$folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["By media type"]["Files"] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Audiovisual Media"]["Watch History"][$year]["By media type"]["root"]."Files/"
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
	"Game information",
	"Play History"
];

foreach ($names as $key) {
	$item = $key;

	if ($item == "Data") {
		$item = "Dados";
	}

	if ($item == "Game information") {
		$item = "Informações de jogos";
	}

	$folders["Mega"]["Notepad"]["Data Networks"]["Games"][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Games"]["root"].$item."/"
	];
}

# "Types.json" file
$folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Data"]["Types"] = $folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Data"]["root"]."Types.json";

# Games "Information" folder
$folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Game information"]["Information"] = $folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Game information"]["root"]."Information.json";

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

	# "By game type" folder of the Played folder of the current year
	$folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Play History"][$year]["By game type"] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Games"]["Play History"][$year]["root"]."By game type/"
	];
}

# ---------- #

# Data Networks "Productivity" files
$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"] = [
	"root" => $folders["Mega"]["Notepad"]["Data Networks"]["root"]."Produtividade/"
];

# "Productivity" folders
$names = [
	"Task types",
	"Task History"
];

foreach ($names as $key) {
	$item = $key;

	if ($key == "Task types") {
		$item = "Tipos de tarefas";
	}

	$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"][$key] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["root"].$item."/"
	];
}

# Define the "Task types.json" file
$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task types"]["Task types"] = $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task types"]["root"]."Task types.json";

# "Task History" year folders
foreach ($years_list as $year) {
	# Year folder
	$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"]["root"].$year."/"
	];

	# "By task type" folder
	$folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year]["By task type"] = [
		"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$year]["root"]."By task type/"
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

# "Mega/Stories" "Stories.json" file
$folders["Mega"]["Stories"]["Stories"] = $folders["Mega"]["Stories"]["root"]."Stories.json";

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