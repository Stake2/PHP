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

if (isset($website["Data"]["year"]) == False) {
	$website["Data"]["year"] = Date::Now()["year"];
}

if (in_array($website["Data"]["title"], $website["years"]) == True) {
	$website["Data"]["year"] = $website["Data"]["title"];
}

# Define the data network folder for easier typing
$network_folder = $folders["Mega"]["Notepad"]["Data Networks"]["Productivity"];

if (isset($tasks) == False) {
	# Define the "Tasks" array
	$tasks = [
		"Files" => [
			"Per Task Type" => [
				"root" => $network_folder["Task History"][$website["Data"]["year"]]["Per Task Type"]["root"]
			]
		],
		"Types" => $JSON -> To_PHP($network_folder["Data"]["Types"]),
		"Entries" => "",
		"Texts" => $JSON -> To_PHP($folders["Apps"]["Module files"]["Tasks"]["Texts"]),
		"Language texts" => []
	];
}

# Define the Entries file
$entries_file = $network_folder["Task History"][$website["Data"]["year"]]["Tasks"];

if (file_exists($entries_file) == True) {
	$tasks["Entries"] = $JSON -> To_PHP($entries_file);

	$tasks["Language texts"] = $Language -> Item($tasks["Texts"]);

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
				$header_text = $tasks["Texts"]["tasks, title()"][$language]." [".$website["Data"]["year"]."]";
			}

			$array = [
				"links" => "",
				"headers" => []
			];

			$text_color = $website["Style"]["text"]["theme"]["dark"];

			$types_dictionary = $tasks["Types"]["Plural"];

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
				}
			}

			# Iterate through the English plural task types list
			$i = 0;
			foreach ($types_dictionary["en"] as $type) {
				$language_type = $tasks["language_types"][$i];

				if (array_key_exists($type, $tasks["Entries"]["Numbers"]["Per Task Type"])) {
					$number = $tasks["Entries"]["Numbers"]["Per Task Type"][$type];

					# If the number is not zero (0)
					if ($number != 0) {
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

	$task_type_headers = Generate_Task_Type_Headers();

	# Update the watched things number
	$website["tab_content"]["completed_tasks"]["number"] = $tasks["Entries"]["Numbers"]["Total"];

	$website["tab_content"]["completed_tasks"]["string"] .= "<!-- Task type headers -->"."\n"."\t\t".
	$task_type_headers["links"].
	"\n"."\t\t"."<br />"."\n\n";

	$text_color = $website["Style"]["text"]["theme"]["dark"];

	$types_dictionary = $tasks["Types"]["Plural"];

	# Iterate through the English task types list
	$i = 0;
	foreach ($types_dictionary["en"] as $type) {
		$language_type = $tasks["language_types"][$i];

		if (array_key_exists($type, $tasks["Entries"]["Numbers"]["Per Task Type"]) == True) {
			$number = $tasks["Entries"]["Numbers"]["Per Task Type"][$type];

			if ($number != 0) {
				$website["tab_content"]["completed_tasks"]["string"] .= $task_type_headers["headers"][$type];

				# Iterate through the task type Entries list
				foreach ($tasks["Files"]["Per Task Type"][$type]["Entries"] as $entry) {
					$entry = $tasks["Entries"]["Dictionary"][$entry];

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
							$first_text = $website["Language texts"]["first_task_in_the_year"];

							$text .= " ".HTML::Element("span", "1# ".$website["Icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["Style"]["text_highlight"]." underline_on_hover");
						}

						if (array_key_exists("First task type task in year", $entry["States"]) == True) {
							$first_text = $website["Language texts"]["first_task_per_task_type_in_the_year"];

							$text .= " ".HTML::Element("span", "1# ".$website["Icons"]["list_check"]." ".$website["Icons"]["calendar"], 'alt="'.$first_text.'" title="'.$first_text.'"', $website["Style"]["text_highlight"]." underline_on_hover");
						}

						if (
							array_key_exists("First task in year", $entry["States"]) == True or
							array_key_exists("First task type task in year", $entry["States"]) == True
						) {
							$text .= " - ";
						}
					}

					$title = HTML::Element("span", $entry["Titles"][$language], "", $text_color);

					if ($website["States"]["Tasks"]["Entry tabs"] == True and (int)$website["Data"]["year"] >= 2023) {
						# Add the task description tab link and create the tab
						$link_text = $website["Language texts"]["task_description"];

						$tab_id = "task_description_".$entry["Number"];

						$style = 'style="text-decoration: underline; cursor: pointer;"';

						$title = HTML::Element("a", $title, 'onclick="'."Open_Tab('".$tab_id."')".'" target="_blank" alt="'.$link_text.'" title="'.$link_text.'" '.$style, $text_color);

						# Create the tab title
						$tab_title = $entry["Number"]." - ".$entry["Titles"][$language]." (".$time.")";

						# Get the task description file
						$folder = $folders["Mega"]["Notepad"]["Years"][$website["Data"]["year"]][$language]["done_tasks"]["root"].$language_type."/";

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

					$text = HTML::Element("span", $text, 'style="margin-left: 3%;"', $website["Style"]["text_hover"]);

					$website["tab_content"]["completed_tasks"]["string"] .= $text."<br />"."\n";
				}

				if ($type != end($tasks["language_types"])) {
					$website["tab_content"]["completed_tasks"]["string"] .= "\t\t"."<br />"."\n\n";
				}
			}
		}

		$i++;
	}

	$website["tab_content"]["completed_tasks"]["string"] .= "<br /><br />";

	# Add the tab to the tab templates
	$website["tabs"]["templates"]["completed_tasks"] = [
		"name" => $tasks["Language texts"]["completed_tasks"],
		"add" => " ".HTML::Element("span", $website["tab_content"]["completed_tasks"]["number"], "", $website["Style"]["text"]["theme"]["dark"]),
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