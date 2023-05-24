<?php 

# Generate tasks tab content
$website["tab_content"]["tasks"] = [
	"string" => "",
	"number" => 0,
];

# Define Tasks array
$tasks = [
	"folders" => [
		"task_data" => [
			"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["data"]["root"]
		],
		"task_history" => [
			"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_history"]["root"]
		]
	],
	"files" => [
		"texts" => $folders["apps"]["module_files"]["tasks"]["texts"]
	]
];

if ($year == "2018") {
	# Get Task Data folder
	$tasks["folders"]["task_data"][$year] = $tasks["folders"]["task_data"]["root"].$year."/";

	# Define tasks file per user language
	$tasks["files"]["tasks"] = $tasks["folders"]["task_data"][$year].$full_language.".txt";

	# Get file contents
	$contents = $File -> Contents($tasks["files"]["tasks"]);

	# Define tab content string (text)
	$website["tab_content"]["tasks"]["string"] = Text::From_Array($contents["lines"], "", $enumerate = True, $website["style"]["text_highlight"], $class = "text_hover_white");

	# Define text to be added to tab title (number of file lines or done tasks)
	$website["tab_content"]["tasks"]["number"] = $contents["length"];
}

if ($year > "2018" and $year < "2022") {
	# Define task types array
	$task_types = $JSON -> To_PHP($folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["data"]["types"]);

	# Define Task History year folder
	$tasks["folders"]["task_history"] = [
		"root" => $tasks["folders"]["task_history"]["root"].$year."/"
	];

	# Define Per Task Type folder
	$tasks["folders"]["task_history"]["per_task_type"] = [
		"root" => $tasks["folders"]["task_history"]["root"]."Per Task Type/"
	];

	# Define Per Task Type folder
	$tasks["folders"]["task_history"]["per_task_type"]["files"] = [
		"root" => $tasks["folders"]["task_history"]["per_task_type"]["root"]."Files/"
	];

	$file_names = [
		"Tasks",
		"Times"
	];

	$t = 0;
	foreach ($task_types["Plural"]["en"] as $english_task_type) {
		$language_task_type = $task_types["Plural"][$language][$t];

		$tasks["folders"]["task_history"]["per_task_type"]["files"][$plural_media_type] = $tasks["folders"]["task_history"]["per_task_type"]["files"]["root"].$english_task_type."/";

		$tasks["files"][$english_task_type] = [];
		$tasks["texts"][$english_task_type] = [];

		# Define task type files and texts
		foreach ($file_names as $item) {
			$key = str_replace(" ", "_", strtolower($item));

			# Define item file
			$tasks["files"][$english_task_type][$key] = $tasks["folders"]["task_history"]["per_task_type"]["files"][$plural_media_type].$item.".";

			if ($key == "tasks") {
				$tasks["files"][$english_task_type][$key] .= "json";

				# Get contents from item file
				$tasks["texts"][$english_task_type][$key] = $JSON -> To_PHP($tasks["files"][$english_task_type][$key]);
			}

			if ($key != "tasks") {
				$tasks["files"][$english_task_type][$key] .= "txt";

				# Get contents from item file
				$tasks["texts"][$english_task_type][$key] = $File -> Contents($tasks["files"][$english_task_type][$key]);
			}
		}

		$span = HTML::Element("span", count($tasks["texts"][$english_task_type]["tasks"][$language]), "", $website["style"]["text_highlight"]);

		$b = HTML::Element("b", $language_task_type.": ".$span);

		# Anchor element to go to media type list
		if (count($tasks["texts"][$english_task_type]["tasks"][$language]) == 0) {
			$a = HTML::Element("a", $b);
		}

		if (count($tasks["texts"][$english_task_type]["tasks"][$language]) != 0) {
			$a = HTML::Element("a", $b, 'href="#'.$website["language_texts"]["tasks, title()"].": ".$language_task_type.'"');
		}

		$website["tab_content"]["tasks"]["string"] .= $a."<br />"."\n\t\t";

		# Add task number to done tasks number
		$website["tab_content"]["tasks"]["number"] += count($tasks["texts"][$english_task_type]["tasks"][$language]);

		$t++;
	}

	$website["tab_content"]["tasks"]["string"] .= "\n"."\t\t"."<br />"."\n\n";

	$t = 0;
	foreach ($task_types["Plural"]["en"] as $english_task_type) {
		$language_task_type = $task_types["Plural"][$language][$t];

		$folder = $tasks["folders"]["task_history"]["per_task_type"]["files"][$plural_media_type].$english_task_type."/";

		$span = HTML::Element("span", count($tasks["texts"][$english_task_type]["tasks"][$language]), "", $website["style"]["text_highlight"]);

		$b = HTML::Element("b", $language_task_type.": ".$span);

		# Plural media type header with anchor href to go to media type episodes part
		if (count($tasks["texts"][$english_task_type]["tasks"][$language]) != 0) {
			$a = HTML::Element("a", $b, 'href="#'.$website["language_texts"]["tasks, title()"].": ".$language_task_type.'"')."<br />";

			$website["tab_content"]["tasks"]["string"] .= "\t\t".'<!-- "'.$language_task_type.'" task type header -->'."\n".
			"\t\t".$a."\n";

			$i = 0;
			foreach ($tasks["texts"][$english_task_type]["tasks"][$language] as $task) {
				$time = $tasks["texts"][$english_task_type]["times"]["lines"][$i];

				$format = "date_time_format";

				if (strstr($time, ":") == False) {
					$format = "date_format";
				}

				$time = Date::Now($time, $website["texts"][$format]["pt"])[$website["language_texts"][$format]];

				$number = HTML::Element("span", ($i + 1), "", $website["style"]["text_highlight"]);

				$time = HTML::Element("span", "(".$time.")", "", $website["style"]["text_highlight"]);

				$span = HTML::Element("span", "\n"."\t\t\t".$number." - ".$task." ".$time."\n"."\t\t", 'style="margin-left: 3%;"', $website["style"]["text_hover"]);

				$website["tab_content"]["tasks"]["string"] .= "\t\t".$span;

				if ($i != count($tasks["texts"][$english_task_type]["tasks"][$language]) - 1) {
					$website["tab_content"]["tasks"]["string"] .= "<br />"."\n\n";
				}

				$i++;
			}

			if ($english_task_type != array_reverse($task_types["Plural"]["en"])[0] and $tasks["texts"][$english_task_type]["tasks"][$language] != []) {
				$website["tab_content"]["tasks"]["string"] .= "\t\t"."<br /><br />"."\n\n";
			}

			if ($tasks["texts"][$english_task_type]["tasks"][$language] == []) {
				$website["tab_content"]["tasks"]["string"] .= "\t\t"."<br />"."\n\n";
			}
		}

		$t++;
	}

	$website["tab_content"]["tasks"]["string"] .= "<br /><br />";
}

if ($year >= "2018") {
	$website["tab_content"]["tasks"]["string"] .= $year;
}

# Add tab to tab templates
$website["tabs"]["templates"]["tasks"] = [
	"name" => $website["language_texts"]["tasks, title()"],
	"add" => " ".HTML::Element("span", $website["tab_content"]["tasks"]["number"], "", $website["style"]["text_highlight"]),
	"text_style" => "text-align: left;",
	"content" => $website["tab_content"]["tasks"]["string"],
	"icon" => "check"
];

?>