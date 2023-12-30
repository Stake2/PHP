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
$website["tab_content"]["completed_tasks"] = [
	"string" => "",
	"number" => 0
];

# Create additional tabs array
if (array_key_exists("additional_tabs", $website) == False) {
	$website["additional_tabs"] = [
		"data" => []
	];
}

if (isset($website["data"]["year"]) == False) {
	$website["data"]["year"] = Date::Now()["year"];
}

if (in_array($website["data"]["title"], $website["years"]) == True) {
	$website["data"]["year"] = $website["data"]["title"];
}

if (isset($tasks) == False) {
	# Define the Tasks array
	$tasks = [
		"Files" => [
			"Per Task Type" => [
				"root" => $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$website["data"]["year"]]["Per Task Type"]["root"]
			]
		],
		"types" => $JSON -> To_PHP($folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Data"]["types"]),
		"entries" => "",
		"texts" => $JSON -> To_PHP($folders["apps"]["module_files"]["tasks"]["texts"]),
		"language_texts" => []
	];
}

# Define the Entries file
$entries_file = $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"]["Task History"][$website["data"]["year"]]["tasks"];

if (file_exists($entries_file) == True) {
	$tasks["entries"] = $JSON -> To_PHP($entries_file);

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

			$text_color = $website["style"]["text"]["theme"]["dark"];

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

					$span = HTML::Element("span", $number, "", $text_color);

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

					$tasks["Files"]["Per Task Type"][$plural_task_type] = $JSON -> To_PHP($tasks["Files"]["Per Task Type"]["root"].$plural_task_type."/Tasks.json");

					$span = HTML::Element("span", $number, "", $text_color);

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
	$website["tab_content"]["completed_tasks"]["number"] = $tasks["entries"]["Numbers"]["Total"];

	$website["tab_content"]["completed_tasks"]["string"] .= "<!-- Task type headers -->"."\n"."\t\t".
	$task_type_headers["links"].
	"\n"."\t\t"."<br />"."\n\n";

	$text_color = $website["style"]["text"]["theme"]["dark"];

	# Iterate through the English task types list
	$i = 0;
	foreach ($tasks["types"] as $plural_task_type) {
		$language_task_type = $tasks["language_types"][$i];

		if (array_key_exists($plural_task_type, $tasks["entries"]["Numbers"]["Per Task Type"]) == True) {
			$number = $tasks["entries"]["Numbers"]["Per Task Type"][$plural_task_type];

			if ($number != 0) {
				$website["tab_content"]["completed_tasks"]["string"] .= $task_type_headers["headers"][$plural_task_type];

				# Iterate through the task type Entries list
				foreach ($tasks["Files"]["Per Task Type"][$plural_task_type]["Entries"] as $entry) {
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

					# Add the States
					if (array_key_exists("States", $entry) == True) {
						if (array_key_exists("First task in year", $entry["States"]) == True) {
							$first_text = $website["language_texts"]["first_task_in_the_year"];

							$text .= " ".HTML::Element("span", "1# ".$website["icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["style"]["text_highlight"]." underline_on_hover");
						}

						if (array_key_exists("First task type task in year", $entry["States"]) == True) {
							$first_text = $website["language_texts"]["first_task_per_task_type_in_the_year"];

							$text .= " ".HTML::Element("span", "1# ".$website["icons"]["list_check"]." ".$website["icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["style"]["text_highlight"]." underline_on_hover");
						}

						if (
							array_key_exists("First task in year", $entry["States"]) == True or
							array_key_exists("First task type task in year", $entry["States"]) == True
						) {
							$text .= " - ";
						}
					}

					$title = HTML::Element("span", $entry["Titles"][$language], "", $text_color);

					if ($website["States"]["Tasks"]["Entry tabs"] == True and (int)$website["data"]["year"] >= 2023) {
						# Add the task description tab link and create the tab
						$link_text = $website["language_texts"]["task_description"];

						$tab_id = "task_description_".$entry["Number"];

						$style = 'style="text-decoration: underline; cursor: pointer;"';

						$title = HTML::Element("a", $title, 'onclick="'."Open_Tab('".$tab_id."')".'" target="_blank" alt="'.$link_text.'" title="'.$link_text.'" '.$style, $text_color);

						# Create the tab title
						$tab_title = $entry["Number"]." - ".$entry["Titles"][$language]." (".$time.")";

						# Get the task description file
						$folder = $folders["Mega"]["Notepad"]["Years"][$website["data"]["year"]][$language]["done_tasks"]["root"].$language_task_type."/";

						$local_entry = str_replace(":", ";", $entry["Entry"]);
						$local_entry = str_replace("/", "-", $local_entry);

						$file = $folder.$local_entry.".txt";

						# Create the tab array and content
						$website["additional_tabs"]["data"][$tab_id] = [
							"id" => $tab_id,
							"name" => $tab_title,
							"text_style" => "text-align: left;",
							"file" => $file,
							"icon" => "list_check",
							"only_button" => "tasks"
						];
					}

					$text .= " ".$title." (".$time.")";

					$text = HTML::Element("span", $text, 'style="margin-left: 3%;"', $website["style"]["text_hover"]);

					$website["tab_content"]["completed_tasks"]["string"] .= $text."<br />"."\n";
				}

				if ($plural_task_type != array_reverse($tasks["language_types"])[0]) {
					$website["tab_content"]["completed_tasks"]["string"] .= "\t\t"."<br />"."\n\n";
				}
			}
		}

		$i++;
	}

	$website["tab_content"]["completed_tasks"]["string"] .= "<br /><br />";

	# Add the tab to the tab templates
	$website["tabs"]["templates"]["completed_tasks"] = [
		"name" => $tasks["language_texts"]["completed_tasks"],
		"add" => " ".HTML::Element("span", $website["tab_content"]["completed_tasks"]["number"], "", $website["style"]["text"]["theme"]["dark"]),
		"text_style" => "text-align: left;",
		"content" => $website["tab_content"]["completed_tasks"]["string"],
		"icon" => "list_check"
	];
}

else {
	# Define the "Completed tasks" tab to be removed if it does not contain completed tasks
	array_push($website["tabs"]["To remove"], "completed_tasks");
}

?>