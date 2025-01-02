<?php 

# Content

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

# Define the website "Generators" folder
$website["Data"]["Folders"]["Generators"] = [
	"root" => $website["Data"]["Folders"]["PHP"]["root"]."Generators/"
];

# Define the website files
$website["Data"]["Files"] = [
	"Generators" => []
];

# Define the Generator files
$names = [
	"Tasks",
	"Past registries"
];

foreach ($names as $item) {
	$website["Data"]["Files"]["Generators"][$item] = $website["Data"]["Folders"]["Generators"]["root"].$item.".php";

	$File -> Create($website["Data"]["Files"]["Generators"][$item]);
}

if (isset($website["Data"]["Year"]) == False) {
	$website["Data"]["Year"] = Date::Now()["year"];
}

if (in_array($website["Data"]["title"], $website["Years"]) == True) {
	$website["Data"]["Year"] = $website["Data"]["title"];
}

# Define the data network folder for easier typing
$network_folder = $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"];

# Define the "Tasks" array
$tasks = [
	"Files" => [
		"Per Task Type" => [
			"root" => $network_folder["Task History"][$website["Data"]["Year"]]["Per Task Type"]["root"]
		]
	],
	"Types" => $JSON -> To_PHP($network_folder["Data"]["Types"]),
	"Entries" => "",
	"Texts" => $JSON -> To_PHP($folders["Apps"]["Module files"]["Tasks"]["Texts"]),
	"Language texts" => []
];

$tasks["Language texts"] = $Language -> Item($tasks["Texts"]);

$types_dictionary = $tasks["Types"]["Plural"];

$website["Data"]["Numbers"] = [
	"By year" => [],
	"By type" => []
];

# Define all completed tasks by type as zero (0)
$i = 0;
foreach ($types_dictionary["en"] as $type) {
	$website["Data"]["Numbers"]["By type"][$type] = 0;
}

if (isset($website["Task History"]) == False) {
	$website["Task History"] = [
		"Years list" => Date::Create_Years_List($mode = "array", $start = 2018, $plus = -1)
	];
}

# Define the data network folder for easier typing
$network_folder = $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"];

if (isset($tasks) == False) {
	# Define the "Tasks" array
	$tasks = [
		"Files" => [
			"Per Task Type" => [
				"root" => $network_folder["Task History"][$website["Data"]["Year"]]["Per Task Type"]["root"]
			]
		],
		"Types" => $JSON -> To_PHP($network_folder["Data"]["Types"]),
		"Entries" => "",
		"Texts" => $JSON -> To_PHP($folders["Apps"]["Module files"]["Tasks"]["Texts"]),
		"Language texts" => []
	];

	$tasks["Language texts"] = $Language -> Item($tasks["Texts"]);
}

# Update the "Per Task Type" folder
$tasks["Files"]["Per Task Type"] = [
	"root" => $network_folder["Task History"][$website["Data"]["Year"]]["Per Task Type"]["root"]
];

$tasks["Types dictionary"] = $types_dictionary;

if (function_exists("Generate_Task_Type_Headers") == False) {
	function Generate_Task_Type_Headers($header_text = "", $update_types_dictionary = True) {
		global $website;
		global $Language;
		global $JSON;
		global $tasks;

		$language = "pt";

		if (isset($website["language"]) == True) {
			$language = $website["language"];
		}

		if ($language == "general") {
			$language = "en";
		}

		if ($header_text == "") {
			$header_text = $tasks["Texts"]["tasks, title()"][$language]." [".$website["Data"]["Year"]."]";
		}

		$array = [
			"links" => "",
			"headers" => []
		];

		$text_color = $website["Style"]["text"]["theme"]["dark"];

		$types_dictionary = $tasks["Types dictionary"];

		$tasks["language_types"] = $types_dictionary[$language];

		foreach (array_keys($tasks["Entries"]["Numbers"]["Per Task Type"]) as $task_type) {
			if (in_array($task_type, $types_dictionary["en"]) == False) {
				array_push($types_dictionary["en"], $task_type);

				$text = $task_type;

				$text_key = str_replace(" ", "_", strtolower($task_type));

				if (str_contains($task_type, " ") == False) {
					$text_key .= ", title()";
				}

				if (in_array($task_type, ["Python", "PHP", "AutoHotKey", "HTML"]) == False) {
					$text = $website["Texts"][$text_key][$language];
				}

				if (in_array($text, $tasks["language_types"]) == False) {
					array_push($tasks["language_types"], $text);
				}

				if (in_array($text, $types_dictionary[$language]) == False) {
					array_push($types_dictionary[$language], $text);
				}
			}
		}

		if ($update_types_dictionary == True) {
			$tasks["Types dictionary"] = $types_dictionary;
		}

		# Define a shortcut for the total number of entries in the year
		$total_number = $tasks["Entries"]["Numbers"]["Total"];

		# Iterate through the English plural task types list
		$i = 0;
		foreach ($types_dictionary["en"] as $type) {
			$language_type = $tasks["language_types"][$i];

			if (array_key_exists($type, $tasks["Entries"]["Numbers"]["Per Task Type"])) {
				$number = $tasks["Entries"]["Numbers"]["Per Task Type"][$type];

				# If the number is not zero (0)
				# Or the total number of tasks is zero
				if (
					$number != 0 or
					$total_number == 0
				) {
					$span = HTML::Element("span", $number, "", $text_color);

					$b = HTML::Element("b", $language_type.": ".$span);

					$href = $header_text.": ".$language_type;

					# Anchor element to go to task type list
					if ($number != 0) {
						$a = HTML::Element("a", $b, 'href="#'.$href.'"');
					}

					else {
						$a = HTML::Element("a", $b);
					}

					$array["links"] .= $a."<br />"."\n\t\t";

					$tasks["Files"]["Per Task Type"][$type] = $JSON -> To_PHP($tasks["Files"]["Per Task Type"]["root"].$type."/Tasks.json");

					$span = HTML::Element("span", $number, "", $text_color);

					$b = HTML::Element("b", $language_type.": ".$span);

					# Plural task type header with anchor href to go to task type part
					$a = HTML::Element("a", $b, 'name="'.$href.'"')."<br />";

					$array["headers"][$type] = "\t\t".'<!-- "'.$type.'" task type header -->'."\n".
					"\t\t".$a."\n";
				}
			}

			$i++;
		}

		return $array;
	}
}

foreach ($website["Task History"]["Years list"] as $local_year) {
	# Update the "Per Task Type" folder
	$tasks["Files"]["Per Task Type"] = [
		"root" => $network_folder["Task History"][$local_year]["Per Task Type"]["root"]
	];

	# Define the Entries file
	$entries_file = $network_folder["Task History"][$local_year]["Tasks"];

	if (file_exists($entries_file) == True) {
		$tasks["Entries"] = $JSON -> To_PHP($entries_file);
	}

	Generate_Task_Type_Headers();
}

# Require the generator files to generate the tab templates
foreach (array_keys($website["Data"]["Files"]["Generators"]) as $key) {
	$generator_file = $website["Data"]["Files"]["Generators"][$key];

	require $generator_file;
}

?>