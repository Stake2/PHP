<?php 

# Tasks

$language = "pt";

if (isset($website["language"]) == True) {
	$language = $website["language"];
}

$full_language = $Language -> languages["full"][$language];

if ($language == "general") {
	$language = "en";
	$full_language = $Language -> languages["full"][$language];
}

# Generate tasks tab content
$website["tab_content"]["tasks"] = [
	"string" => "",
	"number" => 0
];

if (isset($website["data"]["year"]) == False) {
	$website["data"]["year"] = Date::Now()["year"];
}

if (in_array($website["data"]["title"], $website["years"]) == True) {
	$website["data"]["year"] = $website["data"]["title"];
}

if (isset($tasks) == False) {
	# Define the Tasks array
	$tasks = [
		"files" => [
			"per_task_type" => [
				"root" => $folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_history"][$website["data"]["year"]]["per_task_type"]["root"]
			]
		],
		"types" => $JSON -> To_PHP($folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["data"]["types"]),
		"entries" => $JSON -> To_PHP($folders["mega"]["bloco_de_notas"]["dedicação"]["networks"]["productive_network"]["task_history"][$website["data"]["year"]]["tasks"]),
		"texts" => $JSON -> To_PHP($folders["apps"]["module_files"]["tasks"]["texts"]),
		"language_texts" => []
	];
}

$tasks["language_texts"] = $Language -> Item($tasks["texts"]);

if (function_exists("Generate_Task_Type_Headers") == False) {
	function Generate_Task_Type_Headers($header_text = "") {
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
			$header_text = $tasks["texts"]["tasks, title()"][$language]." [".$website["data"]["year"]."]";
		}

		$array = [
			"links" => "",
			"headers" => []
		];

		$task_types = $tasks["types"];
		$tasks["types"] = $tasks["types"]["Plural"]["en"];
		$tasks["language_types"] = $task_types["Plural"][$language];

		foreach (array_keys($tasks["entries"]["Numbers"]["Per Task Type"]) as $task_type) {
			if (in_array($task_type, $tasks["types"]) == False) {
				array_push($tasks["types"], $task_type);

				$text = $task_type;

				$text_key = str_replace(" ", "_", strtolower($task_type));

				if (str_contains($task_type, " ") == False) {
					$text_key .= ", title()";
				}

				if (in_array($task_type, ["Python", "PHP", "AutoHotKey", "HTML"]) == False) {
					$text = $website["texts"][$text_key][$language];
				}

				if (in_array($text, $tasks["language_types"]) == False) {
					array_push($tasks["language_types"], $text);
				}
			}
		}

		# Iterate through the English plural task types list
		$i = 0;
		foreach ($tasks["types"] as $plural_task_type) {
			$language_task_type = $tasks["language_types"][$i];

			if (array_key_exists($plural_task_type, $tasks["entries"]["Numbers"]["Per Task Type"])) {
				$number = $tasks["entries"]["Numbers"]["Per Task Type"][$plural_task_type];

				$span = HTML::Element("span", $number, "", $website["style"]["text_highlight"]);

				$b = HTML::Element("b", $language_task_type.": ".$span);

				$href = $header_text.": ".$language_task_type;

				# Anchor element to go to task type list
				if ($number != 0) {
					$a = HTML::Element("a", $b, 'href="#'.$href.'"');
				}

				else {
					$a = HTML::Element("a", $b);
				}

				$array["links"] .= $a."<br />"."\n\t\t";

				$tasks["files"]["per_task_type"][$plural_task_type] = $JSON -> To_PHP($tasks["files"]["per_task_type"]["root"].$plural_task_type."/Tasks.json");

				$span = HTML::Element("span", $number, "", $website["style"]["text_highlight"]);

				$b = HTML::Element("b", $language_task_type.": ".$span);

				# Plural task type header with anchor href to go to task type part
				$a = HTML::Element("a", $b, 'name="'.$href.'"')."<br />";

				$array["headers"][$plural_task_type] = "\t\t".'<!-- "'.$plural_task_type.'" task type header -->'."\n".
				"\t\t".$a."\n";
			}

			$i++;
		}

		return $array;
	}
}

$task_type_headers = Generate_Task_Type_Headers();

# Update the watched things number
$website["tab_content"]["tasks"]["number"] = $tasks["entries"]["Numbers"]["Total"];

$website["tab_content"]["tasks"]["string"] .= "<!-- Task type headers -->"."\n"."\t\t".
$task_type_headers["links"].
"\n"."\t\t"."<br />"."\n\n";

# Iterate through the English task types list
$i = 0;
foreach ($tasks["types"] as $plural_task_type) {
	$language_task_type = $tasks["language_types"][$i];

	if (array_key_exists($plural_task_type, $tasks["entries"]["Numbers"]["Per Task Type"]) == True) {
		$number = $tasks["entries"]["Numbers"]["Per Task Type"][$plural_task_type];

		if ($number != 0) {
			$website["tab_content"]["tasks"]["string"] .= $task_type_headers["headers"][$plural_task_type];

			# Iterate through the task type Entries list
			foreach ($tasks["files"]["per_task_type"][$plural_task_type]["Entries"] as $entry) {
				$entry = $tasks["entries"]["Dictionary"][$entry];

				# Add the task title
				$format = "Y-m-d\TH:i:s\Z";

				if (strlen($entry["Date"]) == 4) {
					$format = "Y";
				}

				$time = $entry["Date"];

				if ($time != "") {
					$time = Date::Now($time, $format);
				}

				if (strlen($entry["Date"]) != 4) {
					$time = $time["formats"]["HH:MM DD/MM/YYYY"];
				}

				if (strlen($entry["Date"]) == 4) {
					$time = $time["year"];
				}

				$text = $entry["Number"]." -";

				# Add States
				if (array_key_exists("States", $entry) == True) {
					if (array_key_exists("First task in year", $entry["States"]) == True) {
						$first_text = $website["language_texts"]["first_task_in_the_year"];

						$text .= " ".HTML::Element("span", "1# ".$website["icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["style"]["text_highlight"]);
					}

					if (array_key_exists("First task type task in year", $entry["States"]) == True) {
						$first_text = $website["language_texts"]["first_task_per_task_type_in_the_year"];

						$text .= " ".HTML::Element("span", "1# ".$website["icons"]["film"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["style"]["text_highlight"]);
					}
				}

				$title = HTML::Element("span", $entry["Titles"][$language], "", $website["style"]["text_highlight"]);

				$text .= " ".$title." (".$time.")";

				$text = HTML::Element("span", $text, 'style="margin-left: 3%;"', $website["style"]["text_hover"]);

				$website["tab_content"]["tasks"]["string"] .= $text."<br />"."\n";
			}

			if ($plural_task_type != array_reverse($tasks["language_types"])[0]) {
				$website["tab_content"]["tasks"]["string"] .= "\t\t"."<br />"."\n\n";
			}
		}
	}

	$i++;
}

$website["tab_content"]["tasks"]["string"] .= "<br /><br />";

# Add tab to tab templates
$website["tabs"]["templates"]["tasks"] = [
	"name" => $tasks["language_texts"]["tasks, title()"],
	"add" => " ".HTML::Element("span", $website["tab_content"]["tasks"]["number"], "", $website["style"]["text_highlight"]),
	"text_style" => "text-align: left;",
	"content" => $website["tab_content"]["tasks"]["string"],
	"icon" => "check"
];

?>